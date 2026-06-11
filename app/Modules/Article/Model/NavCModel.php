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

class NavCModel extends Model
{

    protected $table = 'navc';

    protected $fillable = [
        'title', 'parent_id', 'introduce', 'content'
    ];

    public $timestamps = false;


    public static function getNavCache($parent_id)
    {
        if (!Cache::has('NavC_' . $parent_id)) {
            $navs = self::where('parent_id', $parent_id)->where('id', '!=', $parent_id)->get();
            Cache::put('NavC_' . $parent_id, $navs, 60 * 12);
        }

        return Cache::get('NavC_' . $parent_id);
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