<?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class VolunteerPermission extends Authenticatable
{
    protected $table = 'user_permission';
    
    public function getUser()
    {
        return $this->hasOne('App\User', 'id', 'user_id')->select('id', 'first_name', 'last_name', 'phone', 'profile_pic', 'email', 'banner_image', 'state','status');
    }
  
}
