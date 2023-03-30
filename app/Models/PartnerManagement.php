<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PartnerManagement extends Model
{
    use HasFactory;

    protected $fillable = ['rent', 'ministery', 'medical', 'admin', 'other', 'offer', 'monthto','user_id'];

    // ///////// BELONGS TO
    public function user()
    { return $this->belongsTo(User::class); }
}
