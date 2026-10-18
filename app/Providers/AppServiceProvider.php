<?php

namespace App\Providers;

use App\Models\RunningText;
use App\Models\SiteSetting;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        View::composer('*', function ($view) {
            try {
                if (Schema::hasTable('site_settings')) {
                    $view->with('siteName', SiteSetting::get('site_name', 'Desa Ciwiru'));
                    $view->with('siteTagline', SiteSetting::get('site_tagline', 'Desa Berdaya, Maju, dan Sejahtera'));
                    $view->with('siteLogo', SiteSetting::get('site_logo', 'img/logo.png'));
                    $view->with('siteAddress', SiteSetting::get('site_address', 'Jl. Raya Desa Ciwiru No. 01, Kec. Pasawahan, Kab. Kuningan'));
                    $view->with('sitePhone', SiteSetting::get('site_phone', '+62 822-0000-0000'));
                    $view->with('siteEmail', SiteSetting::get('site_email', 'info@desa-ciwiru.id'));
                }
                if (Schema::hasTable('running_texts')) {
                    $view->with('runningTexts', RunningText::where('is_active', true)->orderBy('sort_order')->get());
                }
            } catch (\Throwable $e) {
                $view->with('siteName', 'Desa Ciwiru');
                $view->with('runningTexts', collect());
            }
        });
    }
}
