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
     * The path to your application's "home" route.
     *
     * Typically, users are redirected here after authentication.
     *
     * @var string
     */
    public const HOME = '/home';

    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     */
    public function boot(): void
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });

        $this->routes(function () {
            // API rotaları
            Route::middleware('api')
                ->prefix('api')
                ->group(base_path('routes/api.php'));

            // Web rotaları
            Route::middleware('web')
                ->group(base_path('routes/web.php'));

            // Panel rotalarını ekle
            $this->mapPanelRoutes();
        });
    }

    /**
     * Define the "panel" routes for the application.
     *
     * These routes are used for the admin panel and are loaded with the "web" middleware.
     */
    protected function mapPanelRoutes(): void
    {
        Route::middleware('web') // Panel rotaları için web middleware
        ->prefix('admin') // Panel URL'sinin başlangıcı
        ->group(base_path('routes/panel.php')); // Panel rotalarını panel.php'den al
    }
}
