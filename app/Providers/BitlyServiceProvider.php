<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use LeadThread\Bitly\Bitly;

class BitlyServiceProvider extends ServiceProvider
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
        $this->app->bind('LeadThread\Bitly\Bitly', function () {
            $token = config('bitly.token');

            return new Bitly($token);
        });
    }
}
