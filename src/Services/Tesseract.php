<?php

namespace Alimranahmed\LaraOCR\Services;

class Tesseract extends OcrAbstract
{
    protected $command;

    public function scan($imagePath, $lang = null)
    {
        if ($lang === null) {
            $lang = env('OCR_LANG');
        }
        $this->setImagePath($imagePath);
        $shell = new Shell();

        $executable = config('lara_ocr.engines.tesseract.executable', 'tesseract');
        $langParam = ($lang !== null) ? ' -l '.$lang : '';

        $command = trim($executable.$langParam.' '.$imagePath.' stdout quiet');

        return $shell->execute($command);
    }
    
    // ToDo: implement function listLangs(): array
    // ToDo: implement function langSupported(string $lang): bool
}
