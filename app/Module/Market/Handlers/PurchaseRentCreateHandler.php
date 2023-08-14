<?php

declare(strict_types=1);

namespace App\Module\Market\Handlers;

use App\Module\Market\Commands\PurchaseRentCreateCommand;
use App\Module\Market\Contracts\Queries\FindPurchaseByUserAndProductIdQuery;
use App\Module\Market\Contracts\Queries\FindTypeOfRentByIdQuery;
use App\Module\Market\Contracts\Repositories\CreatePurchaseRepository;
use App\Module\Market\Exceptions\PurchaseAlreadyExistsException;
use App\Module\Market\Models\Purchase;

final class PurchaseRentCreateHandler
{
    public function __construct(
        private readonly FindPurchaseByUserAndProductIdQuery $query,
        private readonly CreatePurchaseRepository $repository,
        private readonly FindTypeOfRentByIdQuery $typeOfRentByIdQuery
    ) {
    }

    /**
     * @throws PurchaseAlreadyExistsException
     */
    public function handle(PurchaseRentCreateCommand $command): void
    {
        if ($this->query->findUserAndProductId($command->userId, $command->productId)) {
            throw new PurchaseAlreadyExistsException("Продукт уже куплен!");
        }
        $typeRent = $this->typeOfRentByIdQuery->findById($command->typeRentId);

        $purchase = new Purchase();

        $purchase->setUserId($command->userId);
        $purchase->setProductId($command->productId);
        $purchase->setTypeSaleId($command->typeSaleId);
        $purchase->setTypeRentId($command->typeRentId);
        $purchase->setDeadline($typeRent->getPeriod());

        $this->repository->create($purchase);
    }
}
