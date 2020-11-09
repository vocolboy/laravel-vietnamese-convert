<?php

namespace Vocolboy\VietnameseConvert\Test;

use Illuminate\Support\Str;
use Orchestra\Testbench\TestCase;
use Vocolboy\VietnameseConvert\VietnameseConvertServiceProvider;

class VietnameseConvertTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
    }

    protected function getPackageProviders($app)
    {
        return [
            VietnameseConvertServiceProvider::class,
        ];
    }

    /**
     * @dataProvider vietnameseConvertDataProvider
     * @param $vietnamese
     * @param $english
     */
    public function testConvertToEnglish($vietnamese, $english)
    {
        $this->assertEquals(convert_vietnamese_to_english($vietnamese), $english);
    }

    /**
     * @dataProvider vietnameseConvertDataProvider
     * @param $vietnamese
     * @param $english
     */
    public function testStrMacroIsWorking($vietnamese, $english)
    {
        $this->assertEquals(Str::convertVietnameseToEnglish($vietnamese), $english);
    }

    /**
     * @dataProvider vietnameseConvertDataProvider
     * @param $vietnamese
     * @param $english
     */
    public function testStringableMacroIsWorking($vietnamese, $english)
    {
        $this->assertEquals(Str::of($vietnamese)->convertVietnameseToEnglish(), $english);
    }

    public function vietnameseConvertDataProvider(): array
    {
        return [
            [
                'ĐẶNG QUỐC HUY',
                'DANG QUOC HUY',
            ],
            [
                'HỒ SỸ ĐÔNG',
                'HO SY DONG',
            ],
            [
                'HOÀNG ĐẶNG TRÍ BẢO',
                'HOANG DANG TRI BAO',
            ],
            [
                'Cảnh biển vào buổi sáng',
                'Canh bien vao buoi sang',
            ],
        ];
    }
}