@extends('admin.layout.appadmin')
@section('content')

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            create Admin
          </h1>
                  </section>
                  <!-- Main content -->
        <section class="content">
          <!-- Info boxes -->

          <!-- Main row -->
          <div class="row">
            <!-- Left col -->
            <div class="col-md-12">
              <!-- TABLE: LATEST ORDERS -->
              <div class="box box-info">
                <div class="box-header with-border">
                
                 
                 
                 <div class="row">
                 <form method="post" enctype="multipart/form-data" action = "{{url('/')}}/admin/home/create/admin" >
                    @if($errors->any())
<div class"alert alert-danger">{{$errors->first()}}</div>
@endif
                    {{ csrf_field() }}
                 <div class="productbox">
        <div class=" col-md-6">
            <div class="form-login">
            <label for="text">First Name</label>
            <input type="text" name = "fname" id="product type" class="form-control input-sm chat-input" placeholder="First Name" />
           
		   <label for="text">Last Name</label>
            <input type="text" name = "lname"id="product type" class="form-control input-sm chat-input" placeholder="Last Name" />
            
			<label for="text">Email</label>
            <input type="email" name = "email" id="Price" class="form-control input-sm chat-input" placeholder="Email" />
            </div>
        
        </div>
		<div class=" col-md-6">
            <div class="form-login">
			<label for="text">Password</label>
            <input type="password" name = "password" id=" Name" class="form-control input-sm chat-input" placeholder="Password" />
			
            <label for="text">Confirm Password</label>
            <input type="password" name = "confirm" id=" Name" class="form-control input-sm chat-input" placeholder="Confirm Password" />
       
            
            </div>
        
        </div>
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12"> 
				<div class="tags">
					<h3>Permission:</h3>
					<div class="checkbox">
					<label><input type="checkbox" value="">Seller Management</label>
					</div>
					<div class="checkbox">
						<label><input type="checkbox" value="">Riders Management</label>
					</div>
					<div class="checkbox disabled">
						<label><input type="checkbox" value="" >Admin Management</label>
					</div>
					<div class="checkbox disabled">
						<label><input type="checkbox" value="" >Account App</label>
					</div>
					<div class="checkbox disabled">
						<label><input type="checkbox" value="" >Purchase App</label>
					</div>
					<div class="checkbox disabled">
						<label><input type="checkbox" value="" >Warehouse</label>
					</div>
				</div>
			</div>
		</div>
        
    </div>

    <button type="submit" class="btn sbtn">Submit</button>
    </form>
    </div>
                 
                 
                 
                 
                 
                 
                </div><!-- /.box-header -->
                
                <!-- /.box-footer -->
                <!-- /.box-footer add button next/previus
                
                
                
                
                 -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->

        <!-- Main content -->
      </div><!-- /.content-wrapper -->

     
       
     @endsection