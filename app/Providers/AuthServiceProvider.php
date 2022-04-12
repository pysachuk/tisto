<?php

namespace App\Providers;

use App\Models\Order;
use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('view-admin-part', function (User $user){
            return $user->role->role == 'admin';
        });

        Gate::define('view-order', function (User $user){

            $order = Order::findOrFail(request()->route('order') ?? 0);
            if( config('settings.orders_by_location') ) {
                if( $user->role->role === 'admin' ) {
                    return true;
                } else {
                    if($user->locationKey === $order->location_key) {
                        return true;
                    } else {
                        return false;
                    }
                }
            } else {
                return true;
            }
        });
    }
}
