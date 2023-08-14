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
final class TypeSale extends Model
{
    use HasFactory;

    const ID_SALE = 1;
    const ID_RENT = 2;

    const NAME_OF_SALE = 'Продажа';
    const NAME_OF_RENT = 'Аренда';
}
