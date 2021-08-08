

<script type="text/javascript">
    $().ready(function(){
      $('.delete_btn').on('click',function(e){
        $tr = $(this).closest('tr');
        
        var data = $tr.children("td").map(function(){
          return $(this).text();
        }).get();

        console.log(data);

        $('#delete_idd').val(data[0]);
        e.preventDefault();
        var id = $("#delete_idd").val();
        //alert(id);
     
          swal({
          title: 'Delete Data?',
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
              var data ={
                "_token":$('input[name=_token]').val(),
                "id":id,
              };
              $.ajax({
                 
              type: "DELETE",
              url: "department/delete/"+id,
              data: data,
              success:function(response){
                console.log(response);
                //$('#userEditModal').modal('hide');
                //alert("data updated");
                swal("Good job!", "Data have been delete!", "success").then(function(){
                location.reload();
                });
              }

            });
            } 
        }) 
   

       
      });
    });
</script>

