<?php

declare(strict_types=1);

namespace App\Module\Market\Contracts\Queries;

use App\Module\Market\Models\TypeRent;

interface FindTypeOfRentByIdQuery
{
    public function findById(int $typeOfRent): ?TypeRent;
}
