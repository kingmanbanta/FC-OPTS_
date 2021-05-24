@extends('layouts.app')

@section('content')
<link href="{{ asset('css/style.css') }}" rel="stylesheet">
<div class="container" >

	<div class="d-flex justify-content-center h-100" >
		<div class="user_card">
				<div class="d-flex justify-content-center">
					<div class="brand_logo_container">
						<img src="{{ asset('img/forbeslogo.png') }}" class="brand_logo" alt="Logo">
					</div>
				</div>

			<div class="d-flex justify-content-center form_container">

				<form method="POST" action="{{ route('login') }}">
					@csrf
					<!--inputemail------------------------------------------------------------------------------------------------->
						
						<div class="input-group mb-3">
						
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-user"></i></span>
							</div>
							<!--<input type="text" name="" class="form-control input_user" value="" placeholder="username or email">-->
							<input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
							 name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="email" autofocus>
							 @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
						</div>
					<!------------------------------------------------------------------->

					<!--inputpass------------------------------------------------------------------------------------------------->

						<div class="input-group mb-2">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-key"></i></span>
							</div>
							<!--<input type="password" name="" class="form-control input_pass" value="" placeholder="password">-->
							<input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
							 name="password" required autocomplete="current-password" placeholder="password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
						</div>
					<!------------------------------------------------------------------->


						<div class="form-group">
								<div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
						</div>

					<!--Submit------------------------------------------------------------------------------------------------->	

						<div class="d-flex justify-content-center mt-3 login_container">
						<!--<button type="button" name="button" class="btn login_btn">Login</button>-->
							<button type="submit" class="btn login_btn">
                                    {{ __('Login') }}
                            </button>
						</div>
						<div class="mt-4">
								<div class="d-flex justify-content-center links">
								<!--Don't have an account? <a href="https://webdevtrick.com" class="ml-2">Sign Up</a>-->
								@if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                      		    @endif
								  </div>
						</div>
									<!--<div class="d-flex justify-content-center links">
									<a href="#">Forgot your password?</a>
									</div>-->
				
									
				</form>
					
					
			</div>
		</div>
	</div>
</div>
@endsection
