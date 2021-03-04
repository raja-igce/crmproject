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
                                                    <img id="image1" :src="userDetail.profile_pic" onerror="this.src='{{Assets}}images/user.png'" class="users-avatar-shadow w-100 rounded mb-0 mr-1 ml-1  " style="width: 125px !important"  onclick="document.getElementById('imagefile_pro').click()" alt="avatar">
                                                    @if($role_id==0 || $userDetail[0]['id']==auth()->user()->id)
                                                    <i onclick="document.getElementById('imagefile_pro').click()"> <a href="javascript:void(0)"> Change Profile</a> </i>
                                                    <input type="file" name="imagefile" id="imagefile_pro" class="custom-file-input">
                                                    @endif    
                                                    <input type="hidden" name="_token" id="_token" value="{{csrf_token()}}">
                                                    <input type="hidden" name="id" id="id" :value="userDetail.id">
                                            </div>
                                        </form>
                                        <div class="col-12 col-sm-9 col-md-6 col-lg-6">
                                            <table>
                                                <tr>
                                                    <td class="font-weight-bold">Organization Name
                                                    </td>
                                                    <td>@{{userDetail.first_name}} </td>
                                                </tr>
                                                <tr>
                                                    <td class="font-weight-bold">Responsible Person
                                                    </td>
                                                    <td>@{{userDetail.last_name}} </td>
                                                </tr>
                                                <tr>
                                                    <td class="font-weight-bold">Email</td>
                                                    <td>@{{userDetail.email}}</td>
                                                </tr>
                                                <tr>
                                                    <td class="font-weight-bold">Mobile</td>
                                                    <td v-if="userDetail.phone">@{{userDetail.phone}}</td>
                                                    <td v-else>-</td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="col-12 col-md-12 col-lg-4">
                                            <table class="ml-0 ml-sm-0 ml-lg-0">
                                                <tr>
                                                    <td class="font-weight-bold">Status</td>
                                                    <td v-if="userDetail.status==0">Pending</td>
                                                    <td v-else-if="userDetail.status==1">Approved</td>
                                                    <td v-else-if="userDetail.status==2">Rejected</td>
                                                    <td v-else >-</td>
                                                    
                                                </tr>
                                                
                                                <tr>
                                                    <td class="font-weight-bold">Category 
                                                         
                                                    </td> 
                                                    <td v-if="userDetail.org_data.org_category_txt">@{{userDetail.org_data.org_category_txt}}</td>
                                                    <td v-else> - </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="col-12">
                                            @if($role_id==0 || $userDetail[0]['id']==auth()->user()->id)
                                                <a href="javascript:void(0)" v-on:click="getUserDetails(userDetail)" class="btn btn-primary mr-1"><i class="feather icon-edit-1"></i> Edit</a>
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
                                    <div class="card-title mb-2">Organization Information</div>
                                </div>
                                <div class="card-body">
                                    <table>
                                        <tr>
                                            <td class="font-weight-bold">Strength of Organization</td>
                                            <td v-if="userDetail.org_data.org_strength">@{{userDetail.org_data.org_strength}}</td>
                                            <td v-else>-</td>
                                        </tr>
                                        <tr>
                                            <td class="font-weight-bold">Support/Help Need</td>
                                            <td v-if="userDetail.org_data.support_help_text">@{{userDetail.org_data.support_help_text}}</td>
                                            <td v-else>-</td>
                                        </tr>
                                        <tr>
                                            <td class="font-weight-bold">Reference From?</td>
                                            <td v-if="userDetail.org_data.other_reference">@{{userDetail.org_data.other_reference}}</td>
                                            <td v-else>-</td>
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
                                            <td v-if="userDetail.pincode"> @{{userDetail.pincode}}  </td>
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
                                           <div class="">
                                              
                                           </div>
                                             <form action="#" id="frmAddData" onsubmit="return false" name="frmAddData" class="steps-validation wizard-circle">
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
                                                              <input type="text"  data-msg="Please enter Organization"  id="first_name" onKeyPress="return isAlfa(event)"  class="form-control" required placeholder="First name" value="" name="first_name"   >
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
                                                                     <input type="text" id="last_name" class="form-control" onKeyPress="return isAlfa(event)"   data-msg="Please enter Responsible Person" required placeholder="Name of the Responsible Person" value="" name="last_name">
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
                                                                     <input type="text" id="phone" onKeyPress="return isNumberKey1(event)" maxlength="10"  class="form-control" required name="phone" placeholder="Phone Number">
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
                                                                            <i class="feather icon-shield"></i>
                                                                         </div>
                                                                    </fieldset>
                                                               </div>
                                                           </div>
                                                           <div class="col-md-4 col-12">
                                                               <div class="form-group">
                                                                   <label for="address_line1">Address Line 1</label>
                                                                   <fieldset class="form-group position-relative has-icon-left input-divider-left">
                                                                         <input type="text" id="address_line1" class="form-control" required name="address_line1" placeholder="Addres Line 1">
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
                                                                         <input type="text" id="address_line2" class="form-control" required name="address_line2" placeholder="Addres Line 2">
                                                                         <div class="form-control-position">
                                                                            <i class="fa fa-map-marker"></i>
                                                                        </div>
                                                                    </fieldset>
                                                               </div>
                                                           </div>
                                                           <div class="col-md-4 col-12">
                                                               <div class="form-group">
                                                                   <label for="city">City</label>
                                                                   <input type="text" id="city" onKeyPress="return isAlfa(event)"  class="form-control" name="city" required placeholder="City">
                                                               </div>
                                                           </div>
                                                           <div class="col-md-4 col-12">
                                                               <div class="form-group">
                                                                   <label for="district">District</label>
                                                                   <input type="text" id="district" onKeyPress="return isAlfa(event)"  class="form-control" name="district" required placeholder="District">
                                                               </div>
                                                           </div>
                                                           <div class="col-md-4 col-12">
                                                               <div class="form-group">
                                                                   <label for="state">State</label>
                                                                   <input type="text" id="state" onKeyPress="return isAlfa(event)"  class="form-control" name="state" required placeholder="State">
                                                               </div>
                                                           </div>
                                                           <div class="col-md-4 col-12">
                                                               <div class="form-group">
                                                                   <label for="pincode">Pincode</label>
                                                                   <input type="text" id="pincode" maxlength="6" onKeyPress="return isNumberKey1(event)"  class="form-control" required name="pincode" placeholder="Pincode">
                                                               </div>
                                                           </div>

                                                           <div class="col-md-4 col-12">
                                                               <div class="form-group">
                                                                    <label for="category">Organization Category</label>
                                                                    <fieldset class="form-group position-relative has-icon-left input-divider-left">
                                                                          <select class="form-control" id="category" required name="category" required>
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
                                                                            <select class="form-control" id="strength" required name="strength" required>
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
                                             @if(in_array($accessAble, ['authorized','grant_acces']) || auth()->user()->status == 0) 
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
  <script src="{{env('APP_URL')}}public/app-assets/vendors/js/extensions/sweetalert2.all.min.js"></script>
@include('layouts.pagingTemplateSource')
    <script type="text/javascript" src="{{env('APP_URL')}}public/assets/js/vue.code.js"></script>
    <script src="{{env('APP_URL')}}public/assets/css/commom.js"></script>

 <script>

 function initsweetalert(){
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

             Swal.fire({
               title: 'Are you sure to change position?',
               text: "",
               type: 'warning',
               showCancelButton: true,
               confirmButtonColor: '#3085d6',
               cancelButtonColor: '#d33',
               confirmButtonText: 'Yes, set it!',
               confirmButtonClass: 'btn btn-primary',
               cancelButtonClass: 'btn btn-danger ml-1',
               buttonsStyling: false,
             }).then(function (result){
               if (result.value) {
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
                                window.location.href = "";
                            },500);
                        }
                   });

                    Swal.fire({
                        type: "success",
                        title: 'Position changed successfully',
                        text: '',
                        confirmButtonClass: 'btn btn-success',
                    })

               }
               else if (result.dismiss === Swal.DismissReason.cancel){
                 Swal.fire({
                   title: 'Cancelled',
                   text: 'Position not changed  :)',
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
       permission:{!!json_encode($premission)!!},
       
       getPosition:{!!json_encode(getPosition())!!},
       pagination:{meta:{}},
       userstatus:"",
       verifystatus:"",
       
       txtsearch:"",
       userDetail: {!!json_encode($userDetail[0])!!},
       deletedImage:[],
       eventImages: {},
       deletedImage1:[],
       eventImages1: {},
       documentView:[]
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
                                  window.location.href = "";
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
     getUserDetails:function(jsondata){

                  console.log(JSON.stringify(jsondata));
                  
               
                 
                  
                  
                  fillFields(jsondata);

                   

                  // $("#seats").val(jsondata.seats);
                  // $("#location").val(jsondata.location);
                  // $("#project").val(jsondata.project_id);
                  // console.log(jsondata.get_images);




                  $('.opensider').click();
                  


     }//end of savedata

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


    $.each(jsondata.documentView, function(key, value){
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

    $(document).on("change","#imagefile_pro",function(){
                var fileExtension = ['jpeg', 'jpg', 'png', 'gif', 'bmp'];
                if($.inArray($(this).val().split('.').pop().toLowerCase(), fileExtension) == -1) {
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
                        }
                    },
                    error: function(response){
                        console.log('Error '+response);
                    }
                });
      });

      
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
