<?php

namespace App\Http\Controllers\admin;
use App\Helper\AccessHelper;
use App\Models\Education;
use App\Models\BloodGroup;
use App\Models\CausesInterested;
use App\Models\Institutions;
use App\Models\LanguageKnown;
use App\Models\Occupation;
use App\Models\Volunteer;
use App\Models\UserLanguageKnow;
use App\Models\UserInterestCause;
use App\Models\OrganizationCategory;
use App\Models\SupportHelp;
use App\Models\Individual;
use App\Models\Organization;
use App\Models\OrganizationFile;



use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\organizationListResource;
use App\Http\Resources\UserDetailsResource;
use Illuminate\Support\Facades\Validator;
use App\Jobs\SendWelcomeMail;
use App\Helper\ImageHelper;
use App\User;
use DB;
use Hash;
use Auth;
use File;

class OrganizationController extends Controller
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

    public function index($type)
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
            $Occupation =  Occupation::where('status', 1)->get();
            $userSetting['Education'] = $eduction;
            $userSetting['CausesInterested'] = $CausesInterested;
            $userSetting['Occupation'] = $Occupation;
            $userSetting['LanguageKnown'] = $LanguageKnown;
            $userSetting['Institutions'] = $Institution;
            $userSetting['BloodGroup'] = $BloodGroup;

            $OrganizationCategory =  OrganizationCategory::where('status', 1)->get();
            $SupportHelp =  SupportHelp::where('status', 1)->get();


            $userSetting['getOrganizationSize'] = $getOrganizationSize = getOrganizationSize();
            $userSetting['getReference'] = $getReference = getReference();
            $userSetting['OrganizationCategory'] = $OrganizationCategory;
            $userSetting['SupportHelp'] = $SupportHelp;






          

            if ($type == 'organization') {
                $headertitle = "Organization";
                $btntitle = "New Organization";
                $frmtitle = "Add new Organization";
                $orgCategory = OrganizationCategory::where('status',1)->get();
                $orgHelp = SupportHelp::where('status',1)->get();
                return view('admin.users.application', compact('orgHelp','orgCategory','userSetting', 'headertitle', 'btntitle', 'frmtitle'));
            } else {
                $getMeritalStatus = getMeritalStatus();
                $getGender = getGender();
                $getFamilyIncome = getFamilyIncome();
                $getFamilySize = getFamilySize();

                $headertitle = "Individual";
                $btntitle = "New Individual Beneficiary";
                $frmtitle = "Individual Beneficiary";
                return view('admin.users.application_individual', compact('userSetting', 'headertitle', 'btntitle', 'frmtitle', 'getMeritalStatus', 'getGender', 'getFamilyIncome', 'getFamilySize'));
            }
        } catch (\Exception $e) {
            return response(['status' => false, 'msg' => errormsg($e)]);
        }
    }
    public function ajaxIndividualApplicationList(Request $request)
    {
        $userstatus = request('userstatus', "");
        $verifystatus = request('verifystatus', "");
        $txtsearch = request('txtsearch', "");
        $userResult =   User::with(['getOrganization', 'getOrgDocument', 'getOrgCertificate'])->where(function ($q) use ($txtsearch) {
            if (trim($txtsearch) != "") {
                $q->where('first_name', 'like', "%$txtsearch%");
                $q->orwhere('last_name', 'like', "%$txtsearch%");
                $q->orwhere('email', 'like', "%$txtsearch%");
                $q->orwhere('phone', 'like', "%$txtsearch%");
            }
        })->where(function ($q) use ($userstatus) {
            if ($userstatus != "") {
                $q->where('status', $userstatus);
            }
        })->where(function ($q) use ($verifystatus) {
            if ($verifystatus != "") {
                $q->where('is_email_verified', $verifystatus);
            }
        })->where('role_id', 2)->orderby('updated_at', 'desc')->paginate($request['pageno']);

        $userResult =  organizationListResource::collection($userResult);
        return $userResult;
    }
    public function addIndividualApplication(Request $req)
    {

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
            $phone = request('phone', '');
            if ($user_id != "") {
                $addUser = User::where('id', $user_id)->first();
                $password=request('password', $phone);
                $addUser->password = make::hash($password);
            } else {
                $addUser = new User();
                $password=request('password', $phone);
                $addUser->password = make::hash($password);
            }

            $addUser->first_name = $firstname = request('first_name', '');
            $addUser->last_name = $lastname = request('last_name', '');
            $addUser->email = $email = request('email', '');
            $addUser->role_id = request('role_id', 2); //1=volunteer 2 = organization
            $addUser->phone = $phone = request('phone', '');
            //$addUser->profile_pic = request('profile_pic', '');
            $addUser->gender = request('gender', '');
            $addUser->dob = request('dob', null);
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
                if ($user_id != "") {
                    $addVolunteer =  Individual::where('user_id', $user_id)->first();
                    $msg = "Beneficiary Updated Successfully";
                } else {
                    $addVolunteer = new Individual();
                    $msg = "Beneficiary Added Successfully";
                }

                $addVolunteer->user_id = $userid;
                $addVolunteer->marital_status = request('marital_status', 0);
                $addVolunteer->family_income = request('monthly_income', "");
                $addVolunteer->family_size = request('family_size', "");
                $addVolunteer->support_help_id = request('support_help', 0);
                $addVolunteer->support_help_text = request('othersupport', '');
                $addVolunteer->reference = request('reference', 0);
                $addVolunteer->other_reference = request('otherReference', '');
                if ($addVolunteer->save()) {
                    $org_id = $addVolunteer->id;
                    $savepath = ABS_PATH . 'Users/';
                    $documents = $req['imagename'];
                    $event_id = $org_id;
                    if (!File::exists($savepath . $event_id)) {
                        File::makeDirectory($savepath . $event_id, 0777, true);
                        File::makeDirectory($savepath . $event_id . '/Thumb', 0777, true);
                    }

                    //Certificate upload
                    if (isset($req->imagename)  && count($req->imagename) > 0) {
                        $orgimagename = $req->orgimagename;
                        if (in_array(strtolower(last(explode('.', $req->imagename))), ['png', 'jpg', 'jpeg', 'bmp', 'gif'])) {
                            $filetype = "img";
                        }else{
                            $filetype = "doc";
                        }
                        foreach ($req->imagename as $key => $value) {
                            if (file_exists(ABS_PATH . 'Temp/' . $value)) {
                                File::move(ABS_PATH . 'Temp/' . $value, $savepath . $event_id . '/' . $value);
                            }
                            if (file_exists(ABS_PATH . 'Temp/Thumb/' . $value)) {
                                File::move(ABS_PATH . 'Temp/Thumb/' . $value, $savepath . $event_id . '/Thumb/' . $value);
                            }

                            /*
                            if (file_exists($savepath . $event_id . '/' . $value)) {
                                ImageHelper::resize_crop_image(900, 600, $savepath . $event_id . '/' . $value, $savepath . $event_id . '/' . $value, 80);
                            }*/

                            $isExist = OrganizationFile::where('organization_id', $userid)->where('file', $value)->count();
                            if ($isExist == 0) {
                                $addteam = new OrganizationFile();
                                $addteam->organization_id = $org_id;
                                $addteam->file = $value;
                                $addteam->file_type = $filetype;
                                $addteam->file_name = $orgimagename[$key];
                                $addteam->type = 'IC';
                                $addteam->save();
                            }
                        }
                    }
                    // document upload
                    if (isset($req->imagename1)  && count($req->imagename1) > 0) {
                        $orgimagename1 = $req->orgimagename1;
                        if (in_array(strtolower(last(explode('.', $req->orgimagename1))), ['png', 'jpg', 'jpeg', 'bmp', 'gif'])) {
                            $filetype = "img";
                        }else{
                            $filetype = "doc";
                        }
                        foreach ($req->imagename1 as $key => $value) {
                            if (file_exists(ABS_PATH . 'Temp/' . $value)) {
                                File::move(ABS_PATH . 'Temp/' . $value, $savepath . $event_id . '/' . $value);
                            }
                            if (file_exists(ABS_PATH . 'Temp/Thumb/' . $value)) {
                                File::move(ABS_PATH . 'Temp/Thumb/' . $value, $savepath . $event_id . '/Thumb/' . $value);
                            }
                            /*
                            if (file_exists($savepath . $event_id . '/' . $value)) {
                                ImageHelper::resize_crop_image(900, 600, $savepath . $event_id . '/' . $value, $savepath . $event_id . '/' . $value, 80);
                            }*/

                            $isExist = OrganizationFile::where('organization_id', $userid)->where('file', $value)->count();
                            if ($isExist == 0) {
                                $addteam = new OrganizationFile();
                                $addteam->organization_id = $org_id;
                                $addteam->file = $value;
                                $addteam->file_type = $filetype;
                                $addteam->file_name = $orgimagename1[$key];
                                $addteam->type = 'ID'; // d=Document or c = Certificate
                                $addteam->save();
                            }
                        }
                    }

                    if (isset($req['deletedImage'])) {
                        $isRemove = OrganizationFile::whereIn('id', explode(',', $req['deletedImage']))->where('organization_id', $event_id)->get();
                        if (count($isRemove) > 0) {
                            foreach ($isRemove as $key => $value) {
                                 
                                File::delete($savepath . $event_id . '/' . $value->file);
                                File::delete($savepath . $event_id . '/Thumb/' . $value->file);
                            }
                        }
                        
                        //$isRemove = OrganizationFile::whereIn('id', explode(',', $req['deletedImage']))->where('organization_id', $event_id)->delete();
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
    public function ajaxApplicationList(Request $request)
    {
        $userstatus = request('userstatus', "");
        $verifystatus = request('verifystatus', "");
        $txtsearch = request('txtsearch', "");
        $orgcat = request('orgcat', "");
        $usermisson= request('usermisson', "");
          
           
        $userResult =   User::with(['getOrganization', 'getOrganization.getDocument', 'getOrganization.getCertificate'])->where(function ($q) use ($txtsearch) {
            if (trim($txtsearch) != "") {
                $q->where('first_name', 'like', "%$txtsearch%");
                $q->orwhere('last_name', 'like', "%$txtsearch%");
                $q->orwhere('email', 'like', "%$txtsearch%");
                $q->orwhere('phone', 'like', "%$txtsearch%");
            }
        })->whereHas('getOrganization',function ($q) use ($orgcat) {
            if ($orgcat != "") {
                $q->where('org_category', $orgcat);
            }
        })->whereHas('getOrganization',function ($q) use ($usermisson) {
            if ($usermisson != "") {
                $q->where('support_help_id', $usermisson);
            }
        })->where(function ($q) use ($userstatus){
            if ($userstatus != "") {
                $q->where('status', $userstatus);
            }
        })->where(function ($q) use ($verifystatus) {
            if ($verifystatus != "") {
                $q->where('is_email_verified', $verifystatus);
            }
        })->where('role_id', 2)->orderby('updated_at', 'desc')->paginate($request['pageno']);

        $userResult =  organizationListResource::collection($userResult);
        return $userResult;
    }
    public function addApplication(Request $req)
    {
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
                $phone = request('phone', '');
                $password=request('password', $phone);
                $addUser->password = $remember_token = Hash::make($password);
                $addUser->remember_token = request('remember_token', $remember_token);
            } else {
                $addUser = new User();
            }
            $addUser->first_name = $firstname = request('first_name', '');
            $addUser->last_name = $lastname = request('last_name', '');
            $addUser->email = $email = request('email', '');
            $addUser->role_id = request('role_id', 2); //1=volunteer 2 = organization
            $addUser->phone =$phone= request('phone', '');
            $addUser->gender = request('gender', '');
            $addUser->dob = request('dob', null);
            $addUser->address_line1 = request('address_line1', '');
            $addUser->address_line2 = request('address_line2', '');
            $addUser->city = request('city', '');
            $addUser->district = request('district', '');
            $addUser->state = request('state', '');
            $addUser->pincode = request('pincode', '');
            $addUser->live_in = request('live_in', '');
            $addUser->blood_group = request('blood_group', 0);
            $addUser->email_verified_at = date('Y-m-d H:i:s');
            if ($addUser->save()) {
                $userid = $addUser->id;
                if ($user_id != "") {
                    $addVolunteer =  Organization::where('user_id', $user_id)->first();
                    if(!$addVolunteer){
                        $addVolunteer = new Organization();
                    }
                    $msg = "Organization Updated Successfully";
                } else {
                    $addVolunteer = new Organization();
                    $msg = "Organization Added Successfully"; 
                    $controller = \App::make('App\Http\Controllers\admin\PermissionController');
                    $controller->addDefaultPermission($userid);
                }

                $addVolunteer->user_id = $userid;
                $addVolunteer->org_category = request('category', 0);
                $addVolunteer->reg_no = request('registration_no', 0);
                $addVolunteer->org_category_txt = request('otherCategory', "");
                $addVolunteer->org_strength = request('strength', "");
                $addVolunteer->support_help_id = request('support_help', 0);
                $addVolunteer->support_help_text = request('othersupport', '');
                $addVolunteer->reference = request('reference', 0);
                $addVolunteer->other_reference = request('otherReference', '');
                if ($addVolunteer->save()) {
                    $org_id = $userid;
                    $savepath = ABS_PATH . 'Users/';
                    $documents = $req['imagename'];
                    $event_id = $org_id;
                    if (!File::exists($savepath . $event_id)) {
                        File::makeDirectory($savepath . $event_id, 0777, true);
                        File::makeDirectory($savepath . $event_id . '/Thumb', 0777, true);
                    }

                    //Certificate upload
                    if (isset($req->imagename)  && count($req->imagename) > 0) {
                        $orgimagename = $req->orgimagename;
                        foreach ($req->imagename as $key => $value) {
                            if (file_exists(ABS_PATH . 'Temp/' . $value)) {
                                File::move(ABS_PATH . 'Temp/' . $value, $savepath . $event_id . '/' . $value);
                            }
                            if (file_exists(ABS_PATH . 'Temp/Thumb/' . $value)) {
                                File::move(ABS_PATH . 'Temp/Thumb/' . $value, $savepath . $event_id . '/Thumb/' . $value);
                            }
                            if (file_exists($savepath . $event_id . '/' . $value)) {
                                ImageHelper::resize_crop_image(900, 600, $savepath . $event_id . '/' . $value, $savepath . $event_id . '/' . $value, 80);
                            }

                            $isExist = OrganizationFile::where('organization_id', $userid)->where('file', $value)->count();
                            if ($isExist == 0) {
                                $addteam = new OrganizationFile();
                                $addteam->organization_id = $org_id;
                                $addteam->file = $value;
                                $addteam->file_name = $orgimagename[$key];
                                $addteam->type = 'C';
                                $addteam->save();
                            }
                        }
                    }
                    // document upload
                    if (isset($req->imagename1)  && count($req->imagename1) > 0) {
                        $orgimagename1 = $req->orgimagename1;
                        foreach ($req->imagename1 as $key => $value) {
                            if (file_exists(ABS_PATH . 'Temp/' . $value)) {
                                File::move(ABS_PATH . 'Temp/' . $value, $savepath . $event_id . '/' . $value);
                            }
                            if (file_exists(ABS_PATH . 'Temp/Thumb/' . $value)) {
                                File::move(ABS_PATH . 'Temp/Thumb/' . $value, $savepath . $event_id . '/Thumb/' . $value);
                            }
                            if (file_exists($savepath . $event_id . '/' . $value)) {
                                ImageHelper::resize_crop_image(900, 600, $savepath . $event_id . '/' . $value, $savepath . $event_id . '/' . $value, 80);
                            }

                            $isExist = OrganizationFile::where('organization_id', $userid)->where('file', $value)->count();
                            if ($isExist == 0) {
                                $addteam = new OrganizationFile();
                                $addteam->organization_id = $org_id;
                                $addteam->file = $value;
                                $addteam->file_name = $orgimagename1[$key];
                                $addteam->type = 'D'; // d=Document or c = Certificate
                                $addteam->save();
                            }
                        }
                    }

                    if (isset($req['deletedImage'])) {
                        $isRemove = OrganizationFile::whereIn('id', explode(',', $req['deletedImage']))->where('organization_id', $event_id)->get();
                        if (count($isRemove) > 0) {
                            $savepath = ABS_PATH . 'Users/';
                            foreach ($isRemove as $key => $value) {
                                File::delete($savepath . $event_id . '/' . $value->file);
                                File::delete($savepath . $event_id . '/Thumb/' . $value->file);
                            }
                        }
                        if(trim($req['deletedImage'])!=""){
                            $isRemove = OrganizationFile::whereIn('id', explode(',', $req['deletedImage']))->where('organization_id', $event_id)->delete();
                        }
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
}
