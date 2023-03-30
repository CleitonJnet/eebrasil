<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Available extends Model
{
    use HasFactory;

    protected $fillable = ['course_id','day','name','day'];

    public function course()
    { return $this->belongsTo(Course::class); }

    public function schedule_default()
    { return $this->hasMany(ScheduleDefault::class); }

    public function trainings()
    { return $this->hasMany(Training::class); }
}
