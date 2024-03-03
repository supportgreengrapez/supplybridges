@extends('client.layout.appclient')
@section('content')

	<!-- /BREADCRUMB --> 

<!-- section -->
<div class="section"> 
		<!-- container -->
		<div class="container">
			<div class="row main">
				<div class="main-login main-center">
				<h2 style="text-align:center;">Login</h2>
				<div class="main-login main-center">
                <form method="post" action = "{{url('/')}}/login" class="login100-form validate-form p-l-55 p-r-55 p-t-178">
					{{ csrf_field() }}
					
					@if($errors->any())

<div class="alert alert-danger">
  <strong>Danger!</strong> {{$errors->first()}}
</div>
@endif
						<div class="form-group">
							<label for="username" class="cols-sm-2 control-label">Username</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
									<input type="email" class="form-control" name="username" id="username"  placeholder="Username"/>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="password" class="cols-sm-2 control-label">Password</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
									<input type="password" class="form-control" name="password" id="password"  placeholder="Password"/>
								</div>
							</div>
						</div>

						<div class="form-group ">
                                <button target="_blank" name="submit" type="submit" class="btn btn-primary btn-lg btn-block login-button">Log In</button>
							</div>
                        <div class="forget">
                        	                        <a href="{{URL('/')}}/password/reset" class="forgot-password">
                Forgot Password?
            </a>
                        </div>
                          <div class="forget">
                        	                        <a href="{{URL('/')}}/signup" class="forgot-password">
                Create Account
            </a>
                        </div>
              
					</form>
					</div>
				</div>
			</div>
		</div>	
   </div>     
 @endsection