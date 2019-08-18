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
}
