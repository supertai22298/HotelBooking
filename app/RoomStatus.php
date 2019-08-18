<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RoomStatus extends Model
{
    //
    use SoftDeletes;
    protected $table = 'room_statuses';
    public $timestamp = true;


    // one - many relationship between room_status -> rooms
    public function rooms()
    {
        return $this->hasMany('App\Room');
    }

    // many - many relationship between hotels -> room_statuses(reverse)
    public function hotels()
    {
        return $this->belongsToMany('App\Hotel', 'rooms', 'room_status_id', 'hotel_id');
    }
    // many - many relationship between bookings -> payment_statuses
    public function bookings()
    {
        return $this->belongsToMany('App\Booking', 'rooms', 'room_status_id', 'booking_id');
    }

    // many - many relationship between room_types -> room_statuses
    public function room_types(){
        return $this->belongsToMany('App\RoomType', 'rooms', 'room_status_id', 'room_type_id');
    }
}
