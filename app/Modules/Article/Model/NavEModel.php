<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/5/6 0006
 * Time: 上午 11:22
 */

namespace App\Modules\Article\Model;


use Illuminate\Database\Eloquent\Model;
use Cache;

class NavEModel extends Model
{

    protected $table = 'NavE';

    protected $fillable = [
        'title', 'parent_id', 'introduce', 'content'
    ];

    public $timestamps = false;

    public static function getNavsCache($parent_id)
    {
        if (!Cache::has('NavE_' . $parent_id)) {
            $navs = self::where('parent_id', $parent_id)->where('id', '!=', $parent_id)->get();
            Cache::put('NavE_' . $parent_id, $navs, 60 * 12);
        }

        return Cache::get('NavE_' . $parent_id);
    }

    public static function getNavs($parent_id)
    {
        $navs = self::where('parent_id', $parent_id)->where('id', '!=', $parent_id)->get();

        return $navs;
    }

    public static function updateNav($data)
    {
        $str = self::where('id', $data['id'])->update($data);
        return $str;
    }
}