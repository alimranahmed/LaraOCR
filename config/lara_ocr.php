<?php

return [
    //Define which OCR engine to use
    'ocr_engine' => 'tesseract',

    //Available OCR engines and their configuration
    'engines' => [
        'tesseract' => [
            'class' => 'Tesseract',
            'executable' => 'tesseract',
            'language' => env('OCR_LANG'),
        ],
    ],
];
