<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use DB;

class ResumeModel extends Model
{
    //
    protected $table = 'resume';
    protected $fillable = [
        'user_id', 'frist_name', 'last_name', 'dateOfBirth', 'current_location', 'degree', 'graduate_school', 'nationality',
        'major', 'GPA', 'teaching_experience', 'professional_license', 'certified', 'start_time', 'work_location', 'work_area',
        'teaching_subject', 'start_salary', 'resume', 'status', 'created_at', 'updated_at', 'picture1', 'picture2', 'picture3',
        'phone', 'email', 'userName', 'password', 'birthday', 'preferred_subjects', 'likeTime', 'headerImg','age','sex'
    ];
    public $timestamps = true;


    public static function upResume($data)
    {

        $str = self::where('id', $data['id'])->update($data);

        return $str;
    }

    public static function addTalentPool($data)
    {
//        $data['created_at'] = date('Y-m-d H:i:s',time());
        $str = self::create($data);

        return $str;
    }

    public static function deleteTalentPool($id)
    {
        $str = self::where('id', $id)->delete();

        return $str;
    }

    public static function getUser($email)
    {
        $str = self::where('email', $email)->first();

        return $str;
    }

    public static function updateUser($data)
    {
        $str = self::where('id', $data['id'])->update($data);

        return $str;
    }

    public static function resetPassword($data)
    {
        $str = self::where('email', $data['email'])->update($data);

        return $str;
    }


}

