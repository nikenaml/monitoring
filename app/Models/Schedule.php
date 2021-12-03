<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Schedule extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name', 'slug', 'type', 'description'
    ];

    protected $hidden = [

    ];

    public function comments()
    {
        return $this->hasMany(FalseAlarm::class,'schedule_id');
    }
}
