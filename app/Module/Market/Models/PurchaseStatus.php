<?php

namespace App\Module\Market\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $purchase_id
 * @property int $status_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 */
final class PurchaseStatus extends Model
{
    use HasFactory;

    public function setPurchaseId(int $purchaseId): void
    {
        $this->purchase_id = $purchaseId;
    }

    public function setStatusId(int $statusId): void
    {
        $this->status_id = $statusId;
    }
}
