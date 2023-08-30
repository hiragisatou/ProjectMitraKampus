<?php

namespace App\Providers;

use App\Models\User;
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
        Gate::define('admin', function (User $user) {
            if ($user->role != null) {
                return $user->role->name == 'admin';
            } else {
                return false;
            }
        });
        Gate::define('prodi', function (User $user) {
            if ($user->role != null) {
                return $user->role->name == 'prodi';
            } else {
                return false;
            }
        });
        Gate::define('jurusan', function (User $user) {
            if ($user->role != null) {
                return $user->role->name == 'jurusan';
            } else {
                return false;
            }
        });
        Gate::define('mitra', function (User $user) {
            if ($user->role != null) {
                return $user->role->name == 'mitra';
            } else {
                return false;
            }
        });
    }
}
