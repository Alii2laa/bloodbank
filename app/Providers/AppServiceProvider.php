<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer([
            'front.home',
            'front.layouts.footer',
            'front.contacts.contact',
            'front.about',
            'front.donations.create',
            'front.layouts.upperbar',
            'front.auth.create',
        ],'App\Http\View\Composers\SettingsComposer');
    }
}
