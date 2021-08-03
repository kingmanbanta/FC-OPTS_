
<!-- Modal-->

<div  id="userUpdateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
  <div role="document" class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 id="exampleModalLabel" class="modal-title">Edit Account</h5>
          <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
      </div>
      <div class="modal-body">
      <form id="updateForm">
     {{csrf_field()}}
     {{method_field('PUT')}}
     <div class="form-group">
        <input type="hidden" id="upid" name="upid" value="{{Auth::user()->id}}" class="form-control" />
          </div>
          <div class="form-group">
            <label>Name</label>
              <input type="text" name="upname" id="upname" value="{{Auth::user()->name}}" class="form-control">
          </div>
            <div class="form-group">
              <label >Email</label>
                <input type="email" name="upemail" id="upemail"  value="{{Auth::user()->email}}" class="form-control">
            </div>
            <div class="form-group">
              <label >Password</label>
                <input type="password" name="password" id="password" value="{{Auth::user()->password}}"  class="form-control"readonly>
            </div>
            <div class="form-group">
              <label >new-Password</label>
                <input type="password" name="uppassword" id="uppassword" class="form-control">
            </div>
            <div class="form-group">    
                  <label for="urole_id">Role:</label>
                  <input id="urole" type="text" class="form-control" value="{{$user->display_name}}" name="urole" readonly>       
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
      $('.updatebtn').on('click',function(){
        $('#userUpdateModal').modal('show');
      });
    });
</script>

<script type="text/javascript">
$().ready(function(){
$('#updateForm').on('submit',function(e){
  
  e.preventDefault();
     var id = $("#upid").val();
     swal({
      title: 'Save Changes?',
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'OK',
      closeOnConfirm: true,
      closeOnCancel: true
    }).then((result) => { 
        if (result.value===true) { 
          //$('#logout-form').submit() // this submits the form 
          $.ajax({
          type: "PATCH",
          url: "profile/update/"+id,
          data: $('#updateForm').serialize(),
          success:function(response){
            console.log(response);
            $('#userUpdateModal').modal('hide');
            //alert("data updated");
            swal("Good job!", "Data have been Updated!", "success").then(function(){
            location.reload();
            });
          }
        });

        } 
    }) 

    
});
}); 
</script>