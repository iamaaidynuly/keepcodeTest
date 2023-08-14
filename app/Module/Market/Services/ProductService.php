<?php

declare(strict_types=1);

namespace App\Module\Market\Services;

use App\Module\Market\Commands\PurchaseBuyCreateCommand;
use App\Module\Market\Commands\PurchaseRentCreateCommand;
use App\Module\Market\Contracts\Queries\GetAllProductsPaginatedQuery;
use App\Module\Market\Contracts\Services\ProductService as ProductServiceContract;
use App\Module\Market\Models\TypeSale;
use Illuminate\Bus\Dispatcher;
use Illuminate\Pagination\LengthAwarePaginator;

final class ProductService implements ProductServiceContract
{
    public function __construct(
        private readonly GetAllProductsPaginatedQuery $query,
        private readonly Dispatcher $dispatcher
    ) {
    }

    public function getAllPaginated(): LengthAwarePaginator
    {
        return $this->query->getAll();
    }

    public function buyOrRent(int $productId, int $typeSaleId, ?int $typeRentId): void
    {
        if ($typeSaleId === TypeSale::ID_SALE) {
            $this->dispatcher->dispatch(
                new PurchaseBuyCreateCommand(
                    auth()->user()->getAuthIdentifier(),
                    $productId,
                    $typeSaleId
                )
            );
        } else {
            $this->dispatcher->dispatch(
                new PurchaseRentCreateCommand(
                    auth()->user()->getAuthIdentifier(),
                    $productId,
                    $typeSaleId,
                    $typeRentId
                )
            );
        }
    }
}
