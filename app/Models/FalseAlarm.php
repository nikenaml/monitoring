<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FalseAlarm extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'tanggal_komentar', 'sum_alert_email', 'schedule_id', 'id_komentar', 'sum_false_alarm'
    ];

    protected $hidden = [

    ];

    public function comments()
    {
        return $this->belongsTo(Schedule::class,'schedule_id', 'id');
    }
}
