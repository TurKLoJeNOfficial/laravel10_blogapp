<?php

use App\Http\Controllers\Backend\AboutController;
use App\Http\Controllers\Backend\BlogController;
use App\Http\Controllers\Backend\ContactController;
use App\Http\Controllers\Backend\HomeController;
use App\Http\Controllers\Backend\MessageController;
use App\Http\Controllers\Backend\SocialMediaController;
use App\Http\Controllers\Backend\SettingsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Auth\AdminLoginController;

// Admin login routes
Route::get('/login', [AdminLoginController::class, 'showLoginForm'])->name('admin.login');
Route::post('/login', [AdminLoginController::class, 'login'])->name('admin.login.post');
Route::post('/logout', [AdminLoginController::class, 'logout'])->name('admin.logout');

// Admin Panel Routes (Protected by auth:admin middleware)
Route::middleware(['auth:admin'])->group(function () {

    // Default route for `/admin` to redirect to `/admin/dashboard`
    Route::get('/', function () {
        return redirect()->route('admin.dashboard');
    })->name('admin.dashboard'); // Optional name for the route

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    Route::get('/about', [AboutController::class, 'index'])->name('admin.about');
    Route::post('/about/edit', [AboutController::class, 'edit'])->name('about.edit');

    Route::get('/home', [HomeController::class, 'index'])->name('admin.home');
    Route::post('/home/edit', [HomeController::class, 'edit'])->name('home.edit');

    Route::get('/contact', [ContactController::class, 'index'])->name('admin.contact');
    Route::post('/contact/edit', [ContactController::class, 'edit'])->name('contact.edit');

    Route::get('/message', [MessageController::class, 'index'])->name('admin.message');
    Route::get('/messages/{id}', [MessageController::class, 'show'])->name('messages.show');

    Route::get('/blog', [BlogController::class, 'index'])->name('admin.blog');
    Route::get('/blog/{id}/edit', [BlogController::class, 'edit'])->name('blog.edit');
    Route::put('/blog/{id}', [BlogController::class, 'update'])->name('blog.update');
    Route::delete('/blog/{id}', [BlogController::class, 'destroy'])->name('blog.destroy');
    // Add Blog Routes
    Route::get('/blog/create', [BlogController::class, 'create'])->name('blog.create');
    Route::post('/blog', [BlogController::class, 'store'])->name('blog.store');

    Route::get('/socialmedia', [SocialMediaController::class, 'index'])->name('admin.socialmedia');
    Route::get('/socialmedia/{id}/edit', [SocialMediaController::class, 'edit'])->name('socialmedia.edit');
    Route::put('/socialmedia/{id}', [SocialMediaController::class, 'update'])->name('socialmedia.update');
    Route::delete('/socialmedia/{id}', [SocialMediaController::class, 'destroy'])->name('socialmedia.destroy');
    // Add Blog Routes
    Route::get('/socialmedia/create', [SocialMediaController::class, 'create'])->name('socialmedia.create');
    Route::post('/socialmedia', [SocialMediaController::class, 'store'])->name('socialmedia.store');

    Route::get('/settings', [SettingsController::class, 'index'])->name('admin.settings');
    Route::post('/settings/edit', [SettingsController::class, 'edit'])->name('settings.edit');

});



