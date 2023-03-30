<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [ 'ministry_id','execution','certificate', 'name', 'description', 'knowhow', 'banner', 'logo', 'initial', 'color' ];

    // ///////// BELONGS TO
    public function ministry()
    { return $this->belongsTo(Ministry::class); }

    // ///////// HAS MANY
    public function scheduleDefault()
    { return $this->hasMany(ScheduleDefault::class); }

    public function sections()
    { return $this->hasMany(Section::class); }

    public function training()
    { return $this->hasMany(Training::class); }

    public function unities()
    { return $this->hasMany(Unity::class); }

    public function available()
    { return $this->hasMany(Available::class); }

    // ///////// BELONGS TO MANY
    public function teachers()
    { return $this->belongsToMany(User::class); }
}
