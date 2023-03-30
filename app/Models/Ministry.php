<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ministry extends Model
{
    use HasFactory;

    protected $fillable = ['logo','color','name','description','knowhow'];

    // ///////// HAS MANY
    public function courses()
    { return $this->hasMany(Course::class); }
}
