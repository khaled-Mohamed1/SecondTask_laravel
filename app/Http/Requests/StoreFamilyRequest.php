<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFamilyRequest extends FormRequest
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
            'employee_id' => 'required',
            'IDnumber' => 'required|integer',
            'relation' => 'required',
            'date_of_birth' => 'required|date',
            'status' => 'required',
            'study' => 'required',
            'work' => 'required',
            // 'IDimage' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }
}
