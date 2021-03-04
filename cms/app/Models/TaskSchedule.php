<?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class TaskSchedule extends Authenticatable
{
    protected $table = 'task_schedule';
    public $timestamps = false;
   
}
