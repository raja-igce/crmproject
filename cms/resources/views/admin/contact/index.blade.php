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
 <link rel="stylesheet" type="text/css" href="{{env('APP_URL')}}public/app-assets/vendors/css/editors/quill/quill.snow.css">
 <link rel="stylesheet" type="text/css" href="{{env('APP_URL')}}public/app-assets/vendors/css/editors/quill/quill.bubble.css">
 <link rel="stylesheet" type="text/css" href="{{env('APP_URL')}}public/app-assets/vendors/css/editors/quill/katex.min.css">
 <link rel="stylesheet" type="text/css" href="{{env('APP_URL')}}public/app-assets/vendors/css/editors/quill/monokai-sublime.min.css">
 <link rel="stylesheet" type="text/css" href="{{env('APP_URL')}}public/app-assets/vendors/css/editors/quill/quill.snow.css">
 <link rel="stylesheet" type="text/css" href="{{env('APP_URL')}}public/app-assets/vendors/css/editors/quill/quill.bubble.css">
 <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.css">
 <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/gh/RobinHerbots/jquery.inputmask@5.0.0-beta.87/css/inputmask.css">
 @stop
 @section('content')
 <div class="content-wrapper" id="UserVueApp">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-left mb-0">{{$title}}</h2>
                            <div class="content-body">
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
                                        <div class="  col-lg-4 col-sm-6 col-xs-12">
                                            <label for="userstatus">Type</label>
                                            <fieldset class="form-group">
                                                <select class="form-control" id="userstatus" name="userstatus" v-model="userstatus">
                                                    <option selected value="">All</option>
                                                    <option value="Personal">Personal</option>
                                                    <option value="Work">Work</option>
                                                    <option value="iNNER-EYE">iNNER-EYE</option>
                                                </select>
                                            </fieldset>
                                        </div>
                                        <div class="  col-lg-4 col-sm-6 col-xs-12">
                                            <label for="verifystatus">Search</label>
                                            <fieldset class="form-group">
                                                <input type="text" class="form-control" name="txtsearch" value="txtsearch" v-model="txtsearch">
                                            </fieldset>
                                        </div>
                                        <div class="  rslt-btn col-lg-4 col-sm-6 col-xs-12">
                                          <button type="button" class="btn btn-primary mt-2 round  "  v-on:click="openIncome('addproject_hide')">
                                              <i class="feather icon-plus"></i> New {{$label}}
                                          </button>
                                           
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
                                                                                                                 <label for="title">Name*</label>
                                                                                                                  <input type="text"  data-msg="Please enter name"  id="contact_name" class="form-control" required placeholder="contact_name" name="contact_name">
                                                                                                             </div>
                                                                                                         </div>
                                                                                                        
                                                                                                         <div class="col-lg-6">
                                                                                                             <div class="form-group">
                                                                                                                 <label for="title">Email*</label>
                                                                                                                  <input type="email"  data-msg="Please enter email"  id="email" class="form-control" required placeholder="email" name="email">
                                                                                                             </div>
                                                                                                         </div>
                                                                                                         <div class="col-lg-6">
                                                                                                             <div class="form-group">
                                                                                                                 <label for="title">Phone*</label>
                                                                                                                  <input type="text" data-rule-digits="true" data-rule-maxlength="10" data-rule-minlength="10" data-rule-digits="true" data-msg-minlength="Enter 10 digit phone number" data-msg-maxlength="Enter 10 digit phone number"  data-msg="Please enter phone number"  id="phone" class="form-control" required placeholder="phone" name="phone">
                                                                                                             </div>
                                                                                                         </div>
                                                                                                         <div class="col-lg-6">
                                                                                                             <div class="form-group">
                                                                                                                 <label for="title">Designation*</label>
                                                                                                                  <input type="text"  data-msg="Please enter designation"  id="designation" class="form-control" required placeholder="designation" name="designation">
                                                                                                             </div>
                                                                                                         </div>

                                                                                                         <div class="col-lg-6">
                                                                                                             <div class="form-group">
                                                                                                                 <label for="title">Type*</label>
                                                                                                                 <select name="type" id="type" class="form-control" required>
                                                                                                                 <option value="Personal">Personal</option>
                                                                                                                 <option value="Work">Work</option>
                                                                                                                 <option value="iNNER-EYE">iNNER-EYE</option>
                                                                                                                 </select>
                                                                                <!-- <input type="text"  data-msg="Please enter type"  id="type" class="form-control" required placeholder="type" name="type"> -->
                                                                                                             </div>
                                                                                                         </div>

                                                                                                         <!-- full Editor end -->
                                                                                                         <div class="col-lg-12">
                                                                                                            <button type="button" v-on:click="SaveData()" id="SaveData" class="btn btn-primary mt-2 round   waves-effect waves-light"> <i class="feather icon-save"></i>  Save </button>
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
                                                                <h4 id="mylabel">Project Details</h4>
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
                                                                            </ul>
                                                                           <div class="tab-content">
                                                                               <div class="tab-pane active" id="tabmain" aria-labelledby="main-tab" role="tabpanel">
                                                                                  <br><br>
                                                                                  <div class="row">
                                                                                      <div class="col-lg-9">
                                                                                        <div class="row shadow mb-5 bg-white rounded cardtoppad">
                                                                                            <div class="col-md-3 col-12">
                                                                                              <div class="card bg-info">
                                                                                                <div class="card-header" style="padding: 0.5rem;">
                                                                                                  <b class="">Expected Revenue</b>
                                                                                                </div>
                                                                                                <div class="card-content">
                                                                                                    <div class="card-body pt-0" style="padding: 0.5rem;">
                                                                                                        <div class="d-flex justify-content-between mb-25">
                                                                                                          <div class="browser-info">
                                                                                                          </div>
                                                                                                        </div>
                                                                                                        <div class="progress progress-bar-primary mb-25">
                                                                                                           <div class="progress-bar" role="progressbar" aria-valuenow="73" aria-valuemin="73" aria-valuemax="100" style="width:73%"></div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                              </div>
                                                                                            </div>
                                                                                            <div class="col-md-3 col-12">
                                                                                              <div class="card bg-info">
                                                                                                <div class="card-header" style="padding: 0.5rem;">
                                                                                                  <b class="">Expected Expenses</b>
                                                                                                </div>
                                                                                                <div class="card-content">
                                                                                                    <div class="card-body pt-0" style="padding: 0.5rem;">
                                                                                                        <div class="d-flex justify-content-between mb-25">
                                                                                                          <div class="browser-info">
                                                                                                          </div>
                                                                                                        </div>
                                                                                                        <div class="progress progress-bar-primary mb-25">
                                                                                                           <div class="progress-bar" role="progressbar" aria-valuenow="73" aria-valuemin="73" aria-valuemax="100" style="width:73%"></div>
                                                                                                        </div>
                                                                                                     </div>
                                                                                                </div>
                                                                                              </div>
                                                                                            </div>
                                                                                            <div class="col-md-3 col-12">
                                                                                              <div class="card bg-info">
                                                                                                <div class="card-header" style="padding: 0.5rem;">
                                                                                                  <b class="">Overdue</b>
                                                                                                </div>
                                                                                                <div class="card-content">
                                                                                                    <div class="card-body pt-0" style="padding: 0.5rem;">
                                                                                                        <div class="d-flex justify-content-between mb-25">
                                                                                                          <div class="browser-info">
                                                                                                            <h4>730 Days</h4>
                                                                                                          </div>
                                                                                                        </div>
                                                                                                        <div class="progress progress-bar-primary mb-25">
                                                                                                           <div class="progress-bar" role="progressbar" aria-valuenow="73" aria-valuemin="73" aria-valuemax="100" style="width:73%"></div>
                                                                                                        </div>
                                                                                                       <small>  <p class="mb-25">Expenses Paid <b>100%</b></p> </small>
                                                                                                    </div>
                                                                                                </div>
                                                                                              </div>
                                                                                            </div>
                                                                                            <div class="col-md-3 col-12">
                                                                                              <div class="card bg-info">
                                                                                                <div class="card-header" style="padding: 0.5rem;">
                                                                                                  <b class="">Overdue</b>
                                                                                                </div>
                                                                                                <div class="card-content">
                                                                                                    <div class="card-body pt-0" style="padding: 0.5rem;">
                                                                                                        <div class="d-flex justify-content-between mb-25">
                                                                                                          <div class="browser-info">
                                                                                                            <h4>730 Days</h4>
                                                                                                          </div>
                                                                                                        </div>
                                                                                                        <div class="progress progress-bar-primary mb-25">
                                                                                                           <div class="progress-bar" role="progressbar" aria-valuenow="73" aria-valuemin="73" aria-valuemax="100" style="width:73%"></div>
                                                                                                        </div>
                                                                                                       <small>  <p class="mb-25">Expenses Paid <b>100%</b></p> </small>
                                                                                                    </div>
                                                                                                </div>
                                                                                              </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="row shadow mb-5 bg-white rounded cardtoppad">
                                                                                          <div class="col-lg-12">
                                                                                               <button type="button" class="btn btn-primary payment btn-sm waves-effect waves-light" @click="openIncome('payment')"> Add Payment </button>
                                                                                               <button type="button" class="btn btn-primary payment btn-sm waves-effect waves-light"  @click="openIncome('invoice')"> Invoice </button>
                                                                                               <button type="button" class="btn btn-primary expenses btn-sm waves-effect waves-light" @click="openIncome('expense')" style="display:none"> Create Expense </button>

                                                                                               <ul class="nav nav-tabs pull-right" role="tablist">
                                                                                                 <li class="nav-item">
                                                                                                   <a class="nav-link" id="payment-tab" data-toggle="tab" href="#payment" aria-controls="payment" role="tab" aria-selected="true">Payment</a>
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
                                                                                                       <td>Paid @{{paymentData.data.length}}</td>
                                                                                                       <!-- <td>Progress</td>
                                                                                                       <td>Owner</td> -->
                                                                                                     </tr>
                                                                                                     <tr v-if='paymentData.data.length>0' v-for="pdata in paymentData.data">
                                                                                                       <td>@{{pdata.project_stage}}</td>
                                                                                                       <td>@{{pdata.firstname}}</td>
                                                                                                       <td>@{{pdata.project_stage}}</td>
                                                                                                       <td>@{{pdata.amount}} </td>
                                                                                                       <!-- <td>Not paid</td>
                                                                                                       <td>Sanmugam</td> -->
                                                                                                     </tr>


                                                                                                   </table>
                                                                                                   <div class="pageview">
                                                                                                        <div class="rows" v-if="users">
                                                                                                          <div v-if="paymentData.from" class="pull-left">
                                                                                                            @{{users.from}}-@{{users.to}} / @{{users.total}} Records
                                                                                                          </div>
                                                                                                          <div v-else class="col-lg-12 text-center">
                                                                                                               No record found
                                                                                                          </div>
                                                                                                          <div v-if="paymentData.last_page>1"  >
                                                                                                              <vue-paypagination :pagination="paymentData" @funpaginate="getPaymentData(1)" :offset="4"></vue-paypagination>
                                                                                                          </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                               </div>
                                                                                               <div class="tab-pane" id="expenses" aria-labelledby="expenses-tab" role="tabpanel">
                                                                                                     <table class="table table-bordered table-m">
                                                                                                       <tr>
                                                                                                         <td>Date</td>
                                                                                                         <td>Name</td>
                                                                                                         <td>Project Stage</td>
                                                                                                         <td>Amount</td>
                                                                                                         <!-- <td>Progress</td>
                                                                                                         <td>Owner</td> -->
                                                                                                       </tr>
                                                                                                       <tr v-for="data in expenseData.data">
                                                                                                         <td>@{{data.date}}</td>
                                                                                                         <td>@{{data.name}}</td>
                                                                                                         <td>@{{data.project_stage}}</td>
                                                                                                         <td>@{{data.amount}}</td>
                                                                                                         <!-- <td>Not paid</td>
                                                                                                         <td>Sanmugam</td> -->
                                                                                                       </tr>
                                                                                                     </table>
                                                                                               </div>
                                                                                             </div>

                                                                                           </div>
                                                                                        </div>
                                                                                      </div>
                                                                                      <div class="col-lg-3">
                                                                                          <div class="shadow mb-5 bg-white rounded cardtoppad">
                                                                                            Right side
                                                                                          </div>
                                                                                      </div>
                                                                                  </div>
                                                                               </div>
                                                                               <div class="tab-pane " id="tabtask" aria-labelledby="task-tab" role="tabpanel">
                                                                                 <p class="tssss">
                                                                                   <table class="table zero-configuration" id="">
                                                                                       <thead>
                                                                                           <tr class="text-uppercase">
                                                                                               <th>id</th>
                                                                                               <th>Task Name</th>
                                                                                               <th>Project Name</th>
                                                                                               <th>Start Date</th>
                                                                                               <th>Manager</th>
                                                                                               <th>Status</th>
                                                                                               <th>Actions</th>
                                                                                           </tr>
                                                                                       </thead>
                                                                                       <tbody>
                                                                                         <tr v-if='users.data.length>0  && !loading' v-for='user in taskData.data '>
                                                                                               <td>@{{user.id}}</td>
                                                                                               <td>@{{user.title}}</td>
                                                                                               <td>@{{user.project_name}}</td>
                                                                                               <td>@{{user.end_date}}</td>
                                                                                               <td>@{{user.manager_name}}</td>
                                                                                               <td v-if="user.status==1" class="text-success">Active</td>
                                                                                               <td v-if="user.status==0" class="text-secondary">InActive</td>
                                                                                               <td v-if="user.status==2" class="text-danger">Blocked</td>
                                                                                               <td>
                                                                                                   <div class="btn-group" role="group" aria-label="Basic example">
                                                                                                       <button v-on:click="getUserDetails(user.id,user)"  data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit {{$label}}" type="button" class="btn btn-outline-primary groupbtn waves-effect waves-light"><i class="feather icon-edit-2"></i></button>
                                                                                                       <button :id="user.id" data-status="active" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete {{$label}}" type="button"  class="btn btn-outline-primary groupbtn grouplborder0 waves-effect waves-light   deleteUser"  ><i class="feather icon-trash deleteUser"></i></button>
                                                                                                       <!-- <button  data-toggle="tooltip" data-placement="top" title="" data-original-title="View profile" type="button" class="btn btn-outline-primary groupbtn waves-effect waves-light"><i class="feather icon-eye"></i></button> -->
                                                                                                   </div>
                                                                                               </td>
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
                                                                                 <p>doccccc.</p>
                                                                               </div>
                                                                               <div class="tab-pane  " id="tabevent" aria-labelledby="event-tab" role="tabpanel">
                                                                                 <p class="evvvvv">
                                                                                   <table class="table zero-configuration" id="">
                                                                                       <thead>
                                                                                           <tr class="text-uppercase">
                                                                                               <th>id</th>
                                                                                               <th>Event Title</th>
                                                                                               <th>Seats</th>
                                                                                               <th>Status</th>
                                                                                               <th>Actions</th>
                                                                                           </tr>
                                                                                       </thead>
                                                                                       <tbody>
                                                                                         <tr v-if='users.data.length>0  && !loading' v-for='user in eventData.data '>
                                                                                               <td>@{{user.id}}</td>
                                                                                               <td>@{{user.title}}</td>
                                                                                               <td>@{{user.seats}}</td>
                                                                                               <td v-if="user.status==1" class="text-success">Active</td>
                                                                                               <td v-if="user.status==0" class="text-secondary">InActive</td>
                                                                                               <td v-if="user.status==2" class="text-danger">Blocked</td>
                                                                                               <td>
                                                                                                   <div class="btn-group" role="group" aria-label="Basic example">
                                                                                                       <button v-on:click="getUserDetails(user.id,user)"  data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit {{$label}}" type="button" class="btn btn-outline-primary groupbtn waves-effect waves-light"><i class="feather icon-edit-2"></i></button>
                                                                                                       <button :id="user.id" data-status="active" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete {{$label}}" type="button"  class="btn btn-outline-primary groupbtn grouplborder0 waves-effect waves-light   deleteUser"  ><i class="feather icon-trash deleteUser"></i></button>
                                                                                                       <!-- <button  data-toggle="tooltip" data-placement="top" title="" data-original-title="View profile" type="button" class="btn btn-outline-primary groupbtn waves-effect waves-light"><i class="feather icon-eye"></i></button> -->
                                                                                                   </div>
                                                                                               </td>
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
                                                                               </div>

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
                                                                <h4 class="mylabel">Payment</h4> 3rd part
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
<form class="" action="" id="frmPaymentData" method="post">
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
               <input type="text" class="form-control text-left" id="amount" name="amount" data-rule-digits="true" data-rule-msg="Enter only price"  >
             </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
               <label class="">Date<span class="required">*</span></label>
               <input type="date" autocomplete="off" name="date" id="date" class="form-control " value="" required="">
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
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Desigantion</th>
                                                <th>Type</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          <tr v-if='users.data.length>0  && !loading' v-for='user in users.data '>
                                                <td>@{{user.id}}</td>
                                                <td>@{{user.name}}</td>
                                                <td>@{{user.email}}</td>
                                                <td>@{{user.phone}}</td>
                                                <td>@{{user.designation}}</td>
                                                <td>@{{user.type}}</td>
                                                <!-- <td v-if="user.status==1" class="text-success">Active</td>
                                                <td v-if="user.status==0" class="text-secondary">InActive</td>
                                                <td v-if="user.status==2" class="text-danger">Blocked</td> -->
                                                <td>
                                                    <div class="btn-group" role="group" aria-label="Basic example">
                                                        <button v-on:click="getUserDetails(user.id,user)"  data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit {{$label}}" type="button" class="btn btn-outline-primary groupbtn waves-effect waves-light"><i class="feather icon-edit-2"></i></button>
                                                        <button :id="user.id" data-status="active" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete {{$label}}" type="button"  class="btn btn-outline-primary groupbtn grouplborder0 waves-effect waves-light   deleteUser"  ><i class="feather icon-trash deleteUser"></i></button>
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
                       url:'{{route("deleteContact")}}',
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
     var $icon = "<img class='selectimage' src='" + $(icon.element).data('thumbnail') + "'></i>" + icon.text;

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
       revenueData:{totalCollection:0,projectExpense:0,totalCollection_per:0,projectExpense_per:0},
       search:'',
       pagechange:20,
       loading:true,
       load:1,
       formtype:"payment",
       userstatus:"",
       verifystatus:"",
       txtsearch:"",
       project_id:1
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


  },
   methods:{

     exchangeword: function(string) {

       return  Newurl =  string.replace("\n", "\\n\n");
     },
     getajaxRevenue:function(load){
       var self=this;
       $.ajax({
         url:'{{route("ajaxContact")}}',
         type:'post',
         data:{
           _token:'{{csrf_token()}}',
           project_id:self.project_id,
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
          //  alert(txtnote);
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
      openIncome:function(type,projectID){

          console.log("open"+type);
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
              this.getPaymentData(1,'payment');
              this.getTasks(this.project_id);
              this.getEvent(this.project_id);
              this.saveNote('list',this.project_id);
              this.getajaxRevenue();
          }else if (type=='expense'){
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
      },
      openDetails:function(){

     },
     getUsers:function(load){
       var self=this;
       $.ajax({
         url:'{{route("ajaxContact")}}',
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

       $.ajax({
         url:'{{route("ajaxTask")}}',
         type:'post',
         data:{
               _token:'{{csrf_token()}}',
               search:self.search,
               page:self.taskData.current_page,
               pageno:1,
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
            var isValidForm =  $('#frmPaymentData').valid();
            if(isValidForm){
                    jQuery.ajax({
                           url:'{{route("addExpense")}}',
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
                  jQuery.ajax({
                         url:'{{route("addContact")}}',
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
                  $("#contact_name").val(jsondata.name);
                  $("#email").val(jsondata.email);
                  $("#phone").val(jsondata.phone);
                  $("#designation").val(jsondata.designation);
                  $("#type").val(jsondata.type);
                  this.openIncome('addproject_hide');
                  var item = [];
                  $.each(jsondata.get_team, function (index, value){
                      item.push(value.user_id);
                  });
                 
                  var itemItem = [];
                  $.each(jsondata.tags, function (index, value){
                      itemItem.push(value.id);
                  });
                  $("#mylabel").html("Update {{$label}}");

                 

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
 
 setTimeout(function () {
    
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
      templateResult: iconFormat,
      templateSelection: iconFormat,
      escapeMarkup: function(es) { return es; }
  });

  $("#selectmanager").select2({
      minimumResultsForSearch: Infinity,
      templateResult: iconFormat,
      templateSelection: iconFormat,
      escapeMarkup: function(es) { return es; }
  });
  $("#projectlead").select2({
      minimumResultsForSearch: Infinity,
      templateResult: iconFormat,
      templateSelection: iconFormat,
      escapeMarkup: function(es) { return es; }
  });
  $("#tags").select2({
      minimumResultsForSearch: Infinity,
      escapeMarkup: function(es) { return es; }
  });


 }, 500);

$(":input").inputmask();

// $(document).on('click',"#payment-tab",function(){
//   vm.getPaymentData();
//   vm.formtype = 'payment';
// });
// $(document).on('click',"#expenses-tab",function(){
//   vm.getExpenseData();
//   vm.formtype = 'expense';
// });

// $('#modalnote').on('shown.bs.modal', function (e) {
//   setTimeout(function () {
//     //$(".modal-backdrop").removeClass('modal-backdrop');
//   }, 500);
// })

</script>

 @stop
