<?php

declare(strict_types=1);

namespace App\Module\Market\Contracts\Services;

use Illuminate\Support\Collection;

interface PurchaseService
{
    public function getAllByUserId(int $userId): Collection;
}
