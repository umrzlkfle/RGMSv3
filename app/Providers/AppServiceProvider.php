<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;

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
 *
 * @return void
 */
public function boot()
{

    Schema::defaultStringLength(191);

    // Gate for admin to access all features
    Gate::define('admin-access', function ($user) {
        return $user->userCategory === 'admin';
    });

    // Gate for staff to access only grants
    Gate::define('staff-access-grants', function ($user) {
        return $user->userCategory === 'staff';
    });

    // Gate for academician leader access
    Gate::define('academician-leader-access', function ($user) {
        if ($user->userCategory !== 'academician') {
            return false;
        }
        $academician = $user->academician; // Assuming a relationship exists
        return $academician && $academician->grants()
            ->wherePivot('role', 'project_leader')
            ->exists();
    });

    // Gate to prevent academician leader from creating grants or members
    Gate::define('create-grants-and-members', function ($user) {
        if ($user->userCategory !== 'academician') {
            return false;
        }
        $academician = $user->academician; // Assuming a relationship exists
        return $academician && !$academician->grants()
            ->wherePivot('role', 'project_leader')
            ->exists();
    });
}
}
