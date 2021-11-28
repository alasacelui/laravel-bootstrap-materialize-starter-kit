<?php

namespace App\Http\Requests\Admin\Department;

use Illuminate\Support\Arr;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class DepartmentRequest extends FormRequest
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
                'name' => ['required', 'unique:departments'],
            ],
            'PUT' => [
                'name' => ['required', Rule::unique('departments')->ignore($this->department)],
            ]
        ], $this->method(), []);
    }

    public function messages()
    {
        return [
            'name.unique' => ['Department name has already been taken']
        ];
    }
}
