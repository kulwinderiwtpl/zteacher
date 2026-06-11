<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/5/6 0006
 * Time: 下午 15:35
 */

namespace App\Modules\User\Http\Controllers;


use App\Http\Controllers\IndexEnController;
use App\Model\ResumeModel;
use App\Modules\User\Http\Requests\EditPasswordENRequest;
use App\Modules\User\Http\Requests\LoginRequest;
use App\Modules\User\Http\Requests\LoginRequestEn;
use App\Modules\User\Model\ForeignUsersModel;
use App\Modules\User\Model\ResetPasswordModel;
use App\Tool\Aes;
use App\Tool\Communal;
use Illuminate\Http\Request;
use Cache;
use Session;
use Cookie;

class ForeignUserController extends IndexEnController
{
    public $user;

    public function __construct()
    {
        parent::__construct();


        $this->user = request()->session()->get('myuser');
    }

    public function login()
    {
        $email = request()->get('email');
        return $this->theme->scope('English.user.login',['email' => $email])->render();
    }

    public function postlogin(LoginRequestEn $request)
    {
//        $return_url = $request->get('return_url', 'http://zj.com/publish');

        $email = $request->input('username');
        $password = $request->input('password');
        $remember = $request->input('remember');
//        $validate_code = $request->input('validate_code');
//        $validate_code_session = $request->session()->get('validate_code');
//        if ($validate_code != $validate_code_session) {
//            return back()->withErrors(['verification' => '验证码不正确'])->withInput();
//        }
        $user = ResumeModel::getUser($email);


        $aes = new Aes();
        if (!$user || !password_verify(md5($password), $aes->decrypt($user['password']))) {
            return back()->withErrors(['password' => 'Wrong account or password'])->withInput();
        }
        unset($user['password']);


        $user['work_area'] = json_decode($user['work_area'], true);
        $request->session()->put('foreignUser', $user->toArray());

//        return response()->redirectToRoute('publish');
        if ($remember) {
            return redirect('/EN/myCenter')->withCookie(cookie('foreignEmail', $email, 60 * 24 * 14));
        }
        return redirect('/EN/myCenter');
    }

    public function register()
    {
        $this->initTheme('zTeachersEn');
        $this->theme->set('title', 'Register');
        return $this->theme->scope('English.user.register')->render();
    }

    public function postRegister(Request $request)
    {
        $data = $request->except('_token');

        $res = $this->examine($data);//非空验证
        if ($res) {
            return json_encode($res);
        }
        if (empty(ResumeModel::getUser($data['email']))) {
            $res = [
                'code' => 103,
                'msg' => "Mailbox already exists",
            ];
            return json_encode($res);
        }
        if ($data['password'] != $data['confirmPassword']) {
            $res = [
                'code' => 103,
                'msg' => "The two passwords do not match！",
            ];
            return json_encode($res);
        }

        /*$validate_code_session = $request->session()->get('validate_code');
        if ($data['validate_code'] != $validate_code_session) {
            return back()->withErrors(['verification' => 'The verification code is not correct'])->withInput();
        }*/

        $data['password'] = Communal::encrypt($data['password']);
        unset($data['confirmPassword']);
        $work_area = [];
        foreach ($data['work_area'] as $v) {
            $work_area[] = $v;
        }
        $data['work_area'] = json_encode($work_area);
        $work_location = [];
        foreach ($data['work_location'] as $v) {
            $work_location[] = $v;
        }
        $data['work_location'] = json_encode($work_location);

        if (Cache::has('resumeUrl')) {
            $data['resume'] = Cache::get('resumeUrl');
            Cache::forget('resumeUrl');
        }

        $user = ResumeModel::addTalentPool($data);

        if (!$user) {
            $res = [
                'code' => 102,
                'msg' => "Registration failed, please resubmit！",
            ];
            return json_encode($res);
        }
        $res = [
            'code' => 100,
            'msg' => "Registration Successful！",
        ];
        return json_encode($res);
    }


    public function upPassword()
    {
        $this->initTheme('zTeachersEn');
        $this->theme->set('title', 'Change Password');
        return $this->theme->scope('English.user.upPassword')->render();
    }

    /*
     * 修改密码
     */
    public function updatePassword(Request $request)
    {
        $oldPassword = $request->get('oldPassword');
        $password = $request->get('password');
        $confirmPassword = $request->get('confirmPassword');
        $user = Session::get('foreignUser');

        $aes = new Aes();
        if (!$password || !$oldPassword || !$confirmPassword) {
            $data = [
                'code' => 103,
                'msg' => 'The password cannot be empty',
            ];
            return json_encode($data);
        }

        $user = ResumeModel::getUser($user['email']);

        if (!password_verify(md5($oldPassword), $aes->decrypt($user['password']))) {
            $data = [
                'code' => 103,
                'msg' => 'Current password error',
            ];
            return json_encode($data);
        }
        if (strlen($password) < 6 || strlen($password) > 18) {
            $data = [
                'code' => 103,
                'msg' => 'Please enter a 6-18 bit password',
            ];
            return json_encode($data);
        }
        if ($password != $confirmPassword) {
            $data = [
                'code' => 103,
                'msg' => 'The passwords do not match',
            ];
            return json_encode($data);
        }

        $data = [
            'id' => $user['id'],
            'password' => Communal::encrypt($password),
        ];
        $str = ResumeModel::updateUser($data);
        if (!$str) {
            $data = [
                'code' => 103,
                'msg' => 'The modification failed, please try again!',
            ];
        } else {
            $data = [
                'code' => 100,
                'data' => urlencode($user['email']),
                'msg' => 'modify successfully',
            ];

            Session::forget('foreignUser');
        }
        return json_encode($data);
    }

    public function retrievePassword()
    {
        $this->initTheme('zTeachersEn');
        $this->theme->set('title', 'reset passwords');
        return $this->theme->scope('English.user.retrievePassword')->render();
    }

    /*
     * 发送重置密码邮件
     */
    public function sendPasswordEmail(Request $request)
    {

        $email = $request->get('email');
        $validate_code = $request->get('validate_code');
        $user = ResumeModel::getUser($email);
        if (!$user) {
            $data = [
                'code' => 103,
                'msg' => 'Mailbox does not exist！',
            ];
            return json_encode($data);
        }
        $validate_code_session = $request->session()->get('validate_code');
        if (strtolower($validate_code) != $validate_code_session) {
            $data = [
                'code' => 103,
                'msg' => 'The captcha was entered incorrectly！',
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
            'subject' => 'Reset password information',
            'reset_password_token' => urlencode($aes->encrypt($data['reset_password_token'])),
        ];


        $str = Communal::sendEmailEN('email.passwordEn', $mail);
        if ($str) {
            $data = [
                'code' => 100,
                'msg' => 'Reset password message has been sent, please follow the message prompt to reset password',
            ];
            return json_encode($data);
        }
        $data = [
            'code' => 102,
            'msg' => 'E-mail sending failed！Please try again',
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

            //
            return redirect('/EN/retrievePassword')->withErrors(['resetPassword' => 'The link is invalid, please resend it'])->withInput();
//            return $this->theme->scope('Chinese.User.retrievePassword')->render();
        }

        if (date('Y-m-d H:i:s') > $user['valid_time']) {

            //链接失效
            return redirect('/EN/retrievePassword')->withErrors(['resetPassword' => 'The link has expired. Please resend it'])->withInput();
//            return $this->theme->scope('Chinese.User.retrievePassword')->render();
        }

        $aes = new Aes();

        $view = [
            'email' => $email,
            'reset_password_token' => $reset_password_token,
        ];
        $this->initTheme('zTeachersEN');
        $this->theme->set('title', 'Reset passwords');
        return $this->theme->scope('English.user.resetPassword', $view)->render();
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
                'msg' => 'The password cannot be empty！',
            ];
            return json_encode($data);
        }
        if (strlen($password) < 6 || strlen($password) > 18) {
            $data = [
                'code' => 103,
                'msg' => 'Please enter a 6-18 bit password',
            ];
            return json_encode($data);
        }
        if ($password != $confirmPassword) {
            $data = [
                'code' => 102,
                'msg' => 'The two passwords do not match',
            ];
            return json_encode($data);
        }

        $token = ResetPasswordModel::getToken($aes->decrypt($reset_password_token));

        if ($token && $token['email'] == $email) {
            $data = [
                'email' => $email,
                'password' => Communal::encrypt($password),
            ];
            $str = ResumeModel::resetPassword($data);
            if ($str) {
                $data = [
                    'code' => 100,
                    'msg' => 'Password reset successful！',
                    'data' => urlencode($email),
                ];
                return json_encode($data);
            }
        }
        $data = [
            'code' => 100,
            'msg' => 'Password reset successful！',
        ];
        return json_encode($data);
    }

    public function myCenter()
    {
//        $user = Session::get('foreignUser');

        $user = ResumeModel::getUser(Session::get('foreignUser')['email']);
        if (!$user) {
            return redirect('/EN/login')->withErrors(['username' => 'Abnormal account ! Please login again'])->withInput();
        }
        $user['work_area'] = json_decode($user['work_location'], true);
        if (!empty($user['work_location'])) {
            $user['work_location'] = json_decode($user['work_location'], true);

        }

        $this->initTheme('zTeachersEn');
        $this->theme->set('title', 'myCenter');
        return $this->theme->scope('English.user.myCenter', ['user' => $user])->render();
    }

    public function editResume()
    {
        $user = Session::get('foreignUser');

        $user = ResumeModel::getUser(Session::get('foreignUser')['email']);
        $user['work_area'] = json_decode($user['work_area'], true);
        $user['work_location'] = json_decode($user['work_location'], true);
        $view = [
            'user' => $user,
        ];


        $this->initTheme('zTeachersEn');
        $this->theme->set('title', 'myCenter');
        return $this->theme->scope('English.user.editResume', $view)->render();
    }

    public function updateResume(Request $request)
    {
        $data = $request->except('_token');

//        echo '<pre>';
//        var_dump($data);die;
//        $res = $this->examine($data);
//        if ($res) {
//            return json_encode($res);
//        }

        $work_area = [];
        foreach ($data['work_area'] as $v) {
            $work_area[] = $v;
        }
        $data['work_area'] = json_encode($work_area);

        $work_location = [];
        foreach ($data['work_location'] as $v) {
            $work_location[] = $v;
        }
        $data['work_location'] = json_encode($work_location);

        if (!$data['picture1']) {
            unset($data['picture1']);
        }
        if (!$data['picture2']) {
            unset($data['picture2']);
        }
        if (!$data['picture3']) {
            unset($data['picture3']);
        }


        if (Cache::has('resumeUrl')) {
            $data['resume'] = Cache::get('resumeUrl');
            Cache::forget('resumeUrl');
        } else {
            unset($data['resume']);
        }
        $data['id'] = Session::get('foreignUser')['id'];

        $str = ResumeModel::updateUser($data);
        if (!$str) {
            $res = [
                'code' => 102,
                'msg' => "Change failed!",
            ];
            return json_encode($res);
        }
        $res = [
            'code' => 100,
            'msg' => "Modify successfully!",
        ];

//        Session::put('foreignUser',);

        return json_encode($res);
    }

    /**
     * 获取图片
     *
     * @return string
     */
    public function getImg()
    {
        $user = ResumeModel::getUser(Session::get('foreignUser')['email']);
        $data = [
            'img1' => $user['picture1'],
            'img2' => $user['picture2'],
            'img3' => $user['picture3'],
        ];
        return json_encode($data);
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
            'id' => Session::get('foreignUser')['id'],
            'headerImg' => $imageUrl
        ];
        $str = ResumeModel::updateUser($data);

        $user = Session::get('foreignUser');
        $user['headerImg'] = $imageUrl;
        Session::put('foreignUser', $user);

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

    public function examine($data)
    {
        $res = [];
        if (!$data['frist_name']) {
            $res = [
                'code' => 103,
                'msg' => "First Name cannot be empty!",
            ];
        }
        if (!$data['last_name']) {
            $res = [
                'code' => 103,
                'msg' => "Last Name cannot be empty!",
            ];
        }
        if (!$data['age']) {
            $res = [
                'code' => 103,
                'msg' => "Age cannot be empty！",
            ];
        }
        if (!$data['current_location']) {
            $res = [
                'code' => 103,
                'msg' => "The current location cannot be empty！",
            ];
        }
        if (!$data['degree']) {
            $res = [
                'code' => 103,
                'msg' => "Degree Completed cannot be empty",
            ];
        }
        if (!$data['graduate_school']) {
            $res = [
                'code' => 103,
                'msg' => "Graduate School cannot be empty",
            ];
        }
        if (!$data['major']) {
            $res = [
                'code' => 103,
                'msg' => "Major cannot be empty",
            ];
        }
        if (!$data['GPA']) {
            $res = [
                'code' => 103,
                'msg' => "GPA cannot be empty",
            ];
        }
        if (!$data['teaching_experience']) {
            $res = [
                'code' => 103,
                'msg' => "Teaching Experience cannot be empty",
            ];
        }
        /*if (!$data['professional_license']) {
            $res = [
                'code' => 103,
                'msg' => "Professional License cannot be empty",
            ];
        }*/
        if (empty($data['work_area'])) {
            $res = [
                'code' => 103,
                'msg' => "Please select your preferred work area！",
            ];
        }
        if (!$data['professional_license']) {
            $res = [
                'code' => 103,
                'msg' => "Professional License cannot be empty",
            ];
        }
        if (!$data['phone']) {
            $res = [
                'code' => 103,
                'msg' => "Phone Number cannot be empty",
            ];
        }
        if (!$data['email']) {
            $res = [
                'code' => 103,
                'msg' => "Email cannot be empty",
            ];
        }
        if (!$data['username']) {
            $res = [
                'code' => 103,
                'msg' => "User Name cannot be empty",
            ];
        }
        if (!$data['password']) {
            $res = [
                'code' => 103,
                'msg' => "Password cannot be empty",
            ];
        }
        return $res;
    }

    public function getLogout()
    {
        Session::forget('foreignUser');
        $email = request()->cookie('foreignEmail');
        if ($email) {
            Cookie::queue('foreignEmail', null , -1);
        }
    }

}