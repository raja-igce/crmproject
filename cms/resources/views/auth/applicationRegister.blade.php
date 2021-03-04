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
        }
        
        .form-label-group > input:not(:focus):not(:placeholder-shown) ~ label.error{
            color: red !important;
        }
        .form-group{
            margin-bottom:5px !important;
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
                                                <h4 class="mb-0">Create Account</h4>
                                            </div>
                                        </div>
                                        <ul class="nav nav-tabs nav-fill" id="myTab" role="tablist">
                                            <li class="nav-item">
                                            <a class="nav-link active" id="step1-fill" data-toggle="tab" href="#step1" role="tab" aria-controls="home-fill" aria-selected="true">Volunteer Signup</a>
                                            </li>
                                            <li class="nav-item">
                                            <a class="nav-link" id="step2-fill" data-toggle="tab" href="#step2" role="tab" aria-controls="profile-fill" aria-selected="false">Organization Signup</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content pt-0">
                                            <div class="tab-pane active" id="step1" role="tabpanel" aria-labelledby="step1-fill">
                                                 
                                                <p class="px-2 mb-2">For the individual user who wishes to become a volunteer with iNNER-EYE.</p>
                                                    <div class="card-content">
                                                        <div class="card-body pt-0">
                                                            <form action="" id="frmstep1" name="frmstep1">
                                                                <div class="form-group">
                                                                    <input type="hidden" id="type" name="type" value="volunteer"> 
                                                                    <label  class="lblmain"  for="inputName">First Name* </label> <label class="error" for="inputName"></label>
                                                                    <input type="text" id="inputName" name="inputName" class="form-control" placeholder="First Name" data-rule-required="true"  data-msg="First name required" >
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="hidden" id="type" name="type" value="volunteer"> 
                                                                    <label  class="lblmain"  for="last_name">Last Name* </label> <label class="error" for="last_name"></label>
                                                                    <input type="text" id="last_name" name="last_name" class="form-control" placeholder="Last Name" data-rule-required="true"  data-msg="Last name required" >
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="lblmain" for="inputEmail">Email* </label>
                                                                    <label class="error" for="inputEmail"></label>
                                                                    <input type="email" id="inputEmail" name="inputEmail" class="form-control" placeholder="Email" data-rule-required="true" data-msg="Email required">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="lblmain" for="inputPhone">Phone*</label>
                                                                    <label class="error" for="inputPhone"></label>
                                                                    <input type="text" id="inputPhone" name="inputPhone" maxlength="10" class="form-control" placeholder="Phone" data-rule-required="true" data-rule-digits="true" data-msg="Phone number required">
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-lg-6 col-sm-12 col-xs-12">
                                                                        <div class="form-group ">
                                                                            <label class="lblmain" for="inputPassword">Password*</label>
                                                                            <input type="password" id="inputPassword" name="inputPassword" class="form-control" placeholder="Password" required data-msg="Password required">
                                                                            <label class="error" for="inputPassword"></label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-6 col-sm-12 col-xs-12">
                                                                        <div class="form-group ">
                                                                            <label class="lblmain" for="inputConfPassword">Confirm Password*</label>
                                                                            <input type="password" id="inputConfPassword" name="inputConfPassword" class="form-control" placeholder="Confirm Password" required data-msg="Confirm pwd required">
                                                                            <label class="error" for="inputConfPassword"></label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <div class="col-12">
                                                                        <fieldset class="checkbox">
                                                                            <div class="vs-checkbox-con vs-checkbox-primary pull-left">
                                                                                <input type="checkbox" name="txtterm" id="txtterm"   data-rule-required="true" data-msg="Accept term and condition.">
                                                                                <span class="vs-checkbox">
                                                                                    <span class="vs-checkbox--check">
                                                                                        <i class="vs-icon feather icon-check"></i>
                                                                                    </span>
                                                                                </span>
                                                                            </div>
                                                                            <span class="pull-left" style="margin-top:5px"> <a target="_blank" href="{{route('termscondition')}}">I accept the terms & conditions.</a> </span>
                                                                        </fieldset>
                                                                        <label for="txtterm" class="error"></label>
                                                                    </div>
                                                                </div>
                                                                <a href="{{route('logins')}}" class="btn btn-outline-primary float-left btn-inline mb-50">Login</a>
                                                                <button type="button" onclick="verifydocuments('frmstep1')" class="btn btn-primary float-right btn-inline mb-50">Register</a>
                                                            </form>
                                                        </div>
                                                    </div>
                                                 
                                            </div> <!-- end of 1 volunteer -->
                                            <div class="tab-pane " id="step2" role="tabpanel" aria-labelledby="step2-fill">
                                                <p class="px-2 mb-2">For the other Self-Help Groups/NGOs/NPOs which wish to join & work with iNNER-EYE.</p>
                                                    <div class="card-content">
                                                        <div class="card-body pt-0">
                                                            <form action="index.html"  id="frmstep2" name="frmstep2">
                                                                    <input type="hidden" id="type" name="type" value="organization"> 
                                                                <div class="form-group">
                                                                    <label for="inputName"  class="lblmain">Organization Name* </label>
                                                                    <label for="inputName" class="error"> </label>
                                                                    <input type="text" id="inputName" name="inputName" class="form-control" placeholder="Organization Name" required data-msg="Organization Name required">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="inputEmail" class="lblmain">Email* </label>
                                                                    <label for="inputEmail" class="error"> </label>
                                                                    <input type="email" id="inputEmail" name="inputEmail" class="form-control" placeholder="Email" required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="inputPhone" class="lblmain">Phone* </label>
                                                                    <label for="inputPhone" class="error"> </label>
                                                                    <input type="text" id="inputPhone" name="inputPhone" maxlength="10" class="form-control" placeholder="Phone"  data-rule-required="true" data-rule-digits="true">
                                                                </div>
                                                                <div class="row">
                                                                    <div class="form-group col-lg-6 col-sm-12 col-xs-12">
                                                                        <label for="inputPassword" class="lblmain">Password</label>
                                                                        <input type="password" id="inputPassword" name="inputPassword" class="form-control" placeholder="Password" required>
                                                                        <label for="inputPassword" class="error"></label>
                                                                    </div>
                                                                    <div class="form-group col-lg-6 col-sm-12 col-xs-12">
                                                                        <label for="inputConfPassword" class="lblmain">Confirm Password</label>
                                                                        <input type="password" id="inputConfPassword" name="inputConfPassword" class="form-control" placeholder="Confirm Password" required>
                                                                        <label for="inputConfPassword" class="error"></label>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <div class="col-12">
                                                                        <fieldset class="checkbox">
                                                                            <div class="vs-checkbox-con vs-checkbox-primary pull-left">
                                                                                <input type="checkbox" name="txtterm" id="txtterm"   data-rule-required="true" data-msg="Accept term and condition.">
                                                                                <span class="vs-checkbox">
                                                                                    <span class="vs-checkbox--check">
                                                                                        <i class="vs-icon feather icon-check"></i>
                                                                                    </span>
                                                                                </span>
                                                                                
                                                                            </div>
                                                                            <span class="pull-left" style="margin-top:5px"> <a  target="_blank" href="{{route('termscondition')}}">I accept the terms & conditions.</a> </span>
                                                                        </fieldset>
                                                                        <label for="txtterm" class="error"></label>
                                                                    </div>
                                                                </div>
                                                                <a href="{{route('logins')}}" class="btn btn-outline-primary float-left btn-inline mb-50">Login</a>
                                                                <button type="button" onclick="verifydocuments('frmstep2')" class="btn btn-primary float-right btn-inline mb-50">Register</a>
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
                <!-- modal start -->
                    <div class="modal fade text-left" id="otpmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="myModalLabel33"></h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="#" id="frmotp" name="frmotp">
                                    <div class="modal-body">
                                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                                        <input type="hidden" value="" id="txtPhone" name="txtPhone">
                                        <label>OTP </label>
                                        <div class="form-group">
                                            <input type="text" placeholder="OTP" id="txtOTP" name="txtOTP" data-rule-required="true" class="form-control">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <a href="javascript:void(0)" class="btn btn-outline-primary float-left" style="position:absolute;left:15px;float:left" onclick="verifydocuments()" >Resend OTP</a>
                                        <button type="button" class="btn btn-primary" onclick="verifycode()" >Accept</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div> 
                <!-- modal end -->
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
        function verifycode(formid){
                    var isValidForm =  $('#frmotp').valid();
                    if(isValidForm){
                            
                            jQuery.ajax({
                                url:'{{route("verifyOTP")}}',
                                type:'post',
                                asyc:false,
                                data: $('#frmotp').serialize(),
                                headers: {
                                    'X-CSRF-TOKEN': "{{csrf_token()}}"
                                },
                                beforeSend:function(){
                                    
                                },
                                success:function(res){
                                        
                                        if(res.status){
                                            $("#otpmodal").modal("hide");
                                            $("#otpmodal").modal("hide");
                                            adduser();
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
                         
                    }
       } 
       function adduser(){
                formid=formIDs;
                var phone = $('#'+formid+" #inputPhone").val();
                $("#myModalLabel33").html("OPT sent to "+phone);
                $("#txtPhone").val(phone);
                jQuery.ajax({
                    url:'{{route("addUser")}}',
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
                                 window.location.href="{{route('welcome')}}";
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
                     
       }
       function verifydocuments(formid = formIDs){
                    formIDs = formid;
                    var isValidForm =  $('#'+formid).valid();
                    // $(".valid").next(".lblmain").show();
                    // $(".error").next(".error").show();
                    if(isValidForm){
                            var phone = $('#'+formid+" #inputPhone").val();
                            $("#myModalLabel33").html("OPT sent to "+phone);
                            $("#txtPhone").val(phone);
                            jQuery.ajax({
                                url:'{{route("verifyForm")}}',
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
                                            $("#otpmodal").modal("show");
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
                        // $(".error").next(".lblmain").hide();
                        // $(".error").next(".error").show();
                        // $(".valid").next(".lblmain").show();
                        // $(".valid").next(".error").hide();
                    }
       } 
     
       jQuery('#frmstep1').validate({
                rules : {
                    inputPassword : {
                        required:true,
                        minlength : 5
                    },
                    inputConfPassword : {
                        required:true,
                        minlength : 5,
                        equalTo : "#inputPassword"
                    },
                    inputEmail:{
                        required:true,
                        email:true
                    },inputPhone:{
                        required: true,
                        digits: true,
                        minlength: 10,
                        maxlength: 10,
                    }
            },messages: {
                    inputPassword : {
                            required:"Password required",
                            minlength : "Minimum 5 character"
                        },
                        inputConfPassword : {
                            required:"Password required",
                            minlength : "Minimum 5 character",
                            equalTo : "Not matched with Password"
                        },
                        inputEmail:{
                            required:"Email required",
                            email:"Enter proper email format"
                        },
                        inputPhone:{
                            required: "Please enter phone number",
                            digits: "Please enter valid phone number",
                            minlength: "Phone number accept only 10 digits",
                            maxlength: "Phone number accept only 10 digits",
                        }
            } 
        });
        jQuery('#frmstep2').validate({
                rules : {
                    inputPassword : {
                        required:true,
                        minlength : 5
                    },
                    inputConfPassword : {
                        required:true,
                        minlength : 5,
                        equalTo : "#frmstep2 #inputPassword"
                    },
                    inputEmail:{
                        required:true,
                        email:true
                    },inputPhone:{
                        required: true,
                        digits: true,
                        minlength: 10,
                        maxlength: 10,
                    }
            },messages: {
                    inputPassword : {
                            required:"Password required",
                            minlength : "Minimum 5 character"
                        },
                        inputConfPassword : {
                            required:"Password required",
                            minlength : "Minimum 5 character",
                            equalTo : "Not matched with Password"
                        },
                        inputEmail:{
                            required:"Email required",
                            email:"Enter proper email format"
                        },
                        inputPhone:{
                            required: "Please enter phone number",
                            digits: "Please enter valid phone number",
                            minlength: "Phone number accept only 10 digits",
                            maxlength: "Phone number accept only 10 digits",
                        }
            } 
        });
        
    </script>
</body>
<!-- END: Body-->

</html>