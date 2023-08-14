<?php

declare(strict_types=1);

namespace App\Module\Market\Contracts\Repositories;

use App\Module\Market\Models\Purchase;

interface CreatePurchaseRepository
{
    public function create(Purchase $purchase): void;
}
