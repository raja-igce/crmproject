<?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class TaskCheckList extends Authenticatable
{
    protected $table = 'task_check_list';
    // public function getTeamMemeber()
    // {
    //     return $this->belongsTo('App\User', 'user_id', 'id');
    // }
}
