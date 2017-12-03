<?php
/**
 * Created by PhpStorm.
 * User: imran
 * Date: 03/12/2017
 * Time: 19:34
 */

namespace Alimranahmed\LaraOCR\Services;


use File;

abstract class OCRInterface
{
    protected $imagePath;

    protected $outputText;

    public abstract function scan($imagePath);

    public function setImagePath($imagePath){
        if(!File::exist()){
            throw new \InvalidArgumentException('No image exists in the specified path');
        }
        $this->imagePath = $imagePath;
    }

    public function getImagePath(){
        return $this->imagePath;
    }

    public function getOutput(){
        return $this->outputText;
    }
}