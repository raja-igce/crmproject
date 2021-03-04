<?php
namespace App\Http\Controllers\admin;
use App\Helper\AccessHelper;
use App\Http\Controllers\admin\CommonController;

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
use \Carbon\Carbon;
use File,Mail;

class TaskCroneController extends Controller
{
    public function __construct()
    {
       
    }

    
 public function cronAddTask()
 {        
    try {
        DB::beginTransaction();
        $tomorrowDate =  Carbon::now()->addDay();   
        $tomorrowDate = $tomorrowDate->format('Y-m-d');
        $getTask = TaskSchedule::where('is_created',0)->whereDate('start_datetime','<=',$tomorrowDate)->get();
        if(count($getTask)>0){
            foreach($getTask as $key => $value){
                $taskID = $value['task_id'];       
                $addnew = new Task();
                $task = Task::where('id',$taskID)->first();
                $addnew =  $task->replicate();
                
                     
                $addnew->startdatetime= $value['start_datetime'];   
                $addnew->enddatetime= $value['end_datetime'];  
                $addnew->reminderdatetime= $value['reminder_datetime'];   
                $addnew->recurring_id= $value['task_id'];   
                $addnew->is_notified= 0;   
                if($addnew->save()){
                    $newID = $addnew->id;
                    $checklist = TaskCheckList::where('task_id',$taskID)->get();
                    foreach($checklist as $chkey => $chvalue){
                        $addcheck = new TaskCheckList();
                        $addcheck = $chvalue;
                        $addcheck = $addcheck->replicate();
                        $addcheck->task_id= $newID; 
                        $addcheck->completed_date= null; 
                        $addcheck->status = 0; 
                        $addcheck->save();
                    }

                    $checkob = TaskObservers::where('task_id',$taskID)->get();
                    foreach($checkob as $obkey => $obvalue){
                        $addobs = new TaskObservers();
                        $addobs = $obvalue;
                        $addobs = $addobs->replicate();
                        $addobs->task_id= $newID; 
                        $addobs->save();
                    }

                    $checkob = TaskFile::where('task_id',$taskID)->get();
                    foreach($checkob as $obkey => $obvalue){
                        $addobs = new TaskFile();
                        $addobs = $obvalue;
                        $addobs = $addobs->replicate();
                        $addobs->task_id= $newID; 
                        $addobs->save();
                    }

                    //copy files
                    $savepath = ABS_PATH.'Task/';
                    File::copyDirectory( $savepath.$taskID, $savepath.$newID);
                }

                //update state
                //TaskSchedule::where('id',$value['id'])->update(['is_created'=>1]);
                
                DB::commit();
            }
        } 
    
           
        echo $newID;
        //return response(['status'=>true,'msg'=>$msg]);
    }catch(\Exception $e) {
        DB::rollback();
        echo errormsg($e);
    }       
 }
 

  
 public function cronTaskNotify()
 {        
    try {
        DB::beginTransaction();
        $tomorrowDate =  Carbon::now();   
        $getTask = Task::where('is_notified',0)->whereDate('reminderdatetime','<=',$tomorrowDate)->get();
        if(count($getTask)>0){
            foreach($getTask as $key => $value){
                //Task::where('id',$value['id'])->update(['is_notified'=>1]);
                
                $user = User::where('id',$value['task_assignee'])->first();        
                $usermanager = User::where('id',$value['task_manager'])->first();        

                $firstname = $user['first_name'];
                $lastname = $user['last_name'];
                $email = $user['email'];
                $phone = $user['phone'];
                echo $email;
                $title = "Task Reminder";
                $subject = "Task Reminder";

                $line2 = "Dear Mr./Ms $firstname $lastname,<br><br>
                    Task reminder here ".$value['title'].".<br><br>
                    <br><br>
                    iNNER-EYE is a charitable organization to enable helpless/support-less people to have sustainable Livelihood,
                    Health and Education for progressive individual and social development.";


                $html_content = view('mailTemplate.CommonTemplate', ['line1' => $title, 'line2' => $line2])->render();
 
                $email = new \SendGrid\Mail\Mail();
                $email->setFrom("info@ief.com", "innerEyes");
                $email->setSubject($subject);
                $email->addTo($email, $firstname);
                //$email->addContent("text/plain", "and easy to do anywhere, even with PHP");
                $email->addContent(
                    "text/html", $html_content
                );
                
                $sendgrid = new \SendGrid(env('SENDGRIDKEY'));
                try {
                    $response = $sendgrid->send($email);
                } catch (Exception $e) {
                    echo 'Caught exception: '. $e->getMessage() ."\n";
                }

                if(ActiveSMS){
                    CommonController::SendSMS(9723294588, $title);
                }
            }
        } 
        DB::commit();
    }catch(\Exception $e) {
        DB::rollback();
        echo errormsg($e);
    }       
 }

    
    
}
