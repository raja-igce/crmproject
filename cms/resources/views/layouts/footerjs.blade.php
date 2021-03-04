<!-- BEGIN: Vendor JS-->
<script src="{{env('APP_URL')}}public/app-assets/vendors/js/vendors.min.js"></script>
<!-- BEGIN Vendor JS-->

<!-- BEGIN: Theme JS-->
<script src="{{env('APP_URL')}}public/app-assets/js/core/app-menu.js"></script>
<script src="{{env('APP_URL')}}public/app-assets/js/core/app.js"></script>
<script src="{{env('APP_URL')}}public/app-assets/js/scripts/components.js"></script>
<script>
var sitepath = "{{env('APP_URL')}}";
</script>
<script src="{{env('APP_URL')}}public/assets/js/common.js"></script>
@yield('appfooter')
<!-- END: Theme JS-->
