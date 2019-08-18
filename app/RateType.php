<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RateType extends Model
{
    //
    use SoftDeletes;
    protected $table = 'rate_types';
    public $timestamp = true;

    // one - many relationship between rate_type -> rates
    public function rates()
    {
        return $this->hasMany('App\Rate');
    }
    // many - many relationship between profiles -> rate_types
    public function profiles()
    {
        return $this->belongsToMany('App\Profile', 'rates', 'rate_type_id', 'profile_id');
    }

    // many - many relationship between rooms -> rate_types
    public function rooms()
    {
        return $this->belongsToMany('App\Room', 'rates', 'rate_type_id', 'room_id');
    }
}
