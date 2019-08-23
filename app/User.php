<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;
    protected $table = 'users';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password',
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
   
   
    // one - many relationship between user -> rates
    public function rates(){
        return $this->hasMany('App\Rate');
    }

    // one - many relationship between user -> bookings
    public function bookings(){
        return $this->hasMany('App\Booking');
    }

    // many - many relationship between users -> rooms
    public function rooms(){
        return $this->belongsToMany('App\Room', 'bookings', 'user_id', 'room_id');
    }

    // many - many relationship between users -> booking_statuses
    public function booking_statuses(){
        return $this->belongsToMany('App\BookingStatus', 'bookings', 'user_id', 'booking_status_id');
    }

    // many - many relationship between users -> rate_types
    public function rate_types(){
        return $this->belongsToMany('App\RateType', 'rates', 'user_id', 'rate_type_id');
    }
}
