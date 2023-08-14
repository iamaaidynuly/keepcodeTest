<?php

declare(strict_types=1);

namespace App\Module\Market\Handlers;

use App\Module\Market\Commands\PurchaseRentCreateCommand;
use App\Module\Market\Contracts\Queries\FindRentPurchaseByUserAndProductIdQuery;
use App\Module\Market\Contracts\Queries\FindTypeOfRentByIdQuery;
use App\Module\Market\Contracts\Repositories\CreatePurchaseRepository;
use App\Module\Market\Contracts\Repositories\DeletePurchaseRepository;
use App\Module\Market\Events\PurchaseCreatedEvent;
use App\Module\Market\Exceptions\PurchaseAlreadyExistsException;
use App\Module\Market\Models\Purchase;

final class PurchaseRentCreateHandler
{
    public function __construct(
        private readonly FindRentPurchaseByUserAndProductIdQuery $query,
        private readonly CreatePurchaseRepository                $createPurchaseRepository,
        private readonly FindTypeOfRentByIdQuery                 $typeOfRentByIdQuery,
    ) {
    }

    /**
     * @throws PurchaseAlreadyExistsException
     */
    public function handle(PurchaseRentCreateCommand $command): void
    {
        $rentPurchase = $this->query->findByUserAndProductId($command->userId, $command->productId);
        if ($rentPurchase && !$rentPurchase->getDeadline()->isPast()) {
            throw new PurchaseAlreadyExistsException("Продукт уже арендован!");
        }
        $typeRent = $this->typeOfRentByIdQuery->findById($command->typeRentId);

        $purchase = new Purchase();

        $purchase->setUserId($command->userId);
        $purchase->setProductId($command->productId);
        $purchase->setTypeSaleId($command->typeSaleId);
        $purchase->setTypeRentId($command->typeRentId);
        $purchase->setDeadline($typeRent->getPeriod());

        $this->createPurchaseRepository->create($purchase);

        event(new PurchaseCreatedEvent($purchase->getId()));
    }
}
