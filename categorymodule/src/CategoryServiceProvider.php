<?php

namespace Invoidea\Categorymodule;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

class CategoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->loadRoutesFrom(__DIR__.'/routes/web.php');
        $this->loadViewsFrom(__DIR__.'/resources/views', 'catview');
        $this->loadMigrationsFrom(__DIR__.'/database/migrations');
        
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}   
