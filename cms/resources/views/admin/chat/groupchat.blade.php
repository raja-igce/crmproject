<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->
@php use App\Helper\AccessHelper;
$accessAble = AccessHelper::isAccessAble(auth()->user()->id, 'chat'); 
$role_id = auth()->user()->role_id;
$is_profile_completed = auth()->user()->is_profile_completed;
@endphp
<?php
       $loginuser = auth()->user()->id; 
     
?>  
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Vuesax admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Vuesax admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>Chat Application - Vuesax - Bootstrap HTML admin template</title>
    <link rel="apple-touch-icon" href="{{env('APP_URL')}}public/app-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="{{env('APP_URL')}}public/app-assets/images/ico/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{env('APP_URL')}}public/app-assets/vendors/css/vendors.min.css">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{env('APP_URL')}}public/app-assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="{{env('APP_URL')}}public/app-assets/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="{{env('APP_URL')}}public/app-assets/css/colors.css">
    <link rel="stylesheet" type="text/css" href="{{env('APP_URL')}}public/app-assets/css/components.css">
    <link rel="stylesheet" type="text/css" href="{{env('APP_URL')}}public/app-assets/css/themes/dark-layout.css">
    <link rel="stylesheet" type="text/css" href="{{env('APP_URL')}}public/app-assets/css/themes/semi-dark-layout.css">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{env('APP_URL')}}public/app-assets/css/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="{{env('APP_URL')}}public/app-assets/css/core/colors/palette-gradient.css">
    <link rel="stylesheet" type="text/css" href="{{env('APP_URL')}}public/app-assets/css/pages/app-chat.css">
    <link rel="stylesheet" type="text/css" href="{{env('APP_URL')}}public/app-assets/vendors/css/forms/select/select2.min.css">
    <link rel="stylesheet" type="text/css" href="{{env('APP_URL')}}public/app-assets/css/plugins/forms/validation/form-validation.css">
    <link rel="stylesheet" type="text/css" href="{{env('APP_URL')}}public/app-assets/vendors/css/extensions/toastr.css">
    
    <link rel="stylesheet" type="text/css" href="{{env('APP_URL')}}public/assets/css/custome_select.css">

    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{env('APP_URL')}}public/assets/css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/vue@2.5.17/dist/vue.js"></script>
    <!-- END: Custom CSS-->

    <style>
    .profile-picImg{
        width: 100% !important;
        border-radius: 95px !important;
        border-radius: 113px !important;
    }
    .chat .linkcolor{
        color:#ffffff;
        text-decoration: underline;
    }
    .chat-left .linkcolor{
        color:#458fea;
        text-decoration: underline;
    }
    </style>
</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern semi-dark-layout content-left-sidebar chat-application navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="content-left-sidebar" data-layout="semi-dark-layout">
    @include('layouts.header')
    <div class="app-content content"  >
        @include('layouts.header_modules')
        <div class="content-area-wrapper" id="UserVueApp">
            <div class="sidebar-left">
                <div class="sidebar">
                    <div class="chat-profile-sidebar">
                        <header class="chat-profile-header">
                            <span class="close-icon">
                                <i class="feather icon-x"></i>
                            </span>
                            <div class="header-profile-sidebar">
                                <div class="avatar">
                                    <img src="{{env('APP_URL')}}public/app-assets/images/portrait/small/avatar-s-11.png" alt="user_avatar" height="70" width="70">
                                    <span class="avatar-status-online avatar-status-lg"></span>
                                </div>
                                <h4 class="chat-user-name">John Doe</h4>
                            </div>
                        </header>
                        <div class="profile-sidebar-area">
                            <div class="scroll-area">
                                <h6>About</h6>
                                <div class="about-user">
                                    <fieldset class="mb-0">
                                        <textarea data-length="120" class="form-control char-textarea" id="textarea-counter" rows="5" placeholder="About User">Dessert chocolate cake lemon drops jujubes. Biscuit cupcake ice cream bear claw brownie brownie marshmallow.</textarea>
                                    </fieldset>
                                    <small class="counter-value float-right"><span class="char-count">108</span> / 120 </small>
                                </div>
                                <h6 class="mt-3">Status</h6>
                                <ul class="list-unstyled user-status mb-0">
                                    <li class="pb-50">
                                        <fieldset>
                                            <div class="vs-radio-con vs-radio-success">
                                                <input type="radio" name="userStatus" value="online" checked="checked">
                                                <span class="vs-radio">
                                                    <span class="vs-radio--border"></span>
                                                    <span class="vs-radio--circle"></span>
                                                </span>
                                                <span class="">Active</span>
                                            </div>
                                        </fieldset>
                                    </li>
                                    <li class="pb-50">
                                        <fieldset>
                                            <div class="vs-radio-con vs-radio-danger">
                                                <input type="radio" name="userStatus" value="busy">
                                                <span class="vs-radio">
                                                    <span class="vs-radio--border"></span>
                                                    <span class="vs-radio--circle"></span>
                                                </span>
                                                <span class="">Do Not Disturb</span>
                                            </div>
                                        </fieldset>
                                    </li>
                                    <li class="pb-50">
                                        <fieldset>
                                            <div class="vs-radio-con vs-radio-warning">
                                                <input type="radio" name="userStatus" value="away">
                                                <span class="vs-radio">
                                                    <span class="vs-radio--border"></span>
                                                    <span class="vs-radio--circle"></span>
                                                </span>
                                                <span class="">Away</span>
                                            </div>
                                        </fieldset>
                                    </li>
                                    <li class="pb-50">
                                        <fieldset>
                                            <div class="vs-radio-con vs-radio-secondary">
                                                <input type="radio" name="userStatus" value="offline">
                                                <span class="vs-radio">
                                                    <span class="vs-radio--border"></span>
                                                    <span class="vs-radio--circle"></span>
                                                </span>
                                                <span class="">Offline</span>
                                            </div>
                                        </fieldset>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!--/ User Chat profile area -->
                    <!-- Chat Sidebar area -->
                    <div class="sidebar-content card">
                        <span class="sidebar-close-icon">
                            <i class="feather icon-x"></i>
                        </span>
                        <div class="chat-fixed-search">
                            <div class="d-flex align-items-center">
                                <fieldset class="form-group position-relative has-icon-left mx-1 my-0 w-100">
                                    <input type="text" class="form-control round" v-model="finduser" id="chat-search" placeholder="Search or start a new chat">
                                    <div class="form-control-position">
                                        <i class="feather icon-search"></i>
                                    </div>
                                </fieldset>
                                <div class="sidebar-profile-toggle position-relative d-inline-flex">
                                    @if($role_id==0)
                                        <div class="badge badge-pill"  v-on:click="openModel()">
                                            <i class="fa fa-plus fa-2x"></i>
                                        </div>
                                        <div class="bullet-success bullet-sm position-absolute"></div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div id="users-list" class="chat-user-list list-group position-relative">
                            
                            <h3 class="primary p-1 mb-0">Groups</h3>
                            <ul class="chat-users-list-wrapper media-list">
                            


                                <template v-for="data in users.data">
                                    <li class="ulist" :data-uid="data.id">
                                        <div class="pr-1"  v-on:click="setMemebers(data)">
                                            <span class="avatar m-0 avatar-md">
                                                <img  class="media-object rounded-circle"  :src="data.icon" onerror="this.src='{{Assets}}images/user.png'" height="42" width="42" alt="Generic placeholder image">
                                                <span v-if="data.online==1" class="avatar-status-online"></span>
                                                <span v-else class="avatar-status-busy"></span>
                                                <i></i>
                                            </span>
                                        </div>
                                        <div class="user-chat-info"   v-on:click="setMemebers(data)">
                                            <div class="contact-info">
                                                <h5 class="font-weight-bold mb-0">@{{data.name}}</h5>
                                                <p class="truncate">@{{data.lastmsg}}</p>
                                            </div>
                                            <div class="contact-meta">
                                                @if($role_id==0)
                                               
                                                <div class="btn-group" role="group" aria-label="Basic example">
                                                    <button v-if="data.institute_id==0" type="button" class="btn btn-danger btn-sm waves-effect waves-light deleteGroup"  :id="data.id" style="padding: 10px"><i class="fa fa-trash-o fa-lg"></i></button>
                                                    <button type="button" class="btn btn-success btn-sm waves-effect waves-light" v-on:click="updateGroup(data)" style="padding: 10px"><i class="fa fa-pencil fa-lg"></i></button>
                                                </div>
                                            
                                                    <!-- <span class="float-right mb-25" v-on:click="updateGroup(data)"><i class="fa fa-trash-o"></i></span>
                                                    <span class="float-right mb-25" v-on:click="updateGroup(data)"><i class="fa fa-pencil"></i></span> -->
                                                @endif
                                                 
                                                <?php /*
                                                    <span class="float-right mb-25">@{{data.updated_at}}</span>
                                                    <span class="badge badge-primary badge-pill float-right">3</span>
                                                */?>
                                            </div>
                                        </div>
                                    </li>
                                </template>
                            </ul>
                        </div>
                    </div>
                    <!--/ Chat Sidebar area -->

                </div>
            </div>
            <div class="content-right">
                <div class="content-wrapper">
                    <div class="content-header row">
                    </div>
                    <div class="content-body">
                        <div class="chat-overlay"></div>
                        <section class="chat-app-window">
                            <div class="start-chat-area">
                                <span class="mb-1 start-chat-icon feather icon-message-square"></span>
                                <h4 class="py-50 px-1 sidebar-toggle start-chat-text">Start Conversation</h4>
                            </div>
                            <div class="active-chat d-none">
                                <div class="chat_navbar">
                                    <header class="chat_header d-flex justify-content-between align-items-center p-1">
                                        <div class="vs-con-items d-flex align-items-center">
                                            <div class="sidebar-toggle d-block d-lg-none mr-1"><i class="feather icon-menu font-large-1"></i></div>
                                            <div class="avatar user-profile-toggle m-0 m-0 mr-1">
                                                <img class="imghere" onerror="this.src='{{Assets}}images/user.png'" src="{{env('APP_URL')}}public/app-assets/images/portrait/small/avatar-s-1.png" alt="" height="40" width="40" />
                                                <span class="avatar-status-online"></span>
                                            </div>
                                            <h6 class="mb-0 namehere">Felecia Rower</h6>
                                            <p class="user-profile-toggle mt-1"> <a href="javascript:void(0)"> &nbsp; &nbsp; (<span id="totalMember"></span> Memebers) </a></p>
                                        </div>
                                        <!-- <span class="favorite"><i class="feather icon-star font-medium-5"></i></span> -->
                                    </header>
                                </div>
                                <div class="user-chats">
                                    <div class="chats">
                                        <template v-for="messages in messages.data">
                                            <div v-if="messages.sender_id==loginuser" class="chat"  >
                                                <div class="chat-avatar">
                                                    <a class="avatar m-0"   :title="messages.sender_name" data-toggle="tooltip" :href="messages.sender_id | goDetails" data-placement="right" title="" data-original-title="">
                                                        <img :src="messages.sender_image" onerror="this.src='{{Assets}}images/user.png'" alt="avatar" height="40" width="40" />
                                                    </a>
                                                </div>
                                                <div class="chat-body">
                                                    <div class="chat-content">
                                                        <p v-html="$options.filters.URLify(messages.message)"></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div v-else class="chat chat-left">
                                                <div class="chat-avatar">
                                                    <a class="avatar m-0" :title="messages.sender_name" data-toggle="tooltip" :href="messages.sender_id | goDetails" data-placement="left" title="" data-original-title="">
                                                        <img :src="messages.sender_image" onerror="this.src='{{Assets}}images/user.png'" alt="avatar" height="40" width="40" />
                                                    </a>
                                                </div>
                                                <div class="chat-body">
                                                    <div class="chat-content">
                                                        <p v-html="$options.filters.URLify(messages.message)"> </p>   
                                                    </div>
                                                </div>
                                            </div>
                                        </template>
                                        <!-- <div class="divider">
                                            <div class="divider-text">Yesterday</div>
                                        </div> -->
                                         
                                    </div>
                                </div>
                                <div class="chat-app-form">
                                    <form class="chat-app-input d-flex" onsubmit="enter_chat();" action="javascript:void(0);">
                                        <input type="text" class="form-control message mr-1 ml-50 inputmsg" id="iconLeft4-1" placeholder="Type your message">
                                        <button type="button" class="btn btn-primary send" onclick="enter_chat();"><i class="fa fa-paper-plane-o d-lg-none"></i> <span class="d-none d-lg-block">Send</span></button>
                                    </form>
                                </div>
                            </div>
                            <!-- User Chat profile right area -->
                            <div class="user-profile-sidebar">
                                <header class="user-profile-header">
                                <span class="close-icon">
                                    <i class="feather icon-x"></i>
                                </span>
                                <div class="header-profile-sidebar">
                                    <div class="avatar">
                                    <img src="../../../app-assets/images/portrait/small/avatar-s-1.png" onerror="this.src='{{Assets}}images/user.png'" class="imghere" alt="user_avatar" height="70" width="70">
                                    <span class="avatar-status-online avatar-status-lg"></span>
                                    </div>
                                    <h4 class="chat-user-name  namehere">Felecia Rower</h4>
                                </div>
                                </header>
                                <div class="user-profile-sidebar-area p-2">
                                <h6>Memebers</h6>
                                <div>
                                    <table class="table zero-configuration">
                                        <tr v-for="mdata in viewmember">
                                            <td class="text-nowrap " ><a class="linkcolor" target="_blank" :href="mdata.get_members[0].id | goDetails">
                                                            <img :src="'{{TeamImagePath}}/'+mdata.get_members[0].id+'/Thumb/'+mdata.get_members[0].profile_pic" onerror="this.src='{{TeamImagePath}}user.png'" alt="avtar img holder" class="round" width="32" height="32">
                                                            @{{mdata.get_members[0].first_name}}
                                                        </a></td>
                                        </tr>
                                         
                                         
                                    </table>
                                </div>
                                 
                                </div>
                            </div>
                            <!--/ User Chat profile right area -->
                        </section>
                      
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Content-->
    
    <!-- Modal -->
    <div id="myvue">
        <div class="modal fade text-left" id="modalAddGroup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
                <div class="modal-dialog modal-lg  modal-dialog-centered modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel33">Group Manage</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                <form action="" id="frmAddData2" name="frmAddData2">
                    <div class="modal-body">
                        <div class="row">
                            
                            <div class="col-lg-12">
                                <div class="users-view-image text-center" style="width: 90px;margin:auto">
                                        <div id="showdata" style="width: 90px;">
                                            <img id="image1" src="{{Assets}}images/user.png" onerror="this.src='{{Assets}}images/user.png'" class="users-avatar-shadow w-100 rounded mb-0 mr-1  profile-picImg  " style="width: 100% !important"  onclick="document.getElementById('imagefile_pro').click()" alt="avatar">
                                        </div>
                                        @if($role_id==0)
                                        <i onclick="document.getElementById('imagefile_pro').click()"> <a href="javascript:void(0)">Set icon</a></i>
                                        <input type="file" name="imagefile" id="imagefile_pro" class="custom-file-input">
                                        @endif    
                                        <input type="hidden" name="_token" id="_token" value="{{csrf_token()}}">
                                        <input type="hidden" name="id" id="id" value="">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <label>Group Name</label>
                                <div class="form-group">
                                    <input type="text" required placeholder="Group name" name="txtgroup" id="txtgroup" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="title">Group Member</label>
                                        <select data-placeholder="Select members..." class="select2-icons form-control" id="selectteam" name="selectteam[]" multiple="multiple" required>
                                            <optgroup label="Services">
                                            <option v-for="data in usersList"   data-icon="fa fa-heart"  :value="data.id" :data-thumbnail="'{{UserPath}}'+data.id+'/Thumb/'+data.profile_pic" >@{{data.first_name}}</option>
                                            </optgroup>
                                        </select>
                                    </div>
                            </div>
                        </div>    
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" v-on:click="createGroup()">Create Group</button>
                    </div>
                    </form>
                </div>
                </div>
        </div>
    </div>
    <!-- End Modal -->
    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <!-- BEGIN: Footer-->
    @yield('footer')
    <!-- END: Footer-->


    <script src="{{env('APP_URL')}}public/app-assets/vendors/js/vendors.min.js"></script>
    <script src="{{env('APP_URL')}}public/app-assets/js/core/app-menu.js"></script>
    <script src="{{env('APP_URL')}}public/app-assets/js/core/app.js"></script>
    <script src="{{env('APP_URL')}}public/app-assets/vendors/js/forms/select/select2.full.min.js"></script>
    <script src="{{env('APP_URL')}}public/app-assets/vendors/js/forms/validation/jquery.validate.min.js"></script>
    <script src="{{env('APP_URL')}}public/app-assets/vendors/js/extensions/toastr.min.js"></script>
    <script src="{{env('APP_URL')}}public/app-assets/vendors/js/extensions/sweetalert2.all.min.js"></script>



    <script> 
 
    var nvm = new Vue({
         el:"#myvue",
         data:{
            usersList: {!!json_encode($usersList)!!}
         },
         methods:{
            
            
            createGroup:function(load=0){
                var isValidForm =  $('#frmAddData2').valid();
                if(isValidForm){
                            jQuery.ajax({
                                url:'{{route("createGroup")}}',
                                type:'post',
                                data: $('#frmAddData2').serialize(),
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
                                            $("#modalAddGroup").modal('hide');
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
            }
         }
    }); 
     var vm = new Vue({
   el:"#UserVueApp",
   data:{
             users:{ total: 0, per_page: 2, from: 1, to: 0, current_page: 1, data:[] },
             chatedusers:{ total: 0, per_page: 2, from: 1, to: 0, current_page: 1, data:[] },
             messages:{ total: 0, per_page: 2, from: 1, to: 0, current_page: 1, data:[] },
             search:'',
             finduser  : "",
             loginuser:{!! $loginuser !!},
             viewmember:[],
             
             pagechange:2000,
             loading:true,
             load:1,
             user_id:0,
             pagination:{meta:{}},
   },
   watch:{
      userstatus:function(){
          this.getUsers();
      },
      txtsearch:function(){
          //this.getUsers();
      },
      finduser:function(){
        $("#users-list").scrollTop(0);
        
        // var text = this.finduser;
        // if(text.length>0){
        //       this.users.data.filter(function (str) {
        //         return str.includes(text);
        //       });
        // }
      },
      
   },
   filters: {
        goDetails: function(string) {
            var Newurl ="{{route('viewprofile','MID')}}";
            return  Newurl = Newurl.replace('MID',string);
        },
        URLify: function(string) {
                const urls = string.match(/(((ftp|https|http?):\/\/)[\-\w@:%_\+.~#?,&\/\/=]+)/g);
                if (urls) {
                    urls.forEach(function (url) {
                    string = string.replace(url, '<a target="_blank"  class="linkcolor" href="' + url + '">' + url + "</a>");
                    });
                }
                return string.replace("(", "<br/>(");
        }
        
  },

   mounted:function(){
      this.getUsers();
      this.getMessage(1);
   },
   methods:{
    goDetails: function(string) {
            var Newurl ="{{route('viewprofile','MID')}}";
            return  Newurl = Newurl.replace('MID',string);
    },
    openModel:function(){
                  $("#txtgroup").val(''); 
                  $("#id").val(''); 
                  
                  var img = "{{Assets}}images/user.png";
                  $(".profile-picImg").attr('src',img); 
                  var item = [];
                  $('#selectteam').val(item);
                  $('#selectteam').trigger('change');
                  $("#modalAddGroup").modal('show');
                  
     },
     setMemebers:function(data){
                  $("#txtgroup").val(data.name); 
                  $("#id").val(data.id); 
                  $(".profile-picImg").attr('src',data.icon);
                  vm.senderid = data.id;
                  var item = [];
                  $.each(data.members, function (index, value){
                      item.push(value.user_id);
                  });
                  vm.viewmember = data.members;
                  $('#selectteam').val(item);
                  $('#selectteam').trigger('change');
                  $("#totalMember").html(vm.viewmember.length);
     },
     
      
     updateGroup:function(data){
                  $("#txtgroup").val(data.name); 
                  $("#id").val(data.id); 
                  $(".profile-picImg").attr('src',data.icon); 
                  var item = [];
                  $.each(data.members, function (index, value){
                      item.push(value.user_id);
                  });
                  vm.viewmember = data.members;
                  console.log(vm.viewmember);
                  $('#selectteam').val(item);
                  $('#selectteam').trigger('change');
                  $("#totalMember").html(vm.viewmember.length);
                  $("#modalAddGroup").modal('show');
     },
     markAsRead:function(load=0){
       var self=this;
       $.ajax({
         url:'{{route("markAsRead")}}',
         type:'post',
         data:{
               _token:'{{csrf_token()}}',
         },
         success:function(res){
             
         },
         complete:function(){
              
         }
       });
    },
    getMessage:function(load=0)
    {
       var self=this;
       
       $.ajax({
         url:'{{route("ajaxGroupMessages")}}',
         type:'post',
         async:true,
         data:{
               _token:'{{csrf_token()}}',
               search:self.search,
               page:self.messages.current_page,
               pageno:self.pagechange,
               senderid:self.user_id,
         },
         beforeSend:function(){
             if(!load)
             self.loading=true;
         }
         ,
         success:function(res){
            var length = $(".user-chats > .chats > .chat").length;
            var getlength =  res.meta.total;
            if(length==getlength && load!=0){
                return false;
            }
            self.messages=res;
            if(res.meta){
                self.messages.current_page = res.meta.current_page;
                self.messages.last_page = res.meta.last_page;
                self.messages.total = res.meta.total;
                self.messages.per_page = res.meta.per_page;
                self.messages.from = res.meta.from;
                self.messages.to = res.meta.to;
                self.messages.from = res.meta.from;
             }
             $(".user-chats").scrollTop($(".user-chats > .chats").height()+100);
          },
         complete:function(){
             setTimeout(function(){
                  $('[data-toggle="tooltip"]').tooltip();
             },3000);
             if(!load)
             self.loading=false;
         }
       });  
     },
     getUsers:function(load){
       var self=this;
       $.ajax({
         url:'{{route("ajaxGroups")}}',
         type:'post',
         data:{
               _token:'{{csrf_token()}}',
               search:self.search,
               page:self.users.current_page,
               pageno:self.pagechange,
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
         },
         complete:function(){
             setTimeout(function(){
                  $('[data-toggle="tooltip"]').tooltip();
             },500);
             if(!load)
             self.loading=false;
         }
       });
        /*
        $.ajax({
         url:'{{route("ajaxChatedUsers")}}',
         type:'post',
         data:{
               _token:'{{csrf_token()}}',
               search:self.search,
               page:self.chatedusers.current_page,
               pageno:self.pagechange,
         },
         beforeSend:function(){
             if(!load)
             self.loading=true;
         }
         ,
         success:function(res){
            self.chatedusers=res;
            if(res.meta){
                self.chatedusers.current_page = res.meta.current_page;
                self.chatedusers.last_page = res.meta.last_page;
                self.chatedusers.total = res.meta.total;
                self.chatedusers.per_page = res.meta.per_page;
                self.chatedusers.from = res.meta.from;
                self.chatedusers.to = res.meta.to;
                self.chatedusers.from = res.meta.from;
             } 
          },
        complete:function(){
            
        }
       });
       */
     },
     sendMessages:function(load){
       var self=this;
       sendto = vm.user_id; 
       var inputmsg = $(".inputmsg").val(); 
       $.ajax({
         url:'{{route("sendGroupMessages")}}',
         type:'post',
         data:{
               _token:'{{csrf_token()}}',
               sendto:sendto,
               message:inputmsg
         },
         beforeSend:function(){
              
         },
         success:function(res){
                self.getMessage(0);
         },
         complete:function(){
            
         }
       });
     }
      

   }
 });

 // Add message to chat
function enter_chat(source) {
    var message = $(".message").val();
    /*
   if(message != ""){
        var html = '<div class="chat-content">' + "<p>" + message + "</p>" + "</div>";
        $(".chat:last-child .chat-body").append(html);
        $(".user-chats").scrollTop($(".user-chats > .chats").height());
   } */
   console.log("Loggggg.....");
   vm.sendMessages();
   if(message != ""){
        $(".user-chats").scrollTop($(".user-chats > .chats").height()+100);
   }
   $(".message").val("");
}

 $(document).on("click",".chat-application .chat-user-list ul li",function(){
        var uid = $(this).data('uid');
        vm.user_id = uid;
        var src = $(this).find('img').attr('src');
        var name = $(this).find('.contact-info H5').html();

        $(".imghere").attr('src',src);
        $(".namehere").html(name);
        
        if($('.chat-user-list ul li').hasClass('active')){
          $('.chat-user-list ul li').removeClass('active');
        }
        $(this).addClass("active");
        vm.markAsRead();
        
        $(this).find(".badge").html("");

        // if($('.chat-user-list ul li').hasClass('active')){
        //   $('.start-chat-area').addClass('d-none');
        //   $('.active-chat').removeClass('d-none');
        // }
        // else{
        //   $('.start-chat-area').removeClass('d-none');
        //   $('.active-chat').addClass('d-none');
        // } 
        $('.start-chat-area').addClass('d-none');
        $('.active-chat').removeClass('d-none');
        vm.getMessage(0);
        
  });
  
  setInterval(function(){
        vm.getMessage(1);
        vm.getUsers();
  },10000);

 
    $("#iconLeft4-1").focus(function(){
        vm.markAsRead();
    });


    // Chat Profile sidebar toggle
    $('.chat-application .sidebar-profile-toggle').on('click',function(){
        // $('.chat-profile-sidebar').addClass('show');
        // $('.chat-overlay').addClass('show');
    });

    // User Profile sidebar toggle
    $('.chat-application .user-profile-toggle').on('click',function(){
        $('.user-profile-sidebar').addClass('show');
        $('.chat-overlay').addClass('show');
    });
//  function iconFormat(icon){
//      var originalOption = icon.element;
//      if (!icon.id) { return icon.text; }
//      var $icon = "<img class='selectimage' src='" + $(icon.element).data('thumbnail') + "'></i>" + icon.text;

//      return $icon;
//  }

    function replace_error_img(data){
        var default_img = "{{TeamImagePath}}selected.jpg";
        $(data).attr("src",default_img);
    }
    function iconFormats(icon) {
        var originalOption = icon.element;
        var default_img = "{{TeamImagePath}}selected.jpg";
        if (!icon.id) { return icon.text; }
        replace_error_img();
        var $icon = "<img class='selectimage' onerror='replace_error_img(this)' src='" + $(icon.element).data('thumbnail') + "'></i>" + icon.text;
        return $icon;
    } 
    $("#selectteam").select2({
        minimumResultsForSearch: Infinity,
        templateResult: iconFormats,
        templateSelection: iconFormats,
        escapeMarkup: function(es) { return es; }
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
                    url: '{{route("uploadimagethumb")}}',
                    data:formData,
                    cache:false,
                    contentType: false,
                    processData: false,
                    success:function(response){
                        if(response!=""){
                           //$("#image1").attr('src',response);
                           $("#showdata").html(response);
                        }
                    },
                    error: function(response){
                        console.log('Error '+response);
                    }
                });
      });


        $(document).on('click',".deleteGroup",function(){

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
                       url:'{{route("deleteGroup")}}',
                       type:'post',
                       data:{
                           _token:'{{csrf_token()}}',
                           id:id,
                        },
                       beforeSend:function(){

                       },
                       success:function(res){
                          
                       },
                       complete:function(){
                           vm.getUsers();
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
 </script>


<script src="{{env('APP_URL')}}public/app-assets/js/scripts/pages/app-chat.js"></script>

    
</body>
<!-- END: Body-->

</html>