<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class BookingStatus extends Model
{
    //
    use SoftDeletes;
    protected $table = 'booking_statuses';
    public $timestamp = true;

    // one - many relationship between booking_status -> bookings
    public function bookings(){
        return $this->hasMany('App\Booking');
    }

    // many - many relationship between users -> booking_statuses
    public function users(){
        return $this->belongsToMany('App\User', 'bookings', 'booking_status_id', 'user_id');
    }

    // many - many relationship between rooms -> booking_statuses
    public function rooms()
    {
        return $this->belongsToMany('App\Room', 'bookings', 'booking_status_id', 'room_id');
    }

}
