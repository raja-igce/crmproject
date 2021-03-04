@extends('front.layouts.main')
@section('content')
  <div class="hero-area">
    <!-- Start Hero Slider -->
      <div class="flexslider heroflex hero-slider" data-autoplay="no" data-pagination="no" data-arrows="no" data-style="fade" data-pause="yes">
          <ul class="slides">
              <li class="parallax" style="background-image:url('https://wooderice.com/wp-content/uploads/2019/04/under-construction.jpg'); opacity: 0.5"  >
                <div class="flex-caption">
                    <div class="container">
                        <div class="flex-caption-table">
                            <div class="flex-caption-cell">
                                <div class="flex-caption-text">
                                      <!-- <h1 class="block-title">Page Under Construct</h1> -->
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

              </div>
              <div class="row">
                  <ul class="sort-destination isotope gallery-items" data-sort-id="gallery">
                       <li> <h1> Page is under development </h1></li>
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
            load:1
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
    }
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
