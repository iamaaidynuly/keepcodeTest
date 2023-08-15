<?php

declare(strict_types=1);

namespace App\Module\Market\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @OA\Schema(
 *     required={"product_id", "type_sale_id", "type_rent_id"},
 *     @OA\Property(property="product_id", type="int", example="1", description="ID продукта"),
 *     @OA\Property(property="type_sale_id", type="int", example="1", description="ID типа продажи"),
 *     @OA\Property(property="type_rent_id", type="int", example="1", description="ID типа аренды"),
 * )
 */
final class BuyOrRentProductRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'product_id'    => ['required', 'exists:products,id'],
            'type_sale_id'  => ['required', 'exists:type_sales,id'],
            'type_rent_id'  => ['nullable', 'required_if:type_sale_id,2'],
        ];
    }
}
