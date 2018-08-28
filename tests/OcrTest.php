<?php

namespace Alimranahmed\LaraOCR\Tests;


use Alimranahmed\LaraOCR\Facades\OCR;
use PHPUnit\Framework\TestCase;

class OcrTest extends TestCase
{
    public function testOcr()
    {
        $imagePath = __DIR__."../resources/sampleImages/1.jpg";
        $text = OCR::scan($imagePath);
        $this->assertTrue(strpos($text, "Example") !== false);
    }
}