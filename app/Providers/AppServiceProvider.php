<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Event;
// use App\Message;
use App\Events\MessageCreated;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Message::created(function ($message) {
        //     Event::fire(new MessageCreated($message));
        // });
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
