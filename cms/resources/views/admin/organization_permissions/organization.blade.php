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
    select.select-custom {
        width: 100px;
        text-align: center !important;
        padding: 7px !important;
        background-position: 82px !important;
    }

    .custom_name {
        white-space: nowrap;
    }
</style>
@stop

@section('content')
<div class="content-wrapper" id="UserVueApp">
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-left mb-0">Organization</h2>
                    <?php /*
                          <div class="breadcrumb-wrapper col-12">
                              <ol class="breadcrumb">
                                  <li class="breadcrumb-item"><a href="index.html">Home</a>
                                  </li>
                                  <li class="breadcrumb-item"><a href="#">Icons</a>
                                  </li>
                              </ol>
                          </div> */ ?>
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
                                    <label for="verifystatus">Search</label>
                                    <fieldset class="form-group">
                                        <input type="text" class="form-control" name="txtsearch" value="txtsearch" v-model="txtsearch">
                                    </fieldset>
                                </div>
                                <div class="col rslt-btn">
                                    <!-- <button type="button" class="btn btn-primary mt-2 round opensider" id="opensider">
                                              <i class="feather icon-plus"></i> New Permission
                                          </button> -->
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
                        <div class="ml-2">





                            <input type="hidden" name="_token" value="{{csrf_token()}}">



                            <div class="data-list-view-header">
                                <div class="add-new-data-sidebar">
                                    <div class="overlay-bg"></div>
                                    <div class="add-new-data" style="width:auto">
                                        <div class="div mt-2 px-2 d-flex new-data-title justify-content-between">
                                            <div>
                                                <h4>Add Vendor Permission</h4>
                                            </div>
                                            <div class="hide-data-sidebar">
                                                <i class="feather icon-x"></i>
                                            </div>
                                        </div>
                                        <div class="data-items pb-3 ">
                                            <div class="data-fields px-2  ">

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

                    <!-- Mili Code -->


                    <!-- End Mili code -->






                    <div class="card-dashboard">
                        <div class="table-responsive">
                            <table class="table zero-configuration" id="">
                                <thead>
                                    <tr class="text-uppercase">
                                        <th>id</th>
                                        <th class="text-nowrap">Name</th>
                                        <th>Contact</th>
                                        <th>Project</th>
                                        <th>Event</th>
                                        <th>Blog</th>
                                        <th>Task</th>
                                        <th>Donation Report</th>
                                        <th>Campaign</th>
                                        <th>Chat</th>
                                        <th>Account Access</th>
                                        <!-- <th>Latest Activity</th> -->
                                        <!-- <th>Role</th> -->
                                        <!-- <th>Status</th> -->
                                        <!-- <th>Actions</th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-if='users.data.length>0  && !loading' v-for='user in users.data '>
                                        <td>@{{user.user_id}}</td>
                                        <td class="text-nowrap">        
                                            <template v-if="{!!auth()->user()->id!!} == user.id || {!!auth()->user()->role_id!!}==0">
                                                <a  v-on:click="goDetails(user.user_id)" class="linkcolor" >   
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
                                        <td>
                                            <select class="form-control form-control-sm select-custom" required id="contacts" v-on:change="onSelection(user.user_id,'contacts',$event)" name="contacts">
                                                <option :selected="user.contacts == 'grant_acces'" value="grant_acces">Grant Access</option>
                                                <option :selected="user.contacts == 'denied'" value="denied">Denied</option>
                                            </select>
                                        </td>
                                        <td>
                                            <select class="form-control form-control-sm select-custom" required id="project" v-on:change="onSelection(user.user_id,'project',$event)" name="project">
                                                <option :selected="user.project == 'view_only'" value="view_only">View Only</option>
                                                <option :selected="user.project == 'grant_acces'" value="grant_acces">Grant Access</option>
                                                <option :selected="user.project == 'authorized'" value="authorized">Authorized</option>
                                                <option :selected="user.project == 'denied'" value="denied">Denied</option>
                                            </select>
                                        </td>
                                        <td><select class="form-control form-control-sm select-custom" required id="event" v-on:change="onSelection(user.user_id,'event',$event)" name="event">
                                                <option :selected="user.event == 'view_only'" value="view_only">View Only</option>
                                                <option :selected="user.event == 'grant_acces'" value="grant_acces">Grant Access</option>
                                                <option :selected="user.event == 'authorized'" value="authorized">Authorized</option>
                                                <option :selected="user.event == 'denied'" value="denied">Denied</option>
                                            </select> </td>
                                        <td><select class="form-control form-control-sm select-custom" required id="blog" v-on:change="onSelection(user.user_id,'blog',$event)" name="blog">
                                                <option :selected="user.blog == 'view_only'" value="view_only">View Only</option>
                                                <option :selected="user.blog == 'grant_acces'" value="grant_acces">Grant Access</option>
                                                <option :selected="user.blog == 'authorized'" value="authorized">Authorized</option>
                                                <option :selected="user.blog == 'denied'" value="denied">Denied</option>
                                            </select></td>
                                        <td><select class="form-control form-control-sm select-custom" required id="task" v-on:change="onSelection(user.user_id,'task',$event)" name="task">
                                                <option :selected="user.task == 'view_only'" value="view_only">View Only</option>
                                                <option :selected="user.task == 'grant_acces'" value="grant_acces">Grant Access</option>
                                                <option :selected="user.task == 'authorized'" value="authorized">Authorized</option>
                                                <option :selected="user.task == 'denied'" value="denied">Denied</option>
                                            </select></td>
                                        <td><select class="form-control form-control-sm select-custom" required id="donationreport" v-on:change="onSelection(user.user_id,'donationreport',$event)" name="donationreport">
                                                <option :selected="user.task == 'view_only'" value="view_only">View Only</option>
                                                <option :selected="user.task == 'grant_acces'" value="grant_acces">Grant Access</option>
                                                <option :selected="user.task == 'authorized'" value="authorized">Authorized</option>
                                                <option :selected="user.task == 'denied'" value="denied">Denied</option>
                                            </select></td>
                                        <td><select class="form-control form-control-sm select-custom" required id="campaign" v-on:change="onSelection(user.user_id,'campaign',$event)" name="campaign">
                                                <option :selected="user.campaign == 'view_only'" value="view_only">View Only</option>
                                                <option :selected="user.campaign == 'grant_acces'" value="grant_acces">Grant Access</option>
                                                <option :selected="user.campaign == 'authorized'" value="authorized">Authorized</option>
                                                <option :selected="user.campaign == 'denied'" value="denied">Denied</option>
                                            </select></td>
                                            <td><select class="form-control form-control-sm select-custom" required id="chat" v-on:change="onSelection(user.user_id,'chat',$event)" name="chat">
                                                 <option :selected="user.chat == 'grant_acces'" value="grant_acces">Grant Access</option>
                                                <option :selected="user.chat == 'authorized'" value="authorized">Authorized</option>
                                                <option :selected="user.chat == 'denied'" value="denied">Denied</option>
                                            </select></td>
                                        <td>
                                            <select class="form-control form-control-sm select-custom" required id="status" v-on:change="onSelection(user.user_id,'status',$event)" name="campaign">
                                                <option :selected="user.status == 0" value="0">Pending</option>
                                                <option :selected="user.status == 1" value="1">Approve</option>
                                                <option :selected="user.status == 2" value="2">Reject</option>
                                            </select>
                                        </td>
                                        <!-- <td>@{{user.updated_at}}</td> -->
                                        <!-- <td>
                                                    <div class="w-100 badge badge-success">Volunteer</div>
                                                </td> -->
                                        <!-- <td v-if="user.status==1" class="text-success">Active</td>
                                                <td v-if="user.status==0" class="text-secondary">Pending</td>
                                                <td v-if="user.status==2" class="text-danger">Blocked</td> -->

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
    function initsweetalert() {

    }
    $(document).ready(function() {
        initsweetalert();
    });

    var vm = new Vue({
        el: "#UserVueApp",
        data: {
            users: {
                total: 0,
                per_page: 2,
                from: 1,
                to: 0,
                current_page: 1,
                data: []
            },
            search: '',
            pagechange: 20,
            loading: true,
            load: 1,
            userSetting: '',
            pagination: {
                meta: {}
            },
            userstatus: "",
            verifystatus: "",
            txtsearch: ""
        },
        watch: {
            txtsearch: function() {
                this.getUsers();
            },

        },
        mounted: function() {
            this.getUsers();
        },
        methods: {
            goDetails: function(string) {
                    var Newurl ="{{route('viewprofile','MID')}}";
                    window.location.href = Newurl.replace('MID',string);
            },
            getUsers: function(load) {
                var self = this;
                $.ajax({
                    url: '{{route("ajaxorganization_permissions")}}',
                    type: 'post',
                    data: {
                        _token: '{{csrf_token()}}',
                        search: self.search,
                        page: self.users.current_page,
                        pageno: self.pagechange,
                        txtsearch: self.txtsearch
                    },
                    beforeSend: function() {
                        if (!load)
                            self.loading = true;
                    },
                    success: function(res) {
                        // var res = JSON.stringify(res);

                        self.users = res;
                        self.pagination = res.meta;
                        initsweetalert();
                    },
                    complete: function() {
                        setTimeout(function() {
                            $('[data-toggle="tooltip"]').tooltip();
                        }, 500);
                        if (!load)
                            self.loading = false;
                    }
                });
            },
            onSelection: function(user_id, title, evt) {

                jQuery.ajax({
                    url: '{{route("updateOrganizationPermissions")}}',
                    type: 'post',
                    data: {
                        '_token': "{{csrf_token()}}",
                        'user_id': user_id,
                        'field_name': title,
                        'values': evt.target.value
                    },
                    beforeSend: function() {
                        self.loading = true;
                    },
                    success: function(res) {
                        if (res.status) {
                            $(".hide-data-sidebar").click();
                            toastr.success(res.msg, 'Success!');

                            //var finalResult = JSON.stringify(res.result);
                            //self.detail=jQuery.parseJSON(res.result);
                            // fillFields(res.result);
                            //$('.opensider').click();
                            //opendrower();
                        }

                        // self.users.current_page = res.meta.current_page+1;
                        // self.users.last_page = res.meta.last_page;
                        // self.users.data = self.users.data.concat(res.data);
                        console.log();
                    },
                    complete: function() {
                        self.loading = false;
                    }
                });

            },

            getUserDetails: function(id) {
                var self = this;

                jQuery.ajax({
                    url: '{{route("getVolunteerDetail")}}',
                    type: 'post',
                    data: {
                        '_token': "{{csrf_token()}}",
                        'id': id
                    },
                    beforeSend: function() {
                        self.loading = true;
                    },
                    success: function(res) {
                        if (res.status) {
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
                    complete: function() {
                        self.loading = false;
                    }
                });

            } //end of savedata,


        }
    });

    function fillFields(jsondata) {
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
        $("input[name=is_blood_donor][value='" + jsondata.is_blood_donor + "']").prop("checked", true);

        //$("#has_voluntee_experience").val(jsondata.has_voluntee_experience);
        $("input[name=has_voluntee_experience][value='" + jsondata.has_voluntee_experience + "']").prop("checked", true);


        $("#fb_link").val(jsondata.fb_link);
        $("#insta_link").val(jsondata.insta_link);
        $("#twitter_link").val(jsondata.twitter_link);
        $("#eduction_id").val(jsondata.eduction_id);
        $("#institutions").val(jsondata.institutions_id);
        $("#blood_group").val(jsondata.blood_group);
        $("#occupation").val(jsondata.occupation_id);

        $('select#language_id option').attr("selected", false);
        $.each(jsondata.language, function(key, value) {
            $('.select152').find('option[value="' + value.language_id + '"]').attr("selected", "selected");
            $('.selectInterested').find('option[value="' + value.language_id + '"]').attr("selected", "selected");
        });


    }
</script>

<script type="text/javascript">
    /*custom js here*/
    function opendrower() {
        $(".add-new-data").addClass("show");
        $(".overlay-bg").addClass("show");
        $(".select152").select2();
        $(".selectInterested").select2();
        $('.step-icon').each(function() {
            var $this = $(this);
            if ($this.siblings('span.step').length > 0) {
                $this.siblings('span.step').empty();
                $(this).appendTo($(this).siblings('span.step'));
            }
        });
        $(".tooltip").removeClass('show');
    }

    $(".opensider").on("click", function() {
        $('select#language_id option').attr("selected", false);
        $('select#interested_in_causes option').attr("selected", false);
        opendrower();
    });


    if ($(".data-items").length > 0) {
        new PerfectScrollbar(".data-items", {
            wheelPropagation: false
        });
    }
</script>
<script src="{{env('APP_URL')}}public/app-assets/js/scripts/forms/custome_wizard-steps.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('.step-icon').each(function() {
            var $this = $(this);
            if ($this.siblings('span.step').length > 0) {
                $this.siblings('span.step').empty();
                $(this).appendTo($(this).siblings('span.step'));
            }
        });
    });
</script>

@stop