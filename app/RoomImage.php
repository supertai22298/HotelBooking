<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class RoomImage extends Model
{
    //
    protected $table = 'room_images';
    use SoftDeletes;

    // one - many relationship between room -> room_images(reverse)
    public function room(){
        return $this->belongsTo('App\Room');
    }
}
