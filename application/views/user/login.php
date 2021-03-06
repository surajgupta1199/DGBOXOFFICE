<!doctype html>
<html lang="en-US">
<head>
   <!-- Required meta tags -->
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>DG BOXOFFICE</title>
      <!-- Favicon -->
      <link rel="shortcut icon" href="<?php echo base_url('user_assets/') ?>images/dgbox.ico" />
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="<?php echo base_url('user_assets/') ?>css/bootstrap.min.css" />
      <!-- Typography CSS -->
      <link rel="stylesheet" href="<?php  echo base_url('user_assets/') ?>css/typography.css">
      <!-- Style -->
      <link rel="stylesheet" href="<?php echo base_url('user_assets/') ?>css/style.css" />
      <!-- Responsive -->
      <link rel="stylesheet" href="<?php echo base_url('user_assets/') ?>css/responsive.css" />
       <script src="<?php echo base_url('user_assets/') ?>js/jquery-3.4.1.min.js"></script>
       <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>
<!-- MainContent -->
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
                           <input type="text" class="form-control mb-0" id="customer_mobile_no" name="customer_mobile_no" placeholder="Enter Mobile Number" autocomplete="off" required>
                        </div>
                        <div class="form-group">                                 
                           <input type="password" class="form-control mb-0" id="customer_password" name="customer_password" placeholder="Password" required>
                        </div>
                        
                           <div class="sign-info">
                              <button type="submit" class="btn btn-hover">Sign in</button>
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
                     Don't have an account? <a href="<?php echo base_url('Home/signup') ?>" class="text-primary ml-2">Sign Up</a>
                  </div>
                  <div class="d-flex justify-content-center links">
                     <a href="reset-password.html" class="f-link">Forgot your password?</a>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- MainContent End-->
<script type="text/javascript">
     $( document ).ready(function() {
        $('#customer_mobile_no').keyup(function(e){
            e.preventDefault();
            if (/\D/g.test(this.value))
            {
                this.value = this.value.replace(/\D/g, '');
                swal('Warning!','Only Number Allowed','warning');
            }
          });
      });
     $('#login_form').submit(function(e){
            e.preventDefault();
            $.ajax({
                url: '<?php echo base_url("home/login"); ?>',
                type: "POST",
                data:$(this).serialize(),
                processData:false,
                cache:false,
                dataType: "json",
                success:function(result){
                    if(result.msg == 'success'){
                        swal('info','successfully login','success');
                        window.location.replace("<?php echo base_url('home/index'); ?>");
                    }else if(result.msg == 'deactive'){ 
                        alert('your account has been deactive please contact.');
                    }else{
                        alert('email password does not match');
                    }
                }
            })
        });
</script>
<script src="<?php echo base_url('user_assets/') ?>js/popper.min.js"></script>
<!-- Bootstrap JS -->
<script src="<?php echo base_url('user_assets/') ?>js/bootstrap.min.js"></script>
<!-- Slick JS -->
<script src="<?php echo base_url('user_assets/') ?>js/slick.min.js"></script>
<!-- owl carousel Js -->
<script src="<?php echo base_url('user_assets/') ?>js/owl.carousel.min.js"></script>
<!-- select2 Js -->
<script src="<?php echo base_url('user_assets/') ?>js/select2.min.js"></script>
<!-- Magnific Popup-->
<script src="<?php echo base_url('user_assets/') ?>js/jquery.magnific-popup.min.js"></script>
<!-- Slick Animation-->
<script src="<?php echo base_url('user_assets/') ?>js/slick-animation.min.js"></script>
<!-- Custom JS-->
<script src="<?php echo base_url('user_assets/') ?>js/custom.js"></script>
</body>
</html>