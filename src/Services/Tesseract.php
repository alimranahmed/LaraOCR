<?php

namespace Alimranahmed\LaraOCR\Services;

class Tesseract extends OcrAbstract
{
    protected $command;

    protected function getExecutable()
    {
        return config('lara_ocr.engines.tesseract.executable', 'tesseract');
    }

    public function supportedLanguages()
    {
        $shell = new Shell();

        $command = trim($this->getExecutable().' --list-langs');

        $langArray = explode("\n", $shell->execute($command));
        array_shift($langArray);  // remove heading "List of available languages" from command result
        
        return $langArray;
    }

    public function languageSupported($lang)
    {
        return in_array($lang, $this->supportedLanguages());
    }

    public function scan($imagePath, $lang = null)
    {
        if ($lang === null) {
            $lang = config('lara_ocr.engines.tesseract.language');
        }
        $this->setImagePath($imagePath);
        $shell = new Shell();

        $langParam = ($lang !== null) ? ' -l '.$lang : '';

        $command = trim($this->getExecutable().$langParam.' '.$imagePath.' stdout quiet');

        return $shell->execute($command);
    }
}