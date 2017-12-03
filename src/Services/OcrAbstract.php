<?php
/**
 * Created by PhpStorm.
 * User: imran
 * Date: 03/12/2017
 * Time: 19:34
 */

namespace Alimranahmed\LaraOCR\Services;



use Illuminate\Support\Facades\File;

abstract class OcrAbstract
{
    protected $imagePath;

    protected $image;

    protected $outputText;

    public abstract function scan($imagePath);

    public function setImagePath($imagePath){
        $this->image = new \Symfony\Component\HttpFoundation\File\File($imagePath);
        $this->imagePath = $imagePath;
        return $this->image;
    }

    public function getImagePath(){
        return $this->imagePath;
    }

    public function getImage(){
        return $this->image;
    }

    public function getOutput(){
        return $this->outputText;
    }
}