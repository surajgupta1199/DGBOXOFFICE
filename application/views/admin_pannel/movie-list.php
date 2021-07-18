      <!-- Page Content  -->
      <div id="content-page" class="content-page">
         <div class="container-fluid">
            <div class="row">
               <div class="col-sm-12">
                  <div class="iq-card">
                     <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                           <h4 class="card-title">Movie Lists</h4>
                        </div>
                        <div class="iq-card-header-toolbar d-flex align-items-center">
                           <a href="add-movie.html" class="btn btn-primary">Add movie</a>
                        </div>
                     </div>
                     <div class="iq-card-body">
                        <div class="table-view">
                           <table class="data-tables table movie_table" style="width:100%">
                              <thead>
                                 <tr>
                                    <th>Movie</th>
                                    <th>Category</th>
                                    <th>Release Year</th>
                                    <th>Language</th>
                                    <th style="width: 20%;">Director</th>
                                    <th> Status </th>
                                    <th>Action</th>
                                 </tr>
                              </thead>
                              <tbody>
                              </tbody>
                           </table>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>

<script>

   function delete_category(cat_id,common_id){
      swal({
         title: "Are You Sure?",
         text: "You want to delete",
         icon: "warning",
         buttons: true,
         dangerMode: true,
         }).then((willDelete) => {
            if (willDelete) {        
               $.ajax({  
                  url:"<?php echo base_url('admin/movie/delete_movie'); ?>",   
                  type: "POST",  
                  data: {'movie_id':cat_id,'common_id':common_id},
                  dataType: 'JSON',
                  success:function(result){
                     if(result == 1){
                        table.ajax.reload();
                        swal('success','successfully deleted movie','success');
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
               url:"<?php echo base_url(); ?>admin/movie/movie_list_view", 
               type: "POST",
               error: function(response){
                     console.log(response);
               }
            }
      });
   });
</script>