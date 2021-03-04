 @extends('layouts.main')
 @php 
use App\Helper\AccessHelper;  
$accessAble = AccessHelper::isAccessAble(auth()->user()->id, 'project'); 
 
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
 <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/gh/RobinHerbots/jquery.inputmask@5.0.0-beta.87/css/inputmask.css">
 <style media="screen">
 	.stepNav {
     	  margin: 30px 0px !important;
     		height: 43px !important;
     		padding-right: 20px !important;
     		position: relative !important;
     		z-index: 0 !important;
        padding: 0;
 	 }
 	/* z-index to make sure the buttons stack from left to right */
 	.stepNav li {
 		float: left !important;
    display: block !important;
 		position: relative !important;
 		z-index: 30 !important;
 		-webkit-box-shadow: 0 1px 1px rgba(0,0,0,0.12) !important;
 		   -moz-box-shadow: 0 1px 1px rgba(0,0,0,0.12) !important;
 				    box-shadow: 0 1px 1px rgba(0,0,0,0.12) !important;
 		}

 	.stepNav li:first-child {
 		-webkit-border-radius: 5px 0 0 5px !important;
 		   -moz-border-radius: 5px 0 0 5px !important;
 	   	      border-radius: 5px 0 0 5px !important;
 		}


    .stepNav li:nth-child(2) { z-index: 12 !important; }
    .stepNav li:nth-child(3) { z-index: 11 !important; }
  	.stepNav li:nth-child(4) { z-index: 1 !important; }

 	/* different widths */

 	.stepNav.twoWide li { width: 50% !important; }
 	.stepNav.threeWide li { width: 25% !important; }

 	   /* step links */

 	.stepNav a, .stepNav a:visited {
 		width: 100% !important;
 		height: 43px !important;
 		padding: 0 0 0 25px !important;
 		color: #ffffff !important;
 		text-align: center !important;
 		text-shadow: 0 1px 0 #fff !important;
 		line-height: 43px !important;
 		white-space: nowrap !important;
 		border: 1px solid #cbcbcb !important;
 		text-decoration: none !important;
 		border-top-color: #dddddd !important;
 		border-right: 0 !important;
 		background-color: #7878DC !important;
 		/* background-image: -webkit-gradient(linear, left top, left bottom, from(rgb(120, 120, 220)), to(rgb(120, 120, 220))) !important;
 		background-image: -webkit-linear-gradient(top, rgb(120, 120, 220), rgb(120, 120, 220)) !important;
 		background-image: -moz-linear-gradient(top, rgb(120, 120, 220), rgb(120, 120, 220)) !important;
 		background-image: -o-linear-gradient(top, rgb(120, 120, 220), rgb(120, 120, 220)) !important;
 		background-image: -ms-linear-gradient(top, rgb(120, 120, 220), rgb(120, 120, 220)) !important;
 		background-image: linear-gradient(top, rgb(120, 120, 220), rgb(120, 120, 220)) !important; */
 		float: left !important;
 		position: relative !important;
 		-webkit-box-sizing: border-box !important;
 		   -moz-box-sizing: border-box !important;
 			      box-sizing: border-box !important;
 		}

 	.stepNav li:first-child a {
 		padding-left: 12px !important;
 		-webkit-border-radius: 5px 0 0 5px !important;
 		   -moz-border-radius: 5px 0 0 5px !important;
 	   	      border-radius: 5px 0 0 5px !important;
 		}

 	.stepNav a:before {
 		content: "" !important;
 		width: 29px !important;
 		height: 29px !important;
 		border-right: 1px solid #dddddd !important;
 		border-bottom: 1px solid #cbcbcb !important;
 		background-image: -webkit-gradient(linear, right top, left bottom, from(rgb(120, 120, 220)), to(rgb(120, 120, 220))) !important;
 		background-image: -webkit-linear-gradient(right top, rgb(120, 120, 220), rgb(120, 120, 220)) !important;
 		background-image: -moz-linear-gradient(right top, rgb(120, 120, 220), rgb(120, 120, 220)) !important;
 		background-image: -o-linear-gradient(right top, rgb(120, 120, 220), rgb(120, 120, 220)) !important;
 		background-image: -ms-linear-gradient(right top, rgb(120, 120, 220), rgb(120, 120, 220)) !important;
 		background-image: linear-gradient(right top, rgb(120, 120, 220), rgb(120, 120, 220)) !important;
 		display: block !important;
 		position: absolute !important;
 		top: 6px !important;
 		right: -16px !important;
 		z-index: -1 !important;
 		-webkit-transform: rotate(-45deg) !important;
 		   -moz-transform: rotate(-45deg) !important;
 		     -o-transform: rotate(-45deg) !important;
 			 	    transform: rotate(-45deg) !important;
 		}

 	.stepNav a:hover {
 		color: #2e2e2e !important;
 		background-color: #f5f5f5 !important;
 		background-image: -webkit-gradient(linear, left top, left bottom, from(rgb(242, 242, 242)), to(rgb(217, 217, 217))) !important;
 		background-image: -webkit-linear-gradient(top, rgb(242, 242, 242), rgb(217, 217, 217)) !important;
 		background-image: -moz-linear-gradient(top, rgb(242, 242, 242), rgb(217, 217, 217)) !important;
 		background-image: -o-linear-gradient(top, rgb(242, 242, 242), rgb(217, 217, 217)) !important;
 		background-image: -ms-linear-gradient(top, rgb(242, 242, 242), rgb(217, 217, 217)) !important;
 		background-image: linear-gradient(top, rgb(242, 242, 242), rgb(217, 217, 217)) !important;
 		}

 	.stepNav a:hover:before {
 		background-image: -webkit-gradient(linear, right top, left bottom, from(rgb(242, 242, 242)), to(rgb(217, 217, 217))) !important;
 		background-image: -webkit-linear-gradient(right top, rgb(242, 242, 242), rgb(217, 217, 217)) !important;
 		background-image: -moz-linear-gradient(right top, rgb(242, 242, 242), rgb(217, 217, 217)) !important;
 		background-image: -o-linear-gradient(right top, rgb(242, 242, 242), rgb(217, 217, 217)) !important;
 		background-image: -ms-linear-gradient(right top, rgb(242, 242, 242), rgb(217, 217, 217)) !important;
 		background-image: linear-gradient(right top, rgb(242, 242, 242), rgb(217, 217, 217)) !important;
 		}

 	/* selected */

 	.stepNav li.selected {
 		-webkit-box-shadow: none !important;
 		   -moz-box-shadow: none !important;
 				    box-shadow: none !important;
 		}

 	.stepNav li.selected a, .stepNav li.selected a:before {
 		 background: #ebebeb !important;
     color: #2e2e2e !important;
 	 }

 	.stepNav li.selected a {
 		border-top-color: #bebebe !important;
 		-webkit-box-shadow: inset 2px 1px 2px rgba(0,0,0,0.12) !important;
 		   -moz-box-shadow: inset 2px 1px 2px rgba(0,0,0,0.12) !important;
 				    box-shadow: inset 2px 1px 2px rgba(0,0,0,0.12) !important;
 		}

 	.stepNav li.selected a:before {
 		border-right: 1px solid #bebebe !important;
 		border-bottom: 1px solid #cbcbcb !important;
 		-webkit-box-shadow: inset -1px -1px 1px rgba(0,0,0,0.1) !important;
 		   -moz-box-shadow: inset -1px -1px 1px rgba(0,0,0,0.1) !important;
 				    box-shadow: inset -1px -1px 1px rgba(0,0,0,0.1) !important;
 		}
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
                            </div>
                              @if(in_array($accessAble, ['authorized','grant_acces']))
                                  <div class="pull-right">
                                    <button type="button" class="btn btn-primary"  v-on:click="openIncome('addproject_hide')">
                                        <i class="feather icon-plus"></i> New {{$label}}
                                    </button>
                                  </div>
                              @endif
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
                                        <div class="col-lg-4 col-sm-6 col-xs-12">
                                            <div class="form-group">
                                                <label for="title">Project Lead</label>
                                                <select data-placeholder="Select project leader" class="select2-icons form-control" id="txtprojectlead" name="txtprojectlead" required>
                                                  <optgroup label="Project Lead">
                                                    <option  data-icon="aa" value="" data-thumbnail="">All</option>
                                                    <option v-for="data in getLeaders"   data-icon="aa" :value="data.id" :data-thumbnail="'{{UserPath}}'+data.id+'/Thumb/'+data.profile_pic">@{{data.first_name}} @{{data.last_name}}</option>
                                                  </optgroup>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-sm-6 col-xs-12">
                                            <div class="form-group">
                                                <label for="title">Project Co-ordinator</label>
                                                <select data-placeholder="Select a project mananger..." class="select2-icons form-control" id="txtselectmanager" name="txtselectmanager" required>
                                                  <optgroup label="">
                                                    <option  data-icon="aa" value="" data-thumbnail="">All</option>
                                                    <option v-for="data in getManagers" data-icon="aa" :value="data.id" :data-thumbnail="'{{UserPath}}'+data.id+'/Thumb/'+data.profile_pic">@{{data.first_name}} @{{data.last_name}}</option>
                                                  </optgroup>
                                                </select>
                                            </div>
                                        </div>
                                         
                                        <div class="hidden">
                                            <label for="userstatus">Status</label>
                                            <fieldset class="form-group">
                                                <select class="form-control" id="userstatus" name="userstatus" v-model="userstatus">
                                                    <option selected value="">All</option>
                                                    <option value="1">Active</option>
                                                    <option value="0">InActive</option>
                                                </select>
                                            </fieldset>
                                        </div>
                                        <div class="col-lg-4 col-sm-6 col-xs-12">
                                            <label for="verifystatus">Search</label>
                                            <fieldset class="form-group">
                                                <input type="text" class="form-control" name="txtsearch" value="txtsearch" v-model="txtsearch">
                                            </fieldset>
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


                                               <input type="hidden" name="_token"  value="{{csrf_token()}}">
                                          <div class="data-list-view-header" id="addProject">
                                                  <div class="add-new-data-sidebar">
                                                    <div class="overlay-bg"></div>
                                                    <div class="add-new-data col-12" style="width:100%" >
                                                        <div class="div mt-2 px-2 d-flex new-data-title justify-content-between">
                                                            <div>
                                                                <h4 id="mylabel">Add new {{$label}}</h4>
                                                            </div>
                                                            <div class="hide-data-sidebar" v-on:click="hideIncome('addproject_hide')" >
                                                                <i class="feather icon-x"></i>
                                                            </div>
                                                        </div>
                                                        <div class="data-items pb-3 pb-3 ps ps--active-y">
                                                            <div class="data-fields px-2  ">
                                                              <section id="multiple-column-form">
                                                                 <div class="row match-height">
                                                                     <div class="col-12">
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
                                                                                                         <div class="col-lg-6">
                                                                                                             <div class="form-group">
                                                                                                                 <label for="title">Causes*</label>
                                                                                                                  <input type="text"  data-msg="Please enter project name / Causes"  id="title" class="form-control" required placeholder="title" name="title">
                                                                                                             </div>
                                                                                                         </div>
                                                                                                         <div class=" col-lg-6 hidden">
                                                                                                             <div class="form-group">
                                                                                                                 <label for="title">Priority</label>
                                                                                                                 <select class="form-control" name="priority" id="priority">
                                                                                                                   <option v-for="praio in getPriority " value="">@{{praio.name}}</option>
                                                                                                                 </select>
                                                                                                              </div>
                                                                                                         </div>
                                                                                                         <div class=" col-lg-6 hidden">
                                                                                                             <div class="form-group">
                                                                                                                 <label for="title">Workspace</label>
                                                                                                                 <select class="form-control" name="workspace" id="workspace">
                                                                                                                    <option value="0">Test Workspace</option>
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

                                                                                                         <div class=" col-lg-6 hidden">
                                                                                                             <div class="form-group">
                                                                                                                 <label for="title">Project workflow</label>
                                                                                                                 <input type="text" class="form-control" name="workflow" id="workflow">
                                                                                                              </div>
                                                                                                         </div>
                                                                                                         <div class=" col-lg-6">
                                                                                                             <div class="form-group">
                                                                                                                 <label for="title">Project Lead</label>
                                                                                                                 <select data-placeholder="Select project leader" class="select2-icons form-control" id="projectlead" name="projectlead" required>
                                                                                                                   <optgroup label="Project Lead">
                                                                                                                     <option v-for="data in usersList"   data-icon="aa" :value="data.id" :data-thumbnail="'{{UserPath}}'+data.id+'/Thumb/'+data.profile_pic">@{{data.first_name}}</option>
                                                                                                                   </optgroup>
                                                                                                                 </select>
                                                                                                              </div>
                                                                                                         </div>
                                                                                                         <div class=" col-lg-6">
                                                                                                             <div class="form-group">
                                                                                                                 <label for="title">Project Manager</label>
                                                                                                                 <select data-placeholder="Select a project mananger..." class="select2-icons form-control" id="selectmanager" name="selectmanager" required>
                                                                                                                   <optgroup label="">
                                                                                                                     <option v-for="data in usersList" data-icon="aa" :value="data.id" :data-thumbnail="'{{UserPath}}'+data.id+'/Thumb/'+data.profile_pic">@{{data.first_name}}</option>
                                                                                                                   </optgroup>
                                                                                                                 </select>
                                                                                                              </div>
                                                                                                         </div>
                                                                                                         <div class=" col-lg-12">
                                                                                                             <div class="form-group">
                                                                                                                 <label for="title">Team Member</label>
                                                                                                                 <select data-placeholder="Select team..." class="select2-icons form-control" id="selectteam" name="selectteam[]" multiple="multiple" required>
                                                                                                                   <optgroup label="Services">
                                                                                                                      <option v-for="data in usersList"   data-icon="aa"  :value="data.id" :data-thumbnail="'{{UserPath}}'+data.id+'/Thumb/'+data.profile_pic" >@{{data.first_name}}</option>
                                                                                                                   </optgroup>
                                                                                                                 </select>
                                                                                                              </div>
                                                                                                         </div>
                                                                                                         <div class=" col-lg-6">
                                                                                                             <div class="form-group">
                                                                                                                 <label for="title">Planned revenue ₹</label>
                                                                                                                 <input type="text" name="planned_revenue" data-rule-digits="true" onKeyPress="return isNumberKey1(event)"  id="planned_revenue" class="form-control" placeholder="00 ₹">
                                                                                                              </div>
                                                                                                         </div>
                                                                                                         <div class=" col-lg-6">
                                                                                                             <div class="form-group">
                                                                                                                 <label for="title">Planned expenses ₹</label>
                                                                                                                 <input type="text" name="planned_expenses" data-rule-digits="true" onKeyPress="return isNumberKey1(event)" id="planned_expenses" class="form-control" placeholder="00 ₹">
                                                                                                              </div>
                                                                                                         </div>
                                                                                                         <div class="clearfix">
                                                                                                         </div>
                                                                                                         <div class=" col-lg-6">
                                                                                                             <div class="form-group">
                                                                                                                 <label for="startdate">Start date</label>
                                                                                                                 <input type="text" class="form-control startdate" data-msg="Please enter start date" name="startdate" required id="startdate" >
                                                                                                              </div>
                                                                                                         </div>
                                                                                                         <div class=" col-lg-6">
                                                                                                             <div class="form-group">
                                                                                                                 <label for="enddate">Deadline</label>
                                                                                                                 <input type="text" class="form-control enddate" data-msg="Please enter end date" name="enddate" required id="enddate">
                                                                                                              </div>
                                                                                                              <div id="durations"></div>
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

                                          <div class="data-list-view-header" id="projectDiv">
                                              <div class="add-new-data-sidebar">
                                                    <div class="overlay-bg"></div>
                                                    <div class="add-new-data col-12"  style="width:100%" >
                                                        <div class="div mt-2 px-2 d-flex new-data-title justify-content-between">
                                                            <div>
                                                                <h4 id="mylabel">@{{revenueData.project_name}}</h4>
                                                            </div>
                                                            <div class="hide-data-sidebar" v-on:click="hideIncome('project_details')" >
                                                                <i class="feather icon-x"></i>
                                                            </div>
                                                        </div>

                                                        <div class="data-items pb-3 pb-3 ps" style="overflow-y:auto !important">
                                                            <div class="data-fields px-2  ">
                                                              <section id="multiple-column-form">
                                                                 <div class="row match-height">
                                                                     <div class="col-12">
                                                                           <ul class="nav nav-tabs" role="tablist">
                                                                               <li class="nav-item">
                                                                                 <a class="nav-link active" id="main-tab" data-toggle="tab" href="#tabmain" aria-controls="main" role="tab" aria-selected="true">Main</a>
                                                                               </li>
                                                                               <li class="nav-item">
                                                                                 <a class="nav-link " id="task-tab" data-toggle="tab" href="#tabtask" aria-controls="task" role="tab" aria-selected="false">Task</a>
                                                                               </li>
                                                                               <li class="nav-item">
                                                                                 <a class="nav-link" id="event-tab" data-toggle="tab" href="#tabevent" aria-controls="event" role="tab" aria-selected="false">Event</a>
                                                                               </li>
                                                                               <li class="nav-item">
                                                                                 <a class="nav-link" id="document-tab" data-toggle="tab" href="#tabdocument" aria-controls="document" role="tab" aria-selected="false">Document</a>
                                                                               </li>
                                                                               <li class="nav-item">
                                                                                 <a class="nav-link" id="notes-tab" data-toggle="tab" href="#tabnotes" aria-controls="notes" role="tab" aria-selected="false">Notes</a>
                                                                               </li>
                                                                               <li class="nav-item">
                                                                                 <a class="nav-link" id="notes-tab" data-toggle="tab" href="#tabteam" aria-controls="notes" role="tab" aria-selected="false">Team</a>
                                                                               </li>
                                                                               <li class="nav-item">
                                                                                 <a class="nav-link" id="notes-tab" data-toggle="tab" href="#tabbeneficiaries" aria-controls="notes" role="tab" aria-selected="false">Beneficiaries</a>
                                                                               </li>
                                                                               <li class="nav-item">
                                                                                 <a class="nav-link" id="notes-tab" data-toggle="tab" href="#tabdonor" aria-controls="notes" role="tab" aria-selected="false">Donors</a>
                                                                               </li>
                                                                               <li class="nav-item">
                                                                                 <a class="nav-link" id="notes-tab" data-toggle="tab" href="#tabfinance" aria-controls="notes" role="tab" aria-selected="false">Finance</a>
                                                                               </li>

                                                                            </ul>
                                                                           <div class="tab-content">
                                                                               <div class="tab-pane active" id="tabmain" aria-labelledby="main-tab" role="tabpanel">
                                                                                  <ul class="stepNav threeWide">
                                                                                      <li v-for="(cat,index) in getStage"   :class="{'selected': project_stage == cat.name}"  >
                                                                                        <a href="javascript:void(0)" @click="changeMain(cat.name)" title="">@{{cat.name}}</a>
                                                                                      </li>
                                                                                  </ul>
                                                                                  <div class="row">
                                                                                      <div class="col-lg-9">
                                                                                        <div class="row shadow mb-5 bg-white rounded cardtoppad">
                                                                                            <div class="col-md-3 col-12">
                                                                                              <div class="card bg-info">
                                                                                                <div class="card-header" style="padding: 0.5rem;">
                                                                                                  <!-- <b class="">Expected Revenue</b> -->
                                                                                                  <b class="">Estimated Fund</b>
                                                                                                </div>
                                                                                                <div class="card-content">
                                                                                                    <div class="card-body pt-0" style="padding: 0.5rem;">
                                                                                                        <div class="d-flex justify-content-between mb-25">
                                                                                                          <div class="browser-info">
                                                                                                            <h4>@{{revenueData.planned_revenue}}</h4>
                                                                                                          </div>
                                                                                                        </div>
                                                                                                        <div class="progress progress-bar-primary mb-25">
                                                                                                           <div class="progress-bar" role="progressbar" :aria-valuenow="revenueData.total_revenue_per" aria-valuemin="0" aria-valuemax="100" :style="'width:'+revenueData.total_revenue_per+'%'"></div>
                                                                                                        </div>
                                                                                                       <small>  <p class="mb-25">Earned Revenue <b>@{{revenueData.total_revenue_per}}%</b></p> </small> 
                                                                                                    </div>
                                                                                                </div>
                                                                                              </div>
                                                                                            </div>
                                                                                            <div class="col-md-3 col-12">
                                                                                              <div class="card bg-info">
                                                                                                <div class="card-header" style="padding: 0.5rem;">
                                                                                                  <!-- <b class="">Expected Expenses</b> -->
                                                                                                  <b class="">Expenditure</b>
                                                                                                </div>
                                                                                                <div class="card-content">
                                                                                                    <div class="card-body pt-0" style="padding: 0.5rem;">
                                                                                                        <div class="d-flex justify-content-between mb-25">
                                                                                                          <div class="browser-info">
                                                                                                            <h4>@{{revenueData.planned_expense}}</h4>
                                                                                                          </div>
                                                                                                        </div>
                                                                                                        <div class="progress progress-bar-primary mb-25">
                                                                                                           <div class="progress-bar" role="progressbar" :aria-valuenow="revenueData.total_expense_per" aria-valuemin="0" aria-valuemax="100" :style="'width:'+revenueData.total_expense_per+'%'"></div>
                                                                                                        </div>
                                                                                                       <small>  <p class="mb-25">Expenses Paid <b>@{{revenueData.total_expense_per}}%</b></p> </small>
                                                                                                    </div>
                                                                                                </div>
                                                                                              </div>
                                                                                            </div>
                                                                                            <div class="col-md-3 col-12">
                                                                                              <div class="card bg-info">
                                                                                                <div class="card-header" style="padding: 0.5rem;">
                                                                                                  <b class="">@{{revenueData.title_date}}</b>
                                                                                                </div>
                                                                                                <div class="card-content">
                                                                                                    <div class="card-body pt-0" style="padding: 0.5rem;">
                                                                                                        <div class="d-flex justify-content-between mb-25">
                                                                                                          <div class="browser-info">
                                                                                                            <h4>@{{revenueData.days_left}}  Days</h4>
                                                                                                          </div>
                                                                                                        </div>

                                                                                                         <div :class="'progress progress-bar-'+revenueData.date_expire+ ' mb-25'">
                                                                                                           <div class="progress-bar" role="progressbar" aria-valuenow="73" aria-valuemin="1" aria-valuemax="100" style="width:73%"></div>
                                                                                                        </div>
                                                                                                       <small>  <p class="mb-25">@{{revenueData.start_date}}  <b>&nbsp - &nbsp</b>  @{{revenueData.end_date}}</p> </small>
                                                                                                    </div>
                                                                                                </div>
                                                                                              </div>
                                                                                            </div>
                                                                                            <div class="col-md-3 col-12">
                                                                                              <div class="card bg-info">
                                                                                                <div class="card-header" style="padding: 0.5rem;">
                                                                                                  <b class="">Time Tracking</b>
                                                                                                </div>
                                                                                                <div class="card-content">
                                                                                                    <div class="card-body pt-0 pb-1" style="padding: 0.5rem;">
                                                                                                      <div class="browser-info">
                                                                                                        <h4>0<span>H</span> Elapsed</h4>
                                                                                                        <h4>0<span>H</span> Estimated</h4>
                                                                                                      </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                              </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="row shadow mb-5 bg-white rounded cardtoppad">
                                                                                          <div class="col-lg-12">
                                                                                               <div class="ml-1"><h4>Causes Desription</h4></div>
                                                                                                <input type="hidden" :value="revenueData.description" id="causeeditor">
                                                                                                 <!-- <div class="hidden" id="causeeditor">@{{revenueData.description}}</div> -->
                                                                                                <section class="full-editor">
                                                                                                                 <div id="full-wrapper">
                                                                                                                     <div id="full-containercauseeditor">
                                                                                                                         <div class="causeeditor" style="border: none">
                                                                                                                          
                                                                                                                         </div>
                                                                                                                     </div>
                                                                                                                 </div>
                                                                                               </section>
                                                                                               


                                                                                           </div>
                                                                                        </div>   
                                                                                        <div class="row shadow mb-5 bg-white rounded cardtoppad">
                                                                                          <div class="col-lg-12">
                                                                                               <button type="button" class="btn btn-primary payment btn-sm waves-effect waves-light" @click="openIncome('payment')"> Add Payment </button>
                                                                                               <!-- <button type="button" class="btn btn-primary payment btn-sm waves-effect waves-light"  @click="openIncome('invoice')"> Invoice </button> -->
                                                                                               <button type="button" class="btn btn-primary expenses btn-sm waves-effect waves-light" @click="openIncome('expense')" style="display:none"> Create Expense </button>

                                                                                               <ul class="nav nav-tabs pull-right" role="tablist">
                                                                                                 <li class="nav-item">
                                                                                                   <a class="nav-link active" id="payment-tab" data-toggle="tab" href="#payment" aria-controls="payment" role="tab" aria-selected="true">Payment</a>
                                                                                                 </li>
                                                                                                 <li class="nav-item">
                                                                                                   <a class="nav-link" id="expenses-tab" data-toggle="tab" href="#expenses" aria-controls="expenses" role="tab" aria-selected="true">Expenses</a>
                                                                                                 </li>
                                                                                               </ul>
                                                                                           </div>
                                                                                           <div class="col-lg-12">
                                                                                             <div class="tab-content">
                                                                                               <div class="tab-pane active" id="payment" aria-labelledby="payment-tab" role="tabpanel">
                                                                                                 <!-- <h3>Invoice</h3>
                                                                                                 <table class="table table-bordered table-m">
                                                                                                   <tr>
                                                                                                     <td>Date</td>
                                                                                                     <td>Number</td>
                                                                                                     <td>Total</td>
                                                                                                     <td>Paid</td>
                                                                                                     <td>Progress</td>
                                                                                                     <td>Owner</td>
                                                                                                   </tr>
                                                                                                 </table> -->
                                                                                                   <h3>Project Payments</h3>
                                                                                                   <table class="table table-bordered table-m">
                                                                                                     <tr>
                                                                                                       <td>Date</td>
                                                                                                       <td>Number</td>
                                                                                                       <td>Total</td>
                                                                                                       <td>Stage</td>
                                                                                                       <!-- <td>Progress</td>
                                                                                                       <td>Owner</td> -->
                                                                                                     </tr>
                                                                                                     <tr v-if='paymentData.data.length>0' v-for="pdata in paymentData.data">
                                                                                                       <td>@{{pdata.paiddate}}</td>
                                                                                                       <td>@{{pdata.firstname}}</td>
                                                                                                       <td>@{{pdata.amount}}</td>
                                                                                                       <td>@{{pdata.project_stage}} </td>
                                                                                                       <!-- <td>Not paid</td>
                                                                                                       <td>Sanmugam</td> -->
                                                                                                     </tr>
                                                                                                     <tr v-if="paymentData.data.length==0">
                                                                                                          <td class="text-center" colspan="4">No record found</td>
                                                                                                     </tr>


                                                                                                   </table>
                                                                                                   <!-- Keep for future plan dont delete
                                                                                                   <div class="pageview">
                                                                                                        <div class="rows" v-if="users">
                                                                                                          <div v-if="paymentData.from" class="pull-left">
                                                                                                            @{{paymentData.from}}-@{{paymentData.to}} / @{{paymentData.total}} Records
                                                                                                          </div>
                                                                                                          <div v-else class="col-lg-12 text-center">
                                                                                                               No record found
                                                                                                          </div>
                                                                                                          <div v-if="paymentData.last_page>1"  >
                                                                                                              <vue-paypagination :pagination="paymentData" @funpaginate="getPaymentData(1)" :offset="4"></vue-paypagination>
                                                                                                          </div>
                                                                                                        </div>
                                                                                                    </div> -->
                                                                                               </div>
                                                                                               <div class="tab-pane" id="expenses" aria-labelledby="expenses-tab" role="tabpanel">
                                                                                                     <table class="table table-bordered table-m">
                                                                                                       <tr>
                                                                                                         <td>Date</td>
                                                                                                         <td>Bill no</td>
                                                                                                         <td>Item</td>
                                                                                                         <td>Payee</td>
                                                                                                         <td>Amount Paid</td>
                                                                                                         <td>Paid Date</td>
                                                                                                         <td>Responsible Person</td>
                                                                                                         <td></td>
                                                                                                         <!-- 
                                                                                                         <td>Owner</td> -->
                                                                                                       </tr>
                                                                                                       <tr v-if="expenseData.data.length>0"   v-for="data in expenseData.data">
                                                                                                         <td>@{{data.date}}</td>
                                                                                                         <td>@{{data.bill_no}}</td>
                                                                                                         <td> <a v-on:click="editTransaction('expense',data)" href="javascript:void(0)" > @{{data.item}}</a></td>
                                                                                                         <td>@{{data.payee}}</td>
                                                                                                         <td>@{{data.amount}}</td>
                                                                                                         <td>@{{data.paiddate}}</td>
                                                                                                         <td class="text-nowrap">
                                                                                                            <a :href="data.respose_user	 | goDetails">
                                                                                                              <img :src="data.respose_img" onerror="this.src='{{Assets}}images/user.png'" alt="avtar img holder" class="round" width="32" height="32">
                                                                                                              @{{data.respose_user_name}}
                                                                                                            </a>
                                                                                                        </td>
                                                                                                        <td> <a href="javascript:void(0)" v-on:click="editTransaction('delete',data.id)"> <i class="fa fa-trash-o"></a></i></td>
                                                                                                       </tr>
                                                                                                       <tr v-if="revenueData.total_expense!='0.00'" >
                                                                                                         <td> </td>
                                                                                                         <td> </td>
                                                                                                         <td> </td>
                                                                                                         <td> </td>
                                                                                                         <td><b v-if="revenueData.total_expense">@{{revenueData.total_expense}} </b></td>
                                                                                                         <td> </td>
                                                                                                         <td> </td>
                                                                                                       </tr>
                                                                                                       
                                                                                                       <tr v-if="expenseData.data.length==0">
                                                                                                            <td class="text-center" colspan="4">No record found</td>
                                                                                                       </tr>
                                                                                                     </table>
                                                                                               </div>
                                                                                             </div>

                                                                                           </div>
                                                                                        </div>
                                                                                      </div>
                                                                                      <div class="col-lg-3">
                                                                                          <div class="shadow mb-1 bg-white rounded cardtoppad">
                                                                                            <!--right side -->
                                                                                            <div class="card mb-0">
                                                                                                <div class="card-header d-flex justify-content-between">
                                                                                                    <h4>Leader</h4>
                                                                                                </div>
                                                                                                <div class="card-body pt-1 pb-0 pl-1">
                                                                                                    <div v-if="revenueData.getManager" class="d-flex justify-content-start align-items-center  ">
                                                                                                        <div class="avatar mr-50">
                                                                                                            <img :src="'{{TeamImagePath}}/'+revenueData.getManager.id+'/Thumb/'+revenueData.getManager.profile_pic" onerror="this.src='{{TeamImagePath}}user.png'" alt="" height="35" width="35">
                                                                                                        </div>
                                                                                                        <div class="user-page-info"  v-if="revenueData.getLeader">
                                                                                                            <h6 class="mb-0" >@{{revenueData.getLeader.first_name}} @{{revenueData.getLeader.last_name}}</h6>
                                                                                                            <div class="font-small-2" v-if="revenueData.getLeader.get_volunteer_detail">@{{revenueData.getLeader.get_volunteer_detail.get_institution.title}}</div>
                                                                                                            <div class="font-small-2">@{{revenueData.getLeader.position}}</div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                 </div>
                                                                                            </div>
                                                                                          </div>

                                                                                          <div class="shadow mb-1 bg-white rounded cardtoppad">
                                                                                            <!--right side -->
                                                                                            <div class="card  mb-0">
                                                                                                <div class="card-header d-flex justify-content-between">
                                                                                                    <h4>Co-ordinator</h4>
                                                                                                </div>
                                                                                                <div class="card-body pt-1 pb-0 pl-1">
                                                                                                    <div v-if="revenueData.getManager" class="d-flex justify-content-start align-items-center  ">
                                                                                                        <div class="avatar mr-50">
                                                                                                            <img :src="'{{TeamImagePath}}/'+revenueData.getManager.id+'/Thumb/'+revenueData.getManager.profile_pic" onerror="this.src='{{TeamImagePath}}user.png'" alt="" height="35" width="35">
                                                                                                        </div>
                                                                                                        <div class="user-page-info" v-if="revenueData.getManager">
                                                                                                            <h6 class="mb-0">@{{revenueData.getManager.first_name}} @{{revenueData.getManager.last_name}}</h6>
                                                                                                            <div class="font-small-2" v-if="revenueData.getManager.get_volunteer_detail.get_institution">@{{revenueData.getManager.get_volunteer_detail.get_institution.title}}</div>
                                                                                                            <div class="font-small-2">@{{revenueData.getManager.position}}</div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                 </div>
                                                                                            </div>
                                                                                          </div>


                                                                                        
                                                                                      </div>
                                                                                  </div>
                                                                               </div>
                                                                               <div class="tab-pane " id="tabtask" aria-labelledby="task-tab" role="tabpanel">
                                                                                 <p class="tssss">
                                                                                   <ul class="nav nav-tabs pull-right" role="tablist">
                                                                                     <li class="nav-item">
                                                                                       <a class="nav-link active" id="taskall-tab" data-toggle="tab" href="#taskallTab" aria-controls="payment" role="tab" aria-selected="true">All Tasked </a>
                                                                                     </li>
                                                                                     <li class="nav-item">
                                                                                       <a class="nav-link" id="taskassign-tab" data-toggle="tab" href="#taskassignTab" aria-controls="expenses" role="tab" aria-selected="true">Assiged </a>
                                                                                     </li>
                                                                                   </ul>
                                                                                   <div class="tab-content">
                                                                                     <div class="tab-pane active" id="taskallTab" aria-labelledby="payment-tab" role="tabpanel">

                                                                                     </div>
                                                                                     <div class="tab-pane" id="taskassignTab" aria-labelledby="payment-tab" role="tabpanel">
                                                                                         <div class="clearfix">

                                                                                         </div>
                                                                                         <div class="col-lg-3">
                                                                                             <div class="form-group">
                                                                                                 <label for="title">Project Assignee</label>
                                                                                                 <select data-placeholder="Select project leader" class="select2-icons form-control" id="taskassigne" name="taskassigne" required>
                                                                                                   <optgroup label="Project assignee">
                                                                                                     <option    data-icon="aa" value="0" data-thumbnail="">All Records</option>
                                                                                                      <option v-for="data in revenueData.taskAssignee"   data-icon="aa" :value="data.id" :data-thumbnail="'{{UserPath}}'+data.id+'/Thumb/'+data.profile_pic">@{{data.first_name}}</option>
                                                                                                   </optgroup>
                                                                                                 </select>
                                                                                              </div>
                                                                                         </div>
                                                                                     </div>
                                                                                   </div>
                                                                                   <table class="table zero-configuration" id="">
                                                                                       <thead>
                                                                                           <tr class="text-uppercase">
                                                                                               <th>id</th>
                                                                                               <th>Task Name</th>
                                                                                               <th>Progress</th>
                                                                                               <th>Priority</th>
                                                                                               <th v-if="task_type!='notassigned'">Task Assignee</th>
                                                                                               <th>Start Date</th>
                                                                                               <th>End Date</th>
                                                                                               <th>Task Manager</th>

                                                                                               <!-- <th>Actions</th> -->
                                                                                           </tr>
                                                                                       </thead>
                                                                                       <tbody>
                                                                                         <tr v-if='users.data.length>0  && !loading' v-for='user in taskData.data '>
                                                                                               <td>@{{user.id}}</td>
                                                                                               <td><a :href="user.id | goTaskDetails" target="_blank">@{{user.title}}</a></td>
                                                                                               <td>@{{user.progress}}</td>
                                                                                               <td>@{{user.priority}}</td>
                                                                                               <td v-if="task_type!='notassigned'">@{{user.assignee_name}}</td>
                                                                                               <td>@{{user.start_date}}</td>
                                                                                               <td>@{{user.end_date}}</td>
                                                                                               <td>@{{user.manager_name}}</td>
                                                                                               <!-- <td v-if="user.status==1" class="text-success">Active</td>
                                                                                               <td v-if="user.status==0" class="text-secondary">InActive</td>
                                                                                               <td v-if="user.status==2" class="text-danger">Blocked</td> -->
                                                                                               <!-- <td>
                                                                                                   <div class="btn-group" role="group" aria-label="Basic example">
                                                                                                       <button v-on:click="getUserDetails(user.id,user)"  data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit {{$label}}" type="button" class="btn btn-outline-primary groupbtn waves-effect waves-light"><i class="feather icon-edit-2"></i></button>
                                                                                                       <button :id="user.id" data-status="active" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete {{$label}}" type="button"  class="btn btn-outline-primary groupbtn grouplborder0 waves-effect waves-light   deleteUser"  ><i class="feather icon-trash deleteUser"></i></button>
                                                                                                        <button  data-toggle="tooltip" data-placement="top" title="" data-original-title="View profile" type="button" class="btn btn-outline-primary groupbtn waves-effect waves-light"><i class="feather icon-eye"></i></button>
                                                                                                   </div>
                                                                                               </td> -->
                                                                                           </tr>
                                                                                       </tbody>
                                                                                   </table>
                                                                                   <div class="pageview">
                                                                                        <div class="rows" v-if="taskData">
                                                                                          <div v-if="taskData.from" class="pull-left">
                                                                                            @{{taskData.from}}-@{{taskData.to}} / @{{taskData.total}} Records
                                                                                          </div>
                                                                                          <div v-else class="col-lg-12 text-center">
                                                                                               No record found
                                                                                          </div>
                                                                                          <div v-if="taskData.last_page>1"  >
                                                                                              <vue-paypagination :pagination="taskData" @funpaginate="getTasks(1)" :offset="4"></vue-paypagination>
                                                                                          </div>
                                                                                        </div>
                                                                                    </div>
                                                                                 </p>
                                                                               </div>
                                                                               <div class="tab-pane" id="tabdocument" aria-labelledby="document-tab" role="tabpanel">
                                                                                      <form class="" id="frmForImage" name="frmForImage" method="post">


                                                                                        <div class="col-lg-12">
                                                                                          <div class="form-group mt-20">
                                                                                              <label for="title">Select Documents</label><br>
                                                                                              <input type="hidden" name="_token" id="_token" value="{{csrf_token()}}">
                                                                                              <button type="button" onclick="document.getElementById('imagefile1').click()"  class="btn btn-primary mr-1 mb-1 waves-effect waves-light"><i class="fa fa-paperclip"></i> Select Images</button>
                                                                                              <div class="input-group mb-3 hidden">
                                                                                                   <div class="input-group-prepend">
                                                                                                       <!-- <span class="input-group-text">Upload</span> -->
                                                                                                   </div>
                                                                                                   <div class="custom-file">
                                                                                                       <input type="file" name="imagefile1" id="imagefile1" class="custom-file-input">
                                                                                                       <label class="custom-file-label" style="overflow:hidden">Select Document</label>
                                                                                                   </div>
                                                                                               </div>
                                                                                          </div>
                                                                                          <div class="Outputshow1" id="ImageGallery">
                                                                                            <div v-for="(data, key) in revenueData.getDocuments" title=""  class="profile-picImg GalleryBox" :id="'GalleryBox'+data.file" style="display: table;max-width: 1px;word-wrap: anywhere;">
                                                                                              <input type="hidden" :value="data.file" name="imagename[]" id="imagename">
                                                                                              <div class="gclose" v-on:click="deletegalleryimage(data.file)" title="Remove Image"></div>
                                                                                              <img v-if="data.type=='img'" id="galimgDocument1556361385_85" :src="'{{ProjectAbsPath}}'+data.project_id+'/Thumb/'+data.file" class="profile-picImg">
                                                                                              <img v-else id="galimgDocument1556361385_85" style="height:150px;" src="{{Assets}}images/attachment.png" class="profile-picImg">
                                                                                              <div class="clearfix"></div>

                                                                                                <b>@{{JSON.parse(data.meta_data).size}} (@{{JSON.parse(data.meta_data).extention}})</b>
                                                                                                <div class="clearfix"></div>
                                                                                                <i>@{{JSON.parse(data.meta_data).filename}}</i>


                                                                                            </div>
                                                                                          </div>
                                                                                           <input type="hidden" name="project_id_new" v-model="project_id" value="">
                                                                                     </div>
                                                                                     </form>
                                                                               </div>
                                                                               <div class="tab-pane  " id="tabevent" aria-labelledby="event-tab" role="tabpanel">
                                                                                 <p class="evvvvv">
                                                                                   <table class="table zero-configuration" id="">
                                                                                       <thead>
                                                                                           <tr class="text-uppercase">
                                                                                               <th>id</th>
                                                                                               <th>Event Name</th>
                                                                                               <th>Event Co-ordinator</th>
                                                                                               <th>Start Date</th>
                                                                                               <th>End Date</th>
                                                                                               <th>No. of Seats</th>
                                                                                               <th>No. of Attendees</th>
                                                                                               <th>Status</th>
                                                                                               <!-- <th>Actions</th> -->
                                                                                           </tr>
                                                                                       </thead>
                                                                                       <tbody>
                                                                                         <tr v-if='users.data.length>0  && !loading' v-for='user in eventData.data '>
                                                                                               <td>@{{user.id}}</td>
                                                                                               <td> <a :href="user.id | goEventDetails" target="_blank"> @{{user.title}} </a></td>
                                                                                               <td>

                                                                                                 <div v-if="user.get_team.length>0">
                                                                                                     <span v-for="(pas,ind) in user.get_team"  > 
                                                                                                     <a :href="pas.get_memeber.id | goDetails" target="_blank">
                                                                                                        @{{pas.get_memeber.first_name}}
                                                                                                     </a>
                                                                                                     <i v-if="ind != user.get_team.length-1"> / </i>    </span>
                                                                                                 </div>

                                                                                               </td>
                                                                                               <td>@{{user.start_date}}</td>
                                                                                               <td>@{{user.end_date}}</td>
                                                                                               <td>@{{user.seats}}</td>
                                                                                               <td>@{{user.attendee}}</td>
                                                                                               <td v-if="user.status==1" class="text-success">Active</td>
                                                                                               <td v-if="user.status==0" class="text-secondary">InActive</td>
                                                                                               <td v-if="user.status==2" class="text-danger">Blocked</td>
                                                                                               <!-- <td>
                                                                                                   <div class="btn-group" role="group" aria-label="Basic example">
                                                                                                       <button v-on:click="getUserDetails(user.id,user)"  data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit {{$label}}" type="button" class="btn btn-outline-primary groupbtn waves-effect waves-light"><i class="feather icon-edit-2"></i></button>
                                                                                                       <button :id="user.id" data-status="active" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete {{$label}}" type="button"  class="btn btn-outline-primary groupbtn grouplborder0 waves-effect waves-light   deleteUser"  ><i class="feather icon-trash deleteUser"></i></button>
                                                                                                    </div>
                                                                                               </td> -->
                                                                                           </tr>
                                                                                           <tr v-if="eventData.data.length==0">
                                                                                                <td class="text-center" colspan="8">No record found</td>
                                                                                           </tr>
                                                                                       </tbody>

                                                                                   </table>
                                                                                 </p>
                                                                               </div>
                                                                               <div class="tab-pane  " id="tabnotes" aria-labelledby="notes-tab" role="tabpanel">
                                                                                 <p>

                                                                                <div class="row ">
                                                                                  <div class="col-lg-9">
                                                                                        <textarea name="txtnote" class="form-control" id="txtnote" rows="3" cols="80"></textarea>
                                                                                  </div>
                                                                                  <div class="col-lg-3">
                                                                                        <button type="button" name="button" @click="saveNote('add',0)" class="btn btn-info"  > Add Note </button>
                                                                                  </div>
                                                                                </div>

                            <br><br>
                      <div class="row">

                        <div v-if='noteData.data.length>0  && !loading'  v-for="data in noteData.data" class="col-md-6 col-sm-12" :id="'maindiv'+data.id">
                              <div class="card boxshado" style="box-shadow:2px 2px 2px 2px #d2d2d2 !important">
                                  <div class="card-header">
                                      <small>@{{data.name}}, @{{data.created_at}}</small>
                                      <div class="heading-elements">
                                          <ul class="list-inline mb-0">
                                              <li><a href="javascript:void(0)"  @click="makeEdit(data.id)"><i class="fa fa-pencil"></i></a></li>
                                              <li><a href="javascript:void(0)" @click="removeEdit(data.id)"><i class="fa fa-trash-o"  ></i></a></li>
                                          </ul>
                                      </div>
                                  </div>
                                  <div class="card-content collapse show ">
                                      <input type="hidden"  name="oldnote " :id="'oldnote'+data.id" :value="data.note">
                                      <div class="card-body " >
                                        <div :id="'divedit'+data.id" style="white-space: pre-line;" contenteditable="false">
                                            @{{data.note}}
                                        </div>
                                      </div>
                                      <div class="col-lg-12" :id="'editbtn'+data.id" style="display:none">
                                        <button type="button" class="btn-sm btn btn-success" name="button" @click="saveNote('update',data.id)">Save</button>
                                        <button type="button" class="btn-sm btn btn-danger" name="button" @click="closeNote(data.id)">Cancel</button>
                                        <br><br>
                                      </div>
                                  </div>
                              </div>
                          </div>



                          </div>

                                                                                 </p>
                                                                               </div> <!-- end notes -->
                                                                               <div class="tab-pane  " id="tabteam" aria-labelledby="notes-tab" role="tabpanel">

                                                                                     <div class="card-body">
                                                                                      <div  v-if="revenueData.getTeam && revenueData.getTeam.length>0" class="tab-pane active" id="home" aria-labelledby="home-tab" role="tabpanel">
                                                                                           <table class="table zero-configuration" id="">
                                                                                              <thead>
                                                                                                  <tr class="text-uppercase">
                                                                                                      <th>id</th>
                                                                                                      <th>Name</th>
                                                                                                      <th>Position</th>
                                                                                                      <th>Email</th>
                                                                                                  </tr>
                                                                                              </thead>
                                                                                              <tbody>


                                                                                                <tr v-if='revenueData.getTeam.length>0  && !loading' v-for="tdata in revenueData.getTeam">
                                                                                                      <td>@{{tdata.get_team_memeber.id}} </td>
                                                                                                      
                                                                                                      <td>
                                                                                                          <a :href="tdata.get_team_memeber.id | goDetails"> 
                                                                                                          <div class="avatar mr-50"> <img :src="'{{TeamImagePath}}/'+tdata.get_team_memeber.id+'/Thumb/'+tdata.get_team_memeber.profile_pic" onerror="this.src='{{TeamImagePath}}user.png'" alt="" height="35" width="35"> </div> @{{tdata.get_team_memeber.first_name}} @{{tdata.get_team_memeber.last_name}}
                                                                                                          </a>
                                                                                                      </td>
                                                                                                      
                                                                                                      <td v-if="tdata.get_team_memeber.position">@{{tdata.get_team_memeber.position}} </td>
                                                                                                      <td v-else> - </td>
                                                                                                      <td>@{{tdata.get_team_memeber.email}} </td>
                                                                                                  </tr>
                                                                                              </tbody>
                                                                                          </table>
                                                                                          <h2 v-else style="padding: 100px; text-align: center;">No Team Assigned</h2>
                                                                                      
                                                                                    </div>
                                                                                  </div>
                                                                                </div> <!-- end team -->
                                                                               <div class="tab-pane  " id="tabbeneficiaries" aria-labelledby="notes-tab" role="tabpanel">
                                                                                    <h2 style="padding: 100px;text-align: center;">Beneficiaries Page Under Construction</h2>
                                                                               </div> <!-- end  beneficiaries -->
                                                                               <div class="tab-pane  " id="tabdonor" aria-labelledby="notes-tab" role="tabpanel">
                                                                                      <table v-if="revenueData.getDonors && revenueData.getDonors.length>0" class="table zero-configuration" id="">
                                                                                                    <thead>
                                                                                                        <tr class="text-uppercase">
                                                                                                            <th>id</th>
                                                                                                            <th>Name</th>
                                                                                                            <th>Phone</th>
                                                                                                            <th>Amount</th>
                                                                                                            <th>Date</th>
                                                                                                        </tr>
                                                                                                    </thead>
                                                                                                    <tbody>
                                                                                                        <tr v-if='revenueData.getDonors.length>0  && !loading' v-for="tdata in revenueData.getDonors">
                                                                                                            <td>@{{tdata.id}} </td>
                                                                                                            <td>@{{tdata.txtfirstname}} @{{tdata.txtlastname}}</td>
                                                                                                            <td v-if="tdata.txtphone">@{{tdata.txtphone}}</td>
                                                                                                            <td v-else>-</td>
                                                                                                            <td>@{{tdata.amount}}</td>
                                                                                                            <td>@{{moment(tdata.date).format("DD-MM-YYYY")}}</td>
                                                                                                        </tr>
                                                                                                    </tbody>
                                                                                                </table >
                                                                                                <h2 v-else style="padding: 100px; text-align: center;">No Donors found</h2>
                                                                               </div> <!-- end  donor -->
                                                                               <div class="tab-pane  " id="tabfinance" aria-labelledby="notes-tab" role="tabpanel">
                                                                                    <h2 style="padding: 100px;text-align: center;">Finance Page Under Construction</h2>
                                                                               </div> <!-- end  finance -->

                                                                            </div>
                                                                     </div>
                                                                  </div>
                                                              </section>
                                                            </div>
                                                        </div>
                                                    </div>
                                              </div>
                                          </div>

                                          <div class="data-list-view-header" id="openIncome">
                                              <div class="add-new-data-sidebar">
                                                    <div class="overlay-bg"></div>
                                                    <div class="add-new-data col-12"  style="width:80%" >
                                                        <div class="div mt-2 px-2 d-flex new-data-title justify-content-between">
                                                            <div>
                                                                <h4 class="mylabel">Payment</h4>
                                                            </div>
                                                            <div class="hide-data-sidebar" v-on:click="hideIncome('payment')" >
                                                                <i class="feather icon-x"></i>
                                                            </div>
                                                        </div>
                                                        <div class="data-items pb-3 pb-3 ps " style="overflow-y:auto !important">
                                                            <div class="data-fields px-2  ">
                                                              <section id="multiple-column-form">
                                                                 <br><br><br>
                                                                 <div class="row match-height">

                                                                     <div class="col-12">
          <form class=""  v-if="formtype=='expense'"  action="" id="frmExpenceData" method="post">
            <input type="hidden"  v-model="project_id" name="project_id" value="project_id">
            <input type="hidden"  name="expence_id" id="expence_id">
            <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                        <label class="">Date<span class="required">*</span></label>
                        <input type="date" autocomplete="off" name="date" id="date" class="form-control " value="" required="" :value="expenseDetails.paiddate">
                    </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                        <label class="">Bill No<span class="required">*</span></label>
                        <input type="text" autocomplete="off" name="billno" id="billno" required class="form-control input" :value="expenseDetails.bill_no">
                    </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                        <label class="">Item<span class="required">*</span></label>
                        <input type="text" autocomplete="off" name="item" id="item" required class="form-control input" :value="expenseDetails.item">
                    </div>
                  </div>
                  <div class="col-lg-6">
                      <div class="form-group">
                        <label class="">Payee<span class="required">*</span></label>
                        <input type="text" class="form-control text-left" id="payee" required name="payee"  :value="expenseDetails.payee">
                      </div>
                  </div>
                  <div class="col-md-4">
                      <div class="form-group">
                        <label class="">Amount<span class="required">*</span></label>
                        <input type="text" autocomplete="off" name="amount" id="amount" data-rule-number="true" class="form-control " :value="expenseDetails.amount" required="">
                      </div>
                  </div>
                  
                  
                  <div class="col-md-4">
                      <div class="form-group">
                        <label class="">Responsible Person<span class="required">*</span></label>
                        <select class="form-control" name="respose_user" id="respose_user" required>
                          <option v-for="cat in usersList" :value="cat.id">@{{cat.first_name}} @{{cat.last_name}}</option>
                        </select>
                      </div>
                  </div>
                  <div class="col-md-4">
                      <div class="form-group">
                        <label class="">Cause<span class="required">*</span></label>
                        <select class="form-control" name="cause_id" id="cause_id" required>
                          <template v-for="cat in getProject">
                            <option  v-if ="cat.id==project_id" selected :value="cat.id">@{{cat.project_name}}</option>
                            <option  v-else :value="cat.id">@{{cat.project_name}}</option>
                          </template>
                        </select>
                      </div>
                  </div>
                  <div class="col-lg-4">
                      <div class="form-group">
                        <label class="">Expense Category<span class="required">*</span></label>
                        <select class="form-control" name="expense_category" id="expense_category" required>
                          <option v-for="cat in expenseList" :value="cat.id">@{{cat.title}}</option>
                        </select>
                      </div>
                  </div>
                  <div class="col-md-4">
                      <div class="form-group">
                        <label class="">Amount paid date<span class="required">*</span></label>
                        <input type="date" autocomplete="off" name="paiddate" id="paiddate" class="form-control " :value="expenseDetails.paiddate" required="">
                      </div>
                  </div>
                  <div class="col-lg-4">
                      <div class="form-group">
                        <label class="">Mode of Payment<span class="required">*</span></label>
                        <select class="form-control" name="payment_mode" id="payment_mode" required>
                            <option value="Cash">Cash</option>
                            <option value="Net-Banking">Net-Banking</option>
                            <option value="Cheque">Cheque</option>
                        </select>
                      </div>
                  </div>
                  <div class="col-md-12">
                      <div class="form-group">
                        <label class="">Reference<span class="required">*</span></label>
                        <textarea name="reference" id="reference" class="form-control" rows="3" cols="80">@{{expenseDetails.reference}}</textarea>
                      </div>
                  </div>
                   
                  <div class="col-md-12">
                      <div class="form-group">
                          <button type="button" v-if="formtype=='payment'" id="PaymentData" name="PaymentData" v-on:click="SavePaymentData()" class="btn btn-primary mt-2 round   waves-effect waves-light"><i class="feather icon-save"></i>  Save </button>
                          <button type="button" v-if="formtype=='expense'" id="PaymentData" name="PaymentData" v-on:click="SaveExpenseData()" class="btn btn-primary mt-2 round   waves-effect waves-light"><i class="feather icon-save"></i>  Save Expense </button>
                      </div>
                  </div>
            </div>
          </form>
          <!-- above expense -->
          <form   action="" id="frmPaymentData" method="post" v-if="formtype=='payment'" >
            <input type="hidden"  v-model="project_id" name="project_id" value="project_id">
            <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                        <label class="">Stage Name<span class="required">*</span></label>
                        <input type="text" autocomplete="off" name="name" id="name" required class="form-control input" value="">
                    </div>
                  </div>
                  <div class="col-md-6">
                      &nbsp
                  </div>

                  <div class="col-lg-4">
                      <div class="form-group">
                        <label class="">Amount<span class="required">*</span></label>
                        <input type="text" class="form-control text-left" onKeyPress="return priceCheck(event,'amount')" id="amount" name="amount" data-rule-digits="true" data-rule-msg="Enter only price"  >
                      </div>
                  </div>
                  <div class="col-md-4">
                      <div class="form-group">
                        <label class="">Date<span class="required">*</span></label>
                        <input type="date" autocomplete="off" name="date" id="date" class="form-control " value="" required="">
                      </div>
                  </div>
                  <div class="col-md-4">
                      <div class="form-group">
                        <label class="">Project Stage<span class="required">*</span></label>
                        <select class="form-control" name="project_stage" id="project_stage" required>
                          <option v-for="cat in getStage" :value="cat.value">@{{cat.name}}</option>
                        </select>
                      </div>
                  </div>
                  <div class="col-lg-4">
                      <div class="form-group">
                        <label class="">Finance Category<span class="required">*</span></label>
                        <select class="form-control" name="finance_category" id="finance_category" required>
                          <option v-for="cat in expenseList" :value="cat.id">@{{cat.title}}</option>
                        </select>
                      </div>
                  </div>
                  <div class="col-md-4">
                      <div class="form-group">
                        <label class="">Responsible Person<span class="required">*</span></label>
                        <select class="form-control" name="respose_user" id="respose_user" required>
                          <option v-for="cat in usersList" :value="cat.id">@{{cat.first_name}} @{{cat.last_name}}</option>
                        </select>
                      </div>
                  </div>
                  <div class="col-md-4">
                      <div class="form-group">
                        <label class="">CRM Account<span class="required">*</span></label>
                        <select class="form-control" name="crm_id" id="crm_id">
                          <option v-for="cat in usersList" :value="cat.id">@{{cat.first_name}} @{{cat.last_name}}</option>
                        </select>
                      </div>
                  </div>
                  <div class="col-md-12">
                      <div class="form-group">
                        <label class="">Description<span class="required">*</span></label>
                        <textarea name="description" id="description" class="form-control" rows="3" cols="80"></textarea>
                      </div>
                  </div>
                  <div class="col-md-12">
                      <div class="form-group">
                          <button type="button" v-if="formtype=='payment'" id="PaymentData" name="PaymentData" v-on:click="SavePaymentData()" class="btn btn-primary mt-2 round   waves-effect waves-light"><i class="feather icon-save"></i>  Save </button>
                          <button type="button" v-if="formtype=='expense'" id="PaymentData" name="PaymentData" v-on:click="SaveExpenseData()" class="btn btn-primary mt-2 round   waves-effect waves-light"><i class="feather icon-save"></i>  Save Expense </button>
                      </div>
                  </div>
            </div>
          </form>
          <!-- payment old -->



                                                                     </div>
                                                                </div>
                                                              </section>
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
                                                <th>Causes</th>
                                                <th>Lead</th>
                                                <th>Co-ordinator</th>
                                                <th>Fund</th>
                                                <th>Expense</th>
                                                <th>Deadline</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          <tr v-if='users.data.length>0  && !loading' v-for='user in users.data '>
                                                <td>@{{user.id}}</td>
                                                <td><a href="javascript:void(0)" v-on:click="openIncome('project_details',user.id)" >@{{user.project_name}}</a></td>
                                                <td class="text-nowrap">
                                                    <a :href="user.lead_id | goDetails">
                                                      <img :src="user.lead_image" onerror="this.src='{{Assets}}images/user.png'" alt="avtar img holder" class="round" width="32" height="32">
                                                      @{{user.lead_name}}
                                                    </a>
                                                </td>
                                                <td class="text-nowrap">
                                                    <a :href="user.manager_id | goDetails">
                                                      <img :src="user.manager_image" onerror="this.src='{{Assets}}images/user.png'" alt="avtar img holder" class="round" width="32" height="32">
                                                      @{{user.manager_name}}
                                                    </a>
                                                </td>
                                                 
                                                <td class="text-nowrap">@{{user.project_income}} <span v-if="user.project_income>0">₹</span></td>
                                                <td class="text-nowrap">@{{user.project_expense}} <span v-if="user.project_expense>0">₹</span></td>
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
  <script src="{{env('APP_URL')}}public/assets/js/common.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
  <script src="https://cdn.jsdelivr.net/gh/RobinHerbots/jquery.inputmask@5.0.0-beta.87/dist/jquery.inputmask.min.js"></script>
  <!-- <script src="{{env('APP_URL')}}public/app-assets/js/scripts/forms/select/form-select2.js"></script> -->



  <script src="{{env('APP_URL')}}public/app-assets/js/scripts/editors/full-editor-quill.js"></script>
  @include('layouts.pagingTemplateSource')
   <script type="text/javascript" src="{{env('APP_URL')}}public/assets/js/vue.code.js"></script>


 <script>
 Vue.component('vue-paypagination', {
     delimiters:  ['<%', '%>'],
     template: '#paypagination-template',
     props: {
         pagination: {
             type: Object,
             required: true
         },
         offset: {
             type: Number,
             default: 4
         }
     },
     computed: {
         pagesNumber:function() {
             if (!this.pagination.to) {
                 return [];
             }
             let from = this.pagination.current_page - this.offset;
             if (from < 1) {
                 from = 1;
             }
             let to = from + (this.offset * 2);
             if (to >= this.pagination.last_page) {
                 to = this.pagination.last_page;
             }
             let pagesArray = [];
             for (let page = from; page <= to; page++) {
                 pagesArray.push(page);
             }
             return pagesArray;
         }
     },
     methods : {
         changePage:function(page) {
             this.pagination.current_page = page;
             this.$emit('funpaginate');
         }
     }
 });
$(document).on('click',"#payment-tab",function(){
      $(".payment").show();$(".expenses").hide();
});
$(document).on('click',"#expenses-tab",function(){
      $(".expenses").show();$(".payment").hide();
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
                       url:'{{route("deleteProject")}}',
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
 function iconFormat(icon) {
     var originalOption = icon.element;
     if (!icon.id) { return icon.text; }
     var $icon = "<img class='selectimage' onerror='{{TeamImagePath}}user.png' src='" + $(icon.element).data('thumbnail') + "'></i>" + icon.text;
     return $icon;
 }

 var vm = new Vue({
   el:"#UserVueApp",
   data:{
       users:{ total: 0, per_page: 2, from: 1, to: 0, current_page: 1, data:[] },
       paymentData:{ total: 0, per_page: 2, from: 1, to: 0, current_page: 1, data:[] },
       expenseData:{ total: 0, per_page: 2, from: 1, to: 0, current_page: 1, data:[] },
       taskData:{ total: 0, per_page: 2, from: 1, to: 0, current_page: 1, data:[] },
       eventData:{ total: 0, per_page: 2, from: 1, to: 0, current_page: 1, data:[] },
       noteData:{ total: 0, per_page: 2, from: 1, to: 0, current_page: 1, data:[] },
       revenueData:{},
       search:'',
       moment:moment,
       pagechange:20,
       loading:true,
       load:1,
       getPriority: {!!json_encode($getPriority)!!},
       usersList: {!!json_encode($usersList)!!},
       tagList: {!!json_encode($tagList)!!},
       expenseList: {!!json_encode($expenseList)!!},
       getStage: {!!json_encode($getStage)!!},
       getManagers: {!!json_encode($getManagers)!!},
       getLeaders: {!!json_encode($getLeaders)!!},
       getProject: {!!json_encode($getProject)!!},
       expenseDetails: {},
       incomeDetails: {},
       formtype:"payment",
       userstatus:"",
       verifystatus:"",
       txtsearch:"",
       project_id:1,
       project_stage:"plan",
       task_type:"notassigned",
       docImages:[]
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
      this.getPaymentData(1,'payment');
      this.getTasks();
      this.getEvent();
      this.saveNote('list',1);
      this.getajaxRevenue();
   },
   filters: {
        goDetails: function(string){
            var Newurl ="{{route('viewprofile','MID')}}";
            return  Newurl = Newurl.replace('MID',string);
        },
        goEventDetails: function(string){
            var Newurl ="{{route('event',['change','MID'])}}";
            return  Newurl = Newurl.replace('MID',string);
        },
        goTaskDetails: function(string){
            var Newurl ="{{route('task',['change','MID'])}}";
            return  Newurl = Newurl.replace('MID',string);
        }
        
   },
   methods:{

     deletegalleryimage: function(image){
         deletegalleryimage(image);
     },
     changeMain: function(stage){
          this.project_stage = stage;
          console.log(stage);
          this.getPaymentData(1,'payment');
          this.getajaxRevenue();
     },
     exchangeword: function(string){
          return  Newurl =  string.replace("\n", "\\n\n");
     },
     getajaxRevenue:function(load){
           var self=this;
           $.ajax({
             url:'{{route("ajaxRevenue")}}',
             type:'post',
             data:{
               _token:'{{csrf_token()}}',
               project_id:self.project_id,
               project_stage:self.project_stage,
             },
             beforeSend:function(){
                 if(!load)
                 self.loading=true;
             },
             success:function(res){

               self.revenueData = res.item;

              },
             complete:function(){
                 self.loading=false;
             }
           });
     },
     saveNote:function(type,id){
         var self=this;
         var txtnote = "";
         if(type=='add'){
            txtnote = $("#txtnote").val();
         }else if (type=='update') {
            txtnote = $("#divedit"+id).html();
         }
         var patt2 = new RegExp("<div>","g");
          var patt3= new RegExp("</div>","g");
          var patt4= new RegExp("<br>","g");
          var txtnote=txtnote.replace(patt2,"\n").replace(patt3,"").replace(patt4,"");
          if(txtnote=="" && type !="list" && type!="delete"){
              toastr.error("Please add note",'Error!');
              return false;
          }
         $.ajax({
           url:'{{route("addNote")}}',
           type:'post',
           data:{
             _token:'{{csrf_token()}}',
             type:type,
             txtnote:txtnote,
             id:id,
             project_id:self.project_id
           },
           beforeSend:function(){

           },
           success:function(res){
               if(type=='list'){
                    vm.noteData = res;
               }else {
                   if(res.status){
                       $("#oldnote"+id).val($("#txtnote").val());
                       $("#editbtn"+id).hide();
                       $("#txtnote").val('');
                       vm.saveNote('list',1);
                       toastr.success(res.msg,'Success!');
                   }else{
                       toastr.error(res.msg,'Error!');
                   }
               }
               // vm.getNotes();


           },
           complete:function(){

           }
         });

     },
     closeNote:function(id){
        $("#divedit"+id).attr('contenteditable',false);
        $("#editbtn"+id).hide();
        $("#divedit"+id).html($("#oldnote"+id).val());
     },
     makeEdit:function(id){
        $("#divedit"+id).attr('contenteditable',true);
        $("#divedit"+id).focus();
        $("#editbtn"+id).show();
     },
     removeEdit:function(id){
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
           vm.saveNote('delete',id);
           $("#maindiv"+id).remove();
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
      hideIncome:function(type){
             
              if(type=='payment'){
                  $("#openIncome .add-new-data").addClass('hide').removeClass("show");
                  $("#openIncome .overlay-bg").addClass('hide').removeClass("show");
                  $("#user_id").val("");
                  $(".tooltip").removeClass('hide');
                  $("#frmAddData")[0].reset();
                  $("#frmAddData-t-0").click();
                  $("#openIncome .mylabel").html('App Payment');
              }else if (type=='expense') {
                  
                  $("#openIncome .add-new-data").addClass('hide').removeClass("show");
                  $("#openIncome .overlay-bg").addClass('hide').removeClass("show");
                  $("#user_id").val("");
                  $("#openIncome .mylabel").html('Expenses');
                  this.formtype = 'expense';
              }else if (type=='project_details') {
                  $("#projectDiv .add-new-data").addClass('hide').removeClass("show");
                  $("#projectDiv .overlay-bg").addClass('hide').removeClass("show");
                  $("#projectDiv .select152").select2();
                  $("#projectDiv .tooltip").removeClass('show');
              }else if (type=='addproject_hide') {

                  $("#addProject .add-new-data").addClass('hide').removeClass("show");
                  $("#addProject .overlay-bg").addClass('hide').removeClass("show");
                  $("#addProject .select152").select2();
                  $("#addProject .tooltip").removeClass('show');
              }
              else if (type=='invoice') {
                  $("#openIncome .add-new-data").addClass('hide').removeClass("show");
                  $("#openIncome .overlay-bg").addClass('hide').removeClass("show");
                  $("#openIncome .mylabel").html('Generate Invoice');
              }else{

              }

      },
      editTransaction:function(type,data){
        
          if(type=='expense'){
              vm.expenseDetails = data;
              $("#frmExpenceData #payment_mode").val(data.paymentmode);
              $("#frmExpenceData #expence_id").val(data.id);
              
              $("#frmExpenceData #respose_user").val(data.respose_user);
              $("#frmExpenceData #expense_category").val(data.expense_category);
              setTimeout(() => {
                $("#frmExpenceData #paiddate").val(data.paiddate);
                $("#frmExpenceData #date").val(data.date);
              }, 500);
              
              console.log(JSON.stringify (data));
              $("#openIncome .add-new-data").addClass('show').removeClass("hide");
              $("#openIncome .overlay-bg").addClass('show').removeClass("hide");
          }
          if(type=='delete'){
                 $("#frmExpenceData #expence_id").val('');
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
                      url:'{{route("deleteExpense")}}',
                      type:'post',
                      data:{
                        _token:'{{csrf_token()}}',
                        id:data,
                      },
                      beforeSend:function(){

                      },
                      success:function(res){
                              if(res.status){
                                  toastr.success(res.msg,'Success!');
                                  vm.getExpenseData();
                              }else{
                                  toastr.error(res.msg,'Error!');
                              }
                      },
                      complete:function(){

                      }
                    });
                    Swal.fire({
                      type: "success",
                      title: 'Deleted!',
                      text: 'Your data has been deleted.',
                      confirmButtonClass: 'btn btn-success',
                    })

                  }
                  
                });
          }
      },
      openIncome:function(type,projectID){


          if(type=='payment'){
              $("#openIncome .add-new-data").addClass('show').removeClass("hide");
              $("#openIncome .overlay-bg").addClass('show').removeClass("hide");
              $("#openIncome .mylabel").html('App Payment');
          }else if (type=='project_details'){
              this.project_id=projectID;
              $("#projectDiv .add-new-data").addClass('show').removeClass("hide");
              $("#projectDiv .overlay-bg").addClass('show').removeClass("hide");
              $("#projectDiv .select152").select2();
              $("#projectDiv .tooltip").removeClass('show');
              $("#payment-tab").click();

              this.getPaymentData(1,'payment');
              this.getTasks(this.project_id); 
              this.getEvent(this.project_id);
              this.saveNote('list',this.project_id);
              this.getajaxRevenue();
          }else if (type=='expense'){
              $("#frmExpenceData")[0].reset();
              $("#frmExpenceData #reference").val('');
              
               
              $("#openIncome .add-new-data").addClass('show').removeClass("hide");
              $("#openIncome .overlay-bg").addClass('show').removeClass("hide");
          }else if (type=='addproject_hide'){
              $("#addProject .add-new-data").addClass('show').removeClass("hide");
              $("#addProject .overlay-bg").addClass('show').removeClass("hide");
              $("#openIncome .mylabel").html('Expenses');
          }else if (type=='invoice') {
            $("#openIncome .add-new-data").addClass('show').removeClass("hide");
            $("#openIncome .overlay-bg").addClass('show').removeClass("hide");
              $("#openIncome .mylabel").html('Generate Invoice');
          }

             
            setTimeout(function(){
                var cEditor = new Quill('.causeeditor', {
                    modules: {
                    'formula': true,
                    'syntax': true,
                    'toolbar': false
                    },
                    theme: 'snow'
                });
                cEditor.root.innerHTML = $("#causeeditor").val();
                cEditor.disable();
            },500);
      },
      openDetails:function(){

     },
     getUsers:function(load){
       var self=this;
       team_id = $("#txtprojectlead").val();
       manager_id = $("#txtselectmanager").val();
       
       
       $.ajax({
         url:'{{route("ajaxProject")}}',
         type:'post',
         data:{
              _token:'{{csrf_token()}}',
              search:self.search,
              page:self.users.current_page,
              pageno:self.pagechange,
              userstatus:self.userstatus,
              txtsearch:self.txtsearch,
              team_id:team_id,
              manager_id:manager_id

         },
         beforeSend:function(){
             if(!load)
             self.loading=true;
         },
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
     getPaymentData:function(load,type){
       var self=this;
       $.ajax({
         url:'{{route("ajaxPaymentData")}}',
         type:'post',
         data:{
               _token:'{{csrf_token()}}',
               search:self.search,
               page:self.paymentData.current_page,
               pageno:300,//self.pagechange,
               type:type,
               txtsearch:self.txtsearch,
               project_id:self.project_id,
               project_stage:self.project_stage,
         },
         beforeSend:function(){
               if(!load)
               self.loading=true;
         },
         success:function(res){
            self.paymentData=res;
            if(res.meta){
                self.paymentData.current_page = res.meta.current_page;
                self.paymentData.last_page = res.meta.last_page;
                self.paymentData.total = res.meta.total;
                self.paymentData.per_page = res.meta.per_page;
                self.paymentData.from = res.meta.from;
                self.paymentData.to = res.meta.to;
                self.paymentData.from = res.meta.from;
             }
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
     getExpenseData:function(load,type){
       var self=this;
       $.ajax({
         url:'{{route("ajaxExpenseData")}}',
         type:'post',
         data:{
               _token:'{{csrf_token()}}',
               search:self.search,
               page:self.expenseData.current_page,
               pageno:300,//self.pagechange,
               type:type,
               txtsearch:self.txtsearch,
               project_id:self.project_id,
         },
         beforeSend:function(){
               if(!load)
               self.loading=true;
         },
         success:function(res){
           
            self.expenseData=res;
            
             
            if(res.meta){
                self.expenseData.current_page = res.meta.current_page;
                self.expenseData.last_page = res.meta.last_page;
                self.expenseData.total = res.meta.total;
                self.expenseData.per_page = res.meta.per_page;
                self.expenseData.from = res.meta.from;
                self.expenseData.to = res.meta.to;
                self.expenseData.from = res.meta.from;
             } 
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
     getTasks:function(load){
       var self=this;
       var taskassigne = "";
       var tasktype = "notassigned";
       if($("#taskassign-tab").hasClass('active')){
          tasktype = "taskassign";
          var taskassigne = $("#taskassigne").val();
       }


       $.ajax({
         url:'{{route("ajaxTask")}}',
         type:'post',
         data:{
               _token:'{{csrf_token()}}',
               search:self.search,
               page:self.taskData.current_page,
               pageno:self.pagechange,
               tasktype:self.task_type,
               userstatus:self.userstatus,
               project_id:self.project_id,
               txtsearch:self.txtsearch,
               taskassigne:taskassigne
         },
         beforeSend:function(){
             if(!load)
             self.loading=true;
         }
         ,
         success:function(res){
            self.taskData=res;
            if(res.meta){
                self.taskData.current_page = res.meta.current_page;
                self.taskData.last_page = res.meta.last_page;
                self.taskData.total = res.meta.total;
                self.taskData.per_page = res.meta.per_page;
                self.taskData.from = res.meta.from;
                self.taskData.to = res.meta.to;
                self.taskData.from = res.meta.from;
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
     getEvent:function(load){
       var self=this;

       $.ajax({
         url:'{{route("ajaxEvent")}}',
         type:'post',
         data:{
           _token:'{{csrf_token()}}',
           search:self.search,
           page:self.eventData.current_page,
           pageno:self.pagechange,
           userstatus:self.userstatus,
           project_id:self.project_id,
           txtsearch:self.txtsearch,
          },
         beforeSend:function(){
             if(!load)
             self.loading=true;
         }
         ,
         success:function(res){
            self.eventData=res;
            if(res.meta){
                self.eventData.current_page = res.meta.current_page;
                self.eventData.last_page = res.meta.last_page;
                self.eventData.total = res.meta.total;
                self.eventData.per_page = res.meta.per_page;
                self.eventData.from = res.meta.from;
                self.eventData.to = res.meta.to;
                self.eventData.from = res.meta.from;
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
     SaveExpenseData:function(load){
            var isValidForm =  $('#frmExpenceData').valid();
            if(isValidForm){
                    jQuery.ajax({
                           url:'{{route("addExpense")}}',
                           type:'post',
                           data: $('#frmExpenceData').serialize(),
                           headers: {
                              'X-CSRF-TOKEN': "{{csrf_token()}}"
                           },
                           beforeSend:function(){
                               if(!load)
                               self.loading=true;
                           },
                           success:function(res){
                                if(res.status){
                                    $(".hide-data-sidebar").click();
                                    toastr.success(res.msg,'Success!');
                                    vm.getExpenseData();
                                }else{
                                    toastr.error(res.msg,'Error!');
                                }
                            },
                            error:function(res){
                              toastr.error(res.msg,'Error!');
                            },
                             complete:function(){
                                 if(!load)
                                 self.loading=false;
                             }
                   });
            }
     },
     SavePaymentData:function(load){
            var isValidForm =  $('#frmPaymentData').valid();
            if(isValidForm){
                    jQuery.ajax({
                           url:'{{route("addPayment")}}',
                           type:'post',
                           data: $('#frmPaymentData').serialize(),
                           headers: {
                              'X-CSRF-TOKEN': "{{csrf_token()}}"
                           },
                           beforeSend:function(){
                               if(!load)
                               self.loading=true;
                           },
                           success:function(res){
                                if(res.status){
                                    $(".hide-data-sidebar").click();
                                    toastr.success(res.msg,'Success!');
                                    vm.getPaymentData();
                                }else{
                                    toastr.error(res.msg,'Error!');
                                }
                            },
                            error:function(res){
                              toastr.error(res.msg,'Error!');
                            },
                             complete:function(){
                                 if(!load)
                                 self.loading=false;
                             }
                   });
            }
     },
     SaveData:function(load){
          var isValidForm =  $('#frmAddData').valid();
          if(isValidForm){
                  $("#description").val($(".ql-editor").html());
                  jQuery.ajax({
                         url:'{{route("addProject")}}',
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
                  $("#title").val(jsondata.project_name);
                  $(".ql-editor").html(jsondata.description);
                   

              
                   fullEditor.root.innerHTML = jsondata.description;
                  $("#projectlead").val(jsondata.projectlead);
                  $("#planned_revenue").val(jsondata.planned_revenue);
                  $("#planned_expenses").val(jsondata.planned_expense);
                  $("#startdate").val(jsondata.start_date);
                  $("#enddate").val(jsondata.end_date);

                  $("#status").prop('checked',jsondata.status);
                  this.openIncome('addproject_hide');
                  var item = [];
                  $.each(jsondata.get_team, function (index, value){
                      item.push(value.user_id);
                  });
                  $('#selectteam').val(item);
                  $('#selectteam').trigger('change');
                  $('#selectmanager').val([jsondata.manager_id]).trigger('change');


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

  });
  // $(".hide-data-sidebar, .cancel-data-btn").on("click", function () {
  //     $(".add-new-data").removeClass("show");
  //     $(".overlay-bg").removeClass("show");
  //     $("#user_id").val("");
  //     $(".tooltip").removeClass('show');
  //     $("#frmAddData")[0].reset();
  //     $("#frmAddData-t-0").click();
  // });
  if ($(".data-items").length > 0) {
    new PerfectScrollbar(".data-items", { wheelPropagation: false });
  }


 </script>
<!-- <script src="{{env('APP_URL')}}public/app-assets/js/scripts/forms/custome_wizard-steps.js"></script> -->
<script type="text/javascript">
    $(document).ready(function (){

    });

var fullEditor = '';
 function reinitEditor(){
 

  
   
     fullEditor = new Quill('#full-container .editor', {
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
      templateResult: icon_Format,
      templateSelection: icon_Format,
      escapeMarkup: function(es) { return es; }
  });

  $("#selectmanager").select2({
      minimumResultsForSearch: Infinity,
      templateResult: icon_Format,
      templateSelection: icon_Format,
      escapeMarkup: function(es) { return es; }
  });
  $("#projectlead, #taskassigne ,#txtprojectlead ,#txtselectmanager").select2({
      minimumResultsForSearch: Infinity,
      templateResult: icon_Format,
      templateSelection: icon_Format,
      escapeMarkup: function(es) { return es; }
  });
  
  $("#tags").select2({
      minimumResultsForSearch: Infinity,
      escapeMarkup: function(es) { return es; }
  });

  


 }, 500);

$(":input").inputmask();


$(document).on('change',"#txtprojectlead",function(){
    vm.users.current_page = 1;
    vm.getUsers();
});
$(document).on('change',"#txtselectmanager",function(){
    vm.users.current_page = 1;
    vm.getUsers();
});

$(document).on('change',"#taskassigne",function(){

    vm.taskData.current_page = 1;
    vm.getTasks();
});
$(document).on('click',"#taskassign-tab",function(){
    vm.task_type="taskassign",
    vm.getTasks();
});
$(document).on('click',"#taskall-tab",function(){
    vm.task_type="notassigned",
    vm.getTasks();
});
$(document).on('click',"#payment-tab",function(){
  vm.getPaymentData();
  vm.formtype = 'payment';
});
$(document).on('click',"#expenses-tab",function(){
  vm.getExpenseData();
  vm.formtype = 'expense';
});

$('#modalnote').on('shown.bs.modal', function (e) {
  setTimeout(function () {
    //$(".modal-backdrop").removeClass('modal-backdrop');
  }, 500);
});

$(document).on("change","#imagefile1",function(){
  var fileExtension = ['jpeg', 'jpg', 'png', 'gif', 'bmp'];
   if ($.inArray($(this).val().split('.').pop().toLowerCase(), fileExtension) == -1) {
    //alert("Only formats are allowed : "+fileExtension.join(', '));
   }
             var addBusOwnerForm= $('#frmForImage')[0];
             var htmlview = $("#ShowHide").html();
             $(".Outputshow1").append(htmlview);
             var formData = new FormData(addBusOwnerForm);
             $.ajax({
                 type:'POST',
                 url: '{{route("uploadimage2")}}',
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

   function deletegalleryimage(id){
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
                 url:'{{route("removeProjectDoc")}}',
                 type:'post',
                 data:{
                   _token:'{{csrf_token()}}',
                   id:id,
                   project_id:vm.project_id
                 },
                 beforeSend:function(){

                 },
                 success:function(res){
                         if(res.status){
                             toastr.success(res.msg,'Success!');
                             $(".Outputshow1").html('');
                             vm.getajaxRevenue();
                         }else{
                             toastr.error(res.msg,'Error!');
                         }
                 },
                 complete:function(){

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
   }

    
   
</script>

 @stop
