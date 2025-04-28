<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Timetable extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function class()
    {
        return $this->belongsTo(ClassRoom::class, 'class_id');
    }
    
    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }
    
    public function timeslot()
    {
        return $this->belongsTo(Timeslot::class);
    }
}
