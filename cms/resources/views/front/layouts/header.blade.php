<div class="site-header-wrapper">
    <!-- Site Header -->
    <header class="site-header @yield('headertype')">
        <div class="container">
            <div class="site-logo">
                <a href="{{route('index')}}" class="default-logo"><img src="{{FrontAssets}}images/logo.png" alt="Logo"></a>
                <a href="{{route('index')}}" class="default-retina-logo"><img src="{{FrontAssets}}images/logo@2x.png" alt="Logo" width="199" height="30"></a>
                <a href="{{route('index')}}" class="sticky-logo"><img src="{{FrontAssets}}images/logob.png" alt="Logo"></a>
                <a href="{{route('index')}}" class="sticky-retina-logo"><img src="{{FrontAssets}}images/sticky-logo@2x.png" alt="Logo" width="199" height="30"></a>
            </div>
          <a href="return false"  class="visible-sm visible-xs" id="menu-toggle"><i class="fa fa-bars"></i></a>
            <div class="header-info-col"  style="cursor:pointer" > <a href="{{route('logins')}}"> <i class="fa fa-user-plus"></i> Login</a> </div>
            <div class="header-info-col"  style="cursor:pointer"> <a href="{{route('registration')}}"> <i class="fa fa-users"></i> Join Us </a></div>
    <div class="header-info-col"><i class="fa fa-search"></i> </div>
            <ul class="sf-menu dd-menu pull-right" role="menu">
                <li><a href="index.html" class="fa fa-home"></a></li>
                <li><a href="about.html">About</a>
                  <ul>
                    <li><a href="our-story.html">Our Story</a></li>
                    <li><a href="{{route('underconstruct')}}">Guidelines & Policies</a></li>
                    <li><a href="our-impact.html">Our Impact</a></li>
                    <li><a href="board-of-directors.html">Board of Directors</a></li>
                    <li><a href="#">Executive Team</a>
           <ul>
                                <li><a href="{{route('underconstruct')}}">CEO</a></li>
                                <li><a href="managing-Trustee.html">Managing Trustee</a></li>
                                <li><a href="{{route('underconstruct')}}">Vice-President</a></li>
                                <li><a href="{{route('underconstruct')}}">Secretary</a></li>
                                <li><a href="ananya.html">Exective - Prayuta</a></li>
                                <li><a href="{{route('underconstruct')}}">Executive - Pen a Child</a></li>
                                <li><a href="{{route('underconstruct')}}">Executive - Health aPLUS</a></li>
                            </ul>
          </li>
                    <li><a href="careers.html">Careers</a></li>
                    <li><a href="contact.html">Contact</a></li>
                    </ul>
                </li>
                            <li>
              <a href="#">Get Invovled </a>
              <ul>
                <li><a href="{{route('underconstruct')}}">Be A Champion</a></li>
                <li><a href="{{route('underconstruct')}}">Fundraising</a></li>
                <li><a href="featured-volunteers.html">Featured Volunteers</a></li>
                <li><a href="#">Our Partners</a>

                <ul>
                                <li><a href="{{route('underconstruct')}}">MAA Mission Ashram</a></li>
                                <li><a href="{{route('underconstruct')}}">Namma-School</a></li>
                            </ul>
                </li>

              </ul>
            </li>

                 <li>
              <a href="#">What we do </a>
              <ul>
              <li><a href="javascrip:void(0)">Livelihood: Prayuta</a>
              <ul>
                <li><a href="{{route('underconstruct')}}">Old-Age Home</a></li>
                <li><a href="{{route('underconstruct')}}">Anna-Seva: Feed Hungers</a></li>
                <li><a href="{{route('underconstruct')}}">Cloth Bank & Distribution</a></li>
              </ul>
                </li>
                <li><a href="javascrip:void(0)">Education: Pen a Child</a>
                <ul>
                <li><a href="{{route('underconstruct')}}">Value Education</a></li>
                <li><a href="i-LiRC.html">i-LiRC</a></li>
                <li><a href="{{route('underconstruct')}}">Aid to Education</a></li>
                <li><a href="{{route('underconstruct')}}">Merit Scholarship (iMS)</a></li>
                <li><a href="{{route('underconstruct')}}">Note-Book Drive</a></li>
              </ul>
              </li>
              <li><a href="javascrip:void(0)">Health</a>
                <ul>
                <li><a href="{{route('underconstruct')}}">Health Education</a></li>
                <li><a href="{{route('underconstruct')}}">Nutrition for HIV+ Children</a></li>
                <li><a href="{{route('underconstruct')}}">Health-care Treament</a></li>
                <li><a href="{{route('underconstruct')}}">Aid for Medical Surgery</a></li>
                <li><a href="{{route('underconstruct')}}">Blood Donation</a></li>
              </ul>
              </li>

                <li><a href="disaster-relief">Disastr Relief</a></li>
              </ul>
            </li>
      <li><a href="javascrip:void(0)">i-LiRC</a>
                  <ul>
                <li><a href="i-LiRC.html">About i-LiRC</a></li>
                <li><a href="{{route('underconstruct')}}">i-LiRC Committee</a></li>
                <li><a href="https://ilirc.innereyefoundation.org/" target="_blank">Online Library Catalogue</a></li>
        </ul>
                </li>
      <li><a href="javascript:void(0)" onclick="return false;">Our Causes</a>
                  <ul>
                    <li><a href="{{route('homecampaign')}}">Causes Grid</a></li>
                    <li><a href="{{route('underconstruct')}}">Start Campaign</a></li>

                    </ul>
                </li>
                <li><a href="{{route('eventListing')}}">Events</a></li>

                <li>
                    <a href="{{route('frontblog')}}">Blog</a>
                </li>

                <li class="megamenu"><a href="javascrip:void(0)">More Featured</a>
                    <ul class="dropdown">
                        <li>
                            <div class="megamenu-container container">
                                <div class="row">
                                    <div class="col-md-3 megamenu-col">
                                      <span class="megamenu-sub-title"><i class="fa fa-bookmark"></i> Features</span>
                                        <ul class="sub-menu">
                                            <li><a href="{{route('underconstruct')}}">Gallery</a></li>
                  <!--	<li><a href="gallery-caption-4cols.html">Gallery</a></li> -->
                    <li><a href="{{route('underconstruct')}}">Feedback</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-md-3 megamenu-col">
                                      <span class="megamenu-sub-title"><i class="fa fa-newspaper-o"></i> Latest news</span>
                                      <div class="widget recent_posts">
                                          <ul>
                                              <li>
                                                  <a href="single-post.html" class="media-box">
                                                        <img src="http://placehold.it/600x400&amp;text=IMAGE+PLACEHOLDER" alt="">
                                                    </a>
                                                <h5><a href="single-post.html">A single person can change million lives</a></h5>
                                                <span class="meta-data grid-item-meta">Posted on 11th Dec, 2015</span>
                                                </li>
                                              <li>
                                                  <a href="single-post.html" class="media-box">
                                                        <img src="http://placehold.it/600x400&amp;text=IMAGE+PLACEHOLDER" alt="">
                                                    </a>
                                                <h5><a href="single-post.html">Donate your woolens this winter</a></h5>
                                                <span class="meta-data grid-item-meta">Posted on 11th Dec, 2015</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-md-3 megamenu-col">
                                      <span class="megamenu-sub-title"><i class="fa fa-microphone"></i> Latest causes</span>
                                        <ul class="widget_recent_causes">
                                            <li>
                                                <a href="#" class="cause-thumb">
                                                    <img src="http://placehold.it/200x200&amp;text=IMAGE+PLACEHOLDER" alt="" class="img-thumbnail">
                                                    <div class="cProgress" data-complete="88" data-color="42b8d4">
                                                        <strong></strong>
                                                    </div>
                                                </a>
                                                <h5><a href="single-cause.html">Help small shopkeepers of Sunyani</a></h5>
                                                <span class="meta-data">10 days left to achieve</span>
                                            </li>
                                            <li>
                                                <a href="#" class="cause-thumb">
                                                    <img src="http://placehold.it/200x200&amp;text=IMAGE+PLACEHOLDER" alt="" class="img-thumbnail">
                                                    <div class="cProgress" data-complete="75" data-color="42b8d4">
                                                        <strong></strong>
                                                    </div>
                                                </a>
                                                <h5><a href="single-cause.html">Save tigers from poachers</a></h5>
                                                <span class="meta-data">32 days left to achieve</span>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-md-3 megamenu-col">
                                      <span class="megamenu-sub-title"><i class="fa fa-star"></i> Featured Video</span>
                                        <div class="fw-video"><iframe src="https://player.vimeo.com/video/62947247" width="500" height="275"></iframe></div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </li>


            </ul>
        </div>
    </header>
</div>
