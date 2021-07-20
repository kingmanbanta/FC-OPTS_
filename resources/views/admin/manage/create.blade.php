
<!-- Modal-->

<div id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
  <div role="document" class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 id="exampleModalLabel" class="modal-title">Create Account</h5>
          <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
      </div>
      <form id="createForm" >
        {{csrf_field()}}
        <div class="modal-body">
          <div class="form-group">
            <label>Name</label>
            <input type="text" name="name" value="{{ old('name') }}" class="form-control" placeholder="Full name">
                            <span class="glyphicon glyphicon-user form-control-feedback"></span>
                            <span class="text-danger">
                                <strong id="name-error"></strong>
                            </span>
             
          </div>
          
            <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="Email">
                            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                            <span class="text-danger">
                                <strong id="email-error"></strong>
                            </span>
            </div>

                <div class="form-group">
                  <label for="" class="">{{ __('Password') }}</label>     
                  <input type="password" name="password" class="form-control" placeholder="Password">
                            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                            <span class="text-danger">
                                <strong id="password-error"></strong>
                            </span>
                      </div>
                      <div class="form-group">
                  <label for="" class="">{{ __('confirm-Password') }}</label>     
                  <input type="password" name="password_confirmation" class="form-control" placeholder="Retype password">
                            <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
                          </div>

                        <label for="role_id">Roles:</label>                                                            
                          <div class="mt-4">
                            <select name="role_id" class="form-control">
                              @foreach($roles as $role)
                                <option value="{{$role->id}}">{{$role->display_name}}</option>
                              @endforeach
                            </select>
                      </div>
                        <div class="modal-footer">
                          <button type="button" data-dismiss="modal" class="btn btn-secondary">Close</button>
                          <button type="submit" id="submitForm" class="btn btn-primary">Save changes</button>
                        </div>
        </div>                        
      </form>
    </div>
  </div>
</div>
<script type="text/javascript">
$().ready(function(){
$('#createForm').on('submit',function(e){
  
  e.preventDefault();
     $.ajax({
      type: "POST",
      url: "manageAccount/create/save/",
      data: $('#createForm').serialize(),
      success:function(data){
        console.log(data);
        if(data.errors) {
            if(data.errors.name){
              $( '#name-error' ).html( data.errors.name[0] );
              }
            if(data.errors.email){
              $( '#email-error' ).html( data.errors.email[0] );
              }
            if(data.errors.password){
              $( '#password-error' ).html( data.errors.password[0] );
              }
              }
        if(data.success) {
            $('#userEditModal').modal('hide');
            //alert("data updated");
            swal("Good job!", "Data have been Saved!", "success").then(function(){
            location.reload();
            });
              }
            },

     });
});
}); 
</script>                                     
                                        