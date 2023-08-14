<?php

declare(strict_types=1);

namespace App\Module\Market\Controllers;

use App\Http\Controllers\Controller;
use App\Module\Market\Contracts\Services\ProductService;
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
}
