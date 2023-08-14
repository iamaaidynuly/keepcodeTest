<?php

declare(strict_types=1);

namespace App\Module\Market\Providers;

use App\Module\Market\Commands\PurchaseBuyCreateCommand;
use App\Module\Market\Commands\PurchaseRentCreateCommand;
use App\Module\Market\Commands\UserLoginCommand;
use App\Module\Market\Commands\UserRegisterCommand;
use App\Module\Market\Handlers\PurchaseBuyCreateHandler;
use App\Module\Market\Handlers\PurchaseRentCreateHandler;
use App\Module\Market\Handlers\UserLoginHandler;
use App\Module\Market\Handlers\UserRegisterHandler;
use Illuminate\Support\Facades\Bus;
use Illuminate\Support\ServiceProvider;

final class CommandBusServiceProvider extends ServiceProvider
{
    private array $maps = [
        UserRegisterCommand::class      => UserRegisterHandler::class,
        UserLoginCommand::class         => UserLoginHandler::class,

        PurchaseBuyCreateCommand::class     => PurchaseBuyCreateHandler::class,
        PurchaseRentCreateCommand::class    => PurchaseRentCreateHandler::class
    ];

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(): void
    {
        $this->registerCommandHandlers();
    }

    private function registerCommandHandlers(): void
    {
        Bus::map($this->maps);
    }
}
