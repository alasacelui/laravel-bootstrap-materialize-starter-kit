<?php

namespace App\Http\Requests\Employee\TimeIn;

use Illuminate\Foundation\Http\FormRequest;

class TimeInRequest extends FormRequest
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
            'schedule_id' => ['required'],
            'time_in' => ['sometimes'],
            'time_out' => ['sometimes'],
        ];
    }
}
