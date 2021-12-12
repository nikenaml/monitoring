<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
// use Faker\Factory as Faker;

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
            'alert_date' => 'required',
            // 'schedules_id' => 'required|integer|exists:schedules,id',
            'note_alert_schedule' => 'required',
            'sum_alert_email' => 'required|integer',
            'id_comment' => 'required',
            'sum_false_alarm' => 'required|integer',
        ];
    }
}
