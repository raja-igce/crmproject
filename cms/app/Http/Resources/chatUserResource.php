<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;

class chatUserResource extends JsonResource
{
    public function toArray($request)
    { 
        $array_lng = [];
        // $BeneficiaryImage = isset($this->getBeneficiaryImage) ? $this->getBeneficiaryImage : [];
        // $BeneficiaryImage = collect($BeneficiaryImage);
        // $profile = $BeneficiaryImage->where('file_for', 'profile')->first();
        // if ($profile) {
        //     $profile = isset($profile->file) ? $profile->file : [];
        // }
        // $profile = !is_null($profile) ? $profile : "";
        return [
            'id' => $this->id,
            'online' => $this->online,
            'name' => ucfirst($this->first_name).' '.ucfirst($this->last_name),
            'name' => $this->phone,
            'profile_image' => UserPath.$this->id.'/Thumb/'.$this->profile_pic,
            'lastmsg' => isset($this->getLastMsg[0])?$this->getLastMsg[0]->message:"",// isset($this->getLastMsg[0]->message)?$this->getLastMsg[0]->message:"",
            'updated_at' =>isset($this->getLastMsg[0])?Carbon::parse($this->getLastMsg[0]->updated_at)->format('h:i A d-m-y'):"",
            'status' => $this->status,
        ];
    }
}
