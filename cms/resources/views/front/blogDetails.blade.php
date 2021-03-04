@extends('front.layouts.main')
@section('content')
@section('appcss')
  <link rel="stylesheet" type="text/css" href="{{env('APP_URL')}}public/front/slider/css/lightslider.css">
  <link rel="stylesheet" type="text/css" href="{{env('APP_URL')}}public/front/css/scroll.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.css" rel="stylesheet">

@stop
@section('headertype')
  {{'sticky'}}
@stop

  <div id="main-container">
    <div class="content" id="UserVueApp" style="padding-top:175px;">

        <div class="container">
          <div class="container">
              <h1 class="block-title">Blog</h1>
              <div class="row">

                <div  v-for='data in blogData '  class="col-md-8 ">
                <h3>@{{data.title}}</h3>
                  <input type="hidden" name="campaign_id" id="campaign_id" :value="data.id">
                  <div class="post-media">
                    <img class="imgborder" :src="'{{BlogImagePath}}'+data.id+'/'+data.image" onerror="this.src='{{FrontAssets}}images/defaulticon.png'"  :alt="'{{BlogImagePath}}'+data.id+'/'+data.image"  >
                  </div>
                  <div v-html="data.description" class="post-content">

                  </div>
                  <div class="tag-cloud">
                      <i class="fa fa-tags"></i>
                      <a v-for="tg in JSON.parse(data.tags)" href="javascript:void(0)">@{{tg.title}}</a>
                  </div>
                  <!-- About Author -->
                  <section class="about-author">
                      <img class="img-thumbnail" style="height:100px;width:100px;" :src="'{{TeamImagePath}}'+data.get_creator.id+'/Thumb/'+data.get_creator.profile_pic" onerror="this.src='{{FrontAssets}}images/defaulticon.png'" alt="'{{TeamImagePath}}'+data.get_creator.id+'/Thumb/'+data.get_creator.profile_pic"  >
                      <div class="post-author-content">
                          <h3>@{{data.get_creator.first_name}} <span class="label label-primary">Author</span></h3>
                          <p>{{BlogOwnerMsg}}</p>
                      </div>
                  </section>
                  <!-- Pagination -->
                  <ul class="pager">
                      <li class="pull-left"><a    href="javascript:void(0)" v-if="prevblog.length>0" title="Previous Blog" v-on:click="redirectDetails(prevblog[0]['slug'])" >&larr;  Prev Post</a></li>
                      <li class="pull-right"><a href="javascript:void(0)" v-if="nextblog.length>0" title="Next Blog" v-on:click="redirectDetails(nextblog[0]['slug'])">  Next Post &rarr;</a></li>
                  </ul>



                  <div class="sharediv">
                      <div class="row">
                          <div class="col-lg-4">
                            <a class="btn   btn-primary whtup text-center " target="_blank"  :href="data | WupLink" data-action="share/whatsapp/share" data-clevent="share" data-cleventname="WhatsApp Share" data-ab="B"><i class="fa fa-whatsapp custom_whatsaapp_icon"></i>&nbsp;&nbsp;Share</a>
                          </div>
                          <div class="col-lg-4">
                             <a class="btn   btn-primary fb text-center " onclick="window.open('https://www.facebook.com/sharer/sharer.php?u=' + encodeURIComponent('https://www.innereyefoundation.org/') + '&t=' + encodeURIComponent('https://www.innereyefoundation.org/')); return false;"  >
                                <i class="fa fa-facebook-square  "></i>&nbsp;&nbsp;Facebook
                            </a>
                          </div>
                          <div class="col-lg-4">
                              <div class="sharethis-inline-share-buttons"></div>
                          </div>
                      </div>
                </div>

              <div class="row" id=" ">
                    <div class="col-lg-12 col-12">
                          <div class="card" style="-webkit-box-shadow: 0 6px 40px 0 rgba(0,0,0,0.1);padding: 10px;">
                              <div class="card-body">
                                <section class="post-comment-form">
                                    <h3><i class="fa fa-share"></i> Post a comment</h3>
                                    <form id="frmComment" name="frmComment" method="post">
                                        <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <input type="text"  required="required"  data-msg="Please enter name"  class="form-control input-lg" name="txtname" id="txtname" placeholder="Your name">
                                                    </div>
                                                </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                  <input type="email" required="required" data-msg="Please enter email"  data-msg-email="Enter Proper Email"  class="form-control input-lg" name="txtemail" id="txtemail" placeholder="Your email">
                                              </div>
                                          </div>
                                      </div>
                                      <div class="row">
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                   <textarea  cols="8" required="required" class="form-control input-lg"   data-msg-maxlength="Enter maximus 1024 Characters"  data-rule-maxlength="1024" data-msg-minlength="Enter Minimum 10 Characters"  data-rule-minlength="10"   id="txtcomment" v-model="txtComment" name="txtcomment" rows="4" placeholder="Add Comment"></textarea>
                                              </div>
                                          </div>
                                      </div>

                                  </form>
                                  <br>
                                  <button type="button" v-on:click="addComment()" class="btn btn-sm btn-primary waves-effect waves-light">Submit your comment</button>

                                </section>
                              </div>
                          </div>
                    </div>
              </div>
              <br>
              <div class="row" v-if="commentList.length>0">
                    <div class="col-lg-12 col-12">
                          <div class="card" style="-webkit-box-shadow: 0 6px 40px 0 rgba(0,0,0,0.1);padding: 10px;">
                              <div class="card-body">
                                <div class="d-flex justify-content-start align-items-center mb-1">
                                    <div class="">
                                          <h3><i class="fa fa-comment-o"></i> @{{commentList.length}} Comments</h3>
                                     </div>
                                     <div class="my-scroll" style="max-height:550px;padding:20px 0px" >
                                       <ol class="comments">
                                           <li v-for="cmt in commentList">
                                                    <div class="post-comment-block">
                                                            <img src="http://placehold.it/100x100&amp;text=IMAGE+PLACEHOLDER" alt="avatar" class="img-thumbnail">
                                                           <div class="post-comment-content">
                                                               <!-- <a href="#" class="btn btn-default btn-xs pull-right">Reply</a> -->
                                                               <h5 v-if="cmt.sender.length>0">@{{cmt.sender}} <span>says</span></h5>
                                                               <h5 v-else> Guest <span>says</span></h5>
                                                               <span class="meta-data">@{{cmt.datetime}}</span>
                                                               <p>@{{cmt.comment}}</p>
                                                           </div>
                                                    </div>
                                           </li>
                                        </ol>
                                        <!-- <div v-for="cmt in commentList" class="" style="display: inline-block;padding-bottom: 10px;width: 100%;">
                                            <div class="col-lg-1" style="padding: 0px;border-radius: 45px;">
                                                    <img style="border-radius:45px;" src="https://i.pinimg.com/originals/24/1d/29/241d2911e57df9b461336dd93b26f026.png" alt="Avatar"  width="100%">
                                            </div>
                                            <div class="col-lg-11">
                                                <div class="user-page-info">
                                                    <b>@{{cmt.sender}}</b>
                                                    <i class="feather icon-clock  pull-right">@{{cmt.datetime}}</i>
                                                    <br>
                                                    <span class="font-small-2">@{{cmt.comment}}</span>
                                                </div>
                                            </div>
                                        </div> -->
                                    </div>

                                </div>
                              </div>
                          </div>
                    </div>
              </div>



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
                                              <span class="meta-data grid-item-meta">Posted on @{{moment(rblog.created_at).format("DD-MM-YYYY h:mm a")}}</span>
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
<!-- end of comment model -->

<div class="modal fade" id="CommentModel" tabindex="-1" role="dialog" data-backdrop="static">
   <div class="modal-dialog" role="document">
     <div class="modal-content">
           <div class="modal-body">
                <div class="row">
                      <div class="col-lg-12" style="/*! font-size: 30px; */text-align: center;">
                                <img id="imgx" src="{{FrontAssets}}images/thank_you_PNG134.png" style="height: 200px;text-align: center;margin: auto; display:block"  >
                                <br>
                                <p style="text-align: left;display:block">
                                    Dear
                                    Your comment submited successfully.

                                    <br>
                                    Sincerely,<br>
                                    iNNER-EYE Foundation
                               </p>


                     </div>
               </div>
           </div>
           <div class="modal-footer text-align-center">
             <button type="button" class="btn btn-primary" data-dismiss="modal">Close now</button>
                <div class="spacer-20"></div>
                <p class="small">Vestibulum quam nisi, pretium a nibh sit amet, consectetur hendrerit mi. Aenean imperdiet lacus sit amet elit porta, et malesuada erat bibendum. Cras sed nunc massa. Quisque tempor dolor sit amet tellus malesuada, malesuada iaculis eros dignissim. Aenean vitae diam id lacus fringilla maximus. Mauris auctor efficitur nisl, non blandit urna fermentum nec. Vestibulum quam nisi, pretium a nibh sit amet, consectetur hendrerit mi.</p>
         </div>

     </div>
   </div>
</div>
<!-- end of comment model -->
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
<script src="{{env('APP_URL')}}public/front/js/jquery.validate.js"></script>

<script src="{{env('APP_URL')}}public/assets/js/vue.paging.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.js"></script>
<script type='text/javascript' src='https://platform-api.sharethis.com/js/sharethis.js#property=5da8017d30109f0012447094&product=inline-share-buttons' async='async'></script>

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
$(window).on("load",function(){
       $(".my-scroll").mCustomScrollbar({theme:"dark-thin",autoHideScrollbar:true,scrollButtons:{enable:true}});
});


setInterval(function() {
			   $(".site-header").addClass('sticky');
		}, 250);
$(window).scroll(function(){
  var sticky = $('.sticky'),
      scroll = $(window).scrollTop();

    if (scroll === 0){
         $(".site-header").addClass('sticky');
    }

});


var vm = new Vue({
  el:"#UserVueApp",
  data:{
            users:{ total: 0, per_page: 2, from: 1, to: 0, current_page: 1, data:[] },
            search:'',
            pagechange:2,
            loading:true,
            load:1,
            tagList: {!!json_encode($tagList)!!},
            categoryList: {!!json_encode($categoryList)!!},
            blogList: {!!json_encode($blogList)!!},
            category:'',
            tag:'',
            blogData:{!!json_encode($blogData)!!},
            storyList:{!!json_encode($storyList)!!},
            nextblog:{!!json_encode($nextblog)!!},
            prevblog:{!!json_encode($prevblog)!!},
            commentList:{!!json_encode($commentList)!!},
            moment:moment,
            txtComment:''

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
    //this.getUsers();
  },
  filters: {
    strippedContent: function(string) {
       return    string.replace(/<\/?[^>]+>/ig, " "); //string.rendered;
    },
    goDetails: function(string) {
       var Newurl ="{{route('campaign_details','MID')}}";
       return  Newurl = Newurl.replace('MID',string);
    },
    WupLink: function(data) {
      var Newurl ="Read iNNER-EYE Blog \n\n"+data.title+" \n\n*Read More* "+window.location.href ;
      var finaltxt =  encodeURIComponent(Newurl);
      return "https://web.whatsapp.com/send?text="+finaltxt;

    },

  },
  methods:{
    addComment:function(load){
      var self=this;
      var isOK = $("#frmComment").valid();
      if(!isOK){
         return false;
      }
      $.ajax({
        url:'{{route("addBlogComment")}}',
        type:'post',
        async:false,
        data:{
              _token:'{{csrf_token()}}',
               txtComment:self.txtComment,
               campaign_id:$("#campaign_id").val(),
               txtemail:$("#txtemail").val(),
               txtname:$("#txtname").val(),
        },
        beforeSend:function(){
            if(!load)
            self.loading=true;
        }
        ,
        success:function(res){
            self.commentList=res.commentList;
            self.txtComment = '';
            $(".my-scroll").mCustomScrollbar({theme:"dark-thin",autoHideScrollbar:true,scrollButtons:{enable:true}});
            $("#CommentModel").modal('show');
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
              tag:self.tag

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
