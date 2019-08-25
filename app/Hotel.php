<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Hotel extends Model
{
    //
    use SoftDeletes;
    protected $table = 'hotels';
    public $timestamp = true;

    protected $fillable = [
        'name, motto, address, address_2, city, country, main_phone_number, toll_free_number, company_email_address, website_address, image_link, image'
    ];
    // one - many relationship between hotel -> hotel_utilities
    public function hotel_utilities()
    {
        return $this->hasMany('App\HotelUtility');
    }
    // one - many relationship between hotel -> rooms
    public function rooms()
    {
        return $this->hasMany('App\Room');
    }

    // many - many relationship between hotels -> room_statuses
    public function room_statuses()
    {
        return $this->belongsToMany('App\RoomStatus', 'rooms', 'hotel_id', 'room_status_id');
    }

    // many - many relationship between hotels -> room_types
    public function room_types()
    {
        return $this->belongsToMany('App\RoomType', 'rooms', 'hotel_id', 'room_type_id');
    }
}
