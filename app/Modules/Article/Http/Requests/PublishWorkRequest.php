<?php
namespace App\Modules\Article\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PublishWorkRequest extends FormRequest
{
	
	public function rules()
	{
		return [
            'start_time' => 'required',
            'deadline' => 'required',
            'count' => 'required',
            'site' => 'required',
            'teach_course' => 'required',
            'teach_content' => 'required',
            'class_hour' => 'required',
		];
	}

	
	public function authorize()
	{
		return true;
	}

    public function messages()
    {
        return [
            'start_time.required' => '请输入开始时间',
            'deadline.required' => '合同期限不能为空',
            'count.required' => '请输入用户名',
            'site.required' => '请输入用户名',
            'teach_course.required' => '请输入用户名',
            'teach_content.required' => '请输入用户名',
            'class_hour.required' => '请输入用户名',
        ];
    }
}
