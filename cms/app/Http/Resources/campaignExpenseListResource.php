<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;
use Carbon\Carbon;

class campaignExpenseListResource extends Resource
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
              "payee"=> $this->txtfirstname,
              "amount"=> number_format($this->amount,2) ,
              "project_id"=> $this->project_id,
              "bill_no"=> $this->bill_no,
              "expense_category"=> $this->expense_category,
              "payment_mode"=> $this->payment_mode,
              "reference"=> $this->reference,
              "paymentmode"=> $this->type,
              "item"=> $this->description,
              "respose_user"=> $this->respose_user,
              "crm_id"=> $this->crm_id,
              "respose_user_name"=> !is_null($this->getPerson)?$this->getPerson->first_name:"",
              "respose_img"=> !is_null($this->getPerson)?UserPath.$this->getPerson->id.'/Thumb/'.$this->getPerson->profile_pic:"",
              "date"=> $this->date,
              "paiddate"=> $this->paiddate,
              'updated_at'=> Carbon::parse($this->updated_at)->format('d-m-Y'),
              'created_at'=> Carbon::parse($this->created_at)->format('d-m-Y'),
        ];
    }
}
