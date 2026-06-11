<?php

namespace App\Http\Controllers;

use App\Modules\Article\Model\NavCModel;
use App\Modules\Article\Model\NavEModel;
use App\Modules\Article\Model\RecruitModel;
use App\Modules\Article\Model\WeBsiteModel;
use App\Tool\Communal;
use Illuminate\Http\Request;

class IndexController extends Controller
{

    public function index(Request $request)
    {
        $ip = Communal::getip();

        $bool = Communal::getIPcountry($ip);
     //dd($bool);
        if ($bool) {
            return redirect()->to('index');//中文
        } else {
            return redirect()->to('indexEN'); //英文
        }
    }


}

















