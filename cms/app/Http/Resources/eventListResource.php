<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;
use Carbon\Carbon;

class eventListResource extends Resource
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
             'title'=>  $this->title,
             'slug'=>  $this->slug,
             'sub_title'=> $this->sub_title,
             'location'=> $this->location,
             'lat'=> $this->lat,
             'lng'=> $this->lng,
             'description'=> $this->description,
             'seats'=> $this->seats,
             'attendee'=> $this->attendee,
             'project_id'=> $this->project_id,
             'getCreator'=> $this->getCreator, 


             'get_team'=> isset($this->getTeam)?$this->getTeam:[],
             'get_images'=> isset($this->getEventImages)?$this->getEventImages:[],
             'startdatetime'=> Carbon::parse($this->startdatetime)->format('d-m-Y'),
             'enddatetime'=> Carbon::parse($this->enddatetime)->format('d-m-Y'),
             'reminderdatetime'=> Carbon::parse($this->reminderdatetime)->format('d-m-Y'),
             'starttime'=> Carbon::parse($this->startdatetime)->format('H:i:s'),
             'endtime'=> Carbon::parse($this->enddatetime)->format('H:i:s'),
             'remindertime'=> Carbon::parse($this->reminderdatetime)->format('H:i:s'),
             'startdate'=> Carbon::parse($this->startdatetime)->format('d'),
             'startmonth'=> Carbon::parse($this->startdatetime)->format('M'),
             'startyear'=> Carbon::parse($this->startdatetime)->format('Y'),

             'start_date'=> Carbon::parse($this->start_date)->format('d-m-Y h:i A'),
             'end_date'=> Carbon::parse($this->end_date)->format('d-m-Y h:i A'),
             'show_time'=> Carbon::parse($this->start_date)->format('l h:i A'),
             'status'=>$this->status,
             'tags'=> $this->tags,//json_decode($this->tags, true) ,
             'updated_at'=> Carbon::parse($this->updated_at)->format('d-m-Y'),
       ];
    }
}
