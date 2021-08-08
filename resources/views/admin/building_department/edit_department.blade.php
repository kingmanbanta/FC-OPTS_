
<!-- Modal-->

<div  id="dept_EditModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
  <div role="document" class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 id="exampleModalLabel" class="modal-title">Edit Account</h5>
          <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
      </div>
      <div class="modal-body">
      <form id="dept_EditForm">
     {{csrf_field()}}
     {{method_field('PUT')}}
     <div class="form-group">
        <input type="hidden" id="dept_edit_id" name="dept_edit_id" class="form-control" />
          </div>
          <div class="form-group">
            <label>Department No.</label>
              <input type="text" name="dept_edit_idd" id="dept_edit_idd" class="form-control">
          </div>
          <div class="form-group">
            <label>Department Name</label>
              <input type="text" name="dept_edit_name" id="dept_edit_name" class="form-control">
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
      $('.edit_btn').on('click',function(){
        $('#dept_EditModal').modal('show');

        $tr = $(this).closest('tr');
        
        var data = $tr.children("td").map(function(){
          return $(this).text();
        }).get();

        console.log(data);

        $('#dept_edit_id').val(data[0]);
        $('#dept_edit_idd').val(data[0]);
        $('#dept_edit_name').val(data[1]);
      });
    });
</script>

<script type="text/javascript">
$().ready(function(){
$('#dept_EditForm').on('submit',function(e){
  
  e.preventDefault();
     var id = $("#dept_edit_id").val();
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
          url: "department/update/"+id,
          data: $('#dept_EditForm').serialize(),
          success:function(response){
            console.log(response);
            $('#dept_EditModal').modal('hide');
            //alert("data updated");
            swal("Good job!", "Data have been Updated!", "success").then(function(){
            location.reload();
            });
          }
        });

        }else{

        }
    }) 

    
});
}); 
</script>