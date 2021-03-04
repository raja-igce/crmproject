 @extends('layouts.main')
 @php use App\Helper\AccessHelper; @endphp
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
 <link rel="stylesheet" type="text/css" href="{{env('APP_URL')}}public/app-assets/vendors/css/charts/apexcharts.css">

 <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.css">
 <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.css" rel="stylesheet"/>

 <style>
    .pac-container {
        z-index: 10000 !important;
    }
</style>
 <style>
 </style>
 @stop
 @section('content')
 <div class="content-wrapper" id="UserVueApp">
            <div class="content-header row">
              <div class="content-header-left col-md-12 col-12 mb-2">
                  <div class="row breadcrumbs-top">
                      <div class="col-12">
                          <h2 class="content-header-title float-left mb-0">{{$title}}</h2>
                          <div class="content-body">
                            @php $accessAble = AccessHelper::isAccessAble(auth()->user()->id, 'campaign'); @endphp
                            @if(in_array($accessAble, ['authorized','grant_acces']))  
                            <button type="button" class="pull-right btn btn-primary   round1  " onclick="opensider('add')" id="opensider">
                                <i class="feather icon-plus"></i> New {{$label}}
                            </button>
                            @endif
                          </div>
                      </div>
                  </div>
              </div>
            </div>
            <div class="content-body">
                <!-- User Table -->
                <section>
                    <!-- Begin: User form -->
                    <div class="card">
                        <div class="card-body">
                            <form class="form">
                                <div class=" ">
                                    <div class="">
                                        <div class="row">
                                              <div class="col-lg-4 col-sm-6 col-xs-12">
                                                  <label for="userstatus">Causes</label>
                                                  <fieldset class="form-group">
                                                      <select class="form-control" id="usercauses" name="usercauses" v-model="usercauses">
                                                          <option selected value="">All</option>
                                                          <option v-for="data in projects" :value="data.id">@{{data.project_name}}</option>
                                                      </select>
                                                  </fieldset>
                                              </div> 
                                              @if(in_array($accessAble, ['authorized']))  
                                              <div class="col-lg-4 col-sm-6 col-xs-12">
                                                  <label for="userstatus">Campaigner</label>
                                                  <fieldset class="form-group">
                                                      <select class="form-control select2" id="creator" name="creator" v-model="creator">
                                                          <option selected value="">All</option>
                                                          <option v-for="data in campaignerList" :value="data.id">@{{data.first_name}} @{{data.last_name}}</option>
                                                      </select>
                                                  </fieldset>
                                              </div> 
                                              @endif
                                              <div class="col-lg-4 col-sm-6 col-xs-12">
                                                  <label for="userstatus">Status</label>
                                                  <fieldset class="form-group">
                                                      <select class="form-control" id="campstatus" name="campstatus" v-model="campstatus">
                                                          <option selected value="">All</option>
                                                          <option  value="Live">Live</option>
                                                          <option  value="Completed">Completed</option>
                                                      </select>
                                                  </fieldset>
                                              </div> 
                                              <div class="col-lg-4 col-sm-6 col-xs-12">
                                                  <label for="userstatus">Search</label>
                                                  <div class="collapse-header">
                                                        <input type="text" class="form-control " id="txtsearch"  v-model="txtsearch" value="">
                                                  </div>
                                              </div>
                                              <!-- <div class="col-lg-1">
                                                    <button type="button"    class="slidedown btn btn-primary list-view-btn view-btn waves-effect waves-light active">
                                                        <i class="feather icon-list"></i>
                                                    </button>
                                              </div> -->
                                        </div>
                                        <!--
                                        <div id="collapse2" role="tabpanel" aria-labelledby="headingCollapse1" class="collapse">
                                            <div class="card-content">
                                              <div class="brands">
                                                    <div class="brand-title mt-1 pb-1">
                                                        <h6 class="filter-title mb-0">Cause/Project</h6>
                                                    </div>
                                                    <div class="brand-list row" id="brands">
                                                            <div v-for="data in projects" class="col-lg-3">
                                                              <span class="vs-checkbox-con vs-checkbox-primary">
                                                                  <input type="checkbox" name="projects[]" checked :value="data.id" v-on:change="getUsers()">
                                                                  <span class="vs-checkbox">
                                                                      <span class="vs-checkbox--check">
                                                                          <i class="vs-icon feather icon-check"></i>
                                                                      </span>
                                                                  </span>
                                                                  <span class="">@{{data.project_name}}</span>
                                                              </span>
                                                            </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> -->
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class=" ">
                            <div class="row">
                                <div class="ml-2">
                                          <input type="hidden" name="_token"  value="{{csrf_token()}}">
                                                  <div class="data-list-view-header">
                                      <div class="add-new-data-sidebar">
                                        <div class="overlay-bg"></div>
                                        <div class="add-new-data col-12" style="width:100%" >
                                            <div class="div mt-2 px-2 d-flex new-data-title justify-content-between">
                                                <div>
                                                    <h4 id="mylabel">Add new {{$label}}</h4>
                                                </div>
                                                <div class="hide-data-sidebar" v-on:click="getUsers()" >
                                                    <i class="feather icon-x"></i>
                                                </div>
                                            </div>
                                            <div class="data-items pb-3 ">
                                                <div class="data-fields px-2  ">
                                                    <section id="multiple-column-form">
               <div class="row match-height">
                   <div class="col-12">
                     <!-- Form wizard with step validation section start -->
                     <section id="validation">
                         <div class="row">
                             <div class="col-12">
                                 <div class="card">
                                     <div class="card-header">
                                     </div>
                                     <div class="card-content">
                                         <div class="card-body">
                                             <form action="#" id="frmAddData" name="frmAddData" class="steps-validation ">
                                               <input type="hidden" name="_token"  value="{{csrf_token()}}">
                                               <input type="hidden" name="user_id" id="user_id" value="">

                                                      <div class="row">
                                                       <div class="col-lg-6  col-sm-12">
                                                           <div class="form-group">
                                                               <label for="title">Campaign Title*</label>
                                                                <input type="text"  data-msg="Please enter event title"  id="title" class="form-control" required placeholder="title" name="title">
                                                           </div>
                                                       </div>
                                                       <div class="col-lg-6  col-sm-12">
                                                           <div class="form-group">
                                                               <label for="subtitle">Campaign Subtitle*</label>
                                                                <input type="text"  data-msg="Please enter event sub title"  id="subtitle" class="form-control" required placeholder="Sub Title" name="subtitle">
                                                           </div>
                                                       </div>
                                                       <div class="col-sm-12">
                                                             <label for="title">Description</label>
                                                             <input type="hidden" name="description" id="description" value="" required>
                                                             <section class="full-editor">
                                                               <div id="full-wrapper">
                                                                   <div id="full-container">
                                                                       <div class="editor">
                                                                       </div>
                                                                   </div>
                                                               </div>
                                                             </section>
                                                             <br>
                                                       </div>

                                                       <div class="col-lg-12">
                                                             <label for="title">Campaigner’s Story</label>
                                                             <input type="hidden" name="story" id="story" value="" required>
                                                             <!-- <textarea name="story" id="story" class="form-control" required rows="8" cols="80"></textarea> -->
                                                             <section class="full-editor">
                                                               <div id="full-wrapper">
                                                                   <div id="second-full-container">
                                                                       <div class="second_editor">
                                                                       </div>
                                                                   </div>
                                                               </div>
                                                             </section>
                                                       </div>

                                                       <div class=" col-lg-12">  <br>  </div>


                                                       <div class="col-lg-4 col-sm-6 col-xs-12">
                                                           <div class="form-group">
                                                               <label for="title">Campaign Team</label>
                                                               <select data-placeholder="Select team..." class="select2-icons form-control" id="selectteam" name="selectteam[]" multiple="multiple" required>
                                                                 <optgroup label="Services">
                                                                    <option v-for="data in usersList"   data-icon="aa"  :value="data.id" data-thumbnail="http://www.emlii.com/images/author/axw12po.jpg" >@{{data.first_name}}</option>
                                                                 </optgroup>
                                                               </select>
                                                            </div>
                                                       </div>
                                                       <div class="col-lg-4 col-sm-6 col-xs-12">
                                                           <div class="form-group">
                                                               <label for="title">Campaign Cause/Project</label>
                                                               <select data-placeholder="Select team..." class="select2 form-control" id="project" name="project"   required>
                                                                    <option v-for="data in projectList"    :value="data.id"   >@{{data.project_name}}</option>
                                                               </select>
                                                            </div>
                                                       </div>
                                                       
                                                       <div class="col-lg-4 col-sm-6 col-xs-12">
                                                           <div class="form-group">
                                                               <label for="title">Tags</label>
                                                               <select data-placeholder="Select team..." class="select2-icons form-control" id="tags" name="tags[]" multiple="multiple"  >
                                                                 <optgroup label="Services">
                                                                    <option v-for="data in tagList"    :value="data.id"  >@{{data.title}}</option>
                                                                 </optgroup>
                                                               </select>
                                                            </div>
                                                       </div>
                                                       <div class="col-lg-4 col-sm-6 col-xs-12">
                                                           <div class="form-group">
                                                               <label for="title">Target Funds</label>
                                                               <input type="text" class="form-control" name="amount" id="amount" value="">
                                                            </div>
                                                       </div>
                                                       <div class="col-lg-4 col-sm-6 col-xs-12">
                                                           <div class="form-group">
                                                               <label for="title">Location</label>
                                                               <input type="text" class="form-control" name="location" id="location" value="">
                                                            </div>
                                                       </div>

                                                       <div class="col-lg-4 col-sm-6 col-xs-12">
                                                           <div class="form-group">
                                                               <label for="startdate">Start Date</label>
                                                               <fieldset class="form-group position-relative has-icon-left input-divider-left">
                                                                   <input type="text" data-msg="Please enter Event start date" id="startdate" required="required" placeholder="Event start date" name="startdate" class="form-control startdate">
                                                                   <div class="form-control-position"><i class="feather icon-calendar"></i></div>
                                                               </fieldset>
                                                            </div>
                                                       </div>

                                                       <div class=" col-lg-4 col-sm-6 col-xs-12 ">
                                                           <div class="form-group">
                                                               <label for="enddate">End Date</label>
                                                               <fieldset class="form-group position-relative has-icon-left input-divider-left">
                                                                   <input type="text" data-msg="Please enter first name" id="enddate" required="required" placeholder="End DateTime" name="enddate" class="form-control enddate">
                                                                   <div class="form-control-position"><i class="feather icon-calendar"></i></div>
                                                               </fieldset>
                                                            </div>
                                                       </div>

                                                       <div class="col-lg-12">
                                                            <div class="form-group">
                                                                <label for="title">Select Images/Video</label><br>
                                                                <button type="button" onclick="document.getElementById('imagefile').click()"  class="btn btn-primary mr-1 mb-1 waves-effect waves-light"><i class="fa fa-paperclip"></i> Select Images</button>
                                                                <div class="input-group mb-3 hidden">
                                                                     <div class="input-group-prepend">
                                                                         <!-- <span class="input-group-text">Upload</span> -->
                                                                     </div>
                                                                     <div class="custom-file">
                                                                         <input type="file" name="imagefile" id="imagefile" class="custom-file-input">
                                                                         <label class="custom-file-label" style="overflow:hidden">Choose file</label>
                                                                     </div>
                                                                 </div>
                                                            </div>
                                                            <div class="Outputshow" id="ImageGallery">
                                                              <div v-for="(data, key) in eventImages" title=""  class="profile-picImg GalleryBox" :id="'GalleryBox'+data.image">
                                                                <input type="hidden" :value="data.image" name="imagename[]" id="imagename">
                                                                <div class="gclose" v-on:click="updatearray(key,data.id)" title="Remove Image"></div>
                                                                <img id="galimgDocument1556361385_85" :src="'{{CampaignAbsPath}}'+data.campaign_id+'/Thumb/'+data.image" class="profile-picImg">
                                                              </div>
                                                            </div>
                                                            <input type="hidden" name="deletedImage" v-model="deletedImage" value="">
                                                       </div>
                                                       <div class="col-lg-12">
                                                            <div class="form-group">
                                                                <label for="title">Documents Images</label><br>
                                                                <button type="button" onclick="document.getElementById('imagefile1').click()"  class="btn btn-primary mr-1 mb-1 waves-effect waves-light"><i class="fa fa-paperclip"></i> Select Images</button>
                                                                <div class="input-group mb-3 hidden">
                                                                     <div class="input-group-prepend">
                                                                         <!-- <span class="input-group-text">Upload</span> -->
                                                                     </div>
                                                                     <div class="custom-file">
                                                                         <input type="file" name="imagefile1" id="imagefile1" class="custom-file-input">
                                                                         <label class="custom-file-label" style="overflow:hidden">Choose file</label>
                                                                     </div>
                                                                 </div>
                                                            </div>
                                                            <div class="Outputshow1" id="ImageGallery">
                                                              <div v-for="(data, key) in docImages" title=""  class="profile-picImg GalleryBox" :id="'GalleryBox'+data.image">
                                                                <input type="hidden" :value="data.image" name="imagename[]" id="imagename">
                                                                <div class="gclose" v-on:click="updatearray(key,data.id)" title="Remove Image"></div>
                                                                <img id="galimgDocument1556361385_85" :src="'{{CampaignAbsPath}}'+data.campaign_id+'/Thumb/'+data.image" class="profile-picImg">
                                                              </div>
                                                            </div>
                                                            <input type="hidden" name="deletedImage" v-model="deletedImage" value="">
                                                       </div>


                                                       
                                                

                                                       <div class="col-lg-12">
                                                         @if(in_array($accessAble, ['authorized','grant_acces']))  
                                                          <button type="button" v-on:click="SaveData()" id="SaveData" class="btn btn-primary mt-2 round   waves-effect waves-light"> <i class="feather icon-save"></i>  Save </button>
                                                         @endif 
                                                       </div>
                                                     </div>
                                              </form>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </section>
                     <!-- End of wizard-steps -->
                   </div>
               </div>
           </section>


                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        </div>
                        <?php /*
                            <section id="content-types">
                                <div class="row match-height">
                                  <div  v-if='users.data.length>0  && !loading' v-for='user in users.data ' class="col-xl-4 col-md-12 col-sm-12">
                                      <div class="card">
                                          <div class="card-content">
                                              <div :id="'carousel-example-generic'+user.id" class="carousel slide" data-ride="carousel">
                                                  <ol class="carousel-indicators">
                                                      <li :data-target="'#carousel-example-generic'+user.id" v-if="user.get_images.length>0 "  v-for="(data,ind) in user.get_images" :data-slide-to="ind" :class="{ 'active': ind === 0 }" ></li>
                                                  </ol>
                                                  <div class="carousel-inner" role="listbox">
                                                      <div v-if="user.get_images.length>0 " v-for="(data,ind) in user.get_images" class="carousel-item" :class="{ ' carousel-item active': ind === 0 }" >
                                                          <img :src="'{{CampaignAbsPath}}'+data.campaign_id+'/Thumb/'+data.image" onerror="this.src='{{FrontAssets}}images/placeholderCampaign.jpeg'" class="d-block w-100" alt="{{FrontAssets}}images/placeholderCampaign.jpeg">
                                                      </div>
                                                  </div>
                                                  <a class="carousel-control-prev" :href="'#carousel-example-generic'+user.id" role="button" data-slide="prev">
                                                      <span class="fa fa-angle-left icon-prev" aria-hidden="true"></span>
                                                      <span class="sr-only">Previous</span>
                                                  </a>
                                                  <a class="carousel-control-next" :href="'#carousel-example-generic'+user.id" role="button" data-slide="next">
                                                      <span class="fa fa-angle-right icon-next" aria-hidden="true"></span>
                                                      <span class="sr-only">Next</span>
                                                  </a>
                                              </div>
                                              <div class="card-body">
                                                  <h4 class="card-title cardtitleeclips">@{{user.title}}</h4>
                                                  <h6 class="card-subtitle text-muted ">@{{user.project_name}}</h6>
                                              </div>
                                              <div class="card-body pt-0">
                                                  <p class="card-text cardDetaileclips">@{{user.description_data}}</p>
                                              </div>
                                              <div :id="'goal-overview-chart'+user.id" class="progressCircle" :data-value="user.collect_percentage"></div>
                                              <div class="card-body pt-0">
                                                  <hr class="my-1">
                                                  <div class="d-flex justify-content-between mt-2">
                                                      <div class="float-left">
                                                          <p class="font-medium-2 mb-0">@{{user.amount}}</p>
                                                          <p class="">Goal</p>
                                                      </div>
                                                      <div class="float-right">
                                                          <p class="font-medium-2 mb-0">@{{user.start_date}}</p>
                                                          <p class="">Start Date</p>
                                                      </div>
                                                  </div>
                                                  <div class="card-btns d-flex justify-content-between mt-2">
                                                      <a href="javascript:void(0)" class="btn gradient-light-primary text-white waves-effect waves-light">Update</a>
                                                      <a href="javascript:void(0)" class="btn btn-outline-primary waves-effect waves-light">Delete</a>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                                </div>
                            </section>
                            */ ?>

                            <div class="card">
                               <div class="card-body">
                                    <div class="card-dashboard ">
                                        <div class="table-responsive">
                                          <table class="table zero-configuration" id="">
                                              <thead>
                                                  <tr class="text-uppercase">
                                                      <th>id</th>
                                                      <th class="fulltblrow">Campaign Title</th>
                                                      <th class="fulltblrow">Campaigner Name</th>
                                                      <th class="fulltblrow">Team Members</th>
                                                      <th class="fulltblrow">Target Amount</th>
                                                      <th>Donation Raised</th>
                                                      <th class="fulltblrow">End Date</th>
                                                      <th>Status</th>
                                                      <th>Actions</th>
                                                  </tr>
                                              </thead>
                                              <tbody >
                                                <template v-if='users.data.length>0  && !loading' v-for='user in users.data '>
                                                <tr>
                                                      <td>@{{user.id}} </td>
                                                      <td>@{{user.title}}</td>
                                                      <td class="fulltblrow">
                                                        <img class="media-object rounded-circle" :src="'{{TeamImagePath}}'+user.creator.id+'/Thumb/'+user.creator.profile_pic" onerror="this.src='{{FrontAssets}}images/defaulticon.png'"  :alt="'{{TeamImagePath}}'+user.creator.id+'/Thumb/'+user.creator.profile_pic" height="30" width="30"> @{{user.creator.first_name}}
                                                      </td>
                                                      <td>                
                                                              <ul class="list-unstyled users-list m-0  d-flex align-items-center">
                                                                  <li v-for="team in  user.get_team" data-toggle="tooltip" data-popup="tooltip-custom" data-placement="bottom" :data-original-title="team.get_team_memeber.first_name" class="avatar pull-up">
                                                                      <img class="media-object rounded-circle" :src="'{{TeamImagePath}}'+team.user_id+'/Thumb/'+team.get_team_memeber.profile_pic" onerror="this.src='{{FrontAssets}}images/defaulticon.png'" :alt="'{{TeamImagePath}}'+team.user_id+'/Thumb/'+team.get_team_memeber.profile_pic" height="30" width="30">
                                                                  </li>
                                                                  <li class="d-inline-block pl-50">
                                                                      <!-- <span>+140 more</span> -->
                                                                  </li>
                                                              </ul>
                                                      </td>
                                                      
                                                      <td>@{{user.amount}}</td>
                                                      <td>@{{user.collect_amount}}</td>
                                                      <td class="fulltblrow">@{{user.end_date}}</td>
                                                      <td v-if="user.status==1" class="text-success">Active</td>
                                                      <td v-if="user.status==0" class="text-secondary">InActive</td>
                                                      <td v-if="user.status==2" class="text-danger">Blocked</td>
                                                      <td>
                                                          <div class="btn-group" role="group" aria-label="Basic example">
                                                              @if(in_array($accessAble, ['authorized','grant_acces']))
                                                                <button v-on:click="getUserDetails(user.id,user)"  data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit {{$label}}" type="button" class="btn btn-outline-primary groupbtn waves-effect waves-light"><i class="feather icon-edit-2"></i></button>
                                                                <button :id="user.id" data-status="active" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete {{$label}}" type="button"  class="btn btn-outline-primary groupbtn grouplborder0 waves-effect waves-light   deleteUser"  ><i class="feather icon-trash deleteUser"></i></button>
                                                              @endif
                                                              <button   data-status="active"  data-toggle="collapse" :data-target="'#demo'+user.id" data-placement="top" title="" data-original-title="Expand Table" type="button"  class="btn accordion-toggle btn-outline-primary groupbtn grouplborder0 waves-effect waves-light  "  ><i class="feather icon-arrow-down"></i></button>

                                                              <button v-on:click="goDetails(user.creator.id)" :id="user.creator.id" data-status="active" data-toggle="tooltip" data-placement="top" title="" data-original-title="View {{$label}}" type="button"  class="btn btn-outline-primary groupbtn grouplborder0 waves-effect waves-light"  >
                                                                <a :href="user.creator.id | goDetails">
                                                                    <i class="feather icon-eye "></i>
                                                                </a>
                                                              </button>

                                                              <!-- <i  data-toggle="collapse" :data-target="'#demo'+user.id" class="accordion-toggle fa fa-eye"  ></i>  -->
                                                              <!-- <button  data-toggle="tooltip" data-placement="top" title="" data-original-title="View profile" type="button" class="btn btn-outline-primary groupbtn waves-effect waves-light"><i class="feather icon-eye"></i></button> -->
                                                          </div>
                                                      </td>
                                                  </tr>
                                                  <tr>
                                                      <td colspan="8" class="hiddenRow">
                                                        <div class="accordian-body collapse" :id="'demo'+user.id">
                                                            <table class="table table-striped">
                                                                    <thead>
                                                                      <tr>
                                                                        <td><b>Causes Title</b></td>
                                                                        <td><b>No. of Donors</b></td>
                                                                      </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                       <tr>
                                                                         <td>@{{user.project_name}}</td>
                                                                         <td>@{{user.no_of_donor}}</td>
                                                                         <td><a href="#" class="btn btn-default btn-sm">
                                                                           <i class="glyphicon glyphicon-cog"></i></a>
                                                                         </td>
                                                                      </tr>
                                                                    </tbody>
                                                             	</table>
                                                         </div>
                                                      </td>
                                                  </tr>
                                                  </template>

                                              </tbody>
                                          </table>
                                          @include('layouts.pagingView')
                                        </div>

                                    </div>
                                  </div>
                               </div>
                        </div>
                    </div>
                    <!-- End Users Profile -->
                </section>
                <!-- User Table -->
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


  <!-- <script src="{{env('APP_URL')}}public/assets/js/jquery-ui.js"></script> -->
   <!-- for sortable images  -->


  <!-- END: Theme JS-->

  <!-- BEGIN: Page JS-->

@include('layouts.pagingTemplateSource')
 <script type="text/javascript" src="{{env('APP_URL')}}public/assets/js/vue.code.js"></script>


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
                          vm.getUsers();
                          initsweetalert();
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
             getPriority: {!!json_encode($getPriority)!!},
             usersList: {!!json_encode($usersList)!!},
             campaignerList: {!!json_encode($campaignerList)!!},
             projectList: {!!json_encode($projectList)!!},
             tagList: {!!json_encode($tagList)!!},
             timeSlot: {!!json_encode($timeSlot)!!},
             projects : {!!json_encode($projects)!!},
             userSetting:{!!json_encode($userSetting)!!},
             deletedImage:[],
             eventImages: {},
             docImages: {},
             pagination:{meta:{}},
             userstatus:"",
             verifystatus:"",
             txtsearch:"",
             usercauses:"",
             campstatus:"",
             creator:""
   },
   watch:{
      userstatus:function(){
          this.getUsers();
      },
      txtsearch:function(){
          this.getUsers();
      },
      
      usercauses:function(){
          this.users.current_page=1;
          this.getUsers();
      },
      campstatus:function(){
          this.users.current_page=1;
          this.getUsers();
      },
      creator:function(){
          this.users.current_page=1;
          this.getUsers();
      },
   },
   filters: {

    goDetails: function(string) {
      var Newurl ="{{route('v-profile','MID')}}";
     return  Newurl = Newurl.replace('MID',string);

   }
  },

   mounted:function(){
      this.getUsers();
   },
   methods:{
     goDetails:function(string){
       var Newurl ="{{route('v-profile','MID')}}";
         window.location.href = Newurl.replace('MID',string);

     },
     updatearray:function(inm,id){
         self = this;
       Swal.fire({
         title: 'Are you sure?',
         text: "You won't be able to revert this after update !",
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

           self.eventImages.splice(inm, 1);
           self.deletedImage.push(id);

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

     },
     getUsers:function(load){
       var self=this;
       var projects = $('input[name="projects[]"]:checked').map(function(i, e) {return e.value}).toArray();

       $.ajax({
         url:'{{route("ajaxCampaign")}}',
         type:'post',
         data:{
               _token:'{{csrf_token()}}',
               search:self.search,
               page:self.users.current_page,
               pageno:self.pagechange,
               userstatus:self.userstatus,
               txtsearch:self.txtsearch,
               campstatus: self.campstatus,
               usercauses: self.usercauses,
               creator: self.creator
          },
         beforeSend:function(){
             if(!load)
             self.loading=true;
         }
         ,
         success:function(res){
            // var res = JSON.stringify(res);

            self.users=res;
            if(res.meta){
                self.users.current_page = res.meta.current_page;
                self.users.last_page = res.meta.last_page;
                self.users.total = res.meta.total;
                self.users.per_page = res.meta.per_page;
                self.users.from = res.meta.from;
                self.users.to = res.meta.to;
                self.users.from = res.meta.from;
             }
            initsweetalert();
          },
         complete:function(){
             setTimeout(function(){
                  $('[data-toggle="tooltip"]').tooltip();
             },500);
             if(!load)
             self.loading=false;
         }
       });
     },
     SaveData:function(load){
          var isValidForm =  $('#frmAddData').valid();
          if(isValidForm){
                  $("#story").val($("#second-full-container .ql-editor").html());
                  $("#description").val($("#full-container .ql-editor").html());
                  jQuery.ajax({
                         url:'{{route("addCampaign")}}',
                         type:'post',
                         data: $('#frmAddData').serialize(),
                         beforeSend:function(){
                             if(!load)
                             self.loading=true;
                         },
                         success:function(res){
                              if(res.status){
                                  $(".hide-data-sidebar").click();
                                  $(".clearimx").remove();
                                  toastr.success(res.msg,'Success!');
                              }else{
                                  toastr.error(res.msg,'Error!');
                              }

                             // self.users.current_page = res.meta.current_page+1;
                             // self.users.last_page = res.meta.last_page;
                             // self.users.data = self.users.data.concat(res.data);

                          },
                         complete:function(){
                             if(!load)
                             self.loading=false;
                         }
                 });
          }else{

              toastr.error("Please enter required value in form. Check form value again!",'Validation Error!');
          }
     },
     getUserDetails:function(id,jsondata){
                  var self=this;
                  $("#user_id").val(jsondata.id);
                  $("#title").val(jsondata.title);
                  $("#subtitle").val(jsondata.subtitle);

                  $("#amount").val(jsondata.amount);
                  $("#startdate").val(jsondata.start_date);
                  $("#enddate").val(jsondata.end_date);

                  $("#seats").val(jsondata.seats);
                  $("#location").val(jsondata.location);
                  $("#project").val(jsondata.project_id);
                  vm.eventImages = jsondata.get_images;
                  vm.docImages = jsondata.get_docs;

                  init_lat = jsondata.lat;
                  init_lng = jsondata.lng;
                  $("#lat").val(jsondata.lat);
                  $("#lng").val(jsondata.lng);
                  opensider('update');
                  $("#full-container .ql-editor").html(jsondata.description);
                  $("#second-full-container .ql-editor").html(jsondata.story);
                  // $("#startdate").val(jsondata.start_date);
                  // $("#enddate").val(jsondata.end_date);

                  $("#status").prop('checked',jsondata.status);

                  var item = [];
                  $.each(jsondata.get_team, function (index, value){
                      item.push(value.user_id);
                  });
                  $('#selectteam').val(item);
                  $('#selectteam').trigger('change');

                  var itemItem = [];
                  $.each(jsondata.tags, function (index, value){
                      itemItem.push(value.id);
                  });
                  $('#tags').val(itemItem);
                  $('#tags').trigger('change');

                  $("#mylabel").html("Update {{$label}}");

                  // var fromDate = moment($('#startdate').val(), 'DD-MM-YYYY');
                  // var toDate = moment($('#enddate').val(), 'DD-MM-YYYY');
                  // if (fromDate.isValid() && toDate.isValid()) {
                  //   var duration = moment.duration(toDate.diff(fromDate));
                  //   $('#durations').html( duration.years() + ' Year(s) ' + duration.months() + ' Month(s) ' + duration.days() + ' Day(s)');
                  // } else {
                  //   $('#durations').html("");
                  // }

     }//end of savedata

   }
 });

 </script>

<script type="text/javascript">
  /*custom js here*/
  function opensider(type){

    if(type=='add'){
        $(".select2").val() ;
        $('.select2-icons').val([]);
        $('.select2-icons').trigger('change');
        $(".ql-editor").html('');
    }


     $("#mylabel").html("Add new {{$label}}");
       initAutocomplete();

     $(".add-new-data").addClass("show");
     $(".overlay-bg").addClass("show");
     $(".select152").select2();
     $(".tooltip").removeClass('show');
  }

  $(".hide-data-sidebar, .cancel-data-btn").on("click", function () {
      $(".add-new-data").removeClass("show");
      $(".overlay-bg").removeClass("show");
      // $("#data-name, #data-price").val("");
      // $("#data-category, #data-status").prop('selectedIndex', 0);
      $("#user_id").val("");
      $(".tooltip").removeClass('show');
      $("#frmAddData")[0].reset();
      vm.eventImages = [];
      $("#frmAddData-t-0").click();
  });
  if ($(".data-items").length > 0) {
    new PerfectScrollbar(".data-items", { wheelPropagation: false });
  }


</script>
<!-- <script src="{{env('APP_URL')}}public/app-assets/js/scripts/forms/custome_wizard-steps.js"></script> -->
<script type="text/javascript">
    $(document).ready(function (){

    });
var fullEditor = '';
var second_editor='';
 function reinitEditor(){

   var fullEditor = new Quill('#full-container .editor', {
     bounds: '#full-container .editor',
     modules: {
       'formula': true,
       'syntax': true,
       'toolbar': [
         [{
           'font': []
         }, {
           'size': []
         }],
         ['bold', 'italic', 'underline', 'strike'],
         [{
           'color': []
         }, {
           'background': []
         }],
         [{
           'script': 'super'
         }, {
           'script': 'sub'
         }],
         [{
           'header': '1'
         }, {
           'header': '2'
         }, 'blockquote', 'code-block'],
         [{
           'list': 'ordered'
         }, {
           'list': 'bullet'
         }, {
           'indent': '-1'
         }, {
           'indent': '+1'
         }],
         ['direction', {
           'align': []
         }],
         ['link', 'image', 'video', 'formula'],
         ['clean']
       ],
     },
     theme: 'snow'
   });

   var second_editor = new Quill('.second_editor', {
     bounds: '.second_editor',
     modules: {
       'formula': true,
       'syntax': true,
       'toolbar': [
         [{
           'font': []
         }, {
           'size': []
         }],
         ['bold', 'italic', 'underline', 'strike'],
         [{
           'color': []
         }, {
           'background': []
         }],
         [{
           'script': 'super'
         }, {
           'script': 'sub'
         }],
         [{
           'header': '1'
         }, {
           'header': '2'
         }, 'blockquote', 'code-block'],
         [{
           'list': 'ordered'
         }, {
           'list': 'bullet'
         }, {
           'indent': '-1'
         }, {
           'indent': '+1'
         }],
         ['direction', {
           'align': []
         }],
         ['link', 'image', 'video', 'formula'],
         ['clean']
       ],
     },
     theme: 'snow'
   });

 }
 setTimeout(function () {
   reinitEditor();
   $('.startdate').datepicker({
       format: "dd-mm-yyyy",
       startDate: '-0d',
   }).on('changeDate', function(e){

        var t2=$('#startdate').val();
        t2=t2.split('-');
        dt_t2=new Date(t2[2],t2[1]-1,t2[0]);

         $(".enddate").datepicker("update", new Date(dt_t2)); //set new date
         $(".enddate").datepicker("setStartDate", new Date(dt_t2)); //disable past dates

        var fromDate = moment($('#startdate').val(), 'DD-MM-YYYY');
        var toDate = moment($('#enddate').val(), 'DD-MM-YYYY');
        if (fromDate.isValid() && toDate.isValid()) {
          var duration = moment.duration(toDate.diff(fromDate));
          $('#durations').html( duration.years() + ' Year(s) ' + duration.months() + ' Month(s) ' + duration.days() + ' Day(s)');
        } else {
            $('#durations').html("");
        }


    });
   $(".startdate").datepicker("update", new Date());
   $('#reminderdate').datepicker({
       format: "dd-mm-yyyy",
       startDate: '-0d',
   });
   $('.enddate').datepicker({
       format: "dd-mm-yyyy",
   }).on('changeDate', function (ev) {
          var fromDate = moment($('#startdate').val(), 'DD-MM-YYYY');
          var toDate = moment($('#enddate').val(), 'DD-MM-YYYY');
          if (fromDate.isValid() && toDate.isValid()) {
            var duration = moment.duration(toDate.diff(fromDate));
            $('#durations').html( duration.years() + ' Year(s) ' + duration.months() + ' Month(s) ' + duration.days() + ' Day(s)');
          } else {
            $('#durations').html("");
          }
  });

  $("#selectteam").select2({
      minimumResultsForSearch: Infinity,
      templateResult: iconFormat,
      templateSelection: iconFormat,
      escapeMarkup: function(es) { return es; }
  });

  $("#tags").select2({
      minimumResultsForSearch: Infinity,
      escapeMarkup: function(es) { return es; }
  });


    //$("#tags").select2();
    $("#project").select2();
    $("#starttime").select2();
    $("#endtime").select2();
    $("#remindertime").select2();
    $("#creator").select2();
    $('#creator').on("select2:select", function(e) { 
          vm.creator = $(this).val();
    });
 }, 500);



 var init_lat = 28.7041;
 var init_lng = 77.1025;
 function initMap() {
   var position = {lat:parseFloat(init_lat), lng:parseFloat(init_lng)};
    var map = new google.maps.Map(
       document.getElementById('map'), {zoom: 10, center: position});
   //var marker = new google.maps.Marker({position: position, map: map});



   var img_marker = '{{env("APP_URL")}}public/assets/images/marker.png';
   var marker = new google.maps.Marker({
   map: map,
   draggable: true,
   animation: google.maps.Animation.DROP,
   position: position,
   icon:  img_marker
   });
   google.maps.event.addListener(marker,'dragend',function(event)
   {
       $("#lat").val(this.position.lat());
       $("#lng").val(this.position.lng());
   });
   marker.setMap(map);

 }
 function initAutocomplete() {
      autocomplete = new google.maps.places.Autocomplete(
      document.getElementById('location'), {types: ['geocode']});
      autocomplete.setFields(['address_component']);
      autocomplete.addListener('place_changed', fillInAddress);
}

function fillInAddress(){
   AddLocationToMap($("#location").val());
}

setTimeout(function () {
    initAutocomplete();
}, 1000);


function AddLocationToMap(address)
   {
        if($.trim(address)==""){
          return false;
        }
       var map;
       geocoder = new google.maps.Geocoder();
       //var latlng = new google.maps.LatLng($("#LatLong").val());
       var mapOptions = {zoom: 10, mapTypeId: google.maps.MapTypeId.ROADMAP}
       var map = new google.maps.Map(document.getElementById("map"), mapOptions);
       geocoder.geocode({'address':address},function(results, status)
       {
           if(status == google.maps.GeocoderStatus.OK)
           {
               var position =results[0].geometry.location;

               $("#lat").val(position.lat());
               $("#lng").val(position.lng());
               map.setCenter(results[0].geometry.location);
               var lt = new google.maps.LatLng(results[0].geometry.location);
               var img_marker = '{{env("APP_URL")}}public/assets/images/marker.png';
               var marker = new google.maps.Marker({
               map: map,
               draggable: true,
               animation: google.maps.Animation.DROP,
               position: position,
               icon:  img_marker
               });
               google.maps.event.addListener(marker,'dragend',function(event)
               {
                   $("#lat").val(this.position.lat());
                   $("#lng").val(this.position.lng());
               });
               marker.setMap(map);
            }
           else
           {

           }
       });
   }


   function deletegalleryimage(id){
            $("#GalleryBox"+id).remove();
   }
   $(document).on("change","#imagefile",function(){
     var fileExtension = ['jpeg', 'jpg', 'png', 'gif', 'bmp'];
      if ($.inArray($(this).val().split('.').pop().toLowerCase(), fileExtension) == -1) {
       alert("Only formats are allowed : "+fileExtension.join(', '));
      }
                var addBusOwnerForm= $('#frmAddData')[0];
                var htmlview = $("#ShowHide").html();
                $(".Outputshow").append(htmlview);
                var formData = new FormData(addBusOwnerForm);
                $.ajax({
                    type:'POST',
                    url: '{{route("uploadimage")}}',
                    data:formData,
                    cache:false,
                    contentType: false,
                    processData: false,
                    success:function(response){
                        setTimeout(function(){
                        $(".Outputshow #ShowHideOpen").remove();
                        $(".Outputshow").append(response);
                      }, 1000);
                    },
                    error: function(response){
                      console.log('Error '+response);
                    }
                });
      });

      $(document).on("change","#imagefile1",function(){
        var fileExtension = ['jpeg', 'jpg', 'png', 'gif', 'bmp'];
         if ($.inArray($(this).val().split('.').pop().toLowerCase(), fileExtension) == -1) {
          alert("Only formats are allowed : "+fileExtension.join(', '));
         }
                   var addBusOwnerForm= $('#frmAddData')[0];
                   var htmlview = $("#ShowHide").html();
                   $(".Outputshow1").append(htmlview);
                   var formData = new FormData(addBusOwnerForm);
                   $.ajax({
                       type:'POST',
                       url: '{{route("uploadimage1")}}',
                       data:formData,
                       cache:false,
                       contentType: false,
                       processData: false,
                       success:function(response){
                           setTimeout(function(){
                           $(".Outputshow1 #ShowHideOpen").remove();
                           $(".Outputshow1").append(response);
                         }, 1000);
                       },
                       error: function(response){
                         console.log('Error '+response);
                       }
                   });
         });
        //$(".Outputshow").sortable();
        $(function () {
                $('#datetimepicker3').datetimepicker({
                    format: 'HH:mm'
                });
            });

         $(document).on('click',".slidedown",function(){

              //$("#collapse2").show().slidedown();
              $('#collapse2').fadeToggle('slow');
         });

</script>

 <script async defer  src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyB9LpeqTEBlQPhGSmgl_G5i4-sWWBEr60E&callback=initMap">
 </script>


 @stop
