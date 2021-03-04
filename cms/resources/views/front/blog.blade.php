@extends('front.layouts.main')
@section('content')

@section('headertype')
  {{'sticky'}}
@stop

  <div id="main-container">
    <div class="content" id="UserVueApp" style="padding-top:175px;">
        <div class="container">
          <div class="container">
              <h1 class="block-title">Blog</h1>
              <div class="row">
                  <div class="col-md-8 content-block">

                      <div v-if='users.data.length>0  && !loading' v-for='data in users.data ' class="blog-list-item format-standard">
                          <div class="row">
                              <div class="col-md-4 col-sm-4">
                                    <a  href="javascript:void(0)" v-on:click.prevent="redirectDetails(data.slug)"   class="media-box grid-featured-img">
                                        <img class="imgborder" :src="'{{BlogImagePath}}'+data.id+'/Thumb/'+data.image" onerror="this.src='{{FrontAssets}}images/defaulticon.png'"  :alt="'{{BlogImagePath}}'+data.id+'/Thumb/'+data.image"  alt="">
                                     </a>
                                </div>
                                <div class="col-md-8 col-sm-8">
                                    <h3><a href="javascript:void(0)" v-on:click.prevent="redirectDetails(data.slug)"   >@{{data.title}}</a></h3>
                                    <span class="meta-data grid-item-meta"><i class="fa fa-calendar"></i> Posted on @{{moment(data.created_at).format("DD-MM-YYYY h:mm a") }}</span>
                                    <div class="grid-item-excerpt">
                                        <p class="blogtrim"> @{{data.description | strippedContent}} </p>
                                    </div>
                                    <a href="javascript:void(0)" v-on:click.prevent="redirectDetails(data.slug)"    class="basic-link">Read more</a>
                                </div>
                            </div>
                      </div>
                      <div class="" v-if='users.data.length==0'>
                        No data found
                      </div>


                        <!-- Page Pagination -->
                        <nav>
                          <vue-pagination :pagination="users" @paginate="getUsers(1)" :offset="4"></vue-pagination>
                        </nav>
                    </div>
                    <div class="col-md-4 sidebar-block">
                        <div class="widget tabbed_content tabs">
                            <ul class="nav nav-tabs">
                                <li class="active"> <a data-toggle="tab" href="#Trecent">Recent</a> </li>
                                <li> <a data-toggle="tab" href="#Tcomments">Tags</a> </li>
                            </ul>
                            <div class="tab-content">
                                <div id="Trecent" class="tab-pane active">
                                    <div class="widget recent_posts">
                                        <ul>
                                            <li v-for="rblog in blogList">
                                                <a href="javascript:void(0)" v-on:click.prevent="redirectDetails(rblog.slug)" class="media-box">
                                                    <img class="imgborder_thumb" :src="'{{BlogImagePath}}'+rblog.id+'/Thumb/'+rblog.image" onerror="this.src='{{FrontAssets}}images/defaulticon.png'"  :alt="'{{BlogImagePath}}'+rblog.id+'/Thumb/'+rblog.image"  alt="">
                                                </a>
                                                <h5><a  href="javascript:void(0)" v-on:click.prevent="redirectDetails(rblog.slug)" >@{{rblog.title}}</a></h5>
                                                <span class="meta-data grid-item-meta">Posted on @{{moment(rblog.created_at).format("DD-MM-YYYY h:mm a") }}</span>
                                            </li>

                                        </ul>
                                    </div>
                                </div>

                                <div id="Tcomments" class="tab-pane">
                                    <div class="tag-cloud">
                                         <a v-for="tag in tagList" v-on:click.prevent="changedata('tag',tag.title)" href="javascript:void(0)">@{{tag.title}}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="widget sidebar-widget widget_categories">
                          <h3 class="widgettitle">Post Categories</h3>
                            <ul>
                               <li v-for="cat in categoryList"><a href="javascript:void(0)" v-on:click="changedata('category',cat.slug)">@{{cat.project_name}}</a> (@{{cat.get_blog.length}})</li>

                            </ul>
                        </div>
                        <div class="widget sidebar-widget widget_search">
                          <div class="input-group">
                              <input type="text" class="form-control" v-model="search" placeholder="Enter your keywords">
                              <span class="input-group-btn">
                                <button class="btn btn-primary" type="button" v-on:click="changedata('search','')"><i class="fa fa-search"></i></button>
                              </span>
                          </div>
                        </div>
                        <div class="widget widget_testimonials">
                          <h3 class="widgettitle">Stories of change</h3>
                            <div class="carousel-wrapper">
                                <div class="row">
                                    <ul class="owl-carousel carousel-fw" id="testimonials-slider" data-columns="1" data-autoplay="5000" data-pagination="no" data-arrows="yes" data-single-item="no" data-items-desktop="1" data-items-desktop-small="1" data-items-tablet="1" data-items-mobile="1">
                                        <li v-for="sdata in storyList" class="item">
                                            <div class="testimonial-block">
                                                <blockquote>
                                                    <p>@{{sdata.description}}</p>
                                                </blockquote>
                                                <div class="testimonial-avatar">
                                                    <img class="imgborder_thumb" :src="'{{BlogStoryImagePath}}'+sdata.id+'/Thumb/'+sdata.image" width="70" height="70" onerror="this.src='{{BlogStoryImagePath}}images/defaulticon.png'"  :alt="'{{BlogStoryImagePath}}'+sdata.id+'/Thumb/'+sdata.image"  alt="">
                                                </div>
                                                <div class="testimonial-info">
                                                    <div class="testimonial-info-in">
                                                        <strong>@{{sdata.name}}</strong>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
              </div>
            </div>
          </div>
      </div>
  </div>
  <div class="clearfix">
    <br><br>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
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
setInterval(function() {
			   $(".site-header").addClass('sticky');
		}, 250);
$(window).scroll(function(){
  var sticky = $('.sticky'),
      scroll = $(window).scrollTop();
      console.log(scroll);

    if (scroll === 0){
         $(".site-header").addClass('sticky');
    }

});


var vm = new Vue({
  el:"#UserVueApp",
  data:{
            users:{ total: 0, per_page: 2, from: 1, to: 0, current_page: 1, data:[] },
            search:'',
            pagechange:8,
            loading:true,
            load:1,
            tagList: {!!json_encode($tagList)!!},
            categoryList: {!!json_encode($categoryList)!!},
            blogList: {!!json_encode($blogList)!!},
            storyList: {!!json_encode($storyList)!!},
            category:'',
            tag:'',
            reqtype:'{{$reqtype}}',
            reqdata:'{{$reqdata}}',
            moment:moment
  },
  watch:{
     // userstatus:function(){
     //     this.getUsers();
     // },
     // txtsearch:function(){
     //     this.getUsers();
     // },

  },

  mounted:function(){
    this.getUsers();
  },
  filters: {
    strippedContent: function(string) {
       return    string.replace(/<\/?[^>]+>/ig, " "); //string.rendered;
    },
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
      redirectDetails:function(data){
          var Newurl ="{{route('blogDetails', 'Rdata')}}";
          Newurl = Newurl.replace('Rdata',data);
          window.location.href=Newurl;
      },
      changedata:function(type,data){
        if(type=='search'){
              this.tag=data;
              this.category=data;
              var Newurl ="{{route('frontblog',['search','Rdata'])}}";
              Newurl = Newurl.replace('Rdata',this.search);
              window.location.href=Newurl;
        }else if (type=='tag'){
              this.tag=data;
              this.category=data;
              var Newurl ="{{route('frontblog',['tag','Rdata'])}}";
              Newurl = Newurl.replace('Rdata',data);
              window.location.href=Newurl;
          }else{
                this.category=data;
                var Newurl ="{{route('frontblog',['category','Rdata'])}}";
                Newurl = Newurl.replace('Rdata',data);
                window.location.href=Newurl;
          }
          this.getUsers();
      },
      getUsers:function(load){
      var self=this;
      $.ajax({
        url:'{{route("ajaxBlogfront")}}',
        type:'post',
        data:{
              _token:'{{csrf_token()}}',
              search:self.search,
              page:self.users.current_page,
              pagenos:self.pagechange,
              category:self.category,
              tag:self.tag,
              reqtype:'{{$reqtype}}',
              reqdata:'{{$reqdata}}'
        },
        beforeSend:function(){
            if(!load)
            self.loading=true;
        }
        ,
        success:function(res){
           // var res = JSON.stringify(res);
           self.users=res;
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
