<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Blog extends Model
{
    use SoftDeletes;
    use Notifiable;

    protected $table = 'blogs';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'author', 'description','active','image',
    ];

    public $timestamp = true;

}
