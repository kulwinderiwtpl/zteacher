<?php

namespace App\Http\Middleware;

use App\Tool\Communal;
use Closure;

class ENLoginAuth
{

    public function handle($request, Closure $next)
    {
//        $http_referer = $_SERVER['HTTP_REFERER'];.$request->url()

        $member = $request->session()->get('foreignUser','');
        if($member == ''){
            /*$ip = Communal::getip();
            if (Communal::getIPcountry($ip)) {
                return redirect('/CN/login?return_url='.$request->url());
            } else {

            }*/
            return redirect('/EN/login?return_url='.$request->url());
        }

        return $next($request);
    }

}
