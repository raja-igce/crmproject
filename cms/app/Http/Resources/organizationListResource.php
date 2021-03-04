<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;
use Carbon\Carbon;

class organizationListResource extends Resource
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
             'status'=>$this->status,
             'updated_at'=> Carbon::parse($this->updated_at)->format('d-m-Y'),
             'first_name'=>$this->first_name,
             'last_name'=>$this->last_name,
             'email'=>$this->email,
             'role_id'=>$this->role_id,
             'phone'=>$this->phone,
             'profile_pic' =>UserPath.$this->id.'/Thumb/'.$this->profile_pic,
             'gender'=>$this->gender,
             'dob'=>$this->dob, 
             'address_line1'=>$this->address_line1,
             'address_line2'=>$this->address_line2,
             'city'=>$this->city,
             'district'=>$this->district,
             'state'=>$this->state,
             'pincode'=>$this->pincode,
             'live_in'=>$this->live_in,
             'blood_group'=>$this->blood_group,
             'org_data'=>$this->getOrganization,
             'documentView'=> isset($this->getOrgDocument)?$this->getOrgDocument:[] ,
             'certificateView'=>isset($this->getOrgCertificate)?$this->getOrgCertificate:[],
             'blog_counts' =>isset($this->getBlogs)?$this->getBlogs->count():0,
             'campaigns_counts' =>isset($this->getCampaigns)?$this->getCampaigns->count():0,
             'events_counts' =>isset($this->getEvents)?$this->getEvents->count():0,
       ];
    }
}
