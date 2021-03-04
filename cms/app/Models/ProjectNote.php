<?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class ProjectNote extends Authenticatable
{
    protected $table = 'project_note';
    public function getPerson()
    {
        return $this->hasOne("app\User",'id','user_id');
    }
}
