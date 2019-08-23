<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class RoomType extends Model
{
    //
    use SoftDeletes;
    protected $table = 'room_types';
    public $timestamp = true;
    
    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable = [
        'room_type','description'
    ];
    // one - many relationship between room_type -> rooms
    public function rooms(){
        return $this->hasMany('App\Room');
    }

    // many - many relationship between hotels -> room_types
    public function hotels(){
        return $this->belongsToMany('App\Hotel', 'rooms', 'room_type_id', 'hotel_id');
    }

    // many - many relationship between room_types -> room_statuses
    public function room_statuses(){
        return $this->belongsToMany('App\RoomStatus', 'rooms', 'room_type_id', 'room_status_id');
    }
}
