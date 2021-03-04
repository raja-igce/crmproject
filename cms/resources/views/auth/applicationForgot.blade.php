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
    <title>Forgot Password - Vuesax - Bootstrap HTML admin template</title>
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
    <!-- END: Custom CSS-->

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
                    <div class="col-xl-7 col-md-9 col-10 d-flex justify-content-center px-0">
                        <div class="card bg-authentication rounded-0 mb-0">
                            <div class="row m-0">
                                <div class="col-lg-6 d-lg-block d-none text-center align-self-center">
                                    <img src="{{env('APP_URL')}}public/app-assets/images/pages/forgot-password.png" alt="branding logo">
                                </div>
                                <div class="col-lg-6 col-12 p-0">
                                    <div class="card rounded-0 mb-0 px-2 py-1">
                                        <div class="card-header pb-1">
                                            <div class="card-title">
                                                <h4 class="mb-0">Recover your password</h4>
                                            </div>
                                        </div>
                                        <p class="px-2 mb-0">Please enter your e-mail/phone number and we'll send you temporary password to reset your password.</p>
                                        <div class="card-content">
                                            <div class="card-body">
                                                <form action="" id="frmforgot" name="frmforgot">
                                                    <div class="form-group">
                                                        <input type="hidden" id="type" name="type" value="email">
                                                        <input type="hidden" id="_token" name="_token" value="{{csrf_token()}}">
                                                        <label for="inputEmail">Email/Phone</label>
                                                        <input type="text" id="inputEmail" name="inputEmail" class="form-control" data-rule-required="true" data-rule-email="true"  placeholder="Email/Phone">
                                                    </div>
                                                    <div class="float-md-left d-block mb-1">
                                                        <a href="{{route('logins')}}" class="btn btn-outline-primary btn-block px-75">Back to Login</a>
                                                    </div>
                                                    <div class="float-md-right d-block mb-1">
                                                        <button type="button" onclick="forgotpassword()" class="btn btn-primary btn-block px-75">Recover Password</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
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
                                            <input type="text" placeholder="OTP" id="txtOTP" name="txtOTP"  data-rule-required="true" data-rule-minlength="4"  data-rule-maxlength="4"  class="form-control">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                    <a href="javascript:void(0)" class="btn btn-outline-primary float-left" style="position:absolute;left:15px;float:left" onclick="forgotpassword()" >Resend OTP</a>
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
    <!-- END: Content-->


    <!-- BEGIN: Vendor JS-->
    <script src="{{env('APP_URL')}}public/app-assets/vendors/js/vendors.min.js"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{env('APP_URL')}}public/app-assets/js/core/app-menu.js"></script>
    <script src="{{env('APP_URL')}}public/app-assets/js/core/app.js"></script>
    <script src="{{env('APP_URL')}}public/app-assets/js/scripts/components.js"></script>
    <script src="{{env('APP_URL')}}public/app-assets/vendors/js/forms/validation/jquery.validate.min.js"></script>
    <link rel="stylesheet" type="text/css" href="{{env('APP_URL')}}public/app-assets/vendors/css/extensions/toastr.css">
    <script src="{{env('APP_URL')}}public/app-assets/vendors/js/extensions/toastr.min.js"></script>
    
    <script>
 function validateEmail(email) {
  var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  if(!regex.test(email)) {
    return false;
  }else{
    return true;
  }
}

function validatePhone(email) {
  var regex = /\(?([0-9]{3})\)?([ .-]?)([0-9]{3})\2([0-9]{4})/;
  if(!regex.test(email)) {
    return false;
  }else{
    return true;
  }
}
 

function verifycode(){
                    if($('#frmotp').valid()){    
                            jQuery.ajax({
                                url:'{{route("updatePassword")}}',
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
                                                $('#frmforgot')[0].reset();
                                                $('#frmotp')[0].reset();
                                                if(confirm("New password sent to your phone. Back to login")){
                                                    window.location.href = "{{route('logins')}}";
                                                }
                                                return false;
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
        }
function forgotpassword(){
                 
                var inputEmail =  $('#inputEmail').val();
                if($.trim(inputEmail)==""){
                    toastr.error("Enter email or phone",'Error!');
                    return false;
                }
                var email = validateEmail(inputEmail);
                var phone  = validatePhone(inputEmail);
                
                if((email || !phone) && (!email || phone)){
                    toastr.error("Enter proper email or phone",'Error!');
                    return false;
                }
                if(email){
                    $("#type").val("email");
                }else{
                    $("#type").val("phone");
                    $("#txtPhone").val(inputEmail);
                } 
                    
                jQuery.ajax({
                    url:'{{route("forgotpassword")}}',
                    type:'post',
                    asyc:false,
                    data: $('#frmforgot').serialize(),
                    headers: {
                        'X-CSRF-TOKEN': "{{csrf_token()}}"
                    },
                    beforeSend:function(){
                        
                    },
                    success:function(res){
                            if(res.status){
                                if(phone){
                                    $("#otpmodal").modal("show");
                                    return false;
                                }
                                toastr.success(res.msg,'Error!');
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
    </script>

</body>
<!-- END: Body-->

</html>