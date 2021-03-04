<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;
use Carbon\Carbon;

class projectListResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return[
             'id'=>$this->id,
             'project_name'=> ucfirst($this->project_name),
             'description'=> $this->description,
             'projectlead'=> $this->project_lead_id,

             'planned_revenue'=> ucfirst($this->planned_revenue),
             'planned_expense'=> ucfirst($this->planned_expense),
             'project_expense'=> isset($this->getProjectExpense)?$this->getProjectExpense->sum('amount'):0,
             'project_income'=>  isset($this->getProjectIncome)?$this->getProjectIncome->sum('amount'):0,
                
             'manager_email'=> isset($this->getManager->manager_email)?$this->getManager->manager_email:"",
             'manager_id'=> isset($this->getManager->id)?$this->getManager->id:0,
             'manager_name'=> isset($this->getManager->first_name)?$this->getManager->first_name.' '.$this->getManager->last_name:"",
             'manager_image'=>   isset($this->getManager->id)?UserPath.$this->getManager->id.'/Thumb/'.$this->getManager->profile_pic:"",
             'lead_id'=> isset($this->getLeader->id)?$this->getLeader->id:0,
             'lead_name'=> isset($this->getLeader->first_name)?$this->getLeader->first_name.' '.$this->getLeader->last_name:"",
             'lead_image'=>   isset($this->getLeader->id)?UserPath.$this->getLeader->id.'/Thumb/'.$this->getLeader->profile_pic:"",
             'get_team'=> isset($this->getTeam)?$this->getTeam:[],
             'start_date'=> Carbon::parse($this->start_date)->format('d-m-Y'),
             'end_date'=> Carbon::parse($this->end_date)->format('d-m-Y'),
             'status'=>$this->status,
             'tags'=> json_decode($this->tags, true),
             'updated_at'=> Carbon::parse($this->updated_at)->format('d-m-Y'),
       ];
    }
}
