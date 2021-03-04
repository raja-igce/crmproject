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
                                      <h1 class="block-title">Our Causes</h1>
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
                      <li  v-if="projectList.length>0 " data-option-value="*" class="active"><a href="javascript:void(0)"><i class="fa fa-th"></i> <span>Show All</span></a></li>
                      <li  v-if="projectList.length>0 "  v-for="(data,ind) in projectList"  :data-option-value="data.id"><a href="javascript:void(0)"><span>@{{data.project_name}}</span></a></li>
                  </ul>
              </div>
              <div class="row">
                  <ul class="sort-destination isotope gallery-items" data-sort-id="gallery">
                      <li  v-if="userResult.length>0 " v-for="(data,ind) in userResult"  :class="'col-md-4 col-sm-6 grid-item cause-grid-item '+ data.project_id +' format-standard'">
                        <div class="grid-item-inner">
                              <!-- <a href="single-cause.html" class="media-box">
                                  <img src="http://placehold.it/600x400&amp;text=IMAGE+PLACEHOLDER" alt="">
                              </a> -->
                              <a v-if="data.get_images.length>0 && index==0 " v-for="(imgdata,index) in data.get_images"   :class="{ ' media-box active': index === 0 }" >
                                     <img :src="'{{CampaignImagePath}}'+imgdata.campaign_id+'/'+imgdata.image" onerror="this.src='{{FrontAssets}}images/placeholderCampaign.jpeg'" class="d-block w-100" :alt="'{{CampaignImagePath}}'+imgdata.campaign_id+'/Thumb/'+imgdata.image">
                              </a>
                              <a v-if="data.get_images.length==0"   class="media-box active" >
                                     <img src="{{FrontAssets}}images/placeholderCampaign.jpeg" onerror="this.src='{{FrontAssets}}images/placeholderCampaign.jpeg'" class="d-block w-100" >
                              </a>
                              <div class="grid-item-content">
                                <a class="cProgress" :data-complete="data.collect_percentage" data-color="F23827" data-toggle="tooltip" data-original-title="10 days left"><strong></strong></a>
                                  <h3 class="post-title"><a :href="data.slug | goDetails"  >@{{data.title}}</a></h3>
                                  <div class="meta-data newmeta-data">Donated ₹ @{{data.collect_amount}} / <span class="cause-target">₹ @{{data.amount}}</span></div>
                                  <div class="cardNewCampaignlist">
                                        <div class="widget recent_posts">
                                            <img class="text-center media-object rounded-circle" :src="'{{TeamImagePath}}'+data.creator.id+'/Thumb/'+data.creator.profile_pic" onerror="this.src='{{FrontAssets}}images/defaulticon.png'"  :alt="'{{TeamImagePath}}'+data.creator.id+'/Thumb/'+data.creator.profile_pic" height="30" width="30">
                                            <h5 class="text-align-center">@{{data.creator.first_name}}</h5>
                                            <small>Campaigner</small>
                                              <!-- <ul>
                                                <li>
                                                     <a href="javascript:void(0)" class="media-box">
                                                         <img class="media-object rounded-circle" :src="'{{TeamImagePath}}'+data.creator.id+'/Thumb/'+data.creator.profile_pic" onerror="this.src='{{FrontAssets}}images/defaulticon.png'"  :alt="'{{TeamImagePath}}'+data.creator.id+'/Thumb/'+data.creator.profile_pic" height="30" width="30">
                                                     </a>
                                                     <h5 class="text-align-left"> <small>By</small> @{{data.creator.first_name}}</h5>
                                                 </li>
                                              </ul> -->
                                        </div>
                                  </div>
                                <a :href="data.slug | goDetails" class="btn btn-primary" data-toggle="modal" data-target="#DonateModal">Donate Now</a>
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
       var Newurl ="{{route('campaign_details','MID')}}";
       return  Newurl = Newurl.replace('MID',string);
    },
    WupLink: function(string) {
       var Newurl ="https://web.whatsapp.com/send?text=Please Help me now";
       return  encodeURI(Newurl);
    },

  },
  methods:{
      getUsers:function(load){
      var self=this;
      $.ajax({
        url:'{{route("ajaxCampaign")}}',
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
</script>
@stop
