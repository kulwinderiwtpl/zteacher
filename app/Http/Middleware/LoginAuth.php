<?php

namespace App\Http\Middleware;

use App\Tool\Communal;
use Closure;

class LoginAuth
{

    public function handle($request, Closure $next)
    {
//        $http_referer = $_SERVER['HTTP_REFERER'];.$request->url()

        $member = $request->session()->get('myuser','');
        if($member == ''){
            return redirect('/CN/login?return_url='.$request->url());
        }

        return $next($request);
    }

}
