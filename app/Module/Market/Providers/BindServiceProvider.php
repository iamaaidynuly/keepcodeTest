<?php

declare(strict_types=1);

namespace App\Module\Market\Providers;

use App\Module\Market\Contracts\Services\ProductService as ProductServiceContract;
use App\Module\Market\Services\ProductService;
use Illuminate\Support\ServiceProvider;

final class BindServiceProvider extends ServiceProvider
{
    public array $bindings = [
        ProductServiceContract::class   => ProductService::class
    ];
}
