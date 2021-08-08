
<!-- Modal-->

<div id="addDepartment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
  <div role="document" class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 id="exampleModalLabel" class="modal-title">Add Department</h5>
          <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
      </div>
      <form id="addDepartmentForm" >
        {{csrf_field()}}
        <div class="modal-body">
            <div class="form-group">
                <label>Department No.</label>
                    <input type="text" name="id" class="form-control" placeholder="Department Room#">
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                            <span class="text-danger">
                                <strong id="id-error"></strong>
                            </span>
             
            </div>
        <div class="form-group">
            <label>Department</label>
                <input type="text" name="dept_name" class="form-control" placeholder="Department Name">
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    <span class="text-danger">
                        <strong id="dept_name-error"></strong>
                    </span>
        </div>

        <div class="form-group">
            <label for="">Building Name</label>                                                            
                <select name="build_id" class="form-control">
                    @foreach($building as $buildings)
                    <option value="{{$buildings->id}}">{{$buildings->Building_name}}</option>
                    @endforeach
                </select>
        </div>

        <div class="modal-footer">
            <button type="button" data-dismiss="modal" class="btn btn-secondary">Close</button>
            <button type="submit"  class="btn btn-primary">Save changes</button>
        </div>                        
                        
        </div>                        
      </form>
    </div>
  </div>
</div>
<script type="text/javascript">
$().ready(function(){
$('#addDepartmentForm').on('submit',function(e){
  
  e.preventDefault();
     $.ajax({
      type: "POST",
      url: "department/add/save/",
      data: $('#addDepartmentForm').serialize(),
      success:function(data){
        console.log(data);
        if(data.errors) {
            if(data.errors.id){
              $( '#id-error' ).html( data.errors.id[0] );
              }
            if(data.errors.dept_name){
              $( '#dept_name-error' ).html( data.errors.dept_name[0] );
              }
              }
        if(data.success) {
            $('#addDepartment').modal('hide');
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
                                        