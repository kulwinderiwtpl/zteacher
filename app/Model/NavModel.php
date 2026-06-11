<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use DB;

class NavModel extends Model
{
    //
    protected $table = 'nav';
    protected $fillable = [
        'parent_id', 'title', 'titleEn',
    ];
    public $timestamps = false;


    public static function getNav($parent_id)
    {
        $nav = self::where('parent_id',$parent_id)->whereRaw('id != parent_id')->orderBy('id','asc')->get()->toArray();

        return $nav;
    }

    public static function upNavs($data)
    {
        foreach ($data as $v) {
            $str = self::where('id',$v['id'])->update($v);
        }

        return 1;
    }

    public static function getNavId($parent_id)
    {
        $ids =self::select('id')->where('parent_id',$parent_id)->get()->toArray();

        return $ids;
    }
}

