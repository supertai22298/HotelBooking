<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class RoomImage extends Model
{
    //
    protected $table = 'room_images';
    use SoftDeletes;
}
