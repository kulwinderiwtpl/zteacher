<?php
namespace App\Modules\User\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequestEn extends FormRequest
{
	
	public function rules()
	{
		return [
            'username' => 'required|email|string',
            'password' => 'required|between:6,18|string',
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
            'username.required' => 'Please enter your login account',
            'username.string' => 'Please enter your login account',
            'username.email      ' => 'Please enter your login account',

            'password.required' => 'Please enter the password',
            'password.between' => 'The password length is 6-18 characters',
            'password.string' => 'Passwords allow only letters and Numbers',
//			'code.required'=>'请填写正确的验证码'
        ];
    }


}
