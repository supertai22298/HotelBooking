<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class BookingStatus extends Model
{
    //
    use SoftDeletes;
    protected $table = 'booking_statuses';
    public $timestamp = true;
}
