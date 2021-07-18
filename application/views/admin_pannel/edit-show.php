<?php 
   $common_id = $this->uri->segment(4);
   $each_episode = json_decode($data[0]['each_episode_name']);
   $each_synopsis = json_decode($data[0]['each_synopsis']);
   $each_episode_name = json_decode($data[0]['each_episode_name']);
   $each_episode_duration = json_decode($data[0]['each_episode_duration']);
   $each_episode_link = json_decode($data[0]['each_episode_link']);
   $each_episode_image = json_decode($data[0]['each_episode_banner']);
   $each_episode_poster = json_decode($data[0]['each_episode_poster']);
   if($each_episode_poster == ""){
      $each_episode_poster = $each_episode_image;
   }

?>
      <!-- Page Content  -->
      <div id="content-page" class="content-page">
         <div class="container-fluid">
            <div class="row">
               <div class="col-sm-12">
                  <div class="iq-card">
                     <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                           <h4 class="card-title">Add Show</h4>
                        </div>
                     </div>
                     <div class="iq-card-body">
                        <form id="add_series">
                           <div class="row">
                              <div class="col-md-6 form-group">
                                 <input type="text" name="title" value="<?php echo $data[0]['title'] ?>" class="form-control" placeholder="Title">
                              </div>
                              <div class="col-md-6 form-group">
                                 <select data-placeholder="Begin typing a category name to filter..." multiple class="form-control chosen-select" 
                                 name="cat_id" id="cat_id">
                                    <option value=""></option>
                                    <?php $cat_array = explode(',',$data[0]['cat_id']);

                                    foreach($category as $row){ 
                                       print_r(in_array($row, $cat_array));
                                       if(in_array($row['cat_id'], $cat_array)){
                                            echo "<option selected value='".$row['cat_id']."'>".$row['cat_name']."</option>";
                                       }else {
                                            echo "<option value='".$row['cat_id']."'>".$row['cat_name']."</option>";
                                       }
                                    }
                                    ?>
                                 </select>
                              </div>
                              <div class="col-sm-6 form-group">
                                 <input type="text" value="<?php echo $data[0]['price'] ?>" class="form-control" name="price" placeholder="Enter price">
                              </div>
                              <div class="col-sm-6 form-group">
                                 <input type="url" value="<?php echo $data[0]['domain_url'] ?>" name="domain_url" class="form-control" placeholder="Enter Sub Domain url">
                              </div>
                              <div class="col-sm-6 form_gallery form-group">
                                 <label id="add_banner" for="add_form_gallery-upload">Upload Show Banner</label>
                                 <input data-name="#add_banner" name="series_banner" id="add_form_gallery-upload" class="form-control form_gallery-upload"
                                    type="file" accept=".png, .jpg, .jpeg" onchange="UploadUrl(this,'add_view_img_0');" >
                                 <div class="fileupload_img"><img type="image" id="add_view_img_0" src="<?php echo base_url('images/series_banner/'.$data[0]["series_banner"].''); ?>" style="height: 200px" alt="Featured image" /></div>
                              </div>
                              <div class="col-sm-6 form_gallery form-group">
                                 <label id="post_add_banner" for="post_form_gallery-upload">Upload Poster Image</label>
                                 <input data-name="#post_add_banner" name="series_poster" id="post_form_gallery-upload" class="form-control form_gallery-upload"
                                    type="file" accept=".png, .jpg, .jpeg" onchange="UploadUrl(this,'post_add_view_img');" >
                                 <div class="fileupload_img"><img type="image" id="post_add_view_img" src="<?php echo base_url('images/series_banner/'.$data[0]["series_poster"].''); ?>" style="height: 200px" alt="Featured image" /></div>
                              </div>
                              <div class="col-sm-6 form-group">
                                 <input type="url" value="<?php echo $data[0]['series_trail_link'] ?>" id="series_url" name="series_trail_link" rows="5" class="form-control" placeholder="Enter Series url">
                              </div>
                              <div class="col-sm-6 form-group">
                                 <input type="text" value="<?php echo $data[0]['release_year'] ?>" name="release_year" class="form-control" placeholder="Release year">
                              </div>
                              <div class="col-md-6 form-group">
                                 <select class="form-control" name="language" id="language">
                                    <option selected disabled="">Choose Language</option>
                                    <option>English</option>
                                    <option>Hindi</option>
                                    <option>Tamil</option>
                                    <option>Gujarati</option>
                                 </select>                                 
                              </div>
                              <div class="col-md-6 form-group">
                                 <select class="form-control" id="age_rating" name="rating">
                                    <option selected disabled="">Age Rating</option>
                                    <option>3+</option>
                                    <option>6+</option>
                                    <option>13+</option>
                                    <option>18+</option>
                                 </select>                                 
                              </div>
                              <div class="col-sm-6 form-group">
                                 <input type="text" name="imdb_rating" value="<?php echo $data[0]['imdb_rating'] ?>" class="form-control" placeholder="Enter IMDB Rating">
                              </div>
                              <div class="col-sm-6 form-group">
                                 <input type="text" name="season_number" id="season_number" value="<?php echo $data[0]['season_number'] ?>" class="form-control" placeholder="Enter Season Number">
                              </div>
                              <div class="col-sm-6 form-group">
                                 <input type="text" id="total_number_episode" name="total_number_episode" value="<?php echo $data[0]['total_number_episode'] ?>" class="form-control" maxlength="2" placeholder="Enter Total Episode" readonly>
                              </div>
                           </div>
                           <hr>
                           <span id="show_episode"></span>
                           <div class="row hide_data">
                              <div class="col-6">
                                 <h5 class="text-white mb-3">Series Writer</h5>
                              </div>
                              <div class="col-6">
                                 <h5 class="text-white mb-3">Series Director</h5>
                              </div>
                              <div class="col-sm-6 form-group">
                                 <input id="writer" name="series_writer" value="<?php echo $data[0]['series_writer'] ?>" rows="5" class="form-control"
                                    placeholder="Writer">
                              </div>
                              <div class="col-sm-6 form-group">
                                 <input id="director" name="series_director" value="<?php echo $data[0]['series_director'] ?>" rows="5" class="form-control"
                                    placeholder="Director">
                              </div>
                              <div class="col-12">
                                 <h5 class="text-white mb-3">Series Cast</h5>
                              </div>
                              <div class="col-sm-6 form-group">
                                 <input id="cast_name" name="series_cast" value="<?php echo $data[0]['series_cast'] ?>" rows="5" class="form-control"
                                    placeholder="Cast">
                              </div>
                           </div>
                           <div class="row hide_data">
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
                              <div class="col-sm-6 form-group" hidden>
                                 <input id="series_id" name="id" value = "<?php echo $data[0]['id'] ?>" class="form-control"
                                    placeholder="Description" >
                              </div>
                           </div>
                           <input id="count_textarea" hidden>
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
   $('#language').val('<?php echo $data[0]['language'] ?>').change();
   $('#age_rating').val('<?php echo $data[0]['rating'] ?>').change();

   var arr = [];
   
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
      var common_id = "<?php echo $common_id; ?>";

      var each_synopsis = [];

      for(var j = 0;j< arr.length; j++){
         each_synopsis.push(arr[j].getData());
      }

      var form = new FormData(this);

      form.append('each_synopsis',JSON.stringify(each_synopsis));
      form.append('synopsis',synopsis.getData());
      form.append('description',description.getData());
      form.append('cat_id',$('#cat_id').val());
      form.append('mul_season','add_series');

      $.ajax({
         url:'<?php echo base_url("admin/series/edit_series/"); ?>'+common_id,
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

   $('document').ready(function(){

         var count_num = parseInt('<?php echo $data[0]['total_number_episode']; ?>');
         var total_count = count_num;
         var adding_part =0;
         var btn = 1;

         $('input[name=status][value=0]').prop('checked',true);
         fetch_detail();

         function fetch_detail(){

            var output = "";

            for(var i=1;i <= total_count;i++){

               var num = adding_part == 0? i : adding_part;
               var banner_id = "'add_view_img_"+num+"'";
               var poster_id = "'post_add_view_img_"+num+"'";
               var episode_synopsis = "#episode_synopsis_"+num+"";

               var remove_btn = btn == 1?"<button id='add_class' style='margin-left: 66%;' type='button'>add episode </button><button id='remove_class' style='float:right;' type='button'>remove episode </button>":"";

               output+= ('<div class="row"><div class="col-6"><h5 class="text-white mb-3">Episode '+ num +'</h5></div><div id="remove_class'+num+'" class="col-6">'+remove_btn+'</div><div class="col-sm-6 form-group"><input type="text" id="episode_name_'+num+'" name="episode_name[]" class="form-control" placeholder="Enter Episode Name"></div><div class="col-sm-6 form-group"><input type="text" id="episode_duration_'+num+'" name="episode_duration[]" class="form-control" placeholder="Enter Episode Duration"></div><div class="col-sm-6 form_gallery form-group"><label id="add_banner_episode" for="add_form_gallery-upload_'+num+'">Upload Show Banner</label><input data-name="#add_banner_episode" name="episode_banner_'+num+'" id="add_form_gallery-upload_'+num+'" class="form-control form_gallery-upload" type="file" accept=".png, .jpg, .jpeg" onchange="UploadUrl(this,'+banner_id+');" ><div class="fileupload_img"><img type="image" id="add_view_img_'+num+'" src="<?php echo base_url('assets/assets/images/dashboard/03.jpg'); ?>"style="height: 200px" alt="Featured image" /></div></div><div class="col-sm-6 form_gallery form-group"><label id="post_add_banner_episode" for="post_form_gallery-upload_'+num+'">Upload Show Poster</label><input data-name="#post_add_banner_episode" name="episode_poster_'+num+'" id="post_form_gallery-upload_'+num+'" class="form-control form_gallery-upload" type="file" accept=".png, .jpg, .jpeg" onchange="UploadUrl(this,'+poster_id+');" ><div class="fileupload_img"><img type="image" id="post_add_view_img_'+num+'" src="<?php echo base_url('assets/assets/images/dashboard/03.jpg'); ?>"style="height: 200px" alt="Featured image" /></div></div><div class="col-sm-6 form-group"><div class="col-12 margin-height"><h6 class="text-white mb-3">Episode Synopsis</h6></div><div class="col-sm-12 form-group"><textarea id="episode_synopsis_'+num+'" rows="5" data-id="episode_synopsis_'+num+'" class="form-control"placeholder="Episode Synopsis"></textarea></div></div><div class="col-sm-6 form-group"><input type="url" id="series_url_'+num+'" name="each_episode_link[]" rows="5" class="form-control" placeholder="Enter Series url"></div></div>'); 
               btn+=1;
               
            }

            var append = adding_part == 0? $('#show_episode').html(output) : $('#show_episode').append(output);

         }

         $('#remove_class').click(function(e){
               e.preventDefault();
               if(count_num == 1){
                  alert('unable to remove');
                  return false;
               }
               $('#show_episode .row:last').remove();
               alert('your last episode has been delete');
               count_num-=1;
               $('#total_number_episode').val(count_num);
         })

         $('#add_class').click(function(e){
               e.preventDefault();
               adding_part = count_num+=1;
               $('#total_number_episode').val(adding_part);
               total_count = 1;
               fetch_detail();
               setTimeout(function(){
                  ClassicEditor
                     .create(document.querySelector("#episode_synopsis_"+adding_part+""))
                     .then(editor => {
                        synopsis_desc["#episode_synopsis_"+adding_part+""] = editor;

                        arr.push(synopsis_desc["#episode_synopsis_"+adding_part+""]);
                     })
                     .catch(error => {
                        console.error(error);
                  });
               },500);
               alert('your last episode has been added');
         })

         setTimeout(function(){
            <?php
               $i=0;
               for($j=1;$j<=count($each_episode_name);$j++){
                  echo '
                     ClassicEditor
                        .create(document.querySelector("#episode_synopsis_'.$j.'"))
                        .then(editor => {
                           editor.setData("'.$each_synopsis[$i].'");
                           synopsis_desc["#episode_synopsis_'.$j.'"] = editor;

                           arr.push(synopsis_desc["#episode_synopsis_'.$j.'"]);
                        })
                        .catch(error => {
                           console.error(error);
                     });';
                     $i++;
               }?>
         },500);

         $(".chosen-select").chosen({
              no_results_text: "Oops, nothing found!"
         })

         ClassicEditor
               .create(document.querySelector('#synopsis'))
               .then(editor => {
                  editor.setData("<?php echo $data[0]['synopsis'] ?>");
                  synopsis = editor;
               })
               .catch(error => {
                  console.error(error);
            }); 

         ClassicEditor
               .create(document.querySelector('#description'))
               .then(editor => {
                  editor.setData("<?php echo $data[0]['description'] ?>");
                  description = editor;

               })
               .catch(error => {
                  console.error(error);
            });

         setTimeout(function(){
            <?php
            $i=0;
            for($j=1;$j<=count($each_episode_name);$j++){
               $episode_name = "'episode_name_".$j."'";
               $episode_duration = "'episode_duration_".$j."'";
               $episode_link = "'series_url_".$j."'";
               $episode_image = "'add_form_gallery-upload_".$j."'";
               $episode_poster = "'post_form_gallery-upload_".$j."'";
                  echo '$("input[id='.$episode_name.']").val("'.$each_episode_name[$i].'");';
                  echo '$("input[id='.$episode_duration.']").val("'.$each_episode_duration[$i].'");';
                  echo '$("input[id='.$episode_link.']").val("'.$each_episode_link[$i].'");';
                  echo '$("#add_view_img_'.$j.'").prop("src","'.base_url('images/series_banner/'.$each_episode_image[$i]).'");';
                  echo '$("#post_add_view_img_'.$j.'").prop("src","'.base_url('images/series_banner/'.$each_episode_poster[$i]).'");';
               $i+=1;
            }
            ?>
         },500);
          
   });

</script>