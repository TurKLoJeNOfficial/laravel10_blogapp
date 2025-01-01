<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        if (!$request->expectsJson()) {
            // Admin paneli için yönlendirme
            if ($request->is('admin/*')) {
                return route('admin.login');  // admin login rotasına yönlendiriyoruz
            }
            // Diğer kullanıcılar için varsayılan login yönlendirmesi
            return route('login');
        }
    }
}
