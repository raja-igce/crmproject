<?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class CampaignContact extends Authenticatable
{
    protected $table = 'campaign_contact';
    public function getSender()
    {
        return $this->('App\User', 'user_id', 'id');
    }
}
