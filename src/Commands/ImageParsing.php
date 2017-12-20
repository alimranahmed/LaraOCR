<?php

namespace Alimranahmed\LaraOCR\Commands;

use Alimranahmed\LaraOCR\Services\OcrAbstract;
use Illuminate\Console\Command;

class ImageParsing extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'image:parse {imagePath}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Parse image using absolute path';

    protected $imagePath;

    /**
     * ImageParsing constructor.
     * @param $imagePath
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->imagePath = $this->argument('imagePath');
        $ocr = app()->make(OcrAbstract::class);
        $parsedText = $ocr->scan($this->imagePath);
        $this->info('=================== Parsed Result ========================');
        $this->info('__________________________________________________________');
        $this->info($parsedText);
        $this->info('__________________________________________________________');
    }
}
