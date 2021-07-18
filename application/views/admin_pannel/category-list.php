      <!-- Page Content  -->
      <div id="content-page" class="content-page">
         <div class="container-fluid">
            <div class="row">
               <div class="col-sm-12">
                  <div class="iq-card">
                     <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                           <h4 class="card-title">Category Lists</h4>
                        </div>
                        <div class="iq-card-header-toolbar d-flex align-items-center">
                           <button type="button" id="add_course_btn" class="btn btn-primary pull-right">Add Category</button>
                        </div>
                     </div>
                     <div class="iq-card-body">
                        <div class="table-view">
                           <table class="data-tables table movie_table " style="width:100%">
                              <thead>
                                 <tr>
                                    <th style="width:10%;">No</th>
                                    <th style="width:20%;">Name</th>
                                    <th style="width:40%;">Description</th>
                                    <th style="width:10%;">Movie</th>
                                    <th style="width:20%;">Action</th>
                                 </tr>
                              </thead>
                           </table>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div id="add_course_model" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
          <div class="modal-dialog modal-xl">
              <div class="modal-content">
                  <div class="modal-header">
                      <h4 class="modal-title" id="myLargeModalLabel">Add Category</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                  </div>
                  <div class="modal-body">
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
                                          <input type="text" id="cat_name" name="cat_name" class="form-control" placeholder="Name" required="required">
                                       </div>
                                       <div class="form-group">
                                          <textarea id="cat_description" name="cat_description" rows="5" class="form-control"
                                          placeholder="Description" required="required"></textarea>
                                       </div>
                                       <div class="row">
                                          <div class="col-sm-6 form_gallery form-group">
                                             <label id="add_banner" for="add_form_gallery-upload">Upload Image</label>
                                             <input data-name="#add_banner" name="cat_banner" id="add_form_gallery-upload" class="form-control form_gallery-upload"
                                                type="file" accept=".png, .jpg, .jpeg" required="required" onchange="UploadUrl(this,'add');">
                                             <div class="fileupload_img"><img type="image" id="add_view_img" src="<?php echo base_url('assets/assets/images/dashboard/03.jpg'); ?>"style="width: 40%;height: 200px" alt="Featured image" /></div>
                                          </div>
                                       </div>
                                       <div class="form-group radio-box">
                                          <label>Status</label>
                                          <div class="radio-btn">
                                             <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" id="add_customRadio6" value="0" name="cat_status" class="custom-control-input">
                                                <label class="custom-control-label" for="add_customRadio6">enable</label>
                                             </div>
                                             <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" id="add_customRadio7" value="1" name="cat_status" class="custom-control-input">
                                                <label class="custom-control-label" for="add_customRadio7">disable </label>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="form-group ">
                                          <button type="submit" class="btn btn-primary">Submit</button>
                                          <button type="reset" class="btn btn-danger">Reset</button>
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
      </div>
      <div id="edit_course_model" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
          <div class="modal-dialog modal-xl">
              <div class="modal-content">
                  <div class="modal-header">
                      <h4 class="modal-title" id="myLargeModalLabel">Edit Category</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                  </div>
                  <div class="modal-body">
                     <div class="col-sm-12">
                        <div class="iq-card">
                           <div class="iq-card-header d-flex justify-content-between">
                              <div class="iq-header-title">
                                 <h4 class="card-title">Edit Category</h4>
                              </div>
                           </div>
                           <div class="iq-card-body">
                              <div class="row">
                                 <div class="col-lg-12">
                                    <form id="edit_categories">
                                       <div class="form-group">
                                          <input type="text" id="show_cat_name" name="cat_name" class="form-control" placeholder="Name" required="required">
                                       </div>
                                       <div class="form-group">
                                          <textarea id="show_cat_description" name="cat_description" rows="5" class="form-control"
                                          placeholder="Description" required="required"></textarea>
                                       </div>
                                       <div class="row">
                                          <div class="col-sm-6 form_gallery form-group">
                                             <label id="gallery2" for="form_gallery-upload">Upload Image</label>
                                             <input data-name="#gallery2" name="cat_banner" id="form_gallery-upload" class="form-control form_gallery-upload"
                                                type="file" accept=".png, .jpg, .jpeg" onchange="UploadUrl(this,'edit');">
                                             <div class="fileupload_img"><img type="image" id="edit_view_img" src="<?php echo base_url('assets/assets/images/dashboard/03.jpg'); ?>"style="width: 40%;height: 200px" alt="Featured image" /></div>
                                          </div>
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
                                          <button type="reset" class="btn btn-danger">Reset</button>
                                       </div>
                                       <div id="show_cat_id" hidden ></div>
                                    </form>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
              </div>
          </div>
      </div>

      <div id="view_course_model" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
          <div class="modal-dialog modal-xl">
              <div class="modal-content">
                  <div class="modal-header">
                      <h4 class="modal-title" id="myLargeModalLabel">View Category</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                  </div>
                  <div class="modal-body">
                     <div class="col-sm-12">
                        <div class="iq-card">
                           <div class="iq-card-header d-flex justify-content-between">
                              <div class="iq-header-title">
                                 <h4 class="card-title">View Category</h4>
                              </div>
                           </div>
                           <div class="iq-card-body">
                              <div class="row">
                                 <div class="col-lg-12">
                                    <div class="form-group">
                                       <input type="text" id="view_cat_name" name="cat_name" class="form-control" placeholder="Name" readonly="readonly">
                                    </div>
                                    <div class="form-group">
                                       <textarea id="view_cat_description" name="cat_description" rows="5" class="form-control"
                                       placeholder="Description" readonly="readonly"></textarea>
                                    </div>
                                    <div class="col-12 form_gallery form-group">
                                       <label id="view_banner_img" for="view_form_gallery-upload">Upload Image</label>
                                       <input data-name="#view_banner_img" name="cat_banner" id="view_form_gallery-upload" class="form-control form_gallery-upload"
                                          type="file" accept=".png, .jpg, .jpeg" onchange="UploadUrl(this,'edit');" disabled>
                                       <div class="fileupload_img"><img type="image" id="banner_view_img" src="<?php echo base_url('assets/assets/images/dashboard/03.jpg'); ?>"style="width: 40%;height: 200px" alt="Featured image" /></div>
                                    </div>
                                    <div class="form-group radio-box">
                                       <label>Status</label>
                                       <div class="radio-btn">
                                          <div class="custom-control custom-radio custom-control-inline">
                                             <input type="radio" id="view_customRadio6" value="0" name="cat_status" class="custom-control-input">
                                             <label class="custom-control-label" for="view_customRadio6">enable</label>
                                          </div>
                                          <div class="custom-control custom-radio custom-control-inline">
                                             <input type="radio" id="view_customRadio7" value="1" name="cat_status" class="custom-control-input">
                                             <label class="custom-control-label" for="view_customRadio7">disable </label>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
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
         table = $('.movie_table').DataTable({
            "aLengthMenu": [[10, 25, 50, 100, 500, 1000, 2000, 5000], [10, 25, 50, 100, 500, 1000, 2000, 5000]],
            dom: 'lBfrtip',
            paging: true,
            "processing": true,
            "serverSide": true,
            "pageLength": 10,
            "language": {
                  "processing": "<span class='col-teal' style='font-size:16px;back'> </span>",
            },
            responsive: true,
            "buttons": [
               {
                     extend: 'excel',
                     exportOptions:
                     {
                        columns: [ 0, 1,2,3]
                     },
               } 
            ],
            "ajax":{
               url:"<?php echo base_url(); ?>admin/category/get_categories", 
               type: "POST",
               error: function(response){
                     console.log(response);
               }
            }
      });
      $('#add_course_btn').click(function(){
         $('#add_course_model').modal('show');
         $('input[name=cat_status][value=0]').prop('checked',true);
      })

   });

   $('#add_categories').submit(function(e){
      e.preventDefault();
      var form = new FormData(this);
      form.append('add_category','add_cat');             //same function we are adding and update
      $.ajax({  
         url:"<?php echo base_url('admin/category/add_edit_category'); ?>",   
         type: "POST",  
         data: form,
         contentType:false,
         cache:false,
         processData:false,
         dataType: 'JSON',
         success:function(result){
            if(result.type == "success"){
               $('#add_course_model').modal('hide');
               $('#add_categories').trigger('reset');
               swal('success','category added successfully','success');
               table.ajax.reload();
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

   $('#edit_categories').submit(function(e){
      e.preventDefault();
      var form = new FormData(this);
      form.append('add_category','edit_cat');             //same function we are adding and update
      form.append('cat_id',$('#show_cat_id').val());
      $.ajax({  
         url:"<?php echo base_url('admin/category/add_edit_category'); ?>",   
         type: "POST",  
         data: form,
         contentType:false,
         cache:false,
         processData:false,
         dataType: 'JSON',
         success:function(result){
            if(result.type == "success"){
               $('#edit_course_model').modal('hide');
               swal('success','category updated successfully','success');
               table.ajax.reload();
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

   function UploadUrl(input,add_edit) {
      var add_edit_1 = add_edit == "add" ? "add_view_img" : "edit_view_img";
      if(input.files && input.files[0]){
         var reader = new FileReader();
         reader.onload = function (e) 
         {
             $("#"+add_edit_1+"")
                 .attr('src', e.target.result)
         };
         reader.readAsDataURL(input.files[0]);
      }
   }

   function delete_category(cat_id){
      swal({
         title: "Are You Sure?",
         text: "You want to delete",
         icon: "warning",
         buttons: true,
         dangerMode: true,
         }).then((willDelete) => {
            if (willDelete) {        
               $.ajax({  
                  url:"<?php echo base_url('admin/category/delete_category'); ?>",   
                  type: "POST",  
                  data: {'cat_id':cat_id},
                  dataType: 'JSON',
                  success:function(result){
                     if(result == 1){
                        table.ajax.reload();
                        swal('success','successfully deleted category','success');
                     }else{
                        swal('error','unsuccessfull while deleting item','error');
                     }
                  },
                  error:function(response){
                     console.log(response);
                  }
               });
            }
         });
   }

   function view_category(cat_id){
      $.ajax({  
         url:"<?php echo base_url('admin/category/view_category'); ?>",   
         type: "POST",  
         data: {'cat_id':cat_id},
         dataType: 'JSON',
         success:function(result){
            $('#view_cat_name').val(result.cat_name);
            $('#view_cat_description').html(result.cat_description);
            $('#view_banner_img').html('upload image');
            $('#banner_view_img').attr('src','<?php echo base_url('images/category_banner/'); ?>'+result.cat_banner);
            $('input[name=cat_status][value='+result.cat_status+']').prop('checked',true);
            $('input[name=cat_status]').prop('disabled',true);
            $('#view_course_model').modal('show');
         },
         error:function(response){
            console.log(response);
         }
      });
   }

   function edit_category(cat_id){
      $.ajax({  
         url:"<?php echo base_url('admin/category/view_category'); ?>",   
         type: "POST",  
         data: {'cat_id':cat_id},
         dataType: 'JSON',
         success:function(result){
            $('#show_cat_name').val(result.cat_name);
            $('#show_cat_description').html(result.cat_description);
            $('#gallery2').html('upload image');
            $('#show_cat_id').val(cat_id);
            $('#edit_view_img').attr('src','<?php echo base_url('images/category_banner/'); ?>'+result.cat_banner);
            $('input[name=cat_status][value='+result.cat_status+']').prop('checked',true);
            $('#edit_course_model').modal('show');
         },
         error:function(response){
            console.log(response);
         }
      });
   }
</script>