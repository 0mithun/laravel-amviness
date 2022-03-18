<?php

namespace Modules\Candidate\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CandidateFormRequest extends FormRequest
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
                'name' => ['required'],
                'username' => ['required', 'unique:candidates,username'],
                'email' => ['required', 'unique:candidates,email'],
                'password' => ['required'],
            ];
        } else {
            return [
                'name' => ['required'],
                'username' => ['required', "unique:candidates,username,{$this->candidate->id}"],
                'email' => ['required', "unique:candidates,email,{$this->candidate->id}"],
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
