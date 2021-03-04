<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Beneficiary extends Authenticatable
{
    protected $table = 'user_beneficiar';
    public function getEducation()
    {
        return $this->hasOne('App\Models\Education', 'id', 'eduction_id');
    }
    public function getSupport()
    {
        return $this->hasOne('App\Models\SupportHelp', 'id', 'help_type');
    }
} 
