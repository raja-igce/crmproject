<?php

namespace App\Http\Controllers\admin;

use App\Helper\ImageHelper;
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
use App\Models\UserState;
use App\Models\State;
use App\Models\SupportHelp;
use App\Models\Beneficiary;
use App\Models\BeneficiaryImages;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Http\Resources\UserBeneficiaryResource;
use Illuminate\Support\Facades\Validator;
use App\Jobs\SendWelcomeMail;

use App\User;
use DB;
use Hash;
use File;
use Auth;

class BeneficiaryController extends Controller
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
            $Occupation =  Occupation::where('status', 1)->get();
            $SupportHelp =  SupportHelp::where('status', 1)->get();
            $State =  State::where('status', 1)->get();
            $userSetting['Education'] = $eduction;
            $userSetting['CausesInterested'] = $CausesInterested;
            $userSetting['Occupation'] = $Occupation;
            $userSetting['LanguageKnown'] = $LanguageKnown;
            $userSetting['Institutions'] = $Institution;
            $userSetting['BloodGroup'] = $BloodGroup;
            $userSetting['SupportHelp'] = $SupportHelp;
            $userSetting['State'] = $State;
            return view('admin.users.beneficiary', compact('userSetting'));
        } catch (\Exception $e) {
            return response(['status' => false, 'msg' => errormsg($e)]);
        }
    }
    public function ajaxBeneficiariesList(Request $request)
    {
        $userstatus = request('userstatus', "");
        $verifystatus = request('verifystatus', "");
        $txtsearch = request('txtsearch', "");
        $txteduction = request('txteduction', "");
        $txtsupport= request('txtsupport', "");
        $txtmstatus = request('txtmstatus', "");
    	
	
	
        $userResult =   User::with('getBeneficiaryDetail')->where(function ($q) use ($txtsearch) {
            if (trim($txtsearch) != "") {
                $q->where('first_name', 'like', "%$txtsearch%");
                $q->orwhere('last_name', 'like', "%$txtsearch%");
                $q->orwhere('email', 'like', "%$txtsearch%");
                $q->orwhere('phone', 'like', "%$txtsearch%");
            }
        })->whereHas('getBeneficiaryDetail',function ($q) use ($txteduction,$txtsupport,$txtmstatus) {
            if ($txteduction != "") {
                $q->where('eduction_id', $txteduction);
            }
            if ($txtmstatus != "") {
                $q->where('marital_status', $txtmstatus);
            }
            if ($txtsupport != "") {
                $q->where('help_type', $txtsupport);
            }
        })->where(function ($q) use ($userstatus) {
            if ($userstatus != "") {
                $q->where('status', $userstatus);
            }
        })->where(function ($q) use ($verifystatus) {
            if ($verifystatus != "") {
                $q->where('is_email_verified', $verifystatus);
            }
        })->where('role_id', 3)->orderby('updated_at', 'desc')->paginate($request['pageno']);

        $userResult =  UserBeneficiaryResource::collection($userResult);
        return $userResult;
    }
    public function deleteBeneficiary(Request $request)
    {
        try {
            DB::beginTransaction();
            $type = request('type', 'block'); //block delete active
            $getdata = User::where('id', $request->id)->first();
            $getdata->user_id;
            File::deleteDirectory(ABS_PATH . 'Beneficiary/' . $request->id);
            $isDeleted = User::where('id', $request->id)->delete();
            Beneficiary::where('user_id', $request->id)->delete();
            BeneficiaryImages::where('user_id', $request->id)->delete();
            DB::commit();
            return response(['status' => true, 'msg' => 'success']);
        } catch (\Exception $e) {
            DB::rollback();
            return response(['status' => false, 'msg' => errormsg($e)]);
        }
    }
    public function approveBeneficiaries(Request $request)
    {
        try {
            DB::beginTransaction();
            $beneficial_id = request('user_id', '0');
            $active = request('active', '0');
            $beneficiarDetails = User::where('id', $beneficial_id)->first();

            // $isDeleted = User::where('id', $request->id)->delete();
            // Beneficiary::where('user_id', $request->id)->delete();

            DB::commit();
            return response(['status' => true, 'msg' => 'success']);
        } catch (\Exception $e) {
            DB::rollback();
            return response(['status' => false, 'msg' => errormsg($e)]);
        }
    }
    public function addBeneficiaries(Request $req)
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
            $active = 0;
            $ischange = false;
            if ($user_id != "") {
                $addUser = User::where('id', $user_id)->first();
                $active = request('active', $addUser->status);
                if ($active == $addUser->status) {
                    $notedata = Beneficiary::where('user_id', $user_id)->first();
                    $note = $notedata->reject_note;
                } else {
                    $ischange = true;
                    $addUser->status = $active;
                    $note = request('note', '');
                }
            } else {
                $addUser = new User();
                $addUser->status = request('status', 0);
                $addUser->creator_id = auth()->user()->id;
                $note = "";
            }

            $startdate=request('dob', null);
            if($startdate){
                $date = str_replace('/', '-', $startdate);
                $startdate = date('Y-m-d', strtotime($date));
            }

            $addUser->first_name = $firstname = request('first_name', '');
            $addUser->last_name = $lastname = request('last_name', '');
            $addUser->email = $email = request('email', '');
            $addUser->role_id = request('role_id', 3);
            $addUser->phone = request('phone', '');
           
            $addUser->gender = request('gender', '');
            $addUser->dob = $startdate ;
            $addUser->address_line1 = request('address_line1', '');
            $addUser->address_line2 = request('address_line2', '');
            $addUser->city = request('city', '');
            $addUser->district = request('district', '');
            $addUser->state = request('state', '');

            $addUser->pincode = request('pincode', '');
            $addUser->live_in = request('live_in', '');
            $addUser->blood_group = request('blood_group', 0);
            $addUser->email_verified_at = date('Y-m-d H:i:s');
            $addUser->password = request('password', '123123');
            $addUser->remember_token = request('remember_token', '');
            if ($addUser->save()) {
                $userid = $addUser->id;

                if ($user_id != "") {
                    $addVolunteer =  Beneficiary::where('user_id', $user_id)->first();
                    if (!$addVolunteer) {
                        $addVolunteer = new Volunteer();
                        $userid = $user_id;
                    }
                    $msg = "Beneficiary Updated Successfully";
                } else {
                    $addVolunteer = new Beneficiary();
                    $msg = "Beneficiary Added Successfully";
                }

                $addVolunteer->user_id = $userid;
                $addVolunteer->eduction_id = request('eduction_id', 0);
                $addVolunteer->no_family = request('no_family', 0);
                $addVolunteer->family_income = request('income', 0);
                $addVolunteer->help_type = request('support', 0);
                $addVolunteer->duration = request('duration', 0);
                $addVolunteer->marital_status = request('mstatus', 0);
                $addVolunteer->title = request('title', 'Mr');
                $addVolunteer->reject_note = $note;
                $addVolunteer->save();
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

                $saveTargetPath = ABS_PATH . 'Beneficiary/';
                $folder_id = $userid;
                if (!File::exists($saveTargetPath . $folder_id)) {
                    File::makeDirectory($saveTargetPath . $folder_id, 0755, true);
                    File::makeDirectory($saveTargetPath . $folder_id . '/Thumb', 0755, true);
                }

                $filefix = 'id_';

                $metadata = $req->meta_idproof;
                $getFiles = $req->idproof;
                if (isset($getFiles)  && count($getFiles) > 0) {
                    foreach ($getFiles as $key => $value_name) {
                        $fileType = 'file';
                        if (file_exists(ABS_PATH . 'Temp/' . $value_name)) {
                            File::move(ABS_PATH . 'Temp/' . $value_name, $saveTargetPath . $folder_id . '/' . $filefix . $value_name);
                        }
                        if (file_exists(ABS_PATH . 'Temp/Thumb/' . $value_name)) {
                            File::move(ABS_PATH . 'Temp/Thumb/' . $value_name, $saveTargetPath . $folder_id . '/Thumb/' . $filefix . $value_name);
                            $fileType = 'img';
                        }
                        if (file_exists($saveTargetPath . $folder_id . '/' . $filefix . $value_name)) {
                            //ImageHelper::resize_crop_image(900, 600, $saveTargetPath . $folder_id . '/' . $filefix . $value_name, $saveTargetPath . $folder_id . '/' . $filefix . $value_name, 100);
                        }
                        $isExist = BeneficiaryImages::where('user_id', $folder_id)->where('file', $value_name)->count();
                        if ($isExist == 0) {
                            $addteam = new BeneficiaryImages();
                            $addteam->user_id = $folder_id;
                            $addteam->file = $filefix . $value_name;
                            $addteam->meta = $metadata[$key];
                            $addteam->file_for = 'id_proof';
                            $addteam->type = $fileType;
                            $addteam->save();
                        }
                    }
                }

                $filefix = 'repo_';
                $metadata = $req->meta_reportfile;
                $getFiles = $req->reportfile;
                if (isset($getFiles)  && count($getFiles) > 0) {
                    foreach ($getFiles as $key => $value_name) {
                        $fileType = 'file';
                        if (file_exists(ABS_PATH . 'Temp/' . $value_name)) {
                            File::move(ABS_PATH . 'Temp/' . $value_name, $saveTargetPath . $folder_id . '/' . $filefix . $value_name);
                        }
                        if (file_exists(ABS_PATH . 'Temp/Thumb/' . $value_name)) {
                            File::move(ABS_PATH . 'Temp/Thumb/' . $value_name, $saveTargetPath . $folder_id . '/Thumb/' . $filefix . $value_name);
                            $fileType = 'img';
                        }
                        if (file_exists($saveTargetPath . $folder_id . '/' . $filefix . $value_name)) {
                            ImageHelper::resize_crop_image(900, 600, $saveTargetPath . $folder_id . '/' . $filefix . $value_name, $saveTargetPath . $folder_id . '/' . $filefix . $value_name, 100);
                        }
                        $isExist = BeneficiaryImages::where('user_id', $folder_id)->where('file', $value_name)->count();
                        if ($isExist == 0) {
                            $addteam = new BeneficiaryImages();
                            $addteam->user_id = $folder_id;
                            $addteam->file = $filefix . $value_name;
                            $addteam->meta = $metadata[$key];
                            $addteam->file_for = 'report';
                            $addteam->type = $fileType;
                            $addteam->save();
                        }
                    }
                }
                
                $saveTargetPath = ABS_PATH . 'Users/';
                $folder_id = $userid;
                if (!File::exists($saveTargetPath . $folder_id)) {
                    File::makeDirectory($saveTargetPath . $folder_id, 0755, true);
                    File::makeDirectory($saveTargetPath . $folder_id . '/Thumb', 0755, true);
                } 
                $filefix = 'profile_';
                $fileType = 'file';
                $metadata = $req->meta_photofile;
                $getFiles = $req->photofile;
                if (isset($getFiles)  && count($getFiles) > 0) {
                    foreach ($getFiles as $key => $value_name) {
                        if (file_exists(ABS_PATH . 'Temp/' . $value_name)) {
                            File::move(ABS_PATH . 'Temp/' . $value_name, $saveTargetPath . $folder_id . '/' . $filefix . $value_name);
                        }
                        if (file_exists(ABS_PATH . 'Temp/Thumb/' . $value_name)) {
                            File::move(ABS_PATH . 'Temp/Thumb/' . $value_name, $saveTargetPath . $folder_id . '/Thumb/' . $filefix . $value_name);
                            $fileType = 'img';
                        }
                        if (file_exists($saveTargetPath . $folder_id . '/' . $value_name)) {
                            ImageHelper::resize_crop_image(900, 600, $saveTargetPath . $folder_id . '/' . $filefix . $value_name, $saveTargetPath . $folder_id . '/' . $filefix . $value_name, 100);
                        }
                        
                        $isExist = User::where('id', $folder_id)->first();
                        if ($isExist) {
                            $isRemove = User::where('id', $folder_id)->get();
                            if (count($isRemove) > 0) {
                                foreach ($isRemove as $key => $value) {
                                    if($value->profile_pic!=$value_name){
                                        if (file_exists($saveTargetPath . $value->id . '/' . $value->profile_pic)) {
                                            File::delete($saveTargetPath . $value->id . '/' . $value->profile_pic);
                                        }
                                        if (file_exists($saveTargetPath . $value->id . '/Thumb/' . $value->profile_pic)) {
                                            File::delete($saveTargetPath . $value->id . '/Thumb/' . $value->profile_pic);
                                        }
                                    }    
                                 }
                            }
                            $isExist = User::where('id', $folder_id)->update(['profile_pic'=>$filefix.$value_name]);
                        }    
                        /*
                        $isExist = BeneficiaryImages::where('user_id', $folder_id)->where('file', $value_name)->count();
                        if ($isExist == 0) {

                            $isRemove = BeneficiaryImages::where('user_id', $folder_id)->where('file_for','profile')->get();
                            if (count($isRemove) > 0) {
                                foreach ($isRemove as $key => $value) {
                                    if (file_exists($saveTargetPath . $value->user_id . '/' . $value->file)) {
                                        File::delete($saveTargetPath . $value->user_id . '/' . $value->file);
                                    }
                                    if (file_exists($saveTargetPath . $value->user_id . '/Thumb/' . $value->file)) {
                                        File::delete($saveTargetPath . $value->user_id . '/Thumb/' . $value->file);
                                    }
                                    $isRemove = BeneficiaryImages::where('user_id', $folder_id)->where('file', $value->file)->where('file_for','profile')->delete();
                                }
                            }

                            $addteam = new BeneficiaryImages();
                            $addteam->user_id = $folder_id;
                            $addteam->file = $filefix . $value_name;
                            $addteam->meta = '';
                            $addteam->file_for = 'profile';
                            $addteam->type = $fileType;
                            $addteam->save();

                        } */
                    }
                }

                $deletedImage = $req['deletedImage'];
                if (isset($deletedImage)) {
                    $isRemove = BeneficiaryImages::whereIn('id', explode(',', $deletedImage))->get();
                    if (count($isRemove) > 0) {
                        foreach ($isRemove as $key => $value) {
                            if (file_exists($saveTargetPath . $value->user_id . '/' . $value->file)) {
                                File::delete($saveTargetPath . $value->user_id . '/' . $value->file);
                            }
                            if (file_exists($saveTargetPath . $value->user_id . '/Thumb/' . $value->file)) {
                                File::delete($saveTargetPath . $value->user_id . '/Thumb/' . $value->file);
                            }
                        }
                    }
                    $isRemove = BeneficiaryImages::whereIn('id', explode(',', $deletedImage))->delete();
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
            return response(['status' => false, 'msg' => errormsg($e)]);
        }
    }

    public function getBeneficiariesDetail(Request $req, $id = 0)
    {
        try {
            DB::beginTransaction();
            $id = $req->id;
            $isEmailExist = User::where('id', $id)->first();
            if (!$isEmailExist) {
                return response(['code' => 104, 'msg' => 'No Record found', 'result' => (object) []]);
            }
            $userDetails = User::with(['getUserStates', 'getBeneficiaryDetail', 'getBeneficiaryImage',  'getRole', 'getBeneficiaryDetail.getEducation', 'getBeneficiaryDetail.getSupport'])->where('id', $id)->first();
            $userResult = new UserBeneficiaryResource($userDetails);
            return response(['status' => true, 'msg' => "Added Successfully", 'result' => $userResult]);
        } catch (\Exception $e) {
            DB::rollback();
            return response(['status' => false, 'msg' => errormsg($e)]);
        }
    }
}
