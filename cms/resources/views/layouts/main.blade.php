<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">

<!-- BEGIN: Head-->
@include('layouts.head')
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern semi-dark-layout 2-columns  navbar-floating footer-static todo-application " data-open="click" data-menu="vertical-menu-modern" data-col="2-columns" data-layout="semi-dark-layout">
<!-- <body class="vertical-layout vertical-menu-modern semi-dark-layout content-left-sidebar todo-application navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="content-left-sidebar" data-layout="semi-dark-layout"> -->
    <!-- BEGIN: Main Menu-->
    @include('layouts.header')
    <!-- END: Main Menu-->

    <!-- BEGIN: Content-->
    <div class="app-content content">
        <!-- BEGIN: Header-->
        @include('layouts.header_modules')
        <!-- END: Header-->
        @yield('content')

    </div>
    <!-- END: Content-->

    <!-- BEGIN: Footer-->
    @include('layouts.footer')
    <!-- END: Footer-->
    @include('layouts.footerjs')
</body>
<!-- END: Body-->

</html>