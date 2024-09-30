<?php

namespace App\Providers;

use App\Http\Middleware\IsAdmin;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Register middleware here
        $router = $this->app['router'];
        $router->aliasMiddleware('isAdmin', IsAdmin::class);
    }
}
