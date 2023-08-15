<?php

declare(strict_types=1);

namespace App\Module\Market\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @OA\Schema(
 *     required={"email", "password"},
 *     @OA\Property(property="email",    type="string", example="London", description="Логин"),
 *     @OA\Property(property="password", type="string", example="London", description="Пароль"),
 * )
 */
final class LoginRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'email'     => ['required', 'exists:users,email'],
            'password'  => ['required'],
        ];
    }
}
