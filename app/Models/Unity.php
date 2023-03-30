<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unity extends Model
{
    use HasFactory;

    protected $fillable = ['course_id','order','duration','name','description','knowhow','devotional'];

    // ///////// BELONGS TO
    public function scheduleDefault()
    { return $this->belongsTo(ScheduleDefault::class); }

    public function schedule()
    { return $this->belongsTo(Schedule::class); }

    public function course()
    { return $this->belongsTo(Course::class); }
}
