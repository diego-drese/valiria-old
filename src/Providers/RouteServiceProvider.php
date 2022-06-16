<?php
namespace Valiria\Auth\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;
use Valiria\Auth\Http\Middleware\Authorize;

class RouteServiceProvider extends ServiceProvider {
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */


    protected $namespace = 'Valiria\Auth\Http\Controllers';


    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot(){
        $this->aliasMiddleware('val.acl', Authorize::class);
        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map() {
        $this->mapApiRoutes();
    }


    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes() {
        Route::prefix('api')
            ->middleware('api')
            ->namespace($this->namespace)
            ->group(__DIR__ . '/../../routes/api.php');
    }
}
