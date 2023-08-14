<?php

declare(strict_types=1);

namespace App\Module\Market\Queries;

use App\Module\Market\Contracts\Queries\FindBuyedPurchaseByUserAndProductIdQuery;
use App\Module\Market\Contracts\Queries\FindRentPurchaseByUserAndProductIdQuery;
use App\Module\Market\Models\Purchase;
use App\Module\Market\Models\TypeSale;

final class PurchaseQuery implements FindBuyedPurchaseByUserAndProductIdQuery, FindRentPurchaseByUserAndProductIdQuery
{
    public function findUserAndProductId(int $userId, int $productId): ?Purchase
    {
        /*** @var Purchase $purchase */
        $purchase = Purchase::query()
            ->where('user_id', $userId)
            ->where('product_id', $productId)
            ->where('type_sale_id', TypeSale::ID_SALE)
            ->first();

        return $purchase;
    }

    public function findByUserAndProductId(int $userId, int $productId): ?Purchase
    {
        /*** @var Purchase $purchase */
        $purchase = Purchase::query()
            ->where('user_id', $userId)
            ->where('product_id', $productId)
            ->where('type_sale_id', TypeSale::ID_RENT)
            ->first();

        return $purchase;
    }
}
