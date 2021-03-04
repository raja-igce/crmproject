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
 <style>
 </style>
 @stop
 @section('content')
 <div class="content-wrapper" id="UserVueApp">
            <div class="content-header row">
              <div class="content-header-left col-md-12 col-12 mb-2">
                  <div class="row breadcrumbs-top">
                      <div class="col-12">
                          <h2 class="content-header-title float-left mb-0">{{$headertitle}}</h2>

                           <button type="button" class="btn btn-primary    opensider pull-right" id="opensider">
                                              <i class="feather icon-plus"></i> {{$btntitle}}
                           </button>
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
                                            <label for="userstatus">Organization Category</label>
                                            <fieldset class="form-group">
                                                <select class="form-control" id="orgcat" name="orgcat" v-model="orgcat">
                                                    <option selected value="">All</option>
                                                    
                                                    <option v-for="data in orgCategory" :value="data.id">@{{data.title}}</option>
                                                </select>
                                            </fieldset>
                                        </div> 
                                        <div class="col-lg-4 col-sm-6 col-xs-12">
                                            <label for="userstatus">Working Causes/Mission</label>
                                            <fieldset class="form-group">
                                                <select class="form-control" id="usermisson" name="usermisson" v-model="usermisson">
                                                    <option selected value="">All</option>
                                                    <option v-for="data in orgHelp" :value="data.id">@{{data.title}}</option>
                                                </select>
                                            </fieldset>
                                        </div> 
                                        <div class="col-lg-4 col-sm-6 col-xs-12">
                                            <label for="verifystatus">Search</label>
                                            <fieldset class="form-group">
                                                <input type="text" class="form-control" name="txtsearch" value="txtsearch" v-model="txtsearch">
                                            </fieldset>
                                        </div>
                                        <div class="col-lg-4 col-sm-6 col-xs-12 hidden">
                                            <label for="userstatus">Status</label>
                                            <fieldset class="form-group">
                                                <select class="form-control" id="userstatus" name="userstatus" v-model="userstatus">
                                                    <option selected value="">All</option>
                                                    <option value="1">Active</option>
                                                    <option value="2">Blocked</option>
                                                    <option value="0">Pending</option>
                                                </select>
                                            </fieldset>
                                        </div>
                                        <!-- <div class="col">
                                            <label for="customSelect3">Latest Activity</label>
                                            <fieldset class="form-group">
                                                <select class="form-control" id="customSelect3">
                                                    <option selected>Any</option>
                                                    <option value="Any 1">Any 1</option>
                                                    <option v-for="data in userSetting.Eduction" :value="data.id">@{{data.title}}</option>
                                                </select>
                                            </fieldset>
                                        </div> -->
                                        <div class="col hidden">
                                            <label for="verifystatus">Varified</label>
                                            <fieldset class="form-group">
                                                <select class="form-control" id="verifystatus" name="verifystatus" v-model="verifystatus">
                                                    <option selected value="">All</option>
                                                    <option value="1">Verifed</option>
                                                    <option value="0">Not Verifed</option>
                                                </select>
                                            </fieldset>
                                        </div>
                                        
                                        
                                         
                                            <!-- <button type="button" class="btn mt-2 btn-outline-primary btn-icon btn-block text-uppercase">Show Results</button> -->
                                         
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
                                        <div class="add-new-data" style="width:auto">
                                            <div class="div mt-2 px-2 d-flex new-data-title justify-content-between">
                                                <div>
                                                    <h4>{{$frmtitle}}</h4>
                                                </div>
                                                <div class="hide-data-sidebar"  >
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
                                         <!-- <h4 class="card-title">Validation Example </h4> -->
                                     </div>
                                     <div class="card-content">
                                         <div class="card-body">
                                           <div class="">
                                              
                                           </div>
                                             <form action="#" id="frmAddData" name="frmAddData" class="steps-validation wizard-circle">
                                               <div class="">
                                               
                                               </div>
                                                 <!-- Step 1 -->
                                                 <input type="hidden" name="_token"  value="{{csrf_token()}}">
                                                 <h6><i class="step-icon feather icon-user"></i> Basic Info</h6>
                                                 <fieldset>
                                                     <div class="row">
                                                       <div class="col-md-6 col-xs-12">
                                                         <label for=" ">Name of the Organization</label>
                                                         <fieldset class="form-group position-relative has-icon-left input-divider-left">
                                                              <input type="text"  data-msg="Please enter Organization" onKeyPress="return isAlfa(event)"  id="first_name" class="form-control" required placeholder="First name" value="" name="first_name"   >
                                                               <div class="form-control-position">
                                                                  <i class="feather icon-user"></i>
                                                              </div>
                                                          </fieldset>

                                                           <div class="form-group">
                                                               <input type="hidden" id="user_id" value="" name="user_id">
                                                           </div>
                                                       </div>
                                                       <div class="col-md-6 col-xs-12">
                                                           <div class="form-group">
                                                               <label for="last_name">Name of Responsible Person (CEO/Executive/Secretary)</label>
                                                                <fieldset class="form-group position-relative has-icon-left input-divider-left">
                                                                     <input type="text" id="last_name" class="form-control" onKeyPress="return isAlfa(event)"  data-msg="Please enter Responsible Person" required placeholder="Name of the Responsible Person" value="" name="last_name">
                                                                     <div class="form-control-position">
                                                                        <i class="feather  icon-user"></i>
                                                                    </div>
                                                                </fieldset>
                                                           </div>
                                                       </div>
                                                       <div class="col-md-6 col-12">
                                                           <div class="form-group">
                                                               <label for="email">Official Email ID</label>
                                                               <fieldset class="form-group position-relative has-icon-left input-divider-left">
                                                                    <input type="email" required id="email" class="form-control" placeholder="Email" name="email">
                                                                     <div class="form-control-position">
                                                                        <i class="feather icon-mail"></i>
                                                                    </div>
                                                                </fieldset>
                                                           </div>
                                                       </div>
                                                       <div class="col-md-6 col-12">
                                                           <div class="form-group">
                                                               <label for="phone">Mobile (Responsible Person)</label>
                                                               <fieldset class="form-group position-relative has-icon-left input-divider-left">
                                                                     <input type="text" id="phone" class="form-control" onKeyPress="return isNumberKey1(event)" maxlength="10"  required name="phone" placeholder="Phone Number">
                                                                     <div class="form-control-position">
                                                                        <i class="feather icon-smartphone"></i>
                                                                    </div>
                                                                </fieldset>
                                                           </div>
                                                       </div>
                                                     </div>
                                                 </fieldset>

                                                 <!-- Step 2 -->
                                                 <h6><i class="step-icon feather icon-smartphone"></i> Official Information</h6>
                                                 <fieldset>
                                                     <div class="row">
                                                           <div class="col-md-4 col-12">
                                                               <div class="form-group">
                                                                   <label for="registration_no">Organization Registration No.</label>
                                                                   <fieldset class="form-group position-relative has-icon-left input-divider-left">
                                                                         <input type="text" id="registration_no" class="form-control" required name="registration_no" placeholder="Registration No.">
                                                                         <div class="form-control-position">
                                                                            <i class="feather icon-smartphone"></i>
                                                                        </div>
                                                                    </fieldset>
                                                               </div>
                                                           </div>
                                                           <div class="col-md-4 col-12">
                                                               <div class="form-group">
                                                                   <label for="address_line1">Address Line 1</label>
                                                                   <fieldset class="form-group position-relative has-icon-left input-divider-left">
                                                                         <input type="text" id="address_line1" class="form-control" name="address_line1" placeholder="Addres Line 1">
                                                                         <div class="form-control-position">
                                                                            <i class="fa fa-map-marker"></i>
                                                                        </div>
                                                                    </fieldset>
                                                               </div>
                                                           </div>
                                                           <div class="col-md-4 col-12">
                                                               <div class="form-group">
                                                                   <label for="address_line1">Address Line 2</label>
                                                                   <fieldset class="form-group position-relative has-icon-left input-divider-left">
                                                                         <input type="text" id="address_line2" class="form-control" name="address_line2" placeholder="Addres Line 2">
                                                                         <div class="form-control-position">
                                                                            <i class="fa fa-map-marker"></i>
                                                                        </div>
                                                                    </fieldset>
                                                               </div>
                                                           </div>
                                                           <div class="col-md-4 col-12">
                                                               <div class="form-group">
                                                                   <label for="city">City</label>
                                                                   <input type="text" id="city" onKeyPress="return isAlfa(event)"  class="form-control" name="city" placeholder="City">
                                                               </div>
                                                           </div>
                                                           <div class="col-md-4 col-12">
                                                               <div class="form-group">
                                                                   <label for="district">District</label>
                                                                   <input type="text" id="district" onKeyPress="return isAlfa(event)"  class="form-control" name="district" placeholder="District">
                                                               </div>
                                                           </div>
                                                           <div class="col-md-4 col-12">
                                                               <div class="form-group">
                                                                   <label for="state">State</label>
                                                                   <input type="text" id="state" onKeyPress="return isAlfa(event)"  class="form-control" name="state" placeholder="State">
                                                               </div>
                                                           </div>
                                                           <div class="col-md-4 col-12">
                                                               <div class="form-group">
                                                                   <label for="pincode">Pincode</label>
                                                                   <input type="text" id="pincode" onKeyPress="return isNumberKey1(event)"  maxlength="6" class="form-control" name="pincode" placeholder="Pincode">
                                                               </div>
                                                           </div>

                                                           <div class="col-md-4 col-12">
                                                               <div class="form-group">
                                                                    <label for="category">Organization Category</label>
                                                                    <fieldset class="form-group position-relative has-icon-left input-divider-left">
                                                                          <select class="form-control" id="category" required name="category">
                                                                            <option value="">Organization Category</option>
                                                                            <option v-for="data in userSetting.OrganizationCategory" :value="data.id">@{{data.title}}</option>
                                                                          </select>
                                                                           <div class="form-control-position">
                                                                             <i class="fa fa-th-large"></i>
                                                                         </div>
                                                                     </fieldset>
                                                                     <input type="text" id="otherCategory" name="otherCategory" placeholder="Enter Organization Category" class="form-control mt-1 hidden">
                                                               </div>
                                                           </div>
                                                           <div class="col-md-4 col-12">
                                                                 <div class="form-group">
                                                                      <label for="strength">Strength of Organization</label>
                                                                      <fieldset class="form-group position-relative has-icon-left input-divider-left">
                                                                            <select class="form-control" id="strength" required name="strength">
                                                                              <option value="">Strength of organization</option>
                                                                              <option v-for="data in userSetting.getOrganizationSize" :value="data.value">@{{data.name}}</option>
                                                                            </select>
                                                                             <div class="form-control-position">
                                                                               <i class="fa fa-users"></i>
                                                                           </div>
                                                                       </fieldset>
                                                                 </div>
                                                            </div>


                                                     </div>
                                                 </fieldset>
                                                 <!-- Step 3 -->
                                                 <h6><i class="step-icon feather icon-image"></i> Details Of Needful Support</h6>
                                                 <fieldset>
                                                     <div class="row">
                                                       <div class="col-md-6 col-12">
                                                           <div class="form-group">
                                                                <label for="support_help">What kind of support/help you are looking from iNNER-EYE</label>
                                                                <fieldset class="form-group position-relative has-icon-left input-divider-left">
                                                                      <select class="form-control" id="support_help" required name="support_help"  >
                                                                          <option value="">Which help you need from iNNER-EYE</option>
                                                                          <option v-for="data in userSetting.SupportHelp" :value="data.id">@{{data.title}}</option>
                                                                      </select>
                                                                      <div class="form-control-position">
                                                                         <i class="fa fa-tint"></i>
                                                                      </div>
                                                                 </fieldset>
                                                                 <input type="text" id="othersupport" name="othersupport" placeholder="Which support yow looking from iNNER-EYE?" class="form-control mt-1 hidden">
                                                           </div>
                                                       </div>
                                                    </div>

                                                    <div class="row">
                                                       <div class="col-md-12 col-12">
                                                           <div class="form-group">
                                                                <label for="eduction_id">Registration Certificate</label>
                                                                <fieldset class="form-group position-relative has-icon-left input-divider-left">
                                                                    <button type="button" onclick="document.getElementById('imagefile').click()" class="btn btn-primary mr-1 mb-1 waves-effect waves-light"><i class="fa fa-paperclip"></i> Browse File</button>
                                                                </fieldset>
                                                                <input type="file" name="imagefile" id="imagefile" class="custom-file-input hidden">


                                                                <div class="Outputshow" id="ImageGallery">
                                                                  <div v-for="(data, key) in eventImages" title=""  class="profile-picImg GalleryBox" :id="'GalleryBox'+data.file">
                                                                    <input type="hidden" :value="data.file" name="imagename[]" id="imagename">
                                                                    <div class="gclose" v-on:click="updatearray(key,data.id)" title="Remove Image"></div>
                                                                    <img id="galimgDocument1556361385_85" :src="'{{Assets}}'+data.event_id+'/Thumb/'+data.file" class="profile-picImg">
                                                                  </div>
                                                                </div>
                                                                <input type="hidden" name="deletedImage" id="deletedImage" v-model="deletedImage" value="">
                                                           </div>
                                                       </div>
                                                    </div>

                                                    <div class="row">
                                                       <div class="col-md-12 col-12">
                                                           <div class="form-group">
                                                                <label for="institutions">Upload Document if any</label>
                                                                <fieldset class="form-group position-relative has-icon-left input-divider-left">
                                                                   <button type="button" onclick="document.getElementById('imagefile1').click()" class="btn btn-primary mr-1 mb-1 waves-effect waves-light"><i class="fa fa-paperclip"></i> Browse File</button>
                                                                 </fieldset>
                                                                 <input type="file" name="imagefile1" id="imagefile1" class="custom-file-input hidden">
                                                                 <div class="Outputshow1" id="ImageGallery">
                                                                   <div v-for="(data, key) in eventImages1" title=""  class="profile-picImg GalleryBox" :id="'GalleryBox'+data.image">
                                                                     <input type="hidden" :value="data.image" name="imagename[]" id="imagename">
                                                                     <div class="gclose" v-on:click="updatearray(key,data.id)" title="Remove Image"></div>
                                                                     <img id="galimgDocument1556361385_85" :src="'{{EventAbsPath}}'+data.event_id+'/Thumb/'+data.image" class="profile-picImg">
                                                                   </div>
                                                                 </div>
                                                                 <input type="hidden" name="deletedImage1" v-model="deletedImage1" value="">
                                                           </div>
                                                       </div>
                                                     </div>

                                                      <div class="row">
                                                         <div class="col-md-6 col-12">
                                                             <div class="form-group">
                                                                  <label for="reference">How did you know about iNNER-EYE?</label>
                                                                  <fieldset class="form-group position-relative has-icon-left input-divider-left">
                                                                        <select class="form-control" required id="reference" name="reference">
                                                                          <option value="">Select reference</option>
                                                                          <option v-for="data in userSetting.getReference" :value="data.value">@{{data.name}}</option>
                                                                        </select>
                                                                         <div class="form-control-position">
                                                                           <i class="fa fa-briefcase"></i>
                                                                        </div>
                                                                   </fieldset>
                                                                   <input type="text" id="otherReference" name="otherReference" placeholder="How did you know about iNNER-EYE?" class="form-control mt-1 hidden">
                                                              </div>
                                                          </div>
                                                       </div>
                                                 </fieldset>
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
                                            <button type="button" v-on:click="SaveData()" id="SaveData" class="btn btn-primary hidden">Add Data</button>

                                            <!-- <div class="add-data-footer d-flex justify-content-around px-3 mt-2">
                                                <div class="add-data-btn">
                                                    <button type="button" v-on:click="SaveData()" class="btn btn-primary">Add Datas</button>
                                                </div>
                                                <div class="cancel-data-btn">
                                                    <button on-click="getUsers()" class="btn btn-outline-danger">Cancel</button>
                                                </div>
                                            </div> -->
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
                                                
                                                <th>Organization</th>
                                                <th>Category</th>
                                                <th>Reg. No</th>
                                                 
                                                <th>Responsible Person</th>
                                                <th>Contact No</th>
                                                <th>Working Causes/Mission</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          <tr v-if='users.data.length>0  && !loading' v-for='user in users.data '>
                                                <td>@{{user.id}}</td>
                                                <td class="text-nowrap">  
                                                        <template v-if="{!!auth()->user()->id!!} == user.id || {!!auth()->user()->role_id!!}==0">
                                                            <a  v-on:click="goDetails(user.id)" class="linkcolor" >   
                                                                <img class="round" :src="user.profile_pic" onerror="this.src='{{Assets}}images/user.png'" alt="avtar img holder" height="32" width="32">                         
                                                                @{{user.first_name}}
                                                            </a>
                                                        </template>
                                                        <template v-else>
                                                            <a  v-on:click="getFillpopup(user)"  class="linkcolor">
                                                                <img class="round" :src="user.profile_pic" onerror="this.src='{{Assets}}images/user.png'" alt="avtar img holder" height="32" width="32">                            
                                                                @{{user.first_name}}
                                                            </a>    
                                                        </template>
                                                </td>
                                                <td>@{{user.org_data.org_category_txt}}</td>
                                                <td>@{{user.org_data.reg_no}}</td>
                                                <td>@{{user.last_name}}</td>
                                                <td>@{{user.phone}}</td>
                                                <td>@{{user.org_data.support_help_text}}</td>
                                                <td v-if="user.status==1" class="text-success">Verified</td>
                                                <td v-if="user.status==0" class="text-secondary">Not Verified</td>
                                                <td v-if="user.status==2" class="text-danger">Rejected</td>
                                                <td>
                                                    <div class="btn-group" role="group" aria-label="Basic example">
                                                        <button v-on:click="getUserDetails(user.id,user)"  data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit profile" type="button" class="btn btn-outline-primary groupbtn waves-effect waves-light"><i class="feather icon-edit-2"></i></button>
                                                        <button :id="user.id" data-status="active" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete User" type="button"  class="btn btn-outline-primary groupbtn waves-effect waves-light grouplrborder0 deleteUser"  ><i class="feather icon-trash deleteUser"></i></button>
                                                        <button  data-toggle="tooltip" data-placement="top" title="" data-original-title="View profile" type="button" class="btn btn-outline-primary groupbtn waves-effect waves-light"><i class="feather icon-eye"></i></button>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr v-if="users.data.length==0">
                                                <td colspan="9" align="center">Record not found</td>
                                            </tr>    

                                        </tbody>
                                    </table>
                                    <div class="pageview">
                                        <div class="rows">
                                          <div v-if="pagination.from" class="col-lg-4 pull-left">
                                              @{{pagination.from}}-@{{pagination.to}} / @{{pagination.total}} Records
                                            </div>
                                          <div class="col-lg-6">
                                              <vue-pagination :pagination="users" @paginate="getUsers(1)" :offset="4"></vue-pagination>
                                          </div>
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
      <div class="modal fade" id="profileModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog  modal-sm" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Profile</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card" style="height:auto ">
                            <div class="card-header mx-auto pb-0">
                                <div class="row m-0">
                                    <div class="col-sm-12 text-center">
                                        <h4 id="pname"> </h4>
                                    </div>
                                    <div class="col-sm-12 text-center">
                                        <p class="pposition">Volunteer</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card-content">
                                <div class="card-body text-center mx-auto">
                                        <div class="avatar avatar-xl">
                                            <img class="img-fluid" id="pimg" src="http://localhost/innereye/crm/public/assets/Users/217/Thumb/Document1580911510_886.jpg" alt="img placeholder">
                                        </div>
                                        <div class="d-flex justify-content-between mt-2">
                                            <div class="uploads">
                                                <p id="pcamp" class="font-weight-bold font-medium-2 mb-0">0</p>
                                                <span class="">Campaigns</span>
                                            </div>
                                            <div class="followers">
                                                <p id="pevent" class="font-weight-bold font-medium-2 mb-0">0</p>
                                                <span class="">Events</span>
                                            </div>
                                            <div class="following">
                                                <p id="pblog" class="font-weight-bold font-medium-2 mb-0">0</p>
                                                <span class="">Blogs</span>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                            <div class="mt-2 mb-1">
                                                <button class="btn gradient-light-primary waves-effect waves-light pull-left" style="width:45%" >Follow</button>
                                                <a href="{{route('ichat')}}">
                                                <button class="btn btn-outline-primary waves-effect waves-light pull-right" style="width:45%" >Message</button>
                                                </a>
                                            </div>
                                        <div class="clearfix"></div>
                                    </div>
                            </div>
                        </div>
                </div>
                
                </div>
            </div>
            </div>  
 @stop

 @section('appfooter')
 <!-- <script src="{{env('APP_URL')}}public/app-assets/vendors/js/tables/datatable/datatables.min.js"></script>
 <script src="{{env('APP_URL')}}public/app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js"></script>
 <script src="{{env('APP_URL')}}public/app-assets/vendors/js/tables/datatable/dataTables.select.min.js"></script>
 <script src="{{env('APP_URL')}}public/app-assets/js/scripts/datatables/user-datatable.js"></script> -->
  <script src="{{env('APP_URL')}}public/assets/js/vue.paging.js"></script>
  <script src="{{env('APP_URL')}}public/app-assets/vendors/js/extensions/jquery.steps.min.js"></script>
  <script src="{{env('APP_URL')}}public/app-assets/vendors/js/forms/select/select2.full.min.js"></script>
  <script src="{{env('APP_URL')}}public/app-assets/vendors/js/forms/validation/jquery.validate.min.js"></script>
  <script src="{{env('APP_URL')}}public/app-assets/vendors/js/extensions/toastr.min.js"></script>
  <script src="{{env('APP_URL')}}public/app-assets/vendors/js/extensions/sweetalert2.all.min.js"></script>
  <script src="{{env('APP_URL')}}public/assets/css/commom.js"></script>

  <script type="text/x-template" id="pagination-template">
     <div class="dataTables_paginate paging_simple_numbers">
          <ul class="pagination" v-if="pagination.meta!==undefined">
            <li v-if="pagination.meta.current_page > 1" class="page-item">
              <a href="javascript:void(0)" class="page-link" aria-label="Previous"   v-on:click.prevent="changePage(pagination.meta.current_page - 1)">
                       <<
                      </a>
            </li>
            <li v-if="pagination.meta.last_page > 1" v-for="page in pagination.meta.last_page" :class="{'active': page == pagination.meta.current_page}" class="page-item">
              <a href="javascript:void(0)" class="page-link" v-on:click.prevent="changePage(page)"><% page %></a>
            </li>
            <li v-if="pagination.meta.current_page < pagination.meta.last_page" class="page-item">
                      <a href="javascript:void(0)"class="page-link" aria-label="Next" v-on:click.prevent="changePage(pagination.meta.current_page + 1)">
                         >>
                      </a>
            </li>
          </ul>
      </div>
  </script>
 <script>

 function initsweetalert(){
   $(document).on('click','.deleteUser',function(){
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
                     url:'{{route("blockUser")}}',
                     type:'post',
                     data:{
                         _token:'{{csrf_token()}}',
                         id:id,
                         type:'block'
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
                   text: 'Your record has been blocked.',
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
      }); //end of delete user
 }
 $(document).ready(function(){
      initsweetalert();
 });

 var vm = new Vue({
   el:"#UserVueApp",
   data:{
       users:{ total: 0, per_page: 2, from: 1, to: 0, current_page: 1, data:[] },
       search:'',
       pagechange:20,
       loading:true,
       load:1,
       userSetting:{!!json_encode($userSetting)!!},
       orgCategory:{!!json_encode($orgCategory)!!},
       orgHelp:{!!json_encode($orgHelp)!!},
       mydata:{},
       pagination:{meta:{}},
       userstatus:"",
       verifystatus:"",
       orgcat:"",
       usermisson:"",
       txtsearch:"",
       deletedImage:[],
       eventImages: {},
       deletedImage1:[],
       eventImages1: {},
       documentView:[]
   },
   watch:{
      userstatus:function(){
          this.getUsers();
      },
      verifystatus:function(){
          this.getUsers();
      },
      txtsearch:function(){
          this.getUsers();
      },
      orgcat:function(){
        this.getUsers();
      },
      usermisson:function(){
        this.getUsers();
      }
   }
   ,
   mounted:function(){
      this.getUsers();
   },
   filters: {
        goDetails: function(string) {
            var Newurl ="{{route('viewprofile','MID')}}";
            window.location.href = Newurl.replace('MID',string);
        }
    },
   methods:{
      goDetails: function(string) {
            var Newurl ="{{route('viewprofile','MID')}}";
            window.location.href = Newurl.replace('MID',string);
      },
      getFillpopup:function(res){
            $("#pname").html(res.first_name);
            $(".pposition").html(res.org_data.org_category_txt);
            $("#pcamp").html(res.campaigns_counts);
            $("#pevent").html(res.events_counts);
            $("#pblog").html(res.blog_counts);
            $("#pimg").attr('src',res.profile_pic);
            // $("#pimg").attr('src',"");
            $("#pimg").on("error", function () {
                $(this).attr("src","{!!Assets!!}images/user.png");
            });
            $('#profileModal').modal('show');
     },
     getUsers:function(load){
       var self=this;
       $.ajax({
         url:'{{route("ajaxApplicationList")}}',
         type:'post',
         data:{
           _token:'{{csrf_token()}}',
           search:self.search,
           page:self.users.current_page,
           pageno:self.pagechange,
           userstatus:self.userstatus,
           verifystatus:self.verifystatus,
           txtsearch:self.txtsearch,
           orgcat:self.orgcat,
           usermisson:self.usermisson
         },
         beforeSend:function(){
             if(!load)
             self.loading=true;
         }
         ,
         success:function(res){
            // var res = JSON.stringify(res);

            self.users=res;
            self.pagination=res.meta;
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
          $("#deletedImage").val(vm.deletedImage);
          if(isValidForm){
                  jQuery.ajax({
                         url:'{{route("addApplication")}}',
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
                  vm.documentView=[{"name":"vedraj","id":1},{"name":"patell","id":12}];
                  vm.eventImages1= jsondata.documentView;
                  vm.eventImages= jsondata.certificateView;

                 
                  vm.mydata =  jsondata;
                 
                  
                  fillFields(jsondata);

                   

                  // $("#seats").val(jsondata.seats);
                  // $("#location").val(jsondata.location);
                  // $("#project").val(jsondata.project_id);
                  // console.log(jsondata.get_images);




                  $('.opensider').click();
                  


     }

   }
 });

 $(document).on('change','#support_help',function(){
    var txt = $("#support_help option:selected").text();
    if(txt=='Other'){
        $("#othersupport").removeClass('hidden');
        $("#othersupport").attr('required',true);
        $("#othersupport").val('');
    }else{
        $("#othersupport").addClass('hidden');
        $("#othersupport").val(txt);
        $("#othersupport").attr('required',false);
    }
 });

 $(document).on('change','#category',function(){
    var txt = $("#category option:selected").text();
    if(txt=='Other'){
        $("#otherCategory").removeClass('hidden');
        $("#otherCategory").attr('required',true);
        $("#otherCategory").val('');
    }else{
        $("#otherCategory").addClass('hidden');
        $("#otherCategory").val(txt);
        $("#otherCategory").attr('required',false);
    }
 });

 $(document).on('change','#reference',function(){
    var txt = $("#reference option:selected").text();
    if(txt=='Other'){
        $("#otherReference").removeClass('hidden');
        $("#otherReference").attr('required',true);
        $("#otherReference").val('');
    }else{
        $("#otherReference").addClass('hidden');
        $("#otherReference").val(txt);
        $("#otherReference").attr('required',false);
    }
 });



 function fillFields(jsondata){
     $("#user_id").val(jsondata.id);
     $("#first_name").val(jsondata.first_name);
     $("#last_name").val(jsondata.last_name);
     $("#email").val(jsondata.email);


     //contacct info
     $("#phone").val(jsondata.phone);
     $("#address_line1").val(jsondata.address_line1);
     $("#address_line2").val(jsondata.address_line2);
     $("#city").val(jsondata.city);
     $("#district").val(jsondata.district);
     $("#state").val(jsondata.state);
     $("#pincode").val(jsondata.pincode);
     $(".Outputshow1").html('');   
     $(".Outputshow").html('');   
    $.each(jsondata.certificateView, function( key, value){
        if(value.file_type=='img'){
            imgpath =  "{!!UserPath!!}"+jsondata.id+'/Thumb/'+value.file;    
            fullpath =  "{!!UserPath!!}"+jsondata.id+'/'+value.file;    
            var htm1 = '<div title="'+value.file_name+'" class="profile-picImg GalleryBox clearimx" id="'+value.id+'"><input type="hidden" value="'+value.file+'" name="imagename[]" id="imagename"><input type="hidden" value="'+value.file+'" name="orgimagename[]" id="orgimagename"><div class="gclose" onclick="deletegalleryimage('+value.id+');" title="Remove Image"></div><a href="'+fullpath+'" target="_blank"><img id="galimgDocument1581320224_269" src="'+imgpath+'" class="profile-picImg"></div>';
            placehold = "{!!Assets!!}images/attachment.png";
        }else{
            imgpath =  "{!!UserPath!!}"+jsondata.id+'/'+value.file;
            var htm1 = '<div title="'+value.file_name+'" class="profile-picImg GalleryBox clearimx" id="'+value.id+'"><input type="hidden" value="'+value.file+'" name="imagename1[]" id="imagename1"><input type="hidden" value="'+value.file+'" name="orgimagename1[]" id="orgimagename1"><div class="gclose" onclick="deletegalleryimage('+value.id+');" title="Remove Image"></div><a href="'+imgpath+'"><img id="'+value.file+'" src="{{Assets}}images/attachment.png" class="profile-picImg" style="height:150px;"></a></div>';
            placehold = "{!!Assets!!}images/attachment.png";
        }
        $(".Outputshow").append(htm1);        
        $(".Outputshow img").on("error", function (){
            $(this).attr("src",placehold);
            $(this).attr("height",'150px');
        });
    });


    $.each(jsondata.documentView, function( key, value){
        if(value.file_type=='img'){
                imgpath =  "{!!UserPath!!}"+jsondata.id+'/Thumb/'+value.file;    
                fullpath =  "{!!UserPath!!}"+jsondata.id+'/'+value.file;    
                var htm1 = '<div title="'+value.file_name+'" class="profile-picImg GalleryBox clearimx" id="'+value.id+'"><input type="hidden" value="'+value.file+'" name="imagename[]" id="imagename"><input type="hidden" value="'+value.file+'" name="orgimagename[]" id="orgimagename"><div class="gclose" onclick="deletegalleryimage('+value.id+');" title="Remove Image"></div><a href="'+fullpath+'" target="_blank"><img id="galimgDocument1581320224_269" src="'+imgpath+'" class="profile-picImg"></div>';
                placehold = "{!!Assets!!}images/attachment.png";
        }else{
                imgpath =  "{!!UserPath!!}"+jsondata.id+'/'+value.file;
                var htm1 = '<div title="'+value.file_name+'" class="profile-picImg GalleryBox clearimx" id="'+value.id+'"><input type="hidden" value="'+value.file+'" name="imagename1[]" id="imagename1"><input type="hidden" value="'+value.file+'" name="orgimagename1[]" id="orgimagename1"><div class="gclose" onclick="deletegalleryimage('+value.id+');" title="Remove Image"></div><a href="'+imgpath+'"><img id="'+value.file+'" src="{{Assets}}images/attachment.png" class="profile-picImg" style="height:150px;"></a></div>';
                placehold = "{!!Assets!!}images/attachment.png";
        }
        $(".Outputshow1").append(htm1);        
        $(".Outputshow1 img").on("error", function (){
            $(this).attr("src",placehold);
            $(this).attr("height",'150px');
        });
    });
        
     if(jsondata.org_data){
        $("#registration_no").val(jsondata.org_data.reg_no);
        $("#category").val(jsondata.org_data.org_category);
        $("#strength").val(jsondata.org_data.org_strength);
        $("#support_help").val(jsondata.org_data.support_help_id);
        $("#reference").val(jsondata.org_data.reference);
     }

     var txt = $("#reference option:selected").text();
     if(txt=='Other'){
         $("#otherReference").removeClass('hidden');
         $("#otherReference").attr('required',true);
         if(jsondata.org_data){
            $("#otherReference").val(jsondata.org_data.other_reference);
         }
     }else{
         $("#otherReference").addClass('hidden');
         $("#otherReference").val(txt);
         $("#otherReference").attr('required',false);
     }


     var txt = $("#category option:selected").text();
     if(txt=='Other'){
         $("#otherCategory").removeClass('hidden');
         $("#otherCategory").attr('required',true);
         if(jsondata.org_data){
            $("#otherCategory").val(jsondata.org_data.org_category_txt);
         }
     }else{
         $("#otherCategory").addClass('hidden');
         $("#otherCategory").val(txt);
         $("#otherCategory").attr('required',false);
     }

     var txt = $("#support_help option:selected").text();
     if(txt=='Other'){
         $("#othersupport").removeClass('hidden');
         $("#othersupport").attr('required',true);
         //$("#othersupport").val(jsondata.org_data.support_help_text);
     }else{
         $("#othersupport").addClass('hidden');
         $("#othersupport").val(txt);
         $("#othersupport").attr('required',false);
     }


 }
 </script>

<script type="text/javascript">
  /*custom js here*/
  $(document).on("change","#imagefile",function(){
               var fileExtension = ['jpeg', 'jpg', 'png', 'gif', 'bmp'];
               if ($.inArray($(this).val().split('.').pop().toLowerCase(), fileExtension) == -1) {
                  //alert("Only formats are allowed : "+fileExtension.join(', '));
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
              //alert("Only formats are allowed : "+fileExtension.join(', '));
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


  function opendrower(){
        $(".add-new-data").addClass("show");
        $(".overlay-bg").addClass("show");
        $(".select152").select2();
        $(".selectInterested").select2();
        $('.step-icon').each(function () {
            var $this = $(this);
            if ($this.siblings('span.step').length > 0) {
              $this.siblings('span.step').empty();
              $(this).appendTo($(this).siblings('span.step'));
            }
        });
        $(".tooltip").removeClass('show');
  }

  $(".opensider").on("click", function (){
      $('select#language_id option').attr("selected",false);
      $('select#interested_in_causes option').attr("selected",false);
      opendrower();
  });

  $(".hide-data-sidebar, .cancel-data-btn").on("click", function () {
      $(".add-new-data").removeClass("show");
      $(".overlay-bg").removeClass("show");
      $("#user_id").val("");
      $(".tooltip").removeClass('show');
      $("#frmAddData")[0].reset();
      $("#frmAddData-t-0").click();
  });
  if ($(".data-items").length > 0) {
    new PerfectScrollbar(".data-items", { wheelPropagation: false });
  }


</script>
<script src="{{env('APP_URL')}}public/app-assets/js/scripts/forms/custome_wizard-steps.js"></script>
<script type="text/javascript">
    $(document).ready(function (){
      $('.step-icon').each(function (){
          var $this = $(this);
          if ($this.siblings('span.step').length > 0){
              $this.siblings('span.step').empty();
              $(this).appendTo($(this).siblings('span.step'));
          }
      });
    });

    function deletegalleryimage(id){
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
            vm.deletedImage.push(id);

            
            $("#deletedImage").val(vm.deletedImage);
            $("#"+id).remove();
            // Swal.fire({
            //     type: "success",
            //     title: 'Deleted!',
            //     text: 'Your file has been deleted.',
            //     confirmButtonClass: 'btn btn-success',
            // })
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
