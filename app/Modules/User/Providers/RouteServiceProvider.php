<?php
namespace App\Modules\User\Providers;

use App\Modules\Article\Model\NavCModel;
use Caffeinated\Modules\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
	
	protected $namespace = 'App\Modules\User\Http\Controllers';

	
	public function boot(Router $router)
	{
		parent::boot($router);
        Route::model('nav',NavCModel::class);
		
	}

	
	public function map(Router $router)
	{
		$router->group(['namespace' => $this->namespace], function($router)
		{
			require (config('modules.path').'/User/Http/routes.php');
		});
	}
}
