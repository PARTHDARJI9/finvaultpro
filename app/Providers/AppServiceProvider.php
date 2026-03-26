<?php

namespace App\Providers;

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
        // Deployment Rescue Protocol: Force cookie sessions if DB is local/invalid
        if (config('database.connections.mysql.host') === '127.0.0.1' || !config('database.default')) {
            config(['session.driver' => 'cookie']);
            config(['cache.default' => 'file']);
        }
    }
}
