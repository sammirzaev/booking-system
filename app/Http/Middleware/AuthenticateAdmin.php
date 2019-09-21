<?php

namespace App\Http\Middleware;

use Closure;

class AuthenticateAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = auth()->user()->roles()->get();
        if($user->isNotempty() && current(current($user))->name !== 'user'){
            return $next($request);
        }
        return redirect()->route('user.index')
            ->with(['error' => 'You do not have enough rights!']);
    }
}
