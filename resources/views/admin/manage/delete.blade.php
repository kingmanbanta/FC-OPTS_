
<!-- Modal-->

<div  id="userDeleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
  <div role="document" class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 id="exampleModalLabel" class="modal-title">Edit Account</h5>
          <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
      </div>
      <div class="modal-body">
      <form id="deleteForm">
     {{csrf_field()}}
     {{method_field('DELETE')}}
     <div class="form-group">
        <input type="hidden" id="delete_id" name="delete_id" class="form-control" />
          </div>
                <p>Are you Sure!!You want to Delete this data?</p>
                        <div class="modal-footer">
                          <button type="button" data-dismiss="modal" class="btn btn-secondary">Cancel</button>
                          <button type="submit" class="btn btn-primary ">Delete</button>
                        </div>
        </div>
        </form>                  
    </div>
  </div>
</div>

<script type="text/javascript">
    $().ready(function(){
      $('.deletebtn').on('click',function(){
        $('#userDeleteModal').modal('show');

        $tr = $(this).closest('tr');
        
        var data = $tr.children("td").map(function(){
          return $(this).text();
        }).get();

        console.log(data);

        $('#delete_id').val(data[0]);
       
      });
    });
</script>

<script type="text/javascript">
$().ready(function(){
  
$('#deleteForm').on('submit',function(e){
  
  e.preventDefault();
     var id = $("#delete_id").val();

     $.ajax({
      type: "DELETE",
      url: "manageAccount/delete/"+id,
      data: $('#deleteForm').serialize(),
      success:function(response){
        console.log(response);
        $('#userDeleteModal').modal('hide');
        //alert("data deleted");
        //location.reload();
        swal("Good job!", "Data have been Deleted!", "success").then(function(){
        location.reload();
        });
      },
        error:function(error){
          console.log(error);
        }

     });
});
}); 
</script>


  
  

   



                                      
             
                                      
                                      












