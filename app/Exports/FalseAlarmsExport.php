<?php

namespace App\Exports;

use App\Models\FalseAlarm;
use Maatwebsite\Excel\Concerns\FromCollection;


class FalseAlarmsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return FalseAlarm::all();
    }
}
