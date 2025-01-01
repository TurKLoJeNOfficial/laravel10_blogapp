<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/about', [HomeController::class, 'about'])->name('about');

Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::post('/contact', [HomeController::class, 'store'])->name('contact.store');

Route::get('/post/{slug}', [HomeController::class, 'post'])->name('post');

// Fallback Route
Route::fallback(function () {
    return redirect()->route('home');
});

use Spatie\Sitemap\SitemapGenerator;

Route::get('/generate-sitemap', function () {
    SitemapGenerator::create(config('app.url'))
        ->writeToFile(public_path('sitemap.xml'));

    return 'Sitemap generated successfully.';
});
