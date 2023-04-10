<?php

namespace Alimranahmed\LaraOCR;

use Alimranahmed\LaraOCR\Commands\ImageParsing;
use Alimranahmed\LaraOCR\Controllers\OcrController;
use Alimranahmed\LaraOCR\Services\OcrAbstract;
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
        if ($this->app->runningInConsole()) {
            $this->commands([
                ImageParsing::class,
            ]);
        }
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->loadRoutesFrom(__DIR__.'/routes.php');

        $this->loadViewsFrom(__DIR__.'/../views/lara_ocr', 'lara_ocr');

        $this->publishes([
            __DIR__ . '/../config/lara_ocr.php' => config_path('lara_ocr.php'),
            __DIR__ . '/../resources/' => resource_path('lara_ocr'),
            __DIR__ . '/../views/lara_ocr/' => resource_path('views/lara_ocr')
        ]);

        $this->app->make(OcrController::class);

        $this->app->singleton(OcrAbstract::class, function(){return $this->resolvedEngineClass();});

        $this->app->singleton('OCR', function(){return $this->resolvedEngineClass();});
    }

    private function resolvedEngineClass(){
        $namespace = 'Alimranahmed\LaraOCR\Services';
        $ocrEngine = config('lara_ocr.ocr_engine');
        $engineClass = config("lara_ocr.engines.{$ocrEngine}.class", 'Tesseract');
        $fullClassPath = "$namespace\\$engineClass";
        return new $fullClassPath();
    }
}
