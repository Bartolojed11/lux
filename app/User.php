<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'profile_picture','fname','mname','lname', 
        'contact_no','email','password','role_id','pid','cid'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function role() {
        return $this->hasOne(App\Role::class);
    }
    public function cart() {
        return $this->hasMany(App\User_cart::class);
    }
    public function province() {
        return $this->hasOne(App\Province::class);
    }
    public function city() {
        return $this->hasOne(App\City::class);
    }
}
