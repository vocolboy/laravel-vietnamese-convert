<?php

namespace Vocolboy\VietnameseConvert;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use Illuminate\Support\Stringable;

class VietnameseConvertServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->registerMacroHelpers();
    }

    public function register()
    {
    }

    private function registerMacroHelpers()
    {
        Str::macro(
            'convertVietnameseToEnglish',
            function ($string) {
                return convert_vietnamese_to_english($string);
            }
        );

        Stringable::macro(
            'convertVietnameseToEnglish',
            function () {
                return new static(Str::convertVietnameseToEnglish($this->value));
            }
        );
    }
}