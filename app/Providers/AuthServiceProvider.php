<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
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

        Gate::define('access-admin', function ($user) {
            return $user->role->nom === 'admin';
        });

        Gate::define('access-users', function ($user) {
            return $user->role->nom === 'utilisateur';
        });

        Gate::define('access-users', function ($user) {
            return $user->role->nom === 'influenceur';
        });

        Gate::define('access-users', function ($user) {
            return $user->role->nom === 'entreprise';
        });


        // $this->registerPolicies();

        //
    }
}
