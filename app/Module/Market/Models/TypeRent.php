<?php

namespace App\Module\Market\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property int $period
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 */
final class TypeRent extends Model
{
    use HasFactory;

    const ID_FOUR_HOUR_PERIOD = 1;
    const ID_EIGHT_HOUR_PERIOD = 2;
    const ID_TWELVE_HOUR_PERIOD = 3;
    const ID_DAY_PERIOD = 4;

    const NAME_FOUR_HOUR_PERIOD = 'Аренда на 4 часа';
    const NAME_EIGHT_HOUR_PERIOD = 'Аренда на 8 часов';
    const NAME_TWELVE_HOUR_PERIOD = 'Аренда на 12 часов';
    const NAME_DAY_PERIOD = 'Аренда на сутки';

    public function getPeriod(): int
    {
        return $this->period;
    }
}
