<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Booking extends Model
{
    //
    use SoftDeletes;
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
