<?php

namespace Endemiel\Core\Providers;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\ServiceProvider;

class CoreServiceProvider extends ServiceProvider {

    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/../Http/Routes/web.php');

        $this->loadViewsFrom(__DIR__ . '/../Resources/views', 'core');

        $this->publishes([
            __DIR__.'/../Resources/assets' => public_path('vendor/courier'),
        ], 'public');

        Artisan::call('vendor:publish', [
            '--tag' => ['public'],
            '--force' => true
        ]);
    }

    public function register()
    {

    }

}
