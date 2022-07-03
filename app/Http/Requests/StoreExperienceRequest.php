<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreExperienceRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'employee_id' => 'required',
            'work_place' => 'required',
            'job_title' => 'required',
            'salary' => 'required|integer',
            'currency' => 'required',
            'start_date' => 'required|date',
            'expiry_date' => 'required|date',
            // 'details' => 'required|text',
        ];
    }
}
