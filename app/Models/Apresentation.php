<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apresentation extends Model
{
    use HasFactory;

    protected $fillable = ['who','ministery','todo','other','photo_who','photo_ministery','photo_todo','photo_other','user_id'];
}
