@extends('layouts.main')
@php use App\Helper\AccessHelper;
$accessAble = AccessHelper::isAccessAble(auth()->user()->id, 'crmconatct'); 
$role_id = auth()->user()->role_id;
$is_profile_completed = auth()->user()->is_profile_completed;
@endphp
@section('appcss')
 <link rel="stylesheet" type="text/css" href="{{env('APP_URL')}}public/app-assets/vendors/css/tables/datatable/datatables.min.css">
 <link rel="stylesheet" type="text/css" href="{{env('APP_URL')}}public/app-assets/vendors/css/tables/datatable/select.dataTables.min.css">
 <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.css">
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
                                        <div class="col-12 col-sm-9 col-md-6 col-lg-5">
                                            <table>
                                                <tr>
                                                    <td class="font-weight-bold">First Name
                                                    </td>
                                                    <td>@{{userDetail.first_name}} </td>
                                                </tr>
                                                <tr>
                                                    <td class="font-weight-bold">Last Name
                                                    </td>
                                                    <td>@{{userDetail.last_name}} </td>
                                                </tr>
                                                <tr>
                                                    <td class="font-weight-bold">Gender
                                                    </td>
                                                    <td>@{{userDetail.gender}} </td>
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
                                                    <td class="font-weight-bold">Creator
                                                    </td>
                                                    <td class="text-nowrap">
                                                        <span v-if="userDetail.creator"> 
                                                        <a  v-on:click="goDetails(userDetail.creator.id)" class="linkcolor" >                            
                                                            <img class="round" :src="'{{TeamImagePath}}'+userDetail.creator.id+'/Thumb/'+userDetail.creator.profile_pic"  onerror="this.src='{{Assets}}images/user.png'" alt="avtar img holder" height="32" width="32">
                                                            @{{userDetail.creator.first_name}}
                                                            <span  v-if="userDetail.creator.role_id!=2" >@{{userDetail.creator.last_name}}</span> 
                                                        </a>
                                                    </span> 
                                                    <span v-else>-</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="font-weight-bold">Status</td>
                                                    <td v-if="userDetail.status==0">Pending</td>
                                                    <td v-else-if="userDetail.status==1">Approved</td>
                                                    <td v-else-if="userDetail.status==2">Rejected</td>
                                                    <td v-else >-</td>
                                                    
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="col-12">
                                            @if($role_id==0 || $userDetail[0]['id']==auth()->user()->id)
                                                <a href="javascript:void(0)" v-on:click="getUserDetails(userDetail)" class="btn btn-primary mr-1"><i class="feather icon-edit-1"></i> Edit</a>
                                            @endif
                                            @if(in_array($accessAble, ['authorized','grant_acces']) || $role_id==0) 
                                                <!-- <button class="btn btn-outline-danger"><i class="feather icon-trash-2"></i> Delete</button> -->
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
                                    <div class="card-title mb-2">Beneficiary Information</div>
                                </div>
                                <div class="card-body">
                                    <table>
                                        <tr>
                                            <td class="font-weight-bold">Date Of Birth</td>
                                            <td>@{{userDetail.dob}}</td>
                                        </tr>
                                        <tr>
                                            <td class="font-weight-bold">Blood Group</td>
                                            <td>@{{userDetail.blood_group_name}}</td>
                                        </tr>
                                        <tr>
                                            <td class="font-weight-bold">Marital Status</td>
                                            <td>@{{userDetail.marital_status}}</td>
                                        </tr>
                                        <tr>
                                            <td class="font-weight-bold">Education</td>
                                            <td>@{{userDetail.education}}</td>
                                        </tr>
                                        <tr>
                                            <td class="font-weight-bold">No of family</td>
                                            <td>@{{userDetail.no_family}}</td>
                                        </tr>
                                        <tr>
                                            <td class="font-weight-bold">Family Inclome</td>
                                            <td>@{{userDetail.family_income}}</td>
                                        </tr>
                                        <tr>
                                            <td class="font-weight-bold">Kind of support/help you need?</td>
                                            <td>@{{userDetail.support}}</td>
                                        </tr>
                                        <tr>
                                            <td class="font-weight-bold">Duration</td>
                                            <td>@{{userDetail.duration}}</td>
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


                        <div class="col-md-12 col-12 ">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title mb-2">ID Proof(Voter ID/Adhaar)</div>
                                </div>
                                <div class="card-body">
                                 
                                        <div v-for="(data, key) in img_id_proof" title=""  class="profile-picImg GalleryBox" style="display: table;max-width: 1px;word-wrap: anywhere;" :id="'GalleryBox'+data.file">
                                             <a  v-if="data.type=='img'"  target="_blank" :href="'{{BeneficiaryPath}}'+data.user_id+'/'+data.file"  >
                                                <img id="galimgDocument1556361385_85" :src="'{{BeneficiaryPath}}'+data.user_id+'/Thumb/'+data.file" class="profile-picImg">
                                            </a>
                                            <a v-else target="_blank" :href="'{{BeneficiaryPath}}'+data.user_id+'/'+data.file"  >
                                                <img id="galimgDocument1556361385_85" :src="'{{Assets}}'+'images/attachment.png'" class="profile-picImg"  style='height:150px;'>
                                            </a>
                                            <div v-if="data.meta.length>5">
                                                <div class="clearfix"></div>
                                                <div class='clearfix'></div><b style='font-size:10px'>@{{JSON.parse(data.meta).size}} (@@{{JSON.parse(data.meta).extention}})</b><div class='clearfix'></div><i style='font-size:10px'>@{{JSON.parse(data.meta).filename}}</i>
                                            </div>
                                        </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-12 ">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title mb-2">Reports</div>
                                </div>
                                <div class="card-body">
                                 
                                        <div v-for="(data, key) in img_report" title=""   class="profile-picImg GalleryBox" style="display: table;max-width: 1px;word-wrap: anywhere;" :id="'GalleryBox'+data.file">
                                            <input type="hidden" :value="data.file" name="imagename[]" id="imagename">
                                            
                                             <a  v-if="data.type=='img'"  target="_blank" :href="'{{BeneficiaryPath}}'+data.user_id+'/'+data.file"  >
                                                <img id="galimgDocument1556361385_85" :src="'{{BeneficiaryPath}}'+data.user_id+'/Thumb/'+data.file" class="profile-picImg">
                                            </a>
                                            <a v-else target="_blank" :href="'{{BeneficiaryPath}}'+data.user_id+'/'+data.file"  >
                                                <img id="galimgDocument1556361385_85" :src="'{{Assets}}'+'images/attachment.png'" class="profile-picImg"  style='height:150px;'>
                                            </a>
                                            <div v-if="data.meta.length>5">
                                                <div class='clearfix'></div>
                                                <b style='font-size:10px'>@{{JSON.parse(data.meta).size}} (@@{{JSON.parse(data.meta).extention}})</b><div class='clearfix'></div><i style='font-size:10px'>@{{JSON.parse(data.meta).filename}}</i>
                                            </div> 
                                        </div>

                                </div>
                            </div>
                        </div>
                        <!-- social links end -->
                        <!-- permissions start -->
                        <?php /*
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
                        */?>
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
                                                                <input type="text"  onKeyPress="return isAlfa(event)"   data-msg="Please enter first name"  id="first_name" class="form-control" required placeholder="First name" name="first_name"   >
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
                                                                        <input type="text"  onKeyPress="return isAlfa(event)"   id="last_name" class="form-control"  data-msg="Please enter last name" required placeholder="Last Name" name="last_name">
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
                                                                            <input type="text" onKeyPress="return isNumberKey1(event)"   maxlength="10" id="phone" class="form-control" required name="phone" placeholder="Phone Number">
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
                                                                          <div v-if="userDetail.profile_pic" title=""  class="profile-picImg GalleryBox " style="display: table;max-width: 1px;word-wrap: anywhere;" id="filex">
                                                                            <input type="hidden" :value="userDetail.profile_pic" name="imagename[]" id="imagename">
                                                                             <img id="galimgDocument1556361385_85" :src="userDetail.profile_pic" class="profile-picImg">
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
                                                                    <input type="text" id="city" onKeyPress="return isAlfa(event)" class="form-control" name="city" placeholder="City">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4 col-12">
                                                                <div class="form-group">
                                                                    <label for="district">District</label>
                                                                    <input type="text" id="district" onKeyPress="return isAlfa(event)" class="form-control" name="district" placeholder="District">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4 col-12">
                                                                <div class="form-group">
                                                                    <label for="state">State</label>
                                                                    <input type="text" id="state" onKeyPress="return isAlfa(event)" class="form-control" name="state" placeholder="State">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4 col-12">
                                                                <div class="form-group">
                                                                    <label for="pincode">Pincode</label>
                                                                    <input type="text" id="pincode" onKeyPress="return isNumberKey1(event)"   maxlength="6" class="form-control" name="pincode" placeholder="Pincode">
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
                                                                        <a  v-if="data.type=='img'"  target="_blank" :href="'{{BeneficiaryPath}}'+data.user_id+'/'+data.file"  >
                                                                            <img id="galimgDocument1556361385_85" :src="'{{BeneficiaryPath}}'+data.user_id+'/Thumb/'+data.file" class="profile-picImg">
                                                                        </a>
                                                                        <a v-else target="_blank" :href="'{{BeneficiaryPath}}'+data.user_id+'/'+data.file"  >
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
                                                                        <a  v-if="data.type=='img'"  target="_blank" :href="'{{BeneficiaryPath}}'+data.user_id+'/'+data.file"  >
                                                                            <img id="galimgDocument1556361385_85" :src="'{{BeneficiaryPath}}'+data.user_id+'/Thumb/'+data.file" class="profile-picImg">
                                                                        </a>
                                                                        <a v-else target="_blank" :href="'{{BeneficiaryPath}}'+data.user_id+'/'+data.file"  >
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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
  <script src="{{env('APP_URL')}}public/app-assets/vendors/js/extensions/sweetalert2.all.min.js"></script>
@include('layouts.pagingTemplateSource')
    <script type="text/javascript" src="{{env('APP_URL')}}public/assets/js/vue.code.js"></script>

   
 <script>
  setTimeout(function () {
    $('#dob').datepicker({
    format: "dd/mm/yyyy",
    // startDate: '-0d',
    endDate: '-0d'

});
},500);
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
       permission:[],
       
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
       documentView:[],
       img_id_proof:[],
       img_profile:[],
       img_report:[],
       img_index:[],
       deletedImage:[],
   },
   watch:{
       
        
   }
   ,
   mounted:function(){

        
   },
   methods:{
        goDetails: function(string) {
                var Newurl ="{{route('viewprofile','MID')}}";
                window.location.href = Newurl.replace('MID',string);
        },
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
    getUserDetails:function(id){
                  var self=this;
                  vm.img_id_proof=[];
                    vm.img_profile=[];
                    vm.img_report=[];

                                    
                                   //var finalResult = JSON.stringify(res.result);
                                   //self.detail=jQuery.parseJSON(res.result);
                                   fillFields(id);
                                   //$('.opensider').click();
                                   opendrower();
                   return false;                

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



vm.img_id_proof =  vm.userDetail.img_report.filter(function(q) {
            return q.file_for  === 'id_proof';
});
vm.img_profile =  vm.userDetail.img_report.filter(function(q) {
            return q.file_for  === 'profile';
});
vm.img_report =  vm.userDetail.img_report.filter(function(q) {
            return q.file_for  === 'report';
});
</script>
 @stop
