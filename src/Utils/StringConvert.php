<?php


namespace App\Utils;


class StringConvert
{
    /**
     * @param string $string
     * @return mixed
     */
    public static function numberOnly(string $string) {
        return reg_replace('/\D/', '', $string);
    }
}