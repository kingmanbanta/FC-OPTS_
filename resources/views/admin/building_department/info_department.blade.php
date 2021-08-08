
<!-- Modal-->

<div  id="dept_InfoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
  <div role="document" class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 id="exampleModalLabel" class="modal-title">Info</h5>
          <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
      </div>
      <div class="modal-body">
      <form id="dept_InfoForm">
     {{csrf_field()}}
     {{method_field('PUT')}}
     <div class="form-group">
        <input type="hidden" id="dept_info_id" name="dept_info_id" class="form-control" />
          </div>
          <div class="form-group">
            <label>Building Name.</label>
              <input type="text" name="dept_info_name" id="dept_info_name" class="form-control" readonly>
          </div>
          <div class="form-group">
            <label>Department</label>
              <input type="text" name="dept_info_build" id="dept_info_build" class="form-control" readonly>
          </div>
          <div class="form-group">
            <label>Addres</label>
              <input type="text" name="dept_info_add" id="dept_info_add" class="form-control" readonly>
          </div>
           <div class="modal-footer">
               <button type="button" data-dismiss="modal" class="btn btn-primary">Close</button>
           </div>
        </div>
        </form>                  
    </div>
  </div>
</div>

<script type="text/javascript">
    $().ready(function(){
      $('.info_btn').on('click',function(){
        $('#dept_InfoModal').modal('show');

        $tr = $(this).closest('tr');
        
        var data = $tr.children("td").map(function(){
          return $(this).text();
        }).get();

        console.log(data);

        $('#dept_info_id').val(data[0]);
        $('#dept_info_name').val(data[1]);
        $('#dept_info_build').val(data[2]);
        $('#dept_info_add').val(data[3]);
      });
    });
</script>