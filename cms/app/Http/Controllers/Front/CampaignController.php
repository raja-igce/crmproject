<?php
namespace App\Http\Controllers\Front;

use App\Models\CampaignImages;
use App\Models\Campaign;
use App\Models\CampaignTeam;
use App\Models\CampaignContact;
use App\Models\CampaignCollection;
use App\Models\Project;
use App\Models\Tags;
use App\Models\CampaignComment;


use App\Helper\ImageHelper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\campaignListResource;
use App\Http\Resources\commentListResource;

use Illuminate\Support\Facades\Validator;
use App\Jobs\ProjectCreateMail;
use App\Jobs\ContactCampaignerMail;
use App\Jobs\DonationInvoiceMail;


use App\User;
use DB;
use Hash;
use Auth;
use Carbon;
use File;
use Razorpay\Api\Api;

class CampaignController extends Controller
{
    public function __construct()
    {
        ///$this->middleware('auth');
    }


    public function addContact(Request $request)
    {
        try {
            $userResult = [];
            $add = new CampaignContact;
            $userid = isset(auth()->user()->id)?auth()->user()->id:2;
            $add->campaign_id= $campaign_id = request("campaign_id", 0);
            $add->comment=request("txtComment", '');
            $add->email=request("txtemail", '');
            $add->name=request("txtname", '');
            $add->user_id=$userid;
            if ($add->save()) {
                $parameter['id']=$add->id;
                $parameter['type']="CampaignerContact";
                dispatch(new ContactCampaignerMail($parameter));
            }
            return response(array('code' => 200,'commentList'=>[] ,'status' => true, 'message' => 'Thanks! Donation sent successfully.','userResult'=>$userResult));
        } catch (\Exception $e) {
            return response(array('code' => 1044,'commentList'=>[], 'status' => false, 'message' => $e->getMessage()." Try Again!" ));
        }
    }
    public function addComment(Request $request)
    {
        try {
            $userResult = [];
            $add = new CampaignComment;
            $userid = isset(auth()->user()->id)?auth()->user()->id:2;
            $add->campaign_id= $campaign_id = request("campaign_id", 0);
            $add->comment=request("txtComment", '');
            $add->email=request("txtemail", '');
            $add->name=request("txtname", '');

            $add->user_id=$userid;
            if ($add->save()) {
            }

            $commentList = CampaignComment::where('campaign_id', $campaign_id)->orderby('created_at', 'desc')->get();
            $commentList =  commentListResource::collection($commentList);
            return response(array('code' => 200,'commentList'=>$commentList,'status' => true, 'message' => 'Thanks! Donation sent successfully.','userResult'=>$userResult));
        } catch (\Exception $e) {
            return response(array('code' => 1044,'commentList'=>[], 'status' => false, 'message' => $e->getMessage()." Try Again!" ));
        }
    }
    public function saveDonation(Request $request)
    {
        try {
            $userResult = [];
            $amount = isset($request->selectedAmt)?$request->selectedAmt:1000;
            $currency = isset($request->currency)?$request->currency:"INR";
            $payment_id = isset($request->razorpay_payment_id)?$request->razorpay_payment_id:"INR";
            $parameters = $request->all();
            $api_key = env('RozarApiKey');
            $api_secret = env('RozarSecretKey');
            $api = new Api($api_key, $api_secret);
            $isRegistered = isset($request->isRegistered)?1:0;
            $payment = $api->payment->fetch($payment_id);
            if ($payment->status=='authorized') {
                $paymentStatus = $payment->capture(array('amount' =>$payment->amount));
                $add = new CampaignCollection;
                $add->campaign_id= $campaign_id = request("camp_id", 0);
                $add->txtfirstname=request("txtfirstname", '');
                $add->date=date("Y-m-d");
                $add->paiddate=date("Y-m-d");
                $add->txtlastname=request("txtlastname", '');
                $add->txtemail=request("txtemail", '');
                $add->txtphone=request("txtphone", '');
                $add->payment_id=request("razorpay_payment_id", '');
                $add->amount=$amount = request("selectedAmt", 0);
                $add->txtaddress1=request("txtaddress1", '');
                $add->txtaddress2=request("txtaddress2", '');
                $add->txtstate=request("txtstate", '');
                $add->txtzipcode=request("txtzipcode", '');
                $add->txtcountry=request("txtcountry", '');
                if ($add->save()) {
                    $lastid = $add->id;
                    $campDetails = Campaign::where('id', $campaign_id)->first();
                    if ($campDetails) {
                        CampaignCollection::where('id',$lastid)->update(['project_id'=>$campDetails->project_id]);    
                        $targetAmount = $campDetails->amount;
                        $oldCollection = $campDetails->collect_amount;
                        $campDetails->collect_amount = $totalDonation = $oldCollection+$amount;
                        $campDetails->collect_percentage =  round($totalDonation*100/$targetAmount);
                        $campDetails->save();
                    }
                    $userResult = Campaign::with(['getTeam','getProject','getTeam.getTeamMemeber','getCampaignImages','getCampaignCollection'])->where('id', $campaign_id)->paginate(1);
                    
                    $userResult =  campaignListResource::collection($userResult);


                    $controller = \App::make('App\Http\Controllers\admin\CommonController');
                    $pdfArray['id'] = $add->id;
                    $fileUrl = $controller->downloadPDF($pdfArray, 'DonationInvoice');
                    $parameter['id']=$add->id;
                    $parameter['type']="DonationInvoice";
                    $parameter['fileUrl']=$fileUrl;
                    dispatch(new DonationInvoiceMail($parameter));
                }
                return response(array('code' => 200, 'status' => true, 'message' => 'Thanks! Donation sent successfully.','userResult'=>$userResult));
            } else {
                return response(array('code' => 105, 'status' => false, 'message' => 'Your Payment status is '.$payment->status."Try again!",'userResult'=>[]));
            }
        } catch (\Exception $e) {
            return response(array('code' => 1044, 'status' => false, 'message' => errormsg($e) ." Try Again!" ));
        }
    }



    public function campaign_details(Request $request, $slug='')
    {
        try {
            $userSetting[''] = [];
            $title = "Campaign";
            $label = "Campaign";
            $getPriority = getPriority();
            $timeSlot = getTimeslot();

            $projects = [];
            $txtsearch = "";
            $pageno = request('pageno', 100);

            $userResult = Campaign::whereDate('end_date', '>=', \Carbon\Carbon::now())->with(['getTeam','getProject','getTeam.getTeamMemeber','getCampaignImages','getCampaignDocs','getCampaignCollection'])->where('slug', $slug)->paginate(1);
            if ($userResult->count()==0) {
                return redirect()->route('homecampaign');
            }

            $userResult =  campaignListResource::collection($userResult);
            $commentList = CampaignComment::with('getSender')->where('campaign_id', $userResult[0]['id'])->orderby('created_at', 'desc')->get();
            $commentList =  commentListResource::collection($commentList);
            return view('front.campaign_details', compact('title', 'commentList', 'userResult'));
        } catch (\Exception $e) {
            return response(['status'=>false,'msg'=>errormsg($e)]);
        }
    }


    public function underconstruct(Request $request)
    {
        try {
            $userSetting[''] = [];
            $title = "Under Construct";
            $label = "Under Construct";
            $getPriority = getPriority();
            $timeSlot = getTimeslot();

            $projects = [];
            $txtsearch = "";



            return view('front.underconstruct', compact('title'));
        } catch (\Exception $e) {
            return response(['status'=>false,'msg'=>errormsg($e)]);
        }
    }


    public function index(Request $request)
    {
        try {
            $userSetting[''] = [];
            $title = "Campaign";
            $label = "Campaign";
            $getPriority = getPriority();
            $timeSlot = getTimeslot();





            $projects = [];
            $txtsearch = "";
            $pageno = request('pageno', 100);
            $projectList = Project::whereHas('getCampaign',function($q){
                $q->whereDate('end_date', '>=', \Carbon\Carbon::now());
            })->where('status', 1)->get();
            $userResult=   Campaign::with(['getTeam','getProject','getCampaignImages'])->where(function ($q) use ($txtsearch) {
                if (trim($txtsearch)!="") {
                    $q->where('title', 'like', "%$txtsearch%");
                }
            })->where(function ($q) use ($projects) {
                if (count($projects)>0) {
                    $q->whereIn('project_id', $projects);
                }
            })->whereDate('end_date', '>=', \Carbon\Carbon::now())->orderby('updated_at', 'desc')->paginate($pageno);



            $userResult =  campaignListResource::collection($userResult);


            return view('front.campaign', compact('title', 'userResult', 'projectList'));
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

        $userResult=   Campaign::whereDate('end_date', '>=', \Carbon\Carbon::now())->with(['getTeam','getProject','getCampaignImages'])->where(function ($q) use ($txtsearch) {
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
        })->orderby('start_date', 'asc')->paginate($request['pageno']);
        $userResult =  campaignListResource::collection($userResult);
        return $userResult;
    }

    public function frontCampaign()
    {
        

        $userResult=   Campaign::whereDate('end_date', '>=', \Carbon\Carbon::now())->with(['getTeam','getProject','getCampaignImages'])->orderby('start_date', 'asc')->paginate(10);
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
            return response(['status'=>true,'msg'=>'success']);
        } catch (\Exception $e) {
            DB::rollback();
            return response(['status'=>false,'msg'=>errormsg($e)]);
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
                return response(['code' => 104, 'msg' => 'Error - '.$validator->errors()->first(), 'result' => (object) []]);
            }

            $startdate = request('startdate', '');
            $enddate = request('enddate', '');

            $startdate =  Carbon\Carbon::parse($startdate)->format('Y-m-d');
            $enddate =  Carbon\Carbon::parse($enddate)->format('Y-m-d');
            $user_id = request('user_id', '');
            if ($user_id=="" || $user_id==0) {
                $add = new Campaign();
                $msg="Campaign added successfully";
            } else {
                $msg="Campaign updated successfully";
                $add =  Campaign::where('id', $user_id)->first();
                CampaignTeam::where('campaign_id', $user_id)->delete();
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
                $event_id= $add->id;
                if (count($req->selectteam)>0) {
                    foreach ($req->selectteam as $key => $value) {
                        $addteam =new CampaignTeam();
                        $addteam->campaign_id = $add->id;
                        $addteam->user_id = $value;
                        $addteam->save();
                    }
                    $savepath = ABS_PATH.'Campaign/';
                    $documents = $req['imagename'];
                    if (!File::exists($savepath.$event_id)) {
                        File::makeDirectory($savepath.$event_id, 0755, true);
                        File::makeDirectory($savepath.$event_id.'/Thumb', 0755, true);
                    }

                    if (isset($req->imagename)  && count($req->imagename)>0) {
                        foreach ($req->imagename as $key => $value) {
                            if (file_exists(ABS_PATH.'Temp/'.$value)) {
                                File::move(ABS_PATH.'Temp/'.$value, $savepath.$event_id.'/'.$value);
                            }
                            if (file_exists(ABS_PATH.'Temp/Thumb/'.$value)) {
                                File::move(ABS_PATH.'Temp/Thumb/'.$value, $savepath.$event_id.'/Thumb/'.$value);
                            }
                            if (file_exists(ABS_PATH.'Campaign/'.$event_id.'/'.$value)) {
                                ImageHelper::resize_crop_image(900, 600, $savepath.$event_id.'/'.$value, $savepath.$event_id.'/'.$value, 80);
                            }

                            $isExist = CampaignImages::where('campaign_id', $add->id)->where('image', $value)->count();
                            if ($isExist==0) {
                                $addteam =new CampaignImages();
                                $addteam->campaign_id = $add->id;
                                $addteam->image = $value;
                                $addteam->thumb = '';
                                $addteam->type = '';
                                $addteam->save();
                            }
                        }
                    }
                    if (isset($req['deletedImage'])) {
                        $isRemove = CampaignImages::whereIn('id', explode(',', $req['deletedImage']))->where('campaign_id', $event_id)->get();
                        if (count($isRemove)>0) {
                            $savepath = ABS_PATH.'Campaign/';
                            foreach ($isRemove as $key => $value) {
                                File::delete($savepath.$value->prop_id.'/'.$value->image);
                                File::delete($savepath.$value->prop_id.'/Thumb/'.$value->image);
                            }
                        }
                        $isRemove = CampaignImages::whereIn('id', explode(',', $req['deletedImage']))->where('campaign_id', $event_id)->delete();
                    }
                }
            }
            DB::commit();
            //$parameter['project_id']=$add->id;
            //dispatch(new ContactCampaignerMail($parameter));

            return response(['status'=>true,'msg'=>$msg]);
        } catch (\Exception $e) {
            DB::rollback();
            return response(['status'=>true,'msg'=>errormsg($e)]);
        }
    }
}
