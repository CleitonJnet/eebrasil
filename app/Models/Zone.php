<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Zone extends Model
{
    use HasFactory;

    protected $fillable = [ 'initial', 'name', 'population', 'protestantism', 'catholicism', 'atheism', 'geoViewBox', 'width', 'height', ];

    // ///////// HAS MANY
    public function churches()
    { return $this->hasMany(Church::class); }

    public function approaches()
    { return $this->hasMany(Approach::class); }

    public function trainings()
    { return $this->hasMany(Training::class); }

    public function Partners()
    { return $this->hasMany(Partner::class); }

    public function users()
    { return $this->hasMany(User::class); }
}
