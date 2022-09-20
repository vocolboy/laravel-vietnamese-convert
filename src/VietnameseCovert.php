<?php

namespace Vocolboy\VietnameseConvert;

class VietnameseCovert
{
    /**
     * VSCII
     * https://en.wikipedia.org/wiki/VSCII#Character_set
     */
    const DIACRITIC = [
        '0300',
        '0309',
        '0303',
        '0301',
        '0323'
    ];

    const COMPARISON_TABLE = [
        '00C0' => 'A',//À
        '1EA2' => 'A',//Ả
        '00C3' => 'A',//Ã
        '00C1' => 'A',//Á
        '1EA0' => 'A',//Ạ
        '1EB6' => 'A',//Ặ
        '1EAC' => 'A',//Ậ
        '0102' => 'A',//Ă
        '00C2' => 'A',//Â
        '1EB0' => 'A',//Ằ
        '1EB2' => 'A',//Ẳ
        '1EB4' => 'A',//Ẵ
        '1EAE' => 'A',//Ắ
        '1EA6' => 'A',//Ầ
        '1EA8' => 'A',//Ẩ
        '1EAA' => 'A',//Ẫ
        '1EA4' => 'A',//Ấ
        '00C8' => 'E',//È
        '1EBA' => 'E',//Ẻ
        '1EBC' => 'E',//Ẽ
        '00C9' => 'E',//É
        '1EB8' => 'E',//Ẹ
        '1EC6' => 'E',//Ệ
        '00CA' => 'E',//Ê
        '1EC0' => 'E',//Ề
        '1EC2' => 'E',//Ể
        '1EC4' => 'E',//Ễ
        '1EBE' => 'E',//Ế
        '00CC' => 'I',//Ì
        '1EC8' => 'I',//Ỉ
        '0128' => 'I',//Ĩ
        '00CD' => 'I',//Í
        '1ECA' => 'I',//Ị
        '00D2' => 'O',//Ò
        '1ECE' => 'O',//Ỏ
        '00D5' => 'O',//Õ
        '00D3' => 'O',//Ó
        '1ECC' => 'O',//Ọ
        '1ED8' => 'O',//Ộ
        '1EDC' => 'O',//Ờ
        '1EDE' => 'O',//Ở
        '1EE0' => 'O',//Ỡ
        '1EDA' => 'O',//Ớ
        '1EE2' => 'O',//Ợ
        '00D4' => 'O',//Ô
        '01A0' => 'O',//Ơ
        '1ED2' => 'O',//Ồ
        '1ED4' => 'O',//Ổ
        '1ED6' => 'O',//Ỗ
        '1ED0' => 'O',//Ố
        '00DA' => 'U',//Ú
        '1EE4' => 'U',//Ụ
        '1EEA' => 'U',//Ừ
        '1EEC' => 'U',//Ử
        '1EEE' => 'U',//Ữ
        '1EE8' => 'U',//Ứ
        '1EF0' => 'U',//Ự
        '00D9' => 'U',//Ù
        '1EE6' => 'U',//Ủ
        '0168' => 'U',//Ũ
        '01AF' => 'U',//Ư
        '1EF2' => 'Y',//Ỳ
        '1EF6' => 'Y',//Ỷ
        '1EF8' => 'Y',//Ỹ
        '00DD' => 'Y',//Ý
        '1EF4' => 'Y',//Ỵ
        '0110' => 'D',//Đ
        '0103' => 'a',//ă
        '00E2' => 'a',//â
        '00E0' => 'a',//à
        '1EA3' => 'a',//ả
        '00E3' => 'a',//ã
        '00E1' => 'a',//á
        '1EA1' => 'a',//ạ
        '1EB1' => 'a',//ằ
        '1EB3' => 'a',//ẳ
        '1EB5' => 'a',//ẵ
        '1EAF' => 'a',//ắ
        '1EB7' => 'a',//ặ
        '1EA7' => 'a',//ầ
        '1EA9' => 'a',//ẩ
        '1EAB' => 'a',//ẫ
        '1EA5' => 'a',//ấ
        '1EAD' => 'a',//ậ
        '00EA' => 'e',//ê
        '00E8' => 'e',//è
        '1EBB' => 'e',//ẻ
        '1EBD' => 'e',//ẽ
        '00E9' => 'e',//é
        '1EB9' => 'e',//ẹ
        '1EC1' => 'e',//ề
        '1EC3' => 'e',//ể
        '1EC5' => 'e',//ễ
        '1EBF' => 'e',//ế
        '1EC7' => 'e',//ệ
        '00EC' => 'i',//ì
        '1EC9' => 'i',//ỉ
        '0129' => 'i',//ĩ
        '00ED' => 'i',//í
        '1ECB' => 'i',//ị
        '00F4' => 'o',//ô
        '01A1' => 'o',//ơ
        '1ECF' => 'o',//ỏ
        '00F5' => 'o',//õ
        '00F3' => 'o',//ó
        '1ECD' => 'o',//ọ
        '1ED3' => 'o',//ồ
        '1ED5' => 'o',//ổ
        '1ED7' => 'o',//ỗ
        '1ED1' => 'o',//ố
        '1ED9' => 'o',//ộ
        '1EDD' => 'o',//ờ
        '1EDF' => 'o',//ở
        '1EE1' => 'o',//ỡ
        '1EDB' => 'o',//ớ
        '1EE3' => 'o',//ợ
        '01B0' => 'u',//ư
        '00F9' => 'u',//ù
        '1EE7' => 'u',//ủ
        '0169' => 'u',//ũ
        '00FA' => 'u',//ú
        '1EE5' => 'u',//ụ
        '1EEB' => 'u',//ừ
        '1EED' => 'u',//ử
        '1EEF' => 'u',//ữ
        '1EE9' => 'u',//ứ
        '1EF1' => 'u',//ự
        '1EF3' => 'y',//ỳ
        '1EF7' => 'y',//ỷ
        '1EF9' => 'y',//ỹ
        '00FD' => 'y',//ý
        '1EF5' => 'y',//ỵ
        '0111' => 'd',//đ
        '20AB' => '$',//₫
    ];

    public static function toEn(string $string): string
    {
        $result = '';
        //remove diacritic
        foreach (mb_str_split($string) as $chr) {
            $codepoint = strtoupper(self::getChrCodepoint($chr));
            if (in_array($codepoint, self::DIACRITIC)) {
                continue;
            }

            if (array_key_exists($codepoint, self::COMPARISON_TABLE)) {
                $result .= self::COMPARISON_TABLE[$codepoint];
                continue;
            }

            $result .= $chr;
        }

        return $result;
    }

    public static function getChrCodepoint(string $character)
    {
        $hex = unpack('H*', mb_convert_encoding($character, 'UCS-4BE', 'UTF-8'))[1];
        return substr($hex, '-4');
    }
}