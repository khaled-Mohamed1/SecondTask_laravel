<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmployeeRequest extends FormRequest
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
            'firstname' => 'required',
            'secondname' => 'required',
            'thirdname' => 'required',
            'fourthname' => 'required',
            'IDnumber' => 'required|integer',
            'job_number' => 'required|integer',
            'specialty' => 'required',
            'status' => 'required',
            'gender' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'telephone' => 'required',
            'hiring_date' => 'required|date',
            'date_of_birth' => 'required|date',
            'address' => 'required',
            'personal_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'IDimage' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }
}
