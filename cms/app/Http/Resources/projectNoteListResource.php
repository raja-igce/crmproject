<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;
use Carbon\Carbon;

class projectNoteListResource extends Resource
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
             'note'=>  $this->note,
             'created_at'=> Carbon::parse($this->updated_at)->format('d-m-Y h:i A'),
             'datetime'=>  \Carbon\Carbon::createFromTimeStamp(strtotime($this->created_at))->diffForHumans(),
             'name'=> is_null($this->getPerson	)? '':$this->getPerson->first_name.' '.$this->getPerson->last_name,
             'user_id'=> is_null($this->getPerson	)? '':$this->getPerson->id,
             //'sender'=> isset($this->getSender->first_name)?$this->getSender->first_name.' '.$this->getSender->last_name:"",
       ];
    }
}
