<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class RoomStatus extends Model
{
    //
    use SoftDeletes;
    protected $table = 'room_statuses';
    public $timestamp = true;
}
