<?php

declare(strict_types=1);

namespace App\Module\Market\Queries;

use App\Module\Market\Contracts\Queries\FindTypeOfRentByIdQuery;
use App\Module\Market\Models\TypeRent;

final class TypeRentQuery implements FindTypeOfRentByIdQuery
{

    public function findById(int $typeOfRent): ?TypeRent
    {
        /*** @var TypeRent $typeOfRent */
        $typeOfRent = TypeRent::query()->findOrFail($typeOfRent);

        return $typeOfRent;
    }
}
