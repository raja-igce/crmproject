<?php
namespace App\Http\Controllers\Front;

use App\Models\CampaignImages;
use App\Models\Event;
use App\Models\CampaignTeam;
use App\Models\CampaignContact;
use App\Models\CampaignCollection;
use App\Models\Project;
use App\Models\Tags;
use App\Models\EventComment;
use App\Models\EventBooking;
use App\Helper\ImageHelper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\eventListResource;
use App\Http\Resources\eventCommentResource;

use Illuminate\Support\Facades\Validator;
use App\Jobs\ProjectCreateMail;
use App\Jobs\ContactCampaignerMail;
use App\Jobs\EventBookingMail;


use App\User;
use DB;
use Hash;
use Auth;
use Carbon;
use File;
use Razorpay\Api\Api;

class EventController extends Controller
{
    public function __construct()
    {
        ///$this->middleware('auth');
    }


    public function bookSeat(Request $request)
    {
        try {
                $userResult = [];
                $add = new EventBooking;
                $add->event_id= $event_id = request("event_id", 0);
                $add->txtfirstname=request("txtfirstname", '');
                $add->txtlastname=request("txtlastname", '');
                $add->description=request("description", '');
                $add->txtemail=request("txtemail", '');
                $add->txtphone=request("txtphone", '');
                $add->txtaddress1=request("txtaddress1", '');
                $add->txtaddress2=request("txtaddress2", '');
                $add->txtstate=request("txtstate", '');
                $add->txtzipcode=request("txtzipcode", '');
                $add->txtcountry=request("txtcountry", '');
                if ($add->save()){
                    $parameter['id'] = $add->id;
                    dispatch(new EventBookingMail($parameter));
                }
                return response(array('code' => 200, 'status' => true, 'message' => 'Your ticket booked successfully.','userResult'=>$userResult));

        } catch (\Exception $e) {
            return response(array('code' => 1044, 'status' => false, 'message' => errormsg($e) ." Try Again!" ));
        }
    }
    public function addEventComment(Request $request)
    {
        try {
            $userResult = [];
            $add = new EventComment;
            $userid = isset(auth()->user()->id)?auth()->user()->id:2;
            $add->event_id= $campaign_id = request("event_id", 0);
            $add->comment=request("txtComment", '');
            $add->email=request("txtemail", '');
            $add->name=request("txtname", '');

            $add->user_id=$userid;
            if ($add->save()) {
            }

            $commentList = EventComment::where('event_id', $campaign_id)->orderby('created_at', 'desc')->get();
            $commentList =  eventCommentResource::collection($commentList);
            return response(array('code' => 200,'commentList'=>$commentList,'status' => true, 'message' => 'Thanks! Donation sent successfully.','userResult'=>$userResult));
        } catch (\Exception $e) {
            return response(array('code' => 1044,'commentList'=>[], 'status' => false, 'message' => $e->getMessage()." Try Again!" ));
        }
    }


    public function event_details(Request $request, $slug='')
    {
        try {
            $userSetting[''] = [];
            $title = "Event";
            $label = "Event";
            $getPriority = getPriority();
            $timeSlot = getTimeslot();

            $projects = [];
            $txtsearch = "";
            $pageno = request('pageno', 100);
            $projectList = Project::whereHas('getEvent')->where('status', 1)->get();

            $userResult = Event::with(['getCreator','getTeam','getEventImages'])->where('slug', $slug)->paginate(1);

            if ($userResult->count()==0) {
                return redirect()->route('eventListing');
            }
            $currentID = $userResult[0]->id;
            $meta_title = $userResult[0]->title;
            $getCreator = $userResult[0]->getCreator;

            $nextblog = Event::where('id','>',$currentID)->skip(0)->take(1)->orderby('id','asc')->get(['id','title','slug']);
            $prevblog = Event::where('id','<',$currentID)->skip(0)->take(1)->orderby('id','desc')->get(['id','title','slug']);
            $userResult =  eventListResource::collection($userResult);

            $commentList = EventComment::with('getSender')->where('event_id', $userResult[0]['id'])->orderby('created_at', 'desc')->get();
            $commentList =  eventCommentResource::collection($commentList);

            $eventList = Event::with('getEventImages')->where('status',1)->where('startdatetime',">=",now())->skip(0)->take(3)->orderby('id','desc')->get();
            $meta['meta_description']=$meta_title;
            $meta['meta_keywords']=$meta_title;
            $meta['meta_title']=$meta_title;
            return view('front.event_details', compact('meta','currentID','eventList','projectList','nextblog','getCreator','prevblog','title','commentList' ,'userResult'));
        } catch (\Exception $e) {
            return response(['status'=>false,'msg'=>errormsg($e)]);
        }
    }



    public function index(Request $request,$slug="")
    {
        try {
            $userSetting[''] = [];
            $title = "Event";
            $label = "Event";
            $pro_id = 0;
            $getPriority = getPriority();
            $timeSlot = getTimeslot();
            $projects = [];
            $txtsearch = "";
            $pageno = request('pageno', 100);
            $filterdata = Event::whereHas('getProject',function($q)use($slug){
              if($slug!=""){
                  $q = $q->where("slug",$slug);
              }
            })->skip(0)->take(1)->get(['id','title','slug']);
            if($filterdata){
              $pro_id = $filterdata[0]->id;
            }

            $projectList = Project::whereHas('getEvent')->where('status', 1)->get();
            $userResult=   Event::with(['getTeam','getEventImages'])->where(function ($q) use ($txtsearch) {
                if (trim($txtsearch)!="") {
                    $q->where('title', 'like', "%$txtsearch%");
                }
            })->where(function ($q) use ($projects) {
                if (count($projects)>0) {
                    $q->whereIn('project_id', $projects);
                }
            })->orderby('updated_at', 'desc')->paginate($pageno);
            //->whereDate('enddatetime1', '>=', \Carbon\Carbon::now())
           // dd($userResult->toArray());

            $userResult =  eventListResource::collection($userResult);
            return view('front.event', compact('pro_id','title', 'userResult', 'projectList'));
        } catch (\Exception $e) {
            return response(['status'=>false,'msg'=>errormsg($e)]);
        }
    }

    public function frontEvent()
    {
        try {
            $pageno = request('pageno', 3);
            $txtsearch = "";
            $userResult=   Event::with(['getTeam','getEventImages'])->where(function ($q) use ($txtsearch) {
                if (trim($txtsearch)!="") {
                    $q->where('title', 'like', "%$txtsearch%");
                }
            })->orderby('updated_at', 'desc')->paginate($pageno);
             

            return $userResult =  eventListResource::collection($userResult);
            return response(['status'=>true,'msg'=>'Get successfully','result'=>$userResult]);
        
        } catch (\Exception $e) {
            return [];//response(['status'=>false,'msg'=>errormsg($e),'result'=>[]]);
        }
    }
    


}
