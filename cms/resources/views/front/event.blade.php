@extends('front.layouts.main')
@section('content')
  <div class="hero-area">
    <!-- Start Hero Slider -->
      <div class="flexslider heroflex hero-slider" data-autoplay="no" data-pagination="no" data-arrows="no" data-style="fade" data-pause="yes">
          <ul class="slides">
              <li class="parallax" style="background-image:url('https://onfe-rope.ca/wp-content/uploads/2017/03/banner-donate.jpg')">
                <div class="flex-caption">
                    <div class="container">
                        <div class="flex-caption-table">
                            <div class="flex-caption-cell">
                                <div class="flex-caption-text">
                                      <h1 class="block-title">Events</h1>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </li>
          </ul>
      </div>
      <!-- End Hero Slider -->
  </div>
  <div id="main-container">
    <div class="content" id="UserVueApp" style="padding-top:75px;">
        <div class="container">
              <div class="grid-filter">
                  <ul class="nav nav-pills sort-source" data-sort-id="gallery" data-option-key="filter">
                      <li  v-if="projectList.length>0 " data-option-value="*" class="active"><a href="javascript:void(0)"><i class="fa fa-th"></i> <span>  Show All  </span></a></li>
                      <li  v-if="projectList.length>0 "  v-for="(data,ind) in projectList" :class="{'activemanx': currentID == data.id}"  :data-option-value="data.id"><a href="javascript:void(0)"  :class="{'activeman': currentID == data.id}"><span>@{{data.project_name}}</span></a></li>
                  </ul>
              </div>
              <div class="row">
                  <ul class="sort-destination isotope gallery-items" data-sort-id="gallery">
                        <li  v-if="userResult.length>0 " v-for="(data,ind) in userResult"  :class="'col-md-4 col-sm-6 grid-item event-grid-item education format-standard '+ data.project_id +' '">
                        	<div class="grid-item-inner">
                                <a v-if="data.get_images.length>0 && index==0 " v-for="(imgdata,index) in data.get_images"   :class="{ ' media-box active': index === 0 }" >
                                       <img :src="'{{EventImagePath}}'+imgdata.event_id+'/'+imgdata.image" onerror="this.src='{{FrontAssets}}images/placeholderCampaign.jpeg'"  class="d-block w-100" :alt="'{{EventImagePath}}'+imgdata.event_id+'/'+imgdata.image">
                                </a>
                                <a v-if="data.get_images.length==0"  class=" media-box active" >
                                       <img   src="{{FrontAssets}}images/placeholderCampaign.jpeg" onerror="this.src='{{FrontAssets}}images/placeholderCampaign.jpeg'"  class="d-block w-100" >
                                </a>
                                <div class="grid-item-content">
                                    <span class="event-date">
                                      <span class="date">@{{data.startdate}}</span>
                                      <span class="month">@{{data.startmonth}}</span>
                                      <span class="year">@{{data.startyear}}</span>
                                    </span>
                                    <span class="meta-data">@{{data.show_time}}</span>
                                    <h3 class="post-title"><a :href="data.slug | goDetails">@{{data.title}}</a></h3>
                                    <ul class="list-group">
                                        <li class="list-group-item">@{{data.seats}}<span class="badge">Attendees</span></li>
                                        <li class="list-group-item">@{{data.location}}<span class="badge">Location</span></li>
                                    </ul>
                                </div>
                           	</div>
                        </li>

                  </ul>
              </div>
          </div>
      </div>
  </div>
  <!-- Main Content -->

@stop
@section('frontjs')

<script src="{{FrontAssets}}js/jquery-2.1.3.min.js"></script> <!-- Jquery Library Call -->
<script src="{{FrontAssets}}vendor/magnific/jquery.magnific-popup.min.js"></script> <!-- PrettyPhoto Plugin -->
<script src="{{FrontAssets}}js/ui-plugins.js"></script> <!-- UI Plugins -->
<script src="{{FrontAssets}}js/helper-plugins.js"></script> <!-- Helper Plugins -->
<script src="{{FrontAssets}}vendor/owl-carousel/js/owl.carousel.min.js"></script> <!-- Owl Carousel -->
<script src="{{FrontAssets}}js/bootstrap.js"></script> <!-- UI -->
<script src="{{FrontAssets}}js/init.js"></script> <!-- All Scripts -->
<script src="{{FrontAssets}}vendor/flexslider/js/jquery.flexslider.js"></script> <!-- FlexSlider -->
<script src="{{FrontAssets}}js/circle-progress.js"></script> <!-- Circle Progress Bars -->
<script src="https://cdn.jsdelivr.net/npm/vue@2.5.17/dist/vue.js"></script>
<script src="{{env('APP_URL')}}public/assets/js/vue.paging.js"></script>
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
<script type="text/javascript">


var vm = new Vue({
  el:"#UserVueApp",
  data:{
            users:{ total: 0, per_page: 2, from: 1, to: 0, current_page: 1, data:[] },
            search:'',
            pagechange:20,
            loading:true,
            load:1,
            projectList: {!!json_encode($projectList)!!},
            userResult: {!!json_encode($userResult)!!},
            currentID: "{{$pro_id}}"
  },
  watch:{
     // userstatus:function(){
     //     this.getUsers();
     // },
     // txtsearch:function(){
     //     this.getUsers();
     // },

  },
  filters: {
    goDetails: function(string) {
       var Newurl ="{{route('event_details','MID')}}";
       return  Newurl = Newurl.replace('MID',string);
    },
    subStr: function(string) {
    	return string.substring(0,15) + '...';
    },
    // WupLink: function(string) {
    //    var Newurl ="https://web.whatsapp.com/send?text=Please Help me now";
    //    return  encodeURI(Newurl);
    // },

  },
  methods:{
      getUsers:function(load){
      var self=this;

      $.ajax({
        url:'{{route("ajaxEvent")}}',
        type:'post',
        data:{
              _token:'{{csrf_token()}}',
              // search:self.search,
              // page:self.users.current_page,
              // pagenos:self.pagechange,
              // userstatus:self.userstatus,
              // txtsearch:self.txtsearch,
              // projects: projects
         },
        beforeSend:function(){

            if(!load)
            self.loading=true;
        }
        ,
        success:function(res){
           // var res = JSON.stringify(res);
            console.log(res);
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
    }
  }
});
setTimeout(function () {
    $(".activeman").click();
    $(".sort-source").find(".active").removeClass("active");
    setTimeout(function () {
        $(".sort-source").find(".activemanx").addClass("active");
    }, 1000);

}, 1000);
</script>
@stop
