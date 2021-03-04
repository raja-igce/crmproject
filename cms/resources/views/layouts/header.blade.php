<?php $routeName = Request::route()->getName();
$routeArgType = Request::route('type', '');

use App\Helper\AccessHelper;




?>
<div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item mr-auto">
                <a class="navbar-brand" href="{{route('home')}}">
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
            <!-- <li  @if($routeName=='home')class="active"@endif><a href="{{route('home')}}"><i class="feather icon-home"></i><span class="menu-title" data-i18n="Dashboard">Dashboard</span></a></li> -->
            @php $accessAble = AccessHelper::isAccessAble(auth()->user()->id, 'crmconatct'); @endphp
            @php $accessAblex = AccessHelper::isAccessAble(auth()->user()->id, 'contacts'); @endphp
            @if($accessAble!='denied' || $accessAblex!='denied')
            <li class=" @if($routeName=='volunteer' || $routeName=='application' || $routeName=='beneficiaries' ||  $routeName=='contacts'){{'sidebar-group-active open'}}@endif nav-item"><a href="#"><i class="feather icon-airplay"></i><span class="menu-title" data-i18n="Ecommerce">CRM Panel</span></a>
                <ul class="menu-content">
                    @if($accessAble != 'denied')
                    <!-- <li @if($routeName=='' )class="active" @endif><a href="#"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Blog">All Contacts</span></a></li> -->
                    <li @if($routeName=='volunteer' )class="active" @endif><a href="{{route('volunteer')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Story">Volunteer</span></a></li>
                    <li @if($routeName=='application' )class="active" @endif><a href="{{route('application','organization')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Story">Organization</span></a></li>
                    <li @if($routeName=='beneficiaries' )class="active" @endif><a href="{{route('beneficiaries')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Story">Beneficiaries</span></a></li>
                    @endif
                    @if($accessAblex != 'denied')
                    <li @if($routeName=='contacts' )class="active" @endif><a href="{{route('contacts')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Story">Contact</span></a></li>
                    @endif
                </ul>
            </li>
            @endif

            @php $accessAble = AccessHelper::isAccessAble(auth()->user()->id, 'project'); @endphp
            @if($accessAble != 'denied')
            <li @if($routeName=='project' )class="active" @endif><a href="{{route('project')}}"><i class="feather icon-briefcase"></i><span class="menu-item" data-i18n="project">Project Panel</span></a></li>
            @endif

            @php $accessAble = AccessHelper::isAccessAble(auth()->user()->id, 'task'); @endphp
            @if($accessAble != 'denied')
            <li class=" @if($routeName=='task' ){{'sidebar-group-active open'}}@endif nav-item"><a href="#"><i class="feather icon-list"></i><span class="menu-title" data-i18n="Ecommerce">Task Panel</span></a>
                <ul class="menu-content">
                    <li @if($routeName=='task' )class="active" @endif><a href="{{route('task')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Blog">Task</span></a></li>
                    <li @if($routeName=='taskreview' )class="active" @endif><a href="{{route('taskreview')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Blog">Task Assigned</span></a></li>
                 </ul>
            </li>
            @endif

            @php $accessAble = AccessHelper::isAccessAble(auth()->user()->id, 'event'); @endphp
            @if($accessAble != 'denied')
            <li @if($routeName=='event' )class="active" @endif><a href="{{route('event')}}"><i class="feather icon-calendar"></i><span class="menu-item" data-i18n="event">Event Panel</span></a></li>
            @endif

            @php $accessAble = AccessHelper::isAccessAble(auth()->user()->id, 'campaign'); @endphp
            @if($accessAble != 'denied')
            <li class=" @if($routeName=='campaign' ){{'sidebar-group-active open'}}@endif nav-item"><a href="#"><i class="feather icon-check-circle"></i><span class="menu-title" data-i18n="Ecommerce">Campaign Panel</span></a>
                <ul class="menu-content">
                    <li @if($routeName=='campaign' )class="active" @endif><a href="{{route('campaign')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Blog">All Campaign</span></a></li>
                </ul>
            </li>
            @endif

            @php $accessAble = AccessHelper::isAccessAble(auth()->user()->id, 'blog'); @endphp
            @if($accessAble != 'denied')
            <li class=" @if($routeName=='blog' || $routeName=='story'){{'sidebar-group-active open'}}@endif nav-item"><a href="#"><i class="feather icon-bold"></i><span class="menu-title" data-i18n="Ecommerce">Blog Panel</span></a>
                <ul class="menu-content">
                    <li @if($routeName=='blog' )class="active" @endif><a href="{{route('blog')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Blog">Blog</span></a>
                    </li>
                    <li @if($routeName=='story' )class="active" @endif><a href="{{route('story')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Story">Story/Quotes</span></a>
                    </li>
                </ul>
            </li>
            @endif
            
            @php $accessAble = AccessHelper::isAccessAble(auth()->user()->id, 'chat'); @endphp
            @if($accessAble != 'denied')
            <li class=" @if($routeName=='ichat' || $routeName=='groupchat'){{'sidebar-group-active open'}}@endif nav-item"><a href="javascript:void(0)"><i class="feather icon-message-circle"></i><span class="menu-title" data-i18n="Ecommerce">Chat Panel</span></a>
                <ul class="menu-content">
                    <li @if($routeName=='ichat' )class="active" @endif><a href="{{route('ichat')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Blog">Individual chat</span></a>
                    </li>
                    <li @if($routeName=='groupchat' )class="active" @endif><a href="{{route('groupchat')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Story">Group chat</span></a>
                    </li>
                </ul>
            </li>
            @endif

            @php $accessAble = AccessHelper::isAccessAble(auth()->user()->id, 'donationreport'); @endphp
            @if($accessAble != 'denied')
            <li class=" @if($routeName=='' ){{'sidebar-group-active open'}}@endif nav-item"><a href="#"><i class="fa fa-money"></i><span class="menu-title" data-i18n="Ecommerce">Finance </span></a>
                <ul class="menu-content">
                    <li @if($routeName=='' )class="active" @endif><a href="#"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Blog">Donation/Payment</span></a>
                    </li>
                    <li @if($routeName=='' )class="active" @endif><a href="#"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Story">Expenses</span></a>
                    </li>
                </ul>
            </li>
            @endif
            <!-- @php $accessAble = AccessHelper::isAccessAble(auth()->user()->id, 'donationreport'); @endphp
            @if($accessAble != 'denied')
            <li><a href="#"><i class="feather icon-file-text"></i><span class="menu-item" data-i18n="volunteer">Document</span></a>
            </li>
            @endif -->
            @if(auth()->user()->role_id==0)
            <li><a href="#"><i class="feather icon-bar-chart"></i><span class="menu-item" data-i18n="volunteer">Reports</span></a>
            </li>
            @endif
            @if(auth()->user()->role_id==0)
            <li class=" @if($routeName=='volunteers_permissions' || $routeName=='organization_permissions'){{'sidebar-group-active open'}}@endif nav-item"><a href="#"><i class="feather icon-grid"></i><span class="menu-title" data-i18n="Ecommerce">Role Management</span></a>
                <ul class="menu-content">
                    <li @if($routeName=='volunteers_permissions' )class="active" @endif><a href="{{route('volunteers_permissions')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Shop">Volunteer</span></a>
                    </li>
                    <li @if($routeName=='organization_permissions' )class="active" @endif><a href="{{route('organization_permissions')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Shop">Organization</span></a>
                    </li>
                </ul>
            </li>
            @endif
            @if(auth()->user()->role_id==0)
            <li class=" @if($routeName=='setting'){{'sidebar-group-active open'}}@endif nav-item"><a href="#"><i class="feather icon-settings"></i><span class="menu-title" data-i18n="Ecommerce">Settings</span></a>
                <ul class="menu-content">
                    <li @if($routeArgType=='education' )class="active" @endif><a href="{{route('setting','education')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Shop">Education</span></a>
                    </li>
                    <li @if($routeArgType=='bloodgroup' )class="active" @endif><a href="{{route('setting','bloodgroup')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Checkout">BloodGroup</span></a>
                    </li>
                    <li @if($routeArgType=='causes_interested' )class="active" @endif><a href="{{route('setting','causes_interested')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Checkout">Interest</span></a>
                    </li>
                    <li @if($routeArgType=='institutions' )class="active" @endif><a href="{{route('setting','institutions')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Checkout">Institution</span></a>
                    </li>
                    <li @if($routeArgType=='language_known' )class="active" @endif><a href="{{route('setting','language_known')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Checkout">Language Known</span></a>
                    </li>
                    <li @if($routeArgType=='occupation' )class="active" @endif><a href="{{route('setting','occupation')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Checkout">Occupation</span></a>
                    </li>
                    <li @if($routeArgType=='tags' )class="active" @endif><a href="{{route('setting','tags')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Checkout">Tags</span></a>
                    </li>
                </ul>
            </li>
            @endif
            <?php /* 
            <li @if($routeName=='volunteer')class="active"@endif><a href="{{route('volunteer')}}"><i class="feather icon-user"></i><span class="menu-item" data-i18n="volunteer">Volunteers</span></a>
            </li>
            <li @if($routeName=='campaign')class="active"@endif><a href="{{route('campaign')}}"><i class="fa fa-bullhorn"></i><span class="menu-item" data-i18n="campaign">Campaign</span></a>
            </li>
            <li @if($routeName=='task')class="active"@endif><a href="{{route('task')}}"><i class="feather icon-watch"></i><span class="menu-item" data-i18n="task">Task</span></a>
            </li>
            
            <li @if($routeName=='application')class="active"@endif><a href="{{route('application','organization')}}"><i class="feather icon-users"></i><span class="menu-item" data-i18n="organization">Organization</span></a>
            </li>
            */ ?>


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