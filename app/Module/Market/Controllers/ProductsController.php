<?php

declare(strict_types=1);

namespace App\Module\Market\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Resources\MessagesResource;
use App\Module\Market\Commands\PurchaseRentCreateCommand;
use App\Module\Market\Contracts\Services\ProductService;
use App\Module\Market\Models\TypeSale;
use App\Module\Market\Requests\BuyOrRentProductRequest;
use App\Module\Market\Requests\RentExtendProductRequest;
use App\Module\Market\Resources\ProductsResource;

final class ProductsController extends Controller
{
    public function __construct(
        private readonly ProductService $service
    ) {
    }

    public function index(): ProductsResource
    {
        return (new ProductsResource($this->service->getAllPaginated()));
    }

    public function buyOrRent(BuyOrRentProductRequest $request): MessagesResource
    {
        $this->service->buyOrRent(
            (int)$request->input('product_id'),
            (int)$request->input('type_sale_id'),
            (int)$request->input('type_rent_id') ?: null
        );

        return (new MessagesResource(null))
            ->setMessage("Успешно принято!")
            ->setStatusCode(201);
    }

    public function extendRent(RentExtendProductRequest $request): MessagesResource
    {
        dispatch(new PurchaseRentCreateCommand(
            auth()->user()->getAuthIdentifier(),
            (int)$request->input('product_id'),
            TypeSale::ID_RENT,
            (int)$request->input('type_rent_id')
        ));

        return (new MessagesResource(null))
            ->setMessage("Успешно принято!")
            ->setStatusCode(201);
    }
}
