<?php

declare(strict_types=1);

namespace App\Module\Market\Listeners;

use App\Module\Market\Commands\CreatePurchaseStatusCommand;
use App\Module\Market\Events\PurchaseCreatedEvent;
use App\Module\Market\Models\Status;

final class InsertCreatedPurchaseStatusListener
{
    public function handle(PurchaseCreatedEvent $event): void
    {
        dispatch(new CreatePurchaseStatusCommand($event->purchaseId, Status::ID_CREATED));
    }
}
