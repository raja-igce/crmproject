<?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class EventImages extends Authenticatable
{
    protected $table = 'event_images';
    /*
    public function getEvent()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }*/
}
