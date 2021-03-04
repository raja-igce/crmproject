<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;

class chatMessageResource extends JsonResource
{
    public function toArray($request)
    {
        $BeneficiaryImage = isset($this->getBeneficiaryImage) ? $this->getBeneficiaryImage : [];
        $BeneficiaryImage = collect($BeneficiaryImage);
        $profile = $BeneficiaryImage->where('file_for', 'profile')->first();
        if ($profile) {
            $profile = isset($profile->file) ? $profile->file : [];
        }
        $profile = !is_null($profile) ? $profile : "";


        $sender_image = isset($this->getSender->profile_pic)?$this->getSender->profile_pic:"";
        $receiver_image = isset($this->getReceiver->profile_pic)?$this->getReceiver->profile_pic:"";

        return [
            'profile' => $profile,
            'id' => $this->id,
            'message' => $this->message,
            'sender_name' => isset($this->getSender->first_name)?$this->getSender->first_name.' '.$this->getSender->last_name:"",
            'sender_image' => UserPath.$this->sender_id.'/Thumb/'.$sender_image,
            'sender_id' => $this->sender_id,


            'receiver_name' => isset($this->getReceiver->first_name)?$this->getReceiver->first_name.' '.$this->getSender->last_name:"",
            'receiver_image' => UserPath.$this->sender_id.'/Thumb/'.$receiver_image,
            'receiver_id' => $this->receiver_id,

            'updated_at' => $this->updated_at,
            'read_status' => $this->read_status,
        ];
    }
}
