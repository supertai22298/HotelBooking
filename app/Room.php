<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    //
    protected $table = 'rooms';
    public $timestamp = true;

    // one - many relationship Hotel -> Rooms
    public function hotel(){
        return $this->belongsTo('App\Hotel');
    }
}
