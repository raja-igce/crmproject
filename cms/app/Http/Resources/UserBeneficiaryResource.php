<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;

class UserBeneficiaryResource extends JsonResource
{
    public function toArray($request)
    {
        $array_lng = [];

        $BeneficiaryImage = isset($this->getBeneficiaryImage) ? $this->getBeneficiaryImage : [];
        $BeneficiaryImage = collect($BeneficiaryImage);
        $profile = $BeneficiaryImage->where('file_for', 'profile')->first();
        if ($profile) {
            $profile = isset($profile->file) ? $profile->file : [];
        }
        $profile = !is_null($profile) ? $profile : "";
        return [
            'profile' => $profile,
            'id' => $this->id,
            'first_name' => ucfirst($this->first_name),
            'last_name' => ucfirst($this->last_name),
            'email' => ucfirst($this->email),
            'role_id' => ucfirst($this->role_id),
            'role_title' => isset($this->getRole->title) ? $this->getRole->title : "",
            'phone' => ucfirst($this->phone),
            'profile_pic' => UserPath.$this->id.'/Thumb/'.$this->profile_pic,
            'gender' => ucfirst($this->gender),
            'dob' => ucfirst($this->dob),
            'address_line1' => ucfirst($this->address_line1),
            'address_line2' => ucfirst($this->address_line2),
            'city' => ucfirst($this->city),
            'district' => ucfirst($this->district),
            'state' => ucfirst($this->state),
            'live_in' => ucfirst($this->live_in),
            'pincode' => ucfirst($this->pincode),
            'blood_group' => ucfirst($this->blood_group),
            'blood_group_name' => isset($this->getBloodGroup->title) ? $this->getBloodGroup->title: "",
            'creator' => isset($this->getCreator) ? $this->getCreator: [],
            'status' => ucfirst($this->status),
            'email_verified_at' => ucfirst($this->email_verified_at),
            'password' => ucfirst($this->password),
            'remember_token' => ucfirst($this->remember_token),
            'updated_at' => ucfirst($this->updated_at),
            'marital_status' => isset($this->getBeneficiaryDetail->marital_status) ? $this->getBeneficiaryDetail->marital_status : "",
            'eduction_id' => isset($this->getBeneficiaryDetail->eduction_id) ? $this->getBeneficiaryDetail->eduction_id : "",
            'no_family' => isset($this->getBeneficiaryDetail->no_family) ? $this->getBeneficiaryDetail->no_family : "",
            'family_income' => isset($this->getBeneficiaryDetail->family_income) ? $this->getBeneficiaryDetail->family_income : "",
            'help_type' => isset($this->getBeneficiaryDetail->help_type) ? $this->getBeneficiaryDetail->help_type : "",
            'education' => isset($this->getBeneficiaryDetail->getEducation->title) ? $this->getBeneficiaryDetail->getEducation->title: "",

            
            'support' => isset($this->getBeneficiaryDetail->getSupport->title) ? $this->getBeneficiaryDetail->getSupport->title: "",
            'duration' => isset($this->getBeneficiaryDetail->duration) ? $this->getBeneficiaryDetail->duration : "",
            'title' => isset($this->getBeneficiaryDetail->title) ? $this->getBeneficiaryDetail->title : "",
            'reject_note' => isset($this->getBeneficiaryDetail->reject_note) ? $this->getBeneficiaryDetail->reject_note : "",
            'img_id_proof' => [], // $BeneficiaryImage->where('file_for', 'id_proof'),

            'img_report' => $BeneficiaryImage,
            'status' => $this->status,
            'language' => $array_lng,
        ];
    }
}
