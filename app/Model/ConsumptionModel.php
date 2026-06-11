<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use DB;

class ConsumptionModel extends Model
{
    protected $table = 'consumption';

    protected $fillable = [
        'type','tier1', 'tier2', 'tier3'
    ];

    public  $timestamps = false;


    public static function upConsumption($data)
    {
        $str = self::where('id',$data['id'])->update($data);

        return $str;
    }

    public static function addConsumption($data)
    {
        $str = self::insert($data);

        return $str;
    }

    public static function delConsumption($id)
    {
        $str = self::where('id',$id)->delete();

        return $str;
    }


}

