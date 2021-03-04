<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;

class groupMessageResource extends JsonResource
{
    public function toArray($request)
    {
       


        $sender_image = isset($this->getSender->profile_pic)?$this->getSender->profile_pic:"";
 
        return [
           
            'id' => $this->id,
            'message' => $this->message,
            'sender_name' => isset($this->getSender->first_name)?$this->getSender->first_name.' '.$this->getSender->last_name:"",
            'sender_image' => UserPath.$this->sender_id.'/Thumb/'.$sender_image,
            'sender_id' => $this->sender_id,
            'updated_at' => $this->updated_at,
            'read_status' => $this->read_status,
        ];
    }
}
