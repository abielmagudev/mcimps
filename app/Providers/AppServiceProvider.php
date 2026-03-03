<?php

namespace App\Providers;

use App\Models\User\UserTypeEnum;
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
            return $user->type === UserTypeEnum::ADMINISTRADOR->value ? true : null;
            // Si retorna true, salta la Policy. Si retorna null, evalúa la Policy.
        });

        Gate::define('registrar-usa', function ($user) {
            return $user->type == UserTypeEnum::DOCUMENTADOR->value || 
                    $user->type === UserTypeEnum::ALMACEN->value ||
                    $user->type === UserTypeEnum::ALMACEN_USA->value;
        });

        Gate::define('registrar-mex', function ($user) {
            return $user->type == UserTypeEnum::DOCUMENTADOR->value || 
                    $user->type === UserTypeEnum::ALMACEN->value ||
                    $user->type === UserTypeEnum::ALMACEN_MEX->value;
        });
    }
}
