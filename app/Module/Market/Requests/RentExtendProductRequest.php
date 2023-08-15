<?php

declare(strict_types=1);

namespace App\Module\Market\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @OA\Schema(
 *     required={"product_id", "type_rent_id"},
 *     @OA\Property(property="product_id", type="int", example="1", description="ID продукта"),
 *     @OA\Property(property="type_rent_id", type="int", example="1", description="ID типа аренды"),
 * )
 */
final class RentExtendProductRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'product_id'    => ['required', 'exists:products,id'],
            'type_rent_id'  => ['required', 'exists:type_rents'],
        ];
    }
}
