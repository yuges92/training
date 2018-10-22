<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\App;
class CartServiceProvide extends ServiceProvider
{
  /**
  * Bootstrap services.
  *
  * @return void
  */
  public function boot()
  {
    //
  }

  /**
  * Register services.
  *
  * @return void
  */
  public function register()
  {
    App::bind('cart', function()

    {
      return new \App\Cart;
    });
  }
}
