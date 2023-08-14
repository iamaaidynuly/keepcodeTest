<?php

declare(strict_types=1);

namespace App\Module\Market\Resources;

use App\Http\Resources\BaseJsonResource;
use App\Models\User;
use Illuminate\Http\Request;

/**
 * @property-read                 User $resource
 * @OA\Schema(
 *     @OA\Property(property="id",    type="integer", example="1"),
 *     @OA\Property(property="name",  type="string", example="Jason Derulo"),
 *     @OA\Property(property="email", type="string", example="jason@mail.ru"),
 * )
 */
final class UserShowResource extends BaseJsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id'        => $this->resource->getId(),
            'name'      => $this->resource->getName(),
            'email'     => $this->resource->getEmail(),
        ];
    }
}
