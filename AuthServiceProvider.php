<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Laravel\Passport\Passport;



class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        // Ini WAJIB untuk mendaftarkan semua route dan command Passport
        Passport::loadKeysFrom(storage_path('oauth-public.key'));
        
        // Passport::routes();

        // Untuk command passport:install => harus ada ini
        // if ($this->app->runningInConsole()) {
        //     Passport::ignoreRoutes(); // optional
        // }
    }
}
