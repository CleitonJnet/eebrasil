<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [ 'church_id', 'zone_id', 'pastor', 'new_church', 'new_pastor', 'birth', 'gender', 'name', 'email', 'password', 'phone', 'street', 'number', 'complement', 'neighborhood', 'city', 'zipcode', 'ministery', 'comment' ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [ 'password', 'remember_token', 'two_factor_recovery_codes', 'two_factor_secret', ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [ 'email_verified_at' => 'datetime', ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [ 'profile_photo_url', ];

    // ///////// BELONGS TO
    public function church()
    { return $this->belongsTo(Church::class); }

    public function zone()
    { return $this->belongsTo(Zone::class); }

    // ///////// HAS MANY
    public function certificates()
    { return $this->hasMany(Certificate::class); }

    public function partners()
    { return $this->hasMany(Partner::class); }

    public function partnership()
    { return $this->hasMany(PartnerManagement::class); }

    public function mentor()
    { return $this->hasMany(Training::class); }

    public function posts()
    { return $this->hasMany(Post::class); }

    public function explanation()
    { return $this->hasMany(Explanation::class); }

    // ///////// BELONGS TO MANY
    public function churches()
    { return $this->belongsToMany(Church::class, 'church_user'); }

    public function roles()
    { return $this->belongsToMany(Role::class, 'role_user'); }

    public function trainings()
    { return $this->belongsToMany(Training::class, 'training_user')->withPivot('accredited','kit','payment'); }

    public function ojts()
    { return $this->belongsToMany(Ojt::class, 'ojt_user'); }

    // ///////// BELONGS TO MANY
    public function courses()
    { return $this->belongsToMany(Course::class); }
}
