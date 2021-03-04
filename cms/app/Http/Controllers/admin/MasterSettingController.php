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
use App\Models\Tags;


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

class MasterSettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request, $type = 'education')
    {


        if (auth()->user()->role_id != '0') {
            return redirect()->route('home');
        }

        try {
            $userSetting[''] = [];
            $title = " ";
            $label = '';
            if ($type == 'education') {
                $title = "Education Settings";
                $label = "Education";
            } elseif ($type == 'bloodgroup') {
                $title = "BloodGroup Settings";
                $label = "BloodGroup";
            } elseif ($type == 'causes_interested') {
                $title = "Causes Interested Settings";
                $label = "Causes Interested";
            } elseif ($type == 'institutions') {
                $title = "Institutions Settings";
                $label = "Institutions";
            } elseif ($type == 'language_known') {
                $title = "Language Settings";
                $label = "Causes Interested";
            } elseif ($type == 'occupation') {
                $title = "Causes Interested Settings";
                $label = "Causes Interested";
            } elseif ($type == 'tags') {
                $title = "Tags Settings";
                $label = "Tags";
            }




            return view('admin.masters.settings', compact('title', 'type', 'label'));
        } catch (\Exception $e) {
            return response(['status' => false, 'msg' => errormsg($e)]);
        }
    }
    public function ajaxSetting(Request $request)
    {
        $userstatus = request('userstatus', "");
        $verifystatus = request('verifystatus', "");
        $txtsearch = request('txtsearch', "");
        $type = request('type', "education");
        if ($type == 'education') {
            $userResult =   Education::where(function ($q) use ($txtsearch) {
                if (trim($txtsearch) != "") {
                    $q->where('title', 'like', "%$txtsearch%");
                }
            })->where(function ($q) use ($userstatus) {
                if ($userstatus != "") {
                    $q->where('status', $userstatus);
                }
            })->orderby('updated_at', 'desc')->paginate($request['pageno']);
        } elseif ($type == 'bloodgroup') {
            $userResult =   BloodGroup::where(function ($q) use ($txtsearch) {
                if (trim($txtsearch) != "") {
                    $q->where('title', 'like', "%$txtsearch%");
                }
            })->where(function ($q) use ($userstatus) {
                if ($userstatus != "") {
                    $q->where('status', $userstatus);
                }
            })->orderby('updated_at', 'desc')->paginate($request['pageno']);
        } elseif ($type == 'causes_interested') {
            $userResult =   CausesInterested::where(function ($q) use ($txtsearch) {
                if (trim($txtsearch) != "") {
                    $q->where('title', 'like', "%$txtsearch%");
                }
            })->where(function ($q) use ($userstatus) {
                if ($userstatus != "") {
                    $q->where('status', $userstatus);
                }
            })->orderby('updated_at', 'desc')->paginate($request['pageno']);
        } elseif ($type == 'institutions') {
            $userResult =   Institutions::where(function ($q) use ($txtsearch) {
                if (trim($txtsearch) != "") {
                    $q->where('title', 'like', "%$txtsearch%");
                }
            })->where(function ($q) use ($userstatus) {
                if ($userstatus != "") {
                    $q->where('status', $userstatus);
                }
            })->orderby('updated_at', 'desc')->paginate($request['pageno']);
        } elseif ($type == 'language_known') {
            $userResult =   LanguageKnown::where(function ($q) use ($txtsearch) {
                if (trim($txtsearch) != "") {
                    $q->where('title', 'like', "%$txtsearch%");
                }
            })->where(function ($q) use ($userstatus) {
                if ($userstatus != "") {
                    $q->where('status', $userstatus);
                }
            })->orderby('updated_at', 'desc')->paginate($request['pageno']);
        } elseif ($type == 'occupation') {
            $userResult =   Occupation::where(function ($q) use ($txtsearch) {
                if (trim($txtsearch) != "") {
                    $q->where('title', 'like', "%$txtsearch%");
                }
            })->where(function ($q) use ($userstatus) {
                if ($userstatus != "") {
                    $q->where('status', $userstatus);
                }
            })->orderby('updated_at', 'desc')->paginate($request['pageno']);
        } elseif ($type == 'tags') {
            $userResult =   Tags::where(function ($q) use ($txtsearch) {
                if (trim($txtsearch) != "") {
                    $q->where('title', 'like', "%$txtsearch%");
                }
            })->where(function ($q) use ($userstatus) {
                if ($userstatus != "") {
                    $q->where('status', $userstatus);
                }
            })->orderby('updated_at', 'desc')->paginate($request['pageno']);
        }


        //$userResult =  UserResource::collection($userResult);
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
    public function deleteRecord(Request $request)
    {
        try {
            DB::beginTransaction();
            $type = request('type', "education");
            $id = request('id', 0);
            if ($type == 'education') {
                Education::where('id', $id)->delete();
            } elseif ($type == 'bloodgroup') {
                BloodGroup::where('id', $id)->delete();
            } elseif ($type == 'causes_interested') {
                CausesInterested::where('id', $id)->delete();
            } elseif ($type == 'institutions') {
                Institutions::where('id', $id)->delete();
            } elseif ($type == 'language_known') {
                LanguageKnown::where('id', $id)->delete();
            } elseif ($type == 'occupation') {
                Occupation::where('id', $id)->delete();
            } elseif ($type == 'tags') {
                Tags::where('id', $id)->delete();
            }
            DB::commit();
            return response(['status' => true, 'msg' => 'success']);
        } catch (\Exception $e) {
            DB::rollback();
            return response(['status' => false, 'msg' => errormsg($e)]);
        }
    }

    public function addMasterData(Request $req)
    {
        try {
            DB::beginTransaction();
            $validator = Validator::make($req->all(), [
                'title' => 'required'
            ]);
            if ($validator->fails()) {
                return response(['code' => 104, 'msg' => 'Error - ' . $validator->errors()->first(), 'result' => (object) []]);
            }
            $id = request('user_id', '');
            $title = request('title', '');
            $type = request('type', "education");
            $status = request('status', 0);
            if ($type == 'education') {
                $isExist = Education::where(function ($q) use ($id) {
                    if ($id != "") {
                        $q->where('id', '!=', $id);
                    }
                })->where('title', $title)->first();
                if ($isExist) {
                    return response(['code' => 104, 'msg' => 'Title Already Added', 'result' => (object) []]);
                }
                if ($id == "") {
                    $add = new Education();
                    $msg = "Education added Successfully";
                } else {
                    $add = Education::where('id', $id)->first();
                    $msg = "Education updated Successfully";
                }
                $add->title = $title;
                $add->status = $status;
                $add->save();
            } elseif ($type == 'bloodgroup') {
                $isExist = BloodGroup::where(function ($q) use ($id) {
                    if ($id != "") {
                        $q->where('id', '!=', $id);
                    }
                })->where('title', $title)->first();
                if ($isExist) {
                    return response(['code' => 104, 'msg' => 'Title Already Added', 'result' => (object) []]);
                }
                if ($id == "") {
                    $add = new BloodGroup();
                    $msg = "BloodGroup added Successfully";
                } else {
                    $add = BloodGroup::where('id', $id)->first();
                    $msg = "BloodGroup updated Successfully";
                }
                $add->title = $title;
                $add->status = $status;
                $add->save();
            } elseif ($type == 'causes_interested') {
                $isExist = CausesInterested::where(function ($q) use ($id) {
                    if ($id != "") {
                        $q->where('id', '!=', $id);
                    }
                })->where('title', $title)->first();
                if ($isExist) {
                    return response(['code' => 104, 'msg' => 'Title Already Added', 'result' => (object) []]);
                }
                if ($id == "") {
                    $add = new CausesInterested();
                    $msg = "BloodGroup added Successfully";
                } else {
                    $add = CausesInterested::where('id', $id)->first();
                    $msg = "BloodGroup updated Successfully";
                }
                $add->title = $title;
                $add->status = $status;
                $add->save();
            } elseif ($type == 'institutions') {
                $isExist = Institutions::where(function ($q) use ($id) {
                    if ($id != "") {
                        $q->where('id', '!=', $id);
                    }
                })->where('title', $title)->first();
                if ($isExist) {
                    return response(['code' => 104, 'msg' => 'Title Already Added', 'result' => (object) []]);
                }
                if ($id == "") {
                    $add = new Institutions();
                    $msg = "Institution added Successfully";
                } else {
                    $add = Institutions::where('id', $id)->first();
                    $msg = "Institution updated Successfully";
                }
                $add->title = $title;
                $add->status = $status;
                $add->save();
            } elseif ($type == 'language_known') {
                $isExist = LanguageKnown::where(function ($q) use ($id) {
                    if ($id != "") {
                        $q->where('id', '!=', $id);
                    }
                })->where('title', $title)->first();
                if ($isExist) {
                    return response(['code' => 104, 'msg' => 'Title Already Added', 'result' => (object) []]);
                }
                if ($id == "") {
                    $add = new LanguageKnown();
                    $msg = "Language added Successfully";
                } else {
                    $add = LanguageKnown::where('id', $id)->first();
                    $msg = "Language updated Successfully";
                }
                $add->title = $title;
                $add->status = $status;
                $add->save();
            } elseif ($type == 'occupation') {
                $isExist = Occupation::where(function ($q) use ($id) {
                    if ($id != "") {
                        $q->where('id', '!=', $id);
                    }
                })->where('title', $title)->first();
                if ($isExist) {
                    return response(['code' => 104, 'msg' => 'Title Already Added', 'result' => (object) []]);
                }
                if ($id == "") {
                    $add = new Occupation();
                    $msg = "Occupation added Successfully";
                } else {
                    $add = Occupation::where('id', $id)->first();
                    $msg = "Occupation updated Successfully";
                }
                $add->title = $title;
                $add->status = $status;
                $add->save();
            } elseif ($type == 'tags') {
                $isExist = Tags::where(function ($q) use ($id) {
                    if ($id != "") {
                        $q->where('id', '!=', $id);
                    }
                })->where('title', $title)->first();
                if ($isExist) {
                    return response(['code' => 104, 'msg' => 'Title Already Added', 'result' => (object) []]);
                }
                if ($id == "") {
                    $add = new Tags();
                    $msg = "Tag added Successfully";
                } else {
                    $add = Tags::where('id', $id)->first();
                    $msg = "Tag updated Successfully";
                }
                $add->title = $title;
                $add->status = $status;
                $add->save();
            }


            DB::commit();
            return response(['status' => true, 'msg' => $msg]);
        } catch (\Exception $e) {
            DB::rollback();
            return response(['status' => true, 'msg' => errormsg($e)]);
        }
    }
}
