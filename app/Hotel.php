<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Hotel extends Model
{
    //
    use SoftDeletes;
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
