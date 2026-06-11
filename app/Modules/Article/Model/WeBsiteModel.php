<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/5/6 0006
 * Time: 上午 11:22
 */

namespace App\Modules\Article\Model;


use Cache;
use Illuminate\Database\Eloquent\Model;

class WeBsiteModel extends Model
{

    protected $table = 'website';

    protected $fillable = [
        'logo','phone', 'email', 'weChat','location'
    ];

    public  $timestamps = false;

    public static function upwebsite($data)
    {
        $str = self::where('id',$data['id'])->update($data);

        return $str;
    }

    public static function getWebSite()
    {
        if (!Cache::has('website')) {
            $website  = self::get();
            Cache::put('website',$website,60*12);
        }

        return Cache::get('website');
    }

}