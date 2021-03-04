@extends('layouts.main')
@php 
use App\Helper\AccessHelper;  
$accessAble = AccessHelper::isAccessAble(auth()->user()->id, 'task'); 
@endphp
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
 <link rel="stylesheet" type="text/css" href="{{env('APP_URL')}}public/app-assets/vendors/css/editors/quill/quill.snow.css">
 <link rel="stylesheet" type="text/css" href="{{env('APP_URL')}}public/app-assets/vendors/css/editors/quill/quill.bubble.css">

 <link rel="stylesheet" type="text/css" href="{{env('APP_URL')}}public/app-assets/vendors/css/editors/quill/katex.min.css">
 <link rel="stylesheet" type="text/css" href="{{env('APP_URL')}}public/app-assets/vendors/css/editors/quill/monokai-sublime.min.css">
 <link rel="stylesheet" type="text/css" href="{{env('APP_URL')}}public/app-assets/vendors/css/editors/quill/quill.snow.css">
 <link rel="stylesheet" type="text/css" href="{{env('APP_URL')}}public/app-assets/vendors/css/editors/quill/quill.bubble.css">
 <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.css">

 <style>
 </style>
 @stop
 @section('content')
 <div class="content-wrapper" id="UserVueApp">
            <div class="content-header row">
              <div class="content-header-left col-md-9 col-12 mb-2">
                  <div class="row breadcrumbs-top">
                      <div class="col-12">
                          <h2 class="content-header-title float-left mb-0">{{$title}}</h2>

                          <div class="content-body">
                              <!-- Snow Editor start -->

                              <!-- Snow Editor end -->



                              <!-- Bubble Editor end -->



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
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col">
                                            <label for="userstatus">Status</label>
                                            <fieldset class="form-group">
                                                <select class="form-control" id="userstatus" name="userstatus" v-model="userstatus">
                                                    <option selected value="">All</option>
                                                    <option value="1">Active</option>
                                                    <option value="0">InActive</option>
                                                </select>
                                            </fieldset>
                                        </div>
                                        <div class="col">
                                            <label for="verifystatus">Search</label>
                                            <fieldset class="form-group">
                                                <input type="text" class="form-control" name="txtsearch" value="txtsearch" v-model="txtsearch">
                                            </fieldset>
                                        </div>
                                        
                                        <div class="col rslt-btn ">
                                            <a class="opensider"></a>
                                            @if(in_array($accessAble, ['authorized','grant_acces']))
                                              <button type="button" class="btn btn-primary mt-2 round opensider" id="opensider">
                                                  <i class="feather icon-plus"></i> New {{$label}}
                                              </button>
                                            @endif
                                            <!-- <button type="button" class="btn mt-2 btn-outline-primary btn-icon btn-block text-uppercase">Show Results</button> -->
                                        </div>
                                        
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- End: User form -->

                    <!-- Begin Users Profile -->
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <!-- <fieldset class="form-group ml-2">
                                    <select class="form-control text-uppercase btn-outline-primary round table-action" id="customSelect5">
                                        <option selected>action</option>
                                        <option value="action 1">action 1</option>
                                        <option value="action 2">action 2</option>
                                        <option value="action 3">action 3</option>
                                    </select>
                                </fieldset> -->

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
                                                <div class="hide-data-sidebar"   >
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
                                             <form action="#" method="post" id="frmAddData" name="frmAddData" class="steps-validation ">
                                               <input type="hidden" name="_token"  value="{{csrf_token()}}">

                                               <input type="hidden" name="user_id" id="user_id" value="">

                                                      <div class="row">
                                                       <div class="col-lg-6">
                                                           <div class="form-group">
                                                               <label for="title">Name *</label>
                                                                <input type="text"  data-msg="Please enter project name"  id="title" class="form-control" required placeholder="title" name="title">
                                                           </div>
                                                       </div>
                                                       <div class=" col-lg-6">
                                                           <div class="form-group">
                                                               <label for="priority">Priority</label>
                                                               <select class="form-control" name="priority" id="priority">
                                                                 <option v-for="praio in getPriority " :value="praio.name">@{{praio.name}}</option>
                                                               </select>
                                                            </div>
                                                       </div>

                                                       <!-- full Editor start -->
                                                       <div class=" col-lg-12">
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


                                                       <div class=" col-lg-6">
                                                           <div class="form-group">
                                                               <label for="title">Task Manager</label>
                                                               <select data-placeholder="Select project leader" class="select2-icons form-control" id="manager_id" name="manager_id" required>
                                                                 <optgroup label="Project Lead">
                                                                   <option v-for="data in usersList"   data-icon="aa" :value="data.id" :data-thumbnail="'{{UserPath}}'+data.id+'/Thumb/'+data.profile_pic">@{{data.first_name}}</option>
                                                                 </optgroup>
                                                               </select>
                                                            </div>
                                                       </div>
                                                       <div class=" col-lg-6">
                                                           <div class="form-group">
                                                               <label for="title">Task Assignee</label>
                                                               <select data-placeholder="Select a project mananger..." class="select2-icons form-control" id="assign_id" name="assign_id" required>
                                                                 <optgroup label="">
                                                                   <option v-for="data in usersList" data-icon="aa" :value="data.id" :data-thumbnail="'{{UserPath}}'+data.id+'/Thumb/'+data.profile_pic">@{{data.first_name}}</option>
                                                                 </optgroup>
                                                               </select>
                                                            </div>
                                                       </div>
                                                       <div class=" col-lg-12">
                                                           <div class="form-group">
                                                               <label for="title">Observers</label>
                                                               <select data-placeholder="Select team..." class="select2-icons form-control" id="observers" name="observers[]" multiple="multiple" required>
                                                                 <optgroup label="Services">
                                                                    <option v-for="data in usersList"   data-icon="aa"  :value="data.id" :data-thumbnail="'{{UserPath}}'+data.id+'/Thumb/'+data.profile_pic" >@{{data.first_name}}</option>
                                                                 </optgroup>
                                                               </select>
                                                            </div>
                                                       </div>

                                                       <div class="clearfix">

                                                       </div>

                                                       <div class="col-md-12 col-12 mb-1">
                                                               <label for="title">Check list</label>
                                                               <fieldset  v-for="(input,k) in inputs" :key="k" class="checklistpd">
                                                                 <div class="input-group">
                                                                   <div class="input-group-prepend">
                                                                     <div class="input-group-text">
                                                                       <div class="vs-checkbox-con">
                                                                         <input type="checkbox" value="false" disabled checked v-if="input.status==1">
                                                                         <input type="checkbox" value="false" v-else>
                                                                         <span class="vs-checkbox vs-checkbox-sm">
                                                                           <span class="vs-checkbox--check">
                                                                             <i class="vs-icon feather icon-check"></i>
                                                                           </span>
                                                                         </span>
                                                                       </div>
                                                                     </div>
                                                                   </div>
                                                                   <input type="text" class="form-control" :value="input.title" placeholder="Enter Task" aria-describedby="button-addon2" name="tasklist[]" >
                                                                   <input type="hidden" class="form-control" :value="input.id" placeholder="Enter Task" aria-describedby="button-addon2" name="tasklistid[]" >
                                                                   <div class="input-group-append" id="button-addon2" @click="remove(k)" v-show="k || ( !k && inputs.length > 1)">
                                                                     <button class="btn btn-danger btnpd" type="button" >
                                                                        <i class="fa fa-minus-circle"  ></i>
                                                                      </button>
                                                                   </div>
                                                                   <div class="input-group-append" id="button-addon2" @click="add(k)" v-show="k == inputs.length-1">
                                                                     <button class="btn btn-success btnpd" type="button">
                                                                       <i class="fa fa-plus-circle"  ></i>
                                                                     </button>
                                                                   </div>
                                                                 </div>
                                                               </fieldset>
                                                       </div>
                                                       <div class=" col-lg-12 ">
                                                           <div class="form-group">
                                                               <label for="title">Tags</label>
                                                               <select data-placeholder="Select team..." class="select2-icons form-control" id="tags" name="tags[]" multiple="multiple" required>
                                                                 <optgroup label="Services">
                                                                    <option v-for="data in tagList"    :value="data.id"  >@{{data.title}}</option>
                                                                 </optgroup>
                                                               </select>
                                                            </div>
                                                       </div>
                                                       <div class=" col-lg-12">
                                                           <div class="form-group">
                                                               <label for="title">Related to project</label>
                                                               <select data-placeholder="Select team..." class="select2 form-control" id="project" name="project"   required>
                                                                    <option v-for="data in projectList"    :value="data.id"   >@{{data.project_name}}</option>
                                                               </select>
                                                            </div>
                                                       </div>
                                                       
                                                       
                                                      
                                                       <div class=" col-lg-3">
                                                           <div class="form-group">
                                                               <label for="startdate">Start Date</label>
                                                               <fieldset class="form-group position-relative has-icon-left input-divider-left">
                                                                   <input type="text" data-msg="Please enter Event start date" id="startdate" required="required" placeholder="Event start date" name="startdate" class="form-control startdate">
                                                                   <div class="form-control-position"><i class="feather icon-calendar"></i></div>
                                                               </fieldset>
                                                            </div>
                                                       </div>
                                                       <div class=" col-lg-3">
                                                           <div class="form-group">
                                                               <label for="starttime">Start Time</label>
                                                               <select data-placeholder="Select team..." class="select2 form-control" id="starttime" name="starttime"   required>
                                                                    <option v-for="data in timeSlot"    :value="data.value"   >@{{data.name}}</option>
                                                               </select>
                                                           </div>
                                                       </div>
                                                       <div class=" col-lg-3">
                                                           <div class="form-group">
                                                               <label for="enddate">End Date</label>
                                                               <fieldset class="form-group position-relative has-icon-left input-divider-left">
                                                                   <input type="text" data-msg="Please enter first name" id="enddate" required="required" placeholder="End DateTime" name="enddate" class="form-control enddate">
                                                                   <div class="form-control-position"><i class="feather icon-calendar"></i></div>
                                                               </fieldset>
                                                            </div>
                                                       </div>
                                                       <div class=" col-lg-3">
                                                           <div class="form-group">
                                                               <label for="endtime">End Time</label>
                                                               <select data-placeholder="Select team..." class="select2 form-control" id="endtime" name="endtime"   required>
                                                                    <option v-for="data in timeSlot"    :value="data.value"   >@{{data.name}}</option>
                                                               </select>
                                                           </div>
                                                       </div>

                                                       <div class=" col-lg-3">
                                                           <div class="form-group">
                                                               <label for="reminderdate">Remainder Date</label>
                                                               <fieldset class="form-group position-relative has-icon-left input-divider-left">
                                                                   <input type="text" data-msg="Please enter first name" id="reminderdate"  placeholder="Remainder Date" name="reminderdate" class="form-control reminderdate">
                                                                   <div class="form-control-position"><i class="feather icon-calendar"></i></div>
                                                               </fieldset>
                                                            </div>
                                                       </div>
                                                       <div class=" col-lg-3">
                                                           <div class="form-group">
                                                               <label for="remindertime">Remainder Time</label>
                                                               <select data-placeholder="Select team..." class="select2 form-control" id="remindertime" name="remindertime"    >
                                                                    <option v-for="data in timeSlot"    :value="data.value"   >@{{data.name}}</option>
                                                               </select>
                                                           </div>
                                                       </div>
                                                       <div class=" col-lg-12 ">
                                                           <div class="form-group">
                                                               <fieldset class="checkbox">
                                                                    <div class="vs-checkbox-con vs-checkbox-primary">
                                                                        <input type="checkbox" name="is_repeating" id="is_repeating" value="1" >

                                                                        <span class="vs-checkbox">
                                                                            <span class="vs-checkbox--check">
                                                                                <i class="vs-icon feather icon-check"></i>
                                                                            </span>
                                                                        </span>
                                                                        <span class="">Make Reccuring / Reapeating</span>
                                                                    </div>
                                                                </fieldset>
                                                            </div>
                                                       </div>
                                                       <div class=" col-lg-12">
                                                           <div class="form-group">
 <!-- start recurrening -->
<div class="shadow   bg-white rounded cardtoppad" style="background: gold;padding:20px;display:none" id="RecurDiv">
  <div class="form-group">
		<label for="mode" class="col-xs-3 control-label">Mode</label>
		<div class="col-xs-9">
		<select class="form-control input-small" id="mode" name="mode" v-model="recur.mode" @change="modechangeevent($event)" data-rule-required="true" data-msg-required="Mode Required">
			<!-- <option value="daily">Daily</option> -->
			<option value="weekly">Weekly</option>
			<option value="monthly">Monthly</option>
			<!-- <option value="annually">Annually</option> -->
		</select>
		</div>	
 </div>     
  
 
 <div class="form-group"  v-if="recur.mode=='weekly'">
		<label for="interval" class="col-xs-3 control-label">Repeats on</label>
		<ul class="list-unstyled mb-0" >
        <li class="d-inline-block mr-2"  v-for="rdata in repeaton">
            <fieldset class="checkbox">
                <div class="vs-checkbox-con vs-checkbox-primary">
                    <input type="checkbox" name="day[]" id="day"  :value="rdata.dayno">
                    <span class="vs-checkbox">
                        <span class="vs-checkbox--check">
                            <i class="vs-icon feather icon-check"></i>
                        </span>
                    </span>
                    <span class="">@{{rdata.day}}</span>
                </div>
            </fieldset>
        </li>
		</ul>	
 </div>
  
  <div  v-if="recur.mode=='monthly' || recur.mode=='annually'">
      <div class="form-group">
          <label for="recur_enddate">End Date</label>
          <fieldset class="form-group position-relative has-icon-left input-divider-left">
              <input type="text" data-msg="Please enter end date" id="recur_enddate" required="required" placeholder="End date" name="recur_enddate" class="form-control">
              <div class="form-control-position"><i class="feather icon-calendar"></i></div>
          </fieldset>
      </div>
      
  </div>


</div> 
<!-- end recurrening -->
                                                           </div>
                                                       </div>
                                                       <div class="col-lg-12">
                                                            <div class="form-group">
                                                                <label for="title">Select Images</label><br>
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

                                                              <div v-for="(data, key) in eventImages">
                                                                      <div title='' :id="'GalleryBox'+data.file_url" class='profile-picImg GalleryBox clearimx'>
                                                                        <input type="hidden" :value="data.file_url" name="imagename[]" id="imagename">
                                                                        <div class='iconclose' v-on:click="updatearray(key,data.id)"   >X</div>
                                                                        <input type='hidden'  :value="data.file_name"  name='orgimagename[]' id='orgimagename'>




                                                                        <div class='iconfile'>
                                                                          <a :href="'{{TaskAbsPath}}'+data.task_id+'/'+data.file_url" target='_blank' style='float: left;'>
                                                                            <i v-if="['png','jpeg','jpg'].includes(data.file_name.split('.').pop())" class='fa fa-file-image-o iconsize'></i>
                                                                            <i v-else-if="['png','jpg','jpeg','bmp','gif'].includes(data.file_name.split('.').pop())"></i>
                                                                            <i v-else-if="['pdf'].includes(data.file_name.split('.').pop())" class='fa fa-file-pdf-o iconsize'></i>
                                                                            <i v-else-if="['ppt','pptx'].includes(data.file_name.split('.').pop())" class='fa fa-file-powerpoint-o iconsize'></i>
                                                                            <i v-else-if="['doc','docx'].includes(data.file_name.split('.').pop())" class='fa fa-file-word-o iconsize' ></i>
                                                                            <i v-else class='fa fa-file-o iconsize'> </i>
                                                                          </a>
                                                                        </div>
                                                                        <div class='icontitle'>
                                                                          <a  :href="'{{TaskAbsPath}}'+data.task_id+'/'+data.file_url"  target='_blank'>@{{data.file_name}}</a>
                                                                        </div>
                                                                        <div></div>
                                                                        <div class='iconsubtitle'> @{{data.file_name.split('.').pop()}}</div>
                                                                      </div>
                                                                      <div class='clearfix'></div>
                                                              </div>


                                                            </div>
                                                            <input type="hidden" name="deletedImage" v-model="deletedImage" value="">
                                                       </div>

                                                       <!-- full Editor end -->
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
                            <div class="card-dashboard">
                                <div class="table-responsive">
                                    <table class="table zero-configuration" id="">
                                        <thead>
                                            <tr class="text-uppercase">
                                                <th>id</th>
                                                <th>Task Name</th>
                                                <th>Task Manager</th>
                                                <th>Task Assignee</th>
                                                <th>Cause</th>
                                                <th>Start Date</th>
                                                <th>End Date</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          <tr v-if='users.data.length>0  && !loading' v-for='user in users.data '>
                                                <td>@{{user.id}}</td>
                                                <td class="text-nowrap"> <a  href="javascript:void(0)" v-on:click="getUserDetails(user.id,user)" > @{{user.title}}</a></td>
                                                <td class="text-nowrap"> 
                                                    <span v-if="user.manager_id"> 
                                                        <a  v-on:click="goDetails(user.manager_id)" class="linkcolor" >                            
                                                            <img class="round" :src="user.manager_image"  onerror="this.src='{{Assets}}images/user.png'" alt="avtar img holder" height="32" width="32">
                                                            @{{user.manager_name}}
                                                            <!-- <span  v-if="user.manager_role_id!=2" >@{{user.manager_name}}</span>  -->
                                                        </a>
                                                    </span> 
                                                    <span v-else>-</span>
                                                </td>
                                                <td class="text-nowrap"> 
                                                    <span v-if="user.assignee_id"> 
                                                        <a  v-on:click="goDetails(user.assignee_id)" class="linkcolor" >                            
                                                            <img class="round" :src="user.assignee_image"  onerror="this.src='{{Assets}}images/user.png'" alt="avtar img holder" height="32" width="32">
                                                            @{{user.assignee_name}}
                                                            <!-- <span  v-if="user.assignee_role_id!=2" >@{{user.assignee_name}}</span>  -->
                                                        </a>
                                                    </span> 
                                                    <span v-else>-</span>
                                                </td>
                                                <td>@{{user.project_name}}</td>
                                                <td>@{{user.start_date}}</td>
                                                <td>@{{user.end_date}}</td>
                                                
                                                
                                                <td v-if="user.status==1" class="text-success">Active</td>
                                                <td v-if="user.status==0" class="text-secondary">InActive</td>
                                                <td v-if="user.status==2" class="text-danger">Blocked</td>
                                                <td>
                                                    <div class="btn-group" role="group" aria-label="Basic example">
                                                        
                                                        <button v-on:click="getUserDetails(user.id,user)"  data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit {{$label}}" type="button" class="btn btn-outline-primary groupbtn waves-effect waves-light"><i class="feather icon-edit-2"></i></button>
                                                        @if(in_array($accessAble, ['authorized','grant_acces']))
                                                        <button :id="user.id" data-status="active" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete {{$label}}" type="button"  class="btn btn-outline-primary groupbtn grouplborder0 waves-effect waves-light   deleteUser"  ><i class="feather icon-trash deleteUser"></i></button>
                                                        @endif
                                                        <!-- <button  data-toggle="tooltip" data-placement="top" title="" data-original-title="View profile" type="button" class="btn btn-outline-primary groupbtn waves-effect waves-light"><i class="feather icon-eye"></i></button> -->
                                                    </div>
                                                </td>
                                            </tr>


                                        </tbody>
                                    </table>
                                    @include('layouts.pagingView')
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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
  <!-- <script src="{{env('APP_URL')}}public/app-assets/js/scripts/forms/select/form-select2.js"></script> -->



  <script src="{{env('APP_URL')}}public/app-assets/js/scripts/editors/full-editor-quill.js"></script>

  @include('layouts.pagingTemplateSource')
  <script type="text/javascript" src="{{env('APP_URL')}}public/assets/js/vue.code.js"></script>
 <script>
 // Full Editor


  $(document).on("mouseover",".GalleryBox",function(){
      $(".iconclose").css("display", "block");
  });


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
                       url:'{{route("deleteTask")}}',
                       type:'post',
                       data:{
                           _token:'{{csrf_token()}}',
                           id:id,
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
 });



 // Format icon
 /*
 function iconFormat(icon) {
     var originalOption = icon.element;
     if (!icon.id) { return icon.text; }
     var $icon = "<img class='selectimage' src='" + $(icon.element).data('thumbnail') + "'></i>" + icon.text;

     return $icon;
 }*/

 var vm = new Vue({
   el:"#UserVueApp",
   data:{
       users:{ total: 0, per_page: 2, from: 1, to: 0, current_page: 1, data:[] },
       search:'',
       repeaton:[{'day':"Sunday","dayno":0},{'day':"Monday","dayno":1},{'day':"Tueday","dayno":2},{'day':"Wednesday","dayno":3},{'day':"Thursday","dayno":4},{'day':"Friday","dayno":5},{'day':"Saturday","dayno":6}],
       recur:{mode:'daily',interval_month:1,repeat_on:0,endtype:''},
       pagechange:20,
       loading:true,
       load:1,
       getPriority: {!!json_encode($getPriority)!!},
       usersList: {!!json_encode($usersList)!!},
       tagList: {!!json_encode($tagList)!!},
       projectList: {!!json_encode($projectList)!!},
       timeSlot: {!!json_encode($timeSlot)!!},
       pagination:{meta:{}},
       userstatus:"",
       eventImages: {},
       deletedImage:[],
       verifystatus:"",
       txtsearch:"",
       inputs:[
            {
                title: '',
                id:''
            }
        ]
   },
   watch:{
      
      userstatus:function(){
          this.getUsers();
      },
      txtsearch:function(){
          this.getUsers();
      },

   }
   ,
   mounted:function(){
      this.getUsers();
   },
   methods:{
     modechangeevent: function(){
        setTimeout(() => {
          $("#recur_enddate").datepicker({format: "dd-mm-yyyy"});
          var t2=$("#enddate").val();
          if(t2==""){
                  $("#recur_enddate").datepicker("update", new Date());
                  $("#recur_enddate").datepicker("setStartDate", new Date());
          }else{
                  t2=t2.split('-');
                  dt_t2=new Date(t2[2],t2[1]-1,t2[0]);
                  $("#recur_enddate").datepicker("update", new Date(dt_t2));
                  $("#recur_enddate").datepicker("setStartDate", new Date());  
          }
        }, 500);
        
     },
     goDetails: function(string) {
            var Newurl ="{{route('viewprofile','MID')}}";
            window.location.href = Newurl.replace('MID',string);
     }, 
     add(index) {
            var selfi = this;
            selfi.inputs = [];
            var values = $("input[name='tasklist[]']")
              .map(function(){return $(this).val();}).get();


            var iDvalues = $("input[name='tasklistid[]']")
              .map(function(){return $(this).val();}).get();

          
            if(values.length>0){
                values.forEach(function(item,index){
                    //alert(index+JSON.stringify("malhar => "+item));
                    selfi.inputs.push({ title: item,id:iDvalues[index]});
                });
                this.inputs.push({ title: '','id':'' });
            }else{
                this.inputs.push({ title: '','id':'' });
            }
            
     },
     remove(index) {
           this.inputs.splice(index, 1);
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

       $.ajax({
         url:'{{route("ajaxTask")}}',
         type:'post',
         data:{
               _token:'{{csrf_token()}}',
               search:self.search,
               page:self.users.current_page,
               pageno:self.pagechange,
               userstatus:self.userstatus,
               txtsearch:self.txtsearch,
          },
         beforeSend:function(){
             if(!load)
             self.loading=true;
         }
         ,
         success:function(res){
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
                  $("#description").val($(".ql-editor").html());
                  jQuery.ajax({
                         url:'{{route("addTask")}}',
                         type:'post',
                         data: $('#frmAddData').serialize(),
                         beforeSend:function(){
                             if(!load)
                             self.loading=true;
                         },
                         success:function(res){
                              if(res.status){
                                  $(".hide-data-sidebar").click();
                                  toastr.success(res.msg,'Success!');
                                  $(".Outputshow").html('');
                                  vm.getUsers();
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
          }
     },
     getUserDetails:function(id,jsondata){
                  var self=this;
                  $("#user_id").val(jsondata.id);
                  $("#title").val(jsondata.title);
                  $(".ql-editor").html(jsondata.description);
                  $("#priority").val(jsondata.priority);


                    
                   $('.opensider').click();
                  $("#mode").val(jsondata.mode);
                  vm.recur.mode = jsondata.mode;
                  if(jsondata.is_recurring){
                      $("#is_repeating").attr('checked',true);
                      $("#RecurDiv").show();
                       
                  }else{
                      $("#is_repeating").attr('checked',false);
                      $("#RecurDiv").hide();
                      vm.recur.mode = '';
                  }

                  if(vm.recur.mode == 'monthly'){
                       
                      setTimeout(() => {
                        $("#recur_enddate").datepicker({format: "dd-mm-yyyy"});
                        var t2=jsondata.recur_enddate;
                        t2=t2.split('-');
                        dt_t2=new Date(t2[2],t2[1]-1,t2[0]);
                        $("#recur_enddate").datepicker("update", new Date(dt_t2));
                        $("#recur_enddate").datepicker("setStartDate", new Date());  
                      }, 500);
                      
                  }
                  
                   
                  // $("input:checkbox[name='day[]']").each(function () {
                  //     alert($(this).val());
                  //     $(this).prop("checked", ($.inArray($(this).val(), [2,3,4]) != -1));
                  // });  
                   
                  setTimeout(() => {
                      $.each(jsondata.day, function (index, value){
                            $("input:checkbox[name='day[]'][value='"+value+"']").prop('checked',true);
                      });  
                  }, 300); 
                    

                  $('#assign_id').val('');
                  $('#assign_id').trigger('change');
                  $('#manager_id').val('');
                  $('#manager_id').trigger('change');
                  $('#observers').val([]);
                  $('#observers').trigger('change');

                  $("#manager_id").val(jsondata.manager_id);
                  $('#manager_id').trigger('change');
                  $("#planned_revenue").val(jsondata.planned_revenue);
                  $("#planned_expenses").val(jsondata.planned_expense);
                  
                  $("#startdate").val(jsondata.start_date);
                  $("#enddate").val(jsondata.end_date);
                  $("#reminderdate").val(jsondata.reminder_date);

                  vm.eventImages = jsondata.getTaskDocuments;
                 
                  $("#starttime").val(jsondata.start_time);
                  $("#endtime").val(jsondata.end_time);
                  $("#remindertime").val(jsondata.reminder_time);
                 
                  $("#status").prop('checked',jsondata.status);
                  
                  var item = [];
                  $.each(jsondata.get_team, function (index, value){
                      item.push(value.user_id);
                  });
                  $('#observers').val(item);
                  $('#observers').trigger('change');
                  $('#assign_id').val([jsondata.assignee_id]).trigger('change');
                  if(jsondata.get_checkList.length>0){
                      self.inputs = jsondata.get_checkList;
                  }else{
                      self.inputs = [
                           {
                               title: '',id:''
                           }
                       ];
                  }

                  var itemItem = [];
                  $.each(jsondata.tags, function (index, value){
                        itemItem.push(value.id);
                  });
                  $('#tags').val(itemItem);
                  $('#tags').trigger('change');


                  $("#mylabel").html("Update {{$label}}");

                  var fromDate = moment($('#startdate').val(), 'DD-MM-YYYY');
                  var toDate = moment($('#enddate').val(), 'DD-MM-YYYY');
                  if (fromDate.isValid() && toDate.isValid()) {
                    var duration = moment.duration(toDate.diff(fromDate));
                    $('#durations').html( duration.years() + ' Year(s) ' + duration.months() + ' Month(s) ' + duration.days() + ' Day(s)');
                  } else {
                    $('#durations').html("");
                  }
                   
                    

     }//end of savedata

   }
 });

 </script>

<script type="text/javascript">
  /*custom js here*/
  $(".opensider").on("click", function (){
      $("#mylabel").html("Add new {{$label}}");
      $(".add-new-data").addClass("show");
      $(".overlay-bg").addClass("show");
      $(".select152").select2();
      $(".tooltip").removeClass('show');
      vm.inputs =[
                    {
                        title: '',
                        id:'',
                    }
                 ];
  });
  $(".hide-data-sidebar, .cancel-data-btn").on("click", function () {
     
      $(".add-new-data").removeClass("show");
      $(".overlay-bg").removeClass("show");
      $("#user_id").val("");
      $(".tooltip").removeClass('show');
      $("#frmAddData")[0].reset();
      $("#frmAddData-t-0").click();
      $(".ql-editor").html('');
      $('#assign_id').val('');
      $('#assign_id').trigger('change');
      $('#manager_id').val('');
      $('#manager_id').trigger('change');
      $('#observers').val([]);
      $('#observers').trigger('change');
      $('#tags').val([]);
      $('#tags').trigger('change');

      $("#manager_id").val([]);
      $('#manager_id').trigger('change');
      $("#is_repeating").attr('checked',false);
      $("#RecurDiv").hide();
      vm.recur.mode = '';
      $(".Outputshow").html('');
  });
  if ($(".data-items").length > 0) {
    new PerfectScrollbar(".data-items", { wheelPropagation: false });
  }


</script>
<!-- <script src="{{env('APP_URL')}}public/app-assets/js/scripts/forms/custome_wizard-steps.js"></script> -->
<script type="text/javascript">
    $(document).ready(function (){

    });


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
 }
 setTimeout(function () {
   reinitEditor();

   


     $('#reminderdate').datepicker({
       format: "dd-mm-yyyy",
       startDate: '-1d',
   });
   $('.startdate').datepicker({
       format: "dd-mm-yyyy",
       startDate: '-0d',
   }).on('changeDate', function(e){

        var t2=$('#startdate').val();
        t2=t2.split('-');
        dt_t2=new Date(t2[2],t2[1]-1,t2[0]);

         $(".enddate").datepicker("update", new Date(dt_t2)); //set new date
         $(".enddate").datepicker("setStartDate", new Date(dt_t2)); //disable past dates

       
         $("#reminderdate").datepicker("update", new Date(dt_t2-1)); //set new date
         $("#reminderdate").datepicker("setStartDate", new Date(dt_t2-1)); //

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

  $("#observers").select2({
      minimumResultsForSearch: Infinity,
      templateResult: icon_Format,
      templateSelection: icon_Format,
      escapeMarkup: function(es) { return es; }
  });

  $("#assign_id").select2({
      minimumResultsForSearch: Infinity,
      templateResult: icon_Format,
      templateSelection: icon_Format,
      escapeMarkup: function(es) { return es; }
  });
  $("#manager_id").select2({
      minimumResultsForSearch: Infinity,
      templateResult: icon_Format,
      templateSelection: icon_Format,
      escapeMarkup: function(es) { return es; }
  });
  $("#tags").select2({
      minimumResultsForSearch: Infinity,
      escapeMarkup: function(es) { return es; }
  });

  /*set end date default*/
  var t2=$('#startdate').val();
  t2=t2.split('-');
  dt_t2=new Date(t2[2],t2[1]-1,t2[0]);

   $(".enddate").datepicker("update", new Date(dt_t2)); //set new date
   $(".enddate").datepicker("setStartDate", new Date(dt_t2));
   $('.reminderdate').datepicker({
       format: "dd-mm-yyyy",
   });

   $(".reminderdate").datepicker("update", new Date(dt_t2)-1); //set new date
   $(".reminderdate").datepicker("setStartDate", new Date(dt_t2)-1);

   /*end of set end date default*/

 }, 500);


 $(document).on("change","#imagefile",function(){


              var addBusOwnerForm= $('#frmAddData')[0];
              var htmlview = $("#ShowHide").html();
              $(".Outputshow").append(htmlview);
              var formData = new FormData(addBusOwnerForm);
              $.ajax({
                  type:'POST',
                  url: '{{route("uploadfile")}}',
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
    function deletegalleryimage(id){
             $("#GalleryBox"+id).remove();
    }

     $(function (){
                  var type = "{{$type}}";
                  var id = "{{$id}}";
                  if(type=='change' && id!=0){
                      $.ajax({
                              url:'{{route("ajaxTask")}}',
                              type:'post',
                              data:{
                                      _token:'{{csrf_token()}}',
                                      search:"",
                                      page:1,
                                      txtproject:'',
                                      txtcreator:'',
                                      pageno:1,
                                      userstatus:"",
                                      txtsearch:"",
                                      id:id
                              },
                              beforeSend:function(){
                              },
                              success:function(res){
                                      if(res.data){
                                          vm.getUserDetails(res.data[0].id,res.data[0]);
                                      }
                              },
                     });
                  }
             });

             

             $('#is_repeating').change(function() {
                  if(this.checked) {
                    //  $(this).prop("checked", returnVal);
                      $("#RecurDiv").show();
                  }else{
                      $("#RecurDiv").hide();
                      $("#recur_enddate").val();
                      $("input:checkbox[name='day[]']").prop('checked',false);
                  }
                  $("#recur_enddate").datepicker({format: "dd-mm-yyyy"});
            });
</script>

 @stop
