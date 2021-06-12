
<!-- Modal-->

<div  id="userEditModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
  <div role="document" class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 id="exampleModalLabel" class="modal-title">Edit Account</h5>
          <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
      </div>
      <div class="modal-body">
      <form id="userform">
     {{csrf_field()}}
        <input type="hidden" id="uid" name="id" />
       
          <div class="form-group">
            <label>Name</label>
              <input type="text" name="name" id="uname" class="form-control">
          </div>
            <div class="form-group">
              <label >Email</label>
                <input type="email" name="email" id="uemail" class="form-control">
            </div>
                
                        <div class="modal-footer">
                          <button type="button" data-dismiss="modal" class="btn btn-secondary">Close</button>
                          <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
        </div>
        </form>                  
    </div>
  </div>
</div>
<script type="text/javascript">
   $('.editbtn').on('click',function(){
    $('#userEditModal').modal('show');
     let $row = $(this).closest("tr");
     let $text = $row.find(".class_id").text();

     console.log($text);
     document.querySelector('#uid').value = $text;
     document.querySelector('#uname').value = $text;
     document.querySelector('#uemail').value = $text;
     
   });

</script>



<!--<script type="text/javascript">
    $().ready(function(){
      $('.editbtn').on('click',function(){
        $('#userEditModal').modal('show');

        $tr = $(this).closest('tr');
        
        var data = $tr.children("td").map(function(){
          return $(this).text();
        }).get();

        console.log(data);

        $('#id').val(data[0]);
        $('#name').val(data[1]);
        $('#email').val(data[2]);

      });
    });
  </script>-->
  
  <!--<script type="text/javascript">      
        $(document).ready(function(){
      $('.editbtn').on('click',function(event){
        $('#userViewModal').modal('show');
        var id = $(this).data('id');
        $.ajax({
          url: "/manageAccount/"+id ,
          type: 'GET',
          dataType: 'json',
        }).done(function(data){
          $("#id").val("data.id");
          $("#name").val("data.name");
          $("#email").val("data.email");
        });

        
      });
    });
  </script>-->


   



                                      
             
                                      
                                      












