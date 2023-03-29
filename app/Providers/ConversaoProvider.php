<?php

namespace App\Providers;

use App\Interface\BancoRepositorio;
use App\Interface\ConversaoInterface;
use App\Repositorios\EloquentRepositorio;
use App\Services\ConversaoService;
use Illuminate\Support\ServiceProvider;

class ConversaoProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(BancoRepositorio::class,EloquentRepositorio::class);
        $this->app->singleton(ConversaoInterface::class,ConversaoService::class);

    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
