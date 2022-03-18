<?php

namespace Modules\Portfolio\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PortfolioFormRequest extends FormRequest
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
                'name' => "required|unique:portfolios,name",
                'image' => "required|max:3072|image",
                'description' => "required",
            ];
        }else{
            return [
                'name' => "required|unique:portfolios,name,{$this->portfolio->id}",
                'image' => "max:3072|image",
                'description' => "required",
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
