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
use App\Models\Contact;
use App\Models\ExpenseCategory;



use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\contactListResource;
use Illuminate\Support\Facades\Validator;
use App\Jobs\ProjectCreateMail;

use App\User;
use DB;
use Hash;
use Auth;
use Carbon;

class ContactController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request, $type = 'education')
    {
        try {
            $userSetting[''] = [];
            $title = "Contact";
            $label = "Contact";

            return view('admin.contact.index', compact('title', 'label'));
        } catch (\Exception $e) {
            return response(['status' => false, 'msg' => errormsg($e)]);
        }
    }
    public function ajaxContact(Request $request)
    {
        $txtsearch = $request->txtsearch;
        $userstatus = $request->userstatus;

        $userResult =   Contact::where('user_id', auth()->user()->id)->where(function ($q) use ($txtsearch) {
            if (trim($txtsearch) != "") {
                $q->orWhere('name', 'like', "$txtsearch%");
                $q->orWhere('email', 'like', "%$txtsearch%");
                $q->orWhere('phone', 'like', "$txtsearch%");
                $q->orWhere('designation', 'like', "$txtsearch%");
            }
        })->where(function ($q) use ($userstatus) {
            if (trim($userstatus) != "") {
                $q->Where('type', 'like', "$userstatus%");
            }
        })->orderby('updated_at', 'desc')->paginate($request['pageno']);
        $userResult =  contactListResource::collection($userResult);
        return $userResult;
    }

    public function deleteContact(Request $request)
    {
        try {
            DB::beginTransaction();
            $type = request('type', "education");
            $id = request('id', 0);

            Contact::where('id', $id)->delete();

            DB::commit();
            return response(['status' => true, 'msg' => 'success']);
        } catch (\Exception $e) {
            DB::rollback();
            return response(['status' => false, 'msg' => errormsg($e)]);
        }
    }

    public function addContact(Request $req)
    {
        try {
            DB::beginTransaction();
            $validator = Validator::make($req->all(), [
                'email' => 'required'
            ]);
            if ($validator->fails()) {
                return response(['code' => 104, 'msg' => 'Error - ' . $validator->errors()->first(), 'result' => (object) []]);
            }


            $user_id = request('user_id', '');
            if ($user_id == "" || $user_id == 0) {
                $msg = "Conatct added successfully";
                $add = new Contact();
            } else {
                $msg = "Conatct updated successfully";
                $add =  Contact::where('id', $user_id)->first();
            }
            $add->user_id =  auth()->user()->id;
            $add->name =  request('contact_name', '');
            $add->email =  request('email', '');
            $add->phone =  request('phone', '');
            $add->designation =  request('designation', '');
            $add->type =  request('type', '');
            $add->save();
            DB::commit();
            $parameter['id'] = $add->id;

            return response(['status' => true, 'msg' => $msg]);
        } catch (\Exception $e) {
            DB::rollback();
            return response(['status' => true, 'msg' => errormsg($e)]);
        }
    }
}
