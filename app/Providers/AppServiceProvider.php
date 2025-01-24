<?php

namespace App\Providers;

use App\Events\PostCreated;
use App\Events\Roles\RoleCreated;
use App\Listeners\SendEmailPostCreated;
use App\Listeners\SendEmailRoleCreated;
use Illuminate\Support\Facades\Event;
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
        Gate::before(function ($user, $ability) {
            return $user->hasRole('Administrador') ? true : null;
        });

        Event::listen(
            RoleCreated::class,
            SendEmailRoleCreated::class
        );

        Event::listen(
            PostCreated::class,
            SendEmailPostCreated::class
        );
    }
}
