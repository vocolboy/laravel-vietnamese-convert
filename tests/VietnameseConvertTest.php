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
        $this->assertEquals(convert_vn_to_en($vietnamese), $english);
    }

    /**
     * @dataProvider vietnameseConvertDataProvider
     * @param $vietnamese
     * @param $english
     */
    public function testStrMacroIsWorking($vietnamese, $english)
    {
        $this->assertEquals(Str::convertVnToEn($vietnamese), $english);

        $this->assertEquals(Str::convertVnToEn(mb_convert_case($vietnamese, MB_CASE_UPPER)), strtoupper($english));
        $this->assertEquals(Str::convertVnToEn(mb_convert_case($vietnamese, MB_CASE_LOWER)), strtolower($english));
    }

    /**
     * @dataProvider vietnameseConvertDataProvider
     * @param $vietnamese
     * @param $english
     */
    public function testStringableMacroIsWorking($vietnamese, $english)
    {
        $this->assertEquals(Str::of($vietnamese)->convertVnToEn(), $english);
        $this->assertEquals(Str::of($vietnamese)->upper()->convertVnToEn(), strtoupper($english));
        $this->assertEquals(Str::of($vietnamese)->lower()->convertVnToEn(), strtolower($english));
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
            [
                'NGUYỄN ĐÌNH THỌ',
                'NGUYEN DINH THO',
            ],
            [
                'Đào Quốc Tuấn',
                'Dao Quoc Tuan'
            ],
            [
                'Võ sỹ quế',
                'Vo sy que'
            ]
        ];
    }
}
