<?php

declare(strict_types=1);

namespace App\Module\Market\Commands;

final class CreatePurchaseStatusCommand
{
    public function __construct(
        public readonly int $purchaseId,
        public readonly int $statusId,
    ) {
    }
}
