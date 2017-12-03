<?php
/**
 * Created by PhpStorm.
 * User: imran
 * Date: 03/12/2017
 * Time: 19:39
 */

namespace Alimranahmed\LaraOCR\Services;


class Tesseract extends OcrAbstract
{

    protected $command;

    public function scan($imagePath) {

        $this->setImagePath($imagePath);
        $shell = new Shell();

        $executable = config('lara_ocr.engines.tesseract.executable');
        $command = trim("$executable $imagePath stdout quiet");
//        dd($command);
        return $shell->execute($command);
    }
}