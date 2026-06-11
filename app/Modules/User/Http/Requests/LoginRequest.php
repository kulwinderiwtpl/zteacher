<?php
namespace App\Modules\User\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
	
	public function rules()
	{
		return [
            'username' => 'required|email|string',
            'password' => 'required|between:3,18|string',
//            'code' => 'sometimes|required|alpha_num'
		];
	}

	
	public function authorize()
	{
		return true;
	}

    public function messages()
    {
        return [
            'username.required' => '请输入登录账号',
            'username.string' => '请输入正确的账号格式',
            'username.email' => '请输入正确的账号格式',

            'password.required' => '请输入登录密码',
            'password.between' => '密码长度在:min - :max 个字符',
            'password.string' => '密码仅允许字母和数字',
//			'code.required'=>'请填写正确的验证码'
        ];
    }


}
