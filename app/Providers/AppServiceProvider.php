<?php

namespace App\Providers;

use App\Models\SiteSetting;
use Illuminate\Support\Facades\URL;
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
        //
        if (env('APP_ENV') === 'production') {
            Url::forceScheme('https');
        }
        $SiteSetting = SiteSetting::first();
        view()->share('SiteSetting',$SiteSetting);
        date_default_timezone_set('Asia/Riyadh');

    }
}
