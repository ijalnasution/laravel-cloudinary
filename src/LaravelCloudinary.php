<?php

namespace Ijalnasution\LaravelCloudinary;

use Cloudinary;
use Cloudinary\Api;
use Cloudinary\Uploader;
use JD\Cloudder\CloudinaryWrapper;

class LaravelCloudinary extends CloudinaryWrapper
{
    protected $builder;

    public $env = 'dev';

    public function __construct()
    {
        $this->cloudinaryWrapper = new CloudinaryWrapper(config(), new Cloudinary, new Uploader, new Api);
    }

    public function env($env = 'dev')
    {
        $this->env = $env;
    }

    public function uploadImage(String $imagePath)
    {
        $uploaded = $this->cloudinaryWrapper->upload($imagePath);

        return $uploaded->uploadedResult;
    }

    public function multipleUploadImages(array $imagePaths)
    {
        $results = [];
        foreach ($imagePaths as $imagePath) {
            $uploaded = $this->cloudinaryWrapper->upload($imagePath);

            array_push($results, $uploaded->uploadedResult);
        }

        return $results;
    }

}
