<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use DB;

class AverageWageModel extends Model
{
    protected $table = 'averagewage';

    protected $fillable = [
        'genre','tier1', 'tier2', 'tier3','tier1En','tier2En','tier3En'
    ];

    public  $timestamps = false;


    public static function upAverageWage($data)
    {
        $str = self::where('id',$data['id'])->update($data);

        return $str;
    }


}

