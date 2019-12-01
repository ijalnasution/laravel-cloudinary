<?php
namespace ijalnasution\LaravelCloudinary;

use Illuminate\Support\ServiceProvider;
use ijalnasution\LaravelCloudinary\LaravelCloudinary;

class LaravelCloudinaryServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('LaravelCloudinary',function(){
            return new LaravelCloudinary();
        });
    }
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/config/cloudinary.php' => config_path('cloudinary.php'),
        ]);
    }
}
