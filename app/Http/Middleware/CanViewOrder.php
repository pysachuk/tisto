<?php

namespace App\Http\Middleware;

use App\Models\Order;
use Closure;
use Illuminate\Http\Request;

class CanViewOrder
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $order = Order::findOrFail($request->route('order'));
        $user = auth()->user();
        if( config('settings.orders_by_location') ) {
            if( $user->role->role === 'admin' ) {
                return $next($request);
            } else {
                if($user->locationKey === $order->location_key) {
                    return $next($request);
                } else {
                    return redirect()->route('admin.orders', 'new');
                }
            }
        } else {
            return $next($request);
        }

    }
}
