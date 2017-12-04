<?php

namespace Alimranahmed\LaraOCR\Controllers;


use Alimranahmed\LaraOCR\Services\OcrAbstract;
use App\Http\Controllers\Controller;
use OCR;

class OcrController extends Controller
{
    protected $ocr;

    public function home(){
        return view('lara_ocr/upload_image');
    }

    public function readImage(){
        $image = request('image');
        if(isset($image) && $image->getPathName()){
            $ocr = app()->make(OcrAbstract::class);
            $parsedText = $ocr->scan($image->getPathName());
            return view('lara_ocr.parsed_text', compact('parsedText'));
        }
    }

    public function test(){
        $imagePath = resource_path('lara_ocr/sampleImages/1.jpg');
        return OCR::scan($imagePath);
    }
}