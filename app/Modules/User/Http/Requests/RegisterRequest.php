<?php
namespace App\Modules\User\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
	
	public function rules()
	{
		return [
            'school_name' => 'required',
            'location' => 'required',
            'trainContent' => 'required',
            'lxr_name' => 'required',
            'phone' => 'required',
            'username' => 'required|between:2,18|string|unique:myusers,username',
            'email' => 'required|email|unique:myusers,email',
            'password' => 'required|between:6,18|string',
            'confirmPassword' => 'required|same:password',
            'validate_code' => 'required',
//            'agree' => 'required'

		];
	}

	
	public function authorize()
	{
		return true;
	}

    public function messages()
    {
        return [
            'school_name.required' => '请输入机构名称',
            'location.required' => '请输入机构所在地',
            'trainContent.required' => '请输入培训内容',
            'lxr_name.required' => '请填写联系人',
            'phone.required' => '请填写手机号码',

            'username.required' => '请输入用户名',
            'username.between' => '用户名应该在:min - :max 个字符',
            'username.string' => '用户名格式错误',
            'username.unique' => '用户名已注册',

            'email.required' => '请输入注册邮箱',
            'email.email' => '请输入正确的邮箱格式',
            'email.unique' => '邮箱已注册',

            'password.required' => '请输入注册密码',
            'password.between' => '密码长度在:min - :max 个字符',
            'password.string' => '密码仅允许字母和数字',

            'confirmPassword.required' => '请输入确认密码',
            'confirmPassword.same' => '确认密码与密码不一致',

            'validate_code.required' => '请输入验证码',

//            'agree.required' => '请先阅读并同意服务条款'


        ];
    }
}
