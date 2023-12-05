<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
{
    public function rules()
    {
        return [
            'first_name' => ['required'],
            'last_name' => ['required'],
            'company_id' => ['required', 'integer'],
            'email' => ['nullable', 'email', 'max:254'],
            'phone' => ['nullable','numeric','max_digits:10'],
        ];
    }

    public function authorize()
    {
        return true;
    }
}
