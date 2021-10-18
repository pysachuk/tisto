<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Carbon\Carbon;

class IsWorkTime
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
        if (Carbon::now()->between(config('app.WORK_TIME_START'), '24:00:00')
            OR
            Carbon::now()->between('00:00:01', config('app.WORK_TIME_END'))) {
            return $next($request);
        }

        else {
            return redirect()->back()
                ->with('message', 'Ми ще зачинені. Замовляйте з 10:00');
        }

    }
}
