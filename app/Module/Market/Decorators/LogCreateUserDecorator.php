<?php

declare(strict_types=1);

namespace App\Module\Market\Decorators;

use App\Models\User;
use App\Module\Market\Contracts\Repositories\CreateUserRepository;
use Illuminate\Support\Facades\Log;

final class LogCreateUserDecorator implements CreateUserRepository
{
    public function __construct(
        private readonly CreateUserRepository $repository
    ) {
    }

    public function create(User $user): void
    {
        Log::info("Создается пользователь - ", $user->getAttributes());

        $this->repository->create($user);
    }
}
