<!doctype html>
<html lang="en-US">
<head>
   <!-- Required meta tags -->
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Streamit - Responsive Bootstrap 4 Template</title>
   <!-- Favicon -->
      <link rel="shortcut icon" href="<?php echo base_url('user_assets/') ?>images/favicon.ico" />
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
<div id="loading">
   <div id="loading-center">
   </div>
</div>
<!-- MainContent -->
<section class="sign-in-page">
   <div class="container">
      <div class="row justify-content-center align-items-center height-self-center">
         <div class="col-lg-5 col-md-12 align-self-center">
            <div class="sign-user_card ">                    
               <div class="sign-in-page-data">
                  <div class="sign-in-from w-100 m-auto">
                     <h3 class="mb-3 text-center">Sign Up</h3>
                     <form class="mt-4" id="sign_up_form">
                        <div class="form-group">                                 
                           <input type="text" class="form-control mb-0" id="customer_name" placeholder="Enter Full Name" name="customer_name" autocomplete="off" required>
                        </div>
                        <div class="form-group">                                 
                           <input type="text" class="form-control mb-0" id="customer_mobile_no" placeholder="Enter Mobile Number" name="customer_mobile_no" autocomplete="off" required>
                        </div>
                        <div class="form-group">                                 
                           <input type="password" class="form-control mb-0" id="customer_password" placeholder="Password" name="customer_password" required>
                        </div>  
                        <div class="form-group">                                 
                           <input type="password" class="form-control mb-0" id="cnf_customer_password" placeholder="Confirm Password" name="customer_confirm_password" required>
                        </div>  
                        <div class="custom-control custom-checkbox mb-3">
                           <input type="checkbox" class="custom-control-input" id="customCheck">
                           <label class="custom-control-label" for="customCheck">I accept <a href="#" class="text-primary"> Terms and Conditions</a></label>
                        </div>                      
                           
                        <button type="submit" class="btn btn-hover">Sign Up</button>
                                                            
                     </form>
                     <form class="mt-4" id="otp_verify" style="display: none;">
                        <div class="form-group">                                 
                           <input type="text" class="form-control mb-0" id="otp" placeholder="Enter One Time Password" name="otp" autocomplete="off" required>
                           <span id="timer" style="float:left" class="hide" ></span>
                           <span id="time" style="float:left"></span>   
                        </div>                
                        
                        <button type="submit" class="btn btn-hover">Verify</button>
                                                            
                     </form>
                  </div>
               </div>    
               <div class="mt-3">
                  <div class="d-flex justify-content-center links">
                     Already have an account? <a href="<?php echo base_url('Home/login') ?>" class="text-primary ml-2">Sign In</a>
                  </div>                        
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- MainContent End-->
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

  $('#otp_verify').submit(function(e){
         e.preventDefault();
         var customer_name = $('#customer_name').val();
         var customer_mobile_no = $('#customer_mobile_no').val();
         var customer_password = $('#customer_password').val();
         var otp = $('#otp').val();
          $.ajax({
              url:"<?php echo base_url(); ?>/home/otp_verify",
              type:"POST",
              data:{'customer_name':customer_name,'customer_mobile_no':customer_mobile_no,'customer_password':customer_password,'otp':otp},
              dataType: 'json',
             
              success:function(data){
                  console.log(data.msg);
                if(data.type=="success"){
                swal('Welcome To OTT !! You have been successfully registered').then((value) => {
                      if(value != null){
                           window.location.replace('<?php echo base_url('home/login'); ?>');
                      }
                });
                  
                $('#otp_verify').trigger("reset"); 
                $('#sign_up_form').trigger("reset"); 
                }
                else
                {
                  swal('Sorry!! OTP Doesnot match.');
                }
                     
            } 
        }); 
                  
  });
  $('#sign_up_form').submit(function(e){
            e.preventDefault();
            var password =  $('#customer_password').val();
            var cnf_password = $('#cnf_customer_password').val();
            
            if(password != cnf_password){
                alert('Password does not match');
                return false;
            }
            send_form_data();
  });
  $('#timer').click(function() {
      send_form_data();
  });

  function send_form_data()
  {
      var form = $('#sign_up_form').serialize();
           $.ajax({
              url:"<?php echo base_url(); ?>/home/signup",
              type:"POST",
              data:form,
              dataType: 'json',
              processData:false,
              success:function(data){
                  console.log(data.msg);
                  if(data.msg == "success"){
                    var counter = 30;
              var interval = setInterval(function() {
                  counter--;
                  // Display 'counter' wherever you want to display it.
                  if (counter <= 0) {
                      clearInterval(interval);
                      $('#time').addClass("hide");
                      $('#timer').removeClass("hide").html("Re-Send OTP");
                      return;
                  }else{
                      $('#timer').addClass("hide");
                      $('#time').removeClass("hide");
                      $('#time').text(counter+" Seconds");
                      console.log(counter);
                  }
              }, 1000);
                 
                  $('#time').html("30");
                  $('#otp_verify').show();
                  $('#sign_up_form').hide();
                  swal('info','Otp Sent On Mobile Number Enterd','success');
                 
                  }else if(data.msg == 'email exist'){ 
                        swal('info','Mobile number already registered','warning');
                  }else{
                      swal('Info!','Error Occured While Sending OTP','danger');
                  }
              }
          })
  }

   
</script>
</body>
</html>