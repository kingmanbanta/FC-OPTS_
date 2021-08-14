
<!-- Modal-->

<div  id="userUpdateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
  <div role="document" class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 id="exampleModalLabel" class="modal-title">Edit Account</h5>
          <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
      </div>
      <div class="modal-body">
      <form id="updateForm">
     {{csrf_field()}}
     {{method_field('PUT')}}
     <input type="hidden" id="up_id" name="up_id" value="{{Auth::user()->id}}">
     <div class="row">
                      <div class="col">
                        <div class="row">
                          <div class="col-4">
                            <div class="form-group">
                              <label>First Name</label>
                              <input class="form-control" type="text" name="up_fname" id="up_fname" value="{{Auth::user()->name}}" >
                            </div>
                          </div>
                          <div class="col-3">
                            <div class="form-group">
                              <label>Middle Name</label>
                              @if(empty($userr->mname))
                              <input class="form-control" type="text" name="up_mname" id="up_mname" placeholder="" >
                              @else
                              <input class="form-control" type="text" name="up_mname" id="up_mname" value="{{$userr->mname}}" >
                              @endif
                            </div>
                          </div>
                          <div class="col-3">
                            <div class="form-group">
                              <label>Last Name</label>
                              @if(empty($userr->lname))
                              <input class="form-control" type="text" name="up_lname" id="up_lname" placeholder="" >
                              @else
                              <input class="form-control" type="text" name="up_lname" id="up_lname" value="{{$userr->lname}}" >
                              @endif
                            </div>
                          </div>
                          <div class="col-2">
                            <div class="form-group">
                              <label>Sex</label>
                              @if(empty($userr->sex))
                              <select name="up_sex" id="up_sex" class="form-control">
                              <option value="" disabled selected hidden>select</option>
                                  <option value="Female">Female</option>
                                  <option value="Male">Male</option>
                                  <option value="other">Other</option>
                              </select>
                              @else
                              <select name="up_sex" id="up_sex" class="form-control">
                                  <option value="{{$userr->sex}}" hidden>{{$userr->sex}}</option>
                                  <option value="Female">Female</option>
                                  <option value="Male">Male</option>
                                  <option value="other">Other</option>
                              </optgroup>
                              </select>
                              @endif
                              
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col">
                            <div class="form-group">
                              <label>Email</label>
                              <input class="form-control" type="text" name="up_email" id="up_email" placeholder="{{Auth::user()->email}}" value="{{Auth::user()->email}}" >
                            </div>
                          </div>
                          <div class="col">
                            <div class="form-group">
                              <label>Contact No.</label>
                              @if(empty($userr->Contact_no))
                              <input class="form-control" type="text" name="up_contact" id="up_contact" placeholder="">
                              @else
                              <input class="form-control" type="text" name="up_contact" id="up_contact" value="{{$userr->Contact_no}}" >
                              @endif
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col">
                            <div class="form-group">
                              <label>Address</label>
                              @if(empty($userr->Address))
                              <input class="form-control" type="text" name="up_address" id="up_address" placeholder="" >
                              @else
                              <input class="form-control" type="text" name="up_address" id="up_address" value="{{$userr->Address}}" >
                              @endif
                            </div>
                          </div>
                          <div class="col">
                            <div class="form-group">
                              <label>Department</label>
                              @if(empty($userr->Dept_name))
                              <select name="up_dept_id" id="up_dept_id" class="form-control">
                              <option value="" disabled selected hidden>select</option>
                                  @foreach($department as $departments)
                                  <option value="{{$departments->id}}">{{$departments->Dept_name}}</option>
                                  @endforeach
                              </select>
                              @else
                              <select name="up_dept_id" id="up_dept_id" class="form-control" >
                                  <option value="{{$userr->id}}" hidden>{{$userr->Dept_name}}</option>
                                  @foreach($department as $departments)
                                  <option value="{{$departments->id}}">{{$departments->Dept_name}}</option>
                                  @endforeach
                              </select>
                              @endif
                              
                            </div>
                          </div>
                        </div>
                        <!--<div class="row">
                          <div class="col">
                            <div class="form-group">
                              <label>New Password</label>
                              <input class="form-control" type="password" name="new_up_password" id="new_up_password" placeholder="Enter old password">
                            </div>
                          </div>
                          <div class="col">
                            <div class="form-group">
                              <label>Confirm Password</label>
                              <input type="password" name="password_confirmation" class="form-control" placeholder="Retype password">
                              <span class="text-danger">
                                <strong id="new_up_password-error"></strong>
                              </span>
                            </div>
                          </div>
                        </div>-->

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
      $('.updatebtn').on('click',function(){
        //var contact = $(this).attr('Contact_no');
        //$('#up_contact').val(contact);  
        $('#userUpdateModal').modal('show');
        
      });
    });
</script>

<script type="text/javascript">
$().ready(function(){
$('#updateForm').on('submit',function(e){
  
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
          url: "profile/update/"+id,
          data: $('#updateForm').serialize(),
          success:function(data){
        console.log(data);
        if(data.errors) {
            if(data.errors.email){
              $( '#email-error' ).html( data.errors.email[0] );
              }
            if(data.errors.new_up_password){
              $( '#new_up_password-error' ).html( data.errors.new_up_password[0] );
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