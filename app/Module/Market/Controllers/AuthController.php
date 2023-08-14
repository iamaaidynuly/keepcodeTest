<?php

declare(strict_types=1);

namespace App\Module\Market\Controllers;

use App\Http\Controllers\Controller;
use App\Module\Market\Requests\RegisterRequest;
use Illuminate\Bus\Dispatcher;

final class AuthController extends Controller
{
    public function __construct(
        private readonly Dispatcher $dispatcher
    ) {
    }

    public function register(RegisterRequest $request)
    {
    }
}
