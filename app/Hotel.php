<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Hotels extends Model
{
    //
    protected $table = 'hotels';
    public $timestamp = true;
    
    // one - many relationship Hotel -> Rooms
    public function rooms(){
        return $this->hasMany('App\Room');
    }

    // one - many relationship Hotel -> Bookings
    public function bookings(){
        return $this->hasMany('App\Booking');
    }
}
