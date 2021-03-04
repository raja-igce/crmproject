<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;
use Carbon\Carbon;

class volunteerDetailsResource extends Resource
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
           'first_name' =>$this->first_name,
           'last_name' =>$this->last_name,
           'email' =>$this->email ,
           'role_id' =>$this->role_id ,
           'phone' =>$this->phone,
           'profile_pic' => Assets.'Users/'.$this->id.'/Thumb/'.$this->profile_pic,
           'banner_image' =>$this->banner_image,
           'gender' =>$this->gender,
           'dob' =>$this->dob,
           'address_line1' =>$this->address_line1,
           'address_line2' =>$this->address_line2,
           'city' =>$this->city,
           'district' =>$this->district,
           'state' =>$this->state,
           'pincode' =>$this->pincode,
           'live_in' =>$this->live_in,
           'blood_group' =>$this->blood_group,
           'email_verified_at' =>$this->email_verified_at,
           'password' =>$this->password,
           'status' =>$this->status,
           'is_email_verified' =>$this->is_email_verified,
           'remember_token' =>$this->remember_token,
           'created_at' => Carbon::parse($this->updated_at)->format('d-m-Y'),
           'updated_at'=> Carbon::parse($this->updated_at)->format('d-m-Y'),

           'is_blood_donor'=> isset($this->getVolunteerAllData->is_blood_donor)?$this->getVolunteerAllData->is_blood_donor:"0",
           'live_in'=> isset($this->getVolunteerAllData->live_in)?$this->getVolunteerAllData->live_in:"",
           'has_voluntee_experience'=> isset($this->getVolunteerAllData->has_voluntee_experience)?$this->getVolunteerAllData->has_voluntee_experience:"",
           'fb_link'=> isset($this->getVolunteerAllData->fb_link)?$this->getVolunteerAllData->fb_link:"",
           'insta_link'=> isset($this->getVolunteerAllData->insta_link)?$this->getVolunteerAllData->insta_link:"",
           'twitter_link'=> isset($this->getVolunteerAllData->twitter_link)?$this->getVolunteerAllData->twitter_link:"",
           'eduction'=> isset($this->getVolunteerAllData->getEducation->title)?$this->getVolunteerAllData->getEducation->title:"",
           'eduction_id'=> isset($this->getVolunteerAllData->getEducation->id)?$this->getVolunteerAllData->getEducation->id:"",
           'institution'=> isset($this->getVolunteerAllData->getInstitution->title)?$this->getVolunteerAllData->getInstitution->title:"",
           'institution_id'=> isset($this->getVolunteerAllData->getInstitution->id)?$this->getVolunteerAllData->getInstitution->id:"",
           'occupation'=> isset($this->getVolunteerAllData->getOccupation->title)?$this->getVolunteerAllData->getOccupation->title:"",
           'occupation_id'=> isset($this->getVolunteerAllData->getOccupation->id)?$this->getVolunteerAllData->getOccupation->id:""


       ];
    }
}
