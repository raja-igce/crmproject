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
        <div class="campaign-header row text-center">
            <h2>@{{data.title}}</h2>
            <input type="hidden" name="campaign_id" id="campaign_id" :value="data.id">
            <!-- <p>
              <span id="campLocation" class="badge">Personal</span>
                  <span id="campCause" class="badge">Medical</span>
            </p> -->
        </div>

        <div class="row">
            <div class="col-lg-8">
                <div class="bannerdiv" >
                      <div class="item">
                          <div class="clearfix" >
                              <ul id="image-gallery" class="gallery list-unstyled cS-hidden">
                                  <li v-if="data.get_images.length>0  " v-for="(imgdata,index) in data.get_images" :data-thumb="'{{CampaignImagePath}}'+imgdata.campaign_id+'/'+imgdata.image" >
                                      <img :src="'{{CampaignImagePath}}'+imgdata.campaign_id+'/'+imgdata.image"  onerror="this.src='{{FrontAssets}}images/placeholderCampaign.jpeg'" :alt="'{{CampaignImagePath}}'+imgdata.campaign_id+'/'+imgdata.image"/>
                                  </li>
                              </ul>
                          </div>
                      </div>
                </div>
                <div class="bannerdiv">
                    <p>
                      @{{data.subtitle}}
                    </p>
                    <div class="row">
                        <div class="col-lg-6">
                        </div>
                        <div class="col-lg-6">
                              <a href="#" class="btn btn-primary btn-block" data-toggle="modal" data-target="#DonateModal">Donate Now</a>
                        </div>
                    </div>
                </div>
                <div class="boxshadow" style="background: #fff;-webkit-box-shadow: 0 6px 40px 0 rgba(0,0,0,0.1);">
                <ul class="nav nav-tabs">
                    <li class="active"> <a data-toggle="tab" class="otherclick" href="#stepA"><i class="fa fa-globe"></i>  About</a> </li>
                    <li> <a data-toggle="tab" class="otherclick" href="#stepD"><i class="fa fa-globe"></i>  Story</a> </li>
                    <li> <a data-toggle="tab" href="#stepB"  class="otherclick"><i class="fa fa-files-o"></i>  Documents</a></li>
                    <li> <a data-toggle="tab" href="#stepC"  class="otherclick"><i class="fa fa-clock-o"></i>  Updateds</a></li>
                 </ul>
                  <textarea name="name" id="heredata" class="hidden" rows="8" cols="80">@{{data.description}}</textarea>
            <div class="tab-content">
                    <div id="stepA" class="tab-pane active ql-snow "  >
                      <div id="editor-container" class="editor ql-container ql-snow" style="border:none"></div>

                     </div>
                     <div id="stepD" class="tab-pane active ql-snow ">
                          @{{data.story}}
                     </div>
                    <div id="stepB" class="tab-pane"> <!-- Documents -->
                          <div v-if="data.get_docs.length>0  " v-for="(imgdata,index) in data.get_docs"   >
                              <img :src="'{{CampaignImagePath}}'+imgdata.campaign_id+'/'+imgdata.image" />
                              <br><br>
                          </div>
                          <div v-if="data.get_docs.length==0">
                              No Document uploaded
                          </div>
                    </div>
                    <div id="stepC" class="tab-pane  "> <!-- Updates -->

                    </div>
                </div>

                </div>
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
                        <!-- AddToAny BEGIN -->
                        <!-- <div class="a2a_kit a2a_kit_size_32 a2a_default_style">
                        <a class="a2a_dd" href="https://www.addtoany.com/share"></a>
                        <a class="a2a_button_facebook"></a>
                        <a class="a2a_button_twitter"></a>
                        <a class="a2a_button_email"></a>
                        <a class="a2a_button_linkedin"></a>
                        <a class="a2a_button_whatsapp"></a>
                        <a class="a2a_button_telegram"></a>
                        </div>
                        <script async src="https://static.addtoany.com/menu/page.js"></script> -->
                        <!-- AddToAny END -->                      </div>
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
                                                   <textarea  cols="8" required="required" class="form-control input-lg"  data-msg-maxlength="Enter Minimum 10 Characters"  data-rule-minlength="10" id="txtcomment" v-model="txtComment" name="txtcomment" rows="4" placeholder="Add Comment"></textarea>
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
            <div class="col-lg-4">
                <div style="padding:20px;10px">
                    <a href="#" class="btn btn-primary btn-block" data-toggle="modal" data-target="#DonateModal">Donate Now</a>
                    <br>
                    <a href="https://securegw.paytm.in/link/83252/LL_4180899" target="_blank" rel="im-checkout" data-behaviour="remote" data-style="light" data-text="Donate with Paytm" style="width: 100%; text-align: center;border-radius: 2px;display: inline-block;border: 1px solid #d2d2d2 !important;padding: 0 40px;color: #182233;font-size: 14px;text-decoration: none;font-family: 'Nunito Sans', sans-serif;height: 48px;line-height: 48px;background: #f6f8fc;border: 1px solid #f6f8fc;color: #182233;">
                          <span>Donate  with</span>
                          <img style="margin-left: 6px;vertical-align:sub;width: 62px;" src="https://static1.paytm.in/1.4/plogo/paytmlogo-coloured.png">
                    </a>
                    <!-- <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{url()->full()}}" class="btn btn-primary btnfbsharecolor btn-block"  >
                      <i class="fa fa-facebook-square "></i> Share Story
                    </a> -->
                    <div class="priceDetail">
                        ₹ @{{data.collect_amount}}
                    </div>
                    <span class="priceDetailtitle">Raised of <b>@{{data.amount}}</b> goal</span>

                    <div class="clearfix">
                      <div class="progress">
                        <div class="progress-bar progressColor" role="progressbar" :style="'width:'+data.collect_percentage+'%;'" :aria-valuenow="data.collect_percentage" aria-valuemin="0" aria-valuemax="100">@{{data.collect_percentage}}%</div>
                      </div>
                    </div>
                    <div class="clearfix">
                    			<div class="col-xs-6 amount-raised backers ">
                          				<h2 class="kt-campaign-backers backers-count-in-summary">@{{data.contributor}}</h2>
                          				<p class="kt-campaign-backers">supporters</p>
                    			</div>
                           <div class="col-xs-6 amount-raised">
                                  <h2 class="kt-campaign-backers">@{{data.daysleft}}</h2>
                                  <p class="kt-campaign-backers">days left</p>
                           </div>
                    </div>
                    <div class="cardNew">
                        <div class="card-body">
                            <div class="widget recent_posts">

                                <ul>

                                    <li>
                                        <a href="javascript:void(0)" data-toggle="modal" data-target="#ContactModal"> <i class="fa fa-envelope pull-right"> Contact</i>  </a>
                                        <div class="clearfix"></div>
                                        <a href="javascript:void(0)" class="media-box">
                                            <img :src="'{{TeamImagePath}}'+data.creator.user_id+'/Thumb/'+data.creator.profile_pic" onerror="this.src='{{FrontAssets}}images/defaulticon.png'" alt="">
                                        </a>

                                        <h5><a href="javascript:void(0)" id="campname">@{{data.creator.first_name}}</a> </h5>
                                        <span class="meta-data grid-item-meta">Campaigner</span>
                                        <h5><a href="javascript:void(0)"> <i class="fa fa-map-marker "></i> @{{data.creator.state}}</a></h5>
                                    </li>
                                    <li v-for="team in  data.get_team">
                                        <a href="javascript:void(0)" class="media-box">
                                            <img :src="'{{TeamImagePath}}'+team.user_id+'/Thumb/'+team.profile_pic" onerror="this.src='{{FrontAssets}}images/defaulticon.png'" alt="">
                                        </a>
                                        <h5><a href="javascript:void(0)">@{{team.get_team_memeber.first_name}}</a></h5>
                                        <span class="meta-data grid-item-meta">Team Member</span>
                                        <h5><a href="javascript:void(0)"> <i class="fa fa-map-marker "></i> @{{team.get_team_memeber.state}}</a></h5>
                                    </li>
                                    <li>
                                        <a href="single-post.html" class="media-box">
                                            <img src="http://placehold.it/600x400&amp;text=IMAGE+PLACEHOLDER" alt="">
                                        </a>
                                        <h5><a href="">Beneficiary </a></h5>
                                        <span class="meta-data grid-item-meta">None dummy text</span>
                                        <h5><a href=""> <i class="fa fa-map-marker "></i> None</a></h5>
                                    </li>
                                </ul>
                            </div>
                        </div>
                     </div>
                     <br><br>
                     <div class="cardNew">
                         <div class="card-body">
                             <div class="widget recent_posts">
                                <p class="top-donors">
                                  <i class="fa fa-trophy custom-trophy"></i>
                                  <strong>Top Donors</strong>
                                </p>

                                 <ul>
                                    <li v-if="data.get_campaign_collection.length>0" v-for="donar in  data.get_campaign_collection">
                                        <a href="javascript:void(0)" class="media-box">
                                            <img src="http://placehold.it/600x400&amp;text=IMAGE+PLACEHOLDER" alt="">
                                        </a>
                                        <h5>@{{donar.txtfirstname+' '+donar.txtlastname}}</h5>
                                        <h5 class="top-donors-price"> ₹ @{{donar.amount}}</h5>
                                    </li>
                                    <li  v-if="data.get_campaign_collection.length<=0">
                                        Looking for Donar
                                    </li>
                                 </ul>
                             </div>
                         </div>
                      </div>
                </div>
                    </div>

            </div>

        <div class="modal fade" id="ContactModal" tabindex="-1" role="dialog" data-backdrop="static">
           <div class="modal-dialog" role="document">
             <div class="modal-content">
                <div class="modal-header">
                   <button type="button" class="close" data-dismiss="modal">&times;</button>
                   <h4 class="modal-title">Contact @{{data.creator.first_name}}</h4>
                 </div>
                   <div class="modal-body">
                      <p>Your message will be directly emailed to @{{data.creator.first_name}} and you will receives his/her response on the email address listed on iNNER-EYE Foundation. </p>
                           <form id="frmContact" name="frmContact" method="post">
                               <div class="row">
                                       <div class="col-md-12 col-sm-12">
                                           <div class="form-group">
                                               <label for="">Name</label>
                                               <input type="text"  required="required"  data-msg="Please enter name"  class="form-control input-lg" name="txtname" id="txtname" placeholder="Your name">
                                           </div>
                                       </div>
                               </div>
                               <div class="row">
                                   <div class="form-group">
                                       <div class="col-md-12">
                                         <label for="">Email</label>
                                         <input type="email" required="required" data-msg="Please enter email"  data-msg-email="Enter Proper Email"  class="form-control input-lg" name="txtemail" id="txtemail" placeholder="Your email">
                                     </div>
                                 </div>
                             </div>
                             <div class="row">
                                   <div class="form-group">
                                       <div class="col-md-12">
                                         <label for="">Message</label>
                                          <textarea  cols="8" required="required" class="form-control input-lg"  data-msg-maxlength="Enter Minimum 10 Characters"  data-rule-minlength="10" id="txtcomment"  name="txtcomment" rows="4" placeholder="Add Comment"></textarea>
                                     </div>
                                 </div>
                             </div>
                         </form>
                         <br>

                   </div>
                   <div class="modal-footer">
                     <button type="button" v-on:click="sendContact()" class="btn btn-sm btn-primary waves-effect waves-light pull-left">Sent Message</button>
                     <button type="button" class="btn btn-danger pull-right" data-dismiss="modal">Close now</button>
                        <div class="spacer-20"></div>
                  </div>

             </div>
           </div>
        </div>
      </div>
</div>


  <div class="clearfix">

  </div>

  <!-- Main Content -->

@stop
@section('frontjs')
<div class="modal fade" id="DonateModal" tabindex="-1" role="dialog" data-backdrop="static">
  	<div class="modal-dialog" role="document">
    	<div class="modal-content" v-for="(data,ind) in userResult">
          <form class="" name="payment_form" id="payment_form" action="#" onsubmit="return false" method="post">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <input type="hidden" name="camp_id" id="camp_id" value="">

      		  <div class="modal-header">
        		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        		<div class="row">
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
      		</div>
      		<div class="modal-body">
       			<div class="row">
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
                			<div class="col-md-3 col-sm-3 col-xs-3">
                        		<label>Country</label>
                            </div>
                			<div class="col-md-9 col-sm-9 col-xs-9">
                                <select class="selectpicker" name="txtcountry" id="txtcountry">
                                    <option>United States</option>
                                    <option>Australia</option>
                                    <option>Netherlands</option>
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
                        <input type="text" class="form-control" placeholder="Phone no." name="txtphone" id="txtphone"  data-rule-digits="true" data-rule-minlength="10" data-rule-maxlength="10" data-msg-minlength="Exactly 10 digit please" data-msg-maxlength="Exactly 10 digit please" placeholder="Phone Number">
                        <label class="checkbox" ><input type="checkbox"  id="isRegistered" name="isRegistered" value="1"> Register me on this website</label>
                    </div>
                 </div>
      		</div>
          <input type="hidden" name="razorpay_payment_id"  id="razorpay_payment_id" value="">
      		<div class="modal-footer text-align-center">
            <script
                src="https://checkout.razorpay.com/v1/checkout.js"
                data-key="rzp_test_C4zVWabhIxd3SQ"
                data-amount="10000"
                data-buttontext="Buy Plan"
                data-name="iNNER-EYE"
                data-description="This is test payment for iNNER-EYE"
                data-image="https://upload.wikimedia.org/wikipedia/commons/thumb/5/5f/OOjs_UI_icon_italic-d-progressive.svg/200px-OOjs_UI_icon_italic-d-progressive.svg.png"
                data-prefill.name="Manoj"
                data-prefill.email="manoj@gmail.com"
                data-theme.color="#F37254"
            ></script>
            <input type="hidden" value="Hidden Element" name="hidden">
        		<button type="button" class="btn btn-primary openrozarform">Make your donation now</button>
                <div class="spacer-20"></div>
                <p class="small">Vestibulum quam nisi, pretium a nibh sit amet, consectetur hendrerit mi. Aenean imperdiet lacus sit amet elit porta, et malesuada erat bibendum. Cras sed nunc massa. Quisque tempor dolor sit amet tellus malesuada, malesuada iaculis eros dignissim. Aenean vitae diam id lacus fringilla maximus. Mauris auctor efficitur nisl, non blandit urna fermentum nec. Vestibulum quam nisi, pretium a nibh sit amet, consectetur hendrerit mi.</p>
      		</div>
          </form>
    	</div>
  	</div>
</div>



<div class="modal fade" id="ResponseModel" tabindex="-1" role="dialog" data-backdrop="static">
  	<div class="modal-dialog" role="document">
    	<div class="modal-content">
        		<div class="modal-body">
         			 <div class="row">
                      <div class="col-lg-12" style="/*! font-size: 30px; */text-align: center;">
                                <img id="img1" src="{{FrontAssets}}images/thank_you_PNG134.png" style="height: 200px;text-align: center;margin: auto; display:none"  >
                                <img id="img2" src="{{FrontAssets}}images/step-5.png" style="height: 200px;text-align: center;margin: auto;display:block"  >


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


<!-- End ResponseModel  -->

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


<script src="{{env('APP_URL')}}public/app-assets/vendors/js/editors/quill/katex.min.js"></script>
<script src="{{env('APP_URL')}}public/app-assets/vendors/js/editors/quill/highlight.min.js"></script>
<script src="{{env('APP_URL')}}public/app-assets/vendors/js/editors/quill/quill.min.js"></script>

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
         console.log(response);
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
    var valid = $("#payment_form").valid();
    if(valid)
    {
         paynow();
         $(".razorpay-payment-button").trigger('click');
    }
  });

});
</script>
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
        var Newurl ="iNNER-EYE Campaign\n\n"+data.title+" \n\n"+data.subtitle+" \n\n*Read More* "+window.location.href ;
        var finaltxt =  encodeURI(Newurl);
        return "https://web.whatsapp.com/send?text="+finaltxt;
    },
  },
  methods:{

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
        url:'{{route("addComment")}}',
        type:'post',
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
            var addBusOwnerForm= $('#payment_form')[0];
            $("#camp_id").val($("#campaign_id").val());
            var formData = new FormData(addBusOwnerForm);
            $.ajax({
                type:'POST',
                url: '{{route("saveDonation")}}',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                success:function(response){
                   console.log(response);
                   if (response.status == false) {
                        // toastr.error(response.message);
                        // that.text('Save');
                        // that.attr('disabled',false);
                        $("#UserName").html($("#txtfirstname").val());
                        $("#errrorMsg").html(response.message);
                        $("#detail2").show();
                        $("#img2").show();
                        $("#detail1").hide();
                        $("#img1").hide();
                        $("#ResponseModel").modal('hide');
                        $("#DonateModal").modal('show');
                    } else {
                        $("#UserName").html($("#txtfirstname").val());
                        vm.userResult = response.userResult;
                        $("#errrorMsg").html(response.message);
                        $("#detail1").show();
                        $("#img1").show();
                        $("#detail2").hide();
                        $("#img2").hide();
                        $("#ResponseModel").modal('show');
                        $("#DonateModal").modal('hide');
                        // toastr.success(response.message);
                        // setTimeout(function() {
                        // that.text('Save');
                        // that.attr('disabled',false);
                        //
                        // }, 2000);
                    }
                },
                error: function(response){
                    $("#UserName").html($("#txtfirstname").val());
                    $("#errrorMsg").html(response.message);
                    $("#detail2").show();
                    $("#img2").show();
                    $("#detail1").hide();
                    $("#img1").hide();
                    $("#ResponseModel").modal('hide');
                    $("#DonateModal").modal('show');
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
        var quill = new Quill('#editor-container', {});
        quill.enable(false);

        var delta = quill.clipboard.convert(html);
        quill.setContents(delta, 'silent');
    }

    var html =  $("#heredata").text();

    init(html);
})();

</script>
@stop
