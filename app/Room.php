<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Room extends Model
{
    //
    use SoftDeletes;
    protected $table = 'rooms';
    public $timestamp = true;

    // one - many relationship Hotel -> Rooms(reverse)
    public function hotel()
    {
        return $this->belongsTo('App\Hotel');
    }

    // one - many relationship between room_type -> rooms (reverse) 
    public function room_type()
    {
        return $this->belongsTo('App\RoomType');
    }

    // one - many relationship between room_status -> rooms(reverse)
    public function room_status()
    {
        return $this->belongsTo('App\RoomStatus');
    }

    // one - many relationship between room -> room_images
    public function room_images()
    {
        return $this->hasMany('App\RoomImage');
    }

    // one - many relationship between room -> rates
    public function rates()
    {
        return $this->hasMany('App\Rate');
    }

    // one - many relationship between room -> bookings
    public function bookings()
    {
        return $this->hasMany('App\Booking');
    }

    // many - many relationship between users -> rooms (reverse)
    public function users()
    {
        return $this->belongsToMany('App\User', 'bookings', 'room_id', 'user_id');
    }

    // many - many relationship between rooms -> rate_types
    public function rate_types()
    {
        return $this->belongsToMany('App\RateType', 'rates', 'room_id', 'rate_type_id');
    }

    // many - many relationship between rooms -> booking_statuses
    public function booking_statuses()
    {
        return $this->belongsToMany('App\BookingStatus', 'bookings', 'room_id', 'booking_status_id');
    }
}
