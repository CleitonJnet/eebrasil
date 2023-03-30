<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScheduleDefault extends Model
{
    use HasFactory;

    protected $fillable = ['course_id','available_id','unity_id','day','start','end'];

    // ///////// BELONGS TO
    public function unity()
    { return $this->belongsTo(Unity::class); }

    public function course()
    { return $this->belongsTo(Course::class); }

    public function available()
    { return $this->belongsTo(Available::class); }
}
