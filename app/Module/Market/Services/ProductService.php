<?php

declare(strict_types=1);

namespace App\Module\Market\Services;

use App\Module\Market\Contracts\Queries\GetAllProductsPaginatedQuery;
use App\Module\Market\Contracts\Services\ProductService as ProductServiceContract;
use Illuminate\Pagination\LengthAwarePaginator;

final class ProductService implements ProductServiceContract
{
    public function __construct(
        private readonly GetAllProductsPaginatedQuery $query
    ) {
    }

    public function getAllPaginated(): LengthAwarePaginator
    {
        return $this->query->getAll();
    }
}
