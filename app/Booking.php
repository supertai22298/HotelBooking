<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    //
    protected $table = 'bookings';
    public $timestamp = true;

    /// one - many relationship Hotel -> Bookings (reverse)
    public function hotel(){
        return $this->belongsTo('App\Hotel');
    }

    /// one - many relationship Guest -> Bookings (reverse)
    public function guest(){
        return $this->belongsTo('App\Guest');
    }
}
