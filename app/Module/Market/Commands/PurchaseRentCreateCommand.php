<?php

declare(strict_types=1);

namespace App\Module\Market\Commands;

final class PurchaseRentCreateCommand
{
    public function __construct(
        public readonly int $userId,
        public readonly int $productId,
        public readonly int $typeSaleId,
        public readonly int $typeRentId
    ) {
    }
}
