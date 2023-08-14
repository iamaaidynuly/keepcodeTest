<?php

declare(strict_types=1);

namespace App\Module\Market\Queries;

use App\Models\User;
use App\Module\Market\Contracts\Queries\FindUserByEmailQuery;

final class UserQuery implements FindUserByEmailQuery
{
    public function findByEmail(string $email): ?User
    {
        /** @var User $user */
        $user = User::query()->where('email', $email)->first();

        return $user;
    }
}
