<?php

namespace App\Http\Requests\Employee\Leave;

use Illuminate\Foundation\Http\FormRequest;

class LeaveRequest extends FormRequest
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
            'leave_type_id' => ['required'],
            'reason' => ['required'],
            'date_time_start' => ['required'],
            'date_time_end' => ['required'],
        ];
    }
}
