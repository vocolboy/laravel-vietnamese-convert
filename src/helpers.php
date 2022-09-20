<?php

use Vocolboy\VietnameseConvert\VietnameseCovert;

if (!function_exists('convert_vn_to_en')) {
    function convert_vn_to_en($str): string
    {
        return VietnameseCovert::toEn($str);
    }
}