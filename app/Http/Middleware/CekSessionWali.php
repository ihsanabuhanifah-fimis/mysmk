<?php

namespace App\Http\Middleware;

use Closure;

class CekSessionWali
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
        if(auth()->user()->hasRole('wali')){  
            return $next($request);
        } else{
            return back();
        }
    }
}
