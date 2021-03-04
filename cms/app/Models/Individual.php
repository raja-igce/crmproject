<?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Individual extends Authenticatable
{
    protected $table = 'individual';
    public function getDocument()
    {
        return $this->hasMany('App\Models\OrganizationFile', 'organization_id', 'id')->where('type', 'ID');
    }
    public function getCertificate()
    {
        return $this->hasMany('App\Models\OrganizationFile', 'organization_id', 'id')->where('type', 'IC');
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
