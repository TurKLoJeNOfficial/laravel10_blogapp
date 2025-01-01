<?php

namespace App\Providers;

use App\Models\Setting;
use App\Models\SocialMedia;
use Illuminate\Support\Facades\View;
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
        // Header için verileri sağla
        View::composer('homepage.layout.layout', function ($view) {
            $settings = Setting::first(); // Veritabanında tek bir satır varsa.
            $view->with([
                'title' => $settings->title,
                'description' => $settings->description,
                'keywords' => $settings->keywords,
                'author' => $settings->author,
            ]);
        });

        // Footer için verileri sağla
        View::composer('homepage.inc.footer', function ($view) {
            $footerContent = Setting::first()->footer; // Footer verisi
            $view->with('footerContent', $footerContent);
        });

        // Header için verileri sağla
        View::composer('homepage.inc.header', function ($view) {
            $settings = Setting::first(); // Veritabanında tek bir satır varsa.
            $view->with([
                'title' => $settings->title,
            ]);
        });



        // Tüm view'lara sosyal medya linklerini gönder
        View::composer('homepage.inc.footer', function ($view) {
            $socialMediaLinks = SocialMedia::where('status', '1')->get();
            $view->with('socialMediaLinks', $socialMediaLinks);
        });
    }
}
