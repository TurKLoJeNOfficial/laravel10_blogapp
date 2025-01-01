<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class SingleUserMiddleware
{
    public function handle($request, Closure $next)
    {
        // Sadece izin verilen email
        $allowedEmail = 'admin@gmail.com';

        // Kullanıcı giriş yapmış ve email uygunsa devam et
        if (Auth::check() && Auth::user()->email === $allowedEmail) {
            return $next($request);
        }

        // Yetkisiz erişim
        return redirect('/')->with('error', 'Unauthorized access.');
    }
}
