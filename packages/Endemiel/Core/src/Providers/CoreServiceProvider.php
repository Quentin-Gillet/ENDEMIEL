<?php

namespace Endemiel\Core\Providers;

use Illuminate\Support\ServiceProvider;

class CoreServiceProvider extends ServiceProvider {

    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/../Http/Routes/web.php');

        $this->loadViewsFrom(__DIR__ . '/../Resources/views', 'core');
    }

    public function register()
    {

    }

}
