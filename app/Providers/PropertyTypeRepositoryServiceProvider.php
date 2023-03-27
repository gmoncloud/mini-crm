<?php

namespace App\Providers;

use App\Contracts\PropertyTypeRepositoryInterface;
use App\Repositories\PropertyTypeRepository;
use Illuminate\Support\ServiceProvider;

class PropertyTypeRepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(PropertyTypeRepositoryInterface::class, PropertyTypeRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
