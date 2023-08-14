<?php

declare(strict_types=1);

namespace App\Module\Market\Contracts\Queries;

use App\Module\Market\Models\Purchase;

interface FindPurchaseByUserAndProductIdQuery
{
    public function findUserAndProductId(int $userId, int $productId): ?Purchase;
}
