<?php

declare(strict_types=1);

namespace App\Module\Market\Providers;

use App\Module\Market\Contracts\Queries\FindUserByEmailQuery;
use App\Module\Market\Contracts\Queries\GetAllProductsPaginatedQuery;
use App\Module\Market\Queries\ProductQuery;
use App\Module\Market\Queries\UserQuery;
use Illuminate\Support\ServiceProvider;

final class QueryServiceProvider extends ServiceProvider
{
    public array $bindings = [
        FindUserByEmailQuery::class             => UserQuery::class,
        GetAllProductsPaginatedQuery::class     => ProductQuery::class
    ];
}
