@extends('front.layouts.main')
@section('content')
<div id="UserVueApp">
@section('meta_title')
@if(isset($meta['meta_title'])){{$meta['meta_title']}}@endif
@endsection
@section('meta_description')
@if(isset($meta['meta_description'])){{$meta['meta_description']}}@endif
@endsection
@section('meta_keywords')
@if(isset($meta['meta_keywords'])){{$meta['meta_keywords']}}@endif
@endsection
  <div class="hero-area">
    <!-- Start Hero Slider -->
      <div class="flexslider heroflex hero-slider" data-autoplay="yes" data-pagination="no" data-arrows="yes" data-style="fade" data-pause="yes">
          <ul class="slides">
              <li class="parallax" style="background-image:url({{FrontAssets}}images/slider/slider2.jpg)">
                <div class="flex-caption">
                    <div class="container">
                        <div class="flex-caption-table">
                            <div class="flex-caption-cell">
                                <div class="flex-caption-text">
                                      <h2>Let your life be<br>an Inspiration</h2>
                                      <p>Be a part of Inner-Eye and start campaing change people's lives;<br>you are in the right place for right people</p>
                                      <a href="#" class="btn btn-primary">Start Campaign</a>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </li>
              <li class="parallax" style="background-image:url({{FrontAssets}}images/slider/slider5.jpg)">
                <div class="flex-caption">
                    <div class="container">
                        <div class="flex-caption-table">
                            <div class="flex-caption-cell">
                                <div class="flex-caption-text text-align-center">
                                      <h2>Make a difference for people<br>who needs it the most</h2>
                                      <a href="#" class="btn btn-primary">Join Our Team</a>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </li>

              <li class="parallax" style="background-image:url(https://www.worldvision.org/wp-content/uploads/D145-0189-42_703763.jpg)">
                <div class="flex-caption">
                    <div class="container">
                        <div class="flex-caption-table">
                            <div class="flex-caption-cell text-align-center">
                            <div class="flex-caption-cause">
                                <h3><a href="#">Secure Their Lives</a></h3>
                            <p>Your compassion & kindness help them to secure sustainable lives.</p>
                                        <span class="meta-data">Donated ₹ 00.00 / <span class="cause-target">₹ 00.00</span></span>
                                      <a href="#" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#DonateModal">Donate Now</a>
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
  <div class="featured-links row">
    <a href="#" class="featured-link col-md-4 col-sm-4" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#DonateModal">
        <span>View our causes</span>
        <strong>Donate now</strong>
      </a>
    <a href="#" class="featured-link col-md-4 col-sm-4">
        <span>Become a volunteer</span>
        <strong>Join us now</strong>
      </a>
    <a href="#" class="featured-link col-md-4 col-sm-4">
        <span>View our events</span>
        <strong>Get involved</strong>
      </a>
  </div>
  <!-- Main Content -->
  <div id="main-container">
    <div class="content">
        <div class="lgray-bg padding-tb75">
            <div class="container">
                <div class="row">
                    <div class="col-md-5 col-sm-5">
                          <h2 class="block-title">Causes that need your<br>urgent attention</h2>
                          <div class="spacer-30"></div>
                      </div>
                      <div class="col-md-7 col-sm-7">
                        <div class="spacer-10"></div>
                        <p>To secure help-less vulnerable old-age people, semi/parent-less chldren, physically & mentally challending community, deprived, & destitute people for thier livelihood, education, helath.  All is possible when the iNNER-EYE has your kindness & compassion towards the Human soceity. We are here to promote the under-privileged people from insecure to secure to have peacueful & dignified lives. </p>
                      </div>
                  </div>
                  <div class="carousel-wrapper">
                      <div class="row">
                          <ul class="owl-carousel carousel-fw" id="causes-slider" data-columns="4" data-autoplay="" data-pagination="no" data-arrows="yes" data-single-item="no" data-items-desktop="4" data-items-desktop-small="3" data-items-tablet="2" data-items-mobile="1">
                              
                            
                              <li v-for="data in campaignData" class="item">
                                  <div class="grid-item cause-grid-item small-business format-standard">
                                      <div class="grid-item-inner">
                                        <a  :href="data.slug | goCampDetails"  v-if="data.get_images.length>0 && index==0 " v-for="(imgdata,index) in data.get_images"   :class="{ ' media-box active': index === 0 }" >
                                                <img :src="'{{CampaignImagePath}}'+imgdata.campaign_id+'/'+imgdata.image" onerror="this.src='{{FrontAssets}}images/placeholderCampaign.jpeg'" class="d-block w-100" :alt="'{{CampaignImagePath}}'+imgdata.campaign_id+'/Thumb/'+imgdata.image">
                                        </a>
                                        <a  :href="data.slug | goCampDetails"  v-if="data.get_images.length==0"   class="media-box active" >
                                                <img src="{{FrontAssets}}images/placeholderCampaign.jpeg" onerror="this.src='{{FrontAssets}}images/placeholderCampaign.jpeg'" class="d-block w-100" >
                                        </a>
                                          <div class="grid-item-content">
                                              <a class="cProgress"  :data-complete="data.collect_percentage" data-color="F23827" data-toggle="tooltip" data-original-title="10 days left"><strong></strong></a>
                                              <h3 class="post-title"><a  :href="data.slug | goCampDetails" >@{{data.project_name}}:@{{data.title}}</a></h3>
                                              <div class="meta-data newmeta-data">Donated ₹ @{{data.collect_amount}} / <span class="cause-target">₹ @{{data.amount}}</span></div>
                                                <div class="widget recent_posts cardNewCampaignlist">
                                                    <img class="text-center media-object rounded-circle" :src="'{{TeamImagePath}}'+data.creator.id+'/Thumb/'+data.creator.profile_pic" onerror="this.src='{{FrontAssets}}images/defaulticon.png'"  :alt="'{{TeamImagePath}}'+data.creator.id+'/Thumb/'+data.creator.profile_pic" height="30" width="30">
                                                    <h5 class="text-align-center">@{{data.creator.first_name}}</h5>
                                                    <small>Campaigner</small>
                                                </div>   
                                          </div>
                                          
                                        <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#DonateModal">Donate Now</a>
                                      </div>
                                  </div>
                              </li> 
                          </ul>
                      </div>
                  </div>
              </div>
          </div>

<div class="spacer-75"></div>
          <div class="lgray-bg padding-tb75">
            <div class="container">

                  <div class="row">
                <div class="col-md-5 col-sm-5">
                  <h2>Our Champions</h2>
                      <hr class="sm">
                      <p>Our featured teams are the driving force of the mission of iNNER-EYE and our members immensely joy and compassinately work and change people's lives.</p>
                  </div>
                  <div class="col-md-7 col-sm-7">
                    <div class="row">
                        <div class="col-ms-4 col-sm-4 col-xs-4">
                              <ul class="carets">
                                  <li>Amsarajan</li>
                                  <li>Murugesan</li>
                                  <li>Murugan</li>
                                  <li>Gaddam Sharet</li>
                                  <li>Raghu Ram</li>
                                  <li>Anik</li>
                              </ul>
                          </div>
                        <div class="col-ms-4 col-sm-4 col-xs-4">
                              <ul class="carets">
                                  <li>Sunil </li>
                                  <li>Madhan Kumar </li>
                                  <li>Praveen Shet</li>
                                  <li>Punith Ruban</li>
                                  <li>Thenmozhi</li>
                                  <li>Senthil Kumaran</li>
                              </ul>
                          </div>
                        <div class="col-ms-4 col-sm-4 col-xs-4">
                              <ul class="carets">
                                  <li>Kelly Lambert</li>
                                  <li>Walid Ahelluc</li>
                                  <li>Ernst Graf</li>
                                  <li>Lore Smets</li>
                                  <li>Camiel de Graaf</li>
                                  <li>Ladislau Berindei</li>
                              </ul>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="spacer-20"></div>
              <div class="row">
                <div class="col-md-3 col-sm-3">
                    <div class="grid-item grid-staff-item">
                          <div class="grid-item-inner">
                              <div class="media-box"><img src="{{FrontAssets}}images/bod/sangshan1.jpg" alt=""></div>
                              <div class="grid-item-content">
                                <h3><a href="ceo.html">Shanmugavel</a></h3>
                                  <span class="meta-data">Chief Executive Officer</span>
                                <ul class="social-icons-rounded social-icons-colored">
                                    <li class="facebook"><a href="#"><i class="fa fa-facebook"></i></a></li>
                                      <li class="twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>
                                      <li class="googleplus"><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                      <li class="pinterest"><a href="#"><i class="fa fa-pinterest"></i></a></li>
                                  </ul>
                              <!--	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis egestas rhoncus. Donec facilisis fermentum sem, ac viverra ante luctus vel. Donec vel mauris quam.</p> -->
                              </div>
                          </div>
                      </div>
                  </div>
                <div class="col-md-3 col-sm-3">
                    <div class="grid-item grid-staff-item">
                          <div class="grid-item-inner">
                              <div class="media-box"><img src="{{FrontAssets}}images/executive/ananya.jpg" alt=""></div>
                              <div class="grid-item-content">
                                <h3>Ananya Biswas</h3>
                                  <span class="meta-data">Executive</span>
                                <ul class="social-icons-rounded social-icons-colored">
                                    <li class="facebook"><a href="https://www.facebook.com/profile.php?id=100009642620382" target="_blank"><i class="fa fa-facebook"></i></a></li>
                                      <li class="twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>
                                      <li class="googleplus"><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                      <li class="pinterest"><a href="#"><i class="fa fa-pinterest"></i></a></li>
                                  </ul>
                             <!--  	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis egestas rhoncus. Donec facilisis fermentum sem, ac viverra ante luctus vel. Donec vel mauris quam.</p> -->
                              </div>
                          </div>
                      </div>
                  </div>
        <div class="col-md-3 col-sm-3">
                    <div class="grid-item grid-staff-item">
                          <div class="grid-item-inner">
                              <div class="media-box"><img src="http://placehold.it/600x400&amp;text=IMAGE+PLACEHOLDER" alt=""></div>
                              <div class="grid-item-content">
                                <h3>Tanmoyendu</h3>
                                  <span class="meta-data">Executive</span>
                                <ul class="social-icons-rounded social-icons-colored">
                                    <li class="facebook"><a href="https://www.facebook.com/profile.php?id=100009618701433" target="_blank"><i class="fa fa-facebook"></i></a></li>
                                      <li class="twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>
                                      <li class="googleplus"><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                      <li class="pinterest"><a href="#"><i class="fa fa-pinterest"></i></a></li>
                                  </ul>
                             <!--  	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis egestas rhoncus. Donec facilisis fermentum sem, ac viverra ante luctus vel. Donec vel mauris quam.</p> -->
                              </div>
                          </div>
                      </div>
                  </div>
                <div class="col-md-3 col-sm-3">
                    <div class="grid-item grid-staff-item">
                          <div class="grid-item-inner">
                              <div class="media-box"><img src="http://placehold.it/600x400&amp;text=IMAGE+PLACEHOLDER" alt=""></div>
                              <div class="grid-item-content">
                                <h3>Soumya Biswas</h3>
                                  <span class="meta-data">Executive</span>
                                <ul class="social-icons-rounded social-icons-colored">
                                    <li class="facebook"><a href="#"><i class="fa fa-facebook"></i></a></li>
                                      <li class="twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>
                                      <li class="googleplus"><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                      <li class="pinterest"><a href="#"><i class="fa fa-pinterest"></i></a></li>
                                  </ul>
                     <!--          	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis egestas rhoncus. Donec facilisis fermentum sem, ac viverra ante luctus vel. Donec vel mauris quam.</p>  -->
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>

      <div class="spacer-50"></div>
          <div class="text-align-center">
              <h2>Join our Team</h2>
              <p>iNNER-EYE is looking for your role paly to work for its missions to promote the vulnerable people's lives. <br>Lets work for our people and Humanity.</p>
              <a href="#" class="btn btn-primary btn-lg">Join us today</a>
          </div>
      </div>

  <br><br> <br>


          <div class="featured-texts row">
            <div class="featured-text col-md-3 col-sm-3">
                <span>Successful projects</span>
                  <strong>36</strong>
              </div>
            <div class="featured-text col-md-3 col-sm-3">
                <span>People Impacted</span>
                  <strong>753</strong>
              </div>
            <div class="featured-text col-md-3 col-sm-3">
                <span>Total amount raised</span>
                  <strong>211333</strong>
              </div>
            <div class="featured-text col-md-3 col-sm-3">
                <span>Total Volunteers</span>
                  <strong>121</strong>
              </div>
          </div>

          <div class="padding-tb75 position-relative">
            <div class="half-bg-right accent-bg"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h2 class="block-title">Upcoming events</h2>
                          <div class="spacer-20"></div>
                            <ul class="events-compact-list">
                                <li v-for="data in eventData" class="event-list-item">
                                        <span class="event-date">
                                            <span class="date">@{{data.startdate}}</span>
                                            <span class="month">@{{data.startmonth}}</span>
                                            <span class="year">@{{data.startyear}}</span>
                                        </span>
                                      <div class="event-list-cont">
                                          <span class="meta-data">@{{data.show_time}}</span>
                                            <h4 class="post-title"><a :href="data.slug | goDetails">@{{data.title}}</a></h4>
                                            <p class="cardDetaileclips">@{{data.description.replace(/<\/?[^>]+(>|$)/g, "")}} </p>
                                      </div>
                                  </li>
                              </ul>
                      </div>

                    <div class="col-md-6">
                          <div class="gallery-updates cols2 clearfix">
                              <ul>
                                  <li class="format-image grid-item">
                                      <a href="http://placehold.it/600x400&amp;text=IMAGE+PLACEHOLDER" class="media-box magnific-image"> <img src="http://placehold.it/600x400&amp;text=IMAGE+PLACEHOLDER" alt=""> </a>
                                  </li>
                                  <li class="format-gallery grid-item">
                                      <div class="media-box">
                                          <div class="flexslider galleryflex" data-autoplay="yes" data-pagination="no" data-arrows="yes" data-style="slide" data-pause="yes">
                                              <ul class="slides">
                                                  <li class="item"><a href="http://placehold.it/600x400&amp;text=IMAGE+PLACEHOLDER" class="popup-image"><img src="http://placehold.it/600x400&amp;text=IMAGE+PLACEHOLDER" alt=""></a></li>
                                                  <li class="item"><a href="http://placehold.it/600x400&amp;text=IMAGE+PLACEHOLDER" class="popup-image"><img src="http://placehold.it/600x400&amp;text=IMAGE+PLACEHOLDER" alt=""></a></li>
                                              </ul>
                                          </div>
                                      </div>
                                  </li>
                                  <li class="format-link grid-item">
                                      <a href="http://www.google.com" target="_blank" class="media-box"> <img src="http://placehold.it/600x400&amp;text=IMAGE+PLACEHOLDER" alt=""> </a>
                                  </li>
                                  <li class="format-video grid-item">
                                      <a href="https://vimeo.com/47532705" class="media-box magnific-video"> <img src="http://placehold.it/600x400&amp;text=IMAGE+PLACEHOLDER" alt=""> </a>
                                  </li>
                                  <li class="grid-item format-image">
                                      <a href="http://placehold.it/800x533&amp;text=IMAGE+PLACEHOLDER" class="media-box magnific-image"> <img src="http://placehold.it/800x533&amp;text=IMAGE+PLACEHOLDER" alt=""> </a>
                                  </li>
                                  <li class="grid-item format-image">
                                      <a href="http://placehold.it/600x400&amp;text=IMAGE+PLACEHOLDER" class="media-box magnific-image"> <img src="http://placehold.it/600x400&amp;text=IMAGE+PLACEHOLDER" alt=""> </a>
                                  </li>
                              </ul>
                              <div class="gallery-updates-overlay">
                                  <i class="icon-multiple-image"></i> Updates from our gallery
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>

          <div class="parallax parallax6 padding-tb100" style="background-image:url(http://www.alchemyarchitects.co.za/imageroot/projects/community/pco1.jpg)">
            <div class="container">
                  <div class="parallax-text-block pull-right">
                      <h3>Prayuta: Our major project for establising shelter for old-age</h3>
                      <p>Based on our own survey & statistics in the rural & urban Kanrataka, Inner-Eye's cause for establishing old-age home for supportl-less aged people to have secure, healthy & peaceful lives.</p>
                      <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#DonateModal">Donate to Cause</a>
                  </div>
              </div>
          </div>

          <div class="padding-tb75 padding-b0">
              <div class="container">
                <div class="text-align-center">
                      <h2 class="block-title block-title-center">Some of the success stories</h2>
                  </div>
              </div>
              <div class="carousel-wrapper">
                  <div class="row">
                      <ul class="owl-carousel carousel-fw" id="stories-slider" data-columns="1" data-autoplay="" data-pagination="no" data-arrows="yes" data-single-item="no" data-items-desktop="1" data-items-desktop-small="2" data-items-tablet="1" data-items-mobile="1">
                          <li class="item">
                              <div class="row">
                                  <div class="col-md-6">
                                      <img src="{{FrontAssets}}images/beneficiary/arvindan.jpeg" alt="" class="img-responsive">
                                  </div>

                                  <div class="col-md-6">
                                    <div class="story-slider-content">
                                      <div class="story-slider-table">
                                        <div class="story-slider-cell">
                                                  <blockquote>
                                                      <h3>Arvindan is going to school now</h3>
                                                      <p>Vestibulum quam nisi, pretium a nibh sit amet, consectetur hendrerit mi. Aenean imperdiet lacus sit amet elit porta, et malesuada erat bibendum. Cras sed nunc massa. Quisque tempor dolor sit amet tellus malesuada, malesuada iaculis eros dignissim. Aenean vitae diam id lacus fringilla maximus. Mauris auctor efficitur nisl, non blandit urna fermentum nec.</p>
                                                  </blockquote>
                                                  <a href="#" class="btn btn-primary">View full story</a>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </li>
                          <li class="item">
                              <div class="row">
                                  <div class="col-md-6">
                                      <img src="http://placehold.it/600x400&amp;text=IMAGE+PLACEHOLDER" alt="" class="img-responsive">
                                  </div>

                                  <div class="col-md-6">
                                    <div class="story-slider-content">
                                      <div class="story-slider-table">
                                        <div class="story-slider-cell">
                                                  <blockquote>
                                                      <h3>Everyday food for Mumbai children</h3>
                                                      <p>Vestibulum quam nisi, pretium a nibh sit amet, consectetur hendrerit mi. Aenean imperdiet lacus sit amet elit porta, et malesuada erat bibendum. Cras sed nunc massa. Quisque tempor dolor sit amet tellus malesuada, malesuada iaculis eros dignissim.</p>
                                                  </blockquote>
                                                  <a href="#" class="btn btn-primary">View full story</a>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </li>
                      </ul>
                  </div>
              </div>
          </div>
          <!-- Partner Carousel -->
          <div class="partner-carousel">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-3">
                        <h4 class="push-top">Our Most Trusted Supporting partners</h4>
                      </div>
                      <div class="col-md-9 col-sm-9">
                          <div class="carousel-wrapper">
                              <div class="row">
                                  <ul class="owl-carousel carousel-fw" id="partners-slider" data-columns="5" data-autoplay="5000" data-pagination="no" data-arrows="no" data-single-item="no" data-items-desktop="4" data-items-desktop-small="3" data-items-tablet="3" data-items-mobile="2">
                                      <li class="item"><img src="http://placehold.it/250x110&amp;text=IMAGE+PLACEHOLDER" alt=""></li>
                                      <li class="item"><img src="http://placehold.it/250x110&amp;text=IMAGE+PLACEHOLDER" alt=""></li>
                                      <li class="item"><img src="http://placehold.it/250x110&amp;text=IMAGE+PLACEHOLDER" alt=""></li>
                                      <li class="item"><img src="http://placehold.it/250x110&amp;text=IMAGE+PLACEHOLDER" alt=""></li>
                                      <li class="item"><img src="http://placehold.it/250x110&amp;text=IMAGE+PLACEHOLDER" alt=""></li>
                                      <li class="item"><img src="http://placehold.it/250x110&amp;text=IMAGE+PLACEHOLDER" alt=""></li>
                                  </ul>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>

          <div class="parallax parallax5 parallax-light text-align-center padding-tb100" style="background-image:url(https://web123.com.au/wp-content/uploads/2016/10/charity-header.jpg)">
            <div class="container">
                  <div class="carousel-wrapper">
                      <div class="row">
                          <ul class="owl-carousel carousel-fw" id="testimonials-slider" data-columns="1" data-autoplay="5000" data-pagination="no" data-arrows="yes" data-single-item="no" data-items-desktop="1" data-items-desktop-small="1" data-items-tablet="1" data-items-mobile="1">
                              <li class="item">
                                  <div class="testimonial-block">
                                      <blockquote>
                                          <p>Bring your compassion & charity to bring changes in the Human society; charity is an art of Human life.</p>
                                      </blockquote>
                                      <div class="testimonial-avatar"><img src="{{FrontAssets}}images/100x100/sangshan100x100.jpg" alt="" width="70" height="70"></div>
                                      <div class="testimonial-info">
                                          <div class="testimonial-info-in">
                                              <strong>Shanmugavel</strong>
                                          </div>
                                      </div>
                                  </div>
                              </li>

              <li class="item">
                                  <div class="testimonial-block">
                                      <blockquote>
                                          <p>You are the spirit to all the success of the Inner-Eye since its birth. Your time and support is invaluable.</p>
                                      </blockquote>
                                      <div class="testimonial-avatar"><img src="{{FrontAssets}}images/100x100/aiyappan100x100.jpg" alt="" width="70" height="70"></div>
                                      <div class="testimonial-info">
                                          <div class="testimonial-info-in">
                                              <strong>Aiyappan</strong>
                                          </div>
                                      </div>
                                  </div>


                              <li class="item">
                                  <div class="testimonial-block">
                                      <blockquote>
                                          <p>Empowering children is for national growth; empowering women is for the progress of the human society.</p>
                                      </blockquote>
                                      <div class="testimonial-avatar"><img src="{{FrontAssets}}images/100x100/veda100x100.jpg" alt="" width="70" height="70"></div>
                                      <div class="testimonial-info">
                                          <div class="testimonial-info-in">
                                              <strong>Vedapurieswaran</strong>
                                          </div>
                                      </div>
                                  </div>

              <li class="item">
                                  <div class="testimonial-block">
                                      <blockquote>
                                          <p>Happiness is the end that alone meets all requirements for the ultimate end of human action.</p>
                                      </blockquote>
                                      <div class="testimonial-avatar"><img src="{{FrontAssets}}images/100x100/ananya100x100.jpg" alt="" width="70" height="70"></div>
                                      <div class="testimonial-info">
                                          <div class="testimonial-info-in">
                                              <strong>Ananya Biswas</strong>
                                          </div>
                                      </div>
                                  </div>

                <li class="item">
                                  <div class="testimonial-block">
                                      <blockquote>
                                          <p>Food at the right time & education is at right age for children is inevitable in the human society.</p>
                                      </blockquote>
                                      <div class="testimonial-avatar"><img src="{{FrontAssets}}images/100x100/aiyappan100x100.jpg" alt="" width="70" height="70"></div>
                                      <div class="testimonial-info">
                                          <div class="testimonial-info-in">
                                              <strong>Tanmoyendu</strong>
                                          </div>
                                      </div>
                                  </div>

                <li class="item">
                                  <div class="testimonial-block">
                                      <blockquote>
                                          <p>Inner-Eye is the right place for right causes to bring impact in under-privileged people's lives.</p>
                                      </blockquote>
                                      <div class="testimonial-avatar"><img src="{{FrontAssets}}images/100x100/ananya100x100.jpg" alt="" width="70" height="70"></div>
                                      <div class="testimonial-info">
                                          <div class="testimonial-info-in">
                                              <strong>Soumya Biswas</strong>
                                          </div>
                                      </div>
                                  </div>


                              </li>
                          </ul>
                      </div>
                  </div>
              </div>
          </div>

    <div class="padding-tb75 lgray-bg">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-4">
                        <h2 class="block-title">Latest news from our blog</h2>
                          <p>Write your own content and read the successful of iNNER-EYE.  The way your think & the way your write on iNNER-EYE mission will change the our people's live. Be a one of the best authors wiht us.</p>
                      </div>

                      <div class="col-md-8 col-sm-8">
                          <div class="carousel-wrapper">
                              <div class="row">
                                  <ul class="owl-carousel carousel-fw" id="news-slider" data-columns="2" data-autoplay="" data-pagination="yes" data-arrows="no" data-single-item="no" data-items-desktop="2" data-items-desktop-small="1" data-items-tablet="1" data-items-mobile="1">
                                      <li  v-for="data in blogData.data" class="item">
                                          <div class="grid-item blog-grid-item format-standard">
                                              <div class="grid-item-inner">
                                                  <a  :href="data.slug | redirectBlog"   class="media-box">
                                                      <img   :src="'{{BlogImagePath}}'+data.id+'/'+data.image" onerror="this.src='{{FrontAssets}}images/defaulticon.png'"  :alt="'{{BlogImagePath}}'+data.id+'/Thumb/'+data.image"  alt="">
                                                  </a>
                                                  
                                                  <div class="grid-item-content">
                                                      <h3 class="post-title"><a  :href="data.slug | redirectBlog">@{{data.title}}</a></h3>
                                                      <span class="meta-data">Posted on @{{moment(data.created_at).format("DD-MM-YYYY h:mm a") }}</span>
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



          <div class="accent-bg padding-tb20 cta-fw">
        <div class="container">
                  <a href="#" class="btn btn-default btn-ghost btn-light btn-rounded pull-right" data-toggle="modal" data-target="#myModal">Become a volunteer</a>
                  <h4>Let's start doing your bit for the world. Join us as a Volunteer</h4>
              </div>
          </div>
      </div>
  </div>

<div class="col-md-6">
          <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">Launch demo modal</button>
                  <div class="modal fade" id="myModal" tabindex="-1" role="dialog"  aria-hidden="true">
                      <div class="modal-dialog">
                          <div class="modal-content">
                              <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                  <h4 class="modal-title" id="myModalLabel">Volunteer Form under Counstruction</h4>
                              </div>
                              <div class="modal-body"> Please contact:  inneryefoundation@gmail.com or 9448438583 (Ph./Whatsapp)</div>
                                  <div class="modal-footer">
                                      <button type="button" class="btn btn-default inverted" data-dismiss="modal">Close</button>
                                      <button type="button" class="btn btn-primary">Thank you</button>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div> 
</div> <!--  -->

@stop
@section('frontjs')
<script src="{{FrontAssets}}js/jquery-2.1.3.min.js"></script> <!-- Jquery Library Call -->
<script src="{{FrontAssets}}js/bootstrap.js"></script> <!-- UI -->
 
 
<script src="{{FrontAssets}}vendor/magnific/jquery.magnific-popup.min.js"></script> <!-- PrettyPhoto Plugin -->
<script src="{{FrontAssets}}js/ui-plugins.js"></script> <!-- UI Plugins -->
<script src="{{FrontAssets}}js/helper-plugins.js"></script> <!-- Helper Plugins -->
<script src="{{FrontAssets}}vendor/owl-carousel/js/owl.carousel.min.js"></script> <!-- Owl Carousel -->
<script src="https://cdn.jsdelivr.net/npm/vue@2.5.17/dist/vue.js"></script>
<script src="{{env('APP_URL')}}public/assets/js/vue.paging.js"></script>
<script src="{{FrontAssets}}js/init.js"></script> <!-- All Scripts -->
<script src="{{FrontAssets}}vendor/flexslider/js/jquery.flexslider.js"></script> <!-- FlexSlider -->
<script src="{{FrontAssets}}js/circle-progress.js"></script> <!-- Circle Progress Bars -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>

<script type="text/javascript">


var vm = new Vue({
  el:"#UserVueApp",
  data:{
            search:'',
            pagechange:20,
            eventData: {!!json_encode($eventData)!!},
            campaignData: {!!json_encode($campaignData)!!},
            blogData: {!!json_encode($blogData)!!},
            loading:true,
            moment:moment,
            load:1,
  },
  mounted:function(){
      //this.getEvents();
      
  },
  filters: {
    goDetails: function(string) {
       var Newurl ="{{route('event_details','MID')}}";
       return  Newurl = Newurl.replace('MID',string);
    },
    goCampDetails: function(string) {
        var Newurl ="{{route('campaign_details','MID')}}";
        return  Newurl = Newurl.replace('MID',string);
    },
    redirectBlog:function(data){
          var Newurl ="{{route('blogDetails', 'Rdata')}}";
          return  Newurl = Newurl.replace('Rdata',data);
    },
    subStr: function(string) {
    	return string.substring(0,15) + '...';
    },
  },
  methods:{
    getEvents:function(load){
      var self=this;

      $.ajax({
        url:'{{route("ajaxEvent")}}',
        type:'post',
        data:{
              _token:'{{csrf_token()}}',
         },
        beforeSend:function(){

            if(!load)
            self.loading=true;
        }
        ,
        success:function(res){
           console.log(res);
           self.users=res;
         },
        complete:function(){
            if(!load)
            self.loading=false;
        }
      });
    }
  }
});
 
</script>
@stop
