<?php

Route::get('ocr', 'Alimranahmed\LaraOCR\Controllers\OcrController@home')->name('home');

Route::post('ocr', 'Alimranahmed\LaraOCR\Controllers\OcrController@readImage');

Route::get('ocr/test', 'Alimranahmed\LaraOCR\Controllers\OcrController@test');
