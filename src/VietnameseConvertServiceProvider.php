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
            'convertVnToEn',
            function ($string) {
                return VietnameseCovert::toEn($string);
            }
        );

        Stringable::macro(
            'convertVnToEn',
            function () {
                return new static(Str::convertVnToEn($this->value));
            }
        );
    }
}