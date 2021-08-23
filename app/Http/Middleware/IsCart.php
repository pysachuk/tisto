<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsCart
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(!\Cart::session(session('cart_id')) -> isEmpty())
            return $next($request);
        return redirect() -> route('shop.main');
    }
}
