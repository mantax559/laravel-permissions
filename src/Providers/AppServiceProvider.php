<?php

namespace Mantax559\LaravelPermissions\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    private const PATH_CONFIG = __DIR__.'/../../config/laravel-permissions.php';

    private const PATH_MIGRATIONS = __DIR__.'/../../database/migrations';

    public function boot(): void
    {
        $this->publishes([
            self::PATH_CONFIG => config_path('laravel-permissions.php'),
        ], 'config');

        $this->loadMigrationsFrom(self::PATH_MIGRATIONS);
    }

    public function register(): void
    {
        $this->mergeConfigFrom(self::PATH_CONFIG, 'laravel-permissions');
    }
}
