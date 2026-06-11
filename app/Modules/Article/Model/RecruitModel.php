<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/5/6 0006
 * Time: 上午 11:22
 */

namespace App\Modules\Article\Model;


use Illuminate\Database\Eloquent\Model;

class RecruitModel extends Model
{

    protected $table = 'recruit';

    protected $fillable = [
        'user_id', 'start_time', 'deadline', 'count', 'education', 'course', 'sex', 'age', 'site', 'teach_course', 'teach_content',
        'class_hour', 'ages_group', 'salary', 'weal', 'putUp', 'is_train'
    ];

    public $timestamps = true;

    public static function addRecruit($data)
    {
        $str = self::create($data);

        return $str;
    }

    public static function getUserRecruit($id)
    {
        $user = request()->session()->get('myuser');
        $recruit = self::where('user_id', $user['id'])->fisrt();

        return $recruit;
    }

    public static function dele($id)
    {
        $user = request()->session()->get('myuser');
        $data = [
            'user_id' => $user['id'],
            'id' => $id,
        ];
        $str = self::where($data)->delete($id);

        return $str;
    }

    public static function upRecruit($data)
    {
        $str = self::where('id', $data['id'])->update($data);

        return $str;
    }

    public static function delWork($id)
    {
        $str = self::where('id', $id)->delete();

        return $str;
    }

    public static function getCount($user_id)
    {
        $count = self::where('user_id',$user_id)->count();
        return $count;
    }


}