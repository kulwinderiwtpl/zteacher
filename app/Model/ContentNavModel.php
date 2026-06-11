<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use DB;

class ContentNavModel extends Model
{
    //
    protected $table = 'content';
    protected $fillable = [
        'nav_id', 'title', 'introduce','content','image',
    ];
    public $timestamps = false;


    public static function getContent($nav_id)
    {
        $data = self::where('nav_id',$nav_id)->get()->toArray();

        return $data;
    }

    public static function upContent($data)
    {
        $str = self::where('id',$data['id'])->update($data);

        return $str;
    }

}

