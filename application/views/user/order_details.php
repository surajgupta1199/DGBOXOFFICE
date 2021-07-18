      <!-- Page Content  -->
   <section class="m-profile manage-p">
         <div class="container h-100">
            <div class="row">
               <div class="col-sm-12">
                  <div class="sign-user_card">
                     <div class="row align-items-center justify-content-center h-100">
                       
                           <h4 class=" mt-10">Order Lists</h4>
                         
                     </div>
                     <div class="iq-card-body">
                        <div class="table-view">
                           <table class="data-tables table order_table" style="width:100%">
                              <thead>
                                 <tr>
                                    <th style="width:10%;">No</th>
                                    <!-- <th style="width:20%;">User Name</th>
                                    <th style="width:20%;">User Mobile</th> -->
                                    <th style="width:40%;">Title</th>
                                    <th style="width:20%;">Type</th>
                                    <th style="width:10%;">Price</th>
                                    <th style="width:10%;">ordered_on</th>
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
      </section>
        

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
         table = $('.order_table').DataTable({
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
               url:"<?php echo base_url(); ?>home/fetch_orders", 
               type: "POST",
               error: function(response){
                     console.log(response);
               }
            }
      });
   });
</script>