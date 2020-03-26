<?php

namespace ijalnasution\LaravelCloudinary;

use Cloudinary;
use Cloudinary\Api;
use Cloudinary\Uploader;
use JD\Cloudder\CloudinaryWrapper;

class LaravelCloudinary extends CloudinaryWrapper
{
    const IMAGE_TYPE = 'image';
    const VIDEO_TYPE = 'video';

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

    public function uploadMedia(String $type, String $mediaPath, string $folder, string $filename, array $otherOptions = [])
    {
        $options = [
            'public_id' => $filename,
            'folder' => $folder
        ];

        $options = array_merge($options, $otherOptions);

        try {
            if ($type === self::IMAGE_TYPE) {
                $uploaded = $this->cloudinaryWrapper->upload($mediaPath, null, $options);

                return $uploaded->uploadedResult;
            } else if ($type === self::VIDEO_TYPE) {
                $uploaded = $this->cloudinaryWrapper->uploadVideo($mediaPath, null, $options);

                return $uploaded->uploadedResult;
            }
        } catch (\Throwable $th) {
            throw new Exception("Wrong Media Type", 1);
        }
    }

    public function multipleUploadMedias(String $type, array $mediaPaths, string $folder, string $filename)
    {
        $results = [];
        foreach ($mediaPaths as $key => $mediaPath) {
            $options = [
                'public_id' => $key === 0 ? $filename : $filename.'_'.$key,
                'folder' => $folder
            ];

            try {
                if ($type === self::IMAGE_TYPE) {
                    $uploaded = $this->cloudinaryWrapper->upload($mediaPath, null, $options);

                    array_push($results, $uploaded->uploadedResult);
                } else if ($type === self::VIDEO_TYPE) {
                    $uploaded = $this->cloudinaryWrapper->uploadVideo($mediaPath, null, $options);

                    array_push($results, $uploaded->uploadedResult);
                }
            } catch (\Throwable $th) {
                throw new Exception("Wrong Media Type", 1);
            }
        }

        return $results;
    }

}
