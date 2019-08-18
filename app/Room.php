<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Room extends Model
{
    //
    use SoftDeletes;
    protected $table = 'rooms';
    public $timestamp = true;

    // one - many relationship Hotel -> Rooms
    public function hotel(){
        return $this->belongsTo('App\Hotel');
    }
}
