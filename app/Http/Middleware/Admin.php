<?php

namespace App\Http\Middleware;

use App\Models\UserRole;
use Closure;
use Illuminate\Http\Request;

class Admin
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
        $roles = UserRole::getRoles();
        if(auth()->check() && in_array(auth()->user()->role->role, $roles) ) {
            return  $next($request);
        }

        return redirect()->route('admin.login');
    }
}
