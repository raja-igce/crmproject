<?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class OrganizationFile extends Authenticatable
{
    protected $table = 'organization_file';
    /*
    public function getEvent()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }*/
}
