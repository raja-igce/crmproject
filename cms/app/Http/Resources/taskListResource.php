<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;
use Carbon\Carbon;

class taskListResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        Carbon::parse($this->startdatetime)->format('h-m-A');
        Carbon::parse($this->enddatetime)->format('h-m-A');
        Carbon::parse($this->reminderdatetime)->format('h-m-A');

        $start_time= Carbon::parse($this->startdatetime)->format('h-i-A');
        $start_time = explode("-", $start_time);
        $h =  str_pad($start_time[0], 2, '0', STR_PAD_LEFT);
        $m =  str_pad($start_time[1], 2, '0', STR_PAD_LEFT);
        $am =  "00";
        $start_time = $h.':'.$m.':'.$am;


        $end_time= Carbon::parse($this->enddatetime)->format('h-i-A');
        $end_time = explode("-", $end_time);
        $h =  str_pad($end_time[0], 2, '0', STR_PAD_LEFT);
        $m =  str_pad($end_time[1], 2, '0', STR_PAD_LEFT);
        $am =  "00";
        $end_time = $h.':'.$m.':'.$am;

        $last_time = Carbon::parse($this->end_task_datetime)->format('h-i-A');
        $last_time = explode("-", $last_time);
        $h =  str_pad($last_time[0], 2, '0', STR_PAD_LEFT);
        $m =  str_pad($last_time[1], 2, '0', STR_PAD_LEFT);
        $am =  "00";
        $last_time = $h.':'.$m.':'.$am;


        $start_time = Carbon::parse($this->start_task_datetime)->format('h-i-A');
        $start_time = explode("-", $start_time);
        $h =  str_pad($start_time[0], 2, '0', STR_PAD_LEFT);
        $m =  str_pad($start_time[1], 2, '0', STR_PAD_LEFT);
        $am =  "00";
        $start_time = $h.':'.$m.':'.$am;



        $reminder_time= Carbon::parse($this->reminderdatetime)->format('h-i-A');
        $reminder_time = explode("-", $reminder_time);
        $h =  str_pad($reminder_time[0], 2, '0', STR_PAD_LEFT);
        $m =  str_pad($reminder_time[1], 2, '0', STR_PAD_LEFT);
        $am =  "00";
        $reminder_time = $h.':'.$m.':'.$am;

        $progress = "To Do";
        if($this->status==1){
          $progress = "To Do";
        }elseif ($this->status==2) {
          $progress = "Started";
        }elseif ($this->status==3) {
          $progress = "Completed";
        }

        if($this->recurring_id==0){
             $last_date= Carbon::parse($this->end_task_datetime)->format('d-m-Y');
             $start_date= Carbon::parse($this->start_task_datetime)->format('d-m-Y');
             $last_time= $last_time;
             $start_time= $start_time;
        }else{
             $last_date= Carbon::parse($this->enddatetime)->format('d-m-Y');
             $start_date= Carbon::parse($this->startdatetime)->format('d-m-Y');
             $last_time= $last_time;
             $start_time= $start_time;
        }

        return[
             'id'=>$this->id,
             'title'=> ucfirst($this->title),
             'description'=> $this->description,
             'priority'=> $this->priority,
             'project_id'=> $this->project_id,
             'project_id'=> isset($this->getProject->id)?$this->getProject->id:"",
             'project_name'=> isset($this->getProject->project_name)?$this->getProject->project_name:"",

             'manager_name'=> isset($this->getManager->first_name)?$this->getManager->first_name.' '.$this->getManager->last_name:"",
             'manager_role_id'=> isset($this->getManager->role_id)?$this->getManager->role_id:"",
             'manager_position'=> isset($this->getManager->position)?$this->getManager->position:"",
             'manager_image'=> isset($this->getManager->first_name)?UserPath.$this->getManager->id.'/Thumb/'.$this->getManager->profile_pic:"",
             'manager_id'=> $this->task_manager,

             'assignee_name'=> isset($this->getAssignee->first_name)?$this->getAssignee->first_name.' '.$this->getAssignee->last_name:"",
             'assignee_position'=> isset($this->getAssignee->position)?$this->getAssignee->position:"",
             'assignee_image'=> isset($this->getAssignee->first_name)?UserPath.$this->getAssignee->id.'/Thumb/'.$this->getAssignee->profile_pic:"",
             'assignee_role_id'=> isset($this->getAssignee->role_id)?$this->getAssignee->role_id:"",
             'assignee_id'=> $this->task_assignee,

             'get_team'=> isset($this->getObservers)?$this->getObservers:[],
             'get_checkList'=> isset($this->getTaskCheckList)?$this->getTaskCheckList:[],
             'getTaskDocuments'=> isset($this->getTaskDocuments)?$this->getTaskDocuments:[],

             'start_date'=> $start_date,
             'end_date'=> $last_date,
              
             'reminder_date'=> Carbon::parse($this->reminderdatetime)->format('d-m-Y'),

             'start_time'=> $start_time,
             'end_time'=>$last_time,
             'reminder_time'=> $reminder_time,
              

             'recurring_id'=> $this->recurring_id,
             'is_recurring'=> $this->is_recurring,
             'mode'=> $this->mode,
             'day'=> json_decode($this->day),
             'recur_enddate'=>  Carbon::parse($this->enddate)->format('d-m-Y'),
             'status'=>$this->status,
             'progress'=>$progress,
             'tags'=> json_decode($this->tags, true),
             'updated_at'=> Carbon::parse($this->updated_at)->format('d-m-Y'),
       ];
    }
}
