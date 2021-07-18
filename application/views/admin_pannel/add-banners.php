
<?php if(empty($data)){?>
<div id="content-page" class="content-page">
   <div class="container-fluid">
      <div class="row">
         <div class="col-sm-12">
            <div class="iq-card">
               <div class="iq-card-header d-flex justify-content-between">
                  <div class="iq-header-title">
                     <h4 class="card-title">Add Banners</h4>
                  </div>
               </div>
               <div class="iq-card-body">
                  <div class="row">
                     <div class="col-lg-12">
                        <form id="add_banners">
                           <div class="slider-banner-container">
                              <div class="custom-control custom-switch custom-control-inline">
                                 <input type="checkbox" value = "1" class="custom-control-input" id="tg_Movie">
                                 <label class="custom-control-label" for="tg_Movie">Movies</label>
                              </div>
                              <div class="custom-control custom-switch custom-control-inline">
                                 <input type="checkbox" value = "2" class="custom-control-input" id="tg_Series">
                                 <label class="custom-control-label" for="tg_Series">Series</label>
                              </div>
                           </div>
                           <div id="cat_value" hidden></div>
                        </form>
                     </div>
                     <div class="col-md-12 form-group">
                        <div class="col-md-4"></div>
                        <div class="col-md-8 text-center">
                           <button type="submit" class="btn btn-primary selected_cat">Select</button>
                           <button type="reset" class="btn btn-danger deselect_item">Reset</button>
                        </div>
                     </div>
                  </div>
                  <div id="view_result"></div>
                  <div class="row">
                    <div class="col-12 form-group">
                       <button type="submit" class="btn btn-primary" id="show_btn" style="display: none;">Submit</button>
                    </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<?php } else{?>

  <?php 
    $movie ="";$series="";
    foreach($type as $row){
      if($row['type'] == 1){$movie = "checked";}else{$series = "checked";}
  }?>

<div id="content-page" class="content-page" id="fetch_value">
   <div class="container-fluid">
      <div class="row">
         <div class="col-sm-12">
            <div class="iq-card">
               <div class="iq-card-header d-flex justify-content-between">
                  <div class="iq-header-title">
                     <h4 class="card-title">Add Banners</h4>
                  </div>
               </div>
               <div class="iq-card-body">
                  <div class="row">
                     <div class="col-lg-12">
                        <form id="add_banners">
                           <div class="slider-banner-container">
                              <div class="custom-control custom-switch custom-control-inline">
                                 <input type="checkbox" <?php echo $movie; ?> value = "1" class="custom-control-input" id="tg_Movie">
                                 <label class="custom-control-label" for="tg_Movie">Movies</label>
                              </div>
                              <div class="custom-control custom-switch custom-control-inline">
                                 <input type="checkbox" <?php echo $series; ?> value = "2" class="custom-control-input" id="tg_Series">
                                 <label class="custom-control-label" for="tg_Series">Series</label>
                              </div>
                           </div>
                           <div id="cat_value" hidden></div>
                        </form>
                     </div>
                     <div class="col-md-12 form-group">
                        <div class="col-md-4"></div>
                        <div class="col-md-8 text-center">
                           <button type="submit" id="selected_cat" class="btn btn-primary selected_cat">Select</button>
                           <button type="reset" class="btn btn-danger deselect_item">Reset</button>
                        </div>
                     </div>
                  </div>
                  <div id="view_result"></div>
                  <div class="row">
                    <div class="col-12 form-group">
                       <button type="submit" class="btn btn-primary" id="show_btn" style="display: none;">Submit</button>
                    </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<?php }?>

<script>

    $('document').ready(function(){
      <?php if(!empty($data)){ ?>

          var cat_id_value = "";

          $("input:checkbox[class=custom-control-input]:checked").each(function () {
              if(cat_id_value == ""){
                  cat_id_value =$(this).val();
              }else{
                  cat_id_value = cat_id_value + ',' + ($(this).val());
              }
          });

          $.ajax({
              url:"<?php echo base_url(); ?>admin/slider_banners/fetch_content", 
              method:"POST",
              data:{'cat_value':cat_id_value},    
              success:function(result)
              { 
                  $('#view_result').show();
                  $('#view_result').html(result);
              },
              error: function(response){
                  console.log(response + 'fail');
              }
          });

          <?php foreach($data as $row){
              echo 'setTimeout(function(){
                        $(":checkbox[class=checked_movie_type][value='.$row["common_id"].']").prop("checked","true");
                        $(":checkbox[class=checked_series_type][value='.$row["common_id"].']").prop("checked","true");
                        $(".checked_movie_type").prop("disabled", true);
                        $(".checked_series_type").prop("disabled", true);
                    },1000);';
          } ?>

       <?php }?> 

    })


    $(":checkbox[class=checked_box][value=5]").prop("checked","true");

    $('.deselect_item').prop('disabled', true);
    <?php if(!empty($data)){ ?>
        $('.custom-control-input').prop('disabled', true);
        $('.selected_cat').prop('disabled', true);
        $('.deselect_item').prop('disabled', false);
    <?php }?>


    $('.selected_cat').click(function(e){
        e.preventDefault();

        $('#show_btn').show();

        var cat_id_value = "";
        $("input:checkbox[class=custom-control-input]:checked").each(function () {
            if(cat_id_value == ""){
                cat_id_value =$(this).val();
            }else{
                cat_id_value = cat_id_value + ',' + ($(this).val());
            }
        });

        if(cat_id_value == ''){
            alert('please select any 1 Content');
            return false; 
        }

        $('.custom-control-input').prop('disabled', true);
        $('.selected_cat').prop('disabled', true);
        $('.deselect_item').prop('disabled', false);

        $('#cat_value').val(cat_id_value);

        $.ajax({
            url:"<?php echo base_url(); ?>admin/slider_banners/fetch_content", 
            method:"POST",
            data:{'cat_value':cat_id_value},    
            success:function(result)
            { 
                $('#view_result').show();
                $('#view_result').html(result);
            },
            error: function(response){
                console.log(response + 'fail');
            }
        });
    });


    $('.deselect_item').click(function(e){
      e.preventDefault();

      $('#show_btn').hide();
      $('.custom-control-input').prop('disabled', false);
      $('.selected_cat').prop('disabled', false);
      $('.deselect_item').prop('disabled', true);
      $('#view_result').hide();

    })


    $('#show_btn').click(function(e){
        e.preventDefault();

        var movie = $('#movie_value').val();
        var series = $('#series_value').val();

        var cat_value = "";
        $("input:checkbox[class=custom-control-input]:checked").each(function () {
            cat_value =$(this).val();
            if(cat_value == 1){
                if(movie == ""){
                    alert("please select movie banner name");
                    return false;
                }
            }

            if(cat_value == 2){
                if(series == ""){
                    alert("please select series banner name");
                    return false;
                }
            }
        });

        $.ajax({
            url:"<?php echo base_url(); ?>admin/slider_banners/add_banner", 
            method:"POST",
            data:{'movie_common_id':movie,'series_common_id':series},    
            success:function(result)
            { 
                if(result == 1){
                  swal('success','successfully added banner image','success');
                  location.reload();
                }
            },
            error: function(response){
                console.log(response + 'fail');
            }
        });
    })
</script>