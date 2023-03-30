<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ojt extends Model
{
    use HasFactory;

    protected $fillable = [ 'training_id','mentor_id','zone_id','prospect','type','indicated','gender','date','time','email', 'phone', 'street', 'number', 'complement', 'neighborhood', 'city', 'zipcode','comment' ];

    // ///////// BELONGS TO
    public function training()
    { return $this->belongsTo(Training::class); }

    public function mentor()
    { return $this->belongsTo(Mentor::class); }

    public function zone()
    { return $this->belongsTo(Zone::class); }

    // ///////// HAS MANY
    public function approaches()
    { return $this->hasMany(Approach::class); }

    public function explanation()
    { return $this->hasMany(Explanation::class); }

    // ///////// BELONGS TO MANY
    public function users()
    { return $this->belongsToMany(User::class, 'ojt_user'); }

}
