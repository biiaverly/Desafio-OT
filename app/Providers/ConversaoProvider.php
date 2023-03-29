<?php

namespace App\Providers;

use App\Interface\BancoRepositorio;
use App\Repositorios\EloquentRepositorio;
use Illuminate\Support\ServiceProvider;

class ConversaoProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(BancoRepositorio::class,EloquentRepositorio::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
