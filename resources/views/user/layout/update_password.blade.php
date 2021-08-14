
<!-- Modal-->

<div  id="userUpdatePasswordModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
  <div role="document" class="modal-dialog ">
    <div class="modal-content">
      <div class="modal-header">
        <h5 id="exampleModalLabel" class="modal-title">Change Password</h5>
          <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
      </div>
      <div class="modal-body">
      <form id="userUpdatePasswordForm">
     {{csrf_field()}}
     {{method_field('PUT')}}
     <input type="hidden" id="up_id" name="up_id" value="{{Auth::user()->id}}">
                    <div class="row">
                          <div class="col">
                            <div class="form-group">
                              <label>New Password</label>
                              <input class="form-control" type="password" name="old_password" id="old_password" placeholder="Enter old password">
                              <span class="text-danger">
                                <strong id="old_password-error"></strong>
                            </span>
                            </div>                          
                    </div>
                    </div>
                    <div class="row">
                          <div class="col">
                            <div class="form-group">
                              <label>New Password</label>
                              <input class="form-control" type="password" name="new_up_password" id="new_up_password" placeholder="Enter new password">
                              <span class="text-danger">
                                <strong id="new_up_password-error"></strong>
                            </span>
                            </div>                          
                    </div>
                    </div>
                    <div class="row">
                          <div class="col">
                            <div class="form-group">
                              <label>Confirm Password</label>
                              <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Retype password">
                              <span class="text-danger">
                                <strong id="password_confirmation-error"></strong>
                              </span>
                            </div>
                          </div>
                        </div>

              <div class="modal-footer">
              <button type="button" data-dismiss="modal" class="btn btn-secondary">Close</button>
              <button type="submit" class="btn btn-primary ">Save changes</button>  
              </div>            
                      </div>
                    </div>
                
            
        </div>
        </form>                  
    </div>
  </div>
</div>

<script type="text/javascript">
    $().ready(function(){
      $('.updatepasswordbtn').on('click',function(){
        //var contact = $(this).attr('Contact_no');
        //$('#up_contact').val(contact);  
        $('#userUpdatePasswordModal').modal('show');
        
      });
    });
</script>

<script type="text/javascript">
$().ready(function(){
$('#userUpdatePasswordForm').on('submit',function(e){
  
  e.preventDefault();
     var id = $("#up_id").val();
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
          url: "profile/update/password/"+id,
          data: $('#userUpdatePasswordForm').serialize(),
          success:function(data){
        console.log(data);
        if(data.errors) {
            if(data.errors.old_password){
              $( '#old_password-error' ).html( data.errors.old_password[0] );
              }
            if(data.errors.new_up_password){
              $( '#new_up_password-error' ).html( data.errors.new_up_password[0] );
              }
            if(data.errors.password_confirmation){
              $( '#password_confirmation-error' ).html( data.errors.password_confirmation[0] );
              }
              }
        if(data.success) {
            $('#userUpdateModal').modal('hide');
            //alert("data updated");
            swal("Good job!", "Data have been Saved!", "success").then(function(){
            location.reload();
            });
              }
            },
        });

        } 
    }) 

    
});
}); 
</script>