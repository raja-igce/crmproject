<?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class UserRole extends Authenticatable
{
    protected $table = 'ms_user_role';
}
