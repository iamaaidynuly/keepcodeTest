<?php

declare(strict_types=1);

namespace App\Module\Market\Handlers;

use App\Models\User;
use App\Module\Market\Commands\UserLoginCommand;
use App\Module\Market\Contracts\Queries\FindUserByEmailQuery;
use App\Module\Market\Exceptions\UserNotFoundException;
use App\Module\Market\Exceptions\UserPasswordNotCorrectException;
use Illuminate\Support\Facades\Hash;

final class UserLoginHandler
{
    public function __construct(
        private readonly FindUserByEmailQuery $query
    ) {
    }

    /**
     * @throws UserNotFoundException
     * @throws UserPasswordNotCorrectException
     */
    public function handle(UserLoginCommand $command): User
    {
        $user = $this->query->findByEmail($command->email);

        if (!$user) {
            throw new UserNotFoundException("Пользователь с логином $command->email не найдено!");
        }

        if (!Hash::check($command->password, $user->getAuthPassword())) {
            throw new UserPasswordNotCorrectException("Пароль пользователя $command->email неправильный!");
        }

        return $user;
    }
}
