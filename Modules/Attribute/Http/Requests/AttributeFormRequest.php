<?php

namespace Modules\Attribute\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AttributeFormRequest extends FormRequest
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
                'name' => 'required',
                'code' => 'required|unique:attributes,code',
                'frontend_type' => 'required',
            ];
        }else{
            return [
                'name' => "required",
                'code' => "required|unique:attributes,code,{$this->attribute->id}",
                'frontend_type' => "required",
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
