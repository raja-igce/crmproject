<?php

namespace App\Http\Controllers\admin;

use App\Helper\AccessHelper;

use App\Models\CampaignImages;
use App\Models\Campaign;
use App\Models\CampaignTeam;
use App\Models\Project;
use App\Models\Tags;

use App\Models\Blog;
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

class BlogController extends Controller
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
            $title = "Blog";
            $label = "Blog";
            $tagList = Tags::where('status', 1)->get();
            $categoryList = BlogCategory::all();
            $orgList = User::where('role_id', 2)->get();
            $projectList = Project::all();
            return view('admin.blog.bloglist', compact('orgList', 'projectList', 'title', 'projects', 'label',  'tagList', 'categoryList'));
        } catch (\Exception $e) {
            return response(['status' => false, 'msg' => errormsg($e)]);
        }
    }
    public function ajaxBlog(Request $request)
    {
        $userstatus = request('userstatus', "");
        $verifystatus = request('verifystatus', "");
        $txtsearch = request('txtsearch', "");
        $projects = request('projects', []);
        $cause_id = request('cause_id', "");
        $organization_id = request('organization_id', "");
        
        $creator = '';
        // $accessAble = AccessHelper::isAccessAble(auth()->user()->id, 'project');
        // if ($accessAble == 'grant_acces') {
        //     $creator = auth()->user()->id;
        // }elseif($accessAble == 'authorized'){

        // }else{
        //     $creator = auth()->user()->id;
        // }
        if(auth()->user()->role_id==2){
            $creator = auth()->user()->id;
        }

        $userResult =   Blog::with(['getCreator', 'getOrganization','getProject'])->where(function ($q) use ($txtsearch) {
            if (trim($txtsearch) != "") {
                $q->where('title', 'like', "%$txtsearch%");
            }
        })->where(function ($q) use ($creator) {
            if ($creator!="") {
                $q->where('creator_id', $creator);
            }
        })->where(function ($q) use ($cause_id) {
            if ($cause_id!="") {
                $q->where('project_id', $cause_id);
            }
        })->where(function ($q) use ($organization_id) {
            if ($organization_id!="") {
                $q->where('organization_id', $organization_id);
            }
        })->orderby('updated_at', 'desc')->paginate($request['pageno']);
         return $userResult;
    }

    public function deleteBlog(Request $request)
    {
        try {
            DB::beginTransaction();
            $type = request('type', "education");
            $id = request('id', 0);

            $accessAble = AccessHelper::isAccessAble(auth()->user()->id, 'blog');
            if ($accessAble == 'denied') {
                return response(['status' => false, 'msg' => 'Permission Denide']);
            }
            Blog::where('id', $id)->delete();
            //CampaignImages::where('campaign_id', $id)->delete();

            DB::commit();
            return response(['status' => true, 'msg' => 'success']);
        } catch (\Exception $e) {
            DB::rollback();
            return response(['status' => false, 'msg' => errormsg($e)]);
        }
    }

    public function addBlog(Request $req)
    {
        try {
            DB::beginTransaction();
            $validator = Validator::make($req->all(), [
                'title' => 'required'
            ]);
            if ($validator->fails()) {
                return response(['code' => 104, 'msg' => 'Error - ' . $validator->errors()->first(), 'result' => (object) []]);
            }
            $accessAble = AccessHelper::isAccessAble(auth()->user()->id, 'blog');
            if ($accessAble == 'denied') {
                return response(['status' => false, 'msg' => 'Permission Denide']);
            }
            $startdate = request('startdate', '');
            $enddate = request('enddate', '');
            $startdate =  Carbon\Carbon::parse($startdate)->format('Y-m-d');
            $enddate =  Carbon\Carbon::parse($enddate)->format('Y-m-d');
            $user_id = request('user_id', '');
            if ($user_id == "" || $user_id == 0) {
                $add = new Blog();
                $msg = "Blog added successfully";
                $slug = new Slug();
                $add->slug = $slug->createBlogSlug($req->title);
                $add->creator_id = auth()->user()->id;
            } else {
                $msg = "Blog updated successfully";
                $add =  Blog::where('id', $user_id)->first();
                $slug = new Slug();
                $newslug = $slug->createBlogSlug($req->title, $user_id);
                if ($add->slug != $newslug) {
                    $slug = new Slug();
                    $add->slug = $slug->createBlogSlug($newslug, $user_id);
                }
            }

            $tags = request('tags', []);
            $tagsDetail = Tags::whereIn('id', $tags)->get(['id', 'title'])->toArray();
           
            $add->organization_id = $category_id = request('org_id', 0);
            $add->project_id = $project_id = request('project_id', 0);
            $add->title = ucfirst(request('title', ''));
            $add->sub_title = ucfirst(request('subtitle', ''));
            $add->description =  request('description', '');
            $add->tags =  json_encode($tagsDetail);

            if ($add->save()) {
                $event_id = $add->id;
                $savepath = ABS_PATH . 'Blog/';
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
                        if (file_exists(ABS_PATH . 'Blog/' . $event_id . '/' . $value)) {
                            ImageHelper::resize_crop_image(900, 600, $savepath . $event_id . '/' . $value, $savepath . $event_id . '/' . $value, 80);
                        }
                        $isExist = Blog::where('id', $add->id)->update(['image' => $value]);
                    }
                }
                if (isset($req['deletedImage'])) {
                    $isRemove = CampaignImages::whereIn('id', explode(',', $req['deletedImage']))->where('campaign_id', $event_id)->get();
                    if (count($isRemove) > 0) {
                        $savepath = ABS_PATH . 'Campaign/';
                        foreach ($isRemove as $key => $value) {
                            File::delete($savepath . $value->prop_id . '/' . $value->image);
                            File::delete($savepath . $value->prop_id . '/Thumb/' . $value->image);
                        }
                    }
                    $isRemove = CampaignImages::whereIn('id', explode(',', $req['deletedImage']))->where('campaign_id', $event_id)->delete();
                }

                $totalRecord = Blog::where('organization_id', $category_id)->count();
                BlogCategory::where('id', $category_id)->update(['blogno' => $totalRecord]);
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
