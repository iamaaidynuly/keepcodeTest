<?php

declare(strict_types=1);

namespace App\Module\Market\Queries;

use App\Module\Market\Contracts\Queries\GetAllProductsPaginatedQuery;
use App\Module\Market\Models\Product;
use Illuminate\Pagination\LengthAwarePaginator;

class ProductQuery implements GetAllProductsPaginatedQuery
{

    public function getAll(): LengthAwarePaginator
    {
        return Product::query()->paginate();
    }
}
