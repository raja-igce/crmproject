<?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class UserLanguageKnow extends Authenticatable
{
    protected $table = 'user_language_know';
    public function getLanguage()
    {
        return $this->hasOne('App\Models\LanguageKnown', 'id', 'language_id');
    }
}
