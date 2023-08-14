<?php

declare(strict_types=1);

namespace App\Module\Market\Repositories;

use App\Models\User;
use App\Module\Market\Contracts\Repositories\CreateUserRepository;
use Throwable;

final class UserRepository implements CreateUserRepository
{
    /**
     * @throws Throwable
     */
    public function create(User $user): bool
    {
        return $user->saveOrFail();
    }
}
