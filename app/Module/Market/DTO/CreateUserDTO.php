<?php

declare(strict_types=1);

namespace App\Module\Market\DTO;

use App\Module\Market\Requests\RegisterRequest;

final class CreateUserDTO
{
    public string $name;
    public string $email;
    public string $password;

    public static function fromRequest(RegisterRequest $request): CreateUserDTO
    {
        $self           = new self();

        $self->name     = $request->input('name');
        $self->email    = $request->input('email');
        $self->password = $request->input('password');

        return $self;
    }
}
