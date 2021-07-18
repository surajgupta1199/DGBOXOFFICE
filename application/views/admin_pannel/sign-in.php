<!doctype html>
<html lang="en">
   <head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>Streamit  - Responsive Bootstrap 4 Admin Dashboard Template</title>
     
      <!-- Favicon -->
      <link rel="shortcut icon" href="<?php echo base_url('assets/assets/images/favicon.ico');?>" />
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="<?php echo base_url('assets/assets/css/bootstrap.min');?>.css">
      <!--Datatables -->
      <link rel="stylesheet" href="<?php echo base_url('assets/assets/css/dataTables.bootstrap4.min.css');?>">
      <!-- Typography CSS -->
      <link rel="stylesheet" href="<?php echo base_url('assets/assets/css/typography.css');?>">
      <!-- Style CSS -->
      <link rel="stylesheet" href="<?php echo base_url('assets/assets/css/style.css');?>">
      <!-- Responsive CSS -->
      <link rel="stylesheet" href="<?php echo base_url('assets/assets/css/responsive.css');?>">
       <script src="<?php echo base_url('assets/assets/js/jquery.min.js');?>"></script>
       <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
   </head>
   <body>
      <!-- loader Start -->
      <div id="loading">
         <div id="loading-center">
         </div>
      </div>
      <!-- loader END -->
        <!-- Sign in Start -->
        <section class="sign-in-page">
          <div class="container">
            <div class="row justify-content-center align-items-center height-self-center">
               <div class="col-lg-5 col-md-12 align-self-center">
                  <div class="sign-user_card ">                    
                     <div class="sign-in-page-data">
                        <div class="sign-in-from w-100 m-auto">
                           <h3 class="mb-3 text-center">Sign in</h3>
                           <form class="mt-4" id="login_form">
                              <div class="form-group">                                 
                                 <input type="email" class="form-control mb-0" id="admin_email_id" name="admin_email_id" placeholder="Enter email" autocomplete="off" required>
                              </div>
                              <div class="form-group">                                 
                                 <input type="password" class="form-control mb-0" id="admin_password" name="admin_password" placeholder="Password" required>
                              </div>
                                 <div class="sign-info">
                                    <button type="submit" class="btn btn-primary">Sign in</button>
                                    <div class="custom-control custom-checkbox d-inline-block">
                                       <input type="checkbox" class="custom-control-input" id="customCheck">
                                       <label class="custom-control-label" for="customCheck">Remember Me</label>
                                    </div>                                
                                 </div>                                    
                           </form>
                        </div>
                     </div>
                     <div class="mt-3">
                        <div class="d-flex justify-content-center links">
                           Don't have an account? <a href="<?php echo base_url('admin_login/sign_up'); ?>" class="text-primary ml-2">Sign Up</a>
                        </div>
                        <div class="d-flex justify-content-center links">
                           <a href="<?php echo base_url('admin_login/recovery_password'); ?>" class="f-link">Forgot your password?</a>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <!-- Sign in END -->
            <!-- color-customizer -->
         </div>
      </section>
        <!-- Sign in END -->
      <!-- Optional JavaScript -->
      <!-- jQuery first, then Popper.js, then Bootstrap JS -->
     
      <script src="<?php echo base_url('assets/assets/js/popper.min.js');?>"></script>
      <script src="<?php echo base_url('assets/assets/js/bootstrap.min.js');?>"></script>
      <!-- Appear JavaScript -->
      <script src="<?php echo base_url('assets/assets/js/jquery.appear.js');?>"></script>
      <!-- Countdown JavaScript -->
      <script src="<?php echo base_url('assets/assets/js/countdown.min.js');?>"></script>
      <!-- Counterup JavaScript -->
      <script src="<?php echo base_url('assets/assets/js/waypoints.min.js');?>"></script>
      <script src="<?php echo base_url('assets/assets/js/jquery.counterup.min.js');?>"></script>
      <!-- Wow JavaScript -->
      <script src="<?php echo base_url('assets/assets/js/wow.min.js');?>"></script>
      <!-- Select2 JavaScript -->
      <script src="<?php echo base_url('assets/assets/js/select2.min.js');?>"></script>
      <!-- Slick JavaScript -->
      <script src="<?php echo base_url('assets/assets/js/slick.min.js');?>"></script>
      <!-- Owl Carousel JavaScript -->
      <script src="<?php echo base_url('assets/assets/js/owl.carousel.min.js');?>"></script>
      <!-- Magnific Popup JavaScript -->
      <script src="<?php echo base_url('assets/assets/js/jquery.magnific-popup.min.js');?>"></script>
      <!-- Smooth Scrollbar JavaScript -->
      <script src="<?php echo base_url('assets/assets/js/smooth-scrollbar.js');?>"></script>
      <!-- Chart Custom JavaScript -->
      <script src="<?php echo base_url('assets/assets/js/chart-custom.js');?>"></script>
      <!-- Custom JavaScript -->
      <script src="<?php echo base_url('assets/assets/js/custom.js');?>"></script>
      <script type="text/javascript">
     $('#login_form').submit(function(e){
            e.preventDefault();
            $.ajax({
                url: '<?php echo base_url("Admin_login/login"); ?>',
                type: "POST",
                data:$(this).serialize(),
                processData:false,
                cache:false,
                dataType: "json",
                success:function(result){
                    if(result.msg == 'success'){
                        swal('info','successfully login','success');
                        window.location.replace("<?php echo base_url('admin/Admin_dashboard/'); ?>");
                    }else if(result.msg == 'deactive'){ 
                        alert('your account has been deactive please contact.');
                    }else{
                        alert('email password does not match');
                    }
                }
            })
        });
</script>
   </body>
</html>
