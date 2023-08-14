<?php

declare(strict_types=1);

namespace App\Module\Market\Queries;

use App\Module\Market\Contracts\Queries\FindPurchaseByUserAndProductIdQuery;
use App\Module\Market\Models\Purchase;

final class PurchaseQuery implements FindPurchaseByUserAndProductIdQuery
{

    public function findUserAndProductId(int $userId, int $productId): ?Purchase
    {
        /**
 * @var Purchase $purchase 
*/
        $purchase = Purchase::query()
            ->where('user_id', $userId)
            ->where('product_id', $productId)
            ->first();

        return $purchase;
    }
}
