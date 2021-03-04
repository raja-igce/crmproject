<?php

namespace App\Http\Controllers\admin;

use App\Helper\AccessHelper;
use App\Models\Education;
use App\Models\BloodGroup;
use App\Models\CausesInterested;
use App\Models\Institutions;
use App\Models\LanguageKnown;
use App\Models\Occupation;
use App\Models\State;


use App\Models\Volunteer;
use App\Models\UserLanguageKnow;
use App\Models\UserInterestCause;
use App\Models\UserState;


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
use Mail;
use Carbon;

class UserController extends Controller
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
    public function index()
    {
        $accessAble = AccessHelper::isAccessAble(auth()->user()->id, 'crmconatct');
        if ($accessAble == 'denied') {
            return redirect()->route('home');
        }

        try {
            $eduction =  Education::where('status', 1)->get();
            $CausesInterested =  CausesInterested::where('status', 1)->get();
            $Institution =  Institutions::where('status', 1)->get();
            $BloodGroup =  BloodGroup::where('status', 1)->get();
            $LanguageKnown =  LanguageKnown::where('status', 1)->get();
            $Occupation =  Occupation::where('status', 1)->orderby('title','asc')->get();
            $State =  State::where('status', 1)->get();
            $userSetting['Education'] = $eduction;
            $userSetting['CausesInterested'] = $CausesInterested;
            $userSetting['Occupation'] = $Occupation;
            $userSetting['LanguageKnown'] = $LanguageKnown;
            $userSetting['Institutions'] = $Institution;
            $userSetting['BloodGroup'] = $BloodGroup;
            $userSetting['State'] = $State;

            
            return view('admin.users.volunteer', compact('userSetting'));
        } catch (\Exception $e) {
            return response(['status' => false, 'msg' => errormsg($e)]);
        }
    }
    public function ajaxUserList(Request $request) //get volunteers
    {
        $userstatus = request('userstatus', "");
        $verifystatus = request('verifystatus', "");
        $txtsearch = request('txtsearch', "");

        $userposition=request('userposition',"");
        $userinstitute=request('userinstitute',"");
        $userblood=request('userblood',"");
        $usercauses=request('usercauses',"");

        $userResult =   User::with(['getInterestedCause.getInterestCause'])->where(function ($q) use ($txtsearch) {
            if (trim($txtsearch) != "") {
                $q->where('first_name', 'like', "%$txtsearch%");
                $q->orwhere('last_name', 'like', "%$txtsearch%");
                $q->orwhere('email', 'like', "%$txtsearch%");
                $q->orwhere('phone', 'like', "%$txtsearch%");
                $q->orwhere('live_in', 'like', "%$txtsearch%");
            }
        })->where(function ($q) use ($userstatus) {
            if ($userstatus != "") {
                $q->where('status', $userstatus);
            }
        })->where(function ($q) use ($userposition) {
            if ($userposition != "") {
                $q->where('position', $userposition);
            } 
        })->where(function ($q) use ($userblood) {
            if ($userblood != "") {
                $q->where('blood_group', $userblood);
            }
        })->where(function($q)use($userinstitute){
                if($userinstitute!=""){
                    $q->whereHas('getVolunteerDetail',function($q2)use($userinstitute){
                        $q2->where('institutions_id',"$userinstitute");
                    });
                }
        })->where(function($q)use($usercauses){
                if($usercauses!=""){
                    $q->whereHas('getInterestedCause',function($q2)use($usercauses){
                        $q2->where('interest_id',"$usercauses");
                    });
                }
        })->where('role_id',1)->orderby('updated_at', 'desc')->paginate($request['pageno']);
        /*
        ->where(function ($q) use ($verifystatus) {
            if ($verifystatus != "") {
                $q->where('is_email_verified', $verifystatus);
            }
        })
        */
        $userResult =  UserResource::collection($userResult);
        return $userResult;
    }
    public function blockUser(Request $request)
    {
        try {
            DB::beginTransaction();
            $type = request('type', 'block'); //block delete active
            if ($type == 'block') {
                $isDeleted = User::where('id', $request->id)->update(['status' => 2]);
            }
            if ($type == 'active') {
                $isDeleted = User::where('id', $request->id)->update(['active' => 1]);
            }
            DB::commit();
            return response(['status' => true, 'msg' => 'success']);
        } catch (\Exception $e) {
            DB::rollback();
            return response(['status' => false, 'msg' => errormsg($e)]);
        }
    }

    public function addVolunteer(Request $req)
    {
        
        // $accessAble = AccessHelper::isAccessAble(auth()->user()->id, 'crmconatct');
        // if ($accessAble == 'denied'  ) {
        //      return redirect()->route('home');
        // }
        try {
            DB::beginTransaction();
            $validator = Validator::make($req->all(), [
                'first_name' => 'required',
                'last_name' => 'required',
                'email' => 'required',
                'phone' => 'required',
            ]);
            if ($validator->fails()) {
                return response(['code' => 104, 'msg' => 'Error - ' . $validator->errors()->first(), 'result' => (object) []]);
            }
            $user_id = request('user_id', '');
            $isEmailExist = User::where(function ($q) use ($user_id) {
                if ($user_id != "") {
                    $q->where('id', '!=', $user_id);
                }
            })->where('email', $req->email)->first();
            if ($isEmailExist) {
                return response(['code' => 104, 'msg' => 'Email Already registered', 'result' => (object) []]);
            }

            if ($user_id != "") {
                $addUser = User::where('id', $user_id)->first();
            }else{
                $addUser = new User();
                $password = request('password', request('phone', '123123'));    
                $password = Hash::make($password);
                $addUser->password =  $password;
                if($user_id==auth()->user()->id){
                    $addUser->is_profile_completed =  1;
                }    
            }

            $startdate=request('dob', null);
            if($startdate){
                $date = str_replace('/', '-', $startdate);
                $startdate = date('Y-m-d', strtotime($date));
            }
            $addUser->first_name = $firstname = request('first_name', '');
            $addUser->last_name = $lastname = request('last_name', '');
            $addUser->email = $email = request('email', '');
            $addUser->role_id = request('role_id', 1);
            $addUser->phone = request('phone', '');
            $addUser->gender = request('gender', '');
            $addUser->dob = $startdate;
            $addUser->address_line1 = request('address_line1', '');
            $addUser->address_line2 = request('address_line2', '');
            $addUser->city = request('city', '');
            $addUser->district = request('district', '');
            $addUser->state = request('state', '');
            $addUser->pincode = request('pincode', '');
            $addUser->live_in = request('live_in', '');
            $addUser->blood_group = request('blood_group', 0);
            $addUser->email_verified_at = date('Y-m-d H:i:s');
           
            $addUser->remember_token = request('remember_token', '');
            if ($addUser->save()) {
                $userid = $addUser->id;
                $controller = \App::make('App\Http\Controllers\admin\PermissionController');
                $controller->addDefaultPermission($userid);
                if ($user_id != "") {
                    $addVolunteer =  Volunteer::where('user_id', $user_id)->first();
                    if (!$addVolunteer) {
                        $addVolunteer = new Volunteer();
                        $userid = $user_id;
                    }
                    $msg = "Volunteer Updated Successfully";
                    
                } else {
                    $addVolunteer = new Volunteer();
                    $msg = "Volunteer Added Successfully";
                }

                $addVolunteer->user_id = $userid;
                $addVolunteer->live_in = request('live_in', '');
                $addVolunteer->eduction_id = request('eduction_id', 0);
                $addVolunteer->institutions_id = request('institutions', 0);
                $addVolunteer->occupation_id = request('occupation', 0);
                $addVolunteer->is_blood_donor = request('is_blood_donor', 0);
                $addVolunteer->has_voluntee_experience = request('has_voluntee_experience', 0);
                $addVolunteer->fb_link = request('fb_link', '');
                $addVolunteer->insta_link = request('insta_link', '');
                $addVolunteer->interested_in_online = request('in_online', 0);
                $addVolunteer->twitter_link = request('twitter_link', '');
                $addVolunteer->save();

                $language_id = request('language_id', []);
                if (count($language_id) > 0) {
                    UserLanguageKnow::where('user_id', $userid)->delete();
                    foreach ($language_id as $key => $value) {
                        $addLang = new UserLanguageKnow();
                        $addLang->user_id = $userid;
                        $addLang->language_id = $value;
                        $addLang->save();
                    }
                }

                $interested_in_causes = request('interested_in_causes', []);
                if (count($interested_in_causes) > 0) {
                    UserInterestCause::where('user_id', $userid)->delete();
                    foreach ($interested_in_causes as $key => $value) {
                        $addLang = new UserInterestCause();
                        $addLang->user_id = $userid;
                        $addLang->interest_id = $value;
                        $addLang->save();
                    }
                }

                $list_state = request('state_id', []);
                if (count($list_state) > 0) {

                    UserState::where('user_id', $user_id)->delete();
                    foreach ($list_state as $key => $value) {
                        $addLang = new UserState();
                        $addLang->user_id = $userid;
                        $addLang->state_id = $value;
                        $addLang->save();
                    }
                }
                $content = "Welcome to innerEye Foundation";
                $line2 = "Dear Mr./Ms. $firstname $lastname,<br><br>
                    Welcome to iNNER-EYE Portal, a one-step to help people who really want help!! .<br><br>
                    Your email <b>$email</b> with password <b>123123</b> <br><br>
                    iNNER-EYE is a charitable organization to enable helpless/support-less people to have sustainable Livelihood,
                    Health and Education for progressive individual and social development.";
                $parameter['email'] = $email;
                $parameter['line2'] = $line2;
                dispatch(new SendWelcomeMail($content, $parameter));
                DB::commit();
            }
            return response(['status' => true, 'msg' => $msg]);
        } catch (\Exception $e) {
            DB::rollback();
            return response(['status' => true, 'msg' => errormsg($e)]);
        }
    }

    public function getVolunteerDetail(Request $req, $id = 0)
    {
        // $accessAble = AccessHelper::isAccessAble(auth()->user()->id, 'crmconatct');
        // if ($accessAble == 'denied') {
        //     return redirect()->route('home');
        // }
        try {
            DB::beginTransaction();
            $id = $req->id;
            $isEmailExist = User::where('id', $id)->first();
            if (!$isEmailExist) {
                return response(['code' => 104, 'msg' => 'No Record found', 'result' => (object) []]);
            }
            $userDetails = User::with(['getBlogs','getCampaigns','getEvents','getUserStates', 'getVolunteerDetail','getInterestedCause.getInterestCause', 'getLanguageKnow.getLanguage', 'getRole', 'getVolunteerDetail.getEducation', 'getVolunteerDetail.getInstitution', 'getVolunteerDetail.getOccupation'])->where('id', $id)->first();
            $userResult = new UserDetailsResource($userDetails);
            return response(['status' => true, 'msg' => "Added Successfully", 'result' => $userResult]);
        } catch (\Exception $e) {
            DB::rollback();
            return response(['status' => false, 'msg' => errormsg($e)]);
        }
    }
    public function changepassword(Request $request)
    {
        $method = $request->method();

        if (strtoupper($method) == 'POST') {
            $result = null;
            try {
                $data = $request->all();
                $user = Auth::user();
                if (!Hash::check($data['old-password'], $user->password)) {
                    return response(['status' => 200, 'success' => false, 'msg' => "Current password doesn't matched.!"]);
                }
                $user->password = bcrypt($data['pass']);
                $user->save();
                $result = response(['status' => 200, 'success' => true, 'msg' => 'Password changed successfully.!']);
            } catch (\Exception $e) {
                $result = response(['status' => 200, 'success' => false, 'msg' => $e->getMessage()]);
            }
            return $result;
            exit();
        }
        $user = Auth::user();
        return view('admin.users.changepassword', compact('user'));
    }
}
