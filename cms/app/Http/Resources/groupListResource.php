<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;

class groupListResource extends JsonResource
{
    public function toArray($request)
    { 
        $array_lng = [];
        return [
            'id' => $this->id,
            'online' => 1,
            'name' => ucfirst($this->group_name),
            'icon' => GroupPath.$this->id.'/Thumb/'.$this->icon,
            'message' => $this->getMessages,
            'institute_id' => $this->institute_id,
            
            'members' => isset($this->getMembers)?$this->getMembers:[],
            'members_count' => isset($this->getMembers)?$this->getMembers->count():0, // isset($this->getLastMsg[0]->message)?$this->getLastMsg[0]->message:"",
            'lastmsg' => isset($this->getMessages[0])?$this->getMessages[0]->message:"",// isset($this->getLastMsg[0]->message)?$this->getLastMsg[0]->message:"",
            'updated_at' =>isset($this->getMessages[0])?Carbon::parse($this->getMessages[0]->updated_at)->format('h:i A d-m-y'):"",
            'status' => $this->status,
        ];
    }
}
