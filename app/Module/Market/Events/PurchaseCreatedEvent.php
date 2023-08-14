<?php

declare(strict_types=1);

namespace App\Module\Market\Events;

final class PurchaseCreatedEvent
{
    public function __construct(
        public readonly int $purchaseId
    ) {
    }
}
