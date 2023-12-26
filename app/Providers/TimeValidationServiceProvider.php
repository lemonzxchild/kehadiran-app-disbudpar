<?php

// app/Providers/TimeValidationServiceProvider.php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;


class TimeValidationServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Validator::extend('time_format', function ($attribute, $value, $parameters, $validator) {
            // Check if the time string has 'H:i' format
            return preg_match('/^\d{2}:\d{2}$/', $value);
        });
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
