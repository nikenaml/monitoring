<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FalseAlarm extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'tanggal_alert', 'note_alert_schedule', 'sum_alert_email', 'id_komentar', 'sum_false_alarm'
    ];
    // 'schedules_id',

    protected $hidden = [

    ];

    public function schedule()
    {
        return $this->belongsTo(Schedule::class,'schedules_id', 'id');
    }

    public function details()
    {
        return $this->hasMany(FADetail::class, 'falsealarms_id');
    }
}
