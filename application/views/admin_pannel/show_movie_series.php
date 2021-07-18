<div class="row">
	<?php if(!empty($movie)){ ?>
	<div class="col-md-6">
		<table id="bootstrap-data-table-export" class="table table-striped table-bordered">
		    <thead>
		        <tr>
		            <th class="col-md-6">Movie Name</th>
		            <th class="col-md-6">Category</th>
		        </tr>
		    </thead>
		    <tbody>
		    	<?php 
		            $no = 1;
	        		foreach($movie[0] as $row){
	        			echo 	"<tr>
						            <td>
						            	<div class='checkbox d-inline-block mr-2'>
		                              		<input class='checked_movie_type' type='checkbox' id='add_movie_".$row["common_id"]."' name='common_id[]' value=".$row["common_id"].">
		                              		<label for='add_movie_".$row["common_id"]."'>".$row["title"]."</label>
		                           		</div>
		                       		</td>
				            
				            		<td>".$row['cat_name']."</td>
			            		</tr>";
	        		}
		        
		    	?>
		    </tbody>
		    <div id='course_value' hidden></div>
		</table>
	</div>
	<?php }?>
	<?php if(!empty($series)){ ?>
	<div class="col-md-6">
		<table id="bootstrap-data-table-export" class="table table-striped table-bordered">
		    <thead>
		        <tr>
		            <th class="col-md-6">Series Name</th>
		            <th class="col-md-6">Category</th>
		        </tr>
		    </thead>
		    <tbody>
	        	<?php 
		            $no = 1;
	        		foreach($series[0] as $row){
	        			echo " 	<tr>
				            		<td>
				            			<div class='checkbox d-inline-block mr-2'>
					            			<input class='checked_series_type' type='checkbox' id='add_show_".$row["id"]."' name='common_id[]' value=".$row["common_id"].">
					            			<label for='add_show_".$row["id"]."'>".$row["title"]."</label></td>
				            			</div>
				            		<td>".$row['cat_name']."</td>
			            		</tr>";
	        		}   
		        
		    	?>
		    </tbody>
		    <div id='course_value' hidden></div>
		</table>
	</div>
	<?php }?>
	<div id="series_value"></div>
	<div id="movie_value" hidden></div>
</div>



<script>
	<?php if(!empty($movie)){?>
	    $('.checked_movie_type').on('change',function(e){
	        e.preventDefault();
	        var movie_value = "";  
	        $("input:checkbox[class=checked_movie_type]:checked").each(function () {
	            if(movie_value == ""){
	                movie_value =$(this).val();
	            }else{
	                movie_value = movie_value + ',' + ($(this).val());
	            }
	        });

	        $('#movie_value').val(movie_value);
	    })
	<?php }?>
	<?php if(!empty($series)){?>
		$('.checked_series_type').on('change',function(e){
	        e.preventDefault();
	        var series_value = "";  
	        $("input:checkbox[class=checked_series_type]:checked").each(function () {
	            if(series_value == ""){
	                series_value =$(this).val();
	            }else{
	                series_value = series_value + ',' + ($(this).val());
	            }
	        });
	        
	        $('#series_value').val(series_value);
	    })
	<?php }?>
</script>