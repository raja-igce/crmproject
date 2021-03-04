<?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class TaskFile extends Authenticatable
{
    protected $table = 'task_file';
    /*
    public function getEvent()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }*/
}
