<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Church extends Model
{
    use HasFactory;

    protected $fillable = [ 'zone_id','name','pastor','email','phone','street','number','complement','neighborhood','city','zipcode','contact','contact_phone','contact_email','comment','logo' ];

    // ///////// BELONGS TO
    public function zone()
    { return $this->belongsTo(Zone::class); }

    // ///////// HAS MANY
    public function training()
    { return $this->hasMany(Training::class); }

    public function members()
    { return $this->hasMany(User::class); }

    // ///////// BELONGS TO MANY
    public function fws()
    { return $this->belongsToMany(User::class,'church_user'); }
}
