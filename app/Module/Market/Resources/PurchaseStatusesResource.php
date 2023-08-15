<?php

declare(strict_types=1);

namespace App\Module\Market\Resources;

use App\Http\Resources\BaseResourceCollection;
use Illuminate\Http\Request;

final class PurchaseStatusesResource extends BaseResourceCollection
{
    public function toArray(Request $request): array
    {
        return [
            'data' => PurchaseStatusResource::collection($this->collection)
        ];
    }
}
