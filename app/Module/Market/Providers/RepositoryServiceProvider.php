<?php

declare(strict_types=1);

namespace App\Module\Market\Providers;

use App\Module\Market\Contracts\Repositories\CreateUserRepository;
use App\Module\Market\Decorators\LogCreateUserDecorator;
use App\Module\Market\Repositories\UserRepository;
use Illuminate\Support\ServiceProvider;

final class RepositoryServiceProvider extends ServiceProvider
{
    public array $bindings = [
        CreateUserRepository::class     => LogCreateUserDecorator::class
    ];

    public function register(): void
    {
        $this->app->when(LogCreateUserDecorator::class)
            ->needs(CreateUserRepository::class)
            ->give(UserRepository::class);
    }
}
