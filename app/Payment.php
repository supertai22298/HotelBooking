<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Payment extends Model
{
    //
    use SoftDeletes;
    protected $table = 'payments';
    public $timestamp = true;

    // one - many relationship between payment_status -> payments(reverse)
    public function payment_status(){
        return $this->belongsTo('App\PaymentStatus');
    }

    // one - many relationship between payment_type -> payments(reverse)
    public function payment_type(){
        return $this->belongsTo('App\PaymentType');
    }

    // one - one relationship between booking -> payment (reverse)
    public function booking(){
        return $this->belongsTo('App\Booking');
    }
}
