<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Dusterio\LumenPassport\LumenPassport;
use Laravel\Passport\Passport;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Boot Laravel\Lumen\Passport Routes
     *
     * @return void
     */
    public function boot()
    {
        LumenPassport::routes($this->app);
        Passport::tokensCan([
            '*' => 'Ability to do everything',
        ]);
    }
}
