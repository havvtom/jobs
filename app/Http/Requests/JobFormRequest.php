<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JobFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'user_id' => "required",
            'job_title' => "required",
            'job_location' => "required",
            'company_name' => "required",
            'job_link' => "required|url",
            'tags' => "exists:tags,id",
            
        ];
    }
}
