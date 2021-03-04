<?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class CampaignTeam extends Authenticatable
{
    protected $table = 'campaign_team';
    public function getTeamMemeber()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
}
