<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Modules\Manage\Http\Requests\LoginRequest;
use App\Modules\Manage\Model\ManagerModel;
use Illuminate\Support\Facades\Session;
use Teepluss\Theme\Facades\Theme;
use Validator;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    
    protected $redirectPath = '/manage';

    
    protected $loginPath = '/manage/login';


    
    
    
    protected function validator(array $data)
    {

    }

    
    protected function create(array $data)
    {

    }

    public function getLogin()
    {
        if (ManagerModel::getManager()){
            return redirect($this->redirectPath);
        }

        // $this->initTheme('managelogin');
        // $this->theme->setTitle('后台登录');
        return view('admin.zhuo.loginPage');
    }

    
    public function postLogin(LoginRequest $request)
    {
        if (!ManagerModel::checkPassword($request->get('username'), $request->get('password'))){
            return redirect($this->loginPath)->withInput()->withErrors(array('password'=> '请输入正确的密码'));
        }
        if(ManagerModel::where('username',$request->get('username'))->where('status',2)->first())
                return redirect($this->loginPath)->withInput()->withErrors(array('password'=> '用户已禁用'));
        $user = ManagerModel::where('username',$request->get('username'))->first();
        ManagerModel::managerLogin($user);
        return redirect($this->redirectPath);
    }

    
    public function getLogout()
    {
        Session::forget('manager');
        return redirect($this->loginPath);
    }
}
