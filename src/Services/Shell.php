<?php
/**
 * Created by PhpStorm.
 * User: imran
 * Date: 03/12/2017
 * Time: 20:08
 */

namespace Alimranahmed\LaraOCR\Services;


class Shell
{
    public function execute($command){
        return trim(`{$command}`);
    }
}