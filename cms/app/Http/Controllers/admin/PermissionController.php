<?php

namespace App\Http\Controllers\admin;

use App\Models\Education;
use App\Models\BloodGroup;
use App\Models\CausesInterested;
use App\Models\Institutions;
use App\Models\LanguageKnown;
use App\Models\Occupation;
use App\Models\Volunteer;
use App\Models\UserLanguageKnow;
use App\Models\UserInterestCause;
use App\Models\UserState;
use App\Models\State;
use App\Models\VolunteerPermission;
use App\Http\Resources\VolunteerPermissionResource;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Http\Resources\UserDetailsResource;
use Illuminate\Support\Facades\Validator;
use App\Jobs\SendWelcomeMail;

use App\User;
use DB;
use Hash;
use Auth;

class PermissionController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /** 
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function volunteers_permissions(Request $request)
    {
        $user_id = VolunteerPermission::pluck('user_id');
        $volunteer =   User::whereNotIN('id', $user_id)->where('role_id', '1')->orderby('updated_at', 'desc')->get();
        return view('admin.volunteer_permissions.volunteer', compact('volunteer'));
    }
    public function ajaxvolunteers_permissions(Request $request)
    {
        $txtsearch = request('txtsearch', "");
        $userResult =  VolunteerPermission::whereHas('getUser', function ($q) use ($txtsearch) {
            $q->where(function ($q) use ($txtsearch) {
                if($txtsearch!=""){
                    $q->where('first_name', 'like', "$txtsearch%");
                    $q->orWhere('last_name', 'like', "$txtsearch%");
                    $q->orWhere('phone', 'like', "$txtsearch%");
                    $q->orWhere('email', 'like', "$txtsearch%");
                }
            })->where('role_id', 1);
        })->with('getUser')->orderby('updated_at', 'desc')->paginate($request['pageno']);
        $userResult =  VolunteerPermissionResource::collection($userResult);
        return $userResult;
    }
    public static  function addDefaultPermission($userid)
    {
        $isExist = VolunteerPermission::where('user_id', $userid)->first();
        if (!$isExist) {
            $new_permission = new VolunteerPermission;
            $new_permission->user_id = $userid;
            $new_permission->crmconatct = 'denied';
            $new_permission->project = 'denied';
            $new_permission->task = 'denied';
            $new_permission->event = 'denied';
            $new_permission->campaign = 'denied';
            $new_permission->blog = 'denied';
            $new_permission->donationreport = 'denied';
            $new_permission->created_at = date('Y-m-d H:i:s');
            $new_permission->updated_at = date('Y-m-d H:i:s');
            $new_permission->save();
        }
    }
    public function updatePermissions(Request $request)
    {
        // dd($request->all());
        $check_volunteer = VolunteerPermission::where('user_id', $request->user_id)->first();
        if ($check_volunteer) {
            if ($request->field_name ==  'status') {
                User::where('id', $request->user_id)->update(['status' => $request->values]);
                $getdata = User::where('id', $request->user_id)->first();
                if($request->values==1){
                    $type = ucfirst($getdata->first_name);
                    User::where('id', $request->user_id)->update(['is_profile_completed' => 1]);
                    $phone = trim($getdata->phone);
                    $msg = "Dear $type, Your account approved by admin. Use your credentials to login into system.";
                    if (ActiveSMS){
                        CommonController::SendSMS($phone, $msg);
                    }
                }
                if($request->values==2){
                    $type = ucfirst($getdata->first_name);
                    User::where('id', $request->user_id)->update(['is_profile_completed' => 1]);
                    $phone = trim($getdata->phone);
                    $msg = "Dear $type, Your account rejected by admin. if you have any query contact to admin.";
                    if (ActiveSMS){
                        CommonController::SendSMS($phone, $msg);
                    }
                }
            } else {
                VolunteerPermission::where('user_id', $request->user_id)->update([$request->field_name => $request->values]);
            }

            $result = response(['status' => 200, 'success' => true, 'msg' => ucfirst($request->field_name) . ' updated successfully.!']);
        } else {
            $result = response(['status' => 200, 'success' => false, 'msg' => "No permission found"]);
        }
        return $result;
        exit();
    }
}
