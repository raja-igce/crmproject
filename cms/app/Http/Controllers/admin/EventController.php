<?php

namespace App\Http\Controllers\admin;

use App\Helper\AccessHelper;
use App\Models\Event;
use App\Models\EventTeam;
use App\Models\Project;
use App\Models\EventImages;
use App\Models\Tags;
use App\Helper\ImageHelper;
use App\Helper\Slug;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\eventListResource;
use Illuminate\Support\Facades\Validator;

use App\Jobs\ProjectCreateMail;

use App\User;
use DB;
use Hash;
use Auth;
use Carbon;
use File;

class EventController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($type = '',$id=0)
    {
        $accessAble = AccessHelper::isAccessAble(auth()->user()->id, 'event');
        if ($accessAble == 'denied') {
            return redirect()->route('home');
        }

        try {
            $userSetting[''] = [];
            $title = "Event";
            $label = "Event";
            $getPriority = getPriority();
            $timeSlot = getTimeslot();
 
            $usersList = User::where('role_id', 1)->get();
            $creatorList = User::whereHas('getEvents')->get();
            $projectList = Project::where('status', 1)->get();
            $tagList = Tags::where('status', 1)->get();


            return view('admin.event.event', compact('title','creatorList', 'label', 'getPriority', 'usersList', 'projectList', 'tagList', 'timeSlot','type','id'));
        } catch (\Exception $e) {
            return response(['status' => false, 'msg' => errormsg($e)]);
        }
    }
    public function ajaxEvent(Request $request)
    {
        $userstatus = request('userstatus', "");
        $verifystatus = request('verifystatus', "");
        $txtsearch = request('txtsearch', "");
        $type = request('type', "education");
        $project_id = request('project_id', "");
        $txtproject = request('txtproject', "");
        $txtcreator = request('txtcreator', "");
        $id = request('id', 0);
	
        $userResult =   Event::with(['getTeam','getCreator', 'getTeam.getMemeber', 'getEventImages'])->where(function ($q) use ($txtsearch) {
            if (trim($txtsearch) != "") {
                $q->where('title', 'like', "%$txtsearch%");
                $q->whereHas('getCreator',function ($q) use ($txtsearch) {
                    if (trim($txtsearch) != "") {
                        $q->orwhere('first_name', 'like', "$txtsearch%");
                    }
                });
            }
        })->where(function ($q) use ($id) {
            if ($id != "") {
                $q->where('id', $id);
            }
        })->where(function ($q) use ($userstatus) {
            if ($userstatus != "") {
                $q->where('status', $userstatus);
            }
        })->where(function ($q) use ($project_id) {
            if ($project_id != "") {
                $q->where('project_id', $project_id);
            }
        })->where(function ($q) use ($txtproject) {
            if ($txtproject != "") {
                $q->where('project_id', $txtproject);
            }
        })->where(function ($q) use ($txtcreator) {
            if ($txtcreator != "") {
                $q->where('creator_id', $txtcreator);
            }
        })->orderby('updated_at', 'desc')->paginate($request['pageno']);
        $userResult =  eventListResource::collection($userResult);
        return $userResult;
    }

    public function deleteEvent(Request $request)
    {
        try {
            DB::beginTransaction();
            $type = request('type', "education");
            $id = request('id', 0);

            Project::where('id', $id)->delete();
            ProjectTeam::where('project_id', $id)->delete();

            DB::commit();
            return response(['status' => true, 'msg' => 'success']);
        } catch (\Exception $e) {
            DB::rollback();
            return response(['status' => false, 'msg' => errormsg($e)]);
        }
    }

    public function addEvent(Request $req)
    {
        try {
            DB::beginTransaction();
            $validator = Validator::make($req->all(), [
                'title' => 'required'
            ]);
            if ($validator->fails()) {
                return response(['code' => 104, 'msg' => 'Error - ' . $validator->errors()->first(), 'result' => (object) []]);
            }
            $accessAble = AccessHelper::isAccessAble(auth()->user()->id, 'event');
            if ($accessAble == 'denied') {
                return response(['code' => 404, 'msg' => 'Permission Denide']);
            }


            $startdate = request('startdate', '');
            $enddate = request('enddate', '');
            $reminderdate = request('reminderdate', '');
            $starttime = request('starttime', '');
            $endtime = request('endtime', '');
            $remindertime = request('remindertime', '');
            if ($starttime == "") {
                $starttime = "00:00:00";
            }
            if ($endtime == "") {
                $endtime = "00:00:00";
            }
            if ($remindertime == "") {
                $remindertime = "00:00:00";
            }

            $startdate =  Carbon\Carbon::parse($startdate)->format('Y-m-d');
            $enddate =  Carbon\Carbon::parse($enddate)->format('Y-m-d');
            $reminderdate =  Carbon\Carbon::parse($reminderdate)->format('Y-m-d');

            $user_id = request('user_id', '');
            if ($user_id == "" || $user_id == 0) {
                $add = new Event();
                $msg = "Event added successfully";
                $slug = new Slug();
                $add->slug = $slug->createEventSlug($req->title);
                $add->creator_id =  auth()->user()->id;
            } else {
                $msg = "Event updated successfully";
                $add =  Event::where('id', $user_id)->first();
                EventTeam::where('event_id', $user_id)->delete();
                $slug = new Slug();
                $newslug = $slug->createEventSlug($req->title, $user_id);
                if ($add->slug != $newslug) {
                    $slug = new Slug();
                    $add->slug = $slug->createBlogSlug($newslug, $user_id);
                }
            }

            $tags = request('tags', []);
            $tagsDetail = Tags::whereIn('id', $tags)->get(['id', 'title'])->toArray();
            $add->project_id =  request('project', 0);
            
            $add->title =  request('title', '0');
            $add->description =  request('description', '');
            $add->sub_title =  request('subtitle', '');
            $add->seats =  request('seats', '0');
            $add->location =  request('location', '0');
            $add->lat =  request('lat', '');
            $add->lng =  request('lng', '');

            $add->startdatetime =  $startdate . ' ' . $starttime;
            $add->enddatetime =  $enddate . ' ' . $endtime;
            $add->reminderdatetime =  $reminderdate . ' ' . $remindertime;
            $add->tags =  json_encode($tagsDetail);
            $add->status = 1;
            if ($add->save()) {
                $event_id = $add->id;
                if (count($req->selectteam) > 0) {
                    foreach ($req->selectteam as $key => $value) {
                        $addteam = new EventTeam();
                        $addteam->event_id = $add->id;
                        $addteam->user_id = $value;
                        $addteam->save();
                    }
                    $savepath = ABS_PATH . 'Event/';
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
                            if (file_exists(ABS_PATH . 'Event/' . $event_id . '/' . $value)) {
                                ImageHelper::resize_crop_image(900, 600, $savepath . $event_id . '/' . $value, $savepath . $event_id . '/' . $value, 80);
                            }

                            $isExist = EventImages::where('event_id', $add->id)->where('image', $value)->count();
                            if ($isExist == 0) {
                                $addteam = new EventImages();
                                $addteam->event_id = $add->id;
                                $addteam->image = $value;
                                $addteam->save();
                            }
                        }
                    }
                    if (isset($req['deletedImage'])) {
                        $isRemove = EventImages::whereIn('id', explode(',', $req['deletedImage']))->where('event_id', $event_id)->get();
                        if (count($isRemove) > 0) {
                            $savepath = ABS_PATH . 'Event/';
                            foreach ($isRemove as $key => $value) {
                                File::delete($savepath . $value->prop_id . '/' . $value->image);
                                File::delete($savepath . $value->prop_id . '/Thumb/' . $value->image);
                            }
                        }
                        $isRemove = EventImages::whereIn('id', explode(',', $req['deletedImage']))->where('event_id', $event_id)->delete();
                    }
                }
            }
            DB::commit();
            $parameter['project_id'] = $add->id;
            dispatch(new ProjectCreateMail($parameter));

            return response(['status' => true, 'msg' => $msg]);
        } catch (\Exception $e) {
            DB::rollback();
            return response(['status' => true, 'msg' => errormsg($e)]);
        }
    }
}
