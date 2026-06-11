<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/5/6 0006
 * Time: 下午 17:30
 */

namespace App\Modules\User\Model;


use Illuminate\Database\Eloquent\Model;

class ResetPasswordModel extends Model
{

    protected $table = 'reset_password';

    protected $fillable = [
        'email', 'reset_password_token', 'valid_time'
    ];

    public $timestamps = false;


    public static function addToken($data)
    {
        $token = self::where('email', $data['email'])->first();
        if ($token) {
            $str = self::where('email', $data['email'])->update($data);
        } else {
            $str = self::create($data);
        }
        return $str;
    }

    public static function getToken($reset_password_token)
    {
        $user = self::where('reset_password_token', $reset_password_token)->first();
        return $user;
    }

    public static function getEmail($email)
    {
        $user = self::where('email', $email)->first();
        return $user;
    }

    public static function updateUser($data)
    {
        $str = self::where('id', $data['id'])->update($data);
        return $str;
    }

}