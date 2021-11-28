<?php

namespace App\Http\Requests\Admin\Employee;

use Illuminate\Support\Arr;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
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
        return Arr::get([
            'POST' => [
                'department_id' => ['required'],
                'fname' => ['required'],
                'mname' => ['required'],
                'lname' => ['required'],
                'gender' => ['required'],
                'birth_date' => ['required'],
                'marital_status' => ['required'],
                'educational_level' => ['required'],
                'address' => ['required'],
                'contact' => ['required'],
                'email' => ['required', 'unique:employees'],
            ],
            'PUT' => [
                'department_id' => ['required'],
                'fname' => ['required'],
                'mname' => ['required'],
                'lname' => ['required'],
                'gender' => ['required'],
                'birth_date' => ['required'],
                'marital_status' => ['required'],
                'educational_level' => ['required'],
                'address' => ['required'],
                'contact' => ['required'],
                'email' => ['required', Rule::unique('employees')->ignore($this->employee)],
            ]
        ], $this->method(), []);
    }

    public function messages()
    {
        return [
            'department_id.required' => ['Please select a Department'],
            'email.unique' => ['Email has already been taken']
        ];
    }
}
