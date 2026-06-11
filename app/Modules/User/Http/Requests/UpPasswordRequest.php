<?php
namespace App\Modules\User\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpPasswordRequest extends FormRequest
{
	
	public function rules()
	{
        return [
            'password' => 'required|between:6,18|string',
            'confirmPassword' => 'required|same:password',
        ];

	}

	
	public function authorize()
	{
		return true;
	}

    public function messages()
    {
        return [
            'password.required' => 'The password cannot be empty',
            'password.between' => 'The password length is 6-18 characters',
            'password.string' => 'Passwords allow only letters and Numbers',

            'confirmPassword.required' => 'Confirm that the password cannot be empty',
            'confirmPassword.same' => 'Confirm that the password does not match the password',
        ];
    }
}
