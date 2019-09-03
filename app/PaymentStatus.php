<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class PaymentStatus extends Model
{
    //
    use SoftDeletes;
    protected $table = 'payment_statuses';
    public $timestamp = true;
    protected $fillable =  [
        'payment_status','description', 'active'
    ];


    // one - many relationship between payment_status -> payments
    public function payments(){
        return $this->hasMany('App\Payment');
    }

    // many - many relationship between payment_status -> bookings
    public function bookings(){
        return $this->belongsToMany('App\Booking', 'payments', 'payment_status_id', 'booking_id');
    }

}
