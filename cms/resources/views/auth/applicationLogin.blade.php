<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Vuesax admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Vuesax admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>Register Page - Vuesax - Bootstrap HTML admin template</title>
    <link rel="apple-touch-icon" href="{{env('APP_URL')}}public/app-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="{{env('APP_URL')}}public/app-assets/images/ico/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{env('APP_URL')}}public/app-assets/vendors/css/vendors.min.css">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{env('APP_URL')}}public/app-assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="{{env('APP_URL')}}public/app-assets/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="{{env('APP_URL')}}public/app-assets/css/colors.css">
    <link rel="stylesheet" type="text/css" href="{{env('APP_URL')}}public/app-assets/css/components.css">
    <link rel="stylesheet" type="text/css" href="{{env('APP_URL')}}public/app-assets/css/themes/dark-layout.css">
    <link rel="stylesheet" type="text/css" href="{{env('APP_URL')}}public/app-assets/css/themes/semi-dark-layout.css">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{env('APP_URL')}}public/app-assets/css/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="{{env('APP_URL')}}public/app-assets/css/core/colors/palette-gradient.css">
    <link rel="stylesheet" type="text/css" href="{{env('APP_URL')}}public/app-assets/css/pages/authentication.css">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{env('APP_URL')}}public/assets/css/style.css">
    <style>
        .error{
            color: red !important;
            z-index: 99999999;
        }
    </style>

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern semi-dark-layout 1-column  navbar-floating footer-static bg-full-screen-image  blank-page blank-page" data-open="click" data-menu="vertical-menu-modern" data-col="1-column" data-layout="semi-dark-layout">
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <section class="row flexbox-container">
                    <div class="col-xl-8 col-10 d-flex justify-content-center">
                        <div class="card bg-authentication rounded-0 mb-0">
                            <div class="row m-0">
                                <div class="col-lg-6 d-lg-block d-none text-center align-self-center pl-0 pr-3 py-0">
                                    <img src="{{env('APP_URL')}}public/app-assets/images/pages/register.jpg" alt="branding logo">
                                </div>
                                <div class="col-lg-6 col-12 p-0">
                                    <div class="card rounded-0 mb-0 p-2">
                                        <div class="card-header pt-50 pb-1">
                                            <div class="card-title">
                                                <h4 class="mb-0">Login</h4>
                                            </div>
                                        </div>
                                        <ul class="nav nav-tabs nav-fill" id="myTab" role="tablist">
                                            <li class="nav-item">
                                            <a class="nav-link active" id="step1-fill" data-toggle="tab" href="#step1" role="tab" aria-controls="home-fill" aria-selected="true">Volunteer Login</a>
                                            </li>
                                            <li class="nav-item">
                                            <a class="nav-link" id="step2-fill" data-toggle="tab" href="#step2" role="tab" aria-controls="profile-fill" aria-selected="false">Organization Login</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content pt-1">
                                            <div class="tab-pane active" id="step1" role="tabpanel" aria-labelledby="step1-fill">
                                                    <p class="px-2 mb-2">For the individual volunteer who registered with iNNER-EYE.</p>
                                                    <div class="card-content">
                                                        <div class="card-body pt-0">
                                                            <form action="" id="frmstep1" name="frmstep1">
                                                                <div class="form-label-group">
                                                                    <input type="hidden" id="type" name="type" value="volunteer"> 
                                                                     
                                                                </div>
                                                                 
                                                                <div class="form-group">
                                                                    <label for="inputPhone">Phone</label>
                                                                    <input type="text" id="inputPhone" name="inputPhone" class="form-control" placeholder="Phone" data-rule-required="true" data-rule-digits="true">
                                                                    
                                                                     
                                                                </div>
                                                                
                                                                <div class="form-group ">
                                                                    <label for="inputPassword">Password</label>
                                                                    <input type="password" id="inputPassword" name="inputPassword" class="form-control" placeholder="Password" required>
                                                                </div>
                                                                 
                                                                <div class="form-group row">
                                                                    <div class="col-12">
                                                                        <fieldset class="checkbox">
                                                                            <div class="vs-checkbox-con vs-checkbox-primary pull-left">
                                                                                <input type="checkbox" checked>
                                                                                <span class="vs-checkbox">
                                                                                    <span class="vs-checkbox--check">
                                                                                        <i class="vs-icon feather icon-check"></i>
                                                                                    </span>
                                                                                </span>
                                                                                <span class=""> Remember Me.</span>
                                                                            </div>
                                                                            <a href="{{route('forgotpassword')}}" class="pull-right">Forgot Password?</a>
                                                                        </fieldset>
                                                                    </div>
                                                                </div>
                                                                <a href="{{route('registration')}}" class="btn btn-outline-primary float-left btn-inline mb-50">Register</a>
                                                                <button type="button" onclick="verifydocuments('frmstep1')" class="btn btn-primary float-right btn-inline mb-50">Login</a>
                                                            </form>
                                                        </div>
                                                    </div>
                                                 
                                            </div> <!-- end of 1 volunteer -->
                                            <div class="tab-pane " id="step2" role="tabpanel" aria-labelledby="step2-fill">
                                                    <p class="px-2 mb-2">For the other Self-Help Groups/NGOs/NPOs which registered with iNNER-EYE.</p>
                                                     
                                                     <div class="card-content">
                                                        <div class="card-body pt-0">
                                                            <form action="index.html"  id="frmstep2" name="frmstep2">
                                                                    <input type="hidden" id="type" name="type" value="organization"> 
                                                                 
                                                                
                                                                <div class="form-group">
                                                                    <label for="inputPhone">Phone</label>
                                                                    <input type="text" id="inputPhone" name="inputPhone" class="form-control" placeholder="Phone" required>
                                                                </div>
                                                                 
                                                                <div class="form-group ">
                                                                    <label for="inputPassword">Password</label>
                                                                    <input type="password" id="inputPassword" name="inputPassword" class="form-control" placeholder="Password" required>
                                                                </div>
                                                                
                                                                <div class="form-group row">
                                                                    <div class="col-12">
                                                                        <fieldset class="checkbox">
                                                                            <div class="vs-checkbox-con vs-checkbox-primary pull-left">
                                                                                <input type="checkbox" checked>
                                                                                <span class="vs-checkbox">
                                                                                    <span class="vs-checkbox--check">
                                                                                        <i class="vs-icon feather icon-check"></i>
                                                                                    </span>
                                                                                </span>
                                                                                <span class=""> Remember Me.</span>
                                                                            </div>
                                                                            <a href="{{route('forgotpassword')}}" class="pull-right">Forgot Password?</a>
                                                                        </fieldset>
                                                                    </div>
                                                                </div>
                                                                <a href="{{route('registration')}}" class="btn btn-outline-primary float-left btn-inline mb-50">Register</a>
                                                                <button type="button" onclick="verifydocuments('frmstep2')" class="btn btn-primary float-right btn-inline mb-50">Login</a>
                                                            </form>
                                                        </div>
                                                    </div>
                                            </div> <!-- end of 2 organization -->
                                        </div>    
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                 
            </div>
        </div>
    </div>
 
    <script src="{{env('APP_URL')}}public/app-assets/vendors/js/vendors.min.js"></script>
    <script src="{{env('APP_URL')}}public/app-assets/js/core/app-menu.js"></script>
    <script src="{{env('APP_URL')}}public/app-assets/js/core/app.js"></script>
    <script src="{{env('APP_URL')}}public/app-assets/js/scripts/components.js"></script>
    <script src="{{env('APP_URL')}}public/app-assets/vendors/js/forms/validation/jquery.validate.min.js"></script>
    <link rel="stylesheet" type="text/css" href="{{env('APP_URL')}}public/app-assets/vendors/css/extensions/toastr.css">
    <script src="{{env('APP_URL')}}public/app-assets/vendors/js/extensions/toastr.min.js"></script>
    
    <script>
        var formIDs = "frmstep1";
        function verifydocuments(formid){
                    formIDs = formid;
                    var isValidForm =  $('#'+formid).valid();
                 
                    if(isValidForm){
                            var phone = $('#'+formid+" #inputPhone").val();
                            $("#myModalLabel33").html("OPT sent to "+phone);
                            $("#txtPhone").val(phone);
                            jQuery.ajax({
                                url:'{{route("loginApp")}}',
                                type:'post',
                                asyc:false,
                                data: $('#'+formid).serialize(),
                                headers: {
                                    'X-CSRF-TOKEN': "{{csrf_token()}}"
                                },
                                beforeSend:function(){
                                    
                                },
                                success:function(res){
                                        if(res.status){
                                            toastr.success(res.msg,'Success!');
                                            window.location.href="{{route('home')}}"; 
                                        }else{
                                            toastr.error(res.msg,'Error!');
                                        }
                                    },
                                    error:function(res){
                                        toastr.error(res.msg,'Error!');
                                    },
                                    complete:function(){
                                        
                                    }
                        });
                    }else{
                         return false;
                    }
       } 
        
    </script>
</body>
<!-- END: Body-->

</html>