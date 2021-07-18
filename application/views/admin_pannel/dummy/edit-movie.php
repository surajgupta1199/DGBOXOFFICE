      <!-- Page Content  -->
      <div id="content-page" class="content-page">
         <div class="container-fluid">
            <div class="row">
               <div class="col-sm-12">
                  <div class="iq-card">
                     <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                           <h4 class="card-title">Add Movie</h4>
                        </div>
                     </div>
                     <div class="iq-card-body">
                        <form id="edit_movie">
                           <div class="row">
                              <div class="col-sm-6 form-group">
                                 <input type="text" name="movie_name" class="form-control" value="<?php echo $data['movie_name'] ?>" placeholder="Title" >
                              </div>
                              <div class="col-md-6 form-group">
                                 <select data-placeholder="Begin typing a category name to filter..." multiple class="form-control chosen-select" 
                                 name="cat_id">
                                    <option value=""></option>
                                    <?php foreach($category as $row){ print_r($row['cat_id']);?>
                                    <option value="<?php echo $row['cat_id'] ?>"><?php echo $row['cat_name'] ?></option>
                                 <?php }?>
                                 </select>
                              </div>
                              <div class="col-sm-6 form_gallery form-group">
                                 <label id="add_banner" for="add_form_gallery-upload">Upload Image</label>
                                 <input data-name="#add_banner" name="movie_banner" id="add_form_gallery-upload" class="form-control form_gallery-upload"
                                    type="file" accept=".png, .jpg, .jpeg" onchange="UploadUrl(this,'add');">
                                 <div class="fileupload_img"><img type="image" id="add_view_img" src="<?php echo base_url('images/movie_banner/'.$data["movie_banner"].''); ?>"style="width: 40%;height: 200px" alt="Featured image" /></div>
                              </div>
                              <div class="col-sm-6 form-group">
                                 <input type="url" name="movie_trail_link" value="<?php echo $data['movie_trail_link']  ?>" class="form-control" placeholder="Movie trailer link" >
                              </div>
                              <div class="col-sm-6 form-group">
                                 <input type="url" name="movie_link" value="<?php echo $data['movie_link']  ?>" class="form-control" placeholder="Movie link" >
                              </div>
                              <div class="col-sm-6 form-group">
                                 <input type="text" class="form-control" value="<?php echo $data['total_duration']  ?>" name="total_duration" placeholder="Movie Duration" >
                              </div>
                              <div class="col-sm-6 form-group">
                                 <input type="text" name="release_year" value="<?php echo $data['release_year']  ?>" class="form-control" placeholder="Release year" >
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
                           </div>
                           <hr>
                            <div class="row">
                              <div class="col-6">
                                 <h5 class="text-white mb-3">Movie Synopsis</h5>
                              </div>
                              <div class="col-6">
                                 <h5 class="text-white mb-3">Movie writer</h5>
                              </div>
                              <div class="col-sm-6 form-group">
                                 <textarea id="edit_synopsis" name="synopsis" rows="5" class="form-control"
                                    placeholder="Synopsis"></textarea>
                              </div>
                              <div class="col-sm-6 form-group">
                                 <textarea id="edit_writer" name="writer" rows="5" class="form-control"
                                    placeholder="Writer"></textarea>
                              </div>
                              <div class="col-6">
                                 <h5 class="text-white mb-3">Movie Director</h5>
                              </div>
                              <div class="col-6">
                                 <h5 class="text-white mb-3">Movie Cast</h5>
                              </div>
                              <div class="col-sm-6 form-group">
                                 <textarea id="edit_director" name="director" rows="5" class="form-control"
                                    placeholder="Director"></textarea>
                              </div>
                              <div class="col-sm-6 form-group">
                                 <textarea id="edit_cast_name" name="cast" rows="5" class="form-control"
                                    placeholder="Cast"></textarea>
                              </div>
                              <div class="col-6">
                                 <h5 class="text-white mb-3">Movie Genres</h5>
                              </div>
                              <div class="col-6">
                                 <h5 class="text-white mb-3">Movie Description</h5>
                              </div>
                              <div class="col-sm-6 form-group">
                                 <textarea id="edit_genres" rows="5" name="genres" class="form-control"
                                    placeholder="Genres"></textarea>
                              </div>
                              <div class="col-sm-6 form-group">
                                 <textarea id="edit_description" rows="5" name="description" class="form-control"
                                    placeholder="Description"></textarea>
                              </div>
                              <div class="form-group radio-box">
                                 <label>Status</label>
                                 <div class="radio-btn">
                                    <div class="custom-control custom-radio custom-control-inline">
                                       <input type="radio" id="add_customRadio6" value="0" name="status" class="custom-control-input">
                                       <label class="custom-control-label" for="add_customRadio6">Publish</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                       <input type="radio" id="add_customRadio7" value="1" name="status" class="custom-control-input">
                                       <label class="custom-control-label" for="add_customRadio7">Unpublish</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                       <input type="radio" id="add_customRadio7" value="2" name="status" class="custom-control-input">
                                       <label class="custom-control-label" for="add_customRadio7">Upcoming</label>
                                    </div>
                                 </div>
                              </div>
                              <input name="movie_id" value="<?php echo $data['movie_id'] ?>" hidden></div>
                              <input name="common_id" value="<?php echo $data['common_id'] ?>" hidden></div>
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
   var edit_writer = "";
   var edit_director = "";
   var edit_cast = "";
   var edit_genres = "";
   var edit_synopsis = "";
   var edit_description = "";

   $('#edit_movie').submit(function(e){
      e.preventDefault();

      var form = new FormData(this);
      form.append('synopsis',edit_synopsis.getData());
      form.append('writer',edit_writer.getData());
      form.append('director',edit_director.getData());
      form.append('cast',edit_cast.getData());
      form.append('genres',edit_genres.getData());
      form.append('description',edit_description.getData());
      form.append('add_edit','edit_movie');
      form.append('cat_id',cat_type);
      form.append('type',1);

      $.ajax({
         url: '<?php  echo base_url('admin/movie/add_edit_movies'); ?>',
         type:"POST",
         data:form,
         processData: false,
         contentType: false,
         cache:false,
         dataType:"JSON",
         success:function(result){
            if(result.type == "success"){
               swal('success','movie added successfully','success');
               window.location.replace('<?php echo base_url("admin/movie_list"); ?>');
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

      var status = '<?php echo $data['status'] ?>'

      $('input[name=status][value='+status+']').prop('checked',true);

      ClassicEditor
            .create(document.querySelector('#edit_writer'))
            .then(editor => {
               edit_writer = editor;
               edit_writer.setData('<?php echo $data["movie_writer"] ?>');

            })
            .catch(error => {
                console.error(error);
            });  

      ClassicEditor
            .create(document.querySelector('#edit_director'))
            .then(editor => {
               edit_director = editor;
               edit_director.setData('<?php echo $data["movie_director"] ?>');
            })
            .catch(error => {
               console.error(error);
         }); 

      ClassicEditor
            .create(document.querySelector('#edit_cast_name'))
            .then(editor => {
               edit_cast = editor;
               edit_cast.setData('<?php echo $data["movie_cast"] ?>');

            })
            .catch(error => {
               console.error(error);
         }); 

      ClassicEditor
            .create(document.querySelector('#edit_genres'))
            .then(editor => {
               edit_genres = editor;
               edit_genres.setData('<?php echo $data["movie_genres"] ?>');

            })
            .catch(error => {
               console.error(error);
         }); 

      ClassicEditor
            .create(document.querySelector('#edit_synopsis'))
            .then(editor => {
               edit_synopsis = editor;
               edit_synopsis.setData('<?php echo $data["synopsis"] ?>');

            })
            .catch(error => {
               console.error(error);
         }); 

      ClassicEditor
            .create(document.querySelector('#edit_description'))
            .then(editor => {
               edit_description = editor;
               edit_description.setData('<?php echo $data["description"] ?>');

            })
            .catch(error => {
               console.error(error);
         }); 
   });

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