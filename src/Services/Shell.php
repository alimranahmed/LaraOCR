<?php

namespace Alimranahmed\LaraOCR\Services;


class Shell
{
    public function execute($command){
        return trim(`{$command}`);
    }
}