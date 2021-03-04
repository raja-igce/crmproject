<?php

namespace App\Http\Controllers\admin;

use App\Models\VolunteerPermission;
use App\Models\Campaign;
use App\Models\CampaignTeam;
use App\Models\Project;
use App\Models\Tags;

use App\Helper\ImageHelper;
use App\Helper\Slug;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\campaignListResource;

use App\Http\Resources\OrganizationPermissionResource;
use Illuminate\Support\Facades\Validator;
use App\Jobs\ProjectCreateMail;

use App\User;
use DB;
use Hash;
use Auth;
use Carbon;
use File;

class OrganizationPermissionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function organization_permissions(Request $request)
    {
        return view('admin.organization_permissions.organization');
    }
    public function ajaxorganization_permissions(Request $request)
    {
        $txtsearch = request('txtsearch', "");
        $userResult =  VolunteerPermission::whereHas('getUser', function ($q) use ($txtsearch) {
            $q->where(function ($q) use ($txtsearch) {
                if($txtsearch!=""){
                    $q->where('first_name', 'like', "$txtsearch%");
                    $q->orWhere('last_name', 'like', "$txtsearch%");
                }
            })->where('role_id', 2);
        })->with('getUser')->orderby('updated_at', 'desc')->paginate($request['pageno']);
        $userResult =  OrganizationPermissionResource::collection($userResult);
        return $userResult;
    }

    public function updateOrganizationPermissions(Request $request)
    {
        // dd($request->all());
        $check_volunteer = VolunteerPermission::where('user_id', $request->user_id)->first();
        if ($check_volunteer) {
            if ($request->field_name ==  'status') { 
                User::where('id', $request->user_id)->update(['status' => $request->values]);
                $getdata = User::where('id', $request->user_id)->first();
                if($request->values==1){
                    User::where('id', $request->user_id)->update(['is_profile_completed' => 1]);
                    $type = ucfirst($getdata->first_name);
                    $phone = trim($getdata->phone);
                    $msg = "Dear $type, Your account approved by admin. Use your credentials to login into system.";
                    if (ActiveSMS){
                        CommonController::SendSMS($phone, $msg);
                    }
                }
                if($request->values==2){
                    User::where('id', $request->user_id)->update(['is_profile_completed' => 1]);
                    $type = ucfirst($getdata->first_name);
                    $phone = trim($getdata->phone);
                    $msg = "Dear $type, Your account rejected by admin. if you have any query contact to admin.";
                    if(ActiveSMS){
                        CommonController::SendSMS($phone, $msg);
                    }
                }
            }else{
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
