<?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class EventTeam extends Authenticatable
{
    protected $table = 'event_team';
    public function getTeamMemeber()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
    public function getMemeber()
    {
        return $this->hasOne('App\User', 'id', 'user_id');
    }
}
