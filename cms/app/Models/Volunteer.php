<?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Volunteer extends Authenticatable
{
    protected $table = 'volunteer';
    public function getEducation()
    {
        return $this->hasOne('App\Models\Education', 'id', 'eduction_id');
    }
    public function getInstitution()
    {
        return $this->hasOne('App\Models\Institutions', 'id', 'institutions_id');
    }
    public function getOccupation()
    {
        return $this->hasOne('App\Models\Occupation', 'id', 'occupation_id');
    }
}
