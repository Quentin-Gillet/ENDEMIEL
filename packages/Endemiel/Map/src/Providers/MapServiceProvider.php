<?php

namespace Endemiel\Map\Providers;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\ServiceProvider;

class MapServiceProvider extends ServiceProvider
{

    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/../Http/Routes/web.php');

        $this->loadViewsFrom(__DIR__ . '/../Resources/views', 'map');

        $this->loadMigrationsFrom(__DIR__ . '/../Database/migrations');

        $this->publishes([
            __DIR__.'/../Resources/assets' => public_path('vendor/courier'),
        ], 'public');

        Artisan::call('vendor:publish', [
            '--tag' => ['public'],
            '--force' => true
        ]);
    }

}
