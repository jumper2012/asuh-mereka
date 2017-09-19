<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Authorize
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

        if(!empty($request->route()->parameters)){
            if (Auth::user()->id == $request->route()->parameters["id"]) {
                return $next($request);
            } else {
                 return redirect('/');
            }
        
        } else {
            return $next($request);
        }
    }
}
