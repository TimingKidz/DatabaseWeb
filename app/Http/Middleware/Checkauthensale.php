<?php

namespace App\Http\Middleware;

use Closure;

class Checkauthensale
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
        
        if(strpos($request->session()->get('status'),'Sale') !== false){
            return redirect('/products');
        }
       
    
    return $next($request);
    }
}
