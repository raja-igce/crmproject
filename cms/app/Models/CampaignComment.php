<?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class CampaignComment extends Authenticatable
{
    protected $table = 'campaign_comment';
    public function getSender()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
}
