 @extends('layouts.main')
 @section('appcss')
 <link rel="stylesheet" type="text/css" href="{{env('APP_URL')}}public/app-assets/vendors/css/tables/datatable/datatables.min.css">
 <link rel="stylesheet" type="text/css" href="{{env('APP_URL')}}public/app-assets/vendors/css/tables/datatable/select.dataTables.min.css">
 <link rel="stylesheet" type="text/css" href="{{env('APP_URL')}}public/app-assets/css/pages/data-list-view.css">
 <link rel="stylesheet" type="text/css" href="{{env('APP_URL')}}public/app-assets/vendors/css/forms/select/select2.min.css">
 <link rel="stylesheet" type="text/css" href="{{env('APP_URL')}}public/app-assets/css/plugins/forms/validation/form-validation.css">
 <link rel="stylesheet" type="text/css" href="{{env('APP_URL')}}public/app-assets/css/plugins/forms/wizard.css">
 <link rel="stylesheet" type="text/css" href="{{env('APP_URL')}}public/app-assets/vendors/css/extensions/toastr.css">
 <link rel="stylesheet" type="text/css" href="{{env('APP_URL')}}public/assets/css/custome.css">
 <link rel="stylesheet" type="text/css" href="{{env('APP_URL')}}public/assets/css/custome_select.css">

 <link rel="stylesheet" type="text/css" href="{{env('APP_URL')}}public/app-assets/vendors/css/editors/quill/katex.min.css">
 <link rel="stylesheet" type="text/css" href="{{env('APP_URL')}}public/app-assets/vendors/css/editors/quill/monokai-sublime.min.css">
 <link rel="stylesheet" type="text/css" href="{{env('APP_URL')}}public/app-assets/vendors/css/editors/quill/quill.snow.css">
 <link rel="stylesheet" type="text/css" href="{{env('APP_URL')}}public/app-assets/vendors/css/editors/quill/quill.bubble.css">
 <link rel="stylesheet" type="text/css" href="{{env('APP_URL')}}public/app-assets/css/pages/users.css">
 @stop
 @section('content')
 <div class="content-wrapper" id="UserVueApp">
     <div class="content-header row">
         <div class="content-header-left col-md-9 col-12 mb-2">
             <div class="row breadcrumbs-top">
                 <div class="col-12">
                     <h2 class="content-header-title float-left mb-0">Profile</h2>
                     <div class="breadcrumb-wrapper col-12">
                         <ol class="breadcrumb">
                             <li class="breadcrumb-item"><a href="index.html">Home</a>
                             </li>
                             <li class="breadcrumb-item"><a href="#">Pages</a>
                             </li>
                             <li class="breadcrumb-item active">Profile
                             </li>
                         </ol>
                     </div>
                 </div>
             </div>
         </div>
         <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
             <div class="form-group breadcrum-right">
                 <div class="dropdown">
                     <button class="btn-icon btn btn-primary btn-round btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="feather icon-settings"></i></button>
                     <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="#">Chat</a><a class="dropdown-item" href="#">Email</a><a class="dropdown-item" href="#">Calendar</a></div>
                 </div>
             </div>
         </div>
     </div>
     <div class="content-body">
         <div id="user-profile">
             <div class="row">
                 <div class="col-12">
                     <div class="profile-header mb-2">
                         <div class="relative">
                             <div class="cover-container">
                                 <img class="img-fluid bg-cover rounded-0 w-100" src="{{env('APP_URL')}}public/app-assets/images/profile/user-uploads/cover.jpg" alt="User Profile Image">
                             </div>
                             <div class="profile-img-container d-flex align-items-center justify-content-between">
                                 <img src="{{env('APP_URL')}}public/app-assets/images/profile/user-uploads/user-13.jpg" class="rounded-circle img-border box-shadow-1" alt="Card image">
                                 <div class="float-right">
                                     <button type="button" class="btn btn-icon btn-icon rounded-circle btn-primary mr-1">
                                         <i class="feather icon-edit-2"></i>
                                     </button>
                                     <button type="button" class="btn btn-icon btn-icon rounded-circle btn-primary">
                                         <i class="feather icon-settings"></i>
                                     </button>
                                 </div>
                             </div>
                         </div>
                         <div class="d-flex justify-content-end align-items-center profile-header-nav">
                             <nav class="navbar navbar-expand-sm w-100 pr-0">
                                 <button class="navbar-toggler pr-0" type="button" data-toggle="collapse" data-target="navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                     <span class="navbar-toggler-icon"><i class="feather icon-align-justify"></i></span>
                                 </button>
                                 <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                     <ul class="navbar-nav justify-content-around w-75 ml-sm-auto">
                                         <li class="nav-item px-sm-0">
                                             <a href="#" class="nav-link font-small-3">Timeline</a>
                                         </li>
                                         <li class="nav-item px-sm-0">
                                             <a href="#" class="nav-link font-small-3">Campaign</a>
                                         </li>
                                         <li class="nav-item px-sm-0">
                                             <a href="#" class="nav-link font-small-3">Project</a>
                                         </li>
                                         <li class="nav-item px-sm-0">
                                             <a href="#" class="nav-link font-small-3">Task</a>
                                         </li>
                                         <li class="nav-item px-sm-0">
                                             <a href="#" class="nav-link font-small-3">Event</a>
                                         </li>
                                         <li class="nav-item px-sm-0">
                                             <a href="#" class="nav-link font-small-3">Blog</a>
                                         </li>
                                     </ul>
                                 </div>
                             </nav>
                         </div>
                     </div>
                 </div>
             </div>
             <section id="profile-info">
                 <div class="row">
                     <div class="col-lg-3 col-12">
                         <div class="card">
                             <div class="card-header">
                                 <h4>About</h4>
                                 <i class="feather icon-more-horizontal cursor-pointer"></i>
                             </div>
                              <div class="card-body">
                                 <p>@{{userDetail.first_name}} @{{userDetail.last_name}} Tart I love sugar plum I love oat cake. Sweet roll caramels I love jujubes. Topping cake wafer.</p>
                                 <div class="mt-1">
                                     <h6 class="mb-0">Joined:</h6>
                                     <p>@{{userDetail.created_at}}</p>
                                 </div>
                                 <div class="mt-1">
                                     <h6 class="mb-0">Lives:</h6>
                                     <p>@{{userDetail.city}}, @{{userDetail.state}}</p>
                                 </div>
                                 <div class="mt-1">
                                     <h6 class="mb-0">Email:</h6>
                                     <p>@{{userDetail.email}}</p>
                                 </div>
                                 <div class="mt-1" v-if="userDetail.phone">
                                     <h6 class="mb-0">Phone:</h6>
                                     <p>@{{userDetail.phone}} </p>
                                 </div>
                                 <div class="mt-1" v-if="userDetail.eduction">
                                     <h6 class="mb-0">Eduction:</h6>
                                     <p>@{{userDetail.eduction}} </p>
                                 </div>
                                 <div class="mt-1" v-if="userDetail.institution">
                                     <h6 class="mb-0">Institution:</h6>
                                     <p>@{{userDetail.institution}} </p>
                                 </div>
                                 <div class="mt-1" v-if="userDetail.occupation">
                                     <h6 class="mb-0">Occupation:</h6>
                                     <p>@{{userDetail.occupation}} </p>
                                 </div>


                                 <div class="mt-1">
                                       <a :href="userDetail.fb_link" target="_blank">
                                             <button type="button" class="btn btn-sm btn-icon btn-primary mr-25 p-25">
                                               <i class="feather icon-facebook"></i>
                                             </button>
                                       </a>
                                       <a :href="userDetail.twitter_link"  target="_blank">
                                             <button type="button" class="btn btn-sm btn-icon btn-primary mr-25 p-25">
                                             <i class="feather icon-twitter"></i></button>
                                       </a>
                                       <a :href="userDetail.insta_link"  target="_blank">
                                             <button type="button" class="btn btn-sm btn-icon btn-primary p-25">
                                                 <i class="feather icon-instagram"></i>
                                             </button>
                                       </a>
                                 </div>
                             </div>
                         </div>
                         <div class="card">
                             <div class="card-header">
                                 <h4 class="card-title">Suggested Pages</h4>
                             </div>
                             <div class="card-body suggested-block">
                                 <div class="d-flex justify-content-start align-items-center mb-1">
                                     <div class="avatar mr-50">
                                         <img src="{{env('APP_URL')}}public/app-assets/images/profile/pages/page-09.jpg" alt="avtar img holder" height="35" width="35">
                                     </div>
                                     <div class="user-page-info">
                                         <p>Rockose</p>
                                         <span class="font-small-2">Company</span>
                                     </div>
                                     <div class="ml-auto"><i class="feather icon-star"></i></div>
                                 </div>
                                 <div class="d-flex justify-content-start align-items-center mb-1">
                                     <div class="avatar mr-50">
                                         <img src="{{env('APP_URL')}}public/app-assets/images/profile/pages/page-08.jpg" alt="avtar img holder" height="35" width="35">
                                     </div>
                                     <div class="user-page-info">
                                         <p>The Devil's</p>
                                         <span class="font-small-2">Clothing Store</span>
                                     </div>
                                     <div class="ml-auto"><i class="feather icon-star"></i></div>
                                 </div>
                                 <div class="d-flex justify-content-start align-items-center mb-1">
                                     <div class="avatar mr-1">
                                         <img src="{{env('APP_URL')}}public/app-assets/images/profile/pages/page-03.jpg" alt="avtar img holder" height="35" width="35">
                                     </div>
                                     <div class="user-page-info">
                                         <p>The Magician</p>
                                         <span class="font-small-2">Public Figure</span>
                                     </div>
                                     <div class="ml-auto"><i class="feather icon-star"></i></div>
                                 </div>
                                 <div class="d-flex justify-content-start align-items-center mb-1">
                                     <div class="avatar mr-50">
                                         <img src="{{env('APP_URL')}}public/app-assets/images/profile/pages/page-02.jpg" alt="avtar img holder" height="35" width="35">
                                     </div>
                                     <div class="user-page-info">
                                         <p>AC/DC</p>
                                         <span class="font-small-2">Music</span>
                                     </div>
                                     <div class="ml-auto"><i class="feather icon-star"></i></div>
                                 </div>
                                 <div class="d-flex justify-content-start align-items-center mb-1">
                                     <div class="avatar mr-50">
                                         <img src="{{env('APP_URL')}}public/app-assets/images/profile/pages/page-07.jpg" alt="avtar img holder" height="35" width="35">
                                     </div>
                                     <div class="user-page-info">
                                         <p>Eat Hard</p>
                                         <span class="font-small-2">Restaurant / Bar</span>
                                     </div>
                                     <div class="ml-auto"><i class="feather icon-star"></i></div>
                                 </div>
                                 <div class="d-flex justify-content-start align-items-center mb-1">
                                     <div class="avatar mr-50">
                                         <img src="{{env('APP_URL')}}public/app-assets/images/profile/pages/page-04.jpg" alt="avtar img holder" height="35" width="35">
                                     </div>
                                     <div class="user-page-info">
                                         <p>B4B</p>
                                         <span class="font-small-2">Beauty Store</span>
                                     </div>
                                     <div class="ml-auto"><i class="feather icon-star"></i></div>
                                 </div>
                                 <div class="d-flex justify-content-start align-items-center mb-1">
                                     <div class="avatar mr-50">
                                         <img src="{{env('APP_URL')}}public/app-assets/images/profile/pages/page-05.jpg" alt="avtar img holder" height="35" width="35">
                                     </div>
                                     <div class="user-page-info">
                                         <p>Kylie Jenner</p>
                                         <span class="font-small-2">Public Figure</span>
                                     </div>
                                     <div class="ml-auto"><i class="feather icon-star"></i></div>
                                 </div>
                                 <div class="d-flex justify-content-start align-items-center mb-1">
                                     <div class="avatar mr-50">
                                         <img src="{{env('APP_URL')}}public/app-assets/images/profile/pages/page-01.jpg" alt="avtar img holder" height="35" width="35">
                                     </div>
                                     <div class="user-page-info">
                                         <p>RDJ</p>
                                         <span class="font-small-2">Actor</span>
                                     </div>
                                     <div class="ml-auto"><i class="feather icon-star"></i></div>
                                 </div>
                                 <div class="d-flex justify-content-start align-items-center mb-1">
                                     <div class="avatar mr-50">
                                         <img src="{{env('APP_URL')}}public/app-assets/images/profile/pages/page-06.jpg" alt="avtar img holder" height="35" width="35">
                                     </div>
                                     <div class="user-page-info">
                                         <p>Taylor Swift</p>
                                         <span class="font-small-2">Music</span>
                                     </div>
                                     <div class="ml-auto"><i class="feather icon-star"></i></div>
                                 </div>
                             </div>
                         </div>
                         <div class="card">
                             <div class="card-header">
                                 <h4>Twitter Feeds</h4>
                             </div>
                             <div class="card-body">
                                 <div class="twitter-feed">
                                     <div class="d-flex justify-content-start align-items-center mb-1">
                                         <div class="avatar mr-50">
                                             <img src="{{env('APP_URL')}}public/app-assets/images/portrait/small/avatar-s-12.png" alt="avtar img holder" height="35" width="35">
                                         </div>
                                         <div class="user-page-info">
                                             <p class="text-bold-600 mb-0">Tiana Vercetti</p>
                                             <small>@tiana59</small>
                                             <div class="badge badge-primary badge-pill badge-sm p-0">
                                                 <i class="feather icon-check font-small-1"></i>
                                             </div>
                                         </div>
                                     </div>
                                     <p class="mb-0">I love cookie chupa chups sweet tart apple pie chocolate bar. Jelly-o oat cake chupa chups.</p>
                                     <p class="text-primary">#js #vuejs</p>
                                     <small>12 Dec 2018</small>
                                 </div>
                                 <div class="twitter-feed mt-2">
                                     <div class="d-flex justify-content-start align-items-center mb-1">
                                         <div class="avatar mr-50">
                                             <img src="{{env('APP_URL')}}public/app-assets/images/portrait/small/avatar-s-12.png" alt="avtar img holder" height="35" width="35">
                                         </div>
                                         <div class="user-page-info">
                                             <p class="text-bold-600 mb-0">Tiana Vercetti</p>
                                             <small>@tiana59</small>
                                             <div class="badge badge-primary badge-pill badge-sm p-0">
                                                 <i class="feather icon-check font-small-1"></i>
                                             </div>
                                         </div>
                                     </div>
                                     <p class="mb-0">Carrot cake cake gummies I love I love tiramisu. Biscuit marzipan cookie lemon drops.</p>
                                     <p class="text-primary">#python</p>
                                     <small>11 Dec 2018</small>
                                 </div>
                                 <div class="twitter-feed mt-2">
                                     <div class="d-flex justify-content-start align-items-center mb-1">
                                         <div class="avatar mr-50">
                                             <img src="{{env('APP_URL')}}public/app-assets/images/portrait/small/avatar-s-12.png" alt="avtar img holder" height="35" width="35">
                                         </div>
                                         <div class="user-page-info">
                                             <p class="text-bold-600 mb-0">Tiana Vercetti</p>
                                             <small>@tiana59</small>
                                             <div class="badge badge-primary badge-pill badge-sm p-0">
                                                 <i class="feather icon-check font-small-1"></i>
                                             </div>
                                         </div>
                                     </div>
                                     <p class="mb-0">I love cookie chupa chups sweet tart apple pie chocolate bar. Jelly-o oat cake chupa chups.</p>
                                     <small>10 Dec 2018</small>
                                 </div>
                                 <div class="twitter-feed mt-2">
                                     <div class="d-flex justify-content-start align-items-center mb-1">
                                         <div class="avatar mr-50">
                                             <img src="{{env('APP_URL')}}public/app-assets/images/portrait/small/avatar-s-12.png" alt="avtar img holder" height="35" width="35">
                                         </div>
                                         <div class="user-page-info">
                                             <p class="text-bold-600 mb-0">Tiana Vercetti</p>
                                             <small>@tiana59</small>
                                             <div class="badge badge-primary badge-pill badge-sm p-0">
                                                 <i class="feather icon-check font-small-1"></i>
                                             </div>
                                         </div>
                                     </div>
                                     <p class="mb-0">Muffin candy caramels. I love caramels tiramisu jelly. Pie I love wafer. Chocolate cake lollipop tootsie roll cake.</p>
                                     <p class="text-primary">#django #vuejs</p>
                                     <small>9 Dec 018</small>
                                 </div>
                             </div>
                         </div>
                     </div>
                     <div class="col-lg-6 col-12">
                         <div class="card" v-for="campdata in campaigns">

                             <div class="card-body">
                                 <div class="d-flex justify-content-start align-items-center mb-1">
                                     <div class="avatar mr-1">
                                         <img src="{{env('APP_URL')}}public/app-assets/images/profile/user-uploads/user-01.jpg" alt="avtar img holder" height="45" width="45">
                                     </div>
                                     <div class="user-page-info">
                                         <p class="mb-0">@{{campdata.title}}</p>
                                         <span class="font-small-2">@{{campdata.created_at}}</span>
                                     </div>
                                     <div class="ml-auto user-like text-danger"><i class="fa fa-heart"></i></div>
                                 </div>
                                 <p v-html="campdata.story"> @{{campdata.story}}</p>
                                 <span v-for="(imgdata,index) in campdata.get_images" >
                                   <img v-if="index==0" class="img-fluid card-img-top rounded-sm mb-2" :src="'{{CampaignImagePath}}'+imgdata.campaign_id+'/'+imgdata.image"  onerror="this.src='{{FrontAssets}}images/placeholderCampaign.jpeg'"  :alt="'{{CampaignImagePath}}'+imgdata.campaign_id+'/'+imgdata.image"/>
                                 </span>

                                 <div class="d-flex justify-content-start align-items-center mb-1">
                                     <div class="d-flex align-items-center">
                                         <i class="feather icon-heart font-medium-2 mr-50"></i>
                                         <span>145</span>
                                     </div>
                                     <div class="ml-2">
                                         <ul class="list-unstyled users-list m-0  d-flex align-items-center">
                                             <li v-for="team in  campdata.get_team" data-toggle="tooltip" data-popup="tooltip-custom" data-placement="bottom" :data-original-title="team.get_team_memeber.first_name" class="avatar pull-up">
                                                 <img class="media-object rounded-circle"  :src="'{{TeamImagePath}}'+team.user_id+'/Thumb/'+team.profile_pic" onerror="this.src='{{FrontAssets}}images/defaulticon.png'" alt="Avatar" height="30" width="30">
                                             </li>
                                             <li class="d-inline-block pl-50">
                                                 <span>@{{campdata.get_team.length}} Members</span>
                                             </li>
                                         </ul>
                                     </div>
                                     <p class="ml-auto d-flex align-items-center">
                                         <i class="feather icon-message-square font-medium-2 mr-50"></i>77
                                     </p>
                                 </div>
                                 <div class="d-flex justify-content-start align-items-center mb-1">
                                     <div class="avatar mr-50">
                                         <img src="{{env('APP_URL')}}public/app-assets/images/portrait/small/avatar-s-6.png" alt="Avatar" height="30" width="30">
                                     </div>
                                     <div class="user-page-info">
                                         <h6 class="mb-0">Kitty Allanson</h6>
                                         <span class="font-small-2">orthoplumbate morningtide naphthaline exarteritis</span>
                                     </div>
                                     <div class="ml-auto cursor-pointer">
                                         <i class="feather icon-heart mr-50"></i>
                                         <i class="feather icon-message-square"></i>
                                     </div>
                                 </div>
                              </div>
                         </div>

                     </div>
                     <div class="col-lg-3 col-12">
                         <div class="card">
                             <div class="card-header">
                                 <h4>Latest Photos</h4>
                             </div>
                             <div class="card-body">
                                 <div class="row">
                                     <div class="col-md-4 col-6 user-latest-img">
                                         <img src="{{env('APP_URL')}}public/app-assets/images/profile/user-uploads/user-01.jpg" class="img-fluid mb-1 rounded-sm" alt="avtar img holder">
                                     </div>
                                     <div class="col-md-4 col-6 user-latest-img">
                                         <img src="{{env('APP_URL')}}public/app-assets/images/profile/user-uploads/user-02.jpg" class="img-fluid mb-1 rounded-sm" alt="avtar img holder">
                                     </div>
                                     <div class="col-md-4 col-6 user-latest-img">
                                         <img src="{{env('APP_URL')}}public/app-assets/images/profile/user-uploads/user-03.jpg" class="img-fluid mb-1 rounded-sm" alt="avtar img holder">
                                     </div>
                                     <div class="col-md-4 col-6 user-latest-img">
                                         <img src="{{env('APP_URL')}}public/app-assets/images/profile/user-uploads/user-04.jpg" class="img-fluid mb-1 rounded-sm" alt="avtar img holder">
                                     </div>
                                     <div class="col-md-4 col-6 user-latest-img">
                                         <img src="{{env('APP_URL')}}public/app-assets/images/profile/user-uploads/user-05.jpg" class="img-fluid mb-1 rounded-sm" alt="avtar img holder">
                                     </div>
                                     <div class="col-md-4 col-6 user-latest-img">
                                         <img src="{{env('APP_URL')}}public/app-assets/images/profile/user-uploads/user-06.jpg" class="img-fluid mb-1 rounded-sm" alt="avtar img holder">
                                     </div>
                                     <div class="col-md-4 col-6 user-latest-img">
                                         <img src="{{env('APP_URL')}}public/app-assets/images/profile/user-uploads/user-07.jpg" class="img-fluid mb-1 rounded-sm" alt="avtar img holder">
                                     </div>
                                     <div class="col-md-4 col-6 user-latest-img">
                                         <img src="{{env('APP_URL')}}public/app-assets/images/profile/user-uploads/user-08.jpg" class="img-fluid mb-1 rounded-sm" alt="avtar img holder">
                                     </div>
                                     <div class="col-md-4 col-6 user-latest-img">
                                         <img src="{{env('APP_URL')}}public/app-assets/images/profile/user-uploads/user-09.jpg" class="img-fluid mb-1 rounded-sm" alt="avtar img holder">
                                     </div>
                                 </div>
                             </div>
                         </div>
                         <div class="card">
                             <div class="card-header d-flex justify-content-between">
                                 <h4>Suggestions</h4>
                                 <i class="feather icon-more-horizontal cursor-pointer"></i>
                             </div>
                             <div class="card-body">
                                 <div class="d-flex justify-content-start align-items-center mb-1">
                                     <div class="avatar mr-50">
                                         <img src="{{env('APP_URL')}}public/app-assets/images/portrait/small/avatar-s-5.png" alt="avtar img holder" height="35" width="35">
                                     </div>
                                     <div class="user-page-info">
                                         <h6 class="mb-0">Carissa Dolle</h6>
                                         <span class="font-small-2">6 Mutual Friends</span>
                                     </div>
                                     <button type="button" class="btn btn-primary btn-icon ml-auto"><i class="feather icon-user-plus"></i></button>
                                 </div>
                                 <div class="d-flex justify-content-start align-items-center mb-1">
                                     <div class="avatar mr-50">
                                         <img src="{{env('APP_URL')}}public/app-assets/images/portrait/small/avatar-s-6.png" alt="avtar img holder" height="35" width="35">
                                     </div>
                                     <div class="user-page-info">
                                         <h6 class="mb-0">Liliana Pecor</h6>
                                         <span class="font-small-2">3 Mutual Friends</span>
                                     </div>
                                     <button type="button" class="btn btn-primary btn-icon ml-auto"><i class="feather icon-user-plus"></i></button>
                                 </div>
                                 <div class="d-flex justify-content-start align-items-center mb-1">
                                     <div class="avatar mr-50">
                                         <img src="{{env('APP_URL')}}public/app-assets/images/portrait/small/avatar-s-7.png" alt="avtar img holder" height="35" width="35">
                                     </div>
                                     <div class="user-page-info">
                                         <h6 class="mb-0">Isidra Strunk</h6>
                                         <span class="font-small-2">2 Mutual Friends</span>
                                     </div>
                                     <button type="button" class="btn btn-primary btn-icon ml-auto"><i class="feather icon-user-plus"></i></button>
                                 </div>
                                 <div class="d-flex justify-content-start align-items-center mb-1">
                                     <div class="avatar mr-50">
                                         <img src="{{env('APP_URL')}}public/app-assets/images/portrait/small/avatar-s-8.png" alt="avtar img holder" height="35" width="35">
                                     </div>
                                     <div class="user-page-info">
                                         <h6 class="mb-0">Gerald Licea</h6>
                                         <span class="font-small-2">1 Mutual Friends</span>
                                     </div>
                                     <button type="button" class="btn btn-primary btn-icon ml-auto"><i class="feather icon-user-plus"></i></button>
                                 </div>
                                 <div class="d-flex justify-content-start align-items-center mb-1">
                                     <div class="avatar mr-50">
                                         <img src="{{env('APP_URL')}}public/app-assets/images/portrait/small/avatar-s-9.png" alt="avtar img holder" height="35" width="35">
                                     </div>
                                     <div class="user-page-info">
                                         <h6 class="mb-0">Kelle Herrick</h6>
                                         <span class="font-small-2">1 Mutual Friends</span>
                                     </div>
                                     <button type="button" class="btn btn-primary btn-icon ml-auto"><i class="feather icon-user-plus"></i></button>
                                 </div>
                                 <div class="d-flex justify-content-start align-items-center mb-1">
                                     <div class="avatar mr-50">
                                         <img src="{{env('APP_URL')}}public/app-assets/images/portrait/small/avatar-s-10.png" alt="avtar img holder" height="35" width="35">
                                     </div>
                                     <div class="user-page-info">
                                         <h6 class="mb-0">Cesar Lee</h6>
                                         <span class="font-small-2">1 Mutual Friends</span>
                                     </div>
                                     <button type="button" class="btn btn-primary btn-icon ml-auto"><i class="feather icon-user-plus"></i></button>
                                 </div>
                                 <div class="d-flex justify-content-start align-items-center mb-1">
                                     <div class="avatar mr-50">
                                         <img src="{{env('APP_URL')}}public/app-assets/images/portrait/small/avatar-s-11.png" alt="avtar img holder" height="35" width="35">
                                     </div>
                                     <div class="user-page-info">
                                         <h6 class="mb-0">John Doe</h6>
                                         <span class="font-small-2">1 Mutual Friends</span>
                                     </div>
                                     <button type="button" class="btn btn-primary btn-icon ml-auto"><i class="feather icon-user-plus"></i></button>
                                 </div>
                                 <div class="d-flex justify-content-start align-items-center mb-2">
                                     <div class="avatar mr-50">
                                         <img src="{{env('APP_URL')}}public/app-assets/images/portrait/small/avatar-s-12.png" alt="avtar img holder" height="35" width="35">
                                     </div>
                                     <div class="user-page-info">
                                         <h6 class="mb-0">Tonia Seabold</h6>
                                         <span class="font-small-2">1 Mutual Friends</span>
                                     </div>
                                     <button type="button" class="btn btn-primary btn-icon ml-auto"><i class="feather icon-user-plus"></i></button>
                                 </div>
                                 <button type="button" class="btn btn-primary w-100 mt-1"><i class="feather icon-plus mr-25"></i>Load More</button>
                             </div>
                         </div>
                         <div class="card">
                             <div class="card-header">
                                 <h4>Polls</h4>
                             </div>
                             <div class="card-body">
                                 <h6>Who is the best actor in Marvel Cinematic Universe?</h6>
                                 <div class="polls-info mt-1">
                                     <div class="d-flex justify-content-between">
                                         <div class="vs-radio-con vs-radio-primary">
                                             <input type="radio" name="vueradio" value="false">
                                             <span class="vs-radio">
                                                 <span class="vs-radio--border"></span>
                                                 <span class="vs-radio--circle"></span>
                                             </span>
                                             <span class="">RDJ</span>
                                         </div>
                                         <div class="text-right">58%</div>
                                     </div>
                                     <div class="progress progress-bar-primary my-50">
                                         <div class="progress-bar" role="progressbar" aria-valuenow="58" aria-valuemin="58" aria-valuemax="100" style="width:58%"></div>
                                     </div>
                                     <ul class="list-unstyled users-list d-flex">
                                         <li data-toggle="tooltip" data-popup="tooltip-custom" data-placement="bottom" data-original-title="Tonia Seabold" class="avatar pull-up ml-0">
                                             <img class="media-object rounded-circle" src="{{env('APP_URL')}}public/app-assets/images/portrait/small/avatar-s-12.png" alt="Avatar" height="30" width="30">
                                         </li>
                                         <li data-toggle="tooltip" data-popup="tooltip-custom" data-placement="bottom" data-original-title="Carissa Dolle" class="avatar pull-up">
                                             <img class="media-object rounded-circle" src="{{env('APP_URL')}}public/app-assets/images/portrait/small/avatar-s-5.png" alt="Avatar" height="30" width="30">
                                         </li>
                                         <li data-toggle="tooltip" data-popup="tooltip-custom" data-placement="bottom" data-original-title="Kelle Herrick" class="avatar pull-up">
                                             <img class="media-object rounded-circle" src="{{env('APP_URL')}}public/app-assets/images/portrait/small/avatar-s-9.png" alt="Avatar" height="30" width="30">
                                         </li>
                                         <li data-toggle="tooltip" data-popup="tooltip-custom" data-placement="bottom" data-original-title="Len Bregantini" class="avatar pull-up">
                                             <img class="media-object rounded-circle" src="{{env('APP_URL')}}public/app-assets/images/portrait/small/avatar-s-10.png" alt="Avatar" height="30" width="30">
                                         </li>
                                         <li data-toggle="tooltip" data-popup="tooltip-custom" data-placement="bottom" data-original-title="John Doe" class="avatar pull-up">
                                             <img class="media-object rounded-circle" src="{{env('APP_URL')}}public/app-assets/images/portrait/small/avatar-s-11.png" alt="Avatar" height="30" width="30">
                                         </li>
                                         <li data-toggle="tooltip" data-popup="tooltip-custom" data-placement="bottom" data-original-title="Tonia Seabold" class="avatar pull-up">
                                             <img class="media-object rounded-circle" src="{{env('APP_URL')}}public/app-assets/images/portrait/small/avatar-s-12.png" alt="Avatar" height="30" width="30">
                                         </li>
                                         <li data-toggle="tooltip" data-popup="tooltip-custom" data-placement="bottom" data-original-title="Dirk Fornili" class="avatar pull-up">
                                             <img class="media-object rounded-circle" src="{{env('APP_URL')}}public/app-assets/images/portrait/small/avatar-s-2.png" alt="Avatar" height="30" width="30">
                                         </li>
                                     </ul>
                                 </div>
                                 <div class="polls-info mt-1">
                                     <div class="d-flex justify-content-between">
                                         <div class="vs-radio-con vs-radio-primary">
                                             <input type="radio" name="vueradio" value="false">
                                             <span class="vs-radio">
                                                 <span class="vs-radio--border"></span>
                                                 <span class="vs-radio--circle"></span>
                                             </span>
                                             <span class="">Chris Hemswort</span>
                                         </div>
                                         <div class="text-right">16%</div>
                                     </div>
                                     <div class="progress progress-bar-primary my-50">
                                         <div class="progress-bar" role="progressbar" aria-valuenow="16" aria-valuemin="16" aria-valuemax="100" style="width:16%"></div>
                                     </div>
                                     <ul class="list-unstyled users-list d-flex">
                                         <li data-toggle="tooltip" data-popup="tooltip-custom" data-placement="bottom" data-original-title="Liliana Pecor" class="avatar pull-up ml-0">
                                             <img class="media-object rounded-circle" src="{{env('APP_URL')}}public/app-assets/images/portrait/small/avatar-s-6.png" alt="Avatar" height="30" width="30">
                                         </li>
                                         <li data-toggle="tooltip" data-popup="tooltip-custom" data-placement="bottom" data-original-title="Kasandra NaleVanko" class="avatar pull-up">
                                             <img class="media-object rounded-circle" src="{{env('APP_URL')}}public/app-assets/images/portrait/small/avatar-s-1.png" alt="Avatar" height="30" width="30">
                                         </li>
                                     </ul>
                                 </div>
                                 <div class="polls-info mt-1">
                                     <div class="d-flex justify-content-between">
                                         <div class="vs-radio-con vs-radio-primary">
                                             <input type="radio" name="vueradio" value="false">
                                             <span class="vs-radio">
                                                 <span class="vs-radio--border"></span>
                                                 <span class="vs-radio--circle"></span>
                                             </span>
                                             <span class="">Mark Ruffalo</span>
                                         </div>
                                         <div class="text-right">8%</div>
                                     </div>
                                     <div class="progress progress-bar-primary my-50">
                                         <div class="progress-bar" role="progressbar" aria-valuenow="8" aria-valuemin="8" aria-valuemax="100" style="width:8%"></div>
                                     </div>
                                     <ul class="list-unstyled users-list d-flex">
                                         <li data-toggle="tooltip" data-popup="tooltip-custom" data-placement="bottom" data-original-title="Lorelei Lacsamana" class="avatar pull-up ml-0">
                                             <img class="media-object rounded-circle" src="{{env('APP_URL')}}public/app-assets/images/portrait/small/avatar-s-4.png" alt="Avatar" height="30" width="30">
                                         </li>
                                     </ul>
                                 </div>
                                 <div class="polls-info mt-1">
                                     <div class="d-flex justify-content-between">
                                         <div class="vs-radio-con vs-radio-primary">
                                             <input type="radio" name="vueradio" value="false">
                                             <span class="vs-radio">
                                                 <span class="vs-radio--border"></span>
                                                 <span class="vs-radio--circle"></span>
                                             </span>
                                             <span class="">Chris Evans</span>
                                         </div>
                                         <div class="text-right">16%</div>
                                     </div>
                                     <div class="progress progress-bar-primary my-50">
                                         <div class="progress-bar" role="progressbar" aria-valuenow="16" aria-valuemin="16" aria-valuemax="100" style="width:16%"></div>
                                     </div>
                                     <ul class="list-unstyled users-list d-flex">
                                         <li data-toggle="tooltip" data-popup="tooltip-custom" data-placement="bottom" data-original-title="JeanieBulgrin" class="avatar pull-up ml-0">
                                             <img class="media-object rounded-circle" src="{{env('APP_URL')}}public/app-assets/images/portrait/small/avatar-s-8.png" alt="Avatar" height="30" width="30">
                                         </li>
                                         <li data-toggle="tooltip" data-popup="tooltip-custom" data-placement="bottom" data-original-title="Graig Muckey" class="avatar pull-up">
                                             <img class="media-object rounded-circle" src="{{env('APP_URL')}}public/app-assets/images/portrait/small/avatar-s-3.png" alt="Avatar" height="30" width="30">
                                         </li>
                                     </ul>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
                 <div class="row">
                     <div class="col-12 text-center">
                         <button type="button" class="btn btn-primary block-element">Load More</button>
                     </div>
                 </div>
             </section>
         </div>

     </div>
 </div>

 @stop

 @section('appfooter')

  <script src="{{env('APP_URL')}}public/assets/js/vue.paging.js"></script>
  <script src="{{env('APP_URL')}}public/app-assets/vendors/js/extensions/jquery.steps.min.js"></script>
  <script src="{{env('APP_URL')}}public/app-assets/vendors/js/forms/select/select2.full.min.js"></script>
  <script src="{{env('APP_URL')}}public/app-assets/vendors/js/forms/validation/jquery.validate.min.js"></script>
  <script src="{{env('APP_URL')}}public/app-assets/vendors/js/extensions/toastr.min.js"></script>
  <script src="{{env('APP_URL')}}public/app-assets/vendors/js/extensions/sweetalert2.all.min.js"></script>
  <script src="{{env('APP_URL')}}public/app-assets/vendors/js/editors/quill/katex.min.js"></script>
  <script src="{{env('APP_URL')}}public/app-assets/vendors/js/editors/quill/highlight.min.js"></script>
  <script src="{{env('APP_URL')}}public/app-assets/vendors/js/editors/quill/quill.min.js"></script>
  <script src="{{env('APP_URL')}}public/app-assets/vendors/js/extensions/moment.min.js"></script>
  <script src="{{env('APP_URL')}}public/assets/js/bootstrap-datepicker.min.js"></script>
  <script src="{{env('APP_URL')}}public/app-assets/vendors/js/charts/apexcharts.min.js"></script>
  <script src="{{env('APP_URL')}}public/app-assets/js/scripts/cards/card-demo.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>

  <!-- <script src="{{env('APP_URL')}}public/app-assets/js/scripts/forms/select/form-select2.js"></script> -->



  <script src="{{env('APP_URL')}}public/app-assets/js/scripts/editors/full-editor-quill.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
 <script>

 // Full Editor

 function initsweetalert(){
   $(document).on('click',".deleteUser",function(){

              var id = this.id;
               Swal.fire({
                 title: 'Are you sure?',
                 text: "You won't be able to revert this!",
                 type: 'warning',
                 showCancelButton: true,
                 confirmButtonColor: '#3085d6',
                 cancelButtonColor: '#d33',
                 confirmButtonText: 'Yes, delete it!',
                 confirmButtonClass: 'btn btn-primary',
                 cancelButtonClass: 'btn btn-danger ml-1',
                 buttonsStyling: false,
               }).then(function (result){
                 if (result.value) {

                     $.ajax({
                       url:'{{route("deleteCampaign")}}',
                       type:'post',
                       data:{
                           _token:'{{csrf_token()}}',
                           id:id
                        },
                       beforeSend:function(){

                       },
                       success:function(res){

                       },
                       complete:function(){
                           setTimeout(function(){
                                $('[data-toggle="tooltip"]').tooltip();
                           },500);
                       }
                     });

                   Swal.fire({
                     type: "success",
                     title: 'Deleted!',
                     text: 'Your file has been deleted.',
                     confirmButtonClass: 'btn btn-success',
                   })

                 }
                 else if (result.dismiss === Swal.DismissReason.cancel){
                   Swal.fire({
                     title: 'Cancelled',
                     text: 'Your record is safe :)',
                     type: 'error',
                     confirmButtonClass: 'btn btn-success',
                   })
                 }
               });
   });
 }
 $(document).ready(function(){
      initsweetalert();
      updateCircle();
 });



 // Format icon
 function iconFormat(icon){
     var originalOption = icon.element;
     if (!icon.id) { return icon.text; }
     var $icon = "<img class='selectimage' src='" + $(icon.element).data('thumbnail') + "'></i>" + icon.text;

     return $icon;
 }

 var vm = new Vue({
   el:"#UserVueApp",
   data:{
             users:{ total: 0, per_page: 2, from: 1, to: 0, current_page: 1, data:[] },
             search:'',
             pagechange:20,
             loading:true,
             load:1,
             userDetail: {!!json_encode($userDetail[0])!!},
             campaigns: {!!json_encode($campaigns)!!},



   },
   watch:{


   }
   ,
   mounted:function(){

   },
   methods:{


   }
 });

</script>

<script type="text/javascript">

    if ($(".data-items").length > 0) {
      new PerfectScrollbar(".data-items", { wheelPropagation: false });
    }
</script>





 @stop
