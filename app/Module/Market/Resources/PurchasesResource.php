<?php

declare(strict_types=1);

namespace App\Module\Market\Resources;

use App\Http\Resources\BaseResourceCollection;
use Illuminate\Http\Request;

final class PurchasesResource extends BaseResourceCollection
{
    public function toArray(Request $request): array
    {
        return [
            'data'  => PurchaseResource::collection($this->collection),
        ];
    }
}
