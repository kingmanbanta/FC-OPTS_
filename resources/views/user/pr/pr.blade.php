@extends('user.layout.layout')

@section('content')
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<div class="breadcrumb-holder">
          <div class="container-fluid">
          <ul class="breadcrumb">
            <li class="breadcrumb-item">Home</li>
            <li class="breadcrumb-item "><a href="#">Purchse Request Form</a></li>
          </ul>
        </div>
</div>       
  <div class="col">
    <div class="row">
      <div class="col mb-3">
        <div class="card">
          <div class="card-body">
            <div class="e-profile">
              <div class="row">
                <div class="col-12 col-sm-auto mb-3">
                  <div class="mx-auto" style="width: 140px;">
                    <div class="d-flex justify-content-center align-items-center rounded" style="">
                      <span style="color: rgb(166, 168, 170); font: bold 8pt Arial;"> <img src="{{ asset('img/forbeslogo.png')}}" alt="person" class="img-fluid "> </span>
                    </div>
                  </div>
                </div>
                <div class="col d-flex flex-column flex-sm-row justify-content-between mb-3">
                  <div class="text-center text-sm-left mb-2 mb-sm-0">
                      <br>
                    <h4 class="pt-sm-2 pb-0 mb-0 text-nowrap">Forbes College Inc.</h4>
                    <p class="mb-0">E. Aquende Bldg. III Rizal cor. Elizondo Sts. Legazpi City</p>
                    <div class="text-muted"><small>4500, Philippines</small></div>
                  </div>
                  <div class="text-center text-sm-right">
                  <span class="badge badge-secondary">Purchase Requisiton Form</span>
                  <div class="text-muted"><small>{{ date('Y-m-d H:i:s') }}</small></div>
                  <div class="text-muted"><small>Department</small></div>
                  <!--<br>
                  <div class="mb-2"><b>Type of Request</b></div>
                  <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                        <label class="form-check-label" for="inlineRadio1">Regular</label>
                        </div>
                        <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                        <label class="form-check-label" for="inlineRadio2">emergency</label>
                        </div>
                        </div>-->
                  </div>
                </div>
              </div>
              
                  <form class="form" novalidate="">
                    <div class="col">
                        <div class="mb-2"><b>Type of Request</b></div>
                        
                        <div class="row">
                          <div class="col">
                            <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                            <label class="form-check-label" for="inlineCheckbox1">Goods</label>
                            </div>
                            <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                            <label class="form-check-label" for="inlineCheckbox2">Office Supplies</label>
                            </div>
                            <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="option3" >
                            <label class="form-check-label" for="inlineCheckbox3">Services</label>
                            </div>
                          </div>
                        </div>
                      </div>
                      <br>
                      <table class="table table-bordered center" id="myTable">
                {{ csrf_field() }}
                  <tr>
                    <th>Beginning</th>
                    <th><strong>Ending</strong></th>
                    <th><strong>Request</strong></th>
                    <th><strong>Item Description</strong></th>
                    <th>
                      <button type='button' class="btn btn-success " onclick='x()'>
                        <i class="fa fa-plus"></i>Add Request</button>
                    </th>
                  </tr>
                  <tbody>
                      
                  </tbody>
                  <tfoot>
                    <tr>
                      <td class="request_bottom" colspan="5"><p><strong>*****nothing follows*****</strong></p></td>
                    </tr>
                    <tr>
                      <td class="request_bottom" colspan="5"><p><strong>Last request:</strong></p></td>
                    </tr>
                  </tfoot>

              </table>
              <br>
                    <div class="row">
                      <div class="col d-flex justify-content-end">
                        <button class="btn btn-primary" type="submit">Save Changes</button>
                        </div>
                     </div>
                  </form>
                  </div>
                </div>

    
     
    </div>

  </div>
</div>
</div>

<style type="text/css">
body{
    margin-top:20px;
    background:#f8f8f8
}
</style>


<script type="text/javascript">
            const x = () => {
              var table = document.getElementById("myTable").getElementsByTagName('tbody')[0];
              var row = table.insertRow();

              let cell1 = row.insertCell(0);
              let cell2 = row.insertCell(1);
              let cell3 = row.insertCell(2);
              let cell4 = row.insertCell(3);
              let cell5 = row.insertCell(4);

              cell1.innerHTML = "<p><input class='request_table' type='text'></p>";
              cell2.innerHTML = "<p><input class='request_table' type='text'></p>";
              cell3.innerHTML = "<p><input class='request_table' type='text'></p>";
              cell4.innerHTML = "<p><textarea class='request_description'></textarea></p>";
              cell5.innerHTML = "<button type='button' class='btn btn-danger btn-sm' onclick='y()'><i class='fas fa-minus-square'></i>Delete row</button>";
             }

             const y = () => {
               var td = event.target.parentNode;
               var tr = td.parentNode;
               tr.parentNode.removeChild(tr);
             }
        </script>

       
@endsection