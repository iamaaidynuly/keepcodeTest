<?php

declare(strict_types=1);

namespace App\Module\Market\Contracts\Repositories;

use App\Module\Market\Models\PurchaseStatus;

interface CreatePurchaseStatusRepository
{
    public function create(PurchaseStatus $purchaseStatus): void;
}
