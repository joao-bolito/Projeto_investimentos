<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckAuthentication
{
    public function handle($request, Closure $next)
    {
        if (!Auth::check()) {
            return redirect('entrar')->with('error', 'Você precisa estar logado!');
        }

        return $next($request);
    }
}
