<?php

namespace Alimranahmed\LaraOCR\Controllers;


use Alimranahmed\LaraOCR\Services\OcrAbstract;
use App\Http\Controllers\Controller;

class OcrController extends Controller
{
    protected $ocr;

    public function __construct() {
        //$this->ocr = app()->make(OcrAbstract::class);
    }

    public function test(){

        $imagePath = resource_path('lara_ocr/sampleImages/1.jpg');
        //$this->ocr = app()->make(OcrAbstract::class);
        return \OCR::scan($imagePath);
        return $this->ocr->scan($imagePath);
    }

    public function home(){
        return view('lara_ocr/upload_image');
    }

    public function readImage(){
        $image = request('image');
        if(isset($image) && $image->getPathName()){
            $this->ocr = app()->make(OcrAbstract::class);
            $parsedText = $this->ocr->scan($image->getPathName());
            return view('lara_ocr.parsed_text', compact('parsedText'));
        }
    }
}