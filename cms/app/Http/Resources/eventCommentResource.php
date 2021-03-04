<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;
use Carbon\Carbon;

class eventCommentResource extends Resource
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
             'comment'=>  $this->comment,
             'updated_at'=> Carbon::parse($this->updated_at)->format('d-m-Y'),
             'datetime'=>  \Carbon\Carbon::createFromTimeStamp(strtotime($this->created_at))->diffForHumans(),
             'email'=>$this->email,
             'name'=> is_null($this->name)? '':$this->name,
             'sender'=>is_null($this->name)? '':$this->name,
             //'sender'=> isset($this->getSender->first_name)?$this->getSender->first_name.' '.$this->getSender->last_name:"",
       ];
    }
}
