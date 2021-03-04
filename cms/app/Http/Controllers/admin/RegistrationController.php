<?php
namespace App\Http\Controllers\admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\admin\CommonController;
use App\Jobs\SendWelcomeMail;
use App\Models\Organization;
use App\Models\Volunteer;
use App\User;
use App\Models\Verification;
use DB;
use Hash;
use Auth;
use Mail;

use Guzzle\Http\Client;

class RegistrationController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function logins()
    {
        return view('auth.applicationLogin');
    }

    public function termscondition()
    {
        return view('auth.termscondition');
    }

    public function index()
    {
        return view('auth.applicationRegister');
    }
    public function forgotpassword(Request $request)
    {
        $method = $request->method();
        if ($request->isMethod('post')) {
            try {
                $phone = request('inputEmail', '');
                $type = request('type', 'email');
                if ($type == 'email') {
                    $isExist = User::where('phone', $phone)->first();
                    if ($isExist) {
                        return response(['status' => true, 'msg' => "Registraion link sent to your email"]);
                    } else {
                        return response(['status' => false, 'msg' => "Email not registered"]);
                    }
                }
                if ($type == 'phone') {
                    $isExist = User::where('phone', $phone)->first();
                    if ($isExist) {
                        $otp = rand(1000, 9999);
                        Verification::where('phone', $phone)->delete();
                        $add = new Verification();
                        $add->phone = $phone;
                        $add->code = $otp;
                        $add->save();
                        $msg = "Hi, Your OTP for forgot password with iNNER-EYE is $otp.  Use this to validate your login; and please don't share with anyone.";
                        if (ActiveSMS) {
                            CommonController::SendSMS($phone, $msg);
                        }

                        return response(['status' => true, 'msg' => "New Password sent on your phone "]);
                    } else {
                        return response(['status' => false, 'msg' => "Phone not registered "]);
                    }
                }

                return response(['status' => true, 'msg' => ""]);
            } catch (\Exception $e) {
                return response(['status' => false, 'msg' => errormsg($e)]);
            }
            exit();
        }
        return view('auth.applicationForgot');
    }

    public function welcome()
    {
        return view('auth.welcome');
    }

    public function verifyOTP(Request $request)
    {
        try {
            $phone = request('txtPhone', '');
            $otp = request('txtOTP', '');
            $isExist = Verification::where('phone', $phone)->where('code', $otp)->first();
            if ($isExist) {
                return response(['status' => true, 'msg' => "Verify your OTP"]);
            } else {
                return response(['status' => false, 'msg' => "Invalid OTP"]);
            }
        } catch (\Exception $e) {
            return response(['status' => false, 'msg' => errormsg($e)]);
        }
    }

    public function loginApp(Request $request)
    {
        try {
            $phone = request('inputPhone', '');
            $password = request('inputPassword', '');
            $type = request('type', '');
            $role_id = 0;
            if ($type == "volunteer") {
                $role_id = 1;
            }
            if ($type == "organization") {
                $role_id = 2;
            }

            $userData = User::where('phone', $phone)->where('role_id', $role_id)->first();
            if ($userData) {
                if (Hash::check($password, $userData->password)) {
                    $code = false;
                    if($userData->status==0){
                        $code = true;
                        Auth::loginUsingId($userData->id);
                        User::where('id',$userData->id)->update(['online'=>1]);
                        $message = "Login Successfully. Please complete your profile.";
                    }elseif($userData->password==2){
                        $message = "Your account Reject by admin. Please contact to admin";
                    }else{
                        Auth::loginUsingId($userData->id);
                        User::where('id',$userData->id)->update(['online'=>1]);
                        $message = "Login Successfully";
                        $code = true;
                    }
                    
                } else {
                    $message = "Password not matched";
                    $code = false;
                }
                return response(['status' => $code, 'msg' => $message]);
            } else {
                return response(['status' => false, 'msg' => "User not registered as " . ucfirst($type)]);
            }
        } catch (\Exception $e) {
            return response(['status' => false, 'msg' => errormsg($e)]);
        }
    }
    public function updatePassword(Request $request)
    {
        try {

            $newpassword = rand(1111, 9999);
            $txtOTP = request('txtOTP', '');
            $phone = request('txtPhone', '');

            $phoneExist = Verification::where('code', $txtOTP)->where('phone', $phone)->first();
            if ($phoneExist) {
                User::where('phone', $phoneExist->phone)->update(['password' => Hash::make($newpassword)]);

                $msg = "Hi, $newpassword is a new password to login your iNNER-EYE account; please use this to login and update it as early as possible";
                if (ActiveSMS) {
                    CommonController::SendSMS($phoneExist->phone, $msg);
                }

                Verification::where('code', $txtOTP)->delete();
                return response(['status' => true, 'msg' => "Verify your OTP"]);
            } else {
                return response(['status' => false, 'msg' => "Invalid OTP"]);
            }
        } catch (\Exception $e) {
            return response(['status' => false, 'msg' => errormsg($e)]);
        }
    }
    public function verifyForm(Request $request)
    {
        try {

            $type = ucfirst(request('type', 'Volunteer'));
            $emailExist = User::where('email', request('inputEmail', ''))->first();
            $phoneExist = User::where('phone', request('inputPhone', ''))->first();
            if ($emailExist) {
                return response(['status' => false, 'msg' => "Email already used by other."]);
            }
            if ($phoneExist) {
                return response(['status' => false, 'msg' => "Phone already used by other."]);
            }

            $otp = rand(1000, 9999);
            $msg = "Dear $type, Your OTP for registration with iNNER-EYE is $otp. Use this to validate your login; and please don't share with anyone.";

            $phone = request('inputPhone', '');
            Verification::where('phone', $phone)->delete();
            $add = new Verification();
            $add->phone = $phone;
            $add->code = $otp;
            $add->save();
            if (ActiveSMS) {
                CommonController::SendSMS($phone, $msg);
            }


            return response(['status' => true, 'msg' => "Verify your OTP"]);
        } catch (\Exception $e) {
            return response(['status' => false, 'msg' => errormsg($e)]);
        }
    }
    public function addUser(Request $request)
    {
        DB::beginTransaction();
        try {
            
            //organization  volunteer
            $type = request('type', '');
            $role_id = "-11";
            $remember_token = "";
            if ($type == "organization") {
                $role_id = "2";
                $position = "Organization";
            }
            if ($type == "volunteer") {
                $role_id = "1";
                $position = "Volunteer";
            }

            $phone = request('inputPhone', '');
            $emailExist = User::where('email', request('inputEmail', ''))->first();
            $phoneExist = User::where('phone', request('inputPhone', ''))->first();
            if ($emailExist) {
                return response(['status' => false, 'msg' => "Email already used by other."]);
            }
            if ($phoneExist) {
                return response(['status' => false, 'msg' => "Phone already used by other."]);
            }
            Verification::where('phone', $phone)->delete();

            /* add user login */
            $password = request('inputPassword', '123123');
            $addUser = new User();
            $addUser->first_name = $firstname = request('inputName', '');
            $addUser->last_name = $lastname = request('last_name', '');
            $addUser->email = $email = request('inputEmail', '');
            $addUser->role_id = $role_id;
            $addUser->position = $position;
            $addUser->phone = $phone = request('inputPhone', '');
            $addUser->profile_pic = request('profile_pic', '');
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
            $addUser->status = 0;
            $addUser->email_verified_at = null;
            $addUser->password = Hash::make($password);
            $addUser->remember_token = $remember_token = Hash::make($email . rand(0000, 9999));
            if ($addUser->save()) {
                $userid = $addUser->id;
                /*
                if($role_id==1){
                    $addVolunteer = new Volunteer();
                    $addVolunteer->user_id = $userid;
                    $addVolunteer->save();
                }
                if($role_id==2){
                    $addVolunteer = new Organization();
                    $addVolunteer->user_id = $userid;
                    $addVolunteer->save();
                }
                */
                
                 
                $type = ucfirst($type);
                $controller = \App::make('App\Http\Controllers\admin\PermissionController');
                $controller->addDefaultPermission($userid);
                $msg = "Dear $type, Your registration is successfully submitted. Please check your e-Mail/SMS for login details. Thank you for registering with iNNER-EYE & we're proud to have you as a part of the Foundation.";
                if (ActiveSMS){
                    CommonController::SendSMS($phone, $msg);
                }
                $content = "Welcome to innerEye Foundation";
                $line2 = "Dear Mr./Ms. $firstname $lastname,<br><br>
                    Welcome to iNNER-EYE Portal, a one-step to help people who really want help!! .<br><br>
                    Your user id <b>$phone</b> with password <b>$password</b> <br><br>
                    iNNER-EYE is a charitable organization to enable helpless/support-less people to have sustainable Livelihood,
                    Health and Education for progressive individual and social development.";
                $parameter['email'] = $email;
                $parameter['line2'] = $line2;
                $parameter['FromMail'] = FromMail;
                
                Mail::send('mailTemplate.CommonTemplate', ['line1' => $content, 'line2' => $parameter['line2']], function ($message) use ($parameter) {
                    $message->from($parameter['FromMail'], "Registered As Volunteer");
                    $message->subject("Welcome to innerEye!");
                    $message->to($parameter['email'], 'innerEye');
                });
            }
            /* end of user login */
             DB::commit();
            return response(['status' => true, 'msg' => "Verify your OTP"]);
        } catch (\Exception $e) {
            DB::rollback();
            return response(['status' => false, 'msg' => errormsg($e)]);
        }
    }
}
