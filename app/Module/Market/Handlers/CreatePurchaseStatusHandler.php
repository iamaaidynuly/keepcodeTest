<?php

declare(strict_types=1);

namespace App\Module\Market\Handlers;

use App\Module\Market\Commands\CreatePurchaseStatusCommand;
use App\Module\Market\Contracts\Repositories\CreatePurchaseStatusRepository;
use App\Module\Market\Models\PurchaseStatus;

final class CreatePurchaseStatusHandler
{
    public function __construct(
        private readonly CreatePurchaseStatusRepository $repository
    ) {
    }

    public function handle(CreatePurchaseStatusCommand $command): void
    {
        $status = new PurchaseStatus();

        $status->setPurchaseId($command->purchaseId);
        $status->setStatusId($command->statusId);

        $this->repository->create($status);
    }
}
