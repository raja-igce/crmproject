<?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Organization extends Authenticatable
{
    protected $table = 'organization';
    public function getDocument()
    {
        return $this->hasMany('App\Models\OrganizationFile', 'organization_id', 'id')->where('type', 'D');
    }
    public function getCertificate()
    {
        return $this->hasMany('App\Models\OrganizationFile', 'organization_id', 'id')->where('type', 'C');
    }
    /*
    public function getInstitution()
    {
        return $this->hasOne('App\Models\Institutions', 'id', 'institutions_id');
    }
    public function getOccupation()
    {
        return $this->hasOne('App\Models\Occupation', 'id', 'occupation_id');
    }*/
}
