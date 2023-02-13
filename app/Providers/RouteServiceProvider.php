<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to the "home" route for your application.
     *
     * Typically, users are redirected here after authentication.
     *
     * @var string
     */
    public const HOME = '/home';
    public const ADMIN = 'admin/home';
    protected $namespace = 'App\Http\Controllers';
    //protected $adminnamespace = 'App\Http\Controllers\Admin';

    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     *
     * @return void
     */
    public function boot()
    {
        $this->configureRateLimiting();

        $this->mapWebRoutes();
        $this->mapWebAdminRoutes();
        $this->mapApiRoutes();

        
    }

    protected function mapWebRoutes()
    {
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/web-user.php'));
    }

    protected function mapWebAdminRoutes()
    {
        Route::middleware('web')
            ->prefix('admin')
            ->as('admin.')
            ->namespace($this->namespace)
            ->group(base_path('routes/web-admin.php'));
    }

    protected function mapApiRoutes()
    {
        Route::middleware('api')
                ->prefix('api')
                ->group(base_path('routes/api.php'));
    }
    /**
     * Configure the rate limiters for the application.
     *
     * @return void
     */
    protected function configureRateLimiting()
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });
    }
}
