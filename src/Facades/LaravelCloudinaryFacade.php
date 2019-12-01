<?php
namespace ijalnasution\LaravelCloudinary;

use Illuminate\Support\Facades\Facade;

class LaravelCloudinaryFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'LaravelCloudinary';
    }
}
