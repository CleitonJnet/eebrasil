<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Approach extends Model
{
    use HasFactory;

    protected $fillable = [ 'ojt_id', 'name', 'gender', 'birth', 'email', 'phone', 'street', 'number', 'complement', 'neighborhood', 'city', 'state', 'zipcode', 'result', 'growth', 'discipleship', 'comment', ];

    // ///////// BELONGS TO
    public function ojs()
    { return $this->belongsTo(Ojt::class); }

    public function zone()
    { return $this->belongsTo(Zone::class); }
}
