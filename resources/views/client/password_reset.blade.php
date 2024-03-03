
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
					<form method="post" action = "{{url('/')}}/password/reset" class="login100-form validate-form p-l-55 p-r-55 p-t-178">
					{{ csrf_field() }}
					
					@if($errors->any())
<div class"alert alert-danger">{{$errors->first()}}</div>
@endif
@if(session()->has('message'))
<div class="alert alert-success">
    {{ session()->get('message') }}
</div>
@endif
                    
                    <div class="form-group">
							<label for="name" class="cols-sm-2 control-label">Email</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
									<input type="email" class="form-control" name="username"  placeholder="Email" required/>
								</div>
							</div>
                        </div>
                        
                        <div class="form-group ">

                           <button class="btn btn-primary btn-lg btn-block login-button">Reset</button>
						</div>
				</form>
					
				</div>
			</div>
		</div>
		</div>
@endsection