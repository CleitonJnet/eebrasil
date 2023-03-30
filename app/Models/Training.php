<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    use HasFactory;

    protected $fillable = ['church_id','zone_id','course_id','available_id','user_id','date','comment','url','phone','email','street','number','complement','neighborhood','city','zipcode','status','price','price_church','discount','kits'];

    // ///////// BELONGS TO
    public function church()
    { return $this->belongsTo(Church::class); }

    public function zone()
    { return $this->belongsTo(Zone::class); }

    public function course()
    { return $this->belongsTo(Course::class); }

    public function user()
    { return $this->belongsTo(User::class); }

    public function available()
    { return $this->belongsTo(Available::class); }

    // ///////// HAS MANY
    public function media()
    { return $this->hasMany(Media::class); }

    public function certificates()
    { return $this->hasMany(Certificate::class); }

    public function mentors()
    { return $this->hasMany(Mentor::class); }

    public function ojts()
    { return $this->hasMany(Ojt::class); }

    public function schedules()
    { return $this->hasMany(Schedule::class); }

    // ///////// BELONGS TO MANY
    public function students()
    { return $this->belongsToMany(User::class, 'training_user')->withPivot('accredited','kit','payment'); }
}
