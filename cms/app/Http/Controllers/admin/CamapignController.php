<?php

namespace App\Http\Controllers\admin;

use App\Helper\AccessHelper;
use App\Models\Education;
use App\Models\BloodGroup;
use App\Models\CausesInterested;
use App\Models\Institutions;
use App\Models\LanguageKnown;
use App\Models\Occupation;
use App\Models\State;


use App\Models\CampaignImages;
use App\Models\Campaign;
use App\Models\CampaignTeam;
use App\Models\Project;
use App\Models\Tags;

use App\Helper\ImageHelper;
use App\Helper\Slug;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\campaignListResource;
use Illuminate\Support\Facades\Validator;
use App\Jobs\ProjectCreateMail;

use App\User;
use DB;
use Hash;
use Auth;
use Carbon;
use File;

class CamapignController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request, $type = 'education')
    {
        try {
            $userSetting[''] = [];
            $title = "Campaign";
            $label = "Campaign";
            $getPriority = getPriority();
            $timeSlot = getTimeslot();
            $accessAble = AccessHelper::isAccessAble(auth()->user()->id, 'campaign');
            if ($accessAble == 'denied') {
                return redirect()->route('home');
            }
           
            $usersList = User::where('role_id', 1)->get();
            $campaignerList = User::whereIn('role_id',[0,1])->get();
            $projectList = Project::where('status', 1)->get();
            $tagList = Tags::where('status', 1)->get();
            $projects = Project::where('status', 1)->get();

            $eduction =  Education::where('status', 1)->get();
            $CausesInterested =  CausesInterested::where('status', 1)->get();
            $Institution =  Institutions::where('status', 1)->get();
            $BloodGroup =  BloodGroup::where('status', 1)->get();
            $LanguageKnown =  LanguageKnown::where('status', 1)->get();
            $Occupation =  Occupation::where('status', 1)->get();
            $State =  State::where('status', 1)->get();
            $userSetting['Education'] = $eduction;
            $userSetting['CausesInterested'] = $CausesInterested;
            $userSetting['Occupation'] = $Occupation;
            $userSetting['LanguageKnown'] = $LanguageKnown;
            $userSetting['Institutions'] = $Institution;
            $userSetting['BloodGroup'] = $BloodGroup;
            $userSetting['State'] = $State;

            return view('admin.campaign.campaigntable', compact('title','userSetting','campaignerList', 'projects', 'label', 'getPriority', 'usersList', 'projectList', 'tagList', 'timeSlot'));
        } catch (\Exception $e) {
            return response(['status' => false, 'msg' => errormsg($e)]);
        }
    }
    public function ajaxCampaign(Request $request)
    {
        $userstatus = request('userstatus', "");
        $verifystatus = request('verifystatus', "");
        $txtsearch = request('txtsearch', "");
       
        $type = request('type', "education");
        $campstatus= request('campstatus', "");
        $usercauses= request('usercauses', "");
        $creator= request('creator', "");
        

        $accessAble = AccessHelper::isAccessAble(auth()->user()->id, 'campaign');
        if ($accessAble == 'grant_acces') {
            $creator = auth()->user()->id;
        }elseif($accessAble == 'authorized'){

        }else{
            $creator = auth()->user()->id;
        }
        
        if(auth()->user()->role_id==2){
            $creator = auth()->user()->id;
        }


        $userResult =   Campaign::with(['getTeam', 'getCreator', 'getTeam.getTeamMemeber', 'getProject', 'getCampaignImages', 'getCampaignDocs'])->where(function ($q) use ($txtsearch) {
            if (trim($txtsearch) != "") {
                $q->where('title', 'like', "%$txtsearch%");
            }
        })->where(function ($q) use ($usercauses) {
            if ($usercauses != "") {
                $q->where('project_id', $usercauses);
            }
        })->where(function ($q) use ($creator){
            if ($creator!="") {
                $q->where('creator_id', $creator);
            }
        })->where(function ($q) use ($campstatus) {
            if ($campstatus!="") {
                $nowdate =  Carbon\Carbon::now()->format('Y-m-d');
                if(strtolower($campstatus)=='live'){
                    $q->whereDate('start_date','<=' ,$nowdate);
                    $q->whereDate('end_date','>=' ,$nowdate);
                }
                if(strtolower($campstatus)=='completed'){
                    $q->whereDate('end_date','<' ,$nowdate);
                }
            }
        })->where(function ($q) use ($userstatus) {
            if ($userstatus != "") {
                $q->where('status', $userstatus);
            }
        })->orderby('updated_at', 'desc')->paginate($request['pageno']);
        $userResult =  campaignListResource::collection($userResult);
        return $userResult;
    }

    public function deleteCampaign(Request $request)
    {
        try {
            DB::beginTransaction();
            $type = request('type', "education");
            $id = request('id', 0);


            Campaign::where('id', $id)->delete();
            CampaignImages::where('campaign_id', $id)->delete();
            CampaignTeam::where('campaign_id', $id)->delete();

            DB::commit();
            return response(['status' => true, 'msg' => 'success']);
        } catch (\Exception $e) {
            DB::rollback();
            return response(['status' => false, 'msg' => errormsg($e)]);
        }
    }

    public function addCampaign(Request $req)
    {
        try {
            DB::beginTransaction();
            $validator = Validator::make($req->all(), [
                'title' => 'required'
            ]);
            if ($validator->fails()) {
                return response(['code' => 104, 'msg' => 'Error - ' . $validator->errors()->first(), 'result' => (object) []]);
            }
            $accessAble = AccessHelper::isAccessAble(auth()->user()->id, 'campaign');
            if ($accessAble == 'denied') {
                return response(['code' => 104, 'msg' => 'Prmission Denide']);
            }
            $startdate = request('startdate', '');
            $enddate = request('enddate', '');

            $startdate =  Carbon\Carbon::parse($startdate)->format('Y-m-d');
            $enddate =  Carbon\Carbon::parse($enddate)->format('Y-m-d');
            $user_id = request('user_id', '');
            if ($user_id == "" || $user_id == 0) {
                $add = new Campaign();
                $msg = "Campaign added successfully";
                $slug = new Slug();
                $add->slug = $slug->createSlug($req->title);
                $add->creator_id = auth()->user()->id;
            } else {
                $msg = "Campaign updated successfully";
                $add =  Campaign::where('id', $user_id)->first();
                CampaignTeam::where('campaign_id', $user_id)->delete();
                $slug = new Slug();
                //$newslug = $slug->createSlug($req->title);
                $newslug = $slug->createSlug($req->title, $user_id);
                if ($add->slug != $newslug) {
                    $slug = new Slug();
                    $add->slug = $slug->createSlug($newslug, $user_id);
                }
            }

            $tags = request('tags', []);
            $tagsDetail = Tags::whereIn('id', $tags)->get(['id', 'title'])->toArray();
            $add->project_id =  request('project', 0);
            $add->title =  request('title', '');
            $add->subtitle =  request('subtitle', '');
            $add->description =  request('description', '');
            $add->story =  request('story', '');
            $add->location =  request('location', '');
            $add->amount =  request('amount', '');
            $add->start_date =  $startdate;
            $add->end_date =  $enddate;
            $add->tags =  json_encode($tagsDetail);
            $add->status = 1;
            if ($add->save()) {
                $event_id = $add->id;
                if (count($req->selectteam) > 0) {
                    foreach ($req->selectteam as $key => $value) {
                        $addteam = new CampaignTeam();
                        $addteam->campaign_id = $add->id;
                        $addteam->user_id = $value;
                        $addteam->save();
                    }
                    $savepath = ABS_PATH . 'Campaign/';
                    $documents = $req['imagename'];
                    if (!File::exists($savepath . $event_id)) {
                        File::makeDirectory($savepath . $event_id, 0755, true);
                        File::makeDirectory($savepath . $event_id . '/Thumb', 0755, true);
                    }

                    if (isset($req->imagename)  && count($req->imagename) > 0) {
                        foreach ($req->imagename as $key => $value) {
                            if (file_exists(ABS_PATH . 'Temp/' . $value)) {
                                File::move(ABS_PATH . 'Temp/' . $value, $savepath . $event_id . '/' . $value);
                            }
                            if (file_exists(ABS_PATH . 'Temp/Thumb/' . $value)) {
                                File::move(ABS_PATH . 'Temp/Thumb/' . $value, $savepath . $event_id . '/Thumb/' . $value);
                            }
                            if (file_exists(ABS_PATH . 'Campaign/' . $event_id . '/' . $value)) {
                                ImageHelper::resize_crop_image(900, 600, $savepath . $event_id . '/' . $value, $savepath . $event_id . '/' . $value, 80);
                            }

                            $isExist = CampaignImages::where('campaign_id', $add->id)->where('image', $value)->count();
                            if ($isExist == 0) {
                                $addteam = new CampaignImages();
                                $addteam->campaign_id = $add->id;
                                $addteam->image = $value;
                                $addteam->thumb = '';
                                $addteam->type = 'img';
                                $addteam->save();
                            }
                        }
                    }
                    if (isset($req->imagename1)  && count($req->imagename1) > 0) {
                        foreach ($req->imagename1 as $key => $value) {
                            if (file_exists(ABS_PATH . 'Temp/' . $value)) {
                                File::move(ABS_PATH . 'Temp/' . $value, $savepath . $event_id . '/' . $value);
                            }
                            if (file_exists(ABS_PATH . 'Temp/Thumb/' . $value)) {
                                File::move(ABS_PATH . 'Temp/Thumb/' . $value, $savepath . $event_id . '/Thumb/' . $value);
                            }
                            if (file_exists(ABS_PATH . 'Campaign/' . $event_id . '/' . $value)) {
                                //ImageHelper::resize_crop_image(900, 600, $savepath.$event_id.'/'.$value, $savepath.$event_id.'/'.$value, 80);
                            }

                            $isExist = CampaignImages::where('campaign_id', $add->id)->where('image', $value)->where('type', 'doc')->count();
                            if ($isExist == 0) {
                                $addteam = new CampaignImages();
                                $addteam->campaign_id = $add->id;
                                $addteam->image = $value;
                                $addteam->thumb = 'img';
                                $addteam->type = 'doc';
                                $addteam->save();
                            }
                        }
                    }
                    if (isset($req['deletedImage'])) {
                        $isRemove = CampaignImages::whereIn('id', explode(',', $req['deletedImage']))->where('campaign_id', $event_id)->get();
                        if (count($isRemove) > 0) {
                            $savepath = ABS_PATH . 'Campaign/';
                            foreach ($isRemove as $key => $value) {
                                File::delete($savepath . $value->prop_id . '/' . $value->image);
                                File::delete($savepath . $value->prop_id . '/Thumb/' . $value->image);
                            }
                        }
                        $isRemove = CampaignImages::whereIn('id', explode(',', $req['deletedImage']))->where('campaign_id', $event_id)->delete();
                    }
                }
            }
            DB::commit();
            $parameter['project_id'] = $add->id;
            //dispatch(new ProjectCreateMail($parameter));

            return response(['status' => true, 'msg' => $msg]);
        } catch (\Exception $e) {
            DB::rollback();
            return response(['status' => true, 'msg' => errormsg($e)]);
        }
    }
}
