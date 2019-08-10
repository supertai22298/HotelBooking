<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
    //
    protected $table = 'guests';
    public $timestamp = true;

    //one - many relationship Guest -> Bookings
    public function bookings(){
        return $this->hasMany('App\Bookings');
    }
}
