# Laravel Cloudinary Uploader
Custom package for private usage, thanks to `jrm2k6/cloudder`

## Installation
The best way to use this package is using [composer](https://getcomposer.org/)
```
composer require ijalnasution/laravel-cloudinary
```

## Usage
publish package vendor 
```php
php artisan vendor:publish
```

### How to Use
#### Upload Single Image
```php
use LaravelCloudinary;

$image = "http://res.cloudinary.com/demo/image/upload/couple.jpg";

LaravelCloudinary::uploadImage($image, $folderName, $fileName);
```

#### Upload Multiple Image
```php
use LaravelCloudinary;

$images = [    
    'http://res.cloudinary.com/demo/image/upload/couple.jpg'  ,
    'https://res.cloudinary.com/demo/image/upload/pizza.jpg',
    'https://res.cloudinary.com/demo/image/upload/sofa_cat.jpg'
];

LaravelCloudinary::multipleUploadImages($images, $folderName, $fileName);
```

## Contribute
Feel free to contribute or give suggestions.
Thank you.

## Authors

* **Syah Rizal** - *Initial work*
