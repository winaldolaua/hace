<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;
use App\Models\User;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
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
        Gate::define('bpjph',fn(User $user) => $user->role->name === 'bpjph');
        Gate::define('penyelia',fn(User $user) => $user->role->name === 'penyelia');
        Gate::define('auditor',fn(User $user) => $user->role->name === 'auditor');
        Gate::define('mui',fn(User $user) => $user->role->name === 'mui');
        Paginator::useBootstrap();
    }
}
