<?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class ProjectTeam extends Authenticatable
{
    protected $table = 'project_team';
    public function getTeamMemeber()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
}
