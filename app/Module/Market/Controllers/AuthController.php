<?php

declare(strict_types=1);

namespace App\Module\Market\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Resources\MessagesResource;
use App\Module\Market\Commands\UserLoginCommand;
use App\Module\Market\Commands\UserRegisterCommand;
use App\Module\Market\Requests\LoginRequest;
use App\Module\Market\Requests\RegisterRequest;
use App\Module\Market\Resources\UserShowResource;
use Illuminate\Bus\Dispatcher;

final class AuthController extends Controller
{
    public function __construct(
        private readonly Dispatcher $dispatcher
    ) {
    }

    public function register(RegisterRequest $request): MessagesResource
    {
        $token = $this->dispatcher->dispatch(new UserRegisterCommand($request->getDto()));

        return (new MessagesResource(null))
            ->setMessage('Пользователь успешно создано!')
            ->setStatusCode(201)
            ->setAccessToken($token->plainTextToken);
    }

    public function login(LoginRequest $request): UserShowResource
    {
        $user = $this->dispatcher->dispatch(new UserLoginCommand($request->input('email'), $request->input('password')));
        $token = $user->createToken('user_token')->plainTextToken;

        return (new UserShowResource($user))
            ->setAccessToken($token);
    }
}
