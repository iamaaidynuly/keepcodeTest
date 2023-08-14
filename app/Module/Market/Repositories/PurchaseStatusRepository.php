<?php

declare(strict_types=1);

namespace App\Module\Market\Repositories;

use App\Module\Market\Contracts\Repositories\CreatePurchaseStatusRepository;
use App\Module\Market\Models\PurchaseStatus;
use Throwable;

final class PurchaseStatusRepository implements CreatePurchaseStatusRepository
{
    /**
     * @throws Throwable
     */
    public function create(PurchaseStatus $purchaseStatus): void
    {
        $purchaseStatus->saveOrFail();
    }
}
