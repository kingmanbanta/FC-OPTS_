
<!-- Modal-->

<div  id="userEditModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
  <div role="document" class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 id="exampleModalLabel" class="modal-title">Edit Account</h5>
          <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
      </div>
      <div class="modal-body">
      <form id="editForm">
     {{csrf_field()}}
     {{method_field('PUT')}}
     <div class="form-group">
        <input type="hidden" id="uid" name="uid" class="form-control" />
          </div>
          <div class="form-group">
            <label>Name</label>
              <input type="text" name="uname" id="uname" class="form-control">
          </div>
            <div class="form-group">
              <label >Email</label>
                <input type="email" name="uemail" id="uemail" class="form-control">
            </div>
            <div class="form-group">
              <label >Password</label>
                <input type="password" name="upassword" id="upassword" class="form-control">
            </div>
            <div class="form-group">    
                  <label for="urole_id">Current Role:</label>
                  <input id="urole" type="text" class="form-control " name="urole" readonly>       
                      </div>
            <div class="form-group">    
                  <label for="urole">Update To:</label>
                            <select id="urole_id" name="urole_id"  class="form-control">
                                <option value="" >Choose your Role</option>-->
                                <option value="1">Administrator</option>
                                <option value="2">Validator</option>
                                <option value="3">Processor</option>
                                <option value="4">Approver</option>
                                <option value="5">Requestor</option>
                            </select>
                      </div>
                
                        <div class="modal-footer">
                          <button type="button" data-dismiss="modal" class="btn btn-secondary">Close</button>
                          <button type="submit" class="btn btn-primary ">Save changes</button>
                        </div>
        </div>
        </form>                  
    </div>
  </div>
</div>

<script type="text/javascript">
    $().ready(function(){
      $('.editbtn').on('click',function(){
        $('#userEditModal').modal('show');

        $tr = $(this).closest('tr');
        
        var data = $tr.children("td").map(function(){
          return $(this).text();
        }).get();

        console.log(data);

        $('#uid').val(data[0]);
        $('#uname').val(data[1]);
        $('#uemail').val(data[2]);
        $('#upassword').val(data[3]);
        $('#urole').val(data[4]);
      });
    });
</script>

<script type="text/javascript">
$().ready(function(){
  
$('#editForm').on('submit',function(e){
  
  e.preventDefault();
     var id = $("#uid").val();

     $.ajax({
      type: "PATCH",
      url: "manageAccount/update/"+id,
      data: $('#editForm').serialize(),
      success:function(response){
        console.log(response);
        $('#userEditModal').modal('hide');
        //alert("data updated");
        swal("Good job!", "Data have been Updated!", "success").then(function(){
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


  
  

   



                                      
             
                                      
                                      












