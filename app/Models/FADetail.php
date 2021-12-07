<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FADetail extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'falsealarms_id'
    ];

    protected $hidden = [

    ];

    public function falsealarm()
    {
        return $this->belongsTo(FalseAlarm::class, 'falsealarms_id', 'id');
    }
}
