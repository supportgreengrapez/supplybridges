

@extends('client.layout.appclient')
@section('content')
   
	<!-- /BREADCRUMB --> 

<!-- section -->
<div class="section"> 
		<!-- container -->
		<div class="container">
			<div class="row main">
				<div class="main-login main-center">

					<h2 style="text-align:center;">Reset Password</h2>
					<form method="post" action = "{{url('/')}}/password/change/{{$username}}" class="login100-form validate-form p-l-55 p-r-55 p-t-178">
					{{ csrf_field() }}
					
					@if($errors->any())
<div class"alert alert-danger">{{$errors->first()}}</div>
@endif
@if(session()->has('message'))
<div class="alert alert-success">
    {{ session()->get('message') }}
</div>
@endif
					<!--<div class="wrap-input100 validate-input m-b-16" data-validate="Please enter username">-->
					<!--	<input class="input100" type="text" name="password" placeholder="Enter Your New Password">-->
					<!--	<span class="focus-input100"></span>-->
     <!--               </div>-->
                    
                    <div class="form-group">
							<label for="name" class="cols-sm-2 control-label">Password <span style="color:red;">(8 digit password):</span></label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
									<input type="password" class="form-control" name="password" pattern=".{8,}" maxlength="36"  placeholder="Password" required/>
								</div>
							</div>
                        </div>
                    <!--<div class="container-login100-form-btn">-->
                    <!--        <button class="login100-form-btn">-->
                    <!--            Reset-->
                    <!--        </button>-->
                    <!--    </div>-->
                        <div class="form-group ">

                           <button class="btn btn-primary btn-lg btn-block login-button">Reset</button>
						</div>
				</form>
				</div>
			</div>
		</div>
		</div>
@endsection