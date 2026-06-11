<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/5/6 0006
 * Time: 下午 15:35
 */

namespace App\Http\Controllers\user;


use App\Http\Controllers\Controller;
use App\Model\ContentNavModel;
use App\Model\WeBsiteModel;
use App\Modules\Article\Model\RecruitModel;
use App\Modules\User\Http\Requests\LoginRequest;
use App\Modules\User\Http\Requests\RegisterRequest;
use App\Modules\User\Http\Requests\UpPasswordRequest;
use App\Modules\User\Model\MyUsersModel;
use App\Modules\User\Model\ResetPasswordModel;
use App\Tool\Aes;
use App\Tool\Communal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Cookie;

class UserController extends Controller
{
    //public $user;
    public $return_url = '';

    //public function __construct()
   // {
       // parent::__construct();

//        $this->initTheme('main');
       // $this->theme->set('title', '用户中心');
      //  $this->user = request()->session()->get('myuser');
 //   }


    public function login()
    {
        $this->return_url = request()->get('return_url');
        $email = request()->get('email');

        
        return view('Chinese.User.login',['email' => $email]);
    }

    public function postLogin(LoginRequest $request)
    {
        $return_url = $request->get('return_url', '/publish');

        $email = $request->input('username');
        $password = $request->input('password');
        $remember = $request->input('remember');

//        $validate_code = $request->input('validate_code');
//        $validate_code_session = $request->session()->get('validate_code');
//        if ($validate_code != $validate_code_session) {
//            return back()->withErrors(['verification' => '验证码不正确'])->withInput();
//        }

        $user = MyUsersModel::getUser($email);
        $aes = new Aes();
        if (!$user || !password_verify(md5($password), $aes->decrypt($user['password']))) {
            return back()->withErrors(['password' => '帐号或者密码错误'])->withInput();
        }
        unset($user['password']);


        $request->session()->put('myuser', $user->toArray());

        if ($remember) {
            return redirect($return_url)->withCookie(cookie('email', $email, 60 * 24 * 14));
        }
        return redirect($return_url);
    }

    public function register()
    {

        $this->initTheme('zTeachers');
        $this->theme->set('title', '注册');
        return $this->theme->scope('Chinese.User.register')->render();
    }

    public function postRegister(Request $request)
    {
        $data = $request->except('_token');

        $validate_code_session = $request->session()->get('validate_code');

        if (strtolower($data['validate_code']) != $validate_code_session) {
            return back()->withErrors(['validate_code' => '验证码不正确'])->withInput();
        }

        $data['password'] = Communal::encrypt($data['password']);
        $user = MyUsersModel::addUsers($data);

        if (!$user) {

            return '注册失败！';
        }

        return redirect('/CN/login');
    }


    public function upPassword()
    {
        $this->initTheme('zTeachers');
        $this->theme->set('title', '密码修改');
        return $this->theme->scope('Chinese.User.upPassword')->render();
    }

    /*
     * 修改密码
     */
    public function updatePassword(Request $request)
    {
        $oldPassword = $request->get('oldPassword');
        $password = $request->get('password');
        $confirmPassword = $request->get('confirmPassword');

        $user = Session::get('myuser');

        $aes = new Aes();
        if (!$password || !$oldPassword || !$confirmPassword) {
            $data = [
                'code' => 103,
                'msg' => '密码不能为空',
            ];
            return json_encode($data);
        }

        $user = MyUsersModel::getUser($user['email']);

        if (!password_verify(md5($oldPassword), $aes->decrypt($user['password']))) {
            $data = [
                'code' => 103,
                'msg' => '当前密码错误',
            ];
            return json_encode($data);
        }
        if ($password != $confirmPassword) {
            $data = [
                'code' => 103,
                'msg' => '两次密码不一致',
            ];
            return json_encode($data);
        }

        $data = [
            'id' => $user['id'],
            'password' => Communal::encrypt($password),
        ];
        $str = MyUsersModel::updateUser($data);
        if (!$str) {
            $data = [
                'code' => 103,
                'msg' => '修改失败，请重试！',
            ];
            return json_encode($data);
        }
        $data = [
            'code' => 100,
            'data' => urlencode($user['email']),
            'msg' => '修改成功！',
        ];

        Session::forget('myuser');
        return json_encode($data);
    }

    /**
     * 重置密码
     *
     * @return mixed
     */
    public function retrievePassword()
    {
        $this->initTheme('zTeachers');
        $this->theme->set('title', '重置密码');
        return $this->theme->scope('Chinese.User.retrievePassword')->render();
    }

    /*
     * 发送重置密码邮件
     */
    public function sendPasswordEmail(Request $request)
    {

        $email = $request->get('email');
        $validate_code = $request->get('validate_code');
        $user = MyUsersModel::getUser($email);
        if (!$user) {
            $data = [
                'code' => 103,
                'msg' => '邮箱不存在',
            ];
            return json_encode($data);
        }
        $validate_code_session = $request->session()->get('validate_code');
        if (strtolower($validate_code) != $validate_code_session) {
            $data = [
                'code' => 103,
                'msg' => '验证码输入有误',
            ];
            return json_encode($data);
        }

        $aes = new Aes();

        $data = [
            'email' => $email,
            'reset_password_token' => Communal::encrypt($email . time()),
            'valid_time' => date('Y-m-d H:i:s', strtotime("+12 hour")),
        ];

        $stu = ResetPasswordModel::addToken($data);

        $mail = [
            'to' => $email,
            'subject' => '重置密码信息',
            'reset_password_token' => urlencode($aes->encrypt($data['reset_password_token'])),
        ];


        $str = Communal::sendEmail('email.password', $mail);
        if ($str) {
            $data = [
                'code' => 100,
                'msg' => '重置密码邮件已发送，请按照邮件提示重置密码',
            ];
            return json_encode($data);
        }
        $data = [
            'code' => 102,
            'msg' => '邮件发送失败',
        ];
        return json_encode($data);

    }

    /*
     * 重置密码
     */
    public function resetPassword(Request $request)
    {
        $aes = new Aes();
        $email = $request->get('email');
        $reset_password_token = $request->get('reset_password_token');

//        $token = ResetPasswordModel::getToken($aes->decrypt($reset_password_token));
        $user = ResetPasswordModel::getEmail($email);

        if (!$user || $user['reset_password_token'] != $aes->decrypt($reset_password_token)) {

            //账户异常
            return redirect('/CN/retrievePassword')->withErrors(['resetPassword' => '链接无效，请重新发送'])->withInput();
//            return $this->theme->scope('Chinese.User.retrievePassword')->render();
        }

        if (date('Y-m-d H:i:s') > $user['valid_time']) {

            //链接失效
            return redirect('/CN/retrievePassword')->withErrors(['resetPassword' => '链接已失效，请重新发送'])->withInput();
//            return $this->theme->scope('Chinese.User.retrievePassword')->render();
        }

        $aes = new Aes();

        $view = [
            'email' => $email,
            'reset_password_token' => $reset_password_token,
        ];
        $this->initTheme('zTeachers');
        $this->theme->set('title', '重置密码');
        return $this->theme->scope('Chinese.User.resetPassword', $view)->render();
    }

    /*
     * 重置密码
     */
    public function editPassword(Request $request)
    {

        $aes = new Aes();
        $email = $request->get('email');
        $reset_password_token = $request->get('reset_password_token');
        $password = $request->get('password');
        $confirmPassword = $request->get('confirmPassword');
        if (!$password || !$confirmPassword) {
            $data = [
                'code' => 102,
                'msg' => '请填写密码！',
            ];
            return json_encode($data);
        }
        if (strlen($password) < 6 || strlen($password) > 18) {
            $data = [
                'code' => 103,
                'msg' => '请输入一个6-18位密码',
            ];
            return json_encode($data);
        }
        if ($password != $confirmPassword) {
            $data = [
                'code' => 102,
                'msg' => '两次密码不一致',
            ];
            return json_encode($data);
        }

        $token = ResetPasswordModel::getToken($aes->decrypt($reset_password_token));
        if ($token && $token['email'] == $email) {
            $data = [
                'email' => $email,
                'password' => Communal::encrypt($password),
            ];
            $str = MyUsersModel::resetPassword($data);
            if ($str) {
                $data = [
                    'code' => 100,
                    'msg' => '密码重置成功！',
                    'data' => urlencode($email),
                ];
                return json_encode($data);
            }
        }
        $data = [
            'code' => 104,
            'msg' => '密码重置失败！',
        ];
        return json_encode($data);
    }

    /**
     * 发布工作
     *
     * @return mixed
     */
    public function publish()
    {
        $edit = request()->get('edit');
       
        return view('Chinese.publish', ['edit' => $edit]);
    }

    public function publishWork(Request $request)
    {
        $data = $request->except('_token');
        if (empty($data['start_time'])) {
            return json_encode(['msg' => '请输入开始时间']);
        }
        if (empty($data['deadline'])) {
            return json_encode(['msg' => '合同期限不能为空！']);
        }
        if (empty($data['count'])) {
            return json_encode(['msg' => '请填写需求数量！']);
        }
        if (empty($data['site'])) {
            return json_encode(['msg' => '请填写授课地点！']);
        }
        if (empty($data['teach_course'])) {
            return json_encode(['msg' => '请填写授课科目！']);
        }
        if (empty($data['teach_content'])) {
            return json_encode(['msg' => '请填写授课内容！']);
        }
        if (empty($data['class_hour'])) {
            return json_encode(['msg' => '请填写课时安排！']);
        }
        $user = Session::get('myuser');
        $data['user_id'] = $user['id'];

        $str = RecruitModel::addRecruit($data);
        if ($str) {
            $data = [
                'code' => 100,
                'msg' => '发布成功',
                'data' => $str['id'],
                'url' => '/ssss'
            ];
        } else {
            $data = [
                'code' => 110,
                'msg' => '发布失败',
                'data' => '',
            ];
        }
        return json_encode($data);
    }

    public function getWork()
    {
        $count = RecruitModel::count();;
        $works = RecruitModel::where('user_id', Session::get('myuser')['id'])->orderBy('created_at', 'DESC')->paginate(3)->toArray();

        foreach ($works['data'] as &$v) {
            if ($v['education'] == 1) {
                $v['education'] = '大专';
            } elseif ($v['education'] == 2) {
                $v['education'] = '本科';
            } elseif ($v['education'] == 3) {
                $v['education'] = '研究生';
            } elseif ($v['education'] == 4) {
                $v['education'] = '博士';
            }
            if ($v['course'] == 1) {
                $v['course'] = 'ESL';
            } elseif ($v['course'] == 2) {
                $v['course'] = 'English';
            } elseif ($v['course'] == 3) {
                $v['course'] = 'STEM';
            } elseif ($v['course'] == 4) {
                $v['course'] = 'AP course';
            } elseif ($v['course'] == 5) {
                $v['course'] = 'IB course';
            } elseif ($v['course'] == 5) {
                $v['course'] = 'A-LEVEL course';
            }
            if ($v['sex'] == 0) {
                $v['sex'] = '不限';
            } elseif ($v['sex'] == 1) {
                $v['sex'] = '男';
            } elseif ($v['sex'] == 2) {
                $v['sex'] = '女';
            }

            if ($v['age'] == 0) {
                $v['age'] = '不限';
            } elseif ($v['age'] == 1) {
                $v['age'] = '22-30岁';
            } elseif ($v['age'] == 2) {
                $v['age'] = '30-40岁';
            } elseif ($v['age'] == 3) {
                $v['age'] = '40-50岁';
            } elseif ($v['age'] == 4) {
                $v['age'] = '50-65岁';
            }

            if ($v['salary'] == 1) {
                $v['salary'] = '＄2000-2500';
            } elseif ($v['salary'] == 2) {
                $v['salary'] = '＄2500-3500';
            } elseif ($v['salary'] == 3) {
                $v['salary'] = '＄3500+';
            }
            if ($v['is_train'] == 0) {
                $v['is_train'] = '无';
            } elseif ($v['is_train'] == 1) {
                $v['is_train'] = '有';
            }
        }

        $data = [
            'pageCount' => ceil($count / 3),
            'works' => $works['data'],
        ];

        return json_encode($data);
    }

    public function editWork($id)
    {
        $work = RecruitModel::find($id);
        $view = [
            'work' => $work,
        ];
        $this->initTheme('zTeachers');
        $this->theme->set('title', '发布工作-编辑');
        return $this->theme->scope('Chinese.publish_edit', $view)->render();
    }

    public function updateWork(Request $request)
    {
        $data = $request->except('_token');

//        var_dump($data);die;

        $str = RecruitModel::upRecruit($data);
        if ($str) {
            $data = [
                'code' => 100,
                'msg' => '编辑成功',
                'data' => $str['id'],
                'url' => '/ssss'
            ];
        } else {
            $data = [
                'code' => 110,
                'msg' => '编辑失败',
                'data' => '',
            ];
        }
        return json_encode($data);
    }


    public function deleteWork()
    {
        $id = request()->get('id');
        $work = RecruitModel::dele($id);
        if ($work) {
            return json_encode('ok');
        }
        return json_encode('error');
    }

    public function uploadHeaderImg(Request $request)
    {
        $file = $request->file('file');

        if ($file) {
            $result = \FileClass::uploadFile($file, 'sys');
            $result1 = json_decode($result, true);
            $imageUrl = $result1['data']['url'];
        }

        $data = [
            'id' => Session::get('myuser')['id'],
            'headerImg' => $imageUrl
        ];
        $str = MyUsersModel::updateUser($data);

        $user = Session::get('myuser');
        $user['headerImg'] = $imageUrl;
        Session::put('myuser', $user);

        if ($str) {
            $data = [
                'code' => 1,
                'msg' => '',
                'data' => '',
            ];
        } else {
            $data = [
                'code' => 0,
                'msg' => '',
                'data' => '',
            ];
        }
        return json_encode($data);

    }


    public function getLogout()
    {
        Session::forget('myuser');
        $email = request()->cookie('email');
        if ($email) {
            Cookie::queue('email', null, -1);
        }


//        return redirect($this->loginPath);
    }


}