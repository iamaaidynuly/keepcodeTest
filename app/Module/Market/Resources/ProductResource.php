<?php

declare(strict_types=1);

namespace App\Module\Market\Resources;

use App\Http\Resources\BaseJsonResource;
use App\Module\Market\Models\Product;
use Illuminate\Http\Request;

/**
 * @property-read Product $resource
 * @OA\Schema(
 *     @OA\Property(property="id", type="integer", example="1"),
 *     @OA\Property(property="name", type="string", example="Product"),
 * )
 */
final class ProductResource extends BaseJsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id'    => $this->resource->getId(),
            'name'  => $this->resource->getName(),
        ];
    }
}
