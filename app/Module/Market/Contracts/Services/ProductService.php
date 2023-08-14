<?php

declare(strict_types=1);

namespace App\Module\Market\Contracts\Services;

use Illuminate\Pagination\LengthAwarePaginator;

interface ProductService
{
    public function getAllPaginated(): LengthAwarePaginator;
}
