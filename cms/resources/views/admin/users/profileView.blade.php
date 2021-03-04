@extends('layouts.main')
@php use App\Helper\AccessHelper;
$accessAble = AccessHelper::isAccessAble(auth()->user()->id, 'crmconatct'); 
$role_id = auth()->user()->role_id;
$is_profile_completed = auth()->user()->is_profile_completed;


@endphp
@section('appcss')
 <link rel="stylesheet" type="text/css" href="{{env('APP_URL')}}public/app-assets/vendors/css/tables/datatable/datatables.min.css">
 <link rel="stylesheet" type="text/css" href="{{env('APP_URL')}}public/app-assets/vendors/css/tables/datatable/select.dataTables.min.css">
 <link rel="stylesheet" type="text/css" href="{{env('APP_URL')}}public/app-assets/css/pages/data-list-view.css">
 <link rel="stylesheet" type="text/css" href="{{env('APP_URL')}}public/app-assets/css/pages/app-user.css">
 <link rel="stylesheet" type="text/css" href="{{env('APP_URL')}}public/app-assets/vendors/css/forms/select/select2.min.css">
 <link rel="stylesheet" type="text/css" href="{{env('APP_URL')}}public/app-assets/css/plugins/forms/validation/form-validation.css">
 <link rel="stylesheet" type="text/css" href="{{env('APP_URL')}}public/app-assets/css/plugins/forms/wizard.css">
 <link rel="stylesheet" type="text/css" href="{{env('APP_URL')}}public/app-assets/vendors/css/extensions/toastr.css">
 <link rel="stylesheet" type="text/css" href="{{env('APP_URL')}}public/assets/css/custome.css">
 <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.css">
 <style>
 </style>
 @stop
 @section('content')
 <div class="content-wrapper" id="UserVueApp">
            <a class="opensider"></a>
            <div class="content-body">
            <section class="page-users-view">
                    <div class="row">
                        <!-- account start -->
                        <div class="col-12">
                            <?php 
                                      if($is_profile_completed==0 && auth()->user()->role_id!=0){ ?>
                                        <div class="alert alert-danger" role="alert">
                                                <h4 class="alert-heading">Warnning</h4>
                                                <p class="mb-0">
                                                    Please complete your profile and wait for admin approval. You can't access any other modules till admin approve 
                                                </p>
                                        </div>      
                            <?php } ?>
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">Profile</div>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <form action="" id="frmAddData2" name="frmAddData2">
                                            <div class="users-view-image text-center">
                                                    <img id="image1" :src="userDetail.profile_pic" onerror="this.src='{{Assets}}images/user.png'" class="users-avatar-shadow w-100 rounded mb-0 mr-1 ml-1  " style="width: 125px !important"  onclick="document.getElementById('imagefile').click()" alt="avatar">
                                                    @if($role_id==0 || $userDetail[0]['id']==auth()->user()->id)
                                                    <i onclick="document.getElementById('imagefile').click()"> <a href="javascript:void(0)"> Change Profile</a> </i>
                                                    <input type="file" name="imagefile" id="imagefile" class="custom-file-input">
                                                    @endif    
                                                    <input type="hidden" name="_token" id="_token" value="{{csrf_token()}}">
                                                    <input type="hidden" name="id" id="id" :value="userDetail.id">
                                            </div>
                                        </form>
                                        <div class="col-12 col-sm-9 col-md-6 col-lg-5">
                                            <table>
                                                <tr>
                                                    <td class="font-weight-bold">Name
                                                    </td>
                                                    <td>@{{userDetail.first_name}} @{{userDetail.last_name}}</td>
                                                </tr>
                                                <tr>
                                                    <td class="font-weight-bold">Email</td>
                                                    <td>@{{userDetail.email}}</td>
                                                </tr>
                                                <tr>
                                                    <td class="font-weight-bold">Gender</td>
                                                    <td v-if="userDetail.gender">@{{userDetail.gender}}</td>
                                                    <td v-else>-</td>
                                                </tr>
                                                <tr>
                                                    <td class="font-weight-bold">Birth Date</td>
                                                    <td v-if="userDetail.dob">@{{userDetail.dob}}</td>
                                                    <td v-else>-</td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="col-12 col-md-12 col-lg-5">
                                            <table class="ml-0 ml-sm-0 ml-lg-0">
                                                <tr>
                                                    <td class="font-weight-bold">Status</td>
                                                    <td v-if="userDetail.status==0">Pending</td>
                                                    <td v-else-if="userDetail.status==1">Approved</td>
                                                    <td v-else-if="userDetail.status==2">Rejected</td>
                                                    <td v-else >-</td>
                                                    
                                                </tr>
                                                <tr>
                                                    <td class="font-weight-bold">Role</td>
                                                    <td>@{{userDetail.role_title}} </td>
                                                </tr>
                                                <tr>
                                                    <td class="font-weight-bold">Position 
                                                        @if(in_array($accessAble, ['authorized','grant_acces']) || $role_id==0) 
                                                        <i class="fa fa-pencil" data-toggle="modal" data-target="#exampleModal"></i>
                                                        
                                                        <div class="modal"  id="exampleModal" tabindex="-1" role="dialog">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">Change Position</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <select class="form-control" name="txtposition" id="txtposition">
                                                                        <template v-for="pos in getPosition">
                                                                            <option v-if="pos.name==userDetail.position" selected :value="pos.name" >@{{pos.name}}</option>
                                                                            <option v-else :value="pos.name" >@{{pos.name}}</option>
                                                                        </template>
                                                                    </select>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-primary updateposition"  :data-id="userDetail.id" >Save changes</button>
                                                                    <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                                                                </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @endif
                                                    </td> 
                                                    <td v-if="userDetail.position">@{{userDetail.position}} </td>
                                                    <td v-else> - </td>
                                                </tr>

                                                <tr>
                                                    <td class="font-weight-bold">Volunteer Team 
                                                        @if(in_array($accessAble, ['authorized','grant_acces']) || $role_id==0) 
                                                        <i class="fa fa-pencil" data-toggle="modal" data-target="#exampleModaladd"></i>
                                                        <div class="modal"  id="exampleModaladd" tabindex="-1" role="dialog">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">Volunteer Team</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <select class="form-control" name="txtteam" id="txtteam">
                                                                        <template v-for="pos in userSetting.Institutions">
                                                                            <option v-if="pos.id==userDetail.institutions_id" selected :value="pos.id" >@{{pos.title}}</option>
                                                                            <option v-else :value="pos.id">@{{pos.title}}</option>
                                                                        </template>
                                                                    </select>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-primary updateteam"  :data-id="userDetail.id" >Save changes</button>
                                                                    <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                                                                </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @endif
                                                    </td> 
                                                    <td v-if="userDetail.institutions_title">@{{userDetail.institutions_title}} </td>
                                                    <td v-else> - </td>
                                                </tr>

                                            </table>
                                        </div>
                                        <div class="col-12">
                                            @if($role_id==0 || $userDetail[0]['id']==auth()->user()->id)
                                                <a href="javascript:void(0)" v-on:click="getUserDetails(userDetail.id)" class="btn btn-primary mr-1"><i class="feather icon-edit-1"></i> Edit</a>
                                            @endif
                                            @if(in_array($accessAble, ['authorized','grant_acces']) || $role_id==0) 
                                                <button class="btn btn-outline-danger"><i class="feather icon-trash-2"></i> Delete</button>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- account end -->
                        <!-- information start -->
                        @if($role_id==0 || $userDetail[0]['id']==auth()->user()->id)
                        <div class="col-md-6 col-12 ">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title mb-2">Volunteer Information</div>
                                </div>
                                <div class="card-body">
                                    <table>
                                        <tr>
                                            <td class="font-weight-bold">Blood Group</td>
                                            <td v-if="userDetail.bloodgroup">@{{userDetail.bloodgroup}}</td>
                                            <td v-else>-</td>
                                        </tr>
                                        <tr>
                                            <td class="font-weight-bold">Eduction</td>
                                            <td v-if="userDetail.eduction_title">@{{userDetail.eduction_title}}</td>
                                            <td v-else>-</td>
                                        </tr>
                                        <tr>
                                            <td class="font-weight-bold">Institution</td>
                                            <td v-if="userDetail.institutions_title">@{{userDetail.institutions_title}}</td>
                                            <td v-else>-</td>
                                        </tr>
                                        <tr>
                                            <td class="font-weight-bold">Occupation</td>
                                            <td v-if="userDetail.occupation_title">@{{userDetail.occupation_title}}</td>
                                            <td v-else>-</td>
                                        </tr>
                                        <tr>
                                            <td class="font-weight-bold">Language Known</td>
                                            <td v-if="userDetail.language">
                                               <span v-for="lng in userDetail.language">@{{lng.language_title}} / </span>
                                            </td>
                                            <td v-else>-</td>
                                        </tr>
                                        <tr>
                                            <td class="font-weight-bold">Interested in Causes</td>
                                            <td v-if="userDetail.interested_cause">
                                               <span v-for="lng in userDetail.interested_cause">@{{lng.title}} / </span>
                                            </td>
                                            <td v-else>-</td>
                                        </tr>
                                        <tr>
                                            <td class="font-weight-bold">Would you like to become a blood donor?</td>
                                            <td v-if="userDetail.is_blood_donor">YES</td>
                                            <td v-else>NO</td>
                                        </tr>
                                        <tr>
                                            <td class="font-weight-bold">Volunteer Experience if any?</td>
                                            <td v-if="userDetail.has_voluntee_experience">YES</td>
                                            <td v-else>NO</td>
                                        </tr>
                                        <tr>
                                            <td class="font-weight-bold">Are you interested in online fundraising campaign?</td>
                                            <td v-if="userDetail.interested_in_online">YES</td>
                                            <td v-else>NO</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- information start -->
                        <!-- social links end -->
                        <div class="col-md-6 col-12 ">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title mb-2">Social Links</div>
                                </div>
                                <div class="card-body">
                                    <table>
                                        <tr>
                                            <td class="font-weight-bold">Twitter</td>
                                            <td v-if="userDetail.twitter_link"> @{{userDetail.twitter_link}} </td>
                                            <td v-else>-</td>
                                        </tr>
                                        <tr>
                                            <td class="font-weight-bold">Facebook</td>
                                            <td v-if="userDetail.fb_link"> @{{userDetail.fb_link}} </td>
                                            <td v-else>-</td>
                                        </tr>
                                        <tr>
                                            <td class="font-weight-bold">Instagram</td>
                                            <td v-if="userDetail.insta_link"> @{{userDetail.insta_link}} </td>
                                            <td v-else>-</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-12 ">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title mb-2">Contact Info</div>
                                </div>
                                <div class="card-body">
                                    <table>
                                        <tr>
                                            <td class="font-weight-bold">Phone</td>
                                            <td v-if="userDetail.phone"> @{{userDetail.phone}}  </td>
                                            <td v-else>-</td>
                                        </tr>
                                        <tr>
                                            <td class="font-weight-bold">Addreess Line1</td>
                                            <td v-if="userDetail.address_line1"> @{{userDetail.address_line1}}   </td>
                                            <td v-else>-</td>
                                        </tr>
                                        <tr>
                                            <td class="font-weight-bold">Addreess Line2</td>
                                            <td v-if="userDetail.address_line2"> @{{userDetail.address_line2}}   </td>
                                            <td v-else>-</td>
                                        </tr> 
                                        <tr>
                                            <td class="font-weight-bold">City</td>
                                            <td v-if="userDetail.city"> @{{userDetail.city}}  </td>
                                            <td v-else>-</td>
                                        </tr>  
                                        <tr>
                                            <td class="font-weight-bold">District</td>
                                            <td v-if="userDetail.district"> @{{userDetail.district}}  </td>
                                            <td v-else>-</td>
                                        </tr>
                                        <tr>
                                            <td class="font-weight-bold">State</td>
                                            <td v-if="userDetail.state"> @{{userDetail.state}}  </td>
                                            <td v-else>-</td>
                                        </tr>
                                        <tr>
                                            <td class="font-weight-bold">Pincode</td>
                                            <td v-if="userDetail.state"> @{{userDetail.pincode}}  </td>
                                            <td v-else>-</td>
                                        </tr>
                                        <tr>
                                            <td class="font-weight-bold">Live In</td>
                                            <td v-if="userDetail.live_in"> @{{userDetail.live_in}}  </td>
                                            <td v-else>-</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                        
                        <!-- social links end -->
                        <!-- permissions start -->
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header border-bottom mx-2 px-0">
                                    <h6 class="border-bottom py-1 mb-0 font-medium-2"><i class="feather icon-lock mr-50 "></i>Permission
                                    </h6>
                                </div>
                                <div class="card-body px-75">
                                    <div class="table-responsive users-view-permission">
                                        <table class="table table-borderless">
                                            <thead>
                                                <tr>
                                                    <th>Module</th>
                                                    <th>View Only</th>
                                                    <th>Grant Access</th>
                                                    <th>Authorized</th>
                                                    <th>Denied</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>CRM</td>
                                                    <td> 
                                                        <div class="custom-control custom-checkbox ml-50">
                                                            <input v-if="permission.crmconatct=='view_only'" type="checkbox" :id="userDetail.id" name="" class="custom-control-input" checked>
                                                            <input v-else  type="checkbox" :id="userDetail.id" name="" class="custom-control-input " disabled>
                                                            <label class="custom-control-label" :for="userDetail.id"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox ml-50">
                                                            <input v-if="permission.crmconatct=='grant_acces'" type="checkbox" :id="userDetail.id" name="" class="custom-control-input" checked>
                                                            <input v-else  type="checkbox" :id="userDetail.id" name="" class="custom-control-input " disabled>
                                                            <label class="custom-control-label" :for="userDetail.id"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox ml-50">
                                                            <input v-if="permission.crmconatct=='authorized'" type="checkbox" :id="userDetail.id" name="" class="custom-control-input" checked>
                                                            <input v-else  type="checkbox" :id="userDetail.id" name="" class="custom-control-input " disabled>
                                                            <label class="custom-control-label" :for="userDetail.id"></label>
                                                        </div> 
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox ml-50">
                                                            <input v-if="permission.crmconatct=='denied'" type="checkbox" :id="userDetail.id" name="" class="custom-control-input" checked>
                                                            <input v-else  type="checkbox" :id="userDetail.id" name="" class="custom-control-input " disabled>
                                                            <label class="custom-control-label" :for="userDetail.id"></label>
                                                        </div> 
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Contact</td>
                                                    <td> 
                                                        <div class="custom-control custom-checkbox ml-50">
                                                            <input v-if="permission.contacts=='view_only'" type="checkbox" :id="userDetail.id" name="" class="custom-control-input" checked>
                                                            <input v-else  type="checkbox" :id="userDetail.id" name="" class="custom-control-input " disabled>
                                                            <label class="custom-control-label" :for="userDetail.id"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox ml-50">
                                                            <input v-if="permission.contacts=='grant_acces'" type="checkbox" :id="userDetail.id" name="" class="custom-control-input" checked>
                                                            <input v-else  type="checkbox" :id="userDetail.id" name="" class="custom-control-input " disabled>
                                                            <label class="custom-control-label" :for="userDetail.id"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox ml-50">
                                                            <input v-if="permission.contacts=='authorized'" type="checkbox" :id="userDetail.id" name="" class="custom-control-input" checked>
                                                            <input v-else  type="checkbox" :id="userDetail.id" name="" class="custom-control-input " disabled>
                                                            <label class="custom-control-label" :for="userDetail.id"></label>
                                                        </div> 
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox ml-50">
                                                            <input v-if="permission.contacts=='denied'" type="checkbox" :id="userDetail.id" name="" class="custom-control-input" checked>
                                                            <input v-else  type="checkbox" :id="userDetail.id" name="" class="custom-control-input " disabled>
                                                            <label class="custom-control-label" :for="userDetail.id"></label>
                                                        </div> 
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Project</td>
                                                    <td> 
                                                        <div class="custom-control custom-checkbox ml-50">
                                                            <input v-if="permission.project=='view_only'" type="checkbox" :id="userDetail.id" name="" class="custom-control-input" checked>
                                                            <input v-else  type="checkbox" :id="userDetail.id" name="" class="custom-control-input " disabled>
                                                            <label class="custom-control-label" :for="userDetail.id"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox ml-50">
                                                            <input v-if="permission.project=='grant_acces'" type="checkbox" :id="userDetail.id" name="" class="custom-control-input" checked>
                                                            <input v-else  type="checkbox" :id="userDetail.id" name="" class="custom-control-input " disabled>
                                                            <label class="custom-control-label" :for="userDetail.id"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox ml-50">
                                                            <input v-if="permission.project=='authorized'" type="checkbox" :id="userDetail.id" name="" class="custom-control-input" checked>
                                                            <input v-else  type="checkbox" :id="userDetail.id" name="" class="custom-control-input " disabled>
                                                            <label class="custom-control-label" :for="userDetail.id"></label>
                                                        </div> 
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox ml-50">
                                                            <input v-if="permission.project=='denied'" type="checkbox" :id="userDetail.id" name="" class="custom-control-input" checked>
                                                            <input v-else  type="checkbox" :id="userDetail.id" name="" class="custom-control-input " disabled>
                                                            <label class="custom-control-label" :for="userDetail.id"></label>
                                                        </div> 
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Event</td>
                                                    <td> 
                                                        <div class="custom-control custom-checkbox ml-50">
                                                            <input v-if="permission.event=='view_only'" type="checkbox" :id="userDetail.id" name="" class="custom-control-input" checked>
                                                            <input v-else  type="checkbox" :id="userDetail.id" name="" class="custom-control-input " disabled>
                                                            <label class="custom-control-label" :for="userDetail.id"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox ml-50">
                                                            <input v-if="permission.event=='grant_acces'" type="checkbox" :id="userDetail.id" name="" class="custom-control-input" checked>
                                                            <input v-else  type="checkbox" :id="userDetail.id" name="" class="custom-control-input " disabled>
                                                            <label class="custom-control-label" :for="userDetail.id"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox ml-50">
                                                            <input v-if="permission.event=='authorized'" type="checkbox" :id="userDetail.id" name="" class="custom-control-input" checked>
                                                            <input v-else  type="checkbox" :id="userDetail.id" name="" class="custom-control-input " disabled>
                                                            <label class="custom-control-label" :for="userDetail.id"></label>
                                                        </div> 
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox ml-50">
                                                            <input v-if="permission.event=='denied'" type="checkbox" :id="userDetail.id" name="" class="custom-control-input" checked>
                                                            <input v-else  type="checkbox" :id="userDetail.id" name="" class="custom-control-input " disabled>
                                                            <label class="custom-control-label" :for="userDetail.id"></label>
                                                        </div> 
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Blog</td>
                                                    <td> 
                                                        <div class="custom-control custom-checkbox ml-50">
                                                            <input v-if="permission.blog=='view_only'" type="checkbox" :id="userDetail.id" name="" class="custom-control-input" checked>
                                                            <input v-else  type="checkbox" :id="userDetail.id" name="" class="custom-control-input " disabled>
                                                            <label class="custom-control-label" :for="userDetail.id"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox ml-50">
                                                            <input v-if="permission.blog=='grant_acces'" type="checkbox" :id="userDetail.id" name="" class="custom-control-input" checked>
                                                            <input v-else  type="checkbox" :id="userDetail.id" name="" class="custom-control-input " disabled>
                                                            <label class="custom-control-label" :for="userDetail.id"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox ml-50">
                                                            <input v-if="permission.blog=='authorized'" type="checkbox" :id="userDetail.id" name="" class="custom-control-input" checked>
                                                            <input v-else  type="checkbox" :id="userDetail.id" name="" class="custom-control-input " disabled>
                                                            <label class="custom-control-label" :for="userDetail.id"></label>
                                                        </div> 
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox ml-50">
                                                            <input v-if="permission.blog=='denied'" type="checkbox" :id="userDetail.id" name="" class="custom-control-input" checked>
                                                            <input v-else  type="checkbox" :id="userDetail.id" name="" class="custom-control-input " disabled>
                                                            <label class="custom-control-label" :for="userDetail.id"></label>
                                                        </div> 
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Task</td>
                                                    <td> 
                                                        <div class="custom-control custom-checkbox ml-50">
                                                            <input v-if="permission.task=='view_only'" type="checkbox" :id="userDetail.id" name="" class="custom-control-input" checked>
                                                            <input v-else  type="checkbox" :id="userDetail.id" name="" class="custom-control-input " disabled>
                                                            <label class="custom-control-label" :for="userDetail.id"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox ml-50">
                                                            <input v-if="permission.task=='grant_acces'" type="checkbox" :id="userDetail.id" name="" class="custom-control-input" checked>
                                                            <input v-else  type="checkbox" :id="userDetail.id" name="" class="custom-control-input " disabled>
                                                            <label class="custom-control-label" :for="userDetail.id"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox ml-50">
                                                            <input v-if="permission.task=='authorized'" type="checkbox" :id="userDetail.id" name="" class="custom-control-input" checked>
                                                            <input v-else  type="checkbox" :id="userDetail.id" name="" class="custom-control-input " disabled>
                                                            <label class="custom-control-label" :for="userDetail.id"></label>
                                                        </div> 
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox ml-50">
                                                            <input v-if="permission.task=='denied'" type="checkbox" :id="userDetail.id" name="" class="custom-control-input" checked>
                                                            <input v-else  type="checkbox" :id="userDetail.id" name="" class="custom-control-input " disabled>
                                                            <label class="custom-control-label" :for="userDetail.id"></label>
                                                        </div> 
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Donation Report</td>
                                                    <td> 
                                                        <div class="custom-control custom-checkbox ml-50">
                                                            <input v-if="permission.donationreport=='view_only'" type="checkbox" :id="userDetail.id" name="" class="custom-control-input" checked>
                                                            <input v-else  type="checkbox" :id="userDetail.id" name="" class="custom-control-input " disabled>
                                                            <label class="custom-control-label" :for="userDetail.id"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox ml-50">
                                                            <input v-if="permission.donationreport=='grant_acces'" type="checkbox" :id="userDetail.id" name="" class="custom-control-input" checked>
                                                            <input v-else  type="checkbox" :id="userDetail.id" name="" class="custom-control-input " disabled>
                                                            <label class="custom-control-label" :for="userDetail.id"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox ml-50">
                                                            <input v-if="permission.donationreport=='authorized'" type="checkbox" :id="userDetail.id" name="" class="custom-control-input" checked>
                                                            <input v-else  type="checkbox" :id="userDetail.id" name="" class="custom-control-input " disabled>
                                                            <label class="custom-control-label" :for="userDetail.id"></label>
                                                        </div> 
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox ml-50">
                                                            <input v-if="permission.donationreport=='denied'" type="checkbox" :id="userDetail.id" name="" class="custom-control-input" checked>
                                                            <input v-else  type="checkbox" :id="userDetail.id" name="" class="custom-control-input " disabled>
                                                            <label class="custom-control-label" :for="userDetail.id"></label>
                                                        </div> 
                                                    </td>
                                                </tr>
                                                 <tr>
                                                    <td>Campaign</td>
                                                    <td> 
                                                        <div class="custom-control custom-checkbox ml-50">
                                                            <input v-if="permission.campaign=='view_only'" type="checkbox" :id="userDetail.id" name="" class="custom-control-input" checked>
                                                            <input v-else  type="checkbox" :id="userDetail.id" name="" class="custom-control-input " disabled>
                                                            <label class="custom-control-label" :for="userDetail.id"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox ml-50">
                                                            <input v-if="permission.campaign=='grant_acces'" type="checkbox" :id="userDetail.id" name="" class="custom-control-input" checked>
                                                            <input v-else  type="checkbox" :id="userDetail.id" name="" class="custom-control-input " disabled>
                                                            <label class="custom-control-label" :for="userDetail.id"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox ml-50">
                                                            <input v-if="permission.campaign=='authorized'" type="checkbox" :id="userDetail.id" name="" class="custom-control-input" checked>
                                                            <input v-else  type="checkbox" :id="userDetail.id" name="" class="custom-control-input " disabled>
                                                            <label class="custom-control-label" :for="userDetail.id"></label>
                                                        </div> 
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox ml-50">
                                                            <input v-if="permission.campaign=='denied'" type="checkbox" :id="userDetail.id" name="" class="custom-control-input" checked>
                                                            <input v-else  type="checkbox" :id="userDetail.id" name="" class="custom-control-input " disabled>
                                                            <label class="custom-control-label" :for="userDetail.id"></label>
                                                        </div> 
                                                    </td>
                                                </tr>
                                                 <tr>
                                                    <td>Chat</td>
                                                    <td> 
                                                        <div class="custom-control custom-checkbox ml-50">
                                                            <input v-if="permission.chat=='view_only'" type="checkbox" :id="userDetail.id" name="" class="custom-control-input" checked>
                                                            <input v-else  type="checkbox" :id="userDetail.id" name="" class="custom-control-input " disabled>
                                                            <label class="custom-control-label" :for="userDetail.id"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox ml-50">
                                                            <input v-if="permission.chat=='grant_acces'" type="checkbox" :id="userDetail.id" name="" class="custom-control-input" checked>
                                                            <input v-else  type="checkbox" :id="userDetail.id" name="" class="custom-control-input " disabled>
                                                            <label class="custom-control-label" :for="userDetail.id"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox ml-50">
                                                            <input v-if="permission.chat=='authorized'" type="checkbox" :id="userDetail.id" name="" class="custom-control-input" checked>
                                                            <input v-else  type="checkbox" :id="userDetail.id" name="" class="custom-control-input " disabled>
                                                            <label class="custom-control-label" :for="userDetail.id"></label>
                                                        </div> 
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox ml-50">
                                                            <input v-if="permission.chat=='denied'" type="checkbox" :id="userDetail.id" name="" class="custom-control-input" checked>
                                                            <input v-else  type="checkbox" :id="userDetail.id" name="" class="custom-control-input " disabled>
                                                            <label class="custom-control-label" :for="userDetail.id"></label>
                                                        </div> 
                                                    </td>
                                                </tr>
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- permissions end -->
                        @endif
                    </div>
                
                   

                    <!-- Begin Users Profile -->
                    <div class="card">
                        <div class=" ">
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
                                                    <h4>Update Profile</h4>
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
                                                                     <input type="text"  onKeyPress="return isAlfa(event)" id="last_name" class="form-control"  data-msg="Please enter last name" required placeholder="Last Name" name="last_name">
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
                                                                         <input type="text" onKeyPress="return isNumberKey1(event)" maxlength="10"   id="phone" class="form-control" required name="phone" placeholder="Phone Number">
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
                                                                   <input type="text" id="city"   onKeyPress="return isAlfa(event)" class="form-control" name="city" placeholder="City">
                                                               </div>
                                                           </div>
                                                           <div class="col-md-4 col-12">
                                                               <div class="form-group">
                                                                   <label for="district">District</label>
                                                                   <input type="text" id="district"    onKeyPress="return isAlfa(event)" class="form-control" name="district" placeholder="District">
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
                                             @if(in_array($accessAble, ['authorized','grant_acces']) || auth()->user()->status==0)) 
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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
  <script src="{{env('APP_URL')}}public/assets/css/commom.js"></script>
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
   $(document).on('click','.updateteam',function(){
                        var id =  $(this).data('id');  
                        $.ajax({
                                    url:'{{route("changeTeam")}}',
                                    type:'post',
                                    data:{
                                        _token:'{{csrf_token()}}',
                                        txtteam:$("#txtteam").val(),
                                        id:id,
                                    },
                                    beforeSend:function(){

                                    },
                                    success:function(res){
                                        initsweetalert();
                                    },
                                    complete:function(){
                                        setTimeout(function(){
                                            $('[data-toggle="tooltip"]').tooltip();
                                            //window.location.href = "";
                                        },500);
                                    }
                        });

                        Swal.fire({
                            type: "success",
                            title: 'Position changed successfully',
                            text: '',
                            confirmButtonClass: 'btn btn-success',
                        }).then(function (result){
                            window.location.href = "";
                        });
                        return false;
    }); //end of update position
   $(document).on('click','.updateposition',function(){
             var id =  $(this).data('id');  

              $.ajax({
                        url:'{{route("changePosition")}}',
                        type:'post',
                        data:{
                            _token:'{{csrf_token()}}',
                            txtposition:$("#txtposition").val(),
                            id:id,
                        },
                        beforeSend:function(){

                        },
                        success:function(res){
                            initsweetalert();
                        },
                        complete:function(){
                            setTimeout(function(){
                                $('[data-toggle="tooltip"]').tooltip();
                                //window.location.href = "";
                            },500);
                        }
                   });

                    Swal.fire({
                        type: "success",
                        title: 'Position changed successfully',
                        text: '',
                        confirmButtonClass: 'btn btn-success',
                    }).then(function (result){
                        window.location.href = "";
                    });
                    return false;
      }); //end of update position
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
       permission:{!!json_encode($premission)!!},
       
       getPosition:{!!json_encode(getPosition())!!},
       pagination:{meta:{}},
       userstatus:"",
       verifystatus:"",
       txtsearch:"",
       userDetail: {!!json_encode($userDetail[0])!!},
   },
   watch:{
       
        
   }
   ,
   mounted:function(){
     
   },
   methods:{
    /*
    Changeposition:function(load){

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
                                  setTimeout(function(){
                                     window.location.href="";
                                  },1500);
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
     }, */
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
                                  setTimeout(function(){
                                    // window.location.href="";
                                  },1500);
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
      });

    $('.selectInterested').attr("selected",false);
    $.each(jsondata.interested_cause, function( key, value){
            $('.selectInterested').find('option[value="'+ value.id +'"]').attr("selected", "selected");
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

    $(document).on("change","#imagefile",function(){
     var fileExtension = ['jpeg', 'jpg', 'png', 'gif', 'bmp'];
      if ($.inArray($(this).val().split('.').pop().toLowerCase(), fileExtension) == -1) {
       alert("Only formats are allowed : "+fileExtension.join(', '));
      }
                var addBusOwnerForm= $('#frmAddData2')[0];
                var htmlview = $("#ShowHide").html();
                $(".Outputshow").append(htmlview);
                var formData = new FormData(addBusOwnerForm);
                $.ajax({
                    type:'POST',
                    url: '{{route("uploadimageReturnfile")}}',
                    data:formData,
                    cache:false,
                    contentType: false,
                    processData: false,
                    success:function(response){
                        if(response!=""){
                           $("#image1").attr('src',response);
                           toastr.success("Image updated successfully!",'Success!');
                        }else{
                           toastr.error("Try Again!",'Error!');
                        }
                    },
                    error: function(response){
                        console.log('Error '+response);
                    }
                });
      });

      
</script>

 @stop
