    <!-- MainContent -->
<section class="m-profile manage-p">
    <div class="container h-100">
        <div class="row align-items-center justify-content-center h-100">
            <div class="col-lg-10">
                <div class="sign-user_card">
                    <div class="row">
                        <div class="col-lg-2">
                            <form id="upload_profile_img">
                                <?php
                                $user_image= $customer_details['customer_profile_img'] ? base_url('images/customer_profile_images/'.$customer_details['customer_profile_img']): base_url('images/customer_profile_images/user_default.jpg');
                                ?>
                                <div class="upload_profile d-inline-block">
                                <img src="<?php echo $user_image; ?>" class="profile-pic rounded-circle img-fluid" alt="user">
                                <div class="p-image">
                                    <i class="ri-pencil-line upload-button" ></i>
                                    <input class="file-upload" name="customer_profile_img" id="upload_image" type="file" accept="image/*">
                                </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-lg-10 device-margin">
                            <div class="profile-from">
                                <h4 class="mb-3">Manage Profile</h4>
                                <form class="mt-4" id="profile_form">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" class="form-control mb-0" id="customer_name"
                                            placeholder="Enter Your Name" value="<?php echo $customer_details['customer_name']; ?>" autocomplete="off" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Mobile Number</label>
                                        <input type="text" class="form-control mb-0" id="customer_mobile_no"
                                            placeholder="Enter Your Name" value="<?php echo $customer_details['customer_mobile_no']; ?>" autocomplete="off" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label>Date of Birth</label>
                                        <input type="text" class="form-control date-input basicFlatpickr mb-0" value="<?php echo $customer_details['customer_dob']; ?>" placeholder="Select Date" id="dob"
                                        required>
                                    </div>
                                    <div class="form-group d-flex flex-md-row flex-column">
                                        <div class="iq-custom-select d-inline-block manage-gen">
                                            <select name="cars" id="gender" class="form-control pro-dropdown">
                                                <option <?php if($customer_details['customer_gender'] == 1) { echo 'selected="selected"';}?> value="1">Male</option>
                                                <option <?php if($customer_details['customer_gender'] == 2) { echo 'selected="selected"';}?> value="2">Female</option>
                                            </select>
                                        </div>

                                        <div class="iq-custom-select d-inline-block lang-dropdown manage-dd">
                                            <select name="lang" class="form-control pro-dropdown" id="lang"
                                                multiple="multiple">
                                                <?php
                                                    $title = array(
                                                                'English' ,
                                                                'Hindi' ,
                                                                'Gujarati' ,
                                                                'Bengali',
                                                                'Marathi' ,
                                                                'Tamil' ,
                                                                'Intern' ,
                                                                'Kannada',
                                                            );
                                                    for ($i=0; $i<=7; $i++) {
                                                      if(in_array($title[$i], $customer_details['customer_lang_pref'])){
                                                        echo "<option selected value='$title[$i]'>$title[$i]</option>";
                                                      }else {
                                                        echo "<option value='$title[$i]'>$title[$i]</option>";
                                                      }
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="d-flex">
                                        <a class="btn btn-hover" id="btnSave">Save</a>
                                        <a class="btn btn-link">Cancel</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
$('#btnSave').click(function(e){
    e.preventDefault();
    var lang=$('#lang').val();
    var customer_name=$('#customer_name').val();
    var gender=$('#gender').val();
    var dob=$('#dob').val();
    $.ajax({
                url: '<?php echo base_url("home/manage_profile"); ?>',
                type: "POST",
                data:{'customer_name': customer_name,'customer_dob': dob,'customer_gender': gender,'customer_lang_pref': lang},
                dataType: "json",
                success:function(result){
                    if(result.msg == 'success'){
                        swal('Info!','Successfully Saved','success');
                        location.reload();
                    }
                    else{
                        
                    }
                }
            })
});

$('#upload_image').on('change',function(e){
        e.preventDefault();
        swal({
            title: "Have You Checked Photo?",
            text: "Proccessing Your request",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((send_data) => {
            if (send_data) {
                var formData = new FormData(e.target.form);
                $.ajax({
                    method:'POST', 
                    enctype: 'multipart/form-data',
                    url:'<?php echo base_url(); ?>home/update_profile',
                    data: formData,
                    contentType: false,  
                    cache: false,  
                    processData:false, 
                    success:function(data)
                    {
                        console.log(data);
                        if(data == 1){
                            swal('profile updated successfully :-)');
                            location.reload();
                        }
                        else{    
                            alert(data);
                        }
                        return false;
                    },
                    error:function(data){
                        console.log(data+'fail');
                    }
                });
            }else{
                location.reload();
            }
        });
    });


</script>
 