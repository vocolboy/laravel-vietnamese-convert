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

Str::of('ĐẶNG QUỐC HUY')->convertVietnameseToEnglish(); 

Str::convertVietnameseToEnglish('ĐẶNG QUỐC HUY');

convert_vietnamese_to_english('ĐẶNG QUỐC HUY');

//DANG QUOC HUY
```

