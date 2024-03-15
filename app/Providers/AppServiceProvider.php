<?php

namespace App\Providers;

use App\Repositories\IUserRepository;
use App\Repositories\UserAddress\IUserAddressRepository;
use App\Repositories\UserAddress\UserAddressRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(IUserRepository::class, UserRepository::class);
        $this->app->bind(IUserAddressRepository::class, UserAddressRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
