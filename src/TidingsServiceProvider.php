<?php

 namespace Naviware\TidingsThroughMNotify;

 use Illuminate\Support\ServiceProvider;
 use Naviware\TidingsThroughMNotify\Tidings;

 class TidingsServiceProvider extends ServiceProvider {
    public function register()
    {
        // Register a class in the service container
        $this->app->bind('tidings', function ($app) {
            return new Tidings();
        });
    }

    public function boot()
    {
        //This publishes the package's config file for use to the application's config directory
        // for user customization. This only works if the package is booted from the console
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/config.php' => config_path('tidings.php'),
            ]);

        }
    }
 }

?>