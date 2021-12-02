<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Schedule extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name', 'type', 'description'
    ];

    protected $hidden = [

    ];

    public function comments()
    {
        // return $this->hasMany(Comment::class,'schedule_id');
    }
}
