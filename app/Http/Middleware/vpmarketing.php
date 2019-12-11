<?php

namespace App\Http\Middleware;

use Closure;

class vpmarketing
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
        if($request->session()->get('status') != "VP Marketing"){
            return redirect('/products');
        }
        return $next($request);
    }
}
