<?php

namespace Alimranahmed\LaraOCR;

use Alimranahmed\LaraOCR\Controllers\OcrController;
use Alimranahmed\LaraOCR\Services\OcrAbstract;
use Alimranahmed\LaraOCR\Services\Tesseract;
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

        $this->loadViewsFrom(__DIR__.'../views/lara_ocr', 'lara_ocr');

        $this->publishes([
            __DIR__ . '/../config/lara_ocr.php' => config_path('lara_ocr.php'),
            __DIR__ . '/../resources/' => resource_path('lara_ocr'),
            __DIR__ . '/../views/lara_ocr/' => resource_path('views/lara_ocr')
        ]);

        $this->app->make(OcrController::class);

        $this->app->singleton(OcrAbstract::class, Tesseract::class);

        $this->app->singleton('OCR', Tesseract::class);
    }
}
