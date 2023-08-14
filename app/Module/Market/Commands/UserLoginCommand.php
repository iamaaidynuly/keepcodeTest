<?php

declare(strict_types=1);

namespace App\Module\Market\Commands;

final class UserLoginCommand
{
    public function __construct(
        public string $email,
        public string $password
    ) {
    }
}
