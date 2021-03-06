<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Booking extends Model
{
    //
    use SoftDeletes;
    use Notifiable;
    protected $table = 'bookings';
    public $timestamp = true;

    // one - many relationship between booking_status -> bookings(reverse)
    public function booking_status()
    {
        return $this->belongsTo('App\BookingStatus');
    }

    // one - one relationship between booking -> payment
    public function payment()
    {
        return $this->hasOne('App\Payment');
    }

    // one - many relationship between user -> bookings (reverse)
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    // one - many relationship between room -> bookings(reverse)
    public function room()
    {
        return $this->belongsTo('App\Room');
    }

    // many - many relationship between bookings -> payment_types
    public function payment_types()
    {
        return $this->belongsToMany('App\PaymentType', 'payments','booking_id', 'payment_type_id');
    }

    // many - many relationship between bookings -> payment_statuses
    public function payment_statuses()
    {
        return $this->belongsToMany('App\PaymentStatus', 'payments','booking_id', 'payment_status_id');
    }
}
