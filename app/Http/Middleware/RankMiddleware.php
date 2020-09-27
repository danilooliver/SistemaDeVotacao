<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RankMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $rank)
    {
        if(Auth::user()->rank >= $rank){
            return $next($request);
        }
        else{
            return redirect('/');
        }
    }
}
