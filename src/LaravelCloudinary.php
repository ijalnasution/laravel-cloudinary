<?php

namespace ijalnasution\LaravelCloudinary;

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

    public function uploadImage(String $imagePath, string $folder, string $filename, array $otherOptions = [])
    {
        $options = [
            'public_id' => $filename,
            'folder' => $folder
        ];

        $options = array_merge($options, $otherOptions);

        $uploaded = $this->cloudinaryWrapper->upload($imagePath, null, $options);

        return $uploaded->uploadedResult;
    }

    public function multipleUploadImages(array $imagePaths, string $folder, string $filename)
    {
        $results = [];
        foreach ($imagePaths as $key => $imagePath) {
            $options = [
                'public_id' => $key === 0 ? $filename : $filename.'_'.$key,
                'folder' => $folder
            ];

            $uploaded = $this->cloudinaryWrapper->upload($imagePath, null, $options);

            array_push($results, $uploaded->uploadedResult);
        }

        return $results;
    }

}
