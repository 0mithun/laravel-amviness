<?php

namespace Modules\Product\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductFormRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        if ($this->method() === 'POST') {
            return [
                'category_id' => "required",
                'title' => "required|unique:products,title",
                'sku' => "required|numeric",
                'price' => "required",
                'image' => "required|image|max:3072|mimes:jpeg,png,jpg",
            ];
        }else{
            return [
                'category_id' => "required",
                'title' => "required|unique:products,title,{$this->product->id}",
                'sku' => "required|numeric",
                'price' => "required",
                'image' => "image|max:3072|mimes:jpeg,png,jpg",
            ];
        }
    }

    /**
     * Get the validation messages.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'category_id.required' => "The category field is required.",
            'image.max' => "Maximum image size to upload is 3MB. If you are uploading a photo, try to reduce its resolution to make it under 3MB"
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
