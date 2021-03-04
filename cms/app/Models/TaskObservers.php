<?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class TaskObservers extends Authenticatable
{
    protected $table = 'task_observers';
    public function getObservers()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
}
