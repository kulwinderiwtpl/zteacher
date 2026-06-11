<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/5/6 0006
 * Time: 下午 17:30
 */

namespace App\Modules\User\Model;


use Illuminate\Database\Eloquent\Model;

class ForeignUsersModel extends Model
{

    protected $table = 'foreignUsers';

    protected $fillable = [
        'username', 'password', 'email', 'phone',
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

}