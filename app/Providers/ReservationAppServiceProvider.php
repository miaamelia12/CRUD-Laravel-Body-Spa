<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ReservationAppServiceProvider extends ServiceProvider
{
    
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $halaman = '';

        if (request()->segment(1) == 'homepage') {
            $halaman = 'homepage';
        }

        if (request()->segment(1) == 'reservation') {
            $halaman = 'reservation';
        }
        
        if (request()->segment(1) == 'about') {
            $halaman = 'about';
        }

        if (request()->segment(1) == 'store') {
            $halaman = 'store';
        }

        if (request()->segment(1) == 'treatment') {
            $halaman = 'treatment';
        }

        if (request()->segment(1) == 'user') {
            $halaman = 'user';
        }

        view()->share('halaman', $halaman);
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

}
