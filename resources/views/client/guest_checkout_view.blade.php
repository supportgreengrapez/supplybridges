
@extends('client.layout.appclient')
@section('content')

<!-- /NAVIGATION --> 
<style>
    
    .hides {
  display: none;
}
</style>
<!-- BREADCRUMB -->
<div id="breadcrumb">
    <div class="container-fluid">
      <ul class="breadcrumb">
        <li><a href="{{url('/')}}/">Home</a></li>
        <li style="color:#F09819;">Checkout</li>
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
                <h3 style=" margin-bottom:0px;">
                Checkout
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
                <form method="post" action = "{{url('/')}}/cart/guest/checkout">
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
									<input type="text" class="form-control" name="fname" id="name"  placeholder="First Name"  maxlength="20"  required/>
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
                                        <input type="text" class="form-control" name="lname" id="name"  placeholder="Last Name"  maxlength="20"  required/>
                                    </div>
                                </div>
                            </div>
                        
                        </div>
                        <div class="col-lg-6">
						
						<div class="form-group">
							<label for="email" class="cols-sm-2 control-label">Email</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
									<input type="email" class="form-control" name="email" id="email"  placeholder="Email"  required/>
								</div>
							</div>
						</div>
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
          
          
          <!--<div class="col-lg-6">-->
          <!--        <div class="form-group">-->
          <!--  <label for="text">Address*</label>-->
          <!--  <input type="text" name ="address" class="form-control"  required  >-->
          <!--</div>-->
          <!--</div>-->
          

          
          					<div class="col-lg-12"> 
<div class="content-wrapper" style="margin-bottom:20px; margin-top:20px">
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
                                        <input type="text" class="form-control" name ="building_name"  placeholder="Building Name"/>
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
          <!--<div class="col-lg-6">-->
          <!--        <div class="form-group">-->
          <!--  <label for="text">city*</label>-->
          <!--  <input type="text" name ="city" class="form-control" pattern="[a-zA-Z0-9\s]+" maxlength="10" required  >-->
          <!--</div>-->
          <!--    </div>-->
          
          <!--<div class="col-lg-6">-->
          <!--        <div class="form-group">-->
          <!--  <label for="text">Region*</label>-->
          <!--  <input type="text" name ="region" class="form-control" required >-->
          <!--</div>-->
          <!--</div>-->
          <div class="col-lg-12">
                  <div class="checkbox">
            <label>
                      <input type="checkbox" name ="account" id="myCheck"  onclick="myFunction()">
            Create as Account? </label>
          </div>
          </div>
          <div id="text" style="display:none">
          <div class="col-lg-6">
              
              <div class="form-group">
							<label for="password" class="cols-sm-2 control-label">Password <span style="color:red;">(8 digit password):</span></label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
									<input type="password" class="form-control" name="password" id="password" pattern=".{8,}" maxlength="36"   placeholder="Password" required/>
								</div>
							</div>
						</div>
              
          </div>
          <div class="col-lg-6">
              <div class="form-group">
							<label for="confirm" class="cols-sm-2 control-label">Confirm Password <span style="color:red;">(8 digit password):</span></label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
									<input type="password" class="form-control" name="confirm" id="confirm"  placeholder="Confirm Password" pattern=".{8,}" maxlength="36"   placeholder="Password" required/>
								</div>
							</div>
						</div>
             
          </div>
                                              <div class="col-lg-8">  
						<h5 style="margin-top:20px;">Would you like to associate this account with a business?</h5>
<p>You may want to do this for:</p>
<p>1. Tracking the spending of your business</p>
<p>2. Tax Purposes</p>
						
						
<input type="radio" name="tab" value="1" onclick="show2();" />
Yes
<input type="radio" name="tab" value="0" onclick="show1();" checked />
No
</div>

<div id="div1" class="hides" style="margin-top:20px;float:left;">
    
    <div class="col-lg-6">
<div class="form-group">
							<label for="confirm" class="cols-sm-2 control-label">Name of Business </label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="business_name" placeholder="Name of Business"  maxlength="50"/>
								</div>
							</div>
						</div>
						</div>
						<div class="col-lg-6">
						<div class="form-group">
							<label for="confirm" class="cols-sm-2 control-label">Name of Company <span style="font-weight:normal;font-size:12px;"> (if separate from Name of Business)  </span></label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="company_name" placeholder="Name of Company"  maxlength="50"/>
								</div>
							</div>
						</div>
						</div>
						<div class="col-lg-6">
						<div class="form-group">
							<label for="confirm" class="cols-sm-2 control-label">Type of entity</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
									<select class="form-control"  name="entity_type">
									    <option value ="">Type of entity</option>
									    <option value ="Sole Proprierorship">Sole Proprierorship</option>
									    <option value ="AOP">AOP</option
									    <option value ="Pvt">Pvt</option>
									    <option value ="Ltd">Ltd</option>
									    <option value ="Other">Other</option>
									</select>
								</div>
							</div>
						</div>
						</div>
						<div class="col-lg-6">
						<div class="form-group">
							<label for="confirm" class="cols-sm-2 control-label">Your Job Title</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="job_title"  placeholder="Your Job Title"  />
								</div>
							</div>
						</div>
						</div>
						<div class="col-lg-6">
						<div class="form-group">
							<label for="confirm" class="cols-sm-2 control-label">NTN</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="NTN" placeholder="NTN"  />
								</div>
							</div>
						</div>
						</div>
						<div class="col-lg-6">
						<div class="form-group">
							<label for="confirm" class="cols-sm-2 control-label">STN  / STRN</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="STN" placeholder="STN  / STRN" />
								</div>
							</div>
						</div>
						</div>
						
</div>
</div>
          <div class="col-lg-6">
            <button type="submit" class="btn btn-default btn1">Proceed to Checkout</button>
      
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