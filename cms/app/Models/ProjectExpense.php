<?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class ProjectExpense extends Authenticatable
{
    protected $table = 'project_expense';
    public function getPerson()
    {
        return $this->hasOne("app\User",'id','respose_user');
    }
}
