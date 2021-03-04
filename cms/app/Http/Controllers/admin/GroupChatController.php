<?php 
namespace App\Http\Controllers\admin;
use App\Helper\AccessHelper;
use App\Models\CampaignImages;
use App\Models\Campaign;
use App\Models\CampaignTeam;
use App\Models\Project;
use App\Models\Tags;
use App\Models\ChatIndividual;
use App\Models\ChatMaster;

use App\Models\ChatGroup;
use App\Models\ChatGroupMember;
use App\Models\ChatGroupMessages;

use App\Models\Blog;
use App\Models\BlogCategory;
use App\Http\Resources\chatUserResource;
use App\Http\Resources\chatMessageResource;
use App\Http\Resources\chatedUserResource;
use App\Http\Resources\groupListResource;
use App\Http\Resources\groupMessageResource;


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

class GroupChatController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request, $type = 'education')
    {
        if (auth()->user()->status == 0 || auth()->user()->status==2){
            return redirect()->route('home');
        }
        try {
            $userSetting[''] = [];
            $title = "Blog";
            $label = "Blog";
            $usersList = User::where('role_id', 1)->get();    
            return view('admin.chat.groupchat', compact('usersList','title', 'label'));
        } catch (\Exception $e) {
            return response(['status' => false, 'msg' => errormsg($e)]);
        }
    }

    public function createGroup(Request $req)
    {
        try {
            DB::beginTransaction();
            $validator = Validator::make($req->all(), [
                'txtgroup' => 'required'
            ]);
            if ($validator->fails()) {
                return response(['code' => 104, 'msg' => 'Error - ' . $validator->errors()->first(), 'result' => (object) []]);
            }
            $accessAble = AccessHelper::isAccessAble(auth()->user()->id, 'chat');
            if ($accessAble == 'denied') {
                return response(['code' => 104, 'msg' => 'Prmission Denide']);
            }
            
            $user_id = request('id', '');
            if ($user_id == "" || $user_id == 0) {
                $add = new ChatGroup();
                $msg = "Group added successfully";
            } else {
                $msg = "Group updated successfully";
                $add =  ChatGroup::where('id', $user_id)->first();
            }
            // `icon`, `total_member

            $add->creator_id =  request('project', 0);
            $add->institute_id =  request('institute_id', 0);
            $add->group_name =  request('txtgroup', '');
           
            if ($add->save()) {
                $event_id = $add->id;
                if (count($req->selectteam) > 0) {
                    ChatGroupMember::where('group_id',$event_id)->delete();
                    foreach ($req->selectteam as $key => $value) {
                        $addteam = new ChatGroupMember();
                        $addteam->group_id = $add->id;
                        $addteam->user_id = $value;
                        $addteam->save();
                    }
                    $savepath = ABS_PATH . 'Group/';
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
                            $isExist = ChatGroup::where('id', $add->id)->update(['icon'=>$value]);
                        }
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
    public function deleteGroup(Request $request)
    {
        try{
            $group_id = request('id',0);
            ChatGroup::where('id',$group_id)->delete();
            return response(['status' => true, 'msg' => "Group deleted succesfully"]);
        }catch(\Exception $e) {
            return response(['status' => false, 'msg' => errormsg($e)]);
        }
    }
    public function sendGroupMessages(Request $request)
    {
        try{
            $message = request('message', "");
            if(trim($message)==""){
                return response(['status' => false, 'msg' => "Enter message plase"]);
            }    
            $group_id = request('sendto',0);
             
            ChatGroup::where('id',$group_id)->update(['updated_at'=>date('Y-m-d H:i:s')]);


            $add =  new ChatGroupMessages();
            $add->message = $message; 
            $add->sender_id = auth()->user()->id;
            $add->group_id = $group_id;
            $add->read_status=0; 
            if($add->save()){
                return response(['status' => true, 'msg' => "Sent successfully"]);
            }else{
                return response(['status' => true, 'msg' => "Sent successfully"]);
            }
        } catch (\Exception $e) {
            return response(['status' => false, 'msg' => errormsg($e)]);
        }
    }
    public function ajaxGroupMessages(Request $request)
    {
        $txtsearch = request('txtsearch', "");
        $group_id = request('senderid', 0);
        $myid = auth()->user()->id;
        /*
        where(function ($q) use ($txtsearch) {
            if (trim($txtsearch) != "") {
                $q->where('message', 'like', "%$txtsearch%");
            }
        })->
        */

        
        $pageno = 10000;// request('pageno');
        $userResult =   ChatGroupMessages::where('group_id',$group_id)->with(['getSender'])->orderby('updated_at', 'asc')->paginate($pageno);
        $userResult =  groupMessageResource::collection($userResult);
        return $userResult;
    }
    public function markGroupAsRead(Request $request)
    {
        $myid = auth()->user()->id;
        ChatIndividual::where('receiver_id',$myid)->where('read_status',0)->update(['read_status'=>1]);
    }
    public function ajaxChatedGroups(Request $request)
    {
        $myid = auth()->user()->id;
        $txtsearch = request('txtsearch', "");
        $pageno = 1000;// request('pageno',1100);
        // $userResult =   User::with('getLastMsg','getMyLastMsg')->where(function($q) use($myid){
        //     $q->where('receiver_id',$myid);
        //     $q->orwhere('sender_id',$myid);
        // })->whereIn('role_id',[0,1])->rderby('updated_at', 'desc')->paginate($pageno);


        $accessAble = AccessHelper::isAccessAble(auth()->user()->id, 'chat');
        if ($accessAble == 'denied') {
            $role = [0];
        }else{
            $role = [0,1];
        }

        $userResult =  ChatMaster::where(function($q)use($role){
                $q->whereHas('getReceiver', function ($q1) use ($role) {
                    $q1->whereIn('role_id', $role);
                });
                $q->orwhereHas('getSender', function ($q1) use ($role){
                    $q1->whereIn('role_id', $role);
                });
        })->with(['getUnreadCount','getLastMsg','getSender','getReceiver'])->where(function($q) use($myid){
            $q->where('receiver_id',$myid);
            $q->orwhere('sender_id',$myid);
        })->orderby('updated_at', 'desc')->paginate($pageno);

        // dd($userResult);
        $userResult =  chatedUserResource::collection($userResult);
        return $userResult;
    }
    public function ajaxGroups(Request $request)
    {
        $txtsearch = request('txtsearch', "");
        $myid = auth()->user()->id;


        $accessAble = AccessHelper::isAccessAble(auth()->user()->id, 'chat');
        if ($accessAble == 'denied') {
            $role = [0];
        }else{
            $role = [0,1];
        }
        
        // $userResult =  ChatMaster::where(function($q) use($myid){
        //     $q->where('receiver_id',$myid);
        //     $q->orwhere('sender_id',$myid);
        // })->get();
        // $receiver = $userResult->pluck('receiver_id')->toArray();
        // $sender = $userResult->pluck('sender_id')->toArray();
        // $array = array_merge($sender,$receiver);
        
        //$ingroup = ChatGroupMember::where('user_id')->get()->pluck('group_id');
        $pageno = 1000;// request('pageno',1100);

         
        $userResult = ChatGroup::where(function($q)use($myid){
            if(auth()->user()->role_id!=0){
                $q->whereHas('getMembers',function($q) use($myid){
                    $q->where('user_id',$myid);
                });
            }
        })->with(['getMessages','getMembers','getMembers.getMembers'])->orderby('updated_at', 'desc')->paginate($pageno);
         /*   
         User::where(function($q)use($array){
                 if($array){
                     $q->whereNotIn('id',$array);
                 }
        })->where('id','!=',auth()->user()->id)->with('getLastMsg','getMyLastMsg')->whereIn('role_id',$role)->where(function ($q) use ($txtsearch) {
            if (trim($txtsearch) != ""){
                $q->where('first_name', 'like', "%$txtsearch%");
                $q->orwhere('email', 'like', "%$txtsearch%");
                $q->orwhere('phone', 'like', "%$txtsearch%");
            }
        })->orderby('updated_at', 'desc')->paginate($pageno);
        */
        $userResult =  groupListResource::collection($userResult);
        return $userResult;
    }
}
