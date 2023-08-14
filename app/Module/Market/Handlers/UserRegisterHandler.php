<?php

declare(strict_types=1);

namespace App\Module\Market\Handlers;

use App\Models\User;
use App\Module\Market\Commands\UserRegisterCommand;
use App\Module\Market\Contracts\Queries\FindUserByEmailQuery;
use App\Module\Market\Contracts\Repositories\CreateUserRepository;
use App\Module\Market\Exceptions\UserAlreadyExistsException;
use Laravel\Sanctum\NewAccessToken;

class UserRegisterHandler
{
    public function __construct(
        private readonly CreateUserRepository $repository,
        private readonly FindUserByEmailQuery $query
    ) {
    }

    /**
     * @throws UserAlreadyExistsException
     */
    public function handle(UserRegisterCommand $command): NewAccessToken
    {
        if ($this->query->findByEmail($command->createUserDTO->email)) {
            throw new UserAlreadyExistsException("Пользователь с таким логином уже существует!");
        }

        $user = new User();

        $user->setName($command->createUserDTO->name);
        $user->setEmail($command->createUserDTO->email);
        $user->setPassword($command->createUserDTO->password);
        $user->markEmailAsVerified();

        $this->repository->create($user);

        return $user->createToken('user_token');
    }
}
