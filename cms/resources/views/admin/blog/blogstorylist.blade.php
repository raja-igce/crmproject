 @extends('layouts.main')
 <?php

use App\Helper\AccessHelper;
?>
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

 <link rel="stylesheet" type="text/css" href="{{env('APP_URL')}}public/app-assets/vendors/css/editors/quill/katex.min.css">
 <link rel="stylesheet" type="text/css" href="{{env('APP_URL')}}public/app-assets/vendors/css/editors/quill/monokai-sublime.min.css">
 <link rel="stylesheet" type="text/css" href="{{env('APP_URL')}}public/app-assets/vendors/css/editors/quill/quill.snow.css">
 <link rel="stylesheet" type="text/css" href="{{env('APP_URL')}}public/app-assets/vendors/css/editors/quill/quill.bubble.css">
 <link rel="stylesheet" type="text/css" href="{{env('APP_URL')}}public/app-assets/vendors/css/charts/apexcharts.css">

 <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.css">
 <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.css" rel="stylesheet"/>

 <style>
    .pac-container {
        z-index: 10000 !important;
    }
</style>
 <style>
 </style>
 @stop
 @section('content')
 <div class="content-wrapper" id="UserVueApp">
            <div class="content-header row">
              <div class="content-header-left col-md-12 col-12 mb-2">
                  <div class="row breadcrumbs-top">
                      <div class="col-12">
                          <h2 class="content-header-title float-left mb-0">{{$title}}</h2>
                          <div class="content-body">
                          @php $accessAble = AccessHelper::isAccessAble(auth()->user()->id, 'blog'); @endphp
                          @if(in_array($accessAble, ['authorized','grant_acces']))
                            <button type="button" class="pull-right btn btn-primary   round  " onclick="opensider('add')" id="opensider">
                                <i class="feather icon-plus"></i> New {{$label}}
                            </button>
                          @endif  
                          </div>
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
                                <div class=" ">
                                    <div class="">
                                        <div class="row">
                                              <div class="col-lg-10">
                                                  <div class="  collapse-header">
                                                    <div class="form-group position-relative has-icon-left">
                                                        <input type="text" class="form-control round" id="txtsearch"  v-model="txtsearch" value="">
                                                        <div class="form-control-position">
                                                            <i class="feather icon-search px-1"></i>
                                                        </div>
                                                    </div>
                                                  </div>
                                              </div>
                                              <div class="col-lg-1">
                                                    <button type="button"    class="slidedown btn btn-primary list-view-btn view-btn waves-effect waves-light active">
                                                        <i class="feather icon-list"></i>
                                                    </button>
                                              </div>
                                        </div>
                                        <div id="collapse2" role="tabpanel" aria-labelledby="headingCollapse1" class="collapse">
                                            <div class="card-content">
                                              <div class="brands">
                                                    <div class="brand-title mt-1 pb-1">
                                                        <h6 class="filter-title mb-0"></h6>
                                                    </div>
                                                    <div class="brand-list row" id="brands">

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class=" ">
                            <div class="row">
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
                                                       <div class="col-lg-12">
                                                           <div class="form-group">
                                                               <label for="title"> Name*</label>
                                                                <input type="text"  data-msg="Name" maxlength="15"  id="title" class="form-control" required placeholder="Name" name="title">
                                                           </div>
                                                       </div>

                                                       <div class=" col-lg-12">
                                                            <div class="form-group">
                                                               <label for="title">Description (Max 180 characters)</label>
                                                               <textarea  class="form-control" name="description" id="description" maxlength="180" rows="8" cols="80"></textarea>
                                                           </div>
                                                       </div>

                                                       <div class=" col-lg-12">  <br>  </div>

                                                       <div class="col-lg-12">
                                                            <div class="form-group">
                                                                <label for="title">Select Images/Video</label><br>
                                                                <button type="button" onclick="document.getElementById('imagefile').click()"  class="btn btn-primary mr-1 mb-1 waves-effect waves-light"><i class="fa fa-paperclip"></i> Select Images</button>
                                                                <div class="input-group mb-3 hidden">
                                                                     <div class="input-group-prepend">
                                                                         <!-- <span class="input-group-text">Upload</span> -->
                                                                     </div>
                                                                     <div class="custom-file">
                                                                         <input type="file" name="imagefile" id="imagefile" class="custom-file-input">
                                                                         <label class="custom-file-label" style="overflow:hidden">Choose file</label>
                                                                     </div>
                                                                 </div>
                                                            </div>
                                                            <div class="Outputshow" id="ImageGallery">
                                                              <div v-for="(data, key) in eventImages" title=""  class="profile-picImg GalleryBox" :id="'GalleryBox'+data.image">
                                                                <input type="hidden" :value="data.image" name="imagename[]" id="imagename">
                                                                <div class="gclose" v-on:click="updatearray(key,data.id)" title="Remove Image"></div>
                                                                <img id="galimgDocument1556361385_85" :src="'{{BlogStoryAbsPath}}'+data.id+'/Thumb/'+data.image" class="profile-picImg">
                                                              </div>
                                                            </div>
                                                            <input type="hidden" name="deletedImage" v-model="deletedImage" value="">
                                                       </div>

                                                       <div class="col-lg-12">
                                                       @if(in_array($accessAble, ['authorized','grant_acces']))
                                                          <button type="button" v-on:click="SaveData()" id="SaveData" class="btn btn-primary mt-2 round   waves-effect waves-light"> <i class="feather icon-save"></i>  Save </button>
                                                       @endif   
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
                        </div>
                        </div>
                        <?php /*
                            <section id="content-types">
                                <div class="row match-height">
                                  <div  v-if='users.data.length>0  && !loading' v-for='user in users.data ' class="col-xl-4 col-md-12 col-sm-12">
                                      <div class="card">
                                          <div class="card-content">
                                              <div :id="'carousel-example-generic'+user.id" class="carousel slide" data-ride="carousel">
                                                  <ol class="carousel-indicators">
                                                      <li :data-target="'#carousel-example-generic'+user.id" v-if="user.get_images.length>0 "  v-for="(data,ind) in user.get_images" :data-slide-to="ind" :class="{ 'active': ind === 0 }" ></li>
                                                  </ol>
                                                  <div class="carousel-inner" role="listbox">
                                                      <div v-if="user.get_images.length>0 " v-for="(data,ind) in user.get_images" class="carousel-item" :class="{ ' carousel-item active': ind === 0 }" >
                                                          <img :src="'{{CampaignAbsPath}}'+data.campaign_id+'/Thumb/'+data.image" onerror="this.src='{{FrontAssets}}images/placeholderCampaign.jpeg'" class="d-block w-100" alt="{{FrontAssets}}images/placeholderCampaign.jpeg">
                                                      </div>
                                                  </div>
                                                  <a class="carousel-control-prev" :href="'#carousel-example-generic'+user.id" role="button" data-slide="prev">
                                                      <span class="fa fa-angle-left icon-prev" aria-hidden="true"></span>
                                                      <span class="sr-only">Previous</span>
                                                  </a>
                                                  <a class="carousel-control-next" :href="'#carousel-example-generic'+user.id" role="button" data-slide="next">
                                                      <span class="fa fa-angle-right icon-next" aria-hidden="true"></span>
                                                      <span class="sr-only">Next</span>
                                                  </a>
                                              </div>
                                              <div class="card-body">
                                                  <h4 class="card-title cardtitleeclips">@{{user.title}}</h4>
                                                  <h6 class="card-subtitle text-muted ">@{{user.project_name}}</h6>
                                              </div>
                                              <div class="card-body pt-0">
                                                  <p class="card-text cardDetaileclips">@{{user.description_data}}</p>
                                              </div>
                                              <div :id="'goal-overview-chart'+user.id" class="progressCircle" :data-value="user.collect_percentage"></div>
                                              <div class="card-body pt-0">
                                                  <hr class="my-1">
                                                  <div class="d-flex justify-content-between mt-2">
                                                      <div class="float-left">
                                                          <p class="font-medium-2 mb-0">₹ @{{user.amount}}</p>
                                                          <p class="">Goal</p>
                                                      </div>
                                                      <div class="float-right">
                                                          <p class="font-medium-2 mb-0">@{{user.start_date}}</p>
                                                          <p class="">Start Date</p>
                                                      </div>
                                                  </div>
                                                  <div class="card-btns d-flex justify-content-between mt-2">
                                                      <a href="javascript:void(0)" class="btn gradient-light-primary text-white waves-effect waves-light">Update</a>
                                                      <a href="javascript:void(0)" class="btn btn-outline-primary waves-effect waves-light">Delete</a>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                                </div>
                            </section>
                            */ ?>

                            <div class="card">
                               <div class="card-body">
                                    <div class="card-dashboard ">
                                        <div class="table-responsive">
                                          <table class="table zero-configuration" id="">
                                              <thead>
                                                  <tr class="text-uppercase">
                                                      <th>id</th>
                                                      <th class="fulltblrow">Title</th>
                                                      <th class="fulltblrow">Image</th>
                                                      <th class="fulltblrow">Create Date</th>
                                                      <th>Actions</th>
                                                  </tr>
                                              </thead>
                                              <tbody >
                                                <template v-if='users.data.length>0  && !loading' v-for='user in users.data '>
                                                <tr>
                                                      <td>@{{user.id}} </td>
                                                      <td>@{{user.name}}</td>
                                                      <td class="fulltblrow">
                                                         <img class="media-object rounded-circle" :src="'{{BlogStoryAbsPath}}'+user.id+'/Thumb/'+user.image" onerror="this.src='{{BlogStoryAbsPath}}images/defaulticon.png'"  :alt="'{{BlogStoryAbsPath}}'+user.id+'/Thumb/'+user.image" height="30" width="30">
                                                      </td>
                                                      <td class="fulltblrow">@{{user.created_at}}</td>
                                                      <td>
                                                          <div class="btn-group" role="group" aria-label="Basic example">
                                                              @if(in_array($accessAble, ['authorized','grant_acces']))
                                                              <button v-on:click="getUserDetails(user.id,user)"  data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit {{$label}}" type="button" class="btn btn-outline-primary groupbtn waves-effect waves-light"><i class="feather icon-edit-2"></i></button>
                                                              <button :id="user.id" data-status="active" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete {{$label}}" type="button"  class="btn btn-outline-primary groupbtn grouplborder0 waves-effect waves-light   deleteUser"  ><i class="feather icon-trash deleteUser"></i></button>
                                                              @endif  
                                                              <!-- <button   data-status="active"  data-toggle="collapse" :data-target="'#demo'+user.id" data-placement="top" title="" data-original-title="Expand Table" type="button"  class="btn accordion-toggle btn-outline-primary groupbtn grouplborder0 waves-effect waves-light  "  ><i class="feather icon-arrow-down"></i></button> -->

                                                              <!-- <button v-on:click="goDetails(user.creator.id)" :id="user.creator.id" data-status="active" data-toggle="tooltip" data-placement="top" title="" data-original-title="View {{$label}}" type="button"  class="btn btn-outline-primary groupbtn grouplborder0 waves-effect waves-light"  >
                                                                <a :href="user.creator.id | goDetails">
                                                                    <i class="feather icon-eye "></i>
                                                                </a>
                                                              </button> -->

                                                              <!-- <i  data-toggle="collapse" :data-target="'#demo'+user.id" class="accordion-toggle fa fa-eye"  ></i>  -->
                                                              <!-- <button  data-toggle="tooltip" data-placement="top" title="" data-original-title="View profile" type="button" class="btn btn-outline-primary groupbtn waves-effect waves-light"><i class="feather icon-eye"></i></button> -->
                                                          </div>
                                                      </td>
                                                  </tr>
                                                  <tr>
                                                      <td colspan="8" class="hiddenRow">
                                                        <div class="accordian-body collapse" :id="'demo'+user.id">
                                                            <table class="table table-striped">
                                                                    <thead>
                                                                      <tr>
                                                                        <td><b>NO. OF DONORS</b></td>
                                                                        <td><b>Fundraising Teams</b></td>
                                                                      </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                       <tr>
                                                                         <td>@{{user.no_of_donor}}</td>
                                                                         <td>
                                                                           <ul class="list-unstyled users-list m-0  d-flex align-items-center">
                                                                               <li v-for="team in  user.get_team" data-toggle="tooltip" data-popup="tooltip-custom" data-placement="bottom" :data-original-title="team.get_team_memeber.first_name" class="avatar pull-up">
                                                                                    <img class="media-object rounded-circle" :src="'{{TeamImagePath}}'+team.user_id+'/Thumb/'+team.get_team_memeber.profile_pic" onerror="this.src='{{FrontAssets}}images/defaulticon.png'" :alt="'{{TeamImagePath}}'+team.user_id+'/Thumb/'+team.get_team_memeber.profile_pic" height="30" width="30">
                                                                               </li>
                                                                               <li class="d-inline-block pl-50">
                                                                                   <!-- <span>+140 more</span> -->
                                                                               </li>
                                                                           </ul>
                                                                         </td>
                                                                         <td><a href="#" class="btn btn-default btn-sm">
                                                                           <i class="glyphicon glyphicon-cog"></i></a>
                                                                         </td>
                                                                      </tr>
                                                                    </tbody>
                                                             	</table>
                                                         </div>
                                                      </td>
                                                  </tr>
                                                  </template>

                                              </tbody>
                                          </table>
                                            @include('layouts.pagingView')
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
  <script src="{{env('APP_URL')}}public/assets/js/bootstrap-datepicker.min.js"></script>
  <script src="{{env('APP_URL')}}public/app-assets/vendors/js/charts/apexcharts.min.js"></script>
  <script src="{{env('APP_URL')}}public/app-assets/js/scripts/cards/card-demo.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>

  <!-- <script src="{{env('APP_URL')}}public/app-assets/js/scripts/forms/select/form-select2.js"></script> -->



  <script src="{{env('APP_URL')}}public/app-assets/js/scripts/editors/full-editor-quill.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>

  @include('layouts.pagingTemplateSource')
    <script type="text/javascript" src="{{env('APP_URL')}}public/assets/js/vue.code.js"></script>
 <script>

 // Full Editor

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
                       url:'{{route("deleteStory")}}',
                       type:'post',
                       data:{
                           _token:'{{csrf_token()}}',
                           id:id
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
      updateCircle();
 });



 // Format icon
 function iconFormat(icon){
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

             deletedImage:[],
             eventImages: {},
             docImages: {},
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

   },
   filters: {

    goDetails: function(string) {
      var Newurl ="{{route('v-profile','MID')}}";
     return  Newurl = Newurl.replace('MID',string);

   }
  },

   mounted:function(){
      this.getUsers();
   },
   methods:{
     goDetails:function(string){
       var Newurl ="{{route('v-profile','MID')}}";
         window.location.href = Newurl.replace('MID',string);

     },
     updatearray:function(inm,id){
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

           self.eventImages.splice(inm, 1);
           self.deletedImage.push(id);

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
         url:'{{route("ajaxStory")}}',
         type:'post',
         data:{
               _token:'{{csrf_token()}}',
               search:self.search,
               page:self.users.current_page,
               pagenos:self.pagechange,
               userstatus:self.userstatus,
               txtsearch:self.txtsearch

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
                         url:'{{route("addStory")}}',
                         type:'post',
                         data: $('#frmAddData').serialize(),
                         beforeSend:function(){
                             if(!load)
                             self.loading=true;
                         },
                         success:function(res){
                              if(res.status){
                                  $(".hide-data-sidebar").click();
                                  $(".clearimx").remove();
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
          }else{

              toastr.error("Please enter required value in form. Check form value again!",'Validation Error!');
          }
     },
     getUserDetails:function(id,jsondata){
                  var self=this;
                  $("#user_id").val(jsondata.id);
                  $("#title").val(jsondata.name);
                  $("#amount").val(jsondata.amount);
                  $("#description").val(jsondata.description);



                  vm.eventImages = jsondata.image;

                  var itemz = [];
                  itemz.push({'id':jsondata.id,'image':jsondata.image});
                  vm.eventImages=itemz;
                  vm.docImages = jsondata.get_docs;
                  opensider('update');

                  $("#mylabel").html("Update {{$label}}");
     }//end of savedata

   }
 });

 </script>

<script type="text/javascript">
  /*custom js here*/
  function opensider(type){

    if(type=='add'){
        $(".select2").val() ;
        $('.select2-icons').val([]);
        $('.select2-icons').trigger('change');
        $(".ql-editor").html('');
    }


     $("#mylabel").html("Add new {{$label}}");


     $(".add-new-data").addClass("show");
     $(".overlay-bg").addClass("show");
     $(".select152").select2();
     $(".tooltip").removeClass('show');
  }

  $(".hide-data-sidebar, .cancel-data-btn").on("click", function () {
      $(".add-new-data").removeClass("show");
      $(".overlay-bg").removeClass("show");
      // $("#data-name, #data-price").val("");
      // $("#data-category, #data-status").prop('selectedIndex', 0);
      $("#user_id").val("");
      $(".tooltip").removeClass('show');
      $("#frmAddData")[0].reset();
      vm.eventImages = [];
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

 setTimeout(function () {
  $("#selectteam").select2({
      minimumResultsForSearch: Infinity,
      templateResult: iconFormat,
      templateSelection: iconFormat,
      escapeMarkup: function(es) { return es; }
  });
 }, 500);





   function deletegalleryimage(id){
            $("#GalleryBox"+id).remove();
   }
   $(document).on("change","#imagefile",function(){
     var fileExtension = ['jpeg', 'jpg', 'png', 'gif', 'bmp'];
      if ($.inArray($(this).val().split('.').pop().toLowerCase(), fileExtension) == -1) {
       alert("Only formats are allowed : "+fileExtension.join(', '));
      }
                var addBusOwnerForm= $('#frmAddData')[0];
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
                        setTimeout(function(){
                        $(".Outputshow #ShowHideOpen").remove();
                        $(".Outputshow").html(response);
                      }, 1000);
                    },
                    error: function(response){
                      console.log('Error '+response);
                    }
                });
      });

         $(document).on('click',".slidedown",function(){
              //$("#collapse2").show().slidedown();
              $('#collapse2').fadeToggle('slow');
         });

</script>




 @stop
