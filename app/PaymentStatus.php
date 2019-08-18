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
}
