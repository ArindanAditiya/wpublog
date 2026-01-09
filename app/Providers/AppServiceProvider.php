<?php

namespace App\Providers;

use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
         // agar beberapa method menggunakan bahasa indonesia
        Carbon::setLocale('id');

        /*  ketika aplikasinya di-booting saat pengerjaannya harus menggunakan eager load
            contohnya kalau lagi dalam kerja sama tim, 
            yang dimana semua tim harus mengerjakan menggunakan eagerload dalam loopingan
        */
        Model::preventLazyLoading();
    }
}
