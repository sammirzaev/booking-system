<?php

namespace App\Http\Middleware;

use Closure;
use App\Traits\AuthRedirectTo;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    use AuthRedirectTo;
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            return redirect($this->redirectTo());
        }

        return $next($request);
    }
}
