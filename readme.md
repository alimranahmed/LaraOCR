## LaraOCR
Laravel Optical Character Reader(OCR) package using ocr engines like [Tesseract](https://github.com/tesseract-ocr/tesseract) under the hood. 

## Features
1. Read text from image using WebUI/Programing Interface
2. Can be used as Laravel Facade
3. Configurable and extendable


## Requirements
OCR Engine Tesseract should be install in the system(e.g. for ubuntu `sudo apt-get install tesseract-ocr`). Follow Tesseract installation guide [here](https://github.com/tesseract-ocr/tesseract/wiki#installation). Make sure from the command line you have the `tesseract` command available. 
 
## Installation 
1. Update your project's `composer.json` file as bellow:

    ```
    "require": {
        "alimranahmed/laraocr": "dev-master"
    }
    ```
    then execute `composer update`
    
2. execute the following command to publish all relevant files:

    ```
    php artisan vendor:publish
    ```

3. Add the following line in the `providers` array of `config/app.php`
    ```
    Alimranahmed\LaraOCR\LaraOCRServiceProvider::class,
    ```
    
    and following line in the `allias` array of the same file
    
    ```
    'OCR' => Alimranahmed\LaraOCR\Facades\OCR::class,
    ``` 

## Usages
This package can be used to read text from image to text using different type of interface like Web and Programming. 

##### Programming
From anywhere of your code you can simply access the `OCR` facade to scan image as below:

```
\OCR::scan($imagePath);
```

##### WebUI
After successful installation of this package we already have a web interface to parse text from image. Simply go to `{project-url}/ocr`, select your image then click the `Parse Image` button. 

![select_image](https://user-images.githubusercontent.com/7629427/33532834-fa434742-d894-11e7-8cce-65afb26a8af0.png)

**Upload Image**





![selected_image](https://user-images.githubusercontent.com/7629427/33533003-5487324e-d896-11e7-8b89-eb8fd5aa5e83.png)

**Uploaded Image**





![output](https://user-images.githubusercontent.com/7629427/33533013-63d7b1a6-d896-11e7-8a3b-badd2203ae83.png)

**Parsed text**

## Wish list
- [x] Artisan command to read image and show parsed text from CLI
- [ ] Restful API to accept image and return parsed text
- [ ] Multilingual support
- [ ] Adding More options which are already available in OCR engines 

## License
This package is licensed under [Apache License, Version 2.0](http://www.apache.org/licenses/LICENSE-2.0)
