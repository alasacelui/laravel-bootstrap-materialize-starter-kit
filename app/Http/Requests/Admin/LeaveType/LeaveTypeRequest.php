<?php

namespace App\Http\Requests\Admin\LeaveType;

use Illuminate\Support\Arr;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class LeaveTypeRequest extends FormRequest
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
                'type' => ['required'],
                'description' => ['sometimes'],
                'allowance_per_year' => ['required']
            ],
            'PUT' => [
                'department_id' => ['required'],
                'type' => ['required'],
                'description' => ['sometimes'],
                'allowance_per_year' => ['required']
            ]
        ], $this->method(), []);
    }

    public function messages()
    {
        return [
            'department_id.required' => ['Please select a Department'],
            'type.unique' => ['Leave Type has already been taken']
        ];
    }
}
