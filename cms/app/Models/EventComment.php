<?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class EventComment extends Authenticatable
{
    protected $table = 'event_comment';
    public function getSender()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
}
