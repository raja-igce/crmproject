<?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Campaign extends Authenticatable
{
    protected $table = 'campaign';
    public function getTeam()
    {
        return $this->hasMany('App\Models\CampaignTeam', 'campaign_id', 'id');
    }
    public function getCampaignImages()
    {
        return $this->hasMany('App\Models\CampaignImages', 'campaign_id', 'id')->whereIn('type', ['img','vid']);
    }
    public function getCampaignDocs()
    {
        return $this->hasMany('App\Models\CampaignImages', 'campaign_id', 'id')->whereIn('type', ['doc']);
    }
    public function getProject()
    {
        return $this->hasOne('App\Models\Project', 'id', 'project_id');
    }
    public function getCreator()
    {
        return $this->hasOne('App\User', 'id', 'creator_id')->select('id', 'first_name', 'last_name', 'phone', 'profile_pic', 'email', 'banner_image', 'state');
    }
    public function getCampaignCollection()
    {
        return $this->hasMany('App\Models\CampaignCollection', 'campaign_id', 'id')->orderby('amount', 'desc');
    }
}
