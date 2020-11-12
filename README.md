Laravel Vietnamese Convert
==================

## Install (Laravel)
Install via composer
```bash
composer require vocolboy/laravel-vietnamese-convert
```

## Usage
```php
use \Illuminate\Support\Str;

Str::of('ĐẶNG QUỐC HUY')->convertVnToEn(); 

Str::convertVnToEn('ĐẶNG QUỐC HUY');

convert_vn_to_en('ĐẶNG QUỐC HUY');

//DANG QUOC HUY
```

