<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrapFive();

        // Cek apakah user adalah admin
        Gate::define('is-admin', function(User $user) {
            // Default
            return $user->is_admin == 1;

            // Dengan custom message
            // return $user->is_admin == 1 ? Response::allow() : Response::deny('You must be an administrator.');
        });
    }
}
