<?php

declare(strict_types=1);

namespace App\Module\Market\Contracts\Queries;

use Illuminate\Support\Collection;

interface GetAllPurchasesByUserIdQuery
{
    public function findByUserId(int $userId): Collection;
}
