@extends('admin.layout')

@section('content')
<div class="">
          <div class="col-lg-12">
          <ul class="breadcrumb">
            <li class="breadcrumb-item">Home</li>
            <li class="breadcrumb-item "><a href="#">Manage Users</a></li>
          </ul>
        </div>
</div>       
      <div class="col-lg-12 text-right">
              <div class="card">
                <div class="card-header">
                  <h4></h4>
                  <a href=""  data-toggle="modal" data-target="#myModal" class="btn btn-primary" >
                  <i class="fa fa-user-plus">Create User</i>
                  </a>
                </div>
              
        
        <div class="row" >
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-striped table-hover">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Name</th>
                          <th>Email</th>
                          <th>Role</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          @foreach($users as $users)
                          <input type="hidden" id="delete_id" name="delete_id" />
                          <td class="class_id">{{$users->id}}</td>
                          <td class="class_name">{{$users->name}}</td>
                          <td class="class_email">{{$users->email}}</td>  
                          <td style = "display:none" class="class_password">{{$users->password}}</td>                           
                          @foreach($users->roles as $role)
                          <td class="class_role">{{$role->display_name}}</td>
                          @endforeach
                          <td>  
                                <a href="#" class="btn btn-secondary btn-sm viewbtn"><i class="fa fa-info"></i></a>
                                <a href="#" class="btn btn-primary btn-sm editbtn"><i class="fa fa-edit"></i></a>
                                <a href="#" class="btn btn-danger btn-sm deletebtn"><i class="fa fa-trash"></i></a>
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
             
          


@include('admin.manage.create')
@include('admin.manage.edit')  
@include('admin.manage.view')
@include('admin.manage.delete')

@endsection



