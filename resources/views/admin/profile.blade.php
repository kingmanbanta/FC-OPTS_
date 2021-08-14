@extends('admin.layout')

@section('content')

<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">

  <!--<div class="col-12 col-lg-auto mb-3" style="width: 200px;">
    <div class="card p-3">
      <div class="e-navlist e-navlist--active-bg">
        <ul class="nav">
          <li class="nav-item"><a class="nav-link px-2 active" href="#"><i class="fa fa-fw fa-bar-chart mr-1"></i><span>Overview</span></a></li>
          <li class="nav-item"><a class="nav-link px-2" href="https://www.bootdey.com/snippets/view/bs4-crud-users" target="__blank"><i class="fa fa-fw fa-th mr-1"></i><span>CRUD</span></a></li>
          <li class="nav-item"><a class="nav-link px-2" href="https://www.bootdey.com/snippets/view/bs4-edit-profile-page" target="__blank"><i class="fa fa-fw fa-cog mr-1"></i><span>Settings</span></a></li>
        </ul>
      </div>
    </div>
  </div>-->
  <div class="breadcrumb-holder">
        <div class="container-fluid">
          <ul class="breadcrumb">
            <li class="breadcrumb-item">Home</li>
            <li class="breadcrumb-item"><a href="#">Users Profile</a></li>
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
                    <div class="d-flex justify-content-center align-items-center rounded" style="height: 140px; background-color: ">
                  
                    <span style="color: rgb(166, 168, 170); font: bold 8pt Arial;"> <img src="{{ Auth::user()->picture }}" alt="person" class="img-fluid rounded-circle profile_pic">  </span>
                     
                    </div>
                  </div>
                </div>
                <div class="col d-flex flex-column flex-sm-row justify-content-between mb-3">
                  <div class="text-center text-sm-left mb-2 mb-sm-0">
                    <h4 class="pt-sm-2 pb-1 mb-0 text-nowrap">{{ Auth::user()->name }}</h4>
                    <p class="mb-0">{{ Auth::user()->email }}</p>
                    <div class="text-muted"><small>Last seen 2 hours ago</small></div>
                    <div class="mt-2">
                      <input type="file" name="profile_pic" id="profile_pic" style="opacity: 0;height:1px;display:none">
                      <a href="#" class="btn btn-primary" id="change_pro_pic">
                        <i class="fa fa-fw fa-camera"></i>
                        <span>Change Photo</span>
                      </a>
                    </div>
                  </div>
                  <div class="text-center text-sm-right">
                    <span class="badge badge-secondary"></span>
                    <div class="text-muted"><small>{{Auth::user()->id}}</small></div>
                    <div class="text-muted"><small>{{$user->id}}</small></div>
                    <div class="text-muted"><small>{{$user->display_name}}</small></div>
                    <a class="updatebtn" href="#"><i class="fa fa-pencil-square-o"></i></a>
                  </div>
                </div>
              </div>
              <ul class="nav nav-tabs">
              <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab"><i class="fa fa-user">Profile</i></a>
              </li>
              <li class="nav-item">
                <a class="nav-link updatebtn" data-toggle="tab" href="#tabs-2" role=""><i class="fa fa-pencil-square-o">Change Profile</i></a>
              </li>
              <li class="nav-item">
                <a class="nav-link updatepasswordbtn" data-toggle="tab" href="#tabs-3" role="tab"><i class="fa fa-key">Change Password</i></a>
              </li>  
              </ul>
              
              <div class="tab-content pt-3">
                <div class="tab-pane active" id="tabs-1" role="tabpanel">
                  <form class="form" novalidate="">
                    <div class="row">
                      <div class="col">
                        <div class="row">
                          <div class="col-6">
                            <div class="form-group">
                              <label>Name</label>
                              <input class="form-control" type="text" name="upname" id="upname" value="{{Auth::user()->name}}"  readonly>
                            </div>
                          </div>
                          <div class="col-6">
                            <div class="form-group">
                              <label>Middle Name</label>
                              @if(empty($userr->mname))
                              <input class="form-control" type="text" name="up_mname" id="up_mname" placeholder="" readonly>
                              @else
                              <input class="form-control" type="text" name="up_mname" id="up_mname" placeholder="{{$userr->mname}}" readonly>
                              @endif
                            </div>
                          </div>
                          </div>
                          <div class="row">
                          <div class="col-6">
                            <div class="form-group">
                              <label>Last Name</label>
                              @if(empty($userr->lname))
                              <input class="form-control" type="text" name="up_lname" id="up_lname" placeholder="" readonly>
                              @else
                              <input class="form-control" type="text" name="up_lname" id="up_lname" placeholder="{{$userr->lname}}" readonly>
                              @endif                            
                            </div>
                          </div>
                          <div class="col-6">
                            <div class="form-group">
                              <label>sex</label>
                              @if(empty($userr->sex))
                              <input class="form-control" type="text" name="up_sex" id="up_sex" placeholder="" readonly>
                              @else
                              <input class="form-control" type="text" name="up_sex" id="up_sex" placeholder="{{$userr->sex}}" readonly>
                              @endif
                            </div>
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-6">
                            <div class="form-group">
                              <label>Role</label>
                              <input class="form-control" type="text" name="up_role" id="up_role" placeholder="{{$user->display_name}}" readonly>
                            </div>
                          </div>
                          <div class="col-6">
                            <div class="form-group">
                              <label>Contact No.</label>
                              @if(empty($userr->Contact_no))
                              <input class="form-control" type="text" name="up_contact" id="up_contact" placeholder="" readonly>
                              @else
                              <input class="form-control" type="text" name="up_contact" id="up_contact" placeholder="{{$userr->Contact_no}}" readonly>
                              @endif
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col">
                            <div class="form-group">
                              <label>Department</label>
                              @if(empty($userr->Dept_name))
                              <input class="form-control" type="text" name="up_build_id" id="up_build_id" placeholder="" readonly>
                              @else
                              <input class="form-control" type="text" name="up_build_id" id="up_build_id" placeholder="{{$userr->Dept_name}}" readonly>
                              @endif
                            </div>
                          </div>
                          </div>
                      <div class="row">
                        <div class="col">
                            <div class="form-group">
                              <label>Address</label>
                              @if(empty($userr->Address))
                              <input class="form-control" type="text" name="up_address" id="up_address" placeholder="" readonly>
                              @else
                              <input class="form-control" type="text" name="up_address" id="up_address" placeholder="{{$userr->Address}}" readonly>
                              @endif
                            </div>
                          </div>
                          <div class="col">
                            <div class="form-group">
                              <label>Email</label>
                              <input class="form-control" type="email" name="up_email" id="up_email" placeholder="{{Auth::user()->email}}" readonly>
                            </div>
                          </div>
                        </div>
                    
                    
                  </form>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!--<div class="col-12 col-md-3 mb-3">
        <div class="card mb-3">
          <div class="card-body">
            <div class="px-xl-3">
              <button class="btn btn-block btn-secondary">
                <i class="fa fa-sign-out"></i>
                <span>Logout</span>
              </button>
            </div>
          </div>
        </div>
        <div class="card">
          <div class="card-body">
            <h6 class="card-title font-weight-bold">Support</h6>
            <p class="card-text">Get fast, free help from our friendly assistants.</p>
            <button type="button" class="btn btn-primary">Contact Us</button>
          </div>
        </div>
      </div>-->
    </div>
  </div>


<style type="text/css">
body{
    margin-top:20px;
    background:#f8f8f8
}
</style>

<script type="text/javascript">
    $(document).on('click','#change_pro_pic', function(){
      $('#profile_pic').click();
    });

    $('#profile_pic').ijaboCropTool({
          preview : '.profile_pic',
          setRatio:1,
          allowedExtensions: ['jpg', 'jpeg','png'],
          buttonsText:['CROP','QUIT'],
          buttonsColor:['#30bf7d','#ee5155', -15],
          @if (Auth::user()->hasRole('Processor'))
          processUrl:'{{ route("pchangeProfilePic") }}',  
          @endif
          @if (Auth::user()->hasRole('Requestor'))
          processUrl:'{{ route("rchangeProfilePic") }}',  
          @endif
          @if (Auth::user()->hasRole('Approver'))
          processUrl:'{{ route("achangeProfilePic") }}',  
          @endif
          @if (Auth::user()->hasRole('Validator'))
          processUrl:'{{ route("vchangeProfilePic") }}',  
          @endif
          
          withCSRF:['_token','{{ csrf_token() }}'],
          onSuccess:function(message, element, status){
             alert(message);
          },
          onError:function(message, element, status){
            alert(message);
          }
        });

</script>


@include('user.layout.update') 
@include('user.layout.update_password')

@endsection