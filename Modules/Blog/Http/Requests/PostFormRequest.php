<?php

namespace Modules\Blog\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostFormRequest extends FormRequest
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
                'title' => "required|unique:posts,title",
                'image' => "required",
                'short_description' => "required",
                'description' => "required",
                'category_id' => "required",
            ];
        } else {
            return [
                'title' => "required|unique:posts,title,{$this->post->id}",
                'short_description' => "required",
                'description' => "required",
                'category_id' => "required",
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
            'category_id.required' => 'The category name field is required.'
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
