<?php

namespace App\Providers;

use App;
use Illuminate\Support\ServiceProvider;

class ItemMenuServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
         App::bind('ItemMenu',function() {
         return new App\ItemMenu\ItemMenuFacades();
      });
    }
}
