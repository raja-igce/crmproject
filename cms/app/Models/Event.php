<?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Event extends Authenticatable
{
    protected $table = 'event';
    /*
    public function getManager()
    {
        return $this->hasOne('App\User', 'id', 'project_mananger')->select("id", "first_name", "last_name", "email");
    }*/
    public function getProject()
    {
        return $this->belongsTo('App\Models\Project', 'project_id', 'id');
    }
    public function getCreator()
    {
        return $this->hasOne('App\User', 'id', 'creator_id')->select('id', 'first_name', 'last_name', 'phone', 'profile_pic', 'email','role_id', 'banner_image', 'state');
    }
    public function getTeam()
    {
        return $this->hasMany('App\Models\EventTeam', 'event_id', 'id');
    }
    public function getEventImages()
    {
        return $this->hasMany('App\Models\EventImages', 'event_id', 'id');
    }
}
