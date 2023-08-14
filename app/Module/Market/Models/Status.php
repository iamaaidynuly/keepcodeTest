<?php

namespace App\Module\Market\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 */
final class Status extends Model
{
    use HasFactory;

    const ID_CREATED = 1;
    const ID_DELIVERED_BY_COURIER = 2;
    const ID_DELIVERED = 3;
    const ID_REFUND = 4;
}
