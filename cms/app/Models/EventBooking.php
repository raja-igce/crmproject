<?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class EventBooking extends Authenticatable
{
    protected $table = 'event_booking';
    public function getSender()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
}
