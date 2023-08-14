<?php

declare(strict_types=1);

namespace App\Module\Market\Contracts\Queries;

use App\Models\User;

interface FindUserByEmailQuery
{
    public function findByEmail(string $email): ?User;
}
