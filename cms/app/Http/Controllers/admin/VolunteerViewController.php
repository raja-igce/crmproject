<?php
namespace App\Http\Controllers\admin;

use App\Models\CampaignImages;
use App\Models\Campaign;
use App\Models\CampaignTeam;
use App\Models\Project;
use App\Models\VolunteerPermission;
use App\Models\Tags;


use App\Models\Education;
use App\Models\BloodGroup;
use App\Models\CausesInterested;
use App\Models\Institutions;
use App\Models\LanguageKnown;
use App\Models\Occupation;
use App\Models\State;


use App\Models\OrganizationCategory;
use App\Models\SupportHelp;
 

use App\Helper\ImageHelper;
use App\Helper\Slug;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\campaignListResource;
use App\Http\Resources\UserBeneficiaryResource;


use App\Http\Resources\volunteerDetailsResource;
use App\Http\Resources\UserDetailsResource;
use App\Http\Resources\OrganizationDetailsResource;

use Illuminate\Support\Facades\Validator;
use App\Jobs\ProjectCreateMail;
use App\Models\Volunteer;
use App\User;
use DB;
use Hash;
use Auth;
use Carbon;
use File;

class VolunteerViewController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function viewprofile(Request $request, $id=0)
    {
            
        if(auth()->user()->id==$id || auth()->user()->role_id==0){
//            return redirect()->back();
        }else{
            return redirect()->back();
        }
        try {
            $userVerify = User::where('id',$id)->first();     
            if(!$userVerify){
                return redirect()->back();
            }

            if($userVerify->role_id==0){ 
                    $eduction =  Education::where('status', 1)->get();
                    $CausesInterested =  CausesInterested::where('status', 1)->get();
                    $Institution =  Institutions::where('status', 1)->get();
                    $BloodGroup =  BloodGroup::where('status', 1)->get();
                    $LanguageKnown =  LanguageKnown::where('status', 1)->get();
                    $Occupation =  Occupation::where('status', 1)->orderby('title','asc')->get();
                    $SupportHelp =  SupportHelp::where('status', 1)->get();
                    $State =  State::where('status', 1)->get();
                    $userSetting['Education'] = $eduction;
                    $userSetting['CausesInterested'] = $CausesInterested;
                    $userSetting['Occupation'] = $Occupation;
                    $userSetting['LanguageKnown'] = $LanguageKnown;
                    $userSetting['Institutions'] = $Institution;
                    $userSetting['BloodGroup'] = $BloodGroup;
                    $userSetting['SupportHelp'] = $SupportHelp;
                    $userSetting['State'] = $State;    
                    $userDetail =  User::where('role_id', 0)->where('id',1)->get();
                    //$userDetail =  UserBeneficiaryResource::collection($userResult);
                    return view('admin.users.profileViewAdmin', compact('userDetail','userSetting'));
            }

            if($userVerify->role_id==1){ //volunteer 
            
                $userSetting = [];
                $title = "Campaign";
                $label = "Campaign";
                $getPriority = getPriority();
                $timeSlot = getTimeslot();
                $userDetail = User::with(['getVolunteerDetail','getBloodGroup'])->where('id',$id)->get(); // 0 admin 1=volunteer 2=organization
                $userResult=   Campaign::with(['getTeam','getCreator','getTeam.getTeamMemeber','getProject','getCampaignImages','getCampaignDocs'])
                ->where('creator_id',$id)->orderby('updated_at', 'desc')->paginate(request('pageno',15));
            
                $campaigns =  campaignListResource::collection($userResult);

                $projectList = Project::where('status', 1)->get();
                $premission = VolunteerPermission::where('user_id', $id)->first();
                if(!$premission){
                    $premission = [];
                }
                $eduction =  Education::where('status', 1)->get();
                $CausesInterested =  CausesInterested::where('status', 1)->get();
                $Institution =  Institutions::where('status', 1)->get();
                $BloodGroup =  BloodGroup::where('status', 1)->get();
                $LanguageKnown =  LanguageKnown::where('status', 1)->get();
                $Occupation =  Occupation::where('status', 1)->orderby('title','asc')->get();
                $State =  State::where('status', 1)->get();
                $userSetting['Education'] = $eduction;
                $userSetting['CausesInterested'] = $CausesInterested;
                $userSetting['Occupation'] = $Occupation;
                $userSetting['LanguageKnown'] = $LanguageKnown;
                $userSetting['Institutions'] = $Institution;
                $userSetting['BloodGroup'] = $BloodGroup;
                $userSetting['State'] = $State;
                
                $tagList = Tags::where('status', 1)->get();
                $projects = Project::where('status', 1)->get();
                $userDetail = UserDetailsResource::collection($userDetail);
                return view('admin.users.profileView', compact('userSetting','premission','title','userDetail','campaigns'));
            }//end of volunteer

            if($userVerify->role_id==2){ //organization 
                   
                $userSetting = [];
                $title = "Campaign";
                $label = "Campaign";
                $getPriority = getPriority();
                $timeSlot = getTimeslot();

               
                $userDetail = User::with(['getOrganization', 'getOrganization.getDocument', 'getOrganization.getCertificate'])->where('id',$id)->get(); // 0 admin 1=volunteer 2=organization
                $userResult=   Campaign::with(['getTeam','getCreator','getTeam.getTeamMemeber','getProject','getCampaignImages','getCampaignDocs'])
                ->where('creator_id',$id)->orderby('updated_at', 'desc')->paginate(request('pageno',15));
            
                $campaigns =  campaignListResource::collection($userResult);

                $projectList = Project::where('status', 1)->get();
                $premission = VolunteerPermission::where('user_id', $id)->first();
                if(!$premission){
                    $premission = [];
                }
                //=========================
                        $eduction =  Education::where('status', 1)->get();
                        $CausesInterested =  CausesInterested::where('status', 1)->get();
                        $Institution =  Institutions::where('status', 1)->get();
                        $BloodGroup =  BloodGroup::where('status', 1)->get();
                        $LanguageKnown =  LanguageKnown::where('status', 1)->get();
                        $Occupation =  Occupation::where('status', 1)->orderby('title','asc')->get();
                        $userSetting['Education'] = $eduction;
                        $userSetting['CausesInterested'] = $CausesInterested;
                        $userSetting['Occupation'] = $Occupation;
                        $userSetting['LanguageKnown'] = $LanguageKnown;
                        $userSetting['Institutions'] = $Institution;
                        $userSetting['BloodGroup'] = $BloodGroup;

                        $OrganizationCategory =  OrganizationCategory::where('status', 1)->get();
                        $SupportHelp =  SupportHelp::where('status', 1)->get();


                        $userSetting['getOrganizationSize'] = $getOrganizationSize = getOrganizationSize();
                        $userSetting['getReference'] = $getReference = getReference();
                        $userSetting['OrganizationCategory'] = $OrganizationCategory;
                        $userSetting['SupportHelp'] = $SupportHelp;
                //=======================
                
                $tagList = Tags::where('status', 1)->get();
                $projects = Project::where('status', 1)->get();
                $userDetail = OrganizationDetailsResource::collection($userDetail);
                 
                return view('admin.users.profileViewOrg', compact('userSetting','premission','title','userDetail','campaigns'));
            }//end of organization

             if($userVerify->role_id==3){ //beneficiary 
                $eduction =  Education::where('status', 1)->get();
                $CausesInterested =  CausesInterested::where('status', 1)->get();
                $Institution =  Institutions::where('status', 1)->get();
                $BloodGroup =  BloodGroup::where('status', 1)->get();
                $LanguageKnown =  LanguageKnown::where('status', 1)->get();
                $Occupation =  Occupation::where('status', 1)->orderby('title','asc')->get();
                $SupportHelp =  SupportHelp::where('status', 1)->get();
                $State =  State::where('status', 1)->get();
                $userSetting['Education'] = $eduction;
                $userSetting['CausesInterested'] = $CausesInterested;
                $userSetting['Occupation'] = $Occupation;
                $userSetting['LanguageKnown'] = $LanguageKnown;
                $userSetting['Institutions'] = $Institution;
                $userSetting['BloodGroup'] = $BloodGroup;
                $userSetting['SupportHelp'] = $SupportHelp;
                $userSetting['State'] = $State;    
                $userResult =   User::with(['getCreator','getBloodGroup','getBeneficiaryDetail','getBeneficiaryDetail.getEducation','getBeneficiaryDetail.getSupport'])->where('role_id', 3)->where('id',$id)->get();
                $userDetail =  UserBeneficiaryResource::collection($userResult);
                //dd($userDetail);

                return view('admin.users.profileViewBaneficiary', compact('userDetail','userSetting'));
            }//end of organization
        } catch (\Exception $e) {
            return response(['status'=>false,'msg'=>errormsg($e)]);
        }
    }

    public function index(Request $request, $id=0)
    {
        try {
            $userSetting[''] = [];
            $title = "Campaign";
            $label = "Campaign";
            $getPriority = getPriority();
            $timeSlot = getTimeslot();
            $userDetail = User::with('getVolunteerDetail')->where('id',$id)->get(); // 0 admin 1=volunteer 2=organization


            $userResult=   Campaign::with(['getTeam','getCreator','getTeam.getTeamMemeber','getProject','getCampaignImages','getCampaignDocs'])
            ->where('creator_id',$id)->orderby('updated_at', 'desc')->paginate(request('pageno',15));
           
            $campaigns =  campaignListResource::collection($userResult);

 
            $projectList = Project::where('status', 1)->get();
            $tagList = Tags::where('status', 1)->get();
            $projects = Project::where('status', 1)->get();
            $userDetail = volunteerDetailsResource::collection($userDetail);
            //$userDetail = UserDetailsResource::collection($userDetail);
            
            return view('admin.campaign.volunteerProfile', compact('title','userDetail','campaigns'));
        } catch (\Exception $e) {
            return response(['status'=>false,'msg'=>errormsg($e)]);
        }
    }
    public function ajaxCampaign(Request $request)
    {
        $userstatus = request('userstatus', "");
        $verifystatus = request('verifystatus', "");
        $txtsearch = request('txtsearch', "");
        $projects = request('projects', []);
        $type = request('type', "education");

        $userResult=   Campaign::with(['getTeam','getCreator','getTeam.getTeamMemeber','getProject','getCampaignImages','getCampaignDocs'])->where(function ($q) use ($txtsearch) {
            if (trim($txtsearch)!="") {
                $q->where('title', 'like', "%$txtsearch%");
            }
        })->where(function ($q) use ($projects) {
            if (count($projects)>0) {
                $q->whereIn('project_id', $projects);
            }
        })->where(function ($q) use ($userstatus) {
            if ($userstatus!="") {
                $q->where('status', $userstatus);
            }
        })->orderby('updated_at', 'desc')->paginate($request['pageno']);
        $userResult =  campaignListResource::collection($userResult);
        return $userResult;
    }
    
    public function changePosition(Request $request)
    {
        try {
            DB::beginTransaction();
            $txtposition= request('txtposition', '');  
             
            $isDeleted = User::where('id', $request->id)->update(['position' => $txtposition]);
             
            DB::commit();
            return response(['status' => true, 'msg' => 'success']);
        } catch (\Exception $e) {
            DB::rollback();
            return response(['status' => false, 'msg' => errormsg($e)]);
        }
    }
    public function changeTeam(Request $request)
    {
        try {
            DB::beginTransaction();
            $txtteam= request('txtteam', '');  
            $isDeleted = Volunteer::where('user_id', $request->id)->update(['institutions_id' => $txtteam]);
             
            DB::commit();
            return response(['status' => true, 'msg' => 'success']);
        } catch (\Exception $e) {
            DB::rollback();
            return response(['status' => false, 'msg' => errormsg($e)]);
        }
    }
}
