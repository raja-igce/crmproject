<?php
namespace App\Http\Controllers\Front;

use App\Models\CampaignImages;
use App\Models\Campaign;
use App\Models\CampaignTeam;
use App\Models\CampaignContact;
use App\Models\CampaignCollection;
use App\Models\Project;
use App\Models\Tags;
use App\Models\CampaignComment;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\BlogStory;
use App\Models\BlogComment;


use App\Helper\ImageHelper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\campaignListResource;
use App\Http\Resources\commentBlogListResource;

use Illuminate\Support\Facades\Validator;
use App\Jobs\ProjectCreateMail;
use App\Jobs\ContactCampaignerMail;
use App\Jobs\DonationInvoiceMail;


use App\User;
use DB;
use Hash;
use Auth;
use Carbon;
use File;
use Razorpay\Api\Api;

class BlogController extends Controller
{
    public function __construct()
    {
        ///$this->middleware('auth');
    }


    public function addBlogComment(Request $request)
    {
        try {
            $userResult = [];
            $add = new BlogComment;
            $userid = isset(auth()->user()->id)?auth()->user()->id:2;
            $add->blog_id= $blog_id = request("campaign_id", 0);
            $add->comment=request("txtComment", '');
            $add->email=request("txtemail", '');
            $add->name=request("txtname", '');

            $add->user_id=$userid;
            if ($add->save()) {
            }

            $commentList = BlogComment::where('blog_id', $blog_id)->orderby('created_at', 'desc')->get();
            $commentList =  commentBlogListResource::collection($commentList);
            return response(array('code' => 200,'commentList'=>$commentList,'status' => true, 'message' => 'Thanks! Comment.','userResult'=>$userResult));
        } catch (\Exception $e) {
            return response(array('code' => 1044,'commentList'=>[], 'status' => false, 'message' => $e->getMessage()." Try Again!" ));
        }
    }
    public function blogDetails(Request $request,$slug)
    {
        try {
            $userSetting[''] = [];
            $title = "Blog";
            $label = "Blog";
            $tagList = Tags::where('status', 1)->get();
            //$categoryList = BlogCategory::all();
            $categoryList = Project::whereHas('getBlog')->with('getBlog')->get();
            $blogList = Blog::skip(0)->take(3)->orderby('id','desc')->get();
            $blogData = Blog::with(['getCreator','getProject'])->where('slug',$slug)->get();
            if(!$blogData){
                return redirect('blog');
            }
            $currentID = $blogData[0]->id;
            $nextblog = Blog::where('id','>',$currentID)->skip(0)->take(1)->orderby('id','asc')->get(['id','title','slug']);
            $prevblog = Blog::where('id','<',$currentID)->skip(0)->take(1)->orderby('id','desc')->get(['id','title','slug']);
            $storyList = BlogStory::skip(0)->take(5)->orderby('id','desc')->get();


            $commentList = BlogComment::with('getSender')->where('blog_id', $currentID)->orderby('created_at', 'desc')->get();
            $commentList =  commentBlogListResource::collection($commentList);

            return view('front.blogDetails', compact('commentList','storyList','title','nextblog','prevblog', 'tagList','categoryList','blogList','blogData'));
        } catch (\Exception $e) {
            return response(['status'=>false,'msg'=>errormsg($e)]);
        }
    }
    public function index(Request $request,$reqtype=null,$reqdata=null)
    {
        try {
            $userSetting[''] = [];
            $title = "Blog";
            $label = "Blog";
            $tagList = Tags::where('status', 1)->get();
            //$categoryList = BlogCategory::all();
            $categoryList = Project::whereHas('getBlog')->with('getBlog')->get();
            
            $blogList = Blog::skip(0)->take(3)->orderby('id','desc')->get();
            $storyList = BlogStory::skip(0)->take(5)->orderby('id','desc')->get();
            return view('front.blog', compact('title','storyList', 'tagList', 'categoryList','blogList','reqtype','reqdata'));
        }catch (\Exception $e){
            return response(['status'=>false,'msg'=>errormsg($e)]);
        }
    }
    public function ajaxBlog(Request $request)
    {
        $userstatus = request('userstatus', "");
        $reqtype = request('reqtype', null);
        $reqdata = request('reqdata', null);
        $verifystatus = request('verifystatus', "");
        $txtsearch = request('txtsearch', "");
        $projects = request('projects', []);
        $category = request('category', "");
        $tag = request('tag', "");

        if($reqtype=='category'){
          $categorydata =  Project::where('slug',$reqdata)->first();
          $category=$categorydata['id'];
        }
        if($reqtype=='tag'){
          $tag = $reqdata;
        }
        if($reqtype=='search'){
          $txtsearch = $reqdata;
        }


        $userResult=   Blog::with(['getCreator','getProject'])->where(function ($q) use ($txtsearch) {
            if (trim($txtsearch)!="") {
              $q->where('title', 'like', "%$txtsearch%");
              $q->orWhere('description', 'like', "%$txtsearch%");
            }
        })->where(function ($q) use ($category){
            if ($category!="") {
                $q->where('project_id', $category);
            }
        })->where(function ($q) use ($tag){
            if ($tag!="") {
                $q->where('tags','like' ,"%$tag%");
            }
        })->orderby('created_at', 'desc')->paginate($request['pagenos']);
        return $userResult;
    }

    public function frontBlog()
    {
        $userResult=   Blog::with(['getCreator','getProject'])->orderby('created_at', 'desc')->paginate(10);
        return $userResult;
    }

}
