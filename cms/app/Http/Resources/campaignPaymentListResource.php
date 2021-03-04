<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;
use Carbon\Carbon;

class campaignPaymentListResource extends Resource
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
              "campaign_id"=> $this->campaign_id,
              "project_id"=> $this->project_id,
              "project_stage"=> $this->project_stage,
              "description"=> $this->description,
              "respose_user"=> $this->respose_user,
              "respose_user_name"=> !is_null($this->getPerson)?$this->getPerson->first_name:"",
              "firstname"=> $this->txtfirstname,
              "lastname"=> $this->txtlastname,
              "date"=> $this->date,
              "paiddate"=> $this->paiddate,
              "email"=> $this->txtemail,
              "phone"=> $this->txtphone,
              "payment_id"=> $this->payment_id,
              "amount"=> $this->amount,
              "address1"=> $this->txtaddress1,
              "address2"=> $this->txtaddress2,
              "state"=> $this->txtstate,
              "zipcode"=> $this->txtzipcode,
              "country"=>$this->txtcountry,
             'updated_at'=> Carbon::parse($this->updated_at)->format('d-m-Y'),
       ];
    }
}
