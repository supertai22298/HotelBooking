<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Rate extends Model
{
    //
    use SoftDeletes;
    protected $table = 'rates';
    public $timestamp = true;

    // one - many relationship between rate_type -> rates(reverse)
    public function rate_type(){
        return $this->belongsTo('App\RateType');
    }

    // one - many relationship between room -> rates (reverse)
    public function room(){
        return $this->belongsTo('App\Room');
    }

    // one - many relationship between user -> rates (reverse)
    public function user(){
        return $this->belongsTo('App\User');
    }
}

