<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;

class chatedUserResource extends JsonResource
{
    public function toArray($request)
    { 

        $loigid = auth()->user()->id;
        if(isset($this->getSender) && $this->getSender->id==auth()->user()->id){
                $name = isset($this->getReceiver)?$this->getReceiver->first_name.' '.$this->getReceiver->last_name:"";
                $phone = isset($this->getReceiver)?$this->getReceiver->phone:"";
                $id = isset($this->getReceiver)?$this->getReceiver->id:0;
                $profile_pic = isset($this->getReceiver)?UserPath.$this->getReceiver->id.'/Thumb/'.$this->getReceiver->profile_pic:"";
                $userid = isset($this->getReceiver)?$this->getReceiver->id:"";
                $online =  isset($this->getReceiver)?$this->getReceiver->online:0;
        }else{
                $name = isset($this->getSender)?$this->getSender->first_name.' '.$this->getSender->last_name:"";
                $id = isset($this->getSender)?$this->getSender->id:0;
                $phone = isset($this->getSender)?$this->getSender->phone:"";
                $profile_pic =  isset($this->getSender)?UserPath.$this->getSender->id.'/Thumb/'.$this->getSender->profile_pic:"";
                $userid =  isset($this->getSender)?$this->getSender->id:0;
                $online =  isset($this->getSender)?$this->getSender->online:0;
        }
        return[
            'chat_id' => $this->id,
            'id' => $userid,
            'name' =>   $name,
            'phone' =>   $phone,
            'profile_image' => $profile_pic,
            'online' => $online,
            'lastmsg' =>    isset($this->getLastMsg[0])?$this->getLastMsg[0]->message:"",
            'count' =>$this->getUnreadCount ,//   isset($this->getUnreadCount[0])?$this->getUnreadCount->where('receiver_id',$loigid)->count():"",
            'updated_at' =>isset($this->getLastMsg[0])?Carbon::parse($this->getLastMsg[0]->updated_at)->format('h:i A d-m-y'):"",
            'status' => $this->status,
        ];
    }
}
