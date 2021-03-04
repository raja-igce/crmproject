<?php
namespace App\Http\Controllers\admin;

use App\Models\Education;
use App\Models\BloodGroup;
use App\Models\CausesInterested;
use App\Models\Institutions;
use App\Models\LanguageKnown;
use App\Models\Project;
use App\Models\Occupation;
use App\Models\Volunteer;
use App\Models\ProjectTeam;
use App\Models\CampaignCollection;
use App\Models\Tags;
use App\Models\ExpenseCategory;
use App\Models\ProjectExpense;
use App\Models\ProjectNote;
use App\Models\Task;



use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\projectListResource;
use App\Http\Resources\campaignPaymentListResource;
use App\Http\Resources\campaignExpenseListResource;
use App\Http\Resources\projectNoteListResource;

use Illuminate\Support\Facades\Validator;
use App\Jobs\ProjectCreateMail;

use App\User;
use DB;
use Hash;
use Auth;
 use Carbon\Carbon;
class PaymentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function addNote(Request $request)
    {
      try {
          $result = [];
          DB::beginTransaction();
          $type = request('type', 'add');
          $project_id = request('project_id', 1);
          $id = request('id', 1);
          if($type=="list"){
              $rdata = ProjectNote::with('getPerson')->where('project_id',$project_id)->orderby('id','desc')->paginate(15);
              return projectNoteListResource::collection($rdata);
          }
          if($type=="delete"){
              ProjectNote::where('id',$id)->delete();
               DB::commit();
              $result = ProjectNote::with('getPerson')->where('project_id',$project_id)->orderby('id','desc')->paginate(15);
              $result = projectNoteListResource::collection($result);
            return response(['status'=>true,'msg'=>"Deleted successfully",'result'=>$result]);
          }
          $user_id = request('id', '');
          if ($user_id=="" || $user_id==0){
              $add = new ProjectNote();
              $msg = "Added successfully";
          }else{
              $add =  ProjectNote::where('id', $user_id)->first();
              $msg = "Updated successfully";
          }
          $note = request('txtnote', '');

          //$note = strip_tags($note);

          $add->note =  $note;
          $add->project_id =  $project_id;
          $add->user_id =  auth()->user()->id;
          if ($add->save()){
              DB::commit();
            $result = ProjectNote::with('getPerson')->where('project_id',$project_id)->orderby('id','desc')->paginate(request('pageno',1500));
            $result = projectNoteListResource::collection($result);
          }


          return response(['status'=>true,'msg'=>$msg,'result'=>$result]);
      } catch (\Exception $e) {
          DB::rollback();
          return response(['status'=>true,'msg'=>errormsg($e),'result'=>$result]);
      }
    }
    
    public function deleteExpense(Request $request)
    {     
            DB::beginTransaction();
            $id = request('id', "");
            try{     
                    CampaignCollection::where('id',$id)->delete();
                    DB::commit();
                    return response(['status'=>true,'msg'=>"deleted successfully"]);
            }catch(\Exception $e){
                    DB::rollback();
                    return response(['status'=>true,'msg'=>errormsg($e),'item'=>[]]);
            }
    }
    public function ajaxExpenseData(Request $request)
    {
         $txtsearch = request('txtsearch', "");
         $project_id = request('project_id', "");
         $type =  request('type', "payment");
         $userResult =   CampaignCollection::with(['getPerson','getExpenseCategory'])->where(function ($q) use ($txtsearch) {
            if (trim($txtsearch)!="") {
                $q->where('description', 'like', "%$txtsearch%");
            }
         })->where(function($q)use($project_id){
            if($project_id!="" && $project_id != 0 ){
                $q->where('project_id',$project_id);
            }
         })->where('is_payment',0)->orderby('updated_at', 'desc')->paginate($request['pageno']);

         $totalExpense =   CampaignCollection::where('is_payment',0)->where('project_id',$project_id)->sum('amount');
        
         $userResult =  campaignExpenseListResource::collection($userResult);
         return $userResult;
    } 
    public function ajaxPaymentData(Request $request)
    {
         $txtsearch = request('txtsearch', "");
         $type =  request('type', "payment");
         $project_id =  request('project_id', "");
         $project_stage =  request('project_stage', "Plan");

        $userResult=   CampaignCollection::with(['getPerson'])->where(function ($q) use ($txtsearch) {
            if (trim($txtsearch)!="") {
                $q->where('txtfirstname', 'like', "%$txtsearch%");
            }
        })->where(function ($q) use ($project_id){
            if($project_id!=""){
                $q->where('project_id', $project_id);
            }
        })->where(function ($q) use ($project_stage){
            if($project_stage!=""){
                //$q->where('project_stage', $project_stage);
            }
        })->where('is_payment',1)->orderby('updated_at', 'desc')->paginate($request['pageno']);

        $userResult =  campaignPaymentListResource::collection($userResult);
        return $userResult;
    }


    public function ajaxRevenue(Request $request) 
    {
        $item = [];
        try{
            $project_id =  request('project_id', "");

            $taskAssig =  Task::where('project_id',$project_id)->get()->pluck('task_assignee');
            $taskAssignee = User::whereIn('id',$taskAssig)->get();
            $projectData =  Project::with(['getManager','getLeader','getManager.getVolunteerDetail.getInstitution','getLeader.getVolunteerDetail.getInstitution','getProjectIncome','getDocuments','getTeam.getTeamMemeber'])->where('id',$project_id)->first();
            $planned_revenue = $projectData['planned_revenue'];
            $planned_expense = $projectData['planned_expense'];
            $item['project_name']    = $projectData['project_name'];
            $item['description']    = $projectData['description'];
            $item['taskAssignee']    = $taskAssignee;
            $item['planned_revenue'] = $planned_revenue;
            $item['planned_expense'] = $planned_expense;
            $item['getManager'] =  $projectData['getManager'];
            $item['getLeader'] =  $projectData['getLeader'];
            $item['getDonors'] =  $projectData['getProjectIncome'];
            $item['getDocuments'] =  $projectData['getDocuments'];
            $item['getTeam'] =  $projectData['getTeam'];

            $item['start_date'] = Carbon::parse($projectData['start_date'])->format('d-m-Y') ;
            $item['end_date']   = Carbon::parse($projectData['end_date'])->format('d-m-Y') ;

            $now = Carbon::now();
            $end_date = Carbon::parse($projectData['end_date'])->format('Y-m-d');
            if($end_date > date('Y-m-d')){ // not expired
              $item['title_date'] = "Before the Deadline";
              $item['days_left'] =  $now->diffInDays($end_date);
              $item['date_expire'] = 'primary';
            }else{ // expired
              $item['title_date'] = "Overdue";
              $item['days_left'] =  $now->diffInDays($end_date);
              $item['date_expire'] = 'danger';
            }


            $project_revenue = CampaignCollection::where('project_id',$project_id)->where('is_payment',1)->sum('amount');
            $item['total_revenue'] = $project_revenue;
            $project_expense = CampaignCollection::where('project_id',$project_id)->where('is_payment',0)->sum('amount');
            $p_expense = number_format($project_expense,2);
            $item['total_expense'] = $p_expense;

            $item['total_revenue_per'] =$planned_revenue==0?0:round(($project_revenue*100)/$planned_revenue);
            $item['total_expense_per'] =$planned_revenue==0?0:round(($project_expense*100)/$planned_expense);

            return response(['status'=>true,'msg'=>"get successfully",'item'=>$item]);
        } catch (\Exception $e) {
            DB::rollback();
            return response(['status'=>true,'msg'=>errormsg($e),'item'=>[]]);
        }

    }


    public function deleteProject(Request $request)
    {
        try {
            DB::beginTransaction();
            $type = request('type', "education");
            $id = request('id', 0);

            Project::where('id', $id)->delete();
            ProjectTeam::where('project_id', $id)->delete();

            DB::commit();
            return response(['status'=>true,'msg'=>'success']);
        } catch (\Exception $e) {
            DB::rollback();
            return response(['status'=>false,'msg'=>errormsg($e)]);
        }
    }

    public function addPayment(Request $req)
    {
        try {
            DB::beginTransaction();

            $user_id = request('user_id', '');
            if ($user_id=="" || $user_id==0){
                $add = new CampaignCollection();
            }else{
                $add =  CampaignCollection::where('id', $user_id)->first();
            }
            $amount = request('amount', '');
            $amount= str_replace("₹","",$amount);
            $amount= str_replace(".00","",$amount);
            $add->txtfirstname =  request('name', '');
            $add->amount =  $amount;
            $add->date =  request('date', '');
            $add->paiddate =  request('date', '');
            $add->project_id =  request('project_id', 1);
            $add->project_stage =  request('project_stage', '');
            $add->respose_user =  request('respose_user', '');
            $add->description =  request('description', '');
            $add->type =  request('type', 'payment');
            if ($add->save()){
                $msg = "Added successfully";
            }
            DB::commit();
            $parameter['project_id']=$add->id;
            dispatch(new ProjectCreateMail($parameter));
            return response(['status'=>true,'msg'=>$msg]);
        } catch (\Exception $e) {
            DB::rollback();
            return response(['status'=>true,'msg'=>errormsg($e)]);
        }
    }
    public function addExpense(Request $req)
    {
        try {
            DB::beginTransaction();

            $user_id = request('expence_id', '');
            if ($user_id=="" || $user_id==0){
                $add = new CampaignCollection();
            }else{
                $add =  CampaignCollection::where('id', $user_id)->first();
            }
 
            $amount = request('amount', 0);
            // $amount= str_replace("₹","",$amount);
            // $amount= str_replace(".00","",$amount);
            $add->amount =  $amount;
            $add->campaign_id=request('campaign_id',0);
            $add->project_id=request('cause_id',0); 
            $add->project_stage=request('','');
            $add->description=request('item','');
            $add->expense_category=request('expense_category','');
            $add->paiddate=request('paiddate','');
            $add->reference=request('reference','');
            $add->respose_user=request('respose_user','');
            $add->txtfirstname=request('payee', '');
            $add->txtlastname=request('','');
            $add->date=request('date',null);
            $add->bill_no=request('billno',null);
            
            $add->txtemail=request('','');
            $add->txtphone=request('','');
            $add->payment_id=request('','');
            $add->txtaddress1=request('','');
            $add->txtaddress2=request('','');
            $add->txtstate=request('','');
            $add->txtzipcode=request('','');
            $add->txtcountry=request('','');
            $add->type=request('payment_mode','');
            $add->is_payment=0;
            if ($add->save()){
                $msg = "Added successfully";
            }
            DB::commit();
            $parameter['project_id']=$add->id;
            //dispatch(new ProjectCreateMail($parameter));
            return response(['status'=>true,'msg'=>$msg]);
        } catch (\Exception $e) {
            DB::rollback();
            return response(['status'=>true,'msg'=>errormsg($e)]);
        }
    }
}
