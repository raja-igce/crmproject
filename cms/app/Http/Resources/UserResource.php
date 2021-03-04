<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;
use Carbon\Carbon;

class UserResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $array_lng = [];
        if (count($this->getLanguageKnow)) {
            foreach ($this->getLanguageKnow as $key => $value) {
                $array_lng[$key]['language_id']= isset($value->getLanguage->id)?$value->getLanguage->id:0;
                $array_lng[$key]['language_title']=isset($value->getLanguage->title)?$value->getLanguage->title:"";
            }
        }

        $array_int_cause = [];
        if (count($this->getInterestedCause)) {
            foreach ($this->getInterestedCause as $key => $value) {
                $array_int_cause[$key]['id']= isset($value->getInterestCause->id)?$value->getInterestCause->id:0;
                $array_int_cause[$key]['title']=isset($value->getInterestCause->title)?$value->getInterestCause->title:"";
            }
        }
        
        return[
             'id'=>$this->id,
             'first_name'=> ucfirst($this->first_name),
             'last_name'=>$this->last_name,
             'position'=> !empty($this->position)?$this->position:"NA",
             'profile_image' => UserPath.$this->id.'/Thumb/'.$this->profile_pic,
             'email'=>$this->email,
             'live_in'=>!empty($this->live_in)?$this->live_in:"-",
             'intereseted_causes'=>$array_int_cause,
             'phone'=>$this->phone,
             'status'=>$this->status,
             'updated_at'=> Carbon::parse($this->updated_at)->format('d-m-Y'),
        ];
    }
}
