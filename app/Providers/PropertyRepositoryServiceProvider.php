<?php

namespace App\Providers;

use App\Contracts\PropertyRepositoryInterface;
use App\Repositories\PropertyRepository;
use Illuminate\Support\ServiceProvider;

class PropertyRepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(PropertyRepositoryInterface::class, PropertyRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
