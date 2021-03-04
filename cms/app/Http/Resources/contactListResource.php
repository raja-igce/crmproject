<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;
use Carbon\Carbon;

class contactListResource extends Resource
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
             'name'=>  $this->name,
             'email'=> $this->email,
             'phone'=> $this->phone,
             'designation'=> $this->designation,
             'type'=> $this->type,
             'created_at'=> $this->created_at,
             'updated_at'=> $this->updated_at,
            
       ];
    }
}
