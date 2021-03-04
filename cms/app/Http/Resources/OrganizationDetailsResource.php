<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;

class OrganizationDetailsResource extends JsonResource
{
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
                'first_name' =>ucfirst($this->first_name),
                'last_name' =>ucfirst($this->last_name),
                'email' =>ucfirst($this->email),
                'role_id' =>ucfirst($this->role_id),
                'role_title' => isset($this->getRole->title)?$this->getRole->title:"",
                'phone' =>ucfirst($this->phone),
                'profile_pic' =>UserPath.$this->id.'/Thumb/'.$this->profile_pic,
                'gender' =>ucfirst($this->gender), 
                'dob' =>ucfirst($this->dob),
                'address_line1' =>ucfirst($this->address_line1),
                'address_line2' =>ucfirst($this->address_line2),
                'city' =>ucfirst($this->city),
                'district' =>ucfirst($this->district),
                'state' =>ucfirst($this->state),
                'live_in' =>ucfirst($this->live_in),
                'pincode' =>ucfirst($this->pincode),
                'position' =>ucfirst($this->position),
                'blood_group' =>ucfirst($this->blood_group),
                'bloodgroup' =>isset($this->getBloodGroup->title)?$this->getBloodGroup->title:"",
                'email_verified_at' =>ucfirst($this->email_verified_at),
                'password' =>ucfirst($this->password),
                'remember_token' =>ucfirst($this->remember_token),
                'updated_at' =>ucfirst($this->updated_at),
                'org_data' => isset($this->getOrganization)?$this->getOrganization:[],
                'documentView'=> isset($this->getOrgDocument)?$this->getOrgDocument:[] ,
                'certificateView'=>isset($this->getOrgCertificate)?$this->getOrgCertificate:[],
                'states' =>isset($this->getUserStates)?$this->getUserStates:[],
                'blog_counts' =>isset($this->getBlogs)?$this->getBlogs->count():0,
                'campaigns_counts' =>isset($this->getCampaigns)?$this->getCampaigns->count():0,
                'events_counts' =>isset($this->getEvents)?$this->getEvents->count():0,
                'status' =>$this->status,
                'language' =>$array_lng,
                'interested_cause' =>$array_int_cause,
       ];
    }
}
