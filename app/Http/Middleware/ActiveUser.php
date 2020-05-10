<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class ActiveUser
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        if (Auth::user()->status == 'inactive') {
            auth()->logout();
            return redirect()->route('login')
                ->with('error','Your account was blocked at ');
        }

        return $next($request);

    }
}
