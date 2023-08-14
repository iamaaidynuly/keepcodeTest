<?php

declare(strict_types=1);

namespace App\Module\Market\Contracts\Queries;

use Illuminate\Pagination\LengthAwarePaginator;

interface GetAllProductsPaginatedQuery
{
    public function getAll(): LengthAwarePaginator;
}
