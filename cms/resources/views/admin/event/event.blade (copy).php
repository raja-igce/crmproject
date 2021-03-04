
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

 <style>
 </style>
 @stop
 @section('content')
 <div class="content-wrapper" id="UserVueApp">
            <div class="content-header row">
              <div class="content-header-left col-md-9 col-12 mb-2">
                  <div class="row breadcrumbs-top">
                      <div class="col-12">
                          <h2 class="content-header-title float-left mb-0">{{$title}}</h2>

                          <div class="content-body">
                              <!-- Snow Editor start -->

                              <!-- Snow Editor end -->



                              <!-- Bubble Editor end -->



                          </div>
                      </div>
                  </div>
              </div>
            </div>
            <div class="content-body">
                <!-- User Table -->
                <section>
                  <div class=" col-lg-6">
                      <div class="form-group">
                          <label for="title">Location</label>

                           <input type="text" name="lat" id="lat" value="">
                           <input type="text" name="lng" id="lng" value="">
                          <input id="location" name="location"  onblur ="AddLocationToMap(this.value)"  type="text" placeholder="Event Location" class="form-control">
                       </div>
                       <div id="map" style="width:350px; height:450px;"></div>
                       <div class="map_canvas" style="width:350px; height:450px; position:relative; overflow:hidden;">
                          sadsdsdsdds
                       </div>

                  </div>
                    <!-- Begin: User form -->
                    <div class="card">
                        <div class="card-body">
                            <form class="form">
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col">
                                            <label for="userstatus">Status</label>
                                            <fieldset class="form-group">
                                                <select class="form-control" id="userstatus" name="userstatus" v-model="userstatus">
                                                    <option selected value="">All</option>
                                                    <option value="1">Active</option>
                                                    <option value="0">InActive</option>
                                                </select>
                                            </fieldset>
                                        </div>
                                        <div class="col">
                                            <label for="verifystatus">Search</label>
                                            <fieldset class="form-group">
                                                <input type="text" class="form-control" name="txtsearch" value="txtsearch" v-model="txtsearch">
                                            </fieldset>
                                        </div>
                                        <div class="col rslt-btn">
                                          <button type="button" class="btn btn-primary mt-2 round opensider" id="opensider">
                                              <i class="feather icon-plus"></i> New {{$label}}
                                          </button>
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
                                        <div class="add-new-data col-12" style="width:100%" >
                                            <div class="div mt-2 px-2 d-flex new-data-title justify-content-between">
                                                <div>
                                                    <h4 id="mylabel">Add new {{$label}}</h4>
                                                </div>
                                                <div class="hide-data-sidebar" v-on:click="getUsers()" >
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
                                     </div>
                                     <div class="card-content">
                                         <div class="card-body">
                                             <form action="#" id="frmAddData" name="frmAddData" class="steps-validation ">
                                               <input type="hidden" name="_token"  value="{{csrf_token()}}">
                                               <input type="hidden" name="user_id" id="user_id" value="">

                                                      <div class="row">
                                                       <div class="col-lg-6">
                                                           <div class="form-group">
                                                               <label for="title">Event title*</label>
                                                                <input type="text"  data-msg="Please enter project name"  id="title" class="form-control" required placeholder="title" name="title">
                                                           </div>
                                                       </div>
                                                       <div class="col-lg-6">
                                                           <div class="form-group">
                                                               <label for="title">Sub Title*</label>
                                                                <input type="text"  data-msg="Please enter project name"  id="title" class="form-control" required placeholder="title" name="title">
                                                           </div>
                                                       </div>
                                                       <div class=" col-lg-12">
                                                             <label for="title">Description</label>
                                                             <input type="hidden" name="description" id="description" value="" required>
                                                             <section class="full-editor">
                                                               <div id="full-wrapper">
                                                                   <div id="full-container">
                                                                       <div class="editor">
                                                                       </div>
                                                                   </div>
                                                               </div>
                                                             </section>
                                                             <br>
                                                       </div>




                                                       <div class=" col-lg-12">
                                                           <div class="form-group">
                                                               <label for="title">Team Member</label>
                                                               <select data-placeholder="Select team..." class="select2-icons form-control" id="selectteam" name="selectteam[]" multiple="multiple" required>
                                                                 <optgroup label="Services">
                                                                    <option v-for="data in usersList"   data-icon="aa"  :value="data.id" data-thumbnail="http://www.emlii.com/images/author/axw12po.jpg" >@{{data.first_name}}</option>
                                                                 </optgroup>
                                                               </select>
                                                            </div>
                                                       </div>

                                                       <div class=" col-lg-12 hidden">
                                                           <div class="form-group">
                                                               <label for="title">Tags</label>
                                                               <select class="select2 form-control" name="tags[]" id="tags" multiple="multiple">
                                                                   <option value="square">Square</option>
                                                                   <option value="rectangle">Rectangle</option>
                                                                   <option value="rombo">Rombo</option>
                                                                   <option value="romboid">Romboid</option>
                                                                   <option value="trapeze">Trapeze</option>
                                                                   <option value="traible">Triangle</option>
                                                                   <option value="polygon">Polygon</option>
                                                               </select>
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

                                </div>
                            </div>
                            <div class="card-dashboard">
                                <div class="table-responsive">
                                    <table class="table zero-configuration" id="">
                                        <thead>
                                            <tr class="text-uppercase">
                                                <th>id</th>
                                                <th>Project Name</th>
                                                <th>Start Date</th>
                                                <th>End Date</th>
                                                <th>Revenue (plan)</th>
                                                <th>Planned (plan)</th>
                                                <th>Manager</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          <tr v-if='users.data.length>0  && !loading' v-for='user in users.data '>
                                                <td>@{{user.id}}</td>
                                                <td>@{{user.project_name}}</td>
                                                <td>@{{user.start_date}}</td>
                                                <td>@{{user.end_date}}</td>
                                                <td>@{{user.planned_revenue}} <span v-if="user.planned_revenue>0">₹</span></td>
                                                <td>@{{user.planned_expense}} <span v-if="user.planned_expense>0">₹</span></td>
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
                                        <div class="rows" v-if="users.meta">
                                          <div v-if="users.meta.from" class="col-lg-4 pull-left">
                                            @{{users.meta.from}}-@{{users.meta.to}} / @{{users.meta.total}} Records
                                          </div>
                                          <div v-if="users.meta.from" class="col-lg-6">
                                              <vue-pagination :pagination="users" @paginate="getUsers(1)" :offset="4"></vue-pagination>
                                          </div>
                                          <div v-else class="col-lg-12 text-center">
                                               No record found
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
   <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyB9LpeqTEBlQPhGSmgl_G5i4-sWWBEr60E&callback=myMap"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
  <!-- <script src="{{env('APP_URL')}}public/app-assets/js/scripts/forms/select/form-select2.js"></script> -->



  <script src="{{env('APP_URL')}}public/app-assets/js/scripts/editors/full-editor-quill.js"></script>



  <!-- END: Theme JS-->

  <!-- BEGIN: Page JS-->


  <script type="text/x-template" id="pagination-template">

     <div class="dataTables_paginate paging_simple_numbers">
          <ul class="pagination"  >
            <li v-if="pagination.last_page > 1" class="page-item">
              <a href="javascript:void(0)" class="page-link" aria-label="Previous"   v-on:click.prevent="changePage(pagination.current_page - 1)">
                       <<
                      </a>
            </li>
            <li v-if="pagination.last_page > 1" v-for="page in pagination.last_page" :class="{'active': page == pagination.current_page}" class="page-item">
              <a href="javascript:void(0)" class="page-link" v-on:click.prevent="changePage(page)"><% page %></a>
            </li>
            <li v-if="pagination.current_page < pagination.last_page" class="page-item">
                      <a href="javascript:void(0)"class="page-link" aria-label="Next" v-on:click.prevent="changePage(pagination.current_page + 1)">
                         >>
                      </a>
            </li>
          </ul>
      </div>
  </script>
 <script>
 function initMap() {
  // The location of Uluru
  var uluru = {lat: -25.344, lng: 131.036};
  // The map, centered at Uluru
  var map = new google.maps.Map(
      document.getElementById('map'), {zoom: 4, center: uluru});
  // The marker, positioned at Uluru
  var marker = new google.maps.Marker({position: uluru, map: map});
}
 // Full Editor
    /*
    function AddLocationToMap(address)
    {

        var map;
        geocoder = new google.maps.Geocoder();
        var mapOptions = {zoom: 15, mapTypeId: google.maps.MapTypeId.ROADMAP}
        var map = new google.maps.Map(document.getElementById("map_canvas"), mapOptions);
        geocoder.geocode({'address':address},function(results, status)
        {
            if(status == google.maps.GeocoderStatus.OK)
            {
                var position =results[0].geometry.location;
                alert(position);
                $("#lat").val(position.lat());
                $("#lng").val(position.lng());

                map.setCenter(results[0].geometry.location);
                var lt = new google.maps.LatLng(results[0].geometry.location);
                var img_marker =  'https://i.pinimg.com/originals/9f/1e/ff/9f1effeb40a797880446191f7f62631b.png';
                var marker = new google.maps.Marker({
                map: map,
                draggable: true,
                animation: google.maps.Animation.DROP,
                position: position,
                icon:  img_marker
                });
                google.maps.event.addListener(marker,'dragend',function(event)
                {
                    $("#lat").val(this.position.lat());
                    $("#lng").val(this.position.lng());
                });
                marker.setMap(map);
            }
            else
            {

            }
        });
    } */

    function myMap() {
            var mapProp = {
                center:new google.maps.LatLng(51.508742,-0.120850),
                zoom:5,
            };
            var map = new google.maps.Map(document.getElementById("map_canvas"),mapProp);
   }
   setTimeout(function () {
      myMap();
   }, 500);

    $(document).ready(function () {
      myMap();
       var latlng = new google.maps.LatLng(32.3326, 72.3665);
      var myOptions = {
        zoom: 7,
        maxZoom: 12,
        center: latlng,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };
    map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
});
    google.maps.event.addDomListener(window, 'load', function () {
       var places = new google.maps.places.Autocomplete(document.getElementById('location'));
       google.maps.event.addListener(places, 'place_changed', function (event) {
        var place = places.getPlace();
        var address = place.formatted_address;

        // if (event.keyCode === 13) {
        //       event.preventDefault();
        //    }
       });
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
                       url:'{{route("deleteProject")}}',
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
       search:'',
       pagechange:20,
       loading:true,
       load:1,
       getPriority: {!!json_encode($getPriority)!!},
       usersList: {!!json_encode($usersList)!!},
       pagination:{meta:{}},
       userstatus:"",
       verifystatus:"",
       txtsearch:""
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
   },
   methods:{
     getUsers:function(load){
       var self=this;

       $.ajax({
         url:'{{route("ajaxProject")}}',
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
            // var res = JSON.stringify(res);

            self.users=res;
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
                  $("#description").val($(".ql-editor").html());
                  jQuery.ajax({
                         url:'{{route("addProject")}}',
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
                  $("#title").val(jsondata.project_name);
                  $(".ql-editor").html(jsondata.description);
                  $("#projectlead").val(jsondata.projectlead);
                  $("#planned_revenue").val(jsondata.planned_revenue);
                  $("#planned_expenses").val(jsondata.planned_expense);
                  $("#startdate").val(jsondata.start_date);
                  $("#enddate").val(jsondata.end_date);

                  $("#status").prop('checked',jsondata.status);
                  $('.opensider').click();
                  var item = [];
                  $.each(jsondata.get_team, function (index, value){
                      item.push(value.user_id);
                  });
                  $('#selectteam').val(item);
                  $('#selectteam').trigger('change');
                  $('#selectmanager').val([jsondata.manager_id]).trigger('change');


                  $("#mylabel").html("Update {{$label}}");

                  var fromDate = moment($('#startdate').val(), 'DD-MM-YYYY');
                  var toDate = moment($('#enddate').val(), 'DD-MM-YYYY');
                  if (fromDate.isValid() && toDate.isValid()) {
                    var duration = moment.duration(toDate.diff(fromDate));
                    $('#durations').html( duration.years() + ' Year(s) ' + duration.months() + ' Month(s) ' + duration.days() + ' Day(s)');
                  } else {
                    $('#durations').html("");
                  }

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
<!-- <script src="{{env('APP_URL')}}public/app-assets/js/scripts/forms/custome_wizard-steps.js"></script> -->
<script type="text/javascript">
    $(document).ready(function (){

    });


 function reinitEditor(){
   var fullEditor = new Quill('#full-container .editor', {
     bounds: '#full-container .editor',
     modules: {
       'formula': true,
       'syntax': true,
       'toolbar': [
         [{
           'font': []
         }, {
           'size': []
         }],
         ['bold', 'italic', 'underline', 'strike'],
         [{
           'color': []
         }, {
           'background': []
         }],
         [{
           'script': 'super'
         }, {
           'script': 'sub'
         }],
         [{
           'header': '1'
         }, {
           'header': '2'
         }, 'blockquote', 'code-block'],
         [{
           'list': 'ordered'
         }, {
           'list': 'bullet'
         }, {
           'indent': '-1'
         }, {
           'indent': '+1'
         }],
         ['direction', {
           'align': []
         }],
         ['link', 'image', 'video', 'formula'],
         ['clean']
       ],
     },
     theme: 'snow'
   });
 }
 setTimeout(function () {
   reinitEditor();
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
  $("#tags").select2();


 }, 500);


 <script async defer  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB9LpeqTEBlQPhGSmgl_G5i4-sWWBEr60E&callback=initMap"></script>
</script>

 @stop
