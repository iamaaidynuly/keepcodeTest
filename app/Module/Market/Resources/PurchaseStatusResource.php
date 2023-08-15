<?php

declare(strict_types=1);

namespace App\Module\Market\Resources;

use App\Http\Resources\BaseJsonResource;
use App\Module\Market\Models\PurchaseStatus;
use Illuminate\Http\Request;

/**
 * @property-read PurchaseStatus $resource
 * @OA\Schema(
 *     @OA\Property(property="id",   type="integer", example="1"),
 *     @OA\Property(property="purchaseId",   type="integer", example="1"),
 *     @OA\Property(property="statusId",   type="integer", example="1"),
 * )
 */
final class PurchaseStatusResource extends BaseJsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id'            => $this->resource->getId(),
            'purchaseId'    => $this->resource->getPurchaseId(),
            'statusId'      => $this->resource->getStatusId()
        ];
    }
}
