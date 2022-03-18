<?php

namespace Modules\Company\Http\Requests;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class CompanyFormRequest extends FormRequest
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
                'name' => 'required|unique:companies,name',
                'username' => 'required|unique:companies,username',
                'email' => 'required|unique:companies,email',
                'password' => 'required',
                'organization_type' => 'required',

            ];
        } else {
            return [
                'name' => "required|unique:companies,name,{$this->company->id}",
                'username' => "required|unique:companies,username,{$this->company->id}",
                'email' => "required|unique:companies,email,{$this->company->id}",
                'organization_type' => 'required',
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
