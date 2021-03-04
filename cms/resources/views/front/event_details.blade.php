@extends('front.layouts.main')
@section('appcss')



<link rel="stylesheet" type="text/css" href="{{env('APP_URL')}}public/front/slider/css/lightslider.css">
<link rel="stylesheet" type="text/css" href="{{env('APP_URL')}}public/front/css/scroll.css">
<link rel="stylesheet" type="text/css" href="{{env('APP_URL')}}public/app-assets/vendors/css/editors/quill/katex.min.css">
<link rel="stylesheet" type="text/css" href="{{env('APP_URL')}}public/app-assets/vendors/css/editors/quill/monokai-sublime.min.css">
<link rel="stylesheet" type="text/css" href="{{env('APP_URL')}}public/app-assets/vendors/css/editors/quill/quill.snow.css">
<link rel="stylesheet" type="text/css" href="{{env('APP_URL')}}public/app-assets/vendors/css/editors/quill/quill.bubble.css">



<link href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.css" rel="stylesheet">
<script type='text/javascript' src='https://platform-api.sharethis.com/js/sharethis.js#property=5da8017d30109f0012447094&product=inline-share-buttons' async='async'></script>
@stop
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

<div class="container" id="UserVueApp" >

<div v-for="(data,ind) in userResult">
@section('meta_title')
@if(isset($meta['meta_title'])){{$meta['meta_title']}}@endif
@endsection
@section('meta_description')
@if(isset($meta['meta_description'])){{$meta['meta_description']}}@endif
@endsection
@section('meta_keywords')
@if(isset($meta['meta_keywords'])){{$meta['meta_keywords']}}@endif
@endsection



<div id="main-container">
    	<div class="content">
        	<div class="container">
            	<div class="row">
                	<div class="col-md-8 content-block">
                        <br><br>
                        <h3 id="maptitle">@{{data.title}}</h3>
                        <input type="hidden" name="event_id" id="event_id" :value="data.id">
                        <input type="hidden" name="lat" id="lat" :value="data.lat">
                        <input type="hidden" name="lng" id="lng" :value="data.lng">
                        <div class="bannerdiv" >
                              <div class="item">
                                  <div class="clearfix" >
                                      <ul id="image-gallery" class="gallery list-unstyled cS-hidden">
                                          <li v-if="data.get_images.length>0  " v-for="(imgdata,index) in data.get_images"  :data-thumb="'{{EventImagePath}}'+imgdata.event_id+'/Thumb/'+imgdata.image" >
                                              <img :src="'{{EventImagePath}}'+imgdata.event_id+'/'+imgdata.image"  onerror="this.src='{{FrontAssets}}images/placeholder_event.jpg'" :alt="'{{CampaignImagePath}}'+imgdata.event_id+'/'+imgdata.image"/>
                                          </li>
                                          <li v-if="data.get_images.length==0">
                                              <img src="{{FrontAssets}}images/placeholder_event.jpg"  onerror="this.src='{{FrontAssets}}images/placeholder_event.jpg'" alt="jjj" />
                                          </li>
                                      </ul>
                                  </div>
                              </div>
                        </div>

                        <div class="row">
                        	<div class="col-md-6 col-sm-6">
                                <span class="event-date">
                                <span class="date">@{{data.startdate}}</span>
                                <span class="month">@{{data.startmonth}}</span>
                                <span class="year">@{{data.startyear}}</span>
                                </span>
                                    <span class="meta-data">@{{data.show_time}}</span>
                        		          <a href="#" data-toggle="modal" data-target="#booknowModal" class="btn btn-primary btn-event-single-book">Book Tickets</a>
                      		</div>
                            <div class="col-md-6 col-sm-6">
                                <ul class="list-group">
                                    <li class="list-group-item">@{{data.seats}}<span class="badge">Attendees</span></li>
                                    <li class="list-group-item"> <span id="maplocation"> @{{data.location}}</span><span class="badge">Location</span></li>
                                </ul>
                            </div>
                        </div>
                        <div class="spacer-20"></div>
                        <!-- <p v-html="data.description"></p> -->
                        <div v-html="data.description" class="post-content">

                        </div>

                        <div id="map" style="width:100%; height:325px;"></div>
                        <div class="clearfix"></div>
                        <br>
                        <div class="tag-cloud" v-if="data.tags!='[]'" >
                               <i class="fa fa-tags"></i>
                               <a  v-if="data.tags" v-for="tg in JSON.parse(data.tags)" href="javascript:void(0)">@{{tg.title}}</a>
                        </div>
                        <!-- About Author -->
                        <section class="about-author">
                            <img class="img-thumbnail" style="height:100px;width:100px;" :src="'{{TeamImagePath}}'+getCreator.id+'/Thumb/'+getCreator.profile_pic" onerror="this.src='{{FrontAssets}}images/defaulticon.png'" alt="'{{TeamImagePath}}'+getCreator.id+'/Thumb/'+getCreator.profile_pic"  >
                            <div class="post-author-content">
                                <h3>@{{getCreator.first_name}} <span class="label label-primary">Author</span></h3>
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
                    </div>

                    <!-- Sidebar -->
                    <div class="col-md-4 sidebar-block">
                        <br><br>
                        <div v-if="eventList.length>0" class="widget widget_recent_causes">

                            <h3 class="widgettitle">Upcoming Events</h3>
                            <div class="widget recent_posts">
                                <ul>
                                    <li v-for="rblog in eventList">
                                        <a v-if="rblog.get_event_images.length>0 && index==0 " v-for="(imgdata,index) in rblog.get_event_images"   :class="{ ' media-box active': index === 0 }" >
                                               <img :src="'{{EventImagePath}}'+imgdata.event_id+'/Thumb/'+imgdata.image" onerror="this.src='{{FrontAssets}}images/placeholder_event.jpg'"  class="imgborder_thumb" :alt="'{{EventImagePath}}'+imgdata.event_id+'/'+imgdata.image">
                                        </a>
                                        <a v-if="rblog.get_event_images.length==0"  class=" media-box active" >
                                               <img   src="{{FrontAssets}}images/placeholder_event.jpg" onerror="this.src='{{FrontAssets}}images/placeholder_event.jpg'"  class="imgborder_thumb" >
                                        </a>
                                        <h5><a  href="javascript:void(0)" v-on:click.prevent="redirectDetails(rblog.slug)" >@{{rblog.title}}</a></h5>
                                        <span class="meta-data grid-item-meta">Posted on @{{moment(rblog.startdatetime).format("DD-MM-YYYY h:mm a") }}</span>
                                    </li>

                                </ul>
                            </div>
                        </div>
                        <div class="widget sidebar-widget widget_categories">
                        	<h3 class="widgettitle">Event</h3>
                            <ul>
                                <li v-for="cat in projectList"><a href="javascript:void(0)" v-on:click="changedata('project',cat.slug)">@{{cat.project_name}}</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row" id=" ">
                    <div class="col-lg-8 col-6">
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
                                                   <textarea  cols="8" required="required" class="form-control input-lg"  data-msg-minlength="Enter Minimum 10 Characters"  data-msg-maxlength="Enter Minimum 500 Characters"  data-rule-minlength="10" data-rule-maxlength="500" id="txtcomment" v-model="txtComment" name="txtcomment" rows="4" placeholder="Add Comment"></textarea>
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
                    <div class="col-lg-8 col-12">
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


            <div class="modal fade" id="booknowModal" tabindex="-1" role="dialog" data-backdrop="static">
              	<div class="modal-dialog modal-lg" role="document">
                	<div class="modal-content" v-for="(data,ind) in userResult">

                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <input type="hidden" name="camp_id" id="camp_id" value="">

                  		  <div class="modal-header" style="padding: 2px 17px;">
                        		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        		<div class="row">
                                  <div class="featured-links row">
                                      <a :href="changebooking('login')" @click="changebooking('login')" class="featured-link col-md-4 col-sm-4">
                                          <strong>Login Now</strong>
                                      </a>
                                      <a :href="changebooking('withoutlogin')"  @click="changebooking('withoutlogin')" class="featured-link col-md-4 col-sm-4">
                                           <strong>Without Login</strong>
                                      </a>
                                      <a :href="changebooking('donation')"  @click="changebooking('donation')" class="featured-link col-md-4 col-sm-4">
                                          <!-- <span>View our events</span> -->
                                          <strong>Donate The Event</strong>
                                      </a>
                                  </div>
                             </div>
                  		  </div>
                  		<div class="modal-body">

                        <div class="row step1">
                          <label class="control-label col-lg-12" for="email">Email:</label>
                           <div class="col-lg-12">
                               <div class="input-group">
                                 <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                 <input id="email" type="text" class="form-control" name="email" placeholder="Email">
                               </div>
                           </div>
                           <div class="col-lg-12">
                               <div class="input-group">
                                 <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                 <input id="password" type="password" class="form-control" name="password" placeholder="Password">
                               </div>
                           </div>
                        </div> <!-- end step 1 -->
                        <div class="row step2"  style="display:none">
                          <div class="col-lg-12">
                            <form class="" name="frmstep2" id="frmstep2" method="post">
                              <input type="hidden" name="event_id"   :value="event_id">
                              <div class="col-md-6 col-sm-6 donation-form-infocol">
                                 <h4>Personal info</h4>
                                     <div class="row">
                                           <div class="col-md-6 col-sm-6 col-xs-6">
                                                 <input type="text" class="form-control" placeholder="First name" name="txtfirstname" id="txtfirstname" required>
                                           </div>
                                           <div class="col-md-6 col-sm-6 col-xs-6">
                                                 <input type="text" class="form-control" placeholder="Last name" name="txtlastname" id="txtlastname" required>
                                           </div>
                                     </div>
                                     <input type="text" class="form-control" placeholder="Email address" name="txtemail" id="txtemail" required>
                                     <input type="text" class="form-control" placeholder="Phone no." name="txtphone" id="txtphone"  data-rule-required="true"  data-rule-digits="true" data-rule-minlength="10" data-rule-maxlength="10" data-msg-minlength="Exactly 10 digit please" data-msg-maxlength="Exactly 10 digit please" placeholder="Phone Number">

                               </div>
                              	<div class="col-md-6 col-sm-6 donation-form-infocol">
                                  	  <h4>Address</h4>
                                      <input type="text" class="form-control" placeholder="Address line 1" required name="txtaddress1" id="txtaddress1">
                                      <input type="text" class="form-control" placeholder="Address line 2" required name="txtaddress2" id="txtaddress2">
                 					            <div class="row">
                                    			 <div class="col-md-8 col-sm-8 col-xs-8">
                                            		<input type="text" class="form-control" placeholder="State/City" required  name="txtstate" id="txtstate">
                                           </div>
                                      		 <div class="col-md-4 col-sm-4 col-xs-4">
                                              		<input type="text" class="form-control" placeholder="Zipcode" required name="txtzipcode" id="txtzipcode">
                                           </div>
                                  	 </div>
                     					      <div class="row">
                              			      <div class="col-md-12 col-sm-12 col-xs-12">
                                              <select class="form-control"  name="txtcountry" id="txtcountry" required>
                                                  <option   value="">Select Country</option>
                                                  <option v-for="con in getCountry" :value="con.name">@{{con.name}}</option>
                                              </select>
                                          </div>
                                  	</div>
                                  </div>
                                  <div class="col-lg-12">
                                    <label>Why you interested to join event?</label>
                                    <textarea name="description" id="description" class="form-control"  rows="2" required cols="80"></textarea>
                                  </div>
                               </div>
                            </form>
                        </div> <!-- end step 2 -->
                        <div class=" step3"  style="display:none">
                          <form class="" name="frmstep3" id="frmstep3" method="post">
                            <!-- <input type="hidden" name="event_id"   :value="event_id"> -->
                       		<div class="row modal-header">
                                  <div class="col-md-6 col-sm-6 donate-amount-option">
                                      <h4>Choose an amount</h4>
                                      <ul class="predefined-amount">
                                          <li><label class="selected">
                                          <input type="radio" name="donation-amount" value="10">$10</label></li>
                                          <li><label><input type="radio" name="donation-amount" value="20">$20</label></li>
                                          <li><label><input type="radio" name="donation-amount" value="30">$30</label></li>
                                          <li><label><input type="radio" name="donation-amount" value="50">$50</label></li>
                                          <li><label><input type="radio" name="donation-amount" value="100">$100</label></li>
                                      </ul>
                                  </div>
                                  <span class="donation-choice-breaker">Or</span>
                                  <div class="col-md-6 col-sm-6 donate-amount-option">
                                      <h4>Enter your own</h4>
                                      <div class="input-group">
                                          <span class="input-group-addon" id="basic-addon1">$</span>
                                          <input type="number" id="selectedAmt" name="selectedAmt" value="10" class="form-control" required>
                                      </div>
                                  </div>
                             	</div>
                        <div class="clearfix">
                        </div>
                        <br>
                        <div class="col-lg-12">
                            	<div class="col-md-6 col-sm-6 donation-form-infocol">
                                	<h4>Address</h4>
                                    <input type="text" class="form-control" placeholder="Address line 1" name="txtaddress1" id="txtaddress1">
                                    <input type="text" class="form-control" placeholder="Address line 2" name="txtaddress2" id="txtaddress2">
                   					<div class="row">
                            			<div class="col-md-8 col-sm-8 col-xs-8">
                                    		<input type="text" class="form-control" placeholder="State/City"  name="txtstate" id="txtstate">
                                        </div>
                            			<div class="col-md-4 col-sm-4 col-xs-4">
                                    		<input type="text" class="form-control" placeholder="Zipcode" name="txtzipcode" id="txtzipcode">
                                        </div>
                                	</div>
                   					      <div class="row">
                                			<div class="col-md-12 col-sm-9 col-xs-9">
                                                <select class="selectpicker" name="txtcountry" id="txtcountry">
                                                  <option   value="">Select Country</option>
                                                  <option v-for="con in getCountry" :value="con.name">@{{con.name}}</option>
                                                </select>
                                       </div>
                                	</div>
                                </div>
                            	<div class="col-md-6 col-sm-6 donation-form-infocol">
                                	<h4>Personal info</h4>
                   					          <div class="row">
                            			<div class="col-md-6 col-sm-6 col-xs-6">
                                    		<input type="text" class="form-control" placeholder="First name" name="txtfirstname" id="txtfirstname" required>
                                        </div>
                            			<div class="col-md-6 col-sm-6 col-xs-6">
                                    		<input type="text" class="form-control" placeholder="Last name" name="txtlastname" id="txtlastname" required>
                                        </div>
                                	</div>
                                    <input type="text" class="form-control" placeholder="Email address" name="txtemail" id="txtemail" required>
                                    <input type="text" class="form-control" placeholder="Phone no." name="txtphone" id="txtphone" data-rule-required="true"  data-rule-digits="true" data-rule-minlength="10"   data-rule-maxlength="10" data-msg-minlength="Exactly 10 digit please" data-msg-maxlength="Exactly 10 digit please" placeholder="Phone Number">
                                    <label class="checkbox" ><input type="checkbox"  id="isRegistered" name="isRegistered" value="1"> Register me on this website</label>
                                </div>
                             </div>
                             <input type="hidden" name="razorpay_payment_id"  id="razorpay_payment_id" value="">

                           </form>
                        </div> <!-- end step 3 -->
                  		</div>
                      <div class="clearfix"></div> <br>
                      <div class="modal-footer text-align-center">
                          <div class="step1">
                              <button type="button" @click="submitform('frmstep1')" class="btn btn-primary  ">Login Now</button>
                              <div class="spacer-20"></div>
                              <p class="small">Vestibulum quam nisi, pretium a nibh sit amet, consectetur hendrerit mi. Aenean imperdiet lacus sit amet elit porta, et malesuada erat bibendum. Cras sed nunc massa. Quisque tempor dolor sit amet tellus malesuada, malesuada iaculis eros dignissim. Aenean vitae diam id lacus fringilla maximus. Mauris auctor efficitur nisl, non blandit urna fermentum nec. Vestibulum quam nisi, pretium a nibh sit amet, consectetur hendrerit mi.
                              </p>
                          </div>
                          <div class="step2" style="display:none">
                              <button type="button" class="btn btn-primary  "  @click="submitform('frmstep2')">Book Now</button>
                              <div class="spacer-20"></div>
                              <p class="small">Vestibulum quam nisi, pretium a nibh sit amet, consectetur hendrerit mi. Aenean imperdiet lacus sit amet elit porta, et malesuada erat bibendum. Cras sed nunc massa. Quisque tempor dolor sit amet tellus malesuada, malesuada iaculis eros dignissim. Aenean vitae diam id lacus fringilla maximus. Mauris auctor efficitur nisl, non blandit urna fermentum nec. Vestibulum quam nisi, pretium a nibh sit amet, consectetur hendrerit mi.
                              </p>
                          </div>
                          <div class="step3" style="display:none">

                            <input type="hidden" value="Hidden Element" name="hidden">
                            <button type="button" class="btn btn-primary openrozarform">Make your donation now</button>
                                <div class="spacer-20"></div>
                                <p class="small">Vestibulum quam nisi, pretium a nibh sit amet, consectetur hendrerit mi. Aenean imperdiet lacus sit amet elit porta, et malesuada erat bibendum. Cras sed nunc massa. Quisque tempor dolor sit amet tellus malesuada, malesuada iaculis eros dignissim. Aenean vitae diam id lacus fringilla maximus. Mauris auctor efficitur nisl, non blandit urna fermentum nec. Vestibulum quam nisi, pretium a nibh sit amet, consectetur hendrerit mi.</p>
                          </div>
                  		</div>

                	</div>
              	</div>
            </div>
</div> <!-- end of vue scope -->
<div class="modal fade" id="CommentModel" tabindex="-1" role="dialog" data-backdrop="static">
   <div class="modal-dialog" role="document">
     <div class="modal-content">
           <div class="modal-body">
                <div class="row">
                      <div class="col-lg-12" style="/*! font-size: 30px; */text-align: center;">
                                <img id="imgx" src="https://pngimg.com/uploads/thank_you/thank_you_PNG134.png" style="height: 200px;text-align: center;margin: auto; display:block"  >
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


<div class="modal fade" id="ResponseModel" tabindex="-1" role="dialog" data-backdrop="static">
  	<div class="modal-dialog" role="document">
    	<div class="modal-content">
        		<div class="modal-body">
         			 <div class="row">
                      <div class="col-lg-12" style="/*! font-size: 30px; */text-align: center;">
                                <img id="img1" src="https://pngimg.com/uploads/thank_you/thank_you_PNG134.png" style="height: 200px;text-align: center;margin: auto; display:none"  >
                                <img id="img2" src="https://pranaam.csia.in/images/process-steps-icons/step-5.png" style="height: 200px;text-align: center;margin: auto;display:block"  >


                                <br>
                                <p id="detail1" style="text-align: left;display:none">
                                    Dear <b id="UserName"></b>, <br>
                                    Thank you for your generous donation. We are thrilled to have your support. Through your donation we have been able to accomplish [goal] and continue working towards [purpose of organization]. You truly make the difference for us, and we are extremely grateful!
                                    Today your donation is going toward beneficiary. If you have specific questions about how your gift is being used or our organization as whole, please don’t hesitate to contact Us.
                                    <br>
                                    Sincerely,<br>
                                    iNNER-EYE Foundation
                               </p>

                               <p  id="detail2" style="text-align: left;display:block">
                                    Sorry your donnation not completed due to <b id="errrorMsg"></b>. Please try again or after some time.
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
<script src="{{env('APP_URL')}}public/front/slider/js/lightslider.js"></script>
<script src="{{env('APP_URL')}}public/front/js/jquery.validate.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>


<script src="{{env('APP_URL')}}public/app-assets/vendors/js/editors/quill/katex.min.js"></script>
<script src="{{env('APP_URL')}}public/app-assets/vendors/js/editors/quill/highlight.min.js"></script>
<script src="{{env('APP_URL')}}public/app-assets/vendors/js/editors/quill/quill.min.js"></script>

<script
    src="https://checkout.razorpay.com/v1/checkout.js"
    data-key="rzp_test_C4zVWabhIxd3SQ"
    data-amount="10000"
    data-buttontext="Buy Plan"
    data-name="iNNER-EYE"
    data-description="This is test payment for iNNER-EYE"
    data-image="https://upload.wikimedia.org/wikipedia/commons/thumb/5/5f/OOjs_UI_icon_italic-d-progressive.svg/200px-OOjs_UI_icon_italic-d-progressive.svg.png"
    data-prefill.name=""
    data-prefill.email=""
    data-theme.color="#F37254"
></script>
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
            txtComment:'',
            commentList:{!!json_encode($commentList)!!},
            userResult: {!!json_encode($userResult)!!},
            getCreator: {!!json_encode($getCreator)!!},
            prevblog: {!!json_encode($prevblog)!!},
            nextblog: {!!json_encode($nextblog)!!},
            projectList: {!!json_encode($projectList)!!},
            eventList: {!!json_encode($eventList)!!},
            getCountry: {!!json_encode(getCountry())!!},
            event_id: '{{$currentID}}',

            moment:moment

  },
  watch:{
     // userstatus:function(){
     //     this.getUsers();
     // },
     txtComment:function(){
       // if(this.txtComment.length>=10){
       //    $("#txterror").addClass('hidden');
       // }
     },

  },
  filters: {
    WupLink: function(data) {
        var Newurl ="iNNER-EYE Event\n\n"+data.title+" \n\n"+data.sub_title+" \n\n*Read More* "+window.location.href ;
        var finaltxt =  encodeURI(Newurl);
        return "https://web.whatsapp.com/send?text="+finaltxt;
    },
  },
  methods:{

    submitform:function(type){
          console.log(type);
          var valid = $("#"+type).valid();

         if(valid)
         {    var myurl = "";
              if(type=='frmstep1'){
                  var myurl = '{{route("addPayment")}}';
              }else if (type=='frmstep2') {
                  var myurl = '{{route("bookSeat")}}';
              }else if (type=="frmstep3") {
                  var myurl = '{{route("addPayment")}}';
                  paynow();
                  $(".razorpay-payment-button").trigger('click');
              }

              jQuery.ajax({
                        url:myurl,
                        type:'post',
                        data: $('#'+type).serialize(),
                        headers: {
                           'X-CSRF-TOKEN': "{{csrf_token()}}"
                        },
                        beforeSend:function(){

                            self.loading=true;
                        },
                        success:function(res){
                             if(res.status){
                                 alert(res.message);
                                 if (type=='frmstep2'){
                                   $("#booknowModal").modal('hide');
                                   $('#'+type)[0].reset();
                                 }
                             }else{
                                 alert(res.message+' Error!');
                             }
                         },
                         error:function(res){
                           alert(res.message+' Error!');
                         },
                          complete:function(){

                              self.loading=false;
                          }
                });
         }
    },
    changebooking:function(type){

      $(".step1").hide();
      $(".step2").hide();
      $(".step3").hide();
      if(type=='login'){
        $(".step1").show();
      }else if (type=='withoutlogin') {
        $(".step2").show();
      }else if (type=="donation") {
        $(".step3").show();
      }else{

      }
    },
    changedata:function(type,data){

        if(type=='project'){
              var Newurl ="{{route('eventListing',['Rdata'])}}";
              Newurl = Newurl.replace('Rdata',data);
              window.location.href=Newurl;
        }else if (type=='tag'){

          }else{

          }
          this.getUsers();
      },
      redirectDetails:function(data){
          var Newurl ="{{route('event_details', 'Rdata')}}";
          Newurl = Newurl.replace('Rdata',data);
          window.location.href=Newurl;
      },
      sendContact:function(load){

      var self=this;

      var isOK = $("#frmContact").valid();

      if(!isOK){
         return false;
      }
      // $("#txterror").addClass('hidden');
      // if(self.txtComment.length<=10){
      //    $("#txterror").removeClass('hidden');
      //    return false;
      // }
      $.ajax({
        url:'{{route("addContact")}}',
        type:'post',
        data:{
              _token:'{{csrf_token()}}',
               txtComment:$("#frmContact #txtcomment").val(),
               campaign_id:$("#campaign_id").val(),
               txtemail:$("#frmContact #txtemail").val(),
               txtname:$("#frmContact #txtname").val(),
        },
        beforeSend:function(){
            if(!load)
            self.loading=true;
        }
        ,
        success:function(res){
              self.commentList=res.commentList;
              self.txtComment = '';
              $("#ContactModal").modal('hide');
              alert("Message sent successfully");
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
      addComment:function(load){
      var self=this;

      var isOK = $("#frmComment").valid();
      if(!isOK){
         return false;
      }

      $.ajax({
        url:'{{route("addEventComment")}}',
        type:'post',
        data:{
              _token:'{{csrf_token()}}',
               txtComment:self.txtComment,

               event_id:$("#event_id").val(),
               txtemail:$("#txtemail").val(),
               txtname:$("#txtname").val(),
        },
        beforeSend:function(){
            if(!load)
            self.loading=true;
        },
        success:function(res){
             self.commentList=res.commentList;
             self.txtComment = '';
             $("#CommentModel").modal('show');
             $(".my-scroll").mCustomScrollbar({theme:"dark-thin",autoHideScrollbar:true,scrollButtons:{enable:true}});
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


function submitdata() {
            var addBusOwnerForm= $('#frmstep3')[0];
            var formData = new FormData(addBusOwnerForm);
            $.ajax({
                type:'POST',
                url: '{{route("saveDonation")}}',
                data:formData,
                headers: {
                              'X-CSRF-TOKEN': "{{csrf_token()}}"
                },
                cache:false,
                contentType: false,
                processData: false,
                success:function(response){
                   console.log(response);
                   if (response.status == false) {
                        $("#frmstep3 #UserName").html($("#frmstep3 #txtfirstname").val());
                        $("#frmstep3 #errrorMsg").html(response.message);
                        $("#detail2").show();
                        $("#img2").show();
                        $("#detail1").hide();
                        $("#img1").hide();
                        $("#ResponseModel").modal('hide');
                        $("#booknowModal").modal('show');

                    } else {
                        $("#frmstep3 #UserName").html($("#frmstep3 #txtfirstname").val());
                        $("#frmstep3 #errrorMsg").html(response.message);
                        $("#detail1").show();
                        $("#img1").show();
                        $("#detail2").hide();
                        $("#frmstep3 #img2").hide();
                        $("#ResponseModel").modal('show');
                        $("#booknowModal").modal('hide');
                        $("#frmstep3")[0].reset();
                    }
                },
                error: function(response){
                    $("#frmstep3 #UserName").html($("#frmstep3 #txtfirstname").val());
                    $("#frmstep3 #errrorMsg").html(response.message);
                    $("#frmstep3 #detail2").show();
                    $("#frmstep3 #img2").show();
                    $("#frmstep3 #detail1").hide();
                    $("#frmstep3 #img1").hide();
                    $("#ResponseModel").modal('hide');
                    $("#booknowModal").modal('show');
                }
            });
}
</script>
<script>
    $(document).ready(function() {

        $('#image-gallery').lightSlider({
            gallery: true,
            item: 1,
            thumbItem: 9,
            slideMargin: 0,
            speed: 1500,
            auto: false,
            loop: true,
            onSliderLoad: function() {
                $('#image-gallery').removeClass('cS-hidden');
            }
        });
    });



    $(".otherclick").on('click',function(){
        $(".sharediv").show();
    });
    $(window).on("load",function(){
           $(".my-scroll").mCustomScrollbar({theme:"dark-thin",autoHideScrollbar:true,scrollButtons:{enable:true}});
    });

    (function () {
    function init(html) {
        // var quill = new Quill('#editor-container', {});
        // quill.enable(false);

        // var delta = quill.clipboard.convert(html);
        // quill.setContents(delta, 'silent');
    }

    var html =  $("#heredata").text();

    init(html);
})();

</script>

<script type="text/javascript">


$(document).ready(function() {
$(document).on('click',".predefined-amount label",function(){
      $("#selectedAmt").val($(".predefined-amount .selected input[name='donation-amount']").val());
});
  function paynow(){

var  premium =  $("#selectedAmt"). val();
premium =    ((parseFloat(premium)*100).toFixed(0));
var options = {
    "key": "rzp_test_C4zVWabhIxd3SQ",
    "amount": premium, /// The amount is shown in currency subunits. Actual amount is ₹599.
    "name": "iNNER-EYE",
//    "currency": "",
    "description": "Donate to iNNER-EYE Foundation",
    "image": "{{env('APP_URL')}}public/assets/images/fav.jpg",
    "handler":function (response){
         $("#razorpay_payment_id").val(response.razorpay_payment_id);
         submitdata();
    },
    "prefill": {
        "name": $("#txtfirstname").val()+' '+$("#txtlastname").val(),
        "email": $("#txtemail").val(),
        "contact": $("#txtphone").val()
    },
    "notes": {
        "address": "Hello World"
    },
    "theme": {
        "color": "#42b8d4"
    }
};
  var rzp1 = new Razorpay(options);
  rzp1.open();

}
  //$razorpay-payment-button()

  $('.razorpay-payment-button').hide();

  $(".openrozarform").click(function() {
    var valid = $("#frmstep3").valid();
    if(valid)
    {
         paynow();
         $(".razorpay-payment-button").trigger('click');
    }
  });

});
var lng =  0;
var lat =  0;
function initMap() {
  var title =  $("#maptitle").html();
  var maplocation =  $("#maplocation").html();
  var lng = parseFloat($("#lng").val());
  var lat = parseFloat($("#lat").val());


  var contentString = '<div id="content">'+
      '<div id="siteNotice">'+
      '</div>'+
      '<h3 id="firstHeading" class="firstHeading">'+title+'</h3>'+
      '<div id="bodyContent">'+
      '<p><b>Event location :</b> '+maplocation+
      '</div>'+
      '</div>';

        var infowindow = new google.maps.InfoWindow({
          content: contentString
        });
        var myLatLng = {lat: lat, lng: lng};

        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 4,
          center: myLatLng
        });
        var img_marker = '{{Assets}}images/marker.png';
        console.log(img_marker);
        var marker = new google.maps.Marker({
          position: myLatLng,
          icon:  img_marker,
          map: map,
          title: 'Hello World!'
        });

        marker.addListener('click', function() {
          infowindow.open(map, marker);
        });
         infowindow.open(map, marker);
      }

</script>

 <script async defer
     src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB9LpeqTEBlQPhGSmgl_G5i4-sWWBEr60E&callback=initMap">
     </script>
@stop
