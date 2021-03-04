<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;
use Carbon\Carbon;

class OrganizationPermissionResource extends Resource
{
    /**
     * Transform the resource into an array.
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'first_name' => ucfirst($this->getUser->first_name),
            'last_name' => $this->getUser->last_name,
            'profile_pic' => UserPath.$this->user_id.'/Thumb/'.$this->getUser->profile_pic,
            'status' => $this->getUser->status,
            'email' => $this->getUser->email,
            'phone' => $this->getUser->phone,
            'status' => $this->getUser->status,
            'updated_at' => Carbon::parse($this->updated_at)->format('d-m-Y'),

            'project' => $this->project,
            'contacts' => $this->contacts,
            'task' => $this->task,
            'event' => $this->event,
            'campaign' => $this->campaign,
            'chat' => $this->chat,
            'blog' => $this->blog,
            'donationreport' => $this->donationreport,
        ];
    }
}
