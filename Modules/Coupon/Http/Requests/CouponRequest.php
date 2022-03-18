<?php

namespace Modules\Coupon\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CouponRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        if($this->method() == 'POST'){
            return [
                'code' => "required|min:5|max:30|unique:coupons,code",
                'max_use' => "required|integer",
                'discount' => "required|integer",
                'expire_date' => "required|date",
                'type' => "required",
            ];
        }else{
            return [
                'code' => "required|min:5|max:30",
                'max_use' => "required|integer",
                'discount' => "required|integer",
                'expire_date' => "required|date",
                'type' => "required",
            ];
        }

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
