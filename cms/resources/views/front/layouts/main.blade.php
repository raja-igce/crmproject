<!DOCTYPE HTML>
<html class="no-js">
  @include("front.layouts.head")
<body class="home">
<!--[if lt IE 7]>
	<p class="chromeframe">You are using an outdated browser. <a href="http://browsehappy.com/">Upgrade your browser today</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to better experience this site.</p>
<![endif]-->
<div class="body">
    @include("front.layouts.header")
    @yield('content')
    @include('front.layouts.footer')
</div>

@yield('frontjs')
</body>
</html>
