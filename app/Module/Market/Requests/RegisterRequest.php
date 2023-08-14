<?php

declare(strict_types=1);

namespace App\Module\Market\Requests;

use App\Module\Market\DTO\CreateUserDTO;
use Illuminate\Foundation\Http\FormRequest;

/**
 * @OA\Schema(
 *     required={"name","email", "password"},
 *     @OA\Property(property="name", type="string", example="London", description="Имя"),
 *     @OA\Property(property="email", type="string", example="London", description="Логин"),
 *     @OA\Property(property="password", type="string", example="London", description="Пароль"),
 * )
 */

final class RegisterRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name'      => ['required'],
            'email'     => ['required'],
            'password'  => ['required'],
        ];
    }

    public function getDto(): CreateUserDTO
    {
        return CreateUserDTO::fromRequest($this);
    }
}
