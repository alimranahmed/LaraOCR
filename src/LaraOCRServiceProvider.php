<?php

namespace Alimranahmed\LaraOCR;

use Alimranahmed\LaraOCR\Controllers\OcrController;
use Illuminate\Support\ServiceProvider;

class LaraOCRServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->loadRoutesFrom(__DIR__.'/routes.php');
        $this->app->make(OcrController::class);
    }
}
