<?php

namespace App\Http\Middleware;

use App\Services\Cart\CartService;
use Closure;
use Illuminate\Http\Request;

class IsCart
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $cartService = new CartService();
        if (! $cartService->isEmpty())
            return $next($request);

        return redirect()->route('shop.main');
    }
}
