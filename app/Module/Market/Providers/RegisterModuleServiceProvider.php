<?php

declare(strict_types=1);

namespace App\Module\Market\Providers;

use Illuminate\Support\ServiceProvider;

final class RegisterModuleServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->register(CommandBusServiceProvider::class);
        $this->app->register(RepositoryServiceProvider::class);
    }

}
