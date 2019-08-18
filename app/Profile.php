<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Profile extends Model
{
    //
    use SoftDeletes;
    protected $table = 'profiles';
    public $timestamp = true;

    // one - one relationship between user -> profile(reverse)
    public function user(){
        return $this->belongsTo('App\User');
    }

    // one - many relationship between profile -> rates
    public function rates(){
        return $this->hasMany('App\Rate');
    }

    // one - many relationship between profile -> bookings
    public function bookings(){
        return $this->hasMany('App\Booking');
    }

    // many - many relationship between profiles -> rooms
    public function rooms(){
        return $this->belongsToMany('App\Room', 'bookings', 'profile_id', 'room_id');
    }

    // many - many relationship between profiles -> booking_statuses
    public function booking_statuses(){
        return $this->belongsToMany('App\BookingStatus', 'bookings', 'profile_id', 'booking_status_id');
    }

    // many - many relationship between profiles -> rate_types
    public function rate_types(){
        return $this->belongsToMany('App\RateType', 'rates', 'profile_id', 'rate_type_id');
    }
}
