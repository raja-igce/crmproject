<?php $routeName = Request::route()->getName();
      $routeArgType = Request::route('type', '');
?>
<div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
              <li class="nav-item mr-auto">
                <a class="navbar-brand" href="{{env('APP_URL')}}public/html/ltr/vertical-menu-template-semi-dark/index.html">
                    <div class="brand-logo"></div>
                    <h2 class="brand-text mb-0">InnerEye</h2>
                </a>
              </li>
            <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="feather icon-x d-block d-xl-none font-medium-4 primary toggle-icon"></i><i class="toggle-icon feather icon-disc font-medium-4 d-none d-xl-block collapse-toggle-icon primary" data-ticon="icon-disc"></i></a></li>
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li  @if($routeName=='home')class="active"@endif><a href="{{route('home')}}"><i class="feather icon-home"></i><span class="menu-title" data-i18n="Dashboard">Dashboard</span></a></li>
            <!-- <li><a href="{{route('education')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Analytics">Sample Page</span></a>
            </li> -->

            <li class=" navigation-header"><span>Users</span>
            </li>
            <li @if($routeName=='volunteer')class="active"@endif><a href="{{route('volunteer')}}"><i class="feather icon-user"></i><span class="menu-item" data-i18n="volunteer">Volunteers</span></a>
            </li>
            <li @if($routeName=='project')class="active"@endif><a href="{{route('project')}}"><i class="feather icon-briefcase"></i><span class="menu-item" data-i18n="project">Projects</span></a>
            </li>
            <li @if($routeName=='campaign')class="active"@endif><a href="{{route('campaign')}}"><i class="fa fa-bullhorn"></i><span class="menu-item" data-i18n="campaign">Campaign</span></a>
            </li>
            <li @if($routeName=='task')class="active"@endif><a href="{{route('task')}}"><i class="feather icon-watch"></i><span class="menu-item" data-i18n="task">Task</span></a>
            </li>
            <li @if($routeName=='event')class="active"@endif><a href="{{route('event')}}"><i class="feather icon-calendar"></i><span class="menu-item" data-i18n="event">Events</span></a>
            </li>
            <li @if($routeName=='application')class="active"@endif><a href="{{route('application','organization')}}"><i class="feather icon-users"></i><span class="menu-item" data-i18n="organization">Organization</span></a>
            </li>
            <li class=" @if($routeName=='blog' || $routeName=='story'){{'sidebar-group-active open'}}@endif nav-item"><a href="#"><i class="feather icon-bold"></i><span class="menu-title" data-i18n="Ecommerce">Blog Manage</span></a>
                <ul class="menu-content">
                    <li @if($routeName=='blog')class="active"@endif  ><a href="{{route('blog')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Blog">Blog</span></a>
                    </li>
                    <li @if($routeName=='story')class="active"@endif><a href="{{route('story')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Story">Story</span></a>
                    </li>
                </ul>
            </li>

            <li class=" @if($routeName=='setting'){{'sidebar-group-active open'}}@endif nav-item"><a href="#"><i class="feather icon-settings"></i><span class="menu-title" data-i18n="Ecommerce">Settings</span></a>
                <ul class="menu-content">
                    <li @if($routeArgType=='education')class="active"@endif  ><a href="{{route('setting','education')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Shop">Education</span></a>
                    </li>
                    <li @if($routeArgType=='bloodgroup')class="active"@endif><a href="{{route('setting','bloodgroup')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Checkout">BloodGroup</span></a>
                    </li>
                    <li @if($routeArgType=='causes_interested')class="active"@endif><a href="{{route('setting','causes_interested')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Checkout">Interest</span></a>
                    </li>
                    <li @if($routeArgType=='institutions')class="active"@endif><a href="{{route('setting','institutions')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Checkout">Institution</span></a>
                    </li>
                    <li @if($routeArgType=='language_known')class="active"@endif><a href="{{route('setting','language_known')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Checkout">Language Known</span></a>
                    </li>
                    <li @if($routeArgType=='occupation')class="active"@endif><a href="{{route('setting','occupation')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Checkout">Occupation</span></a>
                    </li>
                    <li @if($routeArgType=='tags')class="active"@endif><a href="{{route('setting','tags')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Checkout">Tags</span></a>
                    </li>

                </ul>
            </li>
            <!-- <li class=" nav-item"><a href="#"><i class="feather icon-shopping-cart"></i><span class="menu-title" data-i18n="Ecommerce">Ecommerce</span></a>
                <ul class="menu-content">
                    <li><a href="app-ecommerce-shop.html"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Shop">Shop</span></a>
                    </li>
                    <li><a href="app-ecommerce-checkout.html"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Checkout">Checkout</span></a>
                    </li>
                </ul>
            </li> -->

        </ul>
    </div>
</div>
