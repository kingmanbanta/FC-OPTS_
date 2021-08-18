@extends('user.layout.layout')

@section('content')
<link href="{{ asset('css/form.css') }}" rel="stylesheet">
<div class="breadcrumb-holder" style="font-size: 0.9em">
        <div class="container-fluid">
          <ul class="breadcrumb">
            <li class="breadcrumb-item">Home</li>
            <li class="breadcrumb-item ">Create PR</li>
          </ul>
          @if($message = Session::get('success'))
              <div class="alert alert-success">
                  <p>{{ $message }}</p>
              </div>
          @endif
        </div>
      </div>
        <div class="container" style="width: 100%; height: 100%">
          <div class="forbes-logo-col" style="width:100%; height:auto">
            <section class="mt-5 pl-4">
              <div class="row d-flex">
                <div class="row">
                  <img src="{{ asset('img/forbeslogo.png') }}" 
                  style="width:15%" 
                  class="brand_logo" alt="forbes logo">
                  <div class="forbes-college-col" style="padding-left: 0; margin-left: 0; padding-top:4%">
                    <p><strong>Forbes College Inc.</strong></p>
                    <p>E. Aquende Bldg. III Rizal cor. Elizondo Sts. Legazpi City</p>
                    <p>4500, Philippines</p>
                  </div>
                </div>
              </div>
            </section>

          <form method="POST" action="" >
            <section class="mt-0 p-4">
              <div class="row">
                <div class="col-4 justify-content-center mt-2" style="text-align:center; border:solid;">
                  <span><strong><p style="padding-top: 5%">PURCHASING REQUISITION FORM</p></strong></span>
                </div>
                <div class="col-4"></div>
                <div class="col-4 mt-2">
                  <div class="button">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="radio" id="branch1" name="branch" value="b1"/>
                    <label for="branch1"></label>
                    <span><strong><p>FORBES COLLEGE, Inc.</p></strong></span><br>
                    <input type="radio" id="branch2" name="branch" value="b2"/>
                    <label for="branch2"></label>
                    <span><strong><p>FORBES ACADEMY, Inc.</p></strong></span>
                  </div>
                </div>
              </div>
            </section>
  
            <section class="p-2">
              <table class="table table-bordered table-sm">
                <tbody>
                  <tr>
                    <td colspan="2"><p><strong>Checkbox:</strong></p>

                      <div class="radio-toolbar">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="radio" id="radio1" name="radios" value="all" checked >
                        <label for="radio1"></label>
                        <span><p>Goods/Supplies</p></span>
                      
                        <input type="radio" id="radio2" name="radios" value="false">
                        <label for="radio2"></label>
                        <span><p>Services</p></span>
                      
                        <input type="radio" id="radio3" name="radios" value="true">
                        <label for="radio3"></label>
                        <span><p>Others</p></span>
                      </div>
                    </td>
                    <td><small>PR NO.</small>
                      <p>00001</p>
                    </td>
                  </tr>
                  <tr>
                    <th colspan="2"><p><strong>Requesting Department:</strong></p>
                      <p><input class="table1" type="text"></p>
                    </th>
                    <td><small>Date</small><br>
                      <?php
                        echo
                        date("d/m/Y");
                      ?>
                    </td>
                  </tr>
                  <tr>
                    <th colspan="4"><p><strong>Purpose of Request:</strong></p>
                      <p><input class="table1" type="text"></p>
                    </th>
                  </tr>
                </tbody>
              </table>
              <table class="table table-bordered table-sm" id="myTable">
                {{ csrf_field() }}
                  <tr>
                    <th class="table2" style="width: 15%"><p><strong>Beginning:</strong></p></th>
                    <th class="table2" style="width: 15%"><p><strong>Ending:</strong></p></th>
                    <th class="table2" style="width: 15%"><p><strong>Request:</strong></p></th>
                    <th class="table2" class="request_description"><p><strong>Item Description</strong></p></th>
                    <th class="action_buttons" style="width:10%">
                      <button type='button' class="btn btn-success btn-block btn-sm" onclick='x()'>
                        <i class="fas fa-plus-square"></i><p>Add row</p></button>
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
               
            </section>
          </form>
          </div>
          <div class="request-button mt-2">
            <button type="submit" class="btn btn-success btn-block">Submit Request</button>
          </div>
        </div>

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
              cell5.innerHTML = "<button type='button' class='btn btn-danger ' onclick='y()'><i class=' fa-trash'></i>Delete row</button>";
             }

             const y = () => {
               var td = event.target.parentNode;
               var tr = td.parentNode;
               tr.parentNode.removeChild(tr);
             }
        </script>
{{-- 
        <script type="text/javascript">
          $.ajax({  
            url:"/prform/chooseBranch",  
            method:"POST",  
            data:{
            '_token': $('input[name=_token]').val(),
            'chooseBranch':schools
            },  
            success:function(data){  

            }  
          });  
        </script>

        <script>
          $(function () {
              $('.radiobtn').change(function () {
                  id = $(this).attr('data');
                  status = $(this).prop('checked');
                  $.get("{{route('prform')}}", {id: id, status: status}, function (data, status) {
                  });
              })
          })
        </script> --}}
@endsection
