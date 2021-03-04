
 @extends('layouts.main')
 @php 
use App\Helper\AccessHelper;  
$accessAble = AccessHelper::isAccessAble(auth()->user()->id, 'crmconatct'); 
@endphp
 @section('appcss')
 <link rel="stylesheet" type="text/css" href="{{env('APP_URL')}}public/app-assets/vendors/css/tables/datatable/datatables.min.css">
 <link rel="stylesheet" type="text/css" href="{{env('APP_URL')}}public/app-assets/vendors/css/tables/datatable/select.dataTables.min.css">
 <link rel="stylesheet" type="text/css" href="{{env('APP_URL')}}public/app-assets/css/pages/data-list-view.css">
 <link rel="stylesheet" type="text/css" href="{{env('APP_URL')}}public/app-assets/vendors/css/forms/select/select2.min.css">
 <link rel="stylesheet" type="text/css" href="{{env('APP_URL')}}public/app-assets/css/plugins/forms/validation/form-validation.css">
 <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.css">
 <link rel="stylesheet" type="text/css" href="{{env('APP_URL')}}public/app-assets/css/plugins/forms/wizard.css">
 <link rel="stylesheet" type="text/css" href="{{env('APP_URL')}}public/app-assets/vendors/css/extensions/toastr.css">
 <link rel="stylesheet" type="text/css" href="{{env('APP_URL')}}public/assets/css/custome.css">
 <style>
 </style>
 @stop
 @section('content')
 <div class="content-wrapper" id="UserVueApp">
            <div class="content-header row">
              <div class="content-header-left col-md-9 col-12 mb-2">
                  <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-left mb-0">Beneficiary</h2>
                            
                            <?php /*
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Home</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#">Icons</a>
                                    </li>
                                </ol>
                            </div> */?>
                        </div>
                  </div>
              </div>
              <div class="col-md-3 col-12">
                                          <a class="opensider"></a>
                                          @if(in_array($accessAble, ['authorized','grant_acces']))  
                                          <button type="button" class="btn btn-primary  opensider pull-right" id="opensider">
                                              <i class="feather icon-plus"></i> New Beneficiary
                                          </button>
                                          @endif
                                            <!-- <button type="button" class="btn mt-2 btn-outline-primary btn-icon btn-block text-uppercase">Show Results</button> -->
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
                                        <div class="col-md-4 col-sm-6 col-xs-12">
                                            <div class="form-group">
                                                <label for="blood_group">Marital Status</label>
                                                <fieldset class="form-group position-relative has-icon-left input-divider-left">
                                                        <select class="form-control" id="txtmstatus" required name="txtmstatus" v-model="txtmstatus">
                                                            <option value="">Select Marital status</option>
                                                            <option value="Single">Single</option>
                                                            <option value="Married">Married</option>
                                                            <option value="Widow">Widow</option>
                                                        </select>
                                                        <div class="form-control-position">
                                                            <i class="fa fa-tint"></i>
                                                        </div>
                                                    </fieldset>
                                            </div>
                                        </div>


                                        <div class="col-md-4 col-sm-6 col-xs-12">
                                            <div class="form-group">
                                                <label for="eduction_id">Education</label>
                                                <fieldset class="form-group position-relative has-icon-left input-divider-left">
                                                    <select class="form-control" id="txteduction" name="txteduction" v-model="txteduction">
                                                    <option value="">Select Education</option>
                                                    <option v-for="data in userSetting.Education" :value="data.id">@{{data.title}}</option>
                                                    </select>
                                                        <div class="form-control-position">
                                                            <i class="fa fa-graduation-cap"></i>
                                                        </div>
                                                    </fieldset>
                                            </div>
                                        </div>


                                        <div class="col-md-4 col-sm-6 col-xs-12">
                                            <div class="form-group">
                                                    <label for="eduction_id">Kind of support/help you need?</label>
                                                    <fieldset class="form-group position-relative has-icon-left input-divider-left">
                                                    <select class="form-control" id="txtsupport" name="txtsupport" v-model="txtsupport" data-required-true="true" data-msg="Please which kind support you need?" >
                                                        <option value="">Select support/help</option>
                                                        <option v-for="data in userSetting.SupportHelp" :value="data.id">@{{data.title}}</option>
                                                    </select>
                                                        <div class="form-control-position">
                                                            <i class="fa fa-gift"></i>
                                                        </div>
                                                    </fieldset>
                                            </div>
                                        </div>


    
                                        <div class="col-md-4 col-sm-6 col-xs-12">
                                            <label for="userstatus">Status</label>
                                            <fieldset class="form-group">
                                                <select class="form-control" id="userstatus" name="userstatus" v-model="userstatus">
                                                    <option selected value="">All</option>
                                                    <option value="1">Active</option>
                                                    <option value="2">Rejected</option>
                                                    <option value="0">Pending</option>
                                                </select>
                                            </fieldset>
                                        </div>
                                         
                                        <div class="col-md-4 col-sm-6 col-xs-12">
                                            <label for="verifystatus">Varified</label>
                                            <fieldset class="form-group">
                                                <select class="form-control" id="verifystatus" name="verifystatus" v-model="verifystatus">
                                                    <option selected value="">All</option>
                                                    <option value="1">Verifed</option>
                                                    <option value="0">Not Verifed</option>
                                                </select>
                                            </fieldset>
                                        </div>
                                        <div class="col-md-4 col-sm-6 col-xs-12">
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
                                

                                <div class="ml-2">





                                          <input type="hidden" name="_token"  value="{{csrf_token()}}">



                                                  <div class="data-list-view-header">
                                      <div class="add-new-data-sidebar">
                                        <div class="overlay-bg"></div>
                                        <div class="add-new-data" style="width:auto">
                                            <div class="div mt-2 px-2 d-flex new-data-title justify-content-between">
                                                <div>
                                                    <h4>Create Beneficiary</h4>
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
                                                            <section id=" ">
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <div class="card">
                                                                            <div class="card-header">
                                                                                <!-- <h4 class="card-title">Validation Example </h4> -->
                                                                            </div>
                                                                            <div class="card-content">
                                                                                <div class="card-body">

                                                                                    <form action="#" id="frmAddData" name="frmAddData" class="  wizard-circle">

                                                                                        <!-- Step 1 -->
                                                                                            <input type="hidden" name="_token"  value="{{csrf_token()}}">
                                                                                            <input type="hidden" name="deletedImage" v-model="deletedImage" value="">
                                                                                            <div class="row">
                                                                                            <div class="col-md-1 col-sm-1 col-xs-1">
                                                                                            <div class="form-group">
                                                                                                    <label for="gender">Title</label>
                                                                                                    <fieldset class="">
                                                                                                            <select class="form-control" required id="title" name="title">
                                                                                                                <option value="Ms.">Ms.</option>
                                                                                                                <option value="Mr.">Mr.</option>
                                                                                                                <option value="Mrs.">Mrs.</option>
                                                                                                            </select>                                                                     <div class="form-control-position">
                                                                                                                
                                                                                                            </div>
                                                                                                        </fieldset>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-md-3 col-sm-5 col-xs-11">
                                                                                                <label for=" ">First Name</label>
                                                                                                <fieldset class="form-group position-relative has-icon-left input-divider-left">
                                                                                                    <input type="text" onKeyPress="return isAlfa(event)"  data-msg="Please enter first name"  id="first_name" class="form-control" required placeholder="First name" name="first_name"   >
                                                                                                    <div class="form-control-position">
                                                                                                        <i class="feather icon-user"></i>
                                                                                                    </div>
                                                                                                </fieldset>

                                                                                                <div class="form-group">
                                                                                                    <input type="hidden" id="user_id" value="" name="user_id">
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-md-4 col-sm-6 col-xs-12">
                                                                                                <div class="form-group">
                                                                                                    <label for="last_name">Last Name</label>
                                                                                                    <fieldset class="form-group position-relative has-icon-left input-divider-left">
                                                                                                            <input type="text" onKeyPress="return isAlfa(event)"  id="last_name" class="form-control"  data-msg="Please enter last name" required placeholder="Last Name" name="last_name">
                                                                                                            <div class="form-control-position">
                                                                                                                <i class="feather  icon-user"></i>
                                                                                                            </div>
                                                                                                        </fieldset>
                                                                                                </div>
                                                                                            </div>
                                                                                                
                                                                                            <div class="col-md-4 col-sm-6 col-xs-12">
                                                                                                <div class="form-group">
                                                                                                    <label for="gender">Gender</label>
                                                                                                    <fieldset class="form-group position-relative has-icon-left input-divider-left">
                                                                                                            <select class="form-control" required id="gender" name="gender">
                                                                                                                <option value="">Select Gender</option>
                                                                                                                <option value="Male">Male</option>
                                                                                                                <option value="Female">Female</option>
                                                                                                                <option value="Transgender">Transgender</option>
                                                                                                            </select>                                                                     <div class="form-control-position">
                                                                                                                <i class="fa fa-venus-double"></i>
                                                                                                            </div>
                                                                                                        </fieldset>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-md-4 col-sm-6 col-xs-12">
                                                                                                <div class="form-group">
                                                                                                    <label for="dob">Date Of Birth</label>
                                                                                                    <fieldset class="form-group position-relative has-icon-left input-divider-left">
                                                                                                            <input type="text" id="dob" class="form-control" name="dob" placeholder="DOB dd/mm/yyyy">
                                                                                                            <div class="form-control-position">
                                                                                                                <i class="feather icon-calendar"></i>
                                                                                                            </div>
                                                                                                        </fieldset>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-md-4 col-sm-6 col-xs-12">
                                                                                                <div class="form-group">
                                                                                                        <label for="blood_group">Blood Group</label>
                                                                                                        <fieldset class="form-group position-relative has-icon-left input-divider-left">
                                                                                                            <select class="form-control" id="blood_group" required name="blood_group">
                                                                                                                <option value="">Select blood group</option>
                                                                                                                <option v-for="data in userSetting.BloodGroup" :value="data.id">@{{data.title}}</option>
                                                                                                            </select>
                                                                                                            <div class="form-control-position">
                                                                                                                <i class="fa fa-tint"></i>
                                                                                                            </div>
                                                                                                        </fieldset>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-md-4 col-sm-6 col-xs-12">
                                                                                                <div class="form-group">
                                                                                                        <label for="blood_group">Marital Status</label>
                                                                                                        <fieldset class="form-group position-relative has-icon-left input-divider-left">
                                                                                                            <select class="form-control" id="mstatus" required name="mstatus">
                                                                                                                    <option value="Single">Single</option>
                                                                                                                    <option value="Married">Married</option>
                                                                                                                    <option value="Widow">Widow</option>
                                                                                                            </select>
                                                                                                            <div class="form-control-position">
                                                                                                                <i class="fa fa-tint"></i>
                                                                                                            </div>
                                                                                                        </fieldset>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-md-4 col-sm-6 col-xs-12">
                                                                                                    <div class="form-group">
                                                                                                        <label for="phone">Phone</label>
                                                                                                        <fieldset class="form-group position-relative has-icon-left input-divider-left">
                                                                                                                <input type="text" id="phone"  onKeyPress="return isNumberKey1(event)" maxlength="10"   class="form-control" required name="phone" placeholder="Phone Number">
                                                                                                                <div class="form-control-position">
                                                                                                                    <i class="feather icon-smartphone"></i>
                                                                                                                </div>
                                                                                                            </fieldset>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-md-4 col-sm-6 col-xs-12">
                                                                                                    <div class="form-group">
                                                                                                        <label for="phone">Email</label>
                                                                                                        <fieldset class="form-group position-relative has-icon-left input-divider-left">
                                                                                                                <input type="text" id="email" class="form-control" required name="email" placeholder="Email">
                                                                                                                <div class="form-control-position">
                                                                                                                    <i class="fa fa-envelope"></i>
                                                                                                                </div>
                                                                                                            </fieldset>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <!--- image upload -->
                                                                                                <div class="col-md-4 col-sm-6 col-xs-12">
                                                                                                        <div class="form-group ">
                                                                                                            <label for="title">Photo</label><br>
                                                                                                            <button type="button" onclick="document.getElementById('photofile').click()"  class="btn btn-primary mr-1 mb-1 waves-effect waves-light"><i class="fa fa-paperclip"></i> Select Images</button>
                                                                                                            <div class="input-group mb-3 hidden">
                                                                                                                <div class="input-group-prepend">
                                                                                                                    <!-- <span class="input-group-text">Upload</span> -->
                                                                                                                </div>
                                                                                                                <div class="custom-file">
                                                                                                                    <input type="file" name="photofile" id="photofile" data-ismulti="false" data-fileext="png,jpg,jpeg,bmp,gif" data-iheight="150" data-iwidth="150" data-ismeta="false" class="uploadInputFile custom-file-input">
                                                                                                                    <label class="custom-file-label" style="overflow:hidden">Choose file</label>
                                                                                                                    <input class="fileext" type="hidden" name="fileext" id="fileext" value="hih" >
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="PreviewImageDiv" id="ImageGallery">
                                                                                                            <div v-for="(data, key) in img_profile" title=""  class="profile-picImg GalleryBox " style="display: table;max-width: 1px;word-wrap: anywhere;" :id="'GalleryBox'+data.file">
                                                                                                                <input type="hidden" :value="data.file" name="imagename[]" id="imagename">
                                                                                                                <div class="gclose" v-on:click="updatearray(key,data.id,'profile')" title="Remove Image"></div>
                                                                                                                <img id="galimgDocument1556361385_85" :src="'{{BeneficiaryAbsPath}}'+data.user_id+'/Thumb/'+data.file" class="profile-picImg">
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <input type="hidden" name="deletedphotofile"   value="">
                                                                                                </div>
                                                                                                <!-- end image upload -->

                                                                                            </div>
                                                                                            <div class="row">
                                                                                                    <div class="col-12 mb-2">
                                                                                                        <a href="" target="">Address </a>
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
                                                                                                        <input type="text" id="district" onKeyPress="return isAlfa(event)"  onKeyPress="return isAlfa(event)"  class="form-control" name="district" placeholder="District">
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
                                                                                                        <input type="text" id="pincode"  onKeyPress="return isNumberKey1(event)"   maxlength="6" class="form-control" name="pincode" placeholder="Pincode">
                                                                                                    </div>
                                                                                                </div>
                                                                                                
                                                                                                    
                                                                                            </div>
                                                                                        
                                                                                            
                                                                                            <div class="row">
                                                                                                <div class="col-12 mb-2">
                                                                                                    <a href="" target="">Other Background Information </a>
                                                                                                </div>
                                                                                            
                                                                                            
                                                                                            <div class="col-md-4 col-12">
                                                                                                <div class="form-group">
                                                                                                        <label for="eduction_id">Education</label>
                                                                                                        <fieldset class="form-group position-relative has-icon-left input-divider-left">
                                                                                                        <select class="form-control" id="eduction_id" name="eduction_id">
                                                                                                            <option value="">Select Education</option>
                                                                                                            <option v-for="data in userSetting.Education" :value="data.id">@{{data.title}}</option>
                                                                                                        </select>
                                                                                                            <div class="form-control-position">
                                                                                                                <i class="fa fa-graduation-cap"></i>
                                                                                                            </div>
                                                                                                        </fieldset>
                                                                                                </div>
                                                                                            </div>
                                                                                            
                                                                                            <div class="col-md-4 col-12">
                                                                                                <div class="form-group">
                                                                                                        <label for="no_family">No of family</label>
                                                                                                        <fieldset class="form-group position-relative has-icon-left input-divider-left">
                                                                                                        <select class="form-control" id="no_family" name="no_family">
                                                                                                            <option value="1">1</option>
                                                                                                            <option value="2">2</option>
                                                                                                            <option value="3">3</option>
                                                                                                            <option value="4">4</option>
                                                                                                            <option value="5">5</option>
                                                                                                            <option value="6">6</option>
                                                                                                            <option value="7">7</option>
                                                                                                            <option value="7+">7+</option>
                                                                                                        </select>
                                                                                                            <div class="form-control-position">
                                                                                                                <i class="fa fa-child"></i>
                                                                                                            </div>
                                                                                                        </fieldset>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-md-4 col-12">
                                                                                                <div class="form-group">
                                                                                                        <label for="eduction_id">Family Inclome</label>
                                                                                                        <fieldset class="form-group position-relative has-icon-left input-divider-left">
                                                                                                        <select class="form-control" id="income" name="income">
                                                                                                            <option value="Less Than 5000">Less Than 5000</option>
                                                                                                            <option value="More Than 5000">More Than 5000</option>
                                                                                                        </select>
                                                                                                            <div class="form-control-position">
                                                                                                                <i class="fa fa-money"></i>
                                                                                                            </div>
                                                                                                        </fieldset>

                                                                                                </div>
                                                                                            </div>
                                                                                            <!--- image upload -->
                                                                                                <div class="col-lg-12">
                                                                                                        <div class="form-group ">
                                                                                                            <label for="title">ID Proof(Voter ID/Adhaar)</label><br>
                                                                                                            <button type="button" onclick="document.getElementById('idproof').click()"  class="btn btn-primary mr-1 mb-1 waves-effect waves-light"><i class="fa fa-paperclip"></i> Select Images</button>
                                                                                                            <div class="input-group mb-3 hidden">
                                                                                                                <div class="input-group-prepend">
                                                                                                                    <!-- <span class="input-group-text">Upload</span> -->
                                                                                                                </div>
                                                                                                                <div class="custom-file">
                                                                                                                    <input type="file" name="idproof" id="idproof" data-ismulti="true"  data-fileext="png,jpg,jpeg,bmp,gif,pdf,zip,sql" data-iheight="150" data-iwidth="auto" data-ismeta="true" class="uploadInputFile custom-file-input">
                                                                                                                    <label class="custom-file-label" style="overflow:hidden">Choose file</label>
                                                                                                                    
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="PreviewImageDiv" id="ImageGallery">
                                                                                                        <div v-for="(data, key) in img_id_proof" title=""  class="profile-picImg GalleryBox" style="display: table;max-width: 1px;word-wrap: anywhere;" :id="'GalleryBox'+data.file">
                                                                                                            <input type="hidden" :value="data.file" name="imagename[]" id="imagename">
                                                                                                            <div class="gclose" v-on:click="updatearray(key,data.id,'proof')" title="Remove Image"></div>
                                                                                                            <a  v-if="data.type=='img'"  target="_blank" :href="'{{BeneficiaryAbsPath}}'+data.user_id+'/'+data.file"  >
                                                                                                                <img id="galimgDocument1556361385_85" :src="'{{BeneficiaryAbsPath}}'+data.user_id+'/Thumb/'+data.file" class="profile-picImg">
                                                                                                            </a>
                                                                                                            <a v-else target="_blank" :href="'{{BeneficiaryAbsPath}}'+data.user_id+'/'+data.file"  >
                                                                                                                <img id="galimgDocument1556361385_85" :src="'{{Assets}}'+'images/attachment.png'" class="profile-picImg"  style='height:150px;'>
                                                                                                            </a>
                                                                                                            <div v-if="data.meta.length>5">
                                                                                                                <div class="clearfix"></div>
                                                                                                                <div class='clearfix'></div><b style='font-size:10px'>@{{JSON.parse(data.meta).size}} (@@{{JSON.parse(data.meta).extention}})</b><div class='clearfix'></div><i style='font-size:10px'>@{{JSON.parse(data.meta).filename}}</i>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        </div>
                                                                                                        <input type="hidden" name="deletedidproof"   value="">
                                                                                                </div>
                                                                                                <!-- end image upload -->
                                                                                            </div> 
                                                                                            <div class="row">
                                                                                                    <div class="col-12 mb-2">
                                                                                                        <a href="" target="">Other Background Information </a>
                                                                                                    </div>
                                                                                                    <div class="col-md-4 col-12">
                                                                                                        <div class="form-group">
                                                                                                                <label for="eduction_id">Kind of support/help you need?</label>
                                                                                                                <fieldset class="form-group position-relative has-icon-left input-divider-left">
                                                                                                                <select class="form-control" id="support" name="support" data-required-true="true" data-msg="Please which kind support you need?" >
                                                                                                                    <option value="">Select support/help</option>
                                                                                                                    <option v-for="data in userSetting.SupportHelp" :value="data.id">@{{data.title}}</option>
                                                                                                                </select>
                                                                                                                    <div class="form-control-position">
                                                                                                                        <i class="fa fa-gift"></i>
                                                                                                                    </div>
                                                                                                                </fieldset>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-md-4 col-12">
                                                                                                        <div class="form-group">
                                                                                                                <label for="eduction_id">Duration</label>
                                                                                                                <fieldset class="form-group position-relative has-icon-left input-divider-left">
                                                                                                                    <select class="form-control" id="duration" name="duration">
                                                                                                                        <option value="One Time">One Time</option>
                                                                                                                        <option value="Monthly">Monthly</option>
                                                                                                                    </select>
                                                                                                                    <div class="form-control-position">
                                                                                                                        <i class="fa fa-clock-o"></i>
                                                                                                                    </div>
                                                                                                                </fieldset>
                                                                                                        </div>
                                                                                                    </div>

                                                                                                    <!--- image upload -->
                                                                                                    <div class="col-lg-12">
                                                                                                        <div class="form-group ">
                                                                                                            <label for="title">Necessary Document/Report </label><br>
                                                                                                            <button type="button" onclick="document.getElementById('reportfile').click()"  class="btn btn-primary mr-1 mb-1 waves-effect waves-light"><i class="fa fa-paperclip"></i> Select Images</button>
                                                                                                            <div class="input-group mb-3 hidden">
                                                                                                                <div class="input-group-prepend">
                                                                                                                    <!-- <span class="input-group-text">Upload</span> -->
                                                                                                                </div>
                                                                                                                <div class="custom-file">
                                                                                                                    <input type="file" name="reportfile" id="reportfile" data-ismulti="true" data-fileext="png,jpg,jpeg,bmp,gif,pdf,zip,sql" data-iheight="150" data-iwidth="auto" data-ismeta="true" class="uploadInputFile custom-file-input">
                                                                                                                    <label class="custom-file-label" style="overflow:hidden">Choose file</label>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="PreviewImageDiv" id="ImageGallery">
                                                                                                        
                                                                                                        <div v-for="(data, key) in img_report" title=""   class="profile-picImg GalleryBox" style="display: table;max-width: 1px;word-wrap: anywhere;" :id="'GalleryBox'+data.file">
                                                                                                            <input type="hidden" :value="data.file" name="imagename[]" id="imagename">
                                                                                                            
                                                                                                            <div class="gclose" v-on:click="updatearray(key,data.id,'report')" title="Remove Image"></div>
                                                                                                            <a  v-if="data.type=='img'"  target="_blank" :href="'{{BeneficiaryAbsPath}}'+data.user_id+'/'+data.file"  >
                                                                                                                <img id="galimgDocument1556361385_85" :src="'{{BeneficiaryAbsPath}}'+data.user_id+'/Thumb/'+data.file" class="profile-picImg">
                                                                                                            </a>
                                                                                                            <a v-else target="_blank" :href="'{{BeneficiaryAbsPath}}'+data.user_id+'/'+data.file"  >
                                                                                                                <img id="galimgDocument1556361385_85" :src="'{{Assets}}'+'images/attachment.png'" class="profile-picImg"  style='height:150px;'>
                                                                                                            </a>
                                                                                                            <div v-if="data.meta.length>5">
                                                                                                                <div class='clearfix'></div>
                                                                                                                <b style='font-size:10px'>@{{JSON.parse(data.meta).size}} (@@{{JSON.parse(data.meta).extention}})</b><div class='clearfix'></div><i style='font-size:10px'>@{{JSON.parse(data.meta).filename}}</i>
                                                                                                            </div> 
                                                                                                        </div>
                                                                                                        </div>
                                                                                                        <input type="hidden" name="deletedreportfile"   value="">
                                                                                                    </div>
                                                                                                    <!-- end image upload -->
                                                                                                </div>
                                                                                                @if(in_array($accessAble, ['authorized']))
                                                                                                <div class="row">    
                                                                                                    <div class="col-md-4 col-lg-4">
                                                                                                        <div class="form-group">
                                                                                                                <label for="eduction_id">Action</label>
                                                                                                                <select class="form-control" id="active" v-on:change="selectRequest()" name="active">
                                                                                                                    <option value="0">Pending</option>
                                                                                                                    <option value="1">Approved</option>
                                                                                                                    <option value="2">Rejected</option>
                                                                                                                </select>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                
                                                                                                    <div  class="clearfix"></div>
                                                                                                    
                                                                                            </div>
                                                                                            <div style="display: none" class="col-md-12 col-12" id="reason">
                                                                                                            <label for="note">Reason for rejection.</label>      
                                                                                                            <textarea name="note" id="note" data-rule-minlength="50" class="form-control"  cols="30" rows="3"></textarea>              
                                                                                                </div>  
                                                                                            @else 
                                                                                                <div class="row">    
                                                                                                    <div class="col-md-4 col-lg-4">
                                                                                                        <div class="form-group">
                                                                                                                <label for="eduction_id">Action</label>
                                                                                                                <select class="form-control" id="active" v-on:change="selectRequest()" name="active">
                                                                                                                    <option disabled value="0">Pending</option>
                                                                                                                    <option disabled value="1">Approved</option>
                                                                                                                    <option disabled value="2">Rejected</option>
                                                                                                                </select>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div  class="clearfix"></div>
                                                                                            </div>
                                                                                            <div style="display: none" class="col-md-12 col-12" id="reason">
                                                                                                            <label for="note">Reason for rejection.</label>      
                                                                                                            <textarea name="note" id="note" data-rule-minlength="50" class="form-control"  readonly cols="30" rows="3"></textarea>              
                                                                                                </div>  
                                                                                            @endif
                                                                                    </form>
                                                                                    <div  class="clearfix"></div>
                                                                                    <br>
                                                                                    @if(in_array($accessAble, ['authorized','grant_acces']))
                                                                                        <button type="button" v-on:click="SaveData()" id="SaveData" class="btn btn-primary ">Add Data</button>
                                                                                    @endif     
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
                                                <th>Name</th>
                                                <th>Gender</th>
                                                <th>Merital Status</th>
                                                <th>Phone</th>
                                                <th>City</th>
                                                <th>support</th>
                                                 <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          <tr v-if='users.data.length>0  && !loading' v-for='user in users.data '>
                                                <td>@{{user.id}}</td>
                                                
                                                <td class="text-nowrap "   > 
                                                    <template v-if="{!!auth()->user()->id!!} == user.id || {!!auth()->user()->role_id!!}==0">
                                                        <a  v-on:click="goDetails(user.id)" class="linkcolor" >                            
                                                            <img class="round" :src="'{{BeneficiaryAbsPath}}'+user.id+'/Thumb/'+user.profile" onerror="this.src='{{Assets}}images/user.png'" alt="avtar img holder" height="32" width="32">
                                                            @{{user.first_name}}
                                                            @{{user.last_name}}
                                                        </a>
                                                    </template>
                                                    <template v-else>
                                                        <a  v-on:click="getFillpopup(user)"  class="linkcolor">                            
                                                            <img class="round" :src="'{{BeneficiaryAbsPath}}'+user.id+'/Thumb/'+user.profile" onerror="this.src='{{Assets}}images/user.png'" alt="avtar img holder" height="32" width="32">
                                                            @{{user.first_name}}
                                                            @{{user.last_name}}
                                                        </a>    
                                                    </template>
                                                </td>
                                                  
                                                <td>@{{user.gender}}</td>
                                                <td>@{{user.marital_status}}</td>
                                                <td>@{{user.phone}}</td>
                                                <td>@{{user.city}}</td>
                                                <td class="text-nowrap">@{{user.support}}</td>
                                               
                                                <td v-if="user.status==1" class="text-success">Active</td>
                                                <td v-if="user.status==0" class="text-secondary">Pending</td>
                                                <td v-if="user.status==2" class="text-danger">Rejected</td>
                                                <td>
                                                    <div class="btn-group" role="group" aria-label="Basic example">
                                                        <button v-on:click="getUserDetails(user.id)"  data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit profile" type="button" class="btn btn-outline-primary groupbtn waves-effect waves-light"><i class="feather icon-edit-2"></i></button>
                                                        @if(in_array($accessAble, ['authorized','grant_acces'])) 
                                                        <button :id="user.id" data-status="active" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete User" type="button"  class="btn btn-outline-primary groupbtn waves-effect waves-light grouplrborder0 deleteUser"  ><i class="feather icon-trash deleteUser"></i></button>
                                                        @endif
                                                     </div>
                                                </td>
                                            </tr>
                                             <tr v-if="users.data.length==0">
                                                <td colspan="9"  align="center"> No record found</td>
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
@include('admin.users.commonProfileView')
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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
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
  setTimeout(function () {
    $('#dob').datepicker({
    format: "dd/mm/yyyy",
    // startDate: '-0d',
    endDate: '-1d'

});
},500);
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
                     url:'{{route("deleteBeneficiary")}}',
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
       pagination:{meta:{}},
       img_id_proof:[],
       img_profile:[],
       img_report:[],
       img_index:[],
       deletedImage:[],
       userstatus:"",
       verifystatus:"",
       txtsearch:"",
       txtsupport:"", 
       txteduction:"", 
       txtmstatus:""
      
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
      txtsupport:function(){
          this.getUsers();
      },
      txteduction:function(){
          this.getUsers();
      },
      txtmstatus:function(){
          this.getUsers();
      },
      
        
   }
   ,
   mounted:function(){
      this.getUsers();
   },
   methods:{
     goDetails: function(string) {
            var Newurl ="{{route('viewprofile','MID')}}";
            window.location.href = Newurl.replace('MID',string);
     },
     getFillpopup:function(result){

                    $("#pname").html(result.first_name+' '+result.last_name);
                    $("#pposition").html('Beneficiary');
                    $("#pcamp").html(result.campaigns_counts);
                    $("#pevent").html(result.events_counts);
                    $("#pblog").html(result.blog_counts);
                    var img = '{{BeneficiaryPath}}'+result.id+'/Thumb/'+result.profile;
                    $("#pimg").attr('src',img);
                    $("#pimg").on("error", function () {
                        $(this).attr("src","{!!Assets!!}images/user.png");
                    });
                    $('#profileModal').modal('show');
                  return false;  
                  var self=this;
                  jQuery.ajax({
                         url:'{{route("getVolunteerDetail")}}',
                         type:'post',
                         data: {'_token':"{{csrf_token()}}",'id':id},
                         beforeSend:function(){
                              
                         },
                         success:function(res){
                               if(res.status){
                                   $("#pname").html(res.result.first_name+' '+res.result.last_name);
                                   $("#pposition").html('Beneficiary');
                                   $("#pcamp").html(res.result.campaigns_counts);
                                   $("#pevent").html(res.result.events_counts);
                                   $("#pblog").html(res.result.blog_counts);
                                   alert(res.result.profile);
                                   $("#pimg").attr('src',res.result.profile);
                                   $("#pimg").on("error", function () {
                                        $(this).attr("src","{!!Assets!!}images/user.png");
                                   });
                                   $('#profileModal').modal('show');
                               }
                               return false;
                          },
                         complete:function(){
                             
                         }
                 });
                 
     },
    updatearray:function(inm,id,type){
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
            
            if(type=='proof'){
                    vm.img_id_proof.splice(inm, 1);
                    vm.deletedImage.push(id);
            }else if(type=='report'){
                    vm.img_report.splice(inm, 1);
                    vm.deletedImage.push(id);
            }else if(type=='profile'){
                    vm.img_profile.splice(inm, 1);
                    vm.deletedImage.push(id);
            } 
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
         url:'{{route("ajaxBeneficiariesList")}}',
         type:'post',
         data:{
           _token:'{{csrf_token()}}',
           search:self.search,
           page:self.users.current_page,
           pageno:self.pagechange,
           userstatus:self.userstatus,
           verifystatus:self.verifystatus,
           txteduction:self.txteduction,
           txtsupport:self.txtsupport,
           txtmstatus:self.txtmstatus,
           txteduction:self.txteduction,
           txtsearch:self.txtsearch
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
     selectRequest:function(type){
            var user_id =  $("#user_id").val();
            var active =  $("#active").val();
            $("#reason").hide();
            $("#note").val('');
            $('#frmAddData').validate();
            $('#note').rules('add',  { required: false });
            if(active=='2'){
                $("#reason").show();
                $('#note').rules('add',  { required: true });
            }
     },
     approveRequest:function(type){
          var user_id =  $("#user_id").val();
          
          return false; 
          var isValidForm =  $('#frmAddData').valid();
          if(isValidForm){
                  jQuery.ajax({
                         url:'{{route("approveBeneficiaries")}}',
                         type:'post',
                         data: $('#frmAddData').serialize(),
                         beforeSend:function(){
                           
                         },
                         success:function(res){
                              if(res.status){
                                  toastr.success(res.msg,'Success!');
                              }else{
                                  toastr.error(res.msg,'Error!');
                              }
                          },
                         complete:function(){
                             
                         }
                 });
          }
     },
     SaveData:function(load){
          var isValidForm =  $('#frmAddData').valid();
          if(isValidForm){
                  jQuery.ajax({
                         url:'{{route("addBeneficiaries")}}',
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
                                  vm.img_id_proof=[];
                                  vm.img_profile=[];
                                  vm.img_report=[];
                                  $(".clearimx").remove();
                              }else{
                                  toastr.error(res.msg,'Error!');
                              }

                             // self.users.current_page = res.meta.current_page+1;
                             // self.users.last_page = res.meta.last_page;
                             // self.users.data = self.users.data.concat(res.data);

                          },
                         complete:function(){
                            vm.getUsers();
                         }
                 });
          }
     },
     getUserDetails:function(id){
                  var self=this;

                  jQuery.ajax({
                         url:'{{route("getBeneficiariesDetail")}}',
                         type:'post',
                         data: {'_token':"{{csrf_token()}}",'id':id},
                         beforeSend:function(){
                             self.loading=true;
                         },
                         success:function(res){
                               if(res.status){
                                    vm.img_id_proof=[];
                                    vm.img_profile=[];
                                    vm.img_report=[];

                                    
                                   //var finalResult = JSON.stringify(res.result);
                                   //self.detail=jQuery.parseJSON(res.result);
                                   fillFields(res.result);
                                   //$('.opensider').click();
                                   opendrower();
                               }

                             // self.users.current_page = res.meta.current_page+1;
                             // self.users.last_page = res.meta.last_page;
                             // self.users.data = self.users.data.concat(res.data);
                             console.log();
                          },
                         complete:function(){
                             self.loading=false;
                         }
                 });

     }//end of savedata

   }
 });
 function fillFields(jsondata){
     $("#user_id").val(jsondata.id);
     $("#first_name").val(jsondata.first_name);
     $("#last_name").val(jsondata.last_name);
     $("#email").val(jsondata.email);
     $("#gender").val(jsondata.gender);
     $("#dob").val(jsondata.dob);

     //contacct info
     $("#phone").val(jsondata.phone);
     $("#address_line1").val(jsondata.address_line1);
     $("#address_line2").val(jsondata.address_line2);
     $("#city").val(jsondata.city);
     $("#district").val(jsondata.district);
     $("#state").val(jsondata.state);
     $("#pincode").val(jsondata.pincode);
     $("#active").val(jsondata.status);
     if(jsondata.status==2){
         $("#reason").show();
     }else{
        $("#reason").hide();
     }   

 
     $("#mstatus").val(jsondata.marital_status);
     $("#eduction_id").val(jsondata.eduction_id);
     $("#support").val(jsondata.help_type);
     $("#duration").val(jsondata.duration);
     $("#income").val(jsondata.family_income);
     $("#no_family").val(jsondata.no_family);
     $("#title").val(jsondata.title);
     $("#note").val(jsondata.reject_note);

    vm.img_id_proof =  jsondata.img_report.filter(function(q) {
                return q.file_for  === 'id_proof';
    });
    vm.img_profile =  jsondata.img_report.filter(function(q) {
                return q.file_for  === 'profile';
    });
    vm.img_report =  jsondata.img_report.filter(function(q) {
                return q.file_for  === 'report';
    });
    
 console.log(vm.img_report);
 
     
     $("input[name=title][value='"+jsondata.is_blood_donor+"']").prop("checked",true);
     $("input[name=has_voluntee_experience][value='"+jsondata.has_voluntee_experience+"']").prop("checked",true);
     $("#eduction_id").val(jsondata.eduction_id);
     $("#blood_group").val(jsondata.blood_group);
     $("input[name=in_online][value='"+jsondata.interested_in_online+"']").prop("checked",true);
 }
 </script>

<script type="text/javascript">
  /*custom js here*/
  function opendrower(){
        $(".add-new-data").addClass("show");
        $(".overlay-bg").addClass("show");
        $(".select152").select2();
        $(".selectCauseState").select2();
        $(".selectInterested").select2();
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
      // $("#data-name, #data-price").val("");
      // $("#data-category, #data-status").prop('selectedIndex', 0);
      $("#user_id").val("");
      $(".tooltip").removeClass('show');
      $("#frmAddData")[0].reset();
      vm.img_id_proof=[];
      vm.img_profile=[];
      vm.img_report=[];
      $("#frmAddData-t-0").click();
  });
  if ($(".data-items").length > 0) {
    new PerfectScrollbar(".data-items", { wheelPropagation: false });
  }

$(document).on("change",".uploadInputFile",function(){
            
        var self = this;  
        var formid = $(this).parents('form').attr('id');
        var ismulti  = $(this).data('ismulti');
        var iheight  = $(this).data('iheight')!==undefined?$(this).data('iheight'):100;
        var iwidth  = $(this).data('iwidth')!==undefined?$(this).data('iwidth'):100;
        var ismeta  = $(this).data('ismeta')!==undefined?$(this).data('ismeta'):false;
            
        var fileExtension  = $(this).data('fileext').split(',');
            
        if ($.inArray($(this).val().split('.').pop().toLowerCase(), fileExtension) == -1) {
            alert("Only formats are allowed : "+fileExtension.join(', '));
            return false;
        } 

        var formid = $('#'+formid)[0];
        var htmlview = $("#ShowHide").html();
        $(self).parents('.form-group').next('.PreviewImageDiv').append(htmlview);
        var formData = new FormData(formid);
        formData.append('inputFileName', $(self).attr('id'));
        formData.append('inputismulti', ismulti);
        formData.append('iheight', iheight);
        formData.append('iwidth', iwidth);
        formData.append('ismeta', ismeta);
        
        $.ajax({
            type:'POST',
            url: '{{route("imgUploadAutoHeight")}}',
            data:formData,
            cache:false,
            contentType: false,
            processData: false,
            success:function(response){
                setTimeout(function(){
                    $(self).parents('.form-group').next('.PreviewImageDiv').find('#ShowHideOpen').remove();
                    if(ismulti){
                        $(self).parents('.form-group').next('.PreviewImageDiv').append(response);
                    }else{
                        $(self).parents('.form-group').next('.PreviewImageDiv').html(response);
                    }
                    
                },1000);
            },
            error: function(response){
                console.log('Error '+response);
            }
        });
});

function deletegalleryimage(id){
        if(confirm("Are you sure to remove it?")){
            $("#GalleryBox"+id).remove();
        }
}
</script>
<script src="{{env('APP_URL')}}public/app-assets/js/scripts/forms/custome_wizard-steps.js"></script>
 

 @stop
