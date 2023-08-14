<?php

declare(strict_types=1);

namespace App\Module\Market\Commands;

final class UserRegisterCommand
{
    public function __construct(
        public readonly string $name,
        public readonly string $email,
        public readonly string $password,
    ) {
    }
}
