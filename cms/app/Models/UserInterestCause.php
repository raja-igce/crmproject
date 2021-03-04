<?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class UserInterestCause extends Authenticatable
{
    protected $table = 'user_interested_in_causes';
    public function getInterestCause()
    {
        return $this->hasOne('App\Models\CausesInterested', 'id', 'interest_id');
    }
}
