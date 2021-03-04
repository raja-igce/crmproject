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

use App\Models\Blog;
use App\Models\BlogCategory;
use App\Http\Resources\chatUserResource;
use App\Http\Resources\chatMessageResource;
use App\Http\Resources\chatedUserResource;

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

class ChatController extends Controller
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
            $tagList = Tags::where('status', 1)->get();
            $categoryList = BlogCategory::all();
            $orgList = User::where('role_id', 2)->get();
            $projectList = Project::all();
            return view('admin.chat.personalchat', compact('orgList', 'projectList', 'title', 'projects', 'label',  'tagList', 'categoryList'));
        } catch (\Exception $e) {
            return response(['status' => false, 'msg' => errormsg($e)]);
        }
    }

    public function sendMessages(Request $request)
    {
        try{
            $message = request('message', "");
            if(trim($message)==""){
                return response(['status' => false, 'msg' => "Enter message plase"]);
            }    
            $sendto = request('sendto',0);
            $isExist = ChatMaster::where(function($q) use($sendto){
                $q->where('sender_id',auth()->user()->id);
                $q->where('receiver_id',$sendto);
            })->orwhere(function($q) use($sendto){
                $q->where('receiver_id',auth()->user()->id);
                $q->where('sender_id',$sendto);
            })->first();
            if(!$isExist){
                  $addnew  = new ChatMaster();
                  $addnew->sender_id = auth()->user()->id;
                  $addnew->receiver_id = $sendto; 
                  $addnew->save();  
                  $chat_id = $addnew->id;
            }else{
                  ChatMaster::where('id',$isExist->id)->update(['updated_at'=>date('Y-m-d H:i:s')]);  
                  $chat_id = $isExist->id;
            }
            $add =  new ChatIndividual();
            $add->message = $message; 
            $add->sender_id = auth()->user()->id;
            $add->receiver_id = request('sendto',0);
            $add->chat_id = $chat_id;
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
    public function ajaxChatMessages(Request $request)
    {
        $txtsearch = request('txtsearch', "");
        $sendto = request('senderid', 3);
        $myid = auth()->user()->id;
        /*
        where(function ($q) use ($txtsearch) {
            if (trim($txtsearch) != "") {
                $q->where('message', 'like', "%$txtsearch%");
            }
        })->
        */

        $pageno = 10000;// request('pageno');
        $userResult =   ChatIndividual::with(['getSender','getReceiver'])->
        where(function($q) use($sendto,$myid){
               $q->where('receiver_id',$sendto); 
               $q->where('sender_id',$myid); 
        })->orwhere(function($q) use($sendto,$myid){
               $q->where('receiver_id',$myid); 
               $q->where('sender_id',$sendto); 
        })->orderby('updated_at', 'asc')->paginate($pageno);
        $userResult =  chatMessageResource::collection($userResult);
        return $userResult;
    }
    public function markAsRead(Request $request)
    {
        $myid = auth()->user()->id;
        ChatIndividual::where('receiver_id',$myid)->where('read_status',0)->update(['read_status'=>1]);
    }
    public function ajaxChatedUsers(Request $request)
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
    public function ajaxChatUsers(Request $request)
    {
        $txtsearch = request('txtsearch', "");
        $myid = auth()->user()->id;


        $accessAble = AccessHelper::isAccessAble(auth()->user()->id, 'chat');
        if ($accessAble == 'denied') {
            $role = [0];
        }else{
            $role = [0,1];
        }
        
        $userResult =  ChatMaster::where(function($q) use($myid){
            $q->where('receiver_id',$myid);
            $q->orwhere('sender_id',$myid);
        })->get();
        $receiver = $userResult->pluck('receiver_id')->toArray();
        $sender = $userResult->pluck('sender_id')->toArray();
        $array = array_merge($sender,$receiver);
        
        $pageno = 1000;// request('pageno',1100);
        $userResult =   User::where(function($q)use($array){
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
         $userResult =  chatUserResource::collection($userResult);
        return $userResult;
    }
}
