<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookingStatus extends Model
{
    //
    protected $table = 'booking_statuses';
    public $timestamp = true;
}
