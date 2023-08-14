<?php

declare(strict_types=1);

namespace App\Module\Market\Repositories;

use App\Module\Market\Contracts\Repositories\CreatePurchaseRepository;
use App\Module\Market\Models\Purchase;
use Throwable;

final class PurchaseRepository implements CreatePurchaseRepository
{
    /**
     * @throws Throwable
     */
    public function create(Purchase $purchase): void
    {
        $purchase->saveOrFail();
    }
}
