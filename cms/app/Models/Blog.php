<?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Blog extends Authenticatable
{
    protected $table = 'blog';
    public function getCreator()
    {
        return $this->hasOne('App\User', 'id', 'creator_id')->select('id', 'first_name', 'last_name', 'phone', 'profile_pic', 'email', 'banner_image', 'state');
    }
    public function getOrganization()
    {
        return $this->hasOne('App\User', 'id', 'organization_id');
    }
    public function getProject()
    {
        return $this->hasOne('App\Models\Project', 'id', 'project_id');
    }
}
