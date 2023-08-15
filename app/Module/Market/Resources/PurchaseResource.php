<?php

declare(strict_types=1);

namespace App\Module\Market\Resources;

use App\Http\Resources\BaseJsonResource;
use App\Module\Market\Models\Purchase;
use Illuminate\Http\Request;

/**
 * @property-read Purchase $resource
 * @OA\Schema(
 *     @OA\Property(property="id",   type="integer", example="1"),
 *     @OA\Property(property="product",   type="integer", example="1"),
 *     @OA\Property(property="typeSaleId",   type="integer", example="1"),
 *     @OA\Property(property="typeRentId",   type="integer", example="1"),
 *     @OA\Property(property="deadline",   type="integer", example="1"),
 *     @OA\Property(property="statuses",   type="integer", example="1"),
 * )
 */
final class PurchaseResource extends BaseJsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id'            => $this->resource->getId(),
            'product'       => new ProductResource($this->resource->getProduct()),
            'typeSaleId'    => $this->resource->getTypeSaleId(),
            'typeRentId'    => $this->resource->getTypeRentId(),
            'typeSaleName'  => $this->resource->getTypeSale()->name,
            'typeRentName'  => $this->resource->getTypeRent()?->name,
            'deadline'      => $this->resource->getDeadline()->format('d-m-y h:m:s'),
            'statuses'      => $this->resource->getStatuses(),
        ];
    }
}
