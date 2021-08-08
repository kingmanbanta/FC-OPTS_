
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
                          <div class="col-5">
                            <div class="form-group">
                              <label>First Name</label>
                              <input class="form-control" type="text" name="up_fname" id="up_fname" value="{{Auth::user()->name}}" placeholder="{{Auth::user()->name}}">
                            </div>
                          </div>
                          <div class="col-3">
                            <div class="form-group">
                              <label>Middle Name</label>
                              <input class="form-control" type="text" name="up_mname" name="up_mname" placeholder="Enter Middlename" >
                            </div>
                          </div>
                          <div class="col-3">
                            <div class="form-group">
                              <label>Last Name</label>
                              <input class="form-control" type="text" name="up_lname" name="up_lname" placeholder="Enter Lastname" >
                            </div>
                          </div>
                          <div class="col-1">
                            <div class="form-group">
                              <label>Sex</label>
                              <select name="up_sex" class="form-control">
                                  <option value=""></option>
                                  <option value="Female">F</option>
                                  <option value="Male">M</option>
                                  <option value="other">Other</option>
                              </select>
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
                              <input class="form-control" type="text" name="up_contact" id="up_contact" placeholder="enter no." >
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col">
                            <div class="form-group">
                              <label>Address</label>
                              <input class="form-control" type="text" name="up_address" id="up_address" placeholder="Bry.Municipality,Province">
                            </div>
                          </div>
                          <div class="col">
                            <div class="form-group">
                              <label>Department</label>
                              <select name="up_dept_id" class="form-control">
                              <option value=""></option>
                                  @foreach($department as $departments)
                                  <option value="{{$departments->id}}">{{$departments->Dept_name}}</option>
                                  @endforeach
                              </select>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col">
                            <div class="form-group">
                              <label>Confirm-Password</label>
                              <input class="form-control" type="password" name="up_password" id="up_password" placeholder="Enter old password">
                            </div>
                          </div>
                          <div class="col">
                            <div class="form-group">
                              <label>New-Password</label>
                              <input class="form-control" type="password" name="new_up_password" id="new_up_password" placeholder="Enter new password">
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
      $('.updatebtn').on('click',function(){
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