<?php

namespace App\Http\Controllers\admin;
use App\Helper\AccessHelper;

use App\Models\Education;
use App\Models\BloodGroup;
use App\Models\CausesInterested;
use App\Models\Institutions;
use App\Models\LanguageKnown;
use App\Models\Project;
use App\Models\Occupation;
use App\Models\Volunteer;
use App\Models\ProjectTeam;
use App\Models\Tags;
use App\Models\ExpenseCategory;
use App\Models\ProjectDocuments;
use App\Helper\Slug;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\projectListResource;
use Illuminate\Support\Facades\Validator;
use App\Jobs\ProjectCreateMail;

use App\User;
use DB;
use Hash;
use Auth;
use Carbon;
use File;

class ProjectController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request, $type = 'education')
    {
        try {
            $userSetting[''] = [];
            $title = "Causes";
            $label = "Causes";
            $getPriority = getPriority();
            $getStage = getStage();

            $expenseList = ExpenseCategory::where('status', 1)->get();
            $getManagers = User::whereHas('getManagers')->get(['id','first_name','last_name','profile_pic']);
            $getLeaders = User::whereHas('getLeaders')->get(['id','first_name','last_name','profile_pic']);
            $getProject = Project::where('status', 1)->get();
            $usersList = User::where('role_id', 1)->get();
            $tagList = Tags::where('status', 1)->get();
            return view('admin.project.project', compact('getStage','getProject','getLeaders','getManagers', 'expenseList', 'title', 'label', 'getPriority', 'usersList', 'tagList'));
        } catch (\Exception $e) {
            return response(['status' => false, 'msg' => errormsg($e)]);
        }
    }
    public function ajaxProject(Request $request)
    {
        $userstatus = request('userstatus', "");
        $verifystatus = request('verifystatus', "");
        $txtsearch = request('txtsearch', "");
        $type = request('type', "education");
        $lead_id = request('team_id', "");
        $manager_id = request('manager_id', "");
        $creator = '';
        $accessAble = AccessHelper::isAccessAble(auth()->user()->id, 'project');
        if ($accessAble == 'grant_acces') {
            $creator = auth()->user()->id;
        }elseif($accessAble == 'authorized'){

        }else{
            $creator = auth()->user()->id;
        }

        if(auth()->user()->role_id==2){
            $creator = auth()->user()->id;
        }

        $userResult =   Project::with(['getManager','getProjectExpense','getProjectIncome','getLeader','getTeam'])->where(function ($q) use ($txtsearch) {
            if (trim($txtsearch) != "") {
                $q->where('project_name', 'like', "%$txtsearch%");
                $q->orwhere(function($q)use($txtsearch){
                    $q->whereHas('getManager',function($q2)use($txtsearch){
                        $q2->where('first_name','like',"%$txtsearch%");
                        $q2->orwhere('last_name','like',"%$txtsearch%");
                    });
                });
                $q->orwhere(function($q)use($txtsearch){
                    $q->whereHas('getLeader',function($q2)use($txtsearch){
                        $q2->where('first_name','like',"%$txtsearch%");
                        $q2->orwhere('last_name','like',"%$txtsearch%");
                    });
                });
            }
        })->where(function ($q) use ($creator){ 
            if ($creator!="") {
                $q->where('creator_id', $creator);
            }
        })->where(function ($q) use ($userstatus) {
            if ($userstatus != "") {
                $q->where('status', $userstatus);
            }
        })->where(function ($q) use ($lead_id) {
            if ($lead_id != "") {
                $q->where('project_lead_id', $lead_id);
            }
        })->where(function ($q) use ($manager_id) {
            if ($manager_id != "") {
                $q->where('project_mananger', $manager_id);
            }
        })->orderby('updated_at', 'desc')->paginate($request['pageno']);
        $userResult =  projectListResource::collection($userResult);
        return $userResult;
    }
    /*
    public function blockUser(Request $request)
    {
        try {
            DB::beginTransaction();
            $type = request('type', 'block'); //block delete active
            if ($type=='block') {
                $isDeleted = User::where('id', $request->id)->update(['status'=>2]);
            }
            if ($type=='active') {
                $isDeleted = User::where('id', $request->id)->update(['active'=>1]);
            }
            DB::commit();
            return response(['status'=>true,'msg'=>'success']);
        } catch (\Exception $e) {
            DB::rollback();
            return response(['status'=>false,'msg'=>errormsg($e)]);
        }
    } */
    public function deleteProject(Request $request)
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
    public function removeProjectDoc(Request $request)
    {
        try {
            DB::beginTransaction();

            $id = request('id', "");
            $id = request('id', "");

            $getdata = ProjectDocuments::where('file', $id)->first();
            $savepath = ABS_PATH . 'Project/';
            if ($getdata) {
                File::delete($savepath . $getdata->project_id . '/' . $getdata->file);
                File::delete($savepath . $getdata->project_id . '/Thumb/' . $getdata->file);
                $status = true;
                $msg = "Deleted successfully";
                $getdata = ProjectDocuments::where('file', $id)->delete();
            } else {
                $status = false;
                $msg = "No record found";
            }
            DB::commit();
            return response(['status' => $status, 'msg' => $msg]);
        } catch (\Exception $e) {
            DB::rollback();
            return response(['status' => false, 'msg' => errormsg($e)]);
        }
    }

    public function addProject(Request $req)
    {
        try {
            DB::beginTransaction();
            $validator = Validator::make($req->all(), [
                'title' => 'required'
            ]);
            if ($validator->fails()) {
                return response(['code' => 104, 'msg' => 'Error - ' . $validator->errors()->first(), 'result' => (object) []]);
            }

            $msg = "Project added successfully";
            $startdate = request('startdate', '');
            $enddate = request('enddate', '');
            $startdate =  Carbon\Carbon::parse($startdate)->format('Y-m-d');
            $enddate =  Carbon\Carbon::parse($enddate)->format('Y-m-d');
            $user_id = request('user_id', '');
            if ($user_id == "" || $user_id == 0) {
                $add = new Project();
                $slug = new Slug();
                $add->slug = $slug->createProjectSlug($req->title);
                $add->creator_id =  auth()->user()->id;
            } else {
                $add =  Project::where('id', $user_id)->first();
                $slug = new Slug();
                $newslug = $slug->createProjectSlug($req->title, $user_id);
                if ($add->slug != $newslug) {
                    $slug = new Slug();
                    $add->slug = $slug->createProjectSlug($newslug, $user_id);
                }
                ProjectTeam::where('project_id', $user_id)->delete();
            }
            $tags = request('tags', []);
            $tagsDetail = Tags::whereIn('id', $tags)->get(['id', 'title'])->toArray();

            
            $add->project_name =  request('title', '');
           
            $add->workspace =  request('workspace', '0');
            $add->description =  request('description', '');
            $add->project_mananger =  request('selectmanager', '0');
            $add->project_lead_id =  request('projectlead', '0');
            $add->workflow =  request('workflow', '0');
            $add->planned_revenue =  request('planned_revenue', '');
            $add->planned_expense =  request('planned_expenses', '');
            $add->tags =  json_encode($tagsDetail);
            $add->start_date =  $startdate;
            $add->end_date =  $enddate;
            $add->status = 1;
            if ($add->save()) {
                if (count($req->selectteam) > 0) {
                    foreach ($req->selectteam as $key => $value) {
                        $addteam = new ProjectTeam();
                        $addteam->project_id = $add->id;
                        $addteam->user_id = $value;
                        $addteam->save();
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
