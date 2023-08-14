<?php

declare(strict_types=1);

namespace App\Module\Market\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
