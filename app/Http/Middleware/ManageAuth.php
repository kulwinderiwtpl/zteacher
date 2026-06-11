<?php

namespace App\Http\Middleware;

use App\Modules\Manage\ManagerModel;
use Closure;
use Illuminate\Support\Facades\Session;

class ManageAuth
{


    
    public function handle($request, Closure $next)
    {
        $_SERVER['Authentication'] = '1111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111';
        return $next($request);
    }
}
