<?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Project extends Authenticatable
{
    protected $table = 'project';
    public function getManager()
    {
        return $this->hasOne('App\User', 'id', 'project_mananger')->select("id", "first_name", "last_name","position", "email","phone","profile_pic");
    }
    public function getBlog()
    {
        return $this->hasMany('App\Models\Blog', 'project_id', 'id');
    }
    public function getLeader()
    {
        return $this->hasOne('App\User', 'id', 'project_lead_id')->select("id", "first_name", "last_name","position", "email","phone","profile_pic");
    }
    public function getTeam()
    {
        return $this->hasMany('App\Models\ProjectTeam', 'project_id', 'id');
    }
    public function getCampaign()
    {
        return $this->hasMany('App\Models\Campaign', 'project_id', 'id');
    }
    public function getDocuments()
    {
        return $this->hasMany('App\Models\ProjectDocuments', 'project_id', 'id');
    }
    public function getEvent()
    {
        return $this->hasMany('App\Models\Event', 'project_id', 'id');
    }

    public function getProjectExpense()
    {
        return $this->hasMany('App\Models\ProjectExpense', 'project_id', 'id');
    }
    public function getProjectIncome()
    {
        return $this->hasMany('App\Models\CampaignCollection', 'project_id', 'id')->where('is_payment',1)->orderby('date','desc');
    }

    

}
