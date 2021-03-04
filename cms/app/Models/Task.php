<?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Task extends Authenticatable
{
    protected $table = 'task';
    public function getProject()
    {
        return $this->hasOne('App\Models\Project', 'id', 'project_id')->select("id", "project_name");
    }
    public function getManager()
    {
        return $this->hasOne('App\User', 'id', 'task_manager')->select("id", "first_name", "last_name",'position', "email",'profile_pic','role_id');
    }
    public function getAssignee()
    {
        return $this->hasOne('App\User', 'id', 'task_assignee')->select("id", "first_name", "last_name",'position', "email",'profile_pic','role_id');
    }
    public function getObservers()
    {
        return $this->hasMany('App\Models\TaskObservers', 'task_id', 'id');
    }
    public function getTaskCheckList()
    {
        return $this->hasMany('App\Models\TaskCheckList', 'task_id', 'id');
    }
    public function getTaskDocuments()
    {
        return $this->hasMany('App\Models\TaskFile', 'task_id', 'id');
    }
}
