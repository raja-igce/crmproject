<?php
namespace App\Http\Controllers\admin;
use App\Helper\AccessHelper;

use App\Helper\ImageHelper;
use App\Models\Education;
use App\Models\BloodGroup;
use App\Models\CausesInterested;
use App\Models\Institutions;
use App\Models\LanguageKnown;
use App\Models\Occupation;
use App\Models\Volunteer;
use App\Models\Project;
use App\Models\ProjectTeam;
use App\Models\Tags;
use App\Models\Task;
use App\Models\TaskCheckList;
use App\Models\TaskObservers;
use App\Models\TaskFile;
use App\Models\TaskSchedule;



use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\taskListResource;
use Illuminate\Support\Facades\Validator;
use App\Jobs\ProjectCreateMail;

use App\User;
use DB;
use Hash;
use Auth;
use Carbon;
use File;

class TaskController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function taskreview(Request $request)
    {
        try {
            $userSetting[''] = [];
            $title = "Task review";
            $label = "Task review";
            $getPriority = getPriority();
            $timeSlot = getTimeslot();
            $usersList = User::where('role_id', 1)->get();
            $tagList = Tags::where('status', 1)->get();
            $projectList = Project::where('status', 1)->get();
            return view('admin.task.todotask', compact('timeSlot', 'title', 'label', 'projectList', 'getPriority', 'usersList', 'tagList'));
        } catch (\Exception $e) {
            return response(['status'=>false,'msg'=>errormsg($e)]);
        }
    }


    public function index($type='',$id=0)
    {
        try {
            $userSetting[''] = [];
            $title = "Task";
            $label = "Task";
            $getPriority = getPriority();
            $timeSlot = getTimeslot();
            $usersList = User::where('role_id', 1)->get();
            $tagList = Tags::where('status', 1)->get();
            $projectList = Project::where('status', 1)->get();
            return view('admin.task.task', compact('timeSlot', 'title', 'label', 'projectList', 'getPriority', 'usersList', 'tagList','type','id'));
        } catch (\Exception $e) {
            return response(['status'=>false,'msg'=>errormsg($e)]);
        }
    }

    public function ajaxAssignTask(Request $request)
    {
        $userstatus = request('userstatus', "");
        $verifystatus = request('verifystatus', "");
        $txtsearch = request('txtsearch', "");
        $type = request('type', "education");
        $project_id = request('project_id', "");
        $tasktype = request('tasktype', "");
        $assignid = request('taskassigne', "0");
        $userstatus = request('userstatus', "");
        
        $creator = '';
        // $accessAble = AccessHelper::isAccessAble(auth()->user()->id, 'project');
        // if ($accessAble == 'grant_acces') {
        //     $creator = auth()->user()->id;
        // }elseif($accessAble == 'authorized'){

        // }else{
        //     $creator = auth()->user()->id;
        // }

        if(auth()->user()->role_id==2 || auth()->user()->role_id==1){
            $creator = auth()->user()->id;
        }

        $assignid = auth()->user()->id;        

        $userResult=   Task::with(['getTaskCheckList','getTaskDocuments','getProject','getManager','getAssignee','getObservers','getObservers.getObservers'])
        ->where(function ($q) use ($userstatus,$assignid) {
            if ($userstatus!="") {
                if($userstatus=='today'){
                    $q->whereDate('startdatetime',"<=", date('Y-m-d'));    
                    $q->whereDate('enddatetime',">=",date('Y-m-d'));    
                    $q->orderby('startdatetime', 'asc');
                }else if($userstatus=='upcoming'){
                    $q->whereDate('startdatetime',">=", now());    
                    $q->orderby('startdatetime', 'asc');
                }else if($userstatus=='completed'){
                    $q->where('status',1);    
                    $q->orderby('startdatetime', 'desc');
                }else{

                }
                $q->where(function($q2)use($assignid){
                        if(auth()->user()->role_id!=0){
                            $q2->orwhere('task_manager',$assignid);
                            $q2->orwhere('task_assignee',$assignid);
                            $q2->orwhereHas('getObservers',function($q3)use($assignid){
                                $q3->where('user_id',$assignid);
                            });
                        }
                });    
                
                
            }
        })->where(function ($q) use ($project_id){
            if($project_id!=""){
                $q->where('project_id', $project_id);
            }
        })->where(function ($q) use ($creator,$userstatus){
            // if($creator!=""){
            //         $q->where('creator_id', $creator);
            // }
        })->where(function ($q) use ($tasktype,$assignid){
            if($tasktype!=""){
                if($tasktype=='taskassign'){
                    if($assignid!= "" && $assignid!= 0){
                        $q->where('task_assignee', $assignid);
                    }else{
                      $q->where('task_assignee','!=', 0);
                    }
                }
                if($tasktype=='notassigned'){
                    $q->where('task_assignee', 0);
                }
            }
        })->paginate($request['pageno']);
       
        $userResult =  taskListResource::collection($userResult);
        return $userResult;
    }
    public function ajaxTask(Request $request)
    {
        $userstatus = request('userstatus', "");
        $verifystatus = request('verifystatus', "");
        $txtsearch = request('txtsearch', "");
        $type = request('type', "education");
        $project_id = request('project_id', "");
        $tasktype = request('tasktype', "");
        $assignid = request('taskassigne', "0");
        $userstatus = request('userstatus', "");
        
        $creator = '';
        // $accessAble = AccessHelper::isAccessAble(auth()->user()->id, 'project');
        // if ($accessAble == 'grant_acces') {
        //     $creator = auth()->user()->id;
        // }elseif($accessAble == 'authorized'){

        // }else{
        //     $creator = auth()->user()->id;
        // }

        if(auth()->user()->role_id==2 || auth()->user()->role_id==1){
            $creator = auth()->user()->id;
        }

        $assignid = auth()->user()->id;        

        $userResult=   Task::with(['getTaskCheckList','getTaskDocuments','getProject','getManager','getAssignee','getObservers','getObservers.getObservers'])
        ->where(function ($q) use ($project_id){
            if($project_id!=""){
                $q->where('project_id', $project_id);
            }
        })->where(function ($q) use ($creator,$userstatus){
            if($creator!=""){
                    $q->where('creator_id', $creator);
            }
        })->where(function ($q) use ($tasktype,$assignid){
            if($tasktype!=""){
                if($tasktype=='taskassign'){
                    if($assignid!= "" && $assignid!= 0){
                        $q->where('task_assignee', $assignid);
                    }else{
                      $q->where('task_assignee','!=', 0);
                    }
                }
                if($tasktype=='notassigned'){
                    $q->where('task_assignee', 0);
                }
            }
        })->where('recurring_id',0)->orderby('updated_at', 'desc')->paginate($request['pageno']);
       
        $userResult =  taskListResource::collection($userResult);
        return $userResult;
    }

    public function deleteTask(Request $request)
    {
        try {
            DB::beginTransaction();
            $type = request('type', "education");
            $id = request('id', 0);

            Task::where('id', $id)->delete();
            TaskCheckList::where('task_id', $id)->delete();
            TaskObservers::where('task_id', $id)->delete();

            DB::commit();
            return response(['status'=>true,'msg'=>'success']);
        } catch (\Exception $e) {
            DB::rollback();
            return response(['status'=>false,'msg'=>errormsg($e)]);
        }
    }
    public function doneTask(Request $request)
    {
        try {
            DB::beginTransaction();
            $status = request('status', 0);
            $id = request('id', 0);
            $task_id = request('task_id', 0);
            if($status){
                $msg = "Mark as done task successfully"; 
            }else{
                $msg = "Rollback from done task"; 
            }

            TaskCheckList::where('id', $id)->update(['status'=>$status,"completed_date"=>now()]);
            $donecount = TaskCheckList::where('task_id', $task_id)->where('status',0)->count();
            if($donecount==0){
                Task::where('id',$task_id)->update(['status'=>1]);
                $msg = "All Task completed"; 
            }else{
                Task::where('id',$task_id)->update(['status'=>0]);
                
            }
            DB::commit();
            return response(['status'=>true,'msg'=>$msg]);
        } catch (\Exception $e) {
            DB::rollback();
            return response(['status'=>false,'msg'=>errormsg($e)]);
        }
    }

 public function addRecord($request,$startdate,$enddate)
 {          
            $add = new Task();
            $add->creator_id =  auth()->user()->id;    
            $tagsDetail = '';// Tags::whereIn('id', $tags)->get(['id', 'title'])->toArray();
            $add->title =  request('title', '');
            $add->description =  request('description', '');
            $add->priority =  request('priority', '');
            $add->project_id =  request('project', '');
            $add->task_manager =  request('manager_id', 0);
            $add->task_assignee =  request('assign_id', 0);
            $add->contact_id =  request('contact_id', 0);
            $add->startdatetime =  $startdate;
            $add->enddatetime =  $enddate;
            $add->reminderdatetime =  $startdate;
            $add->tags =  json_encode($tagsDetail);
            $add->status = 1;
            if ($add->save()) {
                $taskid = $add->id;
                if (count($request->observers)>0) {
                    foreach ($request->observers as $key => $value) {
                        if ($value!="") {
                            $addteam =new TaskObservers();
                            $addteam->task_id = $taskid;
                            $addteam->user_id = $value;
                            $addteam->save();
                        }
                    }
                }
                if (count($request->tasklist)>0) {
                    foreach ($request->tasklist as $key => $value) {
                        if ($value!="") {
                            $addteam =new TaskCheckList();
                            $addteam->task_id = $taskid;
                            $addteam->title = $value;
                            $addteam->save();
                        }
                    }
                }
            }
    }


     public function OLDaddTask(Request $req)
    {
        try {
            DB::beginTransaction();
            $validator = Validator::make($req->all(), [
                'title' => 'required'
            ]);
            if ($validator->fails()) {
                return response(['code' => 104, 'msg' => 'Error - '.$validator->errors()->first(), 'result' => (object) []]);
            }
            $recursive_id = 0;    
            $msg="Task added successfully";
            $startdate = request('startdate', '');
            $enddate = request('enddate', '');
            $reminderdate = request('reminderdate', '');
            $starttime = request('starttime', '');
            $endtime = request('endtime', '');
            $remindertime = request('remindertime', '');
            if ($starttime=="") {
                $starttime="00:00:00";
            }
            if ($endtime=="") {
                $endtime="00:00:00";
            }
            if ($remindertime=="") {
                $remindertime="00:00:00";
            }

                    $startdate =  Carbon\Carbon::parse($startdate)->format('Y-m-d');
                    $enddate =  Carbon\Carbon::parse($enddate)->format('Y-m-d');
                    $reminderdate =  Carbon\Carbon::parse($reminderdate)->format('Y-m-d');

                    $sdt = $startdate.' '.$starttime;
                    $edt = $enddate.' '.$endtime;

             		$event_isRepeating = request('mode','');    
                    $recur_enddate = request('recur_enddate','');    
                    
                    $day = request('day',[]);    
                    $event_startTime = $sdt;
                    $event_endTime = $edt;
                    $array_sdate = [];
                    $array_edate = [];
                    if($event_isRepeating=='weekly'){ // weekly 
                        $event_start=  date('Y-m-d',  strtotime($event_startTime));
                        $event_end= date('Y-m-d',  strtotime($event_endTime));
                        while ($event_start<=$event_end){
                           $findday = date('w', strtotime($event_start));
                           if(in_array($findday,$day)){
                               //$FirstDateOfEvent = $event_start;
                               $array_sdate[]=$event_start;
                               $array_edate[]=$event_start;
                               //$this->addRecord($req,$event_start,$event_start);
                           }
                           $event_start = date('Y-m-d', strtotime($event_start. ' + 1 days'));
                        }
                   }elseif($event_isRepeating=='monthly'){ // 
                            $days  = '';
                            $recur_enddate= date('Y-m-d',  strtotime($recur_enddate));
                            $start_date=  date('Y-m-d',  strtotime($event_startTime));
                            $event_start=  date('Y-m-d',  strtotime($event_startTime));
                            $event_end= date('Y-m-d',  strtotime($event_endTime));
                            
                            while ($start_date<=$event_end){
                               $days .= date('d', strtotime($start_date)).',';
                               $start_date = date('Y-m-d', strtotime($start_date. ' + 1 days'));
                            } //get date
                            $days =  substr($days, 0, strlen($days)-1);
                            $dayarray = explode(",",$days);
                            $lastday = last($dayarray);
                            $newlastdate = $event_end;
                            while ($event_start<=$recur_enddate){
                                    $lastdate = date('t',strtotime($event_start));
                                    if($lastdate>$lastday){
                                              $newlastdate = date('Y-m-'.$lastday, strtotime($event_start));
                                              if($newlastdate<$event_start){
                                                  $newlastdate = date('Y-m-t', strtotime($event_start));
                                              }
                                    }else{
                                               $newlastdate = date('Y-m-t', strtotime($event_start));
                                    }
                                    $array_sdate[]=$event_start;
                                    $array_edate[]=$newlastdate;
                                    $event_start = date('Y-m-d', strtotime($event_start. ' + 1 month'));
                            }
                    }else{ // yearly
                                $array_sdate[]=$startdate;
                                $array_edate[]=$enddate;
                    }
                    // end of event    
            //return response(['a'=>$array_sdate,'b'=>$array_edate]);
            $user_id = request('user_id', '');
            $is_repeating = request('is_repeating', 0);
            if(!$is_repeating){
                        $array_sdate[]=$startdate;
                        $array_edate[]=$enddate;
            }

            foreach($array_sdate  as $key => $edate){
                 
            if($key==0){ //first index first record
            
            
            if ($user_id=="" || $user_id==0) {
                $add = new Task();
                $add->creator_id =  auth()->user()->id;
                $add->status = 0;
                
            } else {
                $add = Task::where('id', $user_id)->first();
                Task::where('recurring_id', $user_id)->delete();
                TaskCheckList::where('task_id', $user_id)->delete();
                TaskObservers::where('task_id', $user_id)->delete();
            } 

            $tags = request('tags', []);
            $tagsDetail = Tags::whereIn('id', $tags)->get(['id', 'title'])->toArray();
            $add->title =  request('title', '');
            
             
            $add->description =  request('description', '');
            $add->priority =  request('priority', '');
            $add->project_id =  request('project', '');
            $add->task_manager =  request('manager_id', 0);
            $add->task_assignee =  request('assign_id', 0);
            $add->is_recurring =  request('is_repeating', 0);
            $add->mode =  request('mode', 0);
            $add->day = json_encode(request('day', []));
            $add->enddate =  request('recur_enddate', null);
             
            $add->contact_id =  request('contact_id', 0);
            $add->startdatetime =  $array_sdate[$key].' '.$starttime;
            if($is_repeating==0){
                $add->enddatetime =  $edt;
                $add->end_task_datetime = $edt;
                $add->start_task_datetime = $sdt;
            }else{
                $add->enddatetime =  $array_edate[$key].' '.$endtime;
                $add->end_task_datetime = $edt;
                $add->start_task_datetime = $sdt;
            }
            
            $add->reminderdatetime =  $reminderdate.' '.$remindertime;
            $add->tags =  json_encode($tagsDetail);
            
            if ($add->save()) {
                $taskid = $recursive_id = $add->id;
                
                if (count($req->observers)>0) {
                    foreach ($req->observers as $key => $value) {
                        if ($value!="") {
                            $addteam =new TaskObservers();
                            $addteam->task_id = $taskid;
                            $addteam->user_id = $value;
                            $addteam->save();
                        }
                    }
                }
                if (count($req->tasklist)>0) {
                    foreach ($req->tasklist as $key => $value) {
                        if ($value!="") {
                            $addteam =new TaskCheckList();
                            $addteam->task_id = $taskid;
                            $addteam->title = $value;
                            $addteam->save();
                        }
                    }
                }

                $savepath = ABS_PATH.'Task/';
                $documents = $req['imagename'];
                $event_id = $taskid;
                if (!File::exists($savepath.$event_id)) {
                    File::makeDirectory($savepath.$event_id, 0755, true);
                    File::makeDirectory($savepath.$event_id.'/Thumb', 0755, true);
                }

                if (isset($req->imagename)  && count($req->imagename)>0) {
                    $orgimagename = $req->orgimagename;
                    foreach ($req->imagename as $key => $value) {
                        if (file_exists(ABS_PATH.'Temp/'.$value)) {
                            File::move(ABS_PATH.'Temp/'.$value, $savepath.$event_id.'/'.$value);
                        }
                        if (file_exists(ABS_PATH.'Temp/Thumb/'.$value)) {
                            File::move(ABS_PATH.'Temp/Thumb/'.$value, $savepath.$event_id.'/Thumb/'.$value);
                        }
                        if (file_exists(ABS_PATH.'Task/'.$event_id.'/'.$value)) {
                            ImageHelper::resize_crop_image(900, 600, $savepath.$event_id.'/'.$value, $savepath.$event_id.'/'.$value, 80);
                        }

                        $isExist = TaskFile::where('task_id', $add->id)->where('file_url', $value)->count();
                        if ($isExist==0) {
                            $addteam =new TaskFile();
                            $addteam->task_id = $taskid;
                            $addteam->file_url = $value;
                            $addteam->file_name = $orgimagename[$key];
                            $addteam->save();
                        }
                    }
                }
                if (isset($req['deletedImage'])) {
                    $isRemove = TaskFile::whereIn('id', explode(',', $req['deletedImage']))->where('task_id', $event_id)->get();
                    if (count($isRemove)>0) {
                        $savepath = ABS_PATH.'Task/';
                        foreach ($isRemove as $key => $value) {
                            File::delete($savepath.$value->task_id.'/'.$value->file_url);
                            File::delete($savepath.$value->task_id.'/Thumb/'.$value->file_url);
                        }
                    }
                    $isRemove = TaskFile::whereIn('id', explode(',', $req['deletedImage']))->where('task_id', $event_id)->delete();
                }
            }
            }// first index loop 
            else{
                 
                    if($is_repeating!=0){
                    
                    TaskCheckList::where('task_id', $user_id)->delete();
                    TaskObservers::where('task_id', $user_id)->delete();
                 
                    $add = new Task();    
                    $tags = request('tags', []);
                    $tagsDetail = Tags::whereIn('id', $tags)->get(['id', 'title'])->toArray();
                    $add->title =  request('title', '');
                    $add->creator_id =  auth()->user()->id;
                    $add->description =  request('description', '');
                    $add->priority =  request('priority', '');
                    $add->project_id =  request('project', '');
                    $add->task_manager =  request('manager_id', 0);
                    $add->task_assignee =  request('assign_id', 0);
                    $add->recurring_id =  $recursive_id;
                    $add->contact_id =  request('contact_id', 0);
                    $add->startdatetime =  $array_sdate[$key].' '.$starttime;
                    $add->enddatetime =  $array_edate[$key].' '.$endtime;
                    $add->reminderdatetime =  $reminderdate.' '.$remindertime;
                    $add->tags =  json_encode($tagsDetail);
                    
                    if ($add->save()) {
                        $taskid = $add->id;
                        if (count($req->observers)>0) {
                            foreach ($req->observers as $key => $value) {
                                if ($value!="") {
                                    $addteam =new TaskObservers();
                                    $addteam->task_id = $taskid;
                                    $addteam->user_id = $value;
                                    $addteam->save();
                                }
                            }
                        }
                        if (count($req->tasklist)>0) {
                            foreach ($req->tasklist as $key => $value) {
                                if ($value!="") {
                                    $addteam =new TaskCheckList();
                                    $addteam->task_id = $taskid;
                                    $addteam->title = $value;
                                    $addteam->save();
                                }
                            }
                        }

                        $savepath = ABS_PATH.'Task/';
                        $documents = $req['imagename'];
                        $event_id = $taskid;
                        if (!File::exists($savepath.$event_id)) {
                            File::makeDirectory($savepath.$event_id, 0755, true);
                            File::makeDirectory($savepath.$event_id.'/Thumb', 0755, true);
                        }

                        if (isset($req->imagename)  && count($req->imagename)>0) {
                            $orgimagename = $req->orgimagename;
                            foreach ($req->imagename as $key => $value) {
                                if (file_exists(ABS_PATH.'Temp/'.$value)) {
                                    File::move(ABS_PATH.'Temp/'.$value, $savepath.$event_id.'/'.$value);
                                }
                                if (file_exists(ABS_PATH.'Temp/Thumb/'.$value)) {
                                    File::move(ABS_PATH.'Temp/Thumb/'.$value, $savepath.$event_id.'/Thumb/'.$value);
                                }
                                if (file_exists(ABS_PATH.'Task/'.$event_id.'/'.$value)) {
                                    ImageHelper::resize_crop_image(900, 600, $savepath.$event_id.'/'.$value, $savepath.$event_id.'/'.$value, 80);
                                }

                                $isExist = TaskFile::where('task_id', $add->id)->where('file_url', $value)->count();
                                if ($isExist==0) {
                                    $addteam =new TaskFile();
                                    $addteam->task_id = $taskid;
                                    $addteam->file_url = $value;
                                    $addteam->file_name = $orgimagename[$key];
                                    $addteam->save();
                                }
                            }
                        }
                        if (isset($req['deletedImage'])) {
                            $isRemove = TaskFile::whereIn('id', explode(',', $req['deletedImage']))->where('task_id', $event_id)->get();
                            if (count($isRemove)>0) {
                                $savepath = ABS_PATH.'Task/';
                                foreach ($isRemove as $key => $value) {
                                    File::delete($savepath.$value->task_id.'/'.$value->file_url);
                                    File::delete($savepath.$value->task_id.'/Thumb/'.$value->file_url);
                                }
                            }
                            $isRemove = TaskFile::whereIn('id', explode(',', $req['deletedImage']))->where('task_id', $event_id)->delete();
                        }
                    }//end check is repeat       
            }//end of save    

            }//end of for each
        } 
            DB::commit();
            ////$parameter['project_id']=$add->id;
            ////dispatch(new ProjectCreateMail($parameter));

            return response(['status'=>true,'msg'=>$msg]);
        } catch (\Exception $e) {
            DB::rollback();
            return response(['status'=>false,'msg'=>errormsg($e)]);
        }
    }


    public function addTask(Request $req)
    {
        try {
            DB::beginTransaction();
            $validator = Validator::make($req->all(), [
                'title' => 'required'
            ]);
            if ($validator->fails()) {
                return response(['code' => 104, 'msg' => 'Error - '.$validator->errors()->first(), 'result' => (object) []]);
            }
            $recursive_id = 0;    
            $msg="Task added successfully";
            $startdate = request('startdate', '');
            $enddate = request('enddate', '');
            $reminderdate = request('reminderdate', '');
            $starttime = request('starttime', '');
            $endtime = request('endtime', '');
            $remindertime = request('remindertime', '');
            if ($starttime=="") {
                $starttime="00:00:00";
            }
            if ($endtime=="") {
                $endtime="00:00:00";
            }
            if ($remindertime=="") {
                $remindertime="00:00:00";
            }

            $startdate =  Carbon\Carbon::parse($startdate)->format('Y-m-d');
            $enddate =  Carbon\Carbon::parse($enddate)->format('Y-m-d');
            $reminderdate =  Carbon\Carbon::parse($reminderdate)->format('Y-m-d');
            $sdt = $startdate.' '.$starttime;
            $edt = $enddate.' '.$endtime;
            $event_isRepeating = request('mode','');    
            $recur_enddate = request('recur_enddate','');    
                    
            $day = request('day',[]);    
            $event_startTime = $sdt;
            $event_endTime = $edt;
            $array_sdate = [];
            $array_edate = [];
            if($event_isRepeating=='weekly'){ // weekly 
                $event_start=  date('Y-m-d',  strtotime($event_startTime));
                $event_end= date('Y-m-d',  strtotime($event_endTime));
                while ($event_start<=$event_end){
                    $findday = date('w', strtotime($event_start));
                    
                    if(in_array($findday,$day)){
                        //$FirstDateOfEvent = $event_start;
                        $array_sdate[]=$event_start;
                        $array_edate[]=$event_start;
                        //$this->addRecord($req,$event_start,$event_start);
                    }
                    $event_start = date('Y-m-d', strtotime($event_start. ' + 1 days'));
                   
                }
            }elseif($event_isRepeating=='monthly'){ // 
                    $days  = '';
                    $recur_enddate= date('Y-m-d',  strtotime($recur_enddate));
                    $start_date=  date('Y-m-d',  strtotime($event_startTime));
                    $event_start=  date('Y-m-d',  strtotime($event_startTime));
                    $event_end= date('Y-m-d',  strtotime($event_endTime));
                    
                    while ($start_date<=$event_end){
                        $days .= date('d', strtotime($start_date)).',';
                        $start_date = date('Y-m-d', strtotime($start_date. ' + 1 days'));
                    } //get date
                    $days =  substr($days, 0, strlen($days)-1);
                    $dayarray = explode(",",$days);
                    $lastday = last($dayarray);
                    $newlastdate = $event_end;
                    while ($event_start<=$recur_enddate){
                            $lastdate = date('t',strtotime($event_start));
                            if($lastdate>$lastday){
                                        $newlastdate = date('Y-m-'.$lastday, strtotime($event_start));
                                        if($newlastdate<$event_start){
                                            $newlastdate = date('Y-m-t', strtotime($event_start));
                                        }
                            }else{
                                        $newlastdate = date('Y-m-t', strtotime($event_start));
                            }
                            $array_sdate[]=$event_start;
                            $array_edate[]=$newlastdate;
                            $event_start = date('Y-m-d', strtotime($event_start. ' + 1 month'));
                    }
            }else{ // yearly
                        // $array_sdate[]=$startdate;
                        // $array_edate[]=$enddate;
            }
                    
          
            $user_id = request('user_id', '');
            $is_repeating = request('is_repeating', 0);
            if(!$is_repeating){
                        $array_sdate[]=$startdate;
                        $array_edate[]=$enddate;
            }
          
            foreach($array_sdate  as $key => $edate)
            {
                 
            if($key==0)
            { 
            //first index first record
            
            
            if ($user_id=="" || $user_id==0) {
                $add = new Task();
                $add->creator_id =  auth()->user()->id;
                $add->status = 0;
            } else {
                $add = Task::where('id', $user_id)->first();
                Task::where('recurring_id', $user_id)->delete();
               
                TaskObservers::where('task_id', $user_id)->delete();
            } 

            $tags = request('tags', []);
            $tagsDetail = Tags::whereIn('id', $tags)->get(['id', 'title'])->toArray();
            $add->title =  request('title', '');
            $add->description =  request('description', '');
            $add->priority =  request('priority', '');
            $add->project_id =  request('project', '');
            $add->task_manager =  request('manager_id', 0);
            $add->task_assignee =  request('assign_id', 0);
            $add->is_recurring =  request('is_repeating', 0);
            $add->mode =  request('mode', 0);
            $add->day = json_encode(request('day', []));
            $add->enddate =  request('recur_enddate', null);
             
            $add->contact_id =  request('contact_id', 0);
            $add->startdatetime =  $array_sdate[$key].' '.$starttime;
            if($is_repeating==0){
                $add->enddatetime =  $edt;
                $add->end_task_datetime = $edt;
                $add->start_task_datetime = $sdt;
            }else{
                $add->enddatetime =  $array_edate[$key].' '.$endtime;
                $add->end_task_datetime = $edt;
                $add->start_task_datetime = $sdt;
            }
            
            $add->reminderdatetime =  $reminderdate.' '.$remindertime;
            $add->tags =  json_encode($tagsDetail);
            if ($add->save()) {
                $taskid = $recursive_id = $add->id;
                
                if (count($req->observers)>0) {
                    foreach ($req->observers as $key => $value) {
                        if ($value!="") {
                            $addteam =new TaskObservers();
                            $addteam->task_id = $taskid;
                            $addteam->user_id = $value;
                            $addteam->save();
                        }
                    }
                }
                if (count($req->tasklist)>0) {
                    $listid = request('tasklistid',[]);    
                    TaskCheckList::whereNotIn('id',$listid)->delete();

                    foreach ($req->tasklist as $key => $value) {
                        if ($value!="") {
                            if($listid[$key]){
                                $addteam =TaskCheckList::where('id',$listid[$key])->first();
                            }else{
                                $addteam =new TaskCheckList();
                            }
                            $addteam->task_id = $taskid;
                            $addteam->title = $value;
                            $addteam->save();
                        }
                    }
                }

                $savepath = ABS_PATH.'Task/';
                $documents = $req['imagename'];
                $event_id = $taskid;
                if (!File::exists($savepath.$event_id)) {
                    File::makeDirectory($savepath.$event_id, 0755, true);
                    File::makeDirectory($savepath.$event_id.'/Thumb', 0755, true);
                }

                if (isset($req->imagename)  && count($req->imagename)>0) {
                    $orgimagename = $req->orgimagename;
                    foreach ($req->imagename as $key => $value) {
                        if (file_exists(ABS_PATH.'Temp/'.$value)) {
                            File::move(ABS_PATH.'Temp/'.$value, $savepath.$event_id.'/'.$value);
                        }
                        if (file_exists(ABS_PATH.'Temp/Thumb/'.$value)) {
                            File::move(ABS_PATH.'Temp/Thumb/'.$value, $savepath.$event_id.'/Thumb/'.$value);
                        }
                        if (file_exists(ABS_PATH.'Task/'.$event_id.'/'.$value)) {
                            ImageHelper::resize_crop_image(900, 600, $savepath.$event_id.'/'.$value, $savepath.$event_id.'/'.$value, 80);
                        }

                        $isExist = TaskFile::where('task_id', $add->id)->where('file_url', $value)->count();
                        if ($isExist==0) {
                            $addteam =new TaskFile();
                            $addteam->task_id = $taskid;
                            $addteam->file_url = $value;
                            $addteam->file_name = $orgimagename[$key];
                            $addteam->save();
                        }
                    }
                }
                if (isset($req['deletedImage'])) {
                    $isRemove = TaskFile::whereIn('id', explode(',', $req['deletedImage']))->where('task_id', $event_id)->get();
                    if (count($isRemove)>0) {
                        $savepath = ABS_PATH.'Task/';
                        foreach ($isRemove as $key => $value) {
                            File::delete($savepath.$value->task_id.'/'.$value->file_url);
                            File::delete($savepath.$value->task_id.'/Thumb/'.$value->file_url);
                        }
                    }
                    $isRemove = TaskFile::whereIn('id', explode(',', $req['deletedImage']))->where('task_id', $event_id)->delete();
                }
            }//end of save
            } //index 0
            else{
                    $adddate = new TaskSchedule();
                $adddate->task_id=$taskid;
                $adddate->start_datetime = $array_sdate[$key].' '.$starttime;
                $adddate->end_datetime=  $array_edate[$key].' '.$endtime;
                $adddate->reminder_datetime= $reminderdate.' '.$remindertime;
                $adddate->is_created=0;
                $adddate->notified=0;
                $adddate->is_recuring=0;
                $adddate->save();
            }//else if
                
            }//end of for each
        
            DB::commit();
            ////$parameter['project_id']=$add->id;
            ////dispatch(new ProjectCreateMail($parameter));

            return response(['status'=>true,'msg'=>$msg]);
        }catch(\Exception $e) {
            DB::rollback();
            return response(['status'=>false,'msg'=>errormsg($e)]);
        }
    }


    
    
}
