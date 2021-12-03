<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FalseAlarmRequest extends FormRequest
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
            'tanggal_komentar' => 'required',
            'sum_alert_email' => 'required|integer',
            'schedules_id' => 'required|integer|exists:schedules,id',
            'id_komentar' => 'required|biginteger',
            'sum_false_alarm' => 'required|integer',
        ];
    }
}
