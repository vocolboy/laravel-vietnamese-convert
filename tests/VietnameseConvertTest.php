<?php

namespace Vocolboy\VietnameseConvert\Test;

use Illuminate\Support\Str;
use Orchestra\Testbench\TestCase;
use Vocolboy\VietnameseConvert\VietnameseConvertServiceProvider;

class VietnameseConvertTest extends TestCase
{
    protected function getPackageProviders($app): array
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
        $this->assertEquals($english, convert_vn_to_en($vietnamese));
    }

    /**
     * @dataProvider vietnameseConvertDataProvider
     * @param $vietnamese
     * @param $english
     */
    public function testStrMacroIsWorking($vietnamese, $english)
    {
        $this->assertEquals($english, Str::convertVnToEn($vietnamese));

        $this->assertEquals(strtoupper($english), Str::convertVnToEn(mb_convert_case($vietnamese, MB_CASE_UPPER)));
        $this->assertEquals(strtolower($english), Str::convertVnToEn(mb_convert_case($vietnamese, MB_CASE_LOWER)));
    }

    /**
     * @dataProvider vietnameseConvertDataProvider
     * @param $vietnamese
     * @param $english
     */
    public function testStringableMacroIsWorking($vietnamese, $english)
    {
        $this->assertEquals($english, Str::of($vietnamese)->convertVnToEn());
        $this->assertEquals(strtoupper($english), Str::of($vietnamese)->upper()->convertVnToEn());
        $this->assertEquals(strtolower($english), Str::of($vietnamese)->lower()->convertVnToEn());
    }

    public function testNullShouldWork()
    {
        $this->assertEquals('', Str::of(null)->convertVnToEn());
        $this->assertEquals('', Str::convertVnToEn(null));
        $this->assertEquals('', convert_vn_to_en(null));
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
            ],
            [
                'Đặng Trung Khang',
                'Dang Trung Khang'
            ],
            [
                'Vọ',
                'Vo'
            ],
            [
                'Lê văn hoàng',
                'Le van hoang'
            ],
            [
                'nguyễn quốc toàn',
                'nguyen quoc toan'
            ],
            [
                'Vũ Văn Đước',
                'Vu Van Duoc'
            ],
            [
                'Lê phan hòa hiệp',
                'Le phan hoa hiep'
            ]
        ];
    }
}
