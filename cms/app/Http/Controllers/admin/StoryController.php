<?php

namespace App\Http\Controllers\admin;

use App\Helper\AccessHelper;
use App\Models\CampaignImages;
use App\Models\Campaign;
use App\Models\CampaignTeam;
use App\Models\Project;
use App\Models\Tags;

use App\Models\Blog;
use App\Models\BlogStory;
use App\Models\BlogCategory;


use App\Helper\ImageHelper;
use App\Helper\Slug;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\campaignListResource;
use Illuminate\Support\Facades\Validator;
use App\Jobs\ProjectCreateMail;

use App\User;
use DB;
use Hash;
use Auth;
use Carbon;
use File;

class StoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request, $type = 'education')
    {
        $accessAble = AccessHelper::isAccessAble(auth()->user()->id, 'blog');
        if ($accessAble == 'denied') {
            return redirect()->route('home');
        }
        try {
            $userSetting[''] = [];
            $title = "Blog Story";
            $label = "Blog Story";

            return view('admin.blog.blogstorylist', compact('title', 'label'));
        } catch (\Exception $e) {
            return response(['status' => false, 'msg' => errormsg($e)]);
        }
    }
    public function ajaxStory(Request $request)
    {
        $userstatus = request('userstatus', "");
        $verifystatus = request('verifystatus', "");
        $txtsearch = request('txtsearch', "");
        $projects = request('projects', []);
        $type = request('type', "education");

        $userResult =   BlogStory::where(function ($q) use ($txtsearch) {
            if (trim($txtsearch) != "") {
                $q->where('name', 'like', "%$txtsearch%");
            }
        })->orderby('updated_at', 'desc')->paginate($request['pageno']);
        //$userResult =  campaignListResource::collection($userResult);
        return $userResult;
    }

    public function deleteStory(Request $request)
    {
        try {
            DB::beginTransaction();
            $type = request('type', "education");
            $id = request('id', 0);


            BlogStory::where('id', $id)->delete();
            //CampaignImages::where('campaign_id', $id)->delete();

            DB::commit();
            return response(['status' => true, 'msg' => 'success']);
        } catch (\Exception $e) {
            DB::rollback();
            return response(['status' => false, 'msg' => errormsg($e)]);
        }
    }

    public function addStory(Request $req)
    {
        try {
            DB::beginTransaction();
            $validator = Validator::make($req->all(), [
                'title' => 'required'
            ]);
            if ($validator->fails()) {
                return response(['code' => 104, 'msg' => 'Error - ' . $validator->errors()->first(), 'result' => (object) []]);
            }

            $startdate = request('startdate', '');
            $enddate = request('enddate', '');
            $startdate =  Carbon\Carbon::parse($startdate)->format('Y-m-d');
            $enddate =  Carbon\Carbon::parse($enddate)->format('Y-m-d');
            $user_id = request('user_id', '');
            if ($user_id == "" || $user_id == 0) {
                $add = new BlogStory();
                $msg = "Blog added successfully";
            } else {
                $msg = "Blog updated successfully";
                $add =  BlogStory::where('id', $user_id)->first();
            }

            $tags = request('tags', []);
            $tagsDetail = Tags::whereIn('id', $tags)->get(['id', 'title'])->toArray();
            $add->creator_id = auth()->user()->id;
            $add->name = ucfirst(request('title', ''));
            $add->description =  request('description', '');

            if ($add->save()) {
                $event_id = $add->id;
                $savepath = ABS_PATH . 'BlogStory/';
                $documents = $req['imagename'];
                if (!File::exists($savepath . $event_id)) {
                    File::makeDirectory($savepath . $event_id, 0755, true);
                    File::makeDirectory($savepath . $event_id . '/Thumb', 0755, true);
                }

                if (isset($req->imagename)  && count($req->imagename) > 0) {
                    foreach ($req->imagename as $key => $value) {
                        if (file_exists(ABS_PATH . 'Temp/' . $value)) {
                            File::move(ABS_PATH . 'Temp/' . $value, $savepath . $event_id . '/' . $value);
                        }
                        if (file_exists(ABS_PATH . 'Temp/Thumb/' . $value)) {
                            File::move(ABS_PATH . 'Temp/Thumb/' . $value, $savepath . $event_id . '/Thumb/' . $value);
                        }
                        if (file_exists(ABS_PATH . 'BlogStory/' . $event_id . '/' . $value)) {
                            ImageHelper::resize_crop_image(900, 600, $savepath . $event_id . '/' . $value, $savepath . $event_id . '/' . $value, 80);
                        }
                        $isExist = BlogStory::where('id', $add->id)->update(['image' => $value]);
                    }
                }
                if (isset($req['deletedImage'])) {
                    // $isRemove = CampaignImages::whereIn('id', explode(',', $req['deletedImage']))->where('campaign_id', $event_id)->get();
                    // if (count($isRemove)>0) {
                    //     $savepath = ABS_PATH.'BlogStory/';
                    //     foreach ($isRemove as $key => $value) {
                    //         File::delete($savepath.$value->prop_id.'/'.$value->image);
                    //         File::delete($savepath.$value->prop_id.'/Thumb/'.$value->image);
                    //     }
                    // }
                    // $isRemove = CampaignImages::whereIn('id', explode(',', $req['deletedImage']))->where('campaign_id', $event_id)->delete();
                }
            }
            DB::commit();

            //dispatch(new ProjectCreateMail($parameter));

            return response(['status' => true, 'msg' => $msg]);
        } catch (\Exception $e) {
            DB::rollback();
            return response(['status' => true, 'msg' => errormsg($e)]);
        }
    }
}
