@extends('user.layout.layout')

@section('content')
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link href="{{ asset('css/supplieritems.css') }}" rel="stylesheet">
<br>
<div class="col">
<div class="card h-100">

	<div class="card-body">
    <form id="supplieritemForm">
    {{csrf_field()}}
		<div class="row gutters">
        <div class="col-sm-8"><h2>Supplier <b>Details</b></h2></div>
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
			</div>
            
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<label for="fullName">Business Name</label>
					<input type="text" class="form-control" id="business_name" name="business_name" placeholder="Enter Business Name">
				</div>
			</div>
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<label for="eMail">Contact Person</label>
					<input type="text" class="form-control" id="contact_person" name="contact_person" placeholder="Contact Person">
				</div>
			</div>
			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
				<div class="form-group">
					<label for="phone">Phone</label>
					<input type="text" class="form-control" id="phone" name="phone" placeholder="Enter phone number">
				</div>
			</div>
			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
				<div class="form-group">
					<label for="website">Email</label>
					<input type="email" class="form-control" id="email" name="email" placeholder="Email">
				</div>
			</div>
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
				<div class="form-group">
					<label for="website">Business Address</label>
					<input type="text" class="form-control" id="business_address" name="business_address" placeholder="Business Address">
				</div>
			</div>
		</div>
		<div class="row gutters">
			
			<div class="container-lg">
            
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8"><h2>Item <b>Details</b></h2></div>
                    <div class="col-sm-4">
                        <button type="button" class="btn btn-primary add-new"><i class="fa fa-plus"></i> Add New</button>
                    </div>
                </div>
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Item Desc</th>
                        <th>Brand</th>
                        <th>Unit</th>
                        <th>Price</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                        
                </tbody>
            </table>
        </div>
    </div>
    </div>
	
        <br>
		<div class="row gutters">
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
				<div class="text-right">
                <button type="submit" class="btn btn-primary">Save changes</button>
				</div>
			</div>
		</div>
        </form>
	</div>
    </div>
</div>

<script>
$(document).ready(function(){
	$('[data-toggle="tooltip"]').tooltip();
	var actions = $("table td:last-child").html();
	// Append table with add row form on add new button click
    $(".add-new").click(function(){
		$(this).attr("disabled", "disabled");
		var index = $("table tbody tr:last-child").index();
        var row = '<tr>' +
            '<input type="hidden" class="form-control" name="item_no[]" id="item_no">' +
            '<td><input type="text" class="form-control" name="item_desc[]" id="item_desc"></td>' +
            '<td><input type="text" class="form-control" name="brand[]" id="brand"></td>' +
            '<td><input type="text" class="form-control" name="unit[]" id="unit"></td>' +
            '<td><input type="text" class="form-control" name="price[]" id="price"></td>' +
			'<td>' +
            '<a class="add" title="Add" data-toggle="tooltip"><i class="material-icons">&#xE03B;</i></a>'+
            '<a class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>'+
            '<a class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a> '+
            '</td>' +
        '</tr>';
    	$("table").append(row);		
		$("table tbody tr").eq(index + 1).find(".add, .edit").toggle();
        $('[data-toggle="tooltip"]').tooltip();
    });
	// Add row on add button click
	$(document).on("click", ".add", function(){
		var empty = false;
		var input = $(this).parents("tr").find('input[type="text"]');
        input.each(function(){
			if(!$(this).val()){
				$(this).addClass("error");
				empty = true;
			} else{
                $(this).removeClass("error");
            }
		});
		$(this).parents("tr").find(".error").first().focus();
		if(!empty){
			input.each(function(){
				$(this).parent("td").html($(this).val());
			});			
			$(this).parents("tr").find(".add, .edit").toggle();
			$(".add-new").removeAttr("disabled");
		}		
    });
	// Edit row on edit button click
	$(document).on("click", ".edit", function(){		
        $(this).parents("tr").find("td:not(:last-child)").each(function(){
			$(this).html('<input type="text" class="form-control" value="' + $(this).text() + '">');
		});		
		$(this).parents("tr").find(".add, .edit").toggle();
		$(".add-new").attr("disabled", "disabled");
    });
	// Delete row on delete button click
	$(document).on("click", ".delete", function(){
        $(this).parents("tr").remove();
		$(".add-new").removeAttr("disabled");
    });
    
});
</script>
<script type="text/javascript">
$().ready(function(){
    //var formdata = $('#supplieritemForm').serializeArray();
    //var dataa = JSON.stringify(formdata);
    //console.log(dataa);
    $('#supplieritemForm').on('submit',function(e){
        e.preventDefault();
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
          /*$.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
            });*/
          $.ajax({
          type: "POST",
          url: "supplieritems/save",
          data: $('#supplieritemForm').serialize(),
          //data:{data : dataa},
          dataType:"json",
          success:function(response){
            console.log(JSON.stringify(response));
            //$('#userEditModal').modal('hide');
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
@endsection