<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    protected $fillable = [ 'ojt_id','user_id','introduction','grace', 'sin', 'god', 'jesus', 'faith', 'appeal' ];

    public function ojt()
    { return $this->belongsTo(Ojt::class); }

    public function user()
    { return $this->belongsTo(User::class); }
}
