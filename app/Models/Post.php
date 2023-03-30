<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [ 'user_id','date','subject','text','status','moderate' ];

    // BELONGS TO
    public function user()
    { return $this->belongsTo(User::class); }

    // HAS MANY
    public function photos()
    { return $this->hasMany(PostGallary::class); }
}
