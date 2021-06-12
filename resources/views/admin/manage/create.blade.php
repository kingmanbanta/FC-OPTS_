
<!-- Modal-->

<div id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
  <div role="document" class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 id="exampleModalLabel" class="modal-title">Create Account</h5>
          <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
      </div>
      <form method="POST" action="{{ route('createSave') }}" >
        {{csrf_field()}}
        <div class="modal-body">
          <div class="form-group">
            <label>Name</label>
              <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}"placeholder="name" required autocomplete="name" autofocus>
              @error('name')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
          </div>
          
            <div class="form-group">
            <label>Email</label>
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"placeholder="email" required autocomplete="email">
              @error('email')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>

                <div class="form-group">
                  <label for="" class="">{{ __('Password') }}</label>     
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                      @error('password')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                      </div>
                      <div class="form-group">
                  <label for="" class="">{{ __('confirm-Password') }}</label>     
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                      </div>

                        <label for="role_id">Roles:</label>                                                            
                          <div class="mt-4">
                            <select name="role_id" class="form-control">
                              @foreach($roles as $role)
                                <option value="{{$role->id}}">{{$role->display_name}}</option>
                              @endforeach
                            </select>
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
                                            
                                        