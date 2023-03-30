<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    protected $fillable = ['training_id','unity_id','date','start','end','notes'];

    // ///////// BELONGS TO
    public function training()
    { return $this->belongsTo(Training::class); }

    public function unity()
    { return $this->belongsTo(Unity::class); }
}
