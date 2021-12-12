<?php

namespace App\Exports;

use App\Models\FalseAlarm;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;


class FalseAlarmsExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return FalseAlarm::all();
    }

    public function headings() :array
    {
        return [
            "No",
            "Tanggal Alert",
            "Note Jumlah Alert per schedule",
            "Total Alert All Schedule",
            "Id Komentar Salah Prediksi",
            "Jumlah Komentar Salah Prediksi",
            "Persentase Salah Prediksi (%)",
            "deleted_at",
            "created_at",
            "updated_at"
        ];
    }
}
