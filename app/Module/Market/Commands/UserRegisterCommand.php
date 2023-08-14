<?php

declare(strict_types=1);

namespace App\Module\Market\Commands;

use App\Module\Market\DTO\CreateUserDTO;

final class UserRegisterCommand
{
    public function __construct(
        public readonly CreateUserDTO $createUserDTO
    ) {
    }
}
