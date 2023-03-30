<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    use HasFactory;

    protected $fillable = [ 'user_id','zone_id','name', 'phone', 'gender', 'email', 'street', 'number', 'complement', 'neighborhood', 'city', 'zipcode', 'birth', 'status', 'frequency', 'amount', 'since', 'comment', ];

    // ///////// BELONGS TO
    public function user()
    { return $this->belongsTo(User::class); }

    public function zone()
    { return $this->belongsTo(Zone::class); }
}
