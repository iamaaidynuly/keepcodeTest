<?php

declare(strict_types=1);

namespace App\Module\Market\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'email'     => ['required', 'exists:users,email'],
            'password'  =>  ['required'],
        ];
    }
}
