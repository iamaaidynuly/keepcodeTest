<?php

declare(strict_types=1);

namespace App\Module\Market\Handlers;

use App\Module\Market\Commands\PurchaseBuyCreateCommand;
use App\Module\Market\Contracts\Queries\FindBuyedPurchaseByUserAndProductIdQuery;
use App\Module\Market\Contracts\Repositories\CreatePurchaseRepository;
use App\Module\Market\Exceptions\PurchaseAlreadyExistsException;
use App\Module\Market\Models\Purchase;

final class PurchaseBuyCreateHandler
{
    public function __construct(
        private readonly CreatePurchaseRepository $repository,
        private readonly FindBuyedPurchaseByUserAndProductIdQuery $query
    ) {
    }

    /**
     * @throws PurchaseAlreadyExistsException
     */
    public function handle(PurchaseBuyCreateCommand $command): void
    {
        if ($this->query->findUserAndProductId($command->userId, $command->productId)) {
            throw new PurchaseAlreadyExistsException("Продукт уже куплен!");
        }

        $purchase = new Purchase();

        $purchase->setUserId($command->userId);
        $purchase->setProductId($command->productId);
        $purchase->setTypeSaleId($command->typeSaleId);

        $this->repository->create($purchase);
    }
}
