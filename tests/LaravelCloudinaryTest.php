<?php

namespace ijalnasution\LaravelCloudinary\Tests;

use ijalnasution\LaravelCloudinary\LaravelCloudinary;

class GeneralTest extends \Orchestra\Testbench\TestCase
{
    protected function getEnvironmentSetUp($app)
    {
        // Setup default database to use sqlite :memory:
        $app['config']->set('cloudder', [
            'cloudName'  => env('CLOUDINARY_CLOUD_NAME'),
            'baseUrl'    => env('CLOUDINARY_BASE_URL', 'http://res.cloudinary.com/'.env('CLOUDINARY_CLOUD_NAME')),
            'secureUrl'  => env('CLOUDINARY_SECURE_URL', 'https://res.cloudinary.com/'.env('CLOUDINARY_CLOUD_NAME')),
            'apiBaseUrl' => env('CLOUDINARY_API_BASE_URL', 'https://api.cloudinary.com/v1_1/'.env('CLOUDINARY_CLOUD_NAME')),
            'apiKey'     => env('CLOUDINARY_API_KEY'),
            'apiSecret'  => env('CLOUDINARY_API_SECRET'),
        ]);
    }

    public function testUploadImage()
    {
        $cloudinary = new LaravelCloudinary();

        // when
        $response = $cloudinary->uploadImage('http://res.cloudinary.com/demo/image/upload/couple.jpg');

        // then
        $expectedKey = 'url';

        // check
        $this->assertArrayHasKey($expectedKey, $response);
    }

    public function testUploadMultipleImages()
    {
        $images = [
          'http://res.cloudinary.com/demo/image/upload/couple.jpg'  ,
          'https://res.cloudinary.com/demo/image/upload/pizza.jpg',
          'https://res.cloudinary.com/demo/image/upload/sofa_cat.jpg'
        ];

        $cloudinary = new LaravelCloudinary();

        $response = $cloudinary->multipleUploadImages($images);

        dd($response);
    }
}
