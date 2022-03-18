<?php

namespace Modules\Job\Http\Requests;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class JobFormRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $todayDate = now()->toDateString();
        return [
            'title' => "required",
            'category_id' => "required",
            'company_id' => "required",
            'phone' => "required",
            'email' => "required",
            'website_link' => "required",
            'map_address' => "required",
            'job_type' => "required",
            'salary_range' => "required",
            'education' => "required",
            'experience' => "required",
            'gender' => "required",
            'address' => "required",
            'short_description' => "required",
            'long_description' => "required",
            'expired_at' => "required|after:$todayDate",
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        $todayDate = Carbon::parse(now())->format('Y-m-d');
        return [
            'expired_at.after' => "The expired date must be a date after $todayDate",
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
