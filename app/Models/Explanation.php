<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Explanation extends Model
{
    use HasFactory;

    protected $fillable = [ 'ojt_id','user_id','secular','religion','church','witness','diagnostic','grace','sin','god','christ','faith','qualifying','commitment','clarification','prayer','assurance','bible','pray','praise','fellowship','testimony' ];

    public function ojt()
    { return $this->belongsTo(Ojt::class); }

    public function user()
    { return $this->belongsTo(User::class); }
}
