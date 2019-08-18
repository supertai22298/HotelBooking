<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class HotelUtility extends Model
{
    //
    use SoftDeletes;
    protected $table = 'hotel_utilities';
    public $timestamp = true;
    
    // one - many relationship between hotel -> hotel_utilities (reverse)
    public function hotel(){
        return $this->belongsTo('App\Hotel');
    }
}
