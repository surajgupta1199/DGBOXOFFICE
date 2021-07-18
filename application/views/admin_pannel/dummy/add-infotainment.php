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
                        <form id="add_session">
                           <div class="row">
                              <div class="col-md-6 form-group">
                                 <input type="text" name="session_name" class="form-control" placeholder="Session Name" required>
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
                                 <label id="add_banner" for="add_form_gallery-upload">Upload Session Banner</label>
                                 <input data-name="#add_banner" name="session_banner" id="add_form_gallery-upload"class="form-control form_gallery-upload"
                                    type="file" accept=".png, .jpg, .jpeg" onchange="UploadUrl(this,'add_view_img_0');" >
                                 <div class="fileupload_img"><img type="image" id="add_view_img_0" src="<?php echo base_url('assets/assets/images/dashboard/03.jpg'); ?>"style="width: 40%;height: 200px" alt="Featured image" /></div>
                              </div>
                              <div class="col-sm-6 form-group">
                                 <input type="url" id="series_url" name="session_trail_link" rows="5" class="form-control" placeholder="Enter Session url" required>
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
                              <div class="col-sm-6 form-group">
                                 <input type="text" class="form-control" name="total_duration" placeholder="Total Session Duration" required>
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
                                 <input type="text" name="release_year" class="form-control" placeholder="Release year" required>
                              </div>
                              <div class="col-sm-6 form-group">
                                 <input type="text" class="form-control" name="price" placeholder="Enter price" required>
                              </div>
                              <div class="col-sm-6 form-group">
                                 <input type="url" name="domain_url" class="form-control" placeholder="Enter Sub Domain url" required>
                              </div>
                              <div class="col-sm-6 form-group">
                                 <input type="text" id="total_number_session" name="total_number_session" class="form-control" maxlength="2" placeholder="Enter Total Session" required>
                              </div>
                           </div>
                           <hr>
                           <span id="show_episode"></span>
                           <div class="row" id="hide_data" style="display: none;">
                              <div class="col-6">
                                 <h5 class="text-white mb-3">Conducted By</h5>
                              </div>
                              <div class="col-6">
                                 <h5 class="text-white mb-3">Synopsis</h5>
                              </div>
                              <div class="col-sm-6 form-group">
                                 <input id="conducted_by" name="conducted_by" rows="5" class="form-control"
                                    placeholder="conducted_by" >
                              </div>
                              <div class="col-sm-6 form-group">
                                 <input id="synopsis" name="synopsis" rows="5" class="form-control"
                                    placeholder="Synopsis" >
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
   var total_number_session ="";
   
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
   var conducted_by = "";
   var cat_type ="";

   $('#add_session').submit(function(e){
      e.preventDefault();

      var each_synopsis = [];

      if(total_number_session == 0){
         alert('please enter number of total Session');
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

      var form = new FormData(this);

      form.append('each_synopsis',each_synopsis);
      form.append('synopsis',synopsis.getData());
      form.append('conducted_by',conducted_by.getData());
      form.append('cat_type',cat_type);

      $.ajax({
         url:'<?php echo base_url("admin/infotainment/add_infotainment"); ?>',
         type:"POST",
         data:form,
         processData: false,
         contentType: false,
         cache:false,
         dataType:"JSON",
         success:function(result){
            if(result.type == "success"){
               swal('success','series added successfully','success');
               window.location.replace('<?php echo base_url("admin/infotainment_list"); ?>');
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

      $('input[name=status][value=0]').prop('checked',true);
      
      $("#total_number_session").keyup(function(){
         total_number_session = $(this).val();
         if(total_number_session > 15){
            alert('Number of session should not more than 15');
            total_number_session = 0;
            $("#total_number_session").val('');
            return false;
         }

         var output = "";
         for(var i=1;i <= total_number_session;i++){
            var banner_id = "'add_view_img_"+i+"'";

            output+= ('<div class="row"><div class="col-12"><h5 class="text-white mb-3">Session '+ i +'</h5></div><div class="col-sm-6 form-group"><input type="text" name="each_session_name[]" class="form-control" placeholder="Enter Each Session Name" required></div><div class="col-sm-6 form-group"><input type="text" name="session_duration[]" class="form-control" placeholder="Enter Each Session Duration" required></div><div class="col-sm-6 form_gallery form-group"><label id="add_banner_episode" for="add_form_gallery-upload_'+i+'">Upload Show Banner</label><input data-name="#add_banner_episode" name="session_banner_'+i+'" id="add_form_gallery-upload_'+i+'" class="form-control form_gallery-upload" type="file" accept=".png, .jpg, .jpeg" onchange="UploadUrl(this,'+banner_id+');" ><div class="fileupload_img"><img type="image" id="add_view_img_'+i+'" src="<?php echo base_url('assets/assets/images/dashboard/03.jpg'); ?>"style="width: 40%;height: 200px" alt="Featured image" /></div></div><div class="col-sm-6 form-group"><div class="col-12 margin-height"><h6 class="text-white mb-3">Episode Synopsis</h6></div><div class="col-sm-12 form-group"><textarea id="episode_synopsis_'+i+'" rows="5" class="form-control"placeholder="Episode Synopsis"></textarea></div></div></div><div class="col-sm-6 form-group"><input type="url" id="series_url_'+i+'" name="each_episode_link[]" rows="5" class="form-control" placeholder="Enter Session url" required></div><hr>'); 
         }

         $('#show_episode').html(output);
         $('#hide_data').show();

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
            .create(document.querySelector('#conducted_by'))
            .then(editor => {
               conducted_by = editor;

            })
            .catch(error => {
               console.error(error);
         }); 

   });

</script>