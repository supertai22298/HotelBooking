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
}
