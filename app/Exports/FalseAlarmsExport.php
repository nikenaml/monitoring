<?php

namespace App\Exports;

use App\Models\FalseAlarm;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Carbon\Carbon;


class FalseAlarmsExport implements FromCollection, WithHeadings
{
    function __construct($from, $to) {
            $this->from = $from;
            $this->to = $to;
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        if (!empty($this->from) && !empty($this->to)) {
            $from = Carbon::parse($this->from)->toDateString();
            $to = Carbon::parse($this->to)->toDateString();
            return FalseAlarm::whereDate('alert_date', '>=', $from)->whereDate('alert_date', '<=', $to)->get();
        } else {
            return FalseAlarm::all();
        }
    }

    public function headings() :array
    {
        return [
            "No",
            "Tanggal Alert",
            "Note Jumlah Alert per schedule",
            "Total Alert All Schedule",
            "URL Komentar Salah Prediksi",
            "Jumlah Komentar Salah Prediksi",
            "Persentase Salah Prediksi (%)",
            "deleted_at",
            "created_at",
            "updated_at"
        ];
    }
}
