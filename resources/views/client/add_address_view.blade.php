
@extends('client.layout.appclient')
@section('content')
<style>
    
    .hides {
  display: none;
}
</style>
<div id="breadcrumb">
    <div class="container-fluid">
      <ul class="breadcrumb">
        <li><a href="{{url('/')}}/">Home</a></li>
        <li style="color:#F09819;">Add Address</li>
      </ul>
    </div>
    </div>
    <div class="section"> 
        <!-- container -->
        <div class="container"> 
          <!-- row -->
          <div class="content-wrapper" style="margin-bottom:20px;">
              <!-- Content Header (Page header) -->
              <section class="content-header">
                <h3 tyle=" margin-bottom:0px;">
                Add Address
                </h3>
                        </section>
    <tbody class="nDividerBlockOuter">
              <tr>
        <td class="nDividerBlockInner" style="padding: 18px;"><table class="nDividerContent" border="0" cellpadding="0" cellspacing="0" width="100%" style="border-top-width: 2px;border-top-style: solid;border-top-color: #3b3383;">
            <tbody>
              <tr>
                <td><span></span></td>
              </tr>
            </tbody>
          </table></td>
      </tr>
            </tbody>
    
    <!-- Main content --> 
    <!-- /.content --> 
  </div>
          <!-- /row -->
                <form method="post" action = "{{url('/')}}/cart/checkout/add/new/address" id="payment-form">
					{{ csrf_field() }}
    
              <div class="row">
                  
                  			@if($errors->any())
                  <div class="alert alert-danger">
  <strong>Danger!</strong> {{$errors->first()}}
</div>
@endif

                  <div class="col-lg-6">
						<div class="form-group">
							<label for="name" class="cols-sm-2 control-label">First Name</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="fname" id="name" value = "{{Session::get('fname')}}"  placeholder="First Name"   maxlength="20"  required/>
								</div>
							</div>
                        </div>
                        </div>
                        <div class="col-lg-6">
                        <div class="form-group">
                                <label for="name" class="cols-sm-2 control-label">Last Name</label>
                                <div class="cols-sm-10">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                                        <input type="text" class="form-control" name="lname" value = "{{Session::get('lname')}}"  placeholder="Last Name"   maxlength="20"  required/>
                                    </div>
                                </div>
                            </div>
                        
                        </div>
                        <div class="col-lg-6">
						
				
</div>
<div class="col-lg-6">
             
                  <div class="form-group">
							<label for="email" class="cols-sm-2 control-label">Cellphone <span style="color:red;">(format: xxxx-xxx-xxxx):</span></label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-phone" aria-hidden="true"></i></span>
									<input type="tel" class="form-control" name ="phone" placeholder="Cellphone"  pattern="^\d{4}-\d{3}-\d{4}$"  required/>
								</div>
							</div>
						</div>
          </div>
          

          					<div class="col-lg-12"> 
<div class="content-wrapper" style="margin-bottom:20px;margin-top:20px;">
              <!-- Content Header (Page header) -->
              <section class="content-header">
                <h3 style="margin:0px;">
                Address
                </h3>
                        </section>
    <tbody class="nDividerBlockOuter">
              <tr>
        <td class="nDividerBlockInner" style="padding: 18px;"><table class="nDividerContent" border="0" cellpadding="0" cellspacing="0" width="100%" style="border-top-width: 2px;border-top-style: solid;border-top-color: #3b3383;">
            <tbody>
              <tr>
                <td><span></span></td>
              </tr>
            </tbody>
          </table></td>
      </tr>
            </tbody>
    
    <!-- Main content --> 
    <!-- /.content --> 
  </div>
</div>	
						<div class="col-lg-4">
						<div class="form-group">
                                <label for="name" class="cols-sm-2 control-label">Building No</label>
                                <div class="cols-sm-10">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-building fa" aria-hidden="true"></i></span>
                                        <input type="text" name ="building_no" class="form-control" placeholder="Building No" required/>
                                    </div>
                                </div>
                            </div>
                            </div>
						<div class="col-lg-4">
                            <div class="form-group">
                                <label for="name" class="cols-sm-2 control-label">Building Name</label>
                                <div class="cols-sm-10">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-building fa" aria-hidden="true"></i></span>
                                        <input type="text" class="form-control" name ="building_name"   placeholder="Building Name"/>
                                    </div>
                                </div>
                            </div>
						</div>
						<div class="col-lg-4">
                            <div class="form-group">
                                <label for="name" class="cols-sm-2 control-label">Floor / Suite</label>
                                <div class="cols-sm-10">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-building fa" aria-hidden="true"></i></span>
                                        <input type="text" class="form-control"name ="floor"  placeholder="Floor / Suite" />
                                    </div>
                                </div>
                            </div>
						</div>
						<div class="col-lg-3">
						<div class="form-group">
                                <label for="name" class="cols-sm-2 control-label">Street</label>
                                <div class="cols-sm-10">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-building fa" aria-hidden="true"></i></span>
                                        <input type="text" class="form-control" name="street"  placeholder="Street" required/>
                                    </div>
                                </div>
                            </div>
                            </div>
						
						<div class="col-lg-3">
						<div class="form-group">
                                <label for="name" class="cols-sm-2 control-label">Block</label>
                                <div class="cols-sm-10">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-building fa" aria-hidden="true"></i></span>
                                        <input type="text" name ="block"  class="form-control"placeholder="Block"/>
                                    </div>
                                </div>
                            </div>
						</div>
						<div class="col-lg-3">
						<div class="form-group">
                                <label for="name" class="cols-sm-2 control-label">Sector / Phase</label>
                                <div class="cols-sm-10">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-building fa" aria-hidden="true"></i></span>
                                        <input type="text" class="form-control" name ="phase" placeholder="Sector / Phase"/>
                                    </div>
                                </div>
                            </div>
                            </div>
						<div class="col-lg-3">
                            <div class="form-group">
                                <label for="name" class="cols-sm-2 control-label">Area</label>
                                <div class="cols-sm-10">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-building fa" aria-hidden="true"></i></span>
                                        <input type="text" class="form-control" name ="area" placeholder="Area" required/>
                                    </div>
                                </div>
                            </div>
                            </div>
						<div class="col-lg-6">
                            <div class="form-group">
                                <label for="name" class="cols-sm-2 control-label">City</label>
                                <div class="cols-sm-10">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-building fa" aria-hidden="true"></i></span>
                                        <input type="text" class="form-control" name ="city" placeholder="City" required/>
                                    </div>
                                </div>
                            </div>
						</div>
          <div class="col-lg-12">
                  <div class="checkbox">
            <button type="submit" class="btn btn-default btn1">Save Address</button>
          </div>
          </div>
          
      
        </div>
            </form>
      </div>
</div>
		<script>
		    
		    function show1(){
  document.getElementById('div1').style.display ='none';
}
function show2(){
  document.getElementById('div1').style.display = 'block';
}
		</script>
@endsection