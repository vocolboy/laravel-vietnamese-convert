<?php

if (! function_exists('convert_vn_to_en')) {
    function convert_vn_to_en($str)
    {
        //it might be a combination of two characters
        $str = str_replace('̣','',$str);
        $str = str_replace('́','',$str);
        $str = str_replace('̃','',$str);

        //https://art-hanoi.com/vncode/
        $comparisonTable = [
            ['/(á|à|ã|ả|ạ|â|ấ|ầ|ẫ|ẩ|ậ|ă|ắ|ằ|ẵ|ẳ|ặ)/', 'a'],
            ['/(é|è|ẽ|ẻ|ẹ|ê|ế|ề|ễ|ể|ệ)/', 'e'],
            ['/(í|ì|ì|ĩ|ỉ|ị)/', 'i'],
            ['/(ó|ò|õ|ỏ|ọ|ô|ố|ồ|ỗ|ổ|ộ|ơ|ớ|ờ|ỡ|ở|ợ)/', 'o'],
            ['/(ú|ù|ũ|ủ|ụ|ư|ứ|ừ|ữ|ử|ự)/', 'u'],
            ['/(ý|ỳ|ỹ|ỷ|ỵ)/', 'y'],
            ['/(đ)/', 'd'],
            ['/(Á|À|Ã|Ả|Ạ|Â|Ấ|Ầ|Ẫ|Ẩ|Ậ|Ă|Ắ|Ằ|Ẵ|Ẳ|Ặ)/', 'A'],
            ['/(É|È|Ẽ|Ẻ|Ẹ|Ê|Ế|Ề|Ễ|Ể|Ệ)/', 'E'],
            ['/(Í|Ì|Ì|Ĩ|Ỉ|Ị)/', 'I'],
            ['/(Ó|Ò|Õ|Ỏ|Ọ|Ô|Ố|Ồ|Ỗ|Ổ|Ộ|Ơ|Ớ|Ờ|Ỡ|Ở|Ợ)/', 'O'],
            ['/(Ú|Ù|Ũ|Ủ|Ụ|Ư|Ứ|Ừ|Ữ|Ử|Ự)/', 'U'],
            ['/(Ý|Ỳ|Ỹ|Ỷ|Ỵ)/', 'Y'],
            ['/(Đ)/', 'D'],
            ['/(₫)/', '$'],
        ];

        foreach ($comparisonTable as $item) {
            $str = preg_replace($item[0], $item[1], $str);
        }

        return $str;
    }
}