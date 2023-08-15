<?php

declare(strict_types=1);

namespace App\Module\Market\Services;

use App\Module\Market\Contracts\Queries\GetAllPurchasesByUserIdQuery;
use App\Module\Market\Contracts\Services\PurchaseService as PurchaseServiceContract;
use Illuminate\Support\Collection;

final class PurchaseService implements PurchaseServiceContract
{
    public function __construct(
        private readonly GetAllPurchasesByUserIdQuery $query
    ) {
    }

    public function getAllByUserId(int $userId): Collection
    {
        return $this->query->findByUserId($userId);
    }
}
