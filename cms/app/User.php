<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
  
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function getManagers()
    {
        return $this->hasMany('App\Models\Project','project_mananger','id');
    }
    public function getLeaders()
    {
        return $this->hasMany('App\Models\Project','project_lead_id','id');
    }
    public function getIndividual()
    {
        return $this->hasOne('App\Models\Individual', 'user_id', 'id');
    }
    public function getOrganization()
    {
        return $this->hasOne('App\Models\Organization', 'user_id', 'id');
    }
    public function getVolunteerAllData()
    {
        return $this->hasOne('App\Models\Volunteer', 'user_id', 'id')->with(['getEducation', 'getInstitution', 'getOccupation']);
    }
    public function getVolunteerDetail()
    {
        return $this->hasOne('App\Models\Volunteer', 'user_id', 'id');
    }
    public function getRole()
    {
        return $this->hasOne('App\Models\UserRole', 'id', 'role_id');
    }
    public function getInterestedCause()
    {
        return $this->hasMany('App\Models\UserInterestCause', 'user_id', 'id');
    }
    public function getLanguageKnow()
    {
        return $this->hasMany('App\Models\UserLanguageKnow', 'user_id', 'id');
    }
    public function getUserStates()
    {
        return $this->hasMany('App\Models\UserState', 'user_id', 'id');
    }
    public function getBeneficiaryDetail()
    {
        return $this->hasOne('App\Models\Beneficiary', 'user_id', 'id');
    }
    public function getBloodGroup()
    {
        return $this->hasOne('App\Models\BloodGroup', 'id', 'blood_group');
    }
    public function getCreator()
    {
        return $this->hasOne('App\User', 'id', 'creator_id')->select('id', 'first_name', 'last_name', 'phone', 'profile_pic', 'email','role_id', 'banner_image', 'state');
    }
    public function getBeneficiaryImage()
    {
        return $this->hasMany('App\Models\BeneficiaryImages', 'user_id', 'id');
    }
    public function getMyLastMsg()
    {
        return $this->hasMany('App\Models\ChatIndividual', 'receiver_id','id')->orderby('id','desc')->take(1);
    }
    public function getLastMsg()
    {
        return $this->hasMany('App\Models\ChatIndividual', 'sender_id','id')->orderby('id','desc')->take(1);
    }

    // user for get counts and list blog
    public function getBlogs()
    {
        return $this->hasMany('App\Models\Blog', 'creator_id', 'id');
    }
    // user for get counts and list campaign

    public function getCampaigns()
    {
        return $this->hasMany('App\Models\Campaign', 'creator_id', 'id');
    }
    
    // user for get counts and list blog
    public function getEvents()
    {
        return $this->hasMany('App\Models\Event', 'creator_id', 'id');
    }

    public function getOrgDocument()
    {
        return $this->hasMany('App\Models\OrganizationFile', 'organization_id', 'id')->where('type', 'D');
    }
    public function getOrgCertificate()
    {
        return $this->hasMany('App\Models\OrganizationFile', 'organization_id', 'id')->where('type', 'C');
    }
    
}
