<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class PaymentType extends Model
{
    //
    use SoftDeletes;
    protected $table = 'payment_types';
    public $timestamp = true;

    // one - many relationship between payment_type -> payments
    public function payments(){
        return $this->hasMany('App\Payment');
    }

    // many - many relationship between bookings -> payment_types
    public function bookings(){
        return $this->belongsToMany('App\Booking', 'payments', 'payment_type_id', 'booking_id');
    }
}
