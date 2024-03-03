@extends('admin.layout.appadmin')
@section('content')

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            create_Riders
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
                    <form method="post" action = "{{url('/')}}/admin/home/create/rider" class="login-form" enctype="multipart/form-data">
                        {{ csrf_field() }}
                 <div class="productbox">
        <div class=" col-md-6">
            <div class="form-login">
            <label for="text">First Name*</label>
            <input type="text" id="product type" name="fname" class="form-control input-sm chat-input" placeholder="First Name" />
           
		   <label for="text">Last Name*</label>
            <input type="text" id="product type" name="lname" class="form-control input-sm chat-input" placeholder="Last Name" />
            
			<label for="text">Password*</label>
            <input type="password" id=" Name" name="password" class="form-control input-sm chat-input" placeholder="Password" />
			
			<label for="text">Confirm Password*</label>
            <input type="password" id=" Name" name="confirm" class="form-control input-sm chat-input" placeholder="Confirm Password" />
			
            </div>
        
        </div>
		<div class=" col-md-6">
            <div class="form-login">
			<label for="text">Email*</label>
            <input type="email" id="Price" name="email"class="form-control input-sm chat-input" placeholder="Email" />
			
			<label for="text">Phone No*</label>
            <input type="text" id="product type" name="phone" class="form-control input-sm chat-input" placeholder="Phone No" />
			
            <label for="text">Address*</label>
            <input type="text" id="product type" name="address" class="form-control input-sm chat-input" placeholder="Address" />
           <button type="submit" class="btn sbtn">Submit</button>
            </div>
        </div>
    </div>
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