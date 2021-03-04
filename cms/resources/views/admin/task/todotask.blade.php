@extends('layouts.main')
@php 
use App\Helper\AccessHelper;  
$accessAble = AccessHelper::isAccessAble(auth()->user()->id, 'task'); 
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
 <link rel="stylesheet" type="text/css" href="{{env('APP_URL')}}public/app-assets/css/pages/app-todo.css">
 <style>
 </style>
 @stop
 @section('content')
        <!-- BEGIN: Header-->
        
<div  id="UserVueApp">
          @include('admin.task.tasktemplate')  
        <div class="content-area-wrapper ">
            <div class="sidebar-left">
                <div class="sidebar">
                    <div class="sidebar-content todo-sidebar d-flex">
                        <span class="sidebar-close-icon">
                            <i class="feather icon-x"></i>
                        </span>
                        <div class="todo-app-menu">
                            <div class="form-group text-center add-task">
                             </div>
                            <div class="sidebar-menu-list">
                                <div class="list-group list-group-filters font-medium-1">
                                    <a v-on:click="getStatus('all')"   class="list-group-item list-group-item-action border-0 pt-0 active">
                                        <i class="font-medium-5 feather icon-mail mr-50"></i> All
                                    </a>
                                </div>
                                <hr>
                                <h5 class="mt-2 mb-1 pt-25">Filters</h5>
                                <div class="list-group list-group-filters font-medium-1">
                                    <a v-on:click="getStatus('today')"   class="list-group-item list-group-item-action border-0">
                                        <i class="font-medium-5 feather icon-star mr-50"></i> Today
                                    </a>
                                    <a  v-on:click="getStatus('upcoming')"   class="list-group-item list-group-item-action border-0">
                                        <i class="font-medium-5 feather icon-info mr-50"></i> Upcoming
                                    </a>
                                    <a  v-on:click="getStatus('completed')"   class="list-group-item list-group-item-action border-0">
                                        <i class="font-medium-5 feather icon-check mr-50"></i>Completed
                                    </a>
                                </div>
                                <hr>
                                
                            </div>
                        </div>
                    </div>
                    <!-- Modal -->
                 

                </div>
            </div>
            <div class="content-right">
                <div class="content-wrapper">
                    <div class="content-header row">
                    </div>
                    <div class="content-body">

                        
                        <div class="app-content-overlay"></div>
                        <div class="todo-app-area">
                            <div class="todo-app-list-wrapper">
                                <div class="todo-app-list">
                                    <div class="app-fixed-search">
                                        <div class="sidebar-toggle d-block d-lg-none"><i class="feather icon-menu"></i></div>
                                        <fieldset class="form-group position-relative has-icon-left m-0">
                                            <input type="text" class="form-control" id="todo-search" placeholder="Search..">
                                            <div class="form-control-position">
                                                <i class="feather icon-search"></i>
                                            </div>
                                        </fieldset>
                                    </div>
                                    <div class="todo-task-list list-group">
                                        <ul class="todo-task-list-wrapper media-list">
                                             <li v-if='users.data.length>0  && !loading' v-for='user in users.data '  v-on:click="getUserDetails(user.id,user)" class="todo-item" data-toggle="modal" data-target="#editTaskModal">
                                                <div class="todo-title-wrapper d-flex justify-content-between mb-50">
                                                    <div class="todo-title-area d-flex align-items-center">
                                                        <div class="title-wrapper d-flex">
                                                            <div class="vs-checkbox-con">
                                                                <input type="checkbox" disabled v-if="user.status==1" checked>
                                                                <input type="checkbox" disabled v-else>
                                                                <span class="vs-checkbox vs-checkbox-sm">
                                                                    <span class="vs-checkbox--check">
                                                                        <i class="vs-icon feather icon-check"></i>
                                                                    </span>
                                                                </span>
                                                            </div>
                                                            <h6 class="todo-title mt-50 mx-50"> <b>Task ID @{{user.id}}</b> - @{{user.title}}</h6>
                                                        </div>
                                                    </div>
                                                    <!-- <div class="float-right todo-item-action d-flex">
                                                        <a class='todo-item-info  ' v-on:click="getUserDetails(user.id,user)"  title="View Details"><i class="feather icon-info"></i></a>
                                                     </div> -->
                                                </div>
                                                <p>@{{user.start_date+' '+user.start_time}} - @{{user.end_date+' '+user.end_time}}</p>
                                                <p class="todo-desc truncate mb-0">@{{user.description.replace(/<\/?[^>]+(>|$)/g, "")}}</p>
                                            </li>
                                            <li v-if='users.data.length==0'>
                                                <h2 class="mt-3 text-center">No Task Found</h2>
                                            </li>
                                            <!-- <li class="todo-item" data-toggle="modal" data-target="#editTaskModal">
                                                <div class="todo-title-wrapper d-flex justify-content-between mb-50">
                                                    <div class="todo-title-area d-flex align-items-center">
                                                        <div class="title-wrapper d-flex">
                                                            <div class="vs-checkbox-con">
                                                                <input type="checkbox">
                                                                <span class="vs-checkbox vs-checkbox-sm">
                                                                    <span class="vs-checkbox--check">
                                                                        <i class="vs-icon feather icon-check"></i>
                                                                    </span>
                                                                </span>
                                                            </div>
                                                            <h6 class="todo-title mt-50 mx-50">Fix Responsiveness </h6>
                                                        </div>
                                                        <div class="chip-wrapper">
                                                            <div class="chip mb-0">
                                                                <div class="chip-body">
                                                                    <span class="chip-text" data-value="Frontend"><span class="bullet bullet-primary bullet-xs"></span> Frontend</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="float-right todo-item-action d-flex">
                                                        <a class='todo-item-info opensider'  title="View Details"><i class="feather icon-info"></i></a>
                                                        <a class='todo-item-favorite'><i class="feather icon-star"></i></a>
                                                        <a class='todo-item-delete'><i class="feather icon-trash"></i></a>
                                                    </div>
                                                </div>
                                                <p class="todo-desc truncate mb-0">Jelly topping toffee bear claw. Sesame snaps lollipop macaroon croissant cheesecake pastry cupcake.</p>
                                            </li> -->
                                          
                                        </ul>
                                        <div class="no-results">
                                            <h5>No Items Found</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Modal -->
                        

                    </div>
                </div>
            </div>
        </div>
</div>        
        <!-- End of containt -->
      
          <input type="hidden" name="task_id" id="task_id">                                          
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
  <script src="{{env('APP_URL')}}public/app-assets/js/scripts/pages/app-todo.js"></script>

  <!-- <script src="{{env('APP_URL')}}public/app-assets/js/scripts/forms/select/form-select2.js"></script> -->



  <script src="{{env('APP_URL')}}public/app-assets/js/scripts/editors/full-editor-quill.js"></script>

  @include('layouts.pagingTemplateSource')
  <script type="text/javascript" src="{{env('APP_URL')}}public/assets/js/vue.code.js"></script>
  <script>
   var vm = new Vue({
   el:"#UserVueApp",
   data:{
       users:{ total: 0, per_page: 2, from: 1, to: 0, current_page: 1, data:[] },
       search:'',
       udata:{},
       eventImages:{},
       pagechange:20,
       loading:true,
       loadstatus:'all',
       load:1,
       userstatus:"",
       inputs:[
            {
                title: '',
                id:0
            }
        ]
   },
   filters: {
        getStatus: function(string) {
            this.userstatus = string;
            this.getUsers();
        },
   },
   watch:{
      userstatus:function(){
          this.getUsers();
      },
      txtsearch:function(){
          this.getUsers();
      }
   }
   ,
   mounted:function(){
      this.getUsers();
   },
   methods:{
     getStatus: function(string) {
        this.userstatus = string;
     }, 
     goDetails: function(string) {
            var Newurl ="{{route('viewprofile','MID')}}";
            window.location.href = Newurl.replace('MID',string);
     },    
     getUsers:function(load){
       var self=this;
       $.ajax({
         url:'{{route("ajaxAssignTask")}}',
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
     },
      
      markDone:function(id,event){
            var self=this;
            load=1;
            if(event.target.checked){ 
               status = 1;
            }
            else {
               status = 0;
            }
       $.ajax({
         url:'{{route("doneTask")}}',
         type:'post',
         data:{
               _token:'{{csrf_token()}}',
               id:id,
               status:status,
               task_id:$("#task_id").val()
         },
         beforeSend:function(){
             if(!load)
             self.loading=true;
         }
         ,
         success:function(res){
                    if(res.status){
                        toastr.success(res.msg);
                    }else{
                        toastr.error(res.msg);
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
     getUserDetails:function(id,jsondata){
                  var self=this;
                    console.log(JSON.stringify(jsondata));
                  vm.udata=jsondata;
                  $("#task_id").val(jsondata.id);
                  $("#heretaskname").html(jsondata.title);
                  $("#heretaskdescription").html(jsondata.description);
                    
                  openslider();
                   
                  setTimeout(() => {
                      $.each(jsondata.day, function (index, value){
                            $("input:checkbox[name='day[]'][value='"+value+"']").prop('checked',true);
                      });  
                  }, 300); 
                    
                  

                  vm.eventImages = jsondata.getTaskDocuments;
                 
                  $("#starttime").val(jsondata.start_time);
                  $("#endtime").val(jsondata.end_time);
                  $("#remindertime").val(jsondata.reminder_time);

                  $("#status").prop('checked',jsondata.status);
                 
                  var item = [];
                  $.each(jsondata.get_team, function (index, value){
                      item.push(value.user_id);
                  });
                  $('#observers').val(item);
                  $('#observers').trigger('change');
                  $('#assign_id').val([jsondata.assignee_id]).trigger('change');
                  if(jsondata.get_checkList.length>0){
                      self.inputs = jsondata.get_checkList;
                  }else{
                      self.inputs = [
                           {
                               title: ''
                           }
                       ];
                  }

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
                 if ($(".data-items").length > 0) {
                    new PerfectScrollbar(".data-items", { wheelPropagation: false });
                }
     }//end of savedata

   }
 });

  </script>
  <script>
    function openslider(){
        $(".add-new-data").addClass("show");
        $(".overlay-bg").addClass("show");
        $(".select152").select2();
        $(".tooltip").removeClass('show');
    }

    $(".opensider").on("click", function (){
        $(".add-new-data").addClass("show");
        $(".overlay-bg").addClass("show");
        $(".select152").select2();
        $(".tooltip").removeClass('show');
    });
    $(".hide-data-sidebar, .cancel-data-btn").on("click", function () {
        $(".add-new-data").removeClass("show");
        $(".overlay-bg").removeClass("show");
        $("#task_id").val("");
        $(".tooltip").removeClass('show');
        $("#frmAddData")[0].reset();
        $("#frmAddData-t-0").click();
    });

    if ($(".data-items").length > 0) {
    new PerfectScrollbar(".data-items", { wheelPropagation: false });
  } 
  </script>
 @stop
