<?php

declare(strict_types=1);

namespace App\Module\Market\Handlers;

use App\Models\User;
use App\Module\Market\Commands\UserRegisterCommand;
use App\Module\Market\Contracts\Repositories\CreateUserRepository;

class UserRegisterHandler
{
    public function __construct(
        private readonly CreateUserRepository $repository
    ) {
    }

    public function handle(UserRegisterCommand $command): void
    {
        $user = new User();

        $user->setName($command->name);
        $user->setEmail($command->email);
        $user->setPassword($command->password);

        $this->repository->create($user);
    }
}
