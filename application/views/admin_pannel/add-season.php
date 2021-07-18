      <!-- Page Content  -->
      <div id="content-page" class="content-page">
         <div class="container-fluid">
            <div class="row">
               <div class="col-sm-12">
                  <div class="iq-card">
                     <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                           <h4 class="card-title">Add Season</h4>
                        </div>
                     </div>
                     <div class="iq-card-body">
                        <form id="add_series">
                           <div class="row">
                              <div class="col-md-6 form-group">
                                 <select class="form-control" name="series_id" id="series_name">
                                    <option selected disabled="">Series Category</option>
                                    <?php foreach($season as $row){?>
                                    <option value="<?php echo $row['common_id'] ?>"><?php echo $row['title'] ?></option>
                                    <?php }?>
                                 </select>
                              </div>
                              <div class="col-sm-6 form-group">
                                 <input type="text" class="form-control" name="price" placeholder="Enter price" required>
                              </div>
                              <div class="col-sm-6 form-group">
                                 <input type="url" name="domain_url" class="form-control" placeholder="Enter Sub Domain url" required>
                              </div>
                              <div class="col-sm-6 form-group">
                                 <input type="url" id="series_url" name="series_trail_link" rows="5" class="form-control" placeholder="Enter Series url" required>
                              </div>
                              <div class="col-sm-6 form_gallery form-group">
                                 <label id="add_banner" for="add_form_gallery-upload">Upload Series Banner</label>
                                 <input data-name="#add_banner" name="series_banner" id="add_form_gallery-upload" class="form-control form_gallery-upload"
                                    type="file" accept=".png, .jpg, .jpeg" onchange="UploadUrl(this,'add_view_img_0');" >
                                 <div class="fileupload_img"><img type="image" id="add_view_img_0" src="<?php echo base_url('assets/assets/images/dashboard/03.jpg'); ?>"style="width: 40%;height: 200px" alt="Featured image" /></div>
                              </div>
                              <div class="col-sm-6 form_gallery form-group">
                                 <label id="post_add_banner" for="post_form_gallery-upload">Upload Poster Image</label>
                                 <input data-name="#post_add_banner" name="series_poster" id="post_form_gallery-upload" class="form-control form_gallery-upload"
                                    type="file" accept=".png, .jpg, .jpeg" onchange="UploadUrl(this,'post_add_view_img');" required>
                                 <div class="fileupload_img"><img type="image" id="post_add_view_img" src="<?php echo base_url('assets/assets/images/dashboard/03.jpg'); ?>"style="width: 40%;height: 200px" alt="Featured image" /></div>
                              </div>
                              <div class="col-sm-6 form-group">
                                 <input type="text" name="release_year" class="form-control" placeholder="Release year" required>
                              </div>
                              <div class="col-md-6 form-group">
                                 <select class="form-control" name="language" id="exampleFormControlSelect1">
                                    <option selected disabled="">Choose Language</option>
                                    <option>English</option>
                                    <option>Hindi</option>
                                    <option>Tamil</option>
                                    <option>Gujarati</option>
                                 </select>                                 
                              </div>
                              <div class="col-md-6 form-group">
                                 <select class="form-control" name="rating">
                                    <option selected disabled="">Age Rating</option>
                                    <option>3+</option>
                                    <option>6+</option>
                                    <option>13+</option>
                                    <option>18+</option>
                                 </select>                                 
                              </div>
                              <div class="col-sm-6 form-group">
                                 <input type="text" name="imdb_rating" class="form-control" placeholder="Enter IMDB Rating" required>
                              </div>
                              <div class="col-sm-6 form-group">
                                 <input type="text" name="season_number" id="season_number" class="form-control" placeholder="Enter Season Number" required readonly>
                              </div>
                              <div class="col-sm-6 form-group">
                                 <input type="text" id="total_number_episode" name="total_number_episode" class="form-control" maxlength="2" placeholder="Enter Total Episode" required >
                              </div>
                           </div>
                           <hr>
                           <span id="show_episode"></span>
                           <div class="row hide_data" style="display: none;">
                              <div class="col-6">
                                 <h5 class="text-white mb-3">Series Writer</h5>
                              </div>
                              <div class="col-6">
                                 <h5 class="text-white mb-3">Series Director</h5>
                              </div>
                              <div class="col-sm-6 form-group">
                                 <input id="writer" name="series_writer" rows="5" class="form-control"
                                    placeholder="Writer" >
                              </div>
                              <div class="col-sm-6 form-group">
                                 <input id="director" name="series_director" rows="5" class="form-control"
                                    placeholder="Director" >
                              </div>
                              <div class="col-12">
                                 <h5 class="text-white mb-3">Series Cast</h5>
                              </div>
                              <div class="col-sm-6 form-group">
                                 <input id="cast_name" name="series_cast" rows="5" class="form-control"
                                    placeholder="Cast" >
                              </div>
                           </div>
                           <div class="row hide_data" style="display: none;">
                              <div class="col-6">
                                 <h5 class="text-white mb-3">Synopsis</h5>
                              </div>
                              <div class="col-6">
                                 <h5 class="text-white mb-3">Description</h5>
                              </div>
                              <div class="col-sm-6 form-group">
                                 <input id="synopsis" name="synopsis" rows="5" class="form-control"
                                    placeholder="Synopsis" >
                              </div>
                              <div class="col-sm-6 form-group">
                                 <input id="description" rows="5" name="description" class="form-control"
                                    placeholder="Description" >
                              </div>
                           </div>
                           <hr>
                           
                           <div class="row">
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
                              <div class="col-12 form-group">
                                 <button type="submit" class="btn btn-primary">Submit</button>
                                 <button type="reset" class="btn btn-danger">cancel</button>
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
      min-height: 150px !important;
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
   .margin-height{
      margin-top: 10px;
   }
</style>
<script src="<?php echo base_url('assets/ckeditor/ckeditor.js') ?>"></script>
<script type="text/javascript">
   var arr = [];
   var total_number_episode ="";
   
   var synopsis_desc = []; 
   function UploadUrl(input,banner_id) {
      if(input.files && input.files[0]){
         var reader = new FileReader();
         reader.onload = function (e) 
         {
             $("#"+banner_id+"")
                 .attr('src', e.target.result)
         };
         reader.readAsDataURL(input.files[0]);
      }
   }

   var synopsis = "";
   var description = "";

   $('#add_series').submit(function(e){
      e.preventDefault();

      var each_synopsis = [];

      if(total_number_episode == 0){
         alert('please enter number of total series');
         return false;
      }

      for(var j = 0;j< arr.length; j++){
         
         // if(arr[j].getData() == ""){
         //    alert('hii');
         //    alert("please write each synopsis");
         //    each_synopsis.length = 0;
         //    // return false;      
         // }else{
         //    each_synopsis.push(arr[j].getData());
         // }

         each_synopsis.push(arr[j].getData());
      }

      var title = $("#series_name option:selected").text();
      
      var form = new FormData(this);
      form.append('cat_id',$('#cat_id_value').val());
      form.append('each_synopsis',JSON.stringify(each_synopsis));
      form.append('synopsis',synopsis.getData());
      form.append('description',description.getData());
      form.append('title',title);
      form.append('mul_season','add_season');

      $.ajax({
         url:'<?php echo base_url("admin/series/add_series"); ?>',
         type:"POST",
         data:form,
         processData: false,
         contentType: false,
         cache:false,
         dataType:"JSON",
         success:function(result){
            if(result.type == "success"){
               swal('success','series added successfully','success');
               window.location.replace('<?php echo base_url("admin/series_list"); ?>');
            }else{
               alert(result.message);
            }
         },
         error:function(response){
            console.log(response);
         }
      })

   })

   $('#series_name').change(function(e){
      e.preventDefault();
      // var name = $("#series_name option:selected").text();
      var value = $("#series_name").val();
      $.ajax({
         url:'<?php echo base_url("admin/series/fetch_season_num"); ?>',
         type:"POST",
         data:{'common_id':value},
         dataType:"JSON",
         success:function(result){
            console.log(result);
            $('#season_number').val(parseInt(result.season_number) + 1);
            $('#cat_id_value').val(result.cat_id);
         },
         error:function(response){
            console.log(response);
         }
      })


   })

   $('document').ready(function(){

      $('input[name=status][value=0]').prop('checked',true);
      
      $("#total_number_episode").keyup(function(){
         total_number_episode = $(this).val();
         if(total_number_episode > 15){
            alert('Number of episode should not more than 15');
            total_number_episode = 0;
            $("#total_number_episode").val('');
            return false;
         }

         var output = "";
         for(var i=1;i <= total_number_episode;i++){
            var banner_id = "'add_view_img_"+i+"'";
            var poster_id = "'post_add_view_img_"+i+"'";
            var episode_synopsis = "#episode_synopsis_"+i+"";
            output+= ('<div class="row"><div class="col-12"><h5 class="text-white mb-3">Episode '+ i +'</h5></div><div class="col-sm-6 form-group"><input type="text" name="episode_name[]" class="form-control" placeholder="Enter Episode Name" required></div><div class="col-sm-6 form-group"><input type="text" name="episode_duration[]" class="form-control" placeholder="Enter Episode Duration" required></div><div class="col-sm-6 form_gallery form-group"><label id="add_banner_episode" for="add_form_gallery-upload_'+i+'">Upload Show Banner</label><input data-name="#add_banner_episode" name="episode_banner_'+i+'" id="add_form_gallery-upload_'+i+'" class="form-control form_gallery-upload" type="file" accept=".png, .jpg, .jpeg" onchange="UploadUrl(this,'+banner_id+');" required><div class="fileupload_img"><img type="image" id="add_view_img_'+i+'" src="<?php echo base_url('assets/assets/images/dashboard/03.jpg'); ?>"style="width: 40%;height: 200px" alt="Featured image" /></div></div><div class="col-sm-6 form_gallery form-group"><label id="post_add_banner_episode" for="post_form_gallery-upload_'+i+'">Upload Show Poster</label><input data-name="#post_add_banner_episode" name="episode_poster_'+i+'" id="post_form_gallery-upload_'+i+'" class="form-control form_gallery-upload" type="file" accept=".png, .jpg, .jpeg" onchange="UploadUrl(this,'+poster_id+');" required><div class="fileupload_img"><img type="image" id="post_add_view_img_'+i+'" src="<?php echo base_url('assets/assets/images/dashboard/03.jpg'); ?>"style="width: 40%;height: 200px" alt="Featured image" /></div></div><div class="col-sm-6 form-group"><div class="col-12 margin-height"><h6 class="text-white mb-3">Episode Synopsis</h6></div><div class="col-sm-12 form-group"><textarea id="episode_synopsis_'+i+'" rows="5" class="form-control"placeholder="Episode Synopsis"></textarea></div></div><div class="col-sm-6 form-group"><input type="url" id="series_url_'+i+'" name="each_episode_link[]" rows="5" class="form-control" placeholder="Enter Series url" required></div></div><hr>'); 
         }

         $('#show_episode').html(output);
         $('.hide_data').show();

         $("textarea").each(function(count){
            var textarea_id = $(this).attr("id");
            
            ClassicEditor
               .create(document.querySelector("#"+textarea_id+""))
               .then(editor => {
                  synopsis_desc[textarea_id] = editor;

                  arr.push(synopsis_desc[textarea_id]);
               })
               .catch(error => {
                  console.error(error);
            });
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

      ClassicEditor
            .create(document.querySelector('#synopsis'))
            .then(editor => {
               synopsis = editor;

            })
            .catch(error => {
               console.error(error);
         }); 

      ClassicEditor
            .create(document.querySelector('#description'))
            .then(editor => {
               description = editor;

            })
            .catch(error => {
               console.error(error);
         }); 

   });

</script>