<?php
/**
 * Created by PhpStorm.
 * User: imran
 * Date: 03/12/2017
 * Time: 18:54
 */

namespace Alimranahmed\LaraOCR\Controllers;


use Alimranahmed\LaraOCR\Services\OcrAbstract;
use Alimranahmed\LaraOCR\Services\Tesseract;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Artisan;

class OcrController extends Controller
{
    public function read(){
        $ocr = app()->make(OcrAbstract::class);

        $imagePath = resource_path('lara_ocr/sampleImages/1.jpg');

        return $ocr->scan($imagePath);
    }
}