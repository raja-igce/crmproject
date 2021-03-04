
 @extends('layouts.main')
 @section('appcss')
 <link rel="stylesheet" type="text/css" href="{{env('APP_URL')}}public/app-assets/vendors/css/tables/datatable/datatables.min.css">
 <link rel="stylesheet" type="text/css" href="{{env('APP_URL')}}public/app-assets/vendors/css/tables/datatable/select.dataTables.min.css">
 <link rel="stylesheet" type="text/css" href="{{env('APP_URL')}}public/app-assets/css/pages/data-list-view.css">
 <link rel="stylesheet" type="text/css" href="{{env('APP_URL')}}public/app-assets/vendors/css/forms/select/select2.min.css">
 <link rel="stylesheet" type="text/css" href="{{env('APP_URL')}}public/app-assets/css/plugins/forms/validation/form-validation.css">
 <link rel="stylesheet" type="text/css" href="{{env('APP_URL')}}public/app-assets/css/plugins/forms/wizard.css">
 <link rel="stylesheet" type="text/css" href="{{env('APP_URL')}}public/app-assets/vendors/css/extensions/toastr.css">
 <link rel="stylesheet" type="text/css" href="{{env('APP_URL')}}public/assets/css/custome.css">
 <style>
 </style>
 @stop
 @section('content')
 <div class="content-wrapper" id="UserVueApp">
            <div class="content-header row">
              <div class="content-header-left col-md-9 col-12 mb-2">
                  <div class="row breadcrumbs-top">
                      <div class="col-12">
                          <h2 class="content-header-title float-left mb-0">Volunteers</h2>
                          <?php /*
                          <div class="breadcrumb-wrapper col-12">
                              <ol class="breadcrumb">
                                  <li class="breadcrumb-item"><a href="index.html">Home</a>
                                  </li>
                                  <li class="breadcrumb-item"><a href="#">Icons</a>
                                  </li>
                              </ol>
                          </div> */?>
                      </div>
                  </div>
              </div>
            </div>
            <div class="content-body">
                <!-- User Table -->
                <section>
                    <!-- Begin: User form -->
                    <div class="card">
                        <div class="card-body">
                          <form id="changePasswordForm" class="changePasswordForm" method="post">
                                {{csrf_field()}}
                                <div class=" col-xs-12 col-sm-8">
                                  <div class="form-group ">
                                    <label class="control-label">Current password *</label>
                                    <input data-msg="Please enter current password" name="old-password" data-rule-minlength="6" data-msg-minlength="Password sould be 6 character long"  data-validation="required" class="form-control input-brand"  type="password"  id="old_password">
                                  </div>
                                </div>
                                <div class=" col-xs-12 col-sm-8">
                                  <div class="form-group ">
                                    <label class="control-label">New password *</label>
                                    <input data-msg="Please enter new password" id="pass_confirmation" data-rule-minlength="6" data-msg-minlength="Password sould be 6 character long"  name="pass_confirmation" data-validation="required" class="form-control input-brand"  type="password" >
                                  </div>
                                </div>
                                <div class=" col-xs-12 col-sm-8">
                                  <div class="form-group ">
                                    <label class="control-label">Re-enter new password *</label>
                                    <input data-msg="Please enter confirm password same as new password" name="pass" data-validation="confirmation" data-rule-minlength="6"  data-msg-minlength="Password sould be 6 character long"  class="form-control input-brand"  type="password" id="confirm_password">
                                  </div>
                                </div>
                                <div class="col-xs-12 col-sm-8">
                                  <div class="bottom-btns">
                                    <div class="">
                                      <button type="button" class="btn btn-primary mt-2 round opensider waves-effect waves-light changePasswordFormSubmit">Change password</button>
                                    </div>
                                  </div>
                                </div>
                              </form>
                        </div>
                    </div>
                    <!-- End: User form -->

                    <!-- Begin Users Profile -->



           </section>
                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Users Profile -->
                </section>
                <!-- User Table -->
        </div>
      </div>

 @stop

 @section('appfooter')
 <!-- <script src="{{env('APP_URL')}}public/app-assets/vendors/js/tables/datatable/datatables.min.js"></script>
 <script src="{{env('APP_URL')}}public/app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js"></script>
 <script src="{{env('APP_URL')}}public/app-assets/vendors/js/tables/datatable/dataTables.select.min.js"></script>
 <script src="{{env('APP_URL')}}public/app-assets/js/scripts/datatables/user-datatable.js"></script> -->
  <script src="{{env('APP_URL')}}public/assets/js/vue.paging.js"></script>
  <script src="{{env('APP_URL')}}public/app-assets/vendors/js/extensions/jquery.steps.min.js"></script>
  <script src="{{env('APP_URL')}}public/app-assets/vendors/js/forms/select/select2.full.min.js"></script>
  <script src="{{env('APP_URL')}}public/app-assets/vendors/js/forms/validation/jquery.validate.min.js"></script>
  <script src="{{env('APP_URL')}}public/app-assets/vendors/js/extensions/toastr.min.js"></script>
  <script src="{{env('APP_URL')}}public/app-assets/vendors/js/extensions/sweetalert2.all.min.js"></script>
  <script>
$(document).ready(function(){
  $("#changePasswordForm").validate({
    rules: {
      // simple rule, converted to {required:true}
      'old-password': "required",
      // compound rule
      'pass_confirmation': {
        required: true
      },
      'pass':{
        required: true,
        equalTo: "#pass_confirmation"
      }
    },
  });



  $('.changePasswordFormSubmit').click(function(e) {
    var form = $('#changePasswordForm');
    form.validate();
    var valid = form.valid();
    if (valid) {
      $.ajax({
        url: "{{route('changepassword')}}",
        method: 'POST',
        data: form.serialize(),
        type: 'json',
        success: function(response) {
          if (response.success == false) {
            toastr.error(response.msg);
          } else {
            // $('#pass_confirmation').val('');
            // $('#old_password').val('');
            // $('#confirm_password').val('');
            toastr.success(response.msg);
          }
        },
        error: function(response) {
          toastr.error("Please try again.");
        }
      });
    }
  });


});



</script>





 @stop
