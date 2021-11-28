<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Support\Arr;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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

    public function rules()
    {
        return [
            'employee_id' => ['required','sometimes'],
            'role_id' => ['required','sometimes'],
            'is_activated' => ['sometimes']
        ];
    }

    public function messages()
    {
        return [
            'employee_id.required' => ['Please select an employee'],
            'role_id.required' => ['Please select a role'],
        ];
    }
}
