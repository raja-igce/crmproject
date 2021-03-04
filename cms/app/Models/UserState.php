<?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class UserState extends Authenticatable
{
    protected $table = 'user_state';
}
