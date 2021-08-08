@extends('admin.layout')

@section('content')
        <div class="">
              <div class="col-lg-12">
                <ul class="breadcrumb">
                  <li class="breadcrumb-item "><a href="#">Manage Departments</a></li>
                </ul>
              </div>
        </div>     
      <div class="col-lg-12">
              <div class="card">
                <div class="card-header">
                  <a href=""  data-toggle="modal" data-target="#addDepartment" class="btn btn-primary" >
                  <i class="fa fa-plus">Departments</i>
                  </a>
                </div>
             <div class="row" >
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-striped table-hover">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Department Name</th>
                          <th>Building</th>
                          <th>Address</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          @foreach($department as $departments)
                          <input type="hidden" id="delete_idd" name="delete_idd" />
                          <td class="dept_id">{{$departments->id}}</td>
                          <td class="dept_name">{{$departments->Dept_name}}</td>
                          <td class="build_name">{{$departments->building->Building_name}}</td>
                          <td class="build_add">{{$departments->building->Address}}</td>
                         
                          <td>  
                                <a href="#" class="btn btn-secondary btn-sm info_btn"><i class="fa fa-info"></i></a>
                                <a href="#" class="btn btn-primary btn-sm edit_btn"><i class="fa fa-edit"></i></a>
                                <a href="#" class="btn btn-danger btn-sm delete_btn"><i class="fa fa-trash"></i></a>
                          </td>
                        </tr>
                       @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
          </div>
        </div>
        <div class="">
              <div class="col-lg-9">
                <ul class="breadcrumb">
                  <li class="breadcrumb-item "><a href="#">Manage Buildings</a></li>
                </ul>
              </div>
        </div>
        <div class="col-lg-9">
              <div class="card">
                <div class="card-header">
                  <a href=""  data-toggle="modal" data-target="#addBuilding" class="btn btn-primary" >
                  <i class="fa fa-plus">Building</i>
                  </a>
                </div>
             <div class="row" >
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-striped table-hover">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Building</th>
                          <th>Address</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          @foreach($building as $buildings)
                          <input type="hidden" id="delete_build_id" name="delete_build_id" />
                          <td class="dept_id">{{$buildings->id}}</td>
                          <td class="build_name">{{$buildings->Building_name}}</td>
                          <td class="build_add">{{$buildings->Address}}</td>
                         
                          <td>  
                                <a href="#" class="btn btn-secondary btn-sm build_info_btn"><i class="fa fa-info"></i></a>
                                <a href="#" class="btn btn-primary btn-sm build_edit_btn"><i class="fa fa-edit"></i></a>
                                <a href="#" class="btn btn-danger btn-sm build_delete_btn"><i class="fa fa-trash"></i></a>
                          </td>
                        </tr>
                       @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
          </div>
        </div>
                  

@include('admin.building_department.add_department')
@include('admin.building_department.add_building')
@include('admin.building_department.edit_department')
@include('admin.building_department.delete_department')             
@include('admin.building_department.edit_building')
@include('admin.building_department.delete_building')
@include('admin.building_department.info_department')
@include('admin.building_department.info_building')
@endsection



