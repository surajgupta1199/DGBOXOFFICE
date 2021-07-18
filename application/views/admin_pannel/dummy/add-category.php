 <!-- ============================================================== -->
   <!-- Page Content  -->
   <div id="content-page" class="content-page">
      <div class="container-fluid">
         <div class="row">
            <div class="col-sm-12">
               <div class="iq-card">
                  <div class="iq-card-header d-flex justify-content-between">
                     <div class="iq-header-title">
                        <h4 class="card-title">Add Category</h4>
                     </div>
                  </div>
                  <div class="iq-card-body">
                     <div class="row">
                        <div class="col-lg-12">
                           <form id="add_categories">
                              <div class="form-group">
                                 <input type="text" name="cat_name" class="form-control" placeholder="Name" required="required">
                              </div>
                              <div class="form-group">
                                 <textarea id="text" name="cat_description" rows="5" class="form-control"
                                 placeholder="Description" required="required"></textarea>
                              </div>
                              <div class="col-12 form_gallery form-group">
                                 <label id="gallery2" for="form_gallery-upload">Upload Image</label>
                                 <input data-name="#gallery2" name="cat_banner" id="form_gallery-upload" class="form-control form_gallery-upload"
                                    type="file" accept=".png, .jpg, .jpeg" required="required">
                              </div>
                              <div class="form-group radio-box">
                                 <label>Status</label>
                                 <div class="radio-btn">
                                    <div class="custom-control custom-radio custom-control-inline">
                                       <input type="radio" id="customRadio6" value="0" name="cat_status" class="custom-control-input">
                                       <label class="custom-control-label" for="customRadio6">enable</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                       <input type="radio" id="customRadio7" value="1" name="cat_status" class="custom-control-input">
                                       <label class="custom-control-label" for="customRadio7">disable </label>
                                    </div>
                                 </div>
                              </div>
                              <div class="form-group ">
                                 <button type="submit" class="btn btn-primary">Submit</button>
                                 <button type="reset" class="btn btn-danger">cancel</button>
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

<script type="text/javascript">
   $( document ).ready(function() {

   });

   $('#add_categories').submit(function(e){
      e.preventDefault();
      var form = new FormData(this);
      $.ajax({  
         url:"<?php echo base_url('admin/category/add_category'); ?>",   
         type: "POST",  
         data: form,
         contentType:false,
         cache:false,
         processData:false,
         dataType: 'JSON',
         success:function(result){
            if(result.type == "success"){
               $('#add_categories').trigger('reset');
               swal('success','category added successfully','success');
               window.location.replace("<?php  echo base_url('admin/category/view_category'); ?>");
            }else if(result.type == "error"){
               swal('info',result.message,'info');
            }else{
               alert(result.message);
            }
         },
         error:function(response){
            console.log(response);
         }
      });
   });
</script>


