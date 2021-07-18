      <!-- Page Content  -->
      <div id="content-page" class="content-page">
         <div class="container-fluid">
            <div class="row">
               <div class="col-sm-12">
                  <div class="iq-card">
                     <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                           <h4 class="card-title">Add Music</h4>
                        </div>
                     </div>
                     <div class="iq-card-body">
                        <form id="add_music">
                           <div class="row">
                              <div class="col-sm-6 form-group">
                                 <input type="text" name="music_name" class="form-control" placeholder="Title" required>
                              </div>
                              <div class="col-md-6 form-group">
                                 <select data-placeholder="Begin typing a category name to filter..." multiple class="form-control chosen-select" 
                                 name="cat_id">
                                    <option value=""></option>
                                    <?php foreach($data as $row){?>
                                    <option value="<?php echo $row['cat_id'] ?>"><?php echo $row['cat_name'] ?></option>
                                 <?php }?>
                                 </select>
                              </div>
                              <div class="col-sm-6 form_gallery form-group">
                                 <label id="add_banner" for="add_form_gallery-upload">Upload Image</label>
                                 <input data-name="#add_banner" name="music_banner" id="add_form_gallery-upload" class="form-control form_gallery-upload"
                                    type="file" accept=".png, .jpg, .jpeg" onchange="UploadUrl(this,'add');" required>
                                 <div class="fileupload_img"><img type="image" id="add_view_img" src="<?php echo base_url('assets/assets/images/dashboard/03.jpg'); ?>"style="width: 40%;height: 200px" alt="Featured image" /></div>
                              </div>
                              <div class="col-sm-6 form-group">
                                 <input type="url" name="music_link" class="form-control" placeholder="Music link" required>
                              </div>
                              <div class="col-sm-6 form-group">
                                 <input type="text" name="release_year" class="form-control" placeholder="Release year" required>
                              </div>
                              <div class="col-sm-6 form-group">
                                 <select class="form-control" name="language" id="exampleFormControlSelect3" >
                                    <option selected disabled="">Choose Language</option>
                                    <option>English</option>
                                    <option>Hindi</option>
                                    <option>Tamil</option>
                                    <option>Gujarati</option>
                                 </select>
                              </div>
                              <div class="col-sm-6 form-group">
                                 <input type="text" class="form-control" name="total_duration" placeholder="Music Duration" required>
                              </div>
                              <div class="col-md-6 form-group">
                                 <select class="form-control" name="rating">
                                    <option selected disabled="">Choose Rating</option>
                                    <option>3+</option>
                                    <option>6+</option>
                                    <option>13+</option>
                                    <option>18+</option>
                                 </select>                                 
                              </div>
                              <div class="col-sm-6 form-group">
                                 <input type="text" class="form-control" name="price" placeholder="Enter price" required>
                              </div>
                              <div class="col-sm-6 form-group">
                                 <input type="url" name="domain_url" class="form-control" placeholder="Enter Sub Domain url" required>
                              </div>
                              <div class="col-6">
                                 <h5 class="text-white mb-3">Singer</h5>
                              </div>
                              <div class="col-6">
                                 <h5 class="text-white mb-3">Musician</h5>
                              </div>
                              <div class="col-sm-6 form-group">
                                 <textarea id="singer" name="singer" rows="5" class="form-control"
                                    placeholder="Singer"></textarea>
                              </div>
                              <div class="col-sm-6 form-group">
                                 <textarea id="musician" name="musician" rows="5" class="form-control"
                                    placeholder="Musician"></textarea>
                              </div>
                              <div class="col-6">
                                 <h5 class="text-white mb-3">Producer</h5>
                              </div>
                              <div class="col-6">
                                 <h5 class="text-white mb-3">Synopsis</h5>
                              </div>
                              <div class="col-sm-6 form-group">
                                 <textarea id="producer" name="producer" rows="5" class="form-control"
                                    placeholder="Producer Name"></textarea>
                              </div>
                              <div class="col-sm-6 form-group">
                                 <textarea id="synopsis" rows="5" name="synopsis" class="form-control"
                                    placeholder="Synopsis"></textarea>
                              </div>
                              <div class="form-group radio-box">
                                 <label>Status</label>
                                 <div class="radio-btn">
                                    <div class="custom-control custom-radio custom-control-inline">
                                       <input type="radio" id="add_customRadio6" value="0" name="status" class="custom-control-input">
                                       <label class="custom-control-label" for="add_customRadio6">Publish</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                       <input type="radio" id="add_customRadio7" value="2" name="status" class="custom-control-input">
                                       <label class="custom-control-label" for="add_customRadio7">Upcoming </label>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-12 form-group ">
                                 <button type="submit" class="btn btn-primary">Submit</button>
                                 <button type="reset" class="btn btn-danger">Reset</button>
                              </div>
                           </div>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
<style>
   .ck-editor__editable_inline {
      min-height: 120px !important;
   }
   .ck-editor__editable {

      color: var(--iq-body-text);
      background-color:green;

   }
   .ck.ck-editor__main > .ck-editor__editable {
      background: unset;
   }
   .ck.ck-editor__main > .ck-editor__editable:not(.ck-focused) {
      border-color: #3c3939;
   }
</style>
<script src="<?php echo base_url('assets/ckeditor/ckeditor.js') ?>"></script>

<script>

   var cat_type ="";
   var singer = "";
   var musician = "";
   var producer = "";
   var synopsis = "";

   $('#add_music').submit(function(e){
      e.preventDefault();

      var form = new FormData(this);

      form.append('singer',singer.getData());
      form.append('musician',musician.getData());
      form.append('producer',producer.getData());
      form.append('synopsis',synopsis.getData());
      form.append('cat_type',cat_type);

      $.ajax({
         url: '<?php  echo base_url('admin/music/add_music'); ?>',
         type:"POST",
         data:form,
         processData: false,
         contentType: false,
         cache:false,
         dataType:"JSON",
         success:function(result){
            if(result.type == "success"){
               swal('success','music added successfully','success');
               window.location.replace('<?php echo base_url("admin/music_list"); ?>');
            }else{
               alert(result.message);
            }
         },
         error:function(response){
            console.log(response);
         }
      });
   });

   $('document').ready(function(){

      $(".chosen-select").chosen({
           no_results_text: "Oops, nothing found!"
      })

      $('select.chosen-select').change(function(){
         var cat_value = "";
         $(this).find('option:selected').each(function(){
            if(cat_value == ""){
               cat_value = $(this).val();
            }else{
               cat_value = cat_value + "," + $(this).val();
            }
         });
         cat_type = cat_value;
         cat_value = ""
      });

      $('input[name=status][value=0]').prop('checked',true);

      ClassicEditor
            .create(document.querySelector('#singer'))
            .then(editor => {
               singer = editor;

            })
            .catch(error => {
                console.error(error);
            });  

      ClassicEditor
            .create(document.querySelector('#musician'))
            .then(editor => {
               musician = editor;

            })
            .catch(error => {
               console.error(error);
         }); 

      ClassicEditor
            .create(document.querySelector('#producer'))
            .then(editor => {
               producer = editor;

            })
            .catch(error => {
               console.error(error);
         }); 

      ClassicEditor
            .create(document.querySelector('#synopsis'))
            .then(editor => {
               synopsis = editor;

            })
            .catch(error => {
               console.error(error);
         }); 
   });
   // SELECT * FROM category join `common_master` on common_master.category = category.cat_id JOIN content_master on content_master.content_id = category.content_type

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
</script>