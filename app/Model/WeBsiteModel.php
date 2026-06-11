<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Cache;

class WeBsiteModel extends Model
{
    protected $table = 'website';

    protected $fillable = [
        'logo','phone', 'email', 'weChat','location','qrcode'
    ];

    public  $timestamps = false;

    public static function upwebsite($data)
    {
        $str = self::where('id',$data['id'])->update($data);

        return $str;
    }

    public static function getWebSite()
    {
        /*if (!Cache::has('website')) {
            $website  = self::get()->toArray();
            Cache::put('website',$website,60*12);
        }*/

        return self::get()->toArray();
    }


}

