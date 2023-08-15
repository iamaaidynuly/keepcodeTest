<?php

declare(strict_types=1);

namespace App\Module\Market\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Resources\MessagesResource;
use App\Module\Market\Commands\UserLoginCommand;
use App\Module\Market\Commands\UserRegisterCommand;
use App\Module\Market\Requests\LoginRequest;
use App\Module\Market\Requests\RegisterRequest;
use App\Module\Market\Requests\RentExtendProductRequest;
use App\Module\Market\Resources\UserShowResource;
use Illuminate\Bus\Dispatcher;

final class AuthController extends Controller
{
    public function __construct(
        private readonly Dispatcher $dispatcher
    ) {
    }

    /**
     * @OA\Post (
     *      path="/api/v1/auth/register",
     *      tags={"User auth"},
     *      summary="Регистрация пользователя",
     *
     *    @OA\RequestBody(
     *          @OA\MediaType(
     *              mediaType="application/x-www-form-urlencoded",
     *              @OA\Schema(ref="#/components/schemas/RegisterRequest")
     *         )
     *     ),
     *
     *    @OA\Response(
     *        response=200,
     *        description="",
     *        content={
     *         @OA\MediaType(
     *            mediaType="application/json",
     *            @OA\Schema(
     *               @OA\Property(property="success", type="string",example="true"),
     *               @OA\Property(property="code", type="string",example="200"),
     *               @OA\Property(property="message", type="string", example="Пользователь успешно создано!"),
     *              )
     *            )
     *        }
     *    ),
     * )
     * @param RegisterRequest $request
     * @return MessagesResource
     */
    public function register(RegisterRequest $request): MessagesResource
    {
        $token = $this->dispatcher->dispatch(new UserRegisterCommand($request->getDto()));

        return (new MessagesResource(null))
            ->setMessage('Пользователь успешно создано!')
            ->setStatusCode(201)
            ->setAccessToken($token->plainTextToken);
    }

    /**
     * @OA\Post (
     *      path="/api/v1/auth/login",
     *      tags={"User auth"},
     *      summary="Логин пользователя",
     *
     *    @OA\RequestBody(
     *          @OA\MediaType(
     *              mediaType="application/x-www-form-urlencoded",
     *              @OA\Schema(ref="#/components/schemas/LoginRequest")
     *         )
     *     ),
     *
     *    @OA\Response(
     *        response=200,
     *        description="",
     *        content={
     *         @OA\MediaType(
     *            mediaType="application/json",
     *            @OA\Schema(
     *               @OA\Property(property="success", type="string",example="true"),
     *               @OA\Property(property="code", type="string",example="200"),
     *               @OA\Property(property="data", ref="#/components/schemas/UserShowResource"),
     *              )
     *            )
     *        }
     *    ),
     * )
     * @param LoginRequest $request
     * @return UserShowResource
     */
    public function login(LoginRequest $request): UserShowResource
    {
        $user = $this->dispatcher->dispatch(new UserLoginCommand($request->input('email'), $request->input('password')));
        $token = $user->createToken('user_token')->plainTextToken;

        return (new UserShowResource($user))
            ->setAccessToken($token);
    }
}
