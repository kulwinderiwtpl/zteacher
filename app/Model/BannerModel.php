<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use DB;

class BannerModel extends Model
{
    protected $table = 'banner';

    protected $fillable = [
        'nav_id','img', 'sort'
    ];

    public  $timestamps = false;

    /**
     * @param int $paginate
     * @param string $condition
     * @return mixed
     */
    public static function getBanners($paginate = 10,$condition = '')
    {
        $lists = self::select(DB::raw('id,nav_id,img,sort'))
            ->whereRaw($condition)
            ->orderBy('id','DESC')
            ->paginate($paginate);

        return $lists;
    }

    public static function upBanner($data)
    {
        $str = self::where('id',$data['id'])->update($data);

        return $str;
    }

    public static function addBanner($data)
    {
        $str = self::insert($data);

        return $str;
    }

    public static function delBanner($id)
    {
        $str = self::where('id',$id)->delete();

        return $str;
    }

    public static function getNavBanners($nav_id)
    {
        $str = self::where('nav_id', $nav_id)->orderBy('sort','ASC')->get();

        return $str;
    }
}

