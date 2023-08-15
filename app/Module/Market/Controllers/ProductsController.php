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

    /**
     * @OA\Get (
     *      path="/api/v1/products",
     *      tags={"Products"},
     *      summary="Список продуктов",
     *      description="Получить список продуктов",
     *
     *     @OA\Parameter (ref="#/components/parameters/__page"),
     *     @OA\Parameter (ref="#/components/parameters/__limit"),
     *
     *    @OA\Response(
     *        response=200,
     *        @OA\MediaType(
     *            mediaType="application/json",
     *            @OA\Schema(
     *               @OA\Property(property="success", type="string",example="true"),
     *               @OA\Property(property="code", type="string",example="200"),
     *               @OA\Property(property="data", type="array",
     *                  @OA\Items(ref="#/components/schemas/ProductResource")
     *              )
     *            )
     *        ),
     *        description=""
     *    ),
     * )
     * @return ProductsResource
     */
    public function index(): ProductsResource
    {
        return (new ProductsResource($this->service->getAllPaginated()));
    }

    /**
     * @OA\Post (
     *      path="/api/v1/products/buy/or/rent",
     *      tags={"Products"},
     *      summary="Товар в аренду либо купить",
     *      description="Запрос для того, чтобы купить товар либо в аренду",
     *
     *    @OA\RequestBody(
     *          @OA\MediaType(
     *              mediaType="application/x-www-form-urlencoded",
     *              @OA\Schema(ref="#/components/schemas/BuyOrRentProductRequest")
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
     *               @OA\Property(property="message", type="string", example="Успешно принято!"),
     *              )
     *            )
     *        }
     *    ),
     * )
     * @param BuyOrRentProductRequest $request
     * @return MessagesResource
     */
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

    /**
     * @OA\Post (
     *      path="/api/v1/products/rent/extend",
     *      tags={"Products"},
     *      summary="Продлить аренду товара",
     *      description="Запрос для того, чтобы продлить аренду товара",
     *
     *    @OA\RequestBody(
     *          @OA\MediaType(
     *              mediaType="application/x-www-form-urlencoded",
     *              @OA\Schema(ref="#/components/schemas/RentExtendProductRequest")
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
     *               @OA\Property(property="message", type="string", example="Успешно принято!"),
     *              )
     *            )
     *        }
     *    ),
     * )
     * @param RentExtendProductRequest $request
     * @return MessagesResource
     */
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
