<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/5/6 0006
 * Time: 下午 17:30
 */

namespace App\Modules\User\Model;


use Illuminate\Database\Eloquent\Model;

class MyUsersModel extends Model
{

    protected $table = 'myusers';

    protected $fillable = [
        'username', 'password', 'weChat', 'email', 'phone', 'lxr_name', 'school_name', 'location', 'trainContent',
        'is_chain','is_qualification','headerImg',
    ];

    public $timestamps = true;


    public static function addUsers($data)
    {
        $id = self::create($data);
        return $id;
    }

    public static function getUser($email)
    {
        $user = self::where('email',$email)->first();
        return $user;
    }

    public static function updateUser($data)
    {
        $str = self::where('id',$data['id'])->update($data);
        return $str;
    }

    public static function resetPassword($data)
    {
        $str = self::where('email', $data['email'])->update($data);
        return $str;
    }

}