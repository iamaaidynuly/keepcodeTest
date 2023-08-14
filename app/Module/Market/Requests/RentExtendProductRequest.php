<?php

declare(strict_types=1);

namespace App\Module\Market\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
