<?php

namespace App\Providers;

use Event;
use Illuminate\Support\ServiceProvider;
use App\Message;
use App\Events\MessageCreated;
use Illuminate\Support\Facades\URL;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
          Message::created(function ($message) {
            Event::fire(new MessageCreated($message));
         });
         
         if ($this->app->environment() == 'production') {
          URL::forceSchema('https');
      }
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
