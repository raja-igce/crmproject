@extends('layouts.main')
@php use App\Helper\AccessHelper;
$accessAble = AccessHelper::isAccessAble(auth()->user()->id, 'crmconatct'); 
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
 <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.css">
 <style>
 .popover {
        min-width: 320px !important;
 }
 </style>
 @stop
 @section('content')
 <div class="content-wrapper" id="UserVueApp">
            <div class="content-header row">
              <div class="content-header-left col-md-12 col-12 mb-2">
                  <div class="row breadcrumbs-top">
                      <div class="col-12">
                          <h2 class="content-header-title float-left mb-0">Volunteers</h2>
                          <a class="opensider"></a>
                                @if(in_array($accessAble, ['authorized','grant_acces']))  
                                <button type="button" class="btn btn-primary mt-0 pull-right opensider" id="opensider">
                                    <i class="feather icon-plus"></i> New Volunteer
                                </button>
                                @endif
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
                                            <label for="userstatus">Position</label>
                                            <fieldset class="form-group">
                                                <select class="form-control" id="userposition" name="userposition" v-model="userposition">
                                                    <option selected value="">All</option>
                                                    <option v-for="po in getPosition"  :value="po.value">@{{po.name}}</option>
                                                </select>
                                            </fieldset>
                                        </div> 
                                        <div class="col">
                                            <label for="userstatus">Causes</label>
                                            <fieldset class="form-group">
                                                <select class="form-control" id="usercauses" name="usercauses" v-model="usercauses">
                                                    <option selected value="">All</option>
                                                    <option v-for="data in userSetting.CausesInterested" :value="data.id">@{{data.title}}</option>
                                                </select>
                                            </fieldset>
                                        </div> 
                                        <div class="col">
                                            <label for="userstatus">Blood Group</label>
                                            <fieldset class="form-group">
                                                <select class="form-control" id="userblood" name="userblood" v-model="userblood">
                                                    <option selected value="">All</option>
                                                    <option v-for="data in userSetting.BloodGroup" :value="data.id">@{{data.title}}</option>
                                                </select>
                                            </fieldset>
                                        </div> 
                                    </div>    
                                    <div class="row">    
                                        <div class="col">
                                            <label for="userstatus">Institute</label>
                                            <fieldset class="form-group">
                                                <select class="form-control" id="userinstitute" name="userinstitute" v-model="userinstitute">
                                                    <option selected value="">All</option>
                                                    <option v-for="data in userSetting.Institutions" :value="data.id">@{{data.title}}</option>
                                                </select>
                                            </fieldset>
                                        </div> 
                                        <div class="col">
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
                                        <div class="col">
                                            <label for="txtsearch">Search</label>
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
                                                    <h4>Add New Volunteer</h4>
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

                                             <form action="#" id="frmAddData" name="frmAddData" class="steps-validation wizard-circle">

                                                 <!-- Step 1 -->
                                                 <input type="hidden" name="_token"  value="{{csrf_token()}}">
                                                 <h6><i class="step-icon feather icon-user"></i> Basic Info</h6>

                                                 <fieldset>
                                                     <div class="row">
                                                       <div class="col-md-6 col-xs-12">
                                                         <label for=" ">First Name</label>
                                                         <fieldset class="form-group position-relative has-icon-left input-divider-left">
                                                              <input type="text"  onKeyPress="return isAlfa(event)" data-msg="Please enter first name"  id="first_name" class="form-control" required placeholder="First name" name="first_name"   >
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
                                                               <label for="last_name">Last Name</label>
                                                               <fieldset class="form-group position-relative has-icon-left input-divider-left">
                                                                     <input type="text" id="last_name"  onKeyPress="return isAlfa(event)" class="form-control"  data-msg="Please enter last name" required placeholder="Last Name" name="last_name">
                                                                     <div class="form-control-position">
                                                                        <i class="feather  icon-user"></i>
                                                                    </div>
                                                                </fieldset>
                                                           </div>
                                                       </div>
                                                       <div class="col-md-6 col-12">
                                                           <div class="form-group">
                                                               <label for="email">Email</label>
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
                                                       <div class="col-md-6 col-12">
                                                           <div class="form-group">
                                                               <label for="dob">DOB</label>
                                                               <fieldset class="form-group position-relative has-icon-left input-divider-left">
                                                                     <input type="text" id="dob" class="form-control" name="dob" placeholder="DOB dd/mm/yyyy">
                                                                     <div class="form-control-position">
                                                                        <i class="feather icon-calendar"></i>
                                                                    </div>
                                                                </fieldset>
                                                           </div>
                                                       </div>
                                                     </div>
                                                 </fieldset>

                                                 <!-- Step 2 -->
                                                 <h6><i class="step-icon feather icon-smartphone"></i> Contact Info</h6>
                                                 <fieldset>
                                                     <div class="row">
                                                           <div class="col-md-4 col-12">
                                                               <div class="form-group">
                                                                   <label for="phone">Phone</label>
                                                                   <fieldset class="form-group position-relative has-icon-left input-divider-left">
                                                                         <input type="text" id="phone" onKeyPress="return isNumberKey1(event)" maxlength="10"  class="form-control" required name="phone" placeholder="Phone Number">
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
                                                                   <input type="text" id="city" class="form-control"   onKeyPress="return isAlfa(event)" name="city" placeholder="City">
                                                               </div>
                                                           </div>
                                                           <div class="col-md-4 col-12">
                                                               <div class="form-group">
                                                                   <label for="district">District</label>
                                                                   <input type="text" id="district" class="form-control"   onKeyPress="return isAlfa(event)" name="district" placeholder="District">
                                                               </div>
                                                           </div>
                                                           <div class="col-md-4 col-12">
                                                               <div class="form-group">
                                                                   <label for="state">State</label>
                                                                   <input type="text" id="state" class="form-control"   onKeyPress="return isAlfa(event)" name="state" placeholder="State">
                                                               </div>
                                                           </div>
                                                           <div class="col-md-4 col-12">
                                                               <div class="form-group">
                                                                   <label for="pincode">Pincode</label>
                                                                   <input type="text" id="pincode" maxlength="6" onKeyPress="return isNumberKey1(event)" class="form-control" name="pincode" placeholder="Pincode">
                                                               </div>
                                                           </div>
                                                           <div class="col-md-4 col-12">
                                                               <div class="form-group">
                                                                   <label for="live_in">Live In</label>
                                                                   <input type="text" id="live_in" class="form-control"   onKeyPress="return isAlfa(event)" name="live_in" placeholder="live in">
                                                               </div>
                                                           </div>
                                                     </div>
                                                 </fieldset>
                                                 <!-- Step 3 -->
                                                 <h6><i class="step-icon feather icon-image"></i> Demographic & Volunteer Info</h6>
                                                 <fieldset>
                                                     <div class="row">
                                                       <div class="col-md-4 col-12">
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
                                                                <label for="institutions">Institutions</label>
                                                                <fieldset class="form-group position-relative has-icon-left input-divider-left">
                                                                  <select class="form-control" id="institutions" name="institutions">
                                                                    <option value="">Select Institutions</option>
                                                                    <option v-for="data in userSetting.Institutions" :value="data.id">@{{data.title}}</option>
                                                                  </select>
                                                                       <div class="form-control-position">
                                                                         <i class="fa fa-university"></i>
                                                                     </div>
                                                                 </fieldset>


                                                           </div>
                                                       </div>
                                                       <div class="col-md-4 col-12">
                                                           <div class="form-group">
                                                                <label for="occupation">Occupation</label>
                                                                <fieldset class="form-group position-relative has-icon-left input-divider-left">
                                                                      <select class="form-control" required id="occupation" name="occupation">
                                                                        <option value="">Select occupation</option>
                                                                        <option v-for="data in userSetting.Occupation" :value="data.id">@{{data.title}}</option>
                                                                      </select>
                                                                       <div class="form-control-position">
                                                                         <i class="fa fa-briefcase"></i>
                                                                     </div>
                                                                 </fieldset>

                                                           </div>
                                                       </div>
                                                       <div class="col-md-4 col-12 customSelectlpd45">
                                                           <div class="form-group">
                                                               <label>Language Known</label>
                                                               <fieldset class="form-group position-relative has-icon-left input-divider-left">
                                                                    <select class="select152 form-control" required id="language_id" name="language_id[]" multiple="multiple">
                                                                        <option v-for="data in userSetting.LanguageKnown" :value="data.id">@{{data.title}}</option>
                                                                    </select>
                                                                      <div class="form-control-position">
                                                                        <i class="fa fa-language"></i>
                                                                    </div>
                                                                </fieldset>
                                                                <label for="language_id" class="error"></label>
                                                           </div>
                                                           <label class="error" for=""></label>
                                                       </div>
                                                       <div class="col-md-4 col-12 customSelectlpd45">
                                                           <div class="form-group">
                                                               <label  >Interested in Causes</label>
                                                               <fieldset class="form-group position-relative has-icon-left input-divider-left">
                                                                       <select class="selectInterested form-control" required id="interested_in_causes" name="interested_in_causes[]" multiple="multiple">
                                                                           <option v-for="data in userSetting.CausesInterested" :value="data.id">@{{data.title}}</option>
                                                                       </select>
                                                                       <div class="form-control-position">
                                                                           <i class="fa fa-certificate"></i>
                                                                       </div>
                                                                </fieldset>

                                                           </div>
                                                           <label class="error" for=""></label>
                                                       </div>

                                                       <div class="col-md-4 col-12">
                                                           <div class="form-group">
                                                               <label for="fb_link">Facebook Link</label>
                                                               <fieldset class="form-group position-relative has-icon-left input-divider-left">
                                                                 <input type="text" id="fb_link" class="form-control" data-rule-url="true" name="fb_link" placeholder="Facebook Link">
                                                                     <div class="form-control-position">
                                                                        <i class="fa fa-facebook"></i>
                                                                    </div>
                                                                </fieldset>
                                                           </div>
                                                       </div>
                                                       <div class="col-md-4 col-12">
                                                           <div class="form-group">
                                                               <label for="insta_link">Instagram Link</label>
                                                               <fieldset class="form-group position-relative has-icon-left input-divider-left">
                                                                 <input type="text" id="insta_link" class="form-control" data-rule-url="true" name="insta_link" placeholder="Instagram Link">
                                                                     <div class="form-control-position">
                                                                        <i class="fa fa-instagram"></i>
                                                                    </div>
                                                                </fieldset>
                                                           </div>
                                                       </div>
                                                       <div class="col-md-4 col-12">
                                                           <div class="form-group">
                                                               <label for="twitter_link">Twitter Link</label>
                                                               <fieldset class="form-group position-relative has-icon-left input-divider-left">
                                                                 <input type="text" id="twitter_link" class="form-control" data-rule-url="true" name="twitter_link" placeholder="Twitter Link">
                                                                     <div class="form-control-position">
                                                                        <i class="fa fa-twitter"></i>
                                                                    </div>
                                                                </fieldset>
                                                           </div>
                                                       </div>
                                                       <div class="col-md-4 col-12">
                                                           <div class="form-group">
                                                             <label for="twitter_link">Would you like to become a blood donor?</label>
                                                          <ul class="list-unstyled mb-0">
                                                                <li class="d-inline-block mr-2">
                                                                    <fieldset>
                                                                        <div class="vs-radio-con">
                                                                            <input type="radio" name="is_blood_donor" checked="" value="0">
                                                                            <span class="vs-radio">
                                                                                <span class="vs-radio--border"></span>
                                                                                <span class="vs-radio--circle"></span>
                                                                            </span>
                                                                            <span class="">No</span>
                                                                        </div>
                                                                    </fieldset>
                                                                </li>
                                                                <li class="d-inline-block mr-2">
                                                                    <fieldset>
                                                                        <div class="vs-radio-con">
                                                                            <input type="radio" name="is_blood_donor" checked="" value="1">
                                                                            <span class="vs-radio">
                                                                                <span class="vs-radio--border"></span>
                                                                                <span class="vs-radio--circle"></span>
                                                                            </span>
                                                                            <span class="">Yes</span>
                                                                        </div>
                                                                    </fieldset>
                                                                </li>
                                                            </ul>
                                                           </div>
                                                       </div>
                                                       <div class="col-md-4 col-12">
                                                           <div class="form-group">
                                                             <label for="twitter_link">Volunteer Experience if any?</label>
                                                          <ul class="list-unstyled mb-0">
                                                                <li class="d-inline-block mr-2">
                                                                    <fieldset>
                                                                        <div class="vs-radio-con">
                                                                            <input type="radio" name="has_voluntee_experience" checked="" value="0">
                                                                            <span class="vs-radio">
                                                                                <span class="vs-radio--border"></span>
                                                                                <span class="vs-radio--circle"></span>
                                                                            </span>
                                                                            <span class="">No</span>
                                                                        </div>
                                                                    </fieldset>
                                                                </li>
                                                                <li class="d-inline-block mr-2">
                                                                    <fieldset>
                                                                        <div class="vs-radio-con">
                                                                            <input type="radio" name="has_voluntee_experience" checked="" value="1">
                                                                            <span class="vs-radio">
                                                                                <span class="vs-radio--border"></span>
                                                                                <span class="vs-radio--circle"></span>
                                                                            </span>
                                                                            <span class="">Yes</span>
                                                                        </div>
                                                                    </fieldset>
                                                                </li>
                                                            </ul>
                                                           </div>
                                                       </div>
                                                       <div class="col-md-4 col-12">
                                                           <div class="form-group">
                                                             <label for="twitter_link">Are you interested in online fundraising campaign?</label>
                                                          <ul class="list-unstyled mb-0">
                                                                <li class="d-inline-block mr-2">
                                                                    <fieldset>
                                                                        <div class="vs-radio-con">
                                                                            <input type="radio" name="in_online" checked="" value="0">
                                                                            <span class="vs-radio">
                                                                                <span class="vs-radio--border"></span>
                                                                                <span class="vs-radio--circle"></span>
                                                                            </span>
                                                                            <span class="">No</span>
                                                                        </div>
                                                                    </fieldset>
                                                                </li>
                                                                <li class="d-inline-block mr-2">
                                                                    <fieldset>
                                                                        <div class="vs-radio-con">
                                                                            <input type="radio" name="in_online" checked="" value="1">
                                                                            <span class="vs-radio">
                                                                                <span class="vs-radio--border"></span>
                                                                                <span class="vs-radio--circle"></span>
                                                                            </span>
                                                                            <span class="">Yes</span>
                                                                        </div>
                                                                    </fieldset>
                                                                </li>
                                                            </ul>
                                                           </div>
                                                       </div>
                                                       <div class="col-md-4 col-12 customSelectlpd45">
                                                           <div class="form-group">
                                                               <label>Your availability for our causes</label>
                                                               <fieldset class="form-group position-relative has-icon-left input-divider-left">
                                                                    <select class="selectCauseState form-control" required id="state_id" name="state_id[]" multiple="multiple">
                                                                        <option v-for="data in userSetting.State" :value="data.id">@{{data.title}}</option>
                                                                    </select>
                                                                      <div class="form-control-position">
                                                                        <i class="fa fa-language"></i>
                                                                    </div>
                                                                </fieldset>
                                                                <label for="state_id" class="error"></label>
                                                           </div>
                                                           <label class="error" for=""></label>
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
                                             @if(in_array($accessAble, ['authorized','grant_acces'])) 
                                            <button type="button" v-on:click="SaveData()" id="SaveData" class="btn btn-primary hidden">Add Data</button>
                                             @endif   
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
                                                <th>Position</th>
                                                <th>Interested Causes</th>
                                                <th>Lives In</th>
                                                <th>Phone</th>
                                                <th>Email ID</th>
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
                                                            <img class="round" :src="user.profile_image" onerror="this.src='{{Assets}}images/user.png'" alt="avtar img holder" height="32" width="32">
                                                            @{{user.first_name}}
                                                            @{{user.last_name}}
                                                        </a>
                                                    </template>
                                                    <template v-else>
                                                        <a  v-on:click="getFillpopup(user.id)"  class="linkcolor">                            
                                                            <img class="round" :src="user.profile_image" onerror="this.src='{{Assets}}images/user.png'" alt="avtar img holder" height="32" width="32">
                                                            @{{user.first_name}}
                                                            @{{user.last_name}}
                                                        </a>    
                                                    </template>

                                                     
                                                    
                                                </td>
                                                <td>@{{user.position}}</td>
                                                <td>
                                                    <template v-for="(cause,key) in user.intereseted_causes">
                                                     <span v-if="key==user.intereseted_causes.length-1" class="text-nowrap" >@{{cause.title}}</span>
                                                     <span v-else class="text-nowrap"  >@{{cause.title}} / </span>
                                                     <p></p>
                                                    </template>
                                                     
                                                      <span v-if="user.intereseted_causes.length==0"> NA </span>  
                                                </td>
                                                <td>@{{user.live_in}}</td> 
                                                <td>@{{user.phone}}</td>
                                                <td>@{{user.email}}</td> 
                                                 
                                                <td v-if="user.status==1" class="text-success">Active</td>
                                                <td v-if="user.status==0" class="text-secondary">Pending</td>
                                                <td v-if="user.status==2" class="text-danger">Blocked</td>
                                                <td>
                                                    <div class="btn-group" role="group" aria-label="Basic example">
                                                        <button v-on:click="getUserDetails(user.id)"  data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit profile" type="button" class="btn btn-outline-primary groupbtn waves-effect waves-light"><i class="feather icon-edit-2"></i></button>
                                                        @if(in_array($accessAble, ['authorized','grant_acces'])) 
                                                        <button :id="user.id" data-status="active" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete User" type="button"  class="btn btn-outline-primary groupbtn waves-effect waves-light grouplrborder0 deleteUser"  ><i class="feather icon-trash deleteUser"></i></button>
                                                        @endif
                                                        <button v-on:click="goDetails(user.id)"  data-toggle="tooltip" data-placement="top" title="" data-original-title="View profile" type="button" class="btn btn-outline-primary groupbtn waves-effect waves-light"><i class="feather icon-eye"></i></button>
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
 <!-- <script src="{{env('APP_URL')}}public/app-assets/vendors/js/tables/datatable/datatables.min.js"></script>
 <script src="{{env('APP_URL')}}public/app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js"></script>
 <script src="{{env('APP_URL')}}public/app-assets/vendors/js/tables/datatable/dataTables.select.min.js"></script>
 <script src="{{env('APP_URL')}}public/app-assets/js/scripts/datatables/user-datatable.js"></script> -->
   <script src="{{env('APP_URL')}}public/app-assets/vendors/js/extensions/jquery.steps.min.js"></script>
  <script src="{{env('APP_URL')}}public/app-assets/vendors/js/forms/select/select2.full.min.js"></script>
  <script src="{{env('APP_URL')}}public/app-assets/vendors/js/forms/validation/jquery.validate.min.js"></script>
  <script src="{{env('APP_URL')}}public/app-assets/vendors/js/extensions/toastr.min.js"></script>
  <script src="{{env('APP_URL')}}public/assets/css/commom.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
  <script src="{{env('APP_URL')}}public/app-assets/vendors/js/extensions/sweetalert2.all.min.js"></script>
@include('layouts.pagingTemplateSource')
    <script type="text/javascript" src="{{env('APP_URL')}}public/assets/js/vue.code.js"></script>

   
 <script>
  setTimeout(function () {
    $('#dob').datepicker({
    format: "dd/mm/yyyy",
    // startDate: '-0d',
    endDate: '-18y'

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
       userposition:"",
       usercauses:"",
       userinstitute:"",
       userblood:"",
       load:1,
       
       userSetting:{!!json_encode($userSetting)!!},
       getPosition:{!!json_encode(getPosition())!!},
       
       pagination:{meta:{}},
       userstatus:"",
       verifystatus:"",
       txtsearch:""
   },
   filters: {
        goDetails: function(string) {
            var Newurl ="{{route('viewprofile','MID')}}";
            window.location.href = Newurl.replace('MID',string);
        }
    },
   watch:{
      userstatus:function(){
          this.users.current_page=1;
          this.getUsers();
      },
      verifystatus:function(){
          this.users.current_page=1;
          this.getUsers();
      },
      txtsearch:function(){
          this.users.current_page=1;
          this.getUsers();
      },
      userposition:function(){
          this.users.current_page=1;
          this.getUsers();
      },
      usercauses:function(){
          this.users.current_page=1;
          this.getUsers();
      },
      userinstitute:function(){
          this.users.current_page=1;
          this.getUsers();
      },
      userblood:function(){
          this.users.current_page=1;
          this.getUsers();
      }
        
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
     getUsers:function(load){
       var self=this;
       $.ajax({
         url:'{{route("ajaxUserList")}}',
         type:'post',
         data:{
                _token:'{{csrf_token()}}',
                search:self.search,
                page:self.users.current_page,
                pageno:self.pagechange,
                userstatus:self.userstatus,
                userposition:self.userposition,
                userinstitute:self.userinstitute,
                userblood:self.userblood,
                usercauses:self.usercauses,
                verifystatus:self.verifystatus,
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
                  jQuery.ajax({
                         url:'{{route("addVolunteer")}}',
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
                         },
                         complete:function(){
                             if(!load)
                             self.loading=false;
                         }
                 });
          }
     },
     getFillpopup:function(id){
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
                                   $("#pposition").html(res.result.position);
                                   $("#pcamp").html(res.result.campaigns_counts);
                                   $("#pevent").html(res.result.events_counts);
                                   $("#pblog").html(res.result.blog_counts);
                                   $("#pimg").attr('src',res.result.profile_pic);
 
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
                 
     },//end of savedata
     getUserDetails:function(id){
                  var self=this;

                  jQuery.ajax({
                         url:'{{route("getVolunteerDetail")}}',
                         type:'post',
                         data: {'_token':"{{csrf_token()}}",'id':id},
                         beforeSend:function(){
                             self.loading=true;
                         },
                         success:function(res){
                               if(res.status){
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
     $("#live_in").val(jsondata.live_in);

     //other Info
     $("#live_in").val(jsondata.live_in);
     //$("#is_blood_donor").val(jsondata.is_blood_donor);
     $("input[name=is_blood_donor][value='"+jsondata.is_blood_donor+"']").prop("checked",true);

     //$("#has_voluntee_experience").val(jsondata.has_voluntee_experience);
     $("input[name=has_voluntee_experience][value='"+jsondata.has_voluntee_experience+"']").prop("checked",true);


     $("#fb_link").val(jsondata.fb_link);
     $("#insta_link").val(jsondata.insta_link);
     $("#twitter_link").val(jsondata.twitter_link);
     $("#eduction_id").val(jsondata.eduction_id);
     $("#institutions").val(jsondata.institutions_id);
     $("#blood_group").val(jsondata.blood_group);
     $("#occupation").val(jsondata.occupation_id);

     $('select#language_id option').attr("selected",false);
     $.each(jsondata.language, function( key, value){
          $('.select152').find('option[value="'+ value.language_id +'"]').attr("selected", "selected");
          $('.selectInterested').find('option[value="'+ value.language_id +'"]').attr("selected", "selected");
     });

     $('.selectCauseState option').attr("selected",false);
     $.each(jsondata.states, function( key, value){
          $('.selectCauseState').find('option[value="'+ value.state_id +'"]').attr("selected", "selected");
     });
     
     
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
      // $("#data-name, #data-price").val("");
      // $("#data-category, #data-status").prop('selectedIndex', 0);
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

</script>
 

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
                            <h4 id="pname"></h4>
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
