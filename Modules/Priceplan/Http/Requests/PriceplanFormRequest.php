<?php

namespace Modules\Priceplan\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PriceplanFormRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'plan_type' => "required",
            'level' => "required",
            'price' => "required|numeric",
            'discount_price' => "required|numeric",
            'short_description' => "required",
            'long_description' => "required",
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
