@extends('client.layout.appclient')
@section('content')
   
	<!-- /BREADCRUMB --> 
<style>
    
    .hides {
  display: none;
}
</style>
<!-- section -->
<div class="section"> 
		<div class="container">
			<div class="row main">
			    
				<div class="main-login main-center">
				    <h2 style="text-align:center; margin-bottom:20px;">Edit Profile</h2>
				    @if(count($user)>0)
                <form method="post" action = "{{url('/')}}/edit/profile/{{$user[0]->pk_id}}" class="login100-form validate-form p-l-55 p-r-55 p-t-20">
					{{ csrf_field() }}
					@if($errors->any())
					
					<div class="alert alert-danger">
  <strong>Danger!</strong> {{$errors->first()}}
</div>
@endif
<div class="row">
						<div class="col-lg-6">
						<div class="form-group">
							<label for="name" class="cols-sm-2 control-label">First Name</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="fname" id="name" value="{{$user[0]->fname}}" placeholder="First Name"  maxlength="20"  required/>
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
                                        <input type="text" class="form-control" name="lname" value="{{$user[0]->lname}}" id="name"  placeholder="Last Name"  maxlength="20"  required/>
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
									<input type="email" class="form-control" name="email" id="email" value="{{$user[0]->username}}" placeholder="Email"  readonly/>
								</div>
							</div>
						</div>
</div>
 
                          <div class="col-lg-8">  
						<h5 style="margin-top:20px;">Would you like to associate this account with a business?</h5>
<p>You may want to do this for:</p>
<p>1. Tracking the spending of your business</p>
<p>2. Tax Purposes</p>
						
						
<input type="radio" name="tab" value="1" onclick="show2();" @if($user[0]->business_status == 1) checked @endif />
Yes
<input type="radio" name="tab" value="0" onclick="show1();" @if($user[0]->business_status == 0) checked @endif />
No
</div>

<div id="div1" class="hides" style="margin-top:10px; float:left;">
    
    <div class="col-lg-6">
<div class="form-group">
							<label for="confirm" class="cols-sm-2 control-label">Name of Business </label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="business_name" @if(count($business_account)>0) value ="{{$business_account[0]->business_name}}" @endif placeholder="Name of Business"  maxlength="50"/>
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
									<input type="text" class="form-control" name="company_name"  @if(count($business_account)>0) value ="{{$business_account[0]->company_name}}" @endif placeholder="Name of Company"  maxlength="50"/>
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
									    <option value ="Type of entity" @if(count($business_account)>0) @if($business_account[0]->entity_type == 'Type of entity') selected @endif @endif >Type of entity</option>
									    <option value ="Sole Proprierorship"@if(count($business_account)>0) @if($business_account[0]->entity_type == 'Sole Proprierorship') selected @endif @endif >Sole Proprierorship</option>
									    <option value ="AOP" @if(count($business_account)>0) @if($business_account[0]->entity_type == 'AOP') selected @endif @endif >AOP</option
									    <option value ="Pvt" @if(count($business_account)>0) @if($business_account[0]->entity_type == 'Pvt') selected @endif  @endif >Pvt</option>
									    <option value ="Ltd" @if(count($business_account)>0) @if($business_account[0]->entity_type == 'Ltd') selected @endif @endif >Ltd</option>
									    <option value ="Other" @if(count($business_account)>0) @if($business_account[0]->entity_type == 'Other') selected @endif @endif >Other</option>
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
									<input type="text" class="form-control"  name="job_title"  placeholder="Your Job Title" @if(count($business_account)>0) value ="{{$business_account[0]->job_title}}" @endif />
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
									<input type="text" class="form-control" name="NTN" placeholder="NTN" @if(count($business_account)>0) value ="{{$business_account[0]->NTN}}" @endif  />
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
									<input type="text" class="form-control" name="STN" placeholder="STN  / STRN" @if(count($business_account)>0) value ="{{$business_account[0]->STN}}" @endif />
								</div>
							</div>
						</div>
						</div>
						
</div>
<!--				<div class="col-lg-12"> -->
<!--<div class="content-wrapper" style="margin-bottom:20px; margin-top:20px">-->
              <!-- Content Header (Page header) -->
<!--              <section class="content-header">-->
<!--                <h3 style="margin:0px;">-->
<!--                Address-->
<!--                </h3>-->
<!--                        </section>-->
<!--    <tbody class="nDividerBlockOuter">-->
<!--              <tr>-->
<!--        <td class="nDividerBlockInner" style="padding: 18px;"><table class="nDividerContent" border="0" cellpadding="0" cellspacing="0" width="100%" style="border-top-width: 2px;border-top-style: solid;border-top-color: #3b3383;">-->
<!--            <tbody>-->
<!--              <tr>-->
<!--                <td><span></span></td>-->
<!--              </tr>-->
<!--            </tbody>-->
<!--          </table></td>-->
<!--      </tr>-->
<!--            </tbody>-->
    
    <!-- Main content --> 
    <!-- /.content --> 
<!--  </div>-->
<!--</div>	-->
						<!--<div class="col-lg-4">-->
						<!--<div class="form-group">-->
      <!--                          <label for="name" class="cols-sm-2 control-label">Building No</label>-->
      <!--                          <div class="cols-sm-10">-->
      <!--                              <div class="input-group">-->
      <!--                                  <span class="input-group-addon"><i class="fa fa-building fa" aria-hidden="true"></i></span>-->
      <!--                                  <input type="text" name ="building_no" @if(count($address)>0) value ="{{$address[0]->building_no}}" @endif class="form-control" placeholder="Building No" required/>-->
      <!--                              </div>-->
      <!--                          </div>-->
      <!--                      </div>-->
      <!--                      </div>-->
						<!--<div class="col-lg-4">-->
      <!--                      <div class="form-group">-->
      <!--                          <label for="name" class="cols-sm-2 control-label">Building Name</label>-->
      <!--                          <div class="cols-sm-10">-->
      <!--                              <div class="input-group">-->
      <!--                                  <span class="input-group-addon"><i class="fa fa-building fa" aria-hidden="true"></i></span>-->
      <!--                                  <input type="text" class="form-control" @if(count($address)>0) value ="{{$address[0]->building_name}}" @endif name ="building_name"  placeholder="Building Name"/>-->
      <!--                              </div>-->
      <!--                          </div>-->
      <!--                      </div>-->
						<!--</div>-->
						<!--<div class="col-lg-4">-->
      <!--                      <div class="form-group">-->
      <!--                          <label for="name" class="cols-sm-2 control-label">Floor / Suite</label>-->
      <!--                          <div class="cols-sm-10">-->
      <!--                              <div class="input-group">-->
      <!--                                  <span class="input-group-addon"><i class="fa fa-building fa" aria-hidden="true"></i></span>-->
      <!--                                  <input type="text" class="form-control"name ="floor" @if(count($address)>0) value ="{{$address[0]->floor}}" @endif placeholder="Floor / Suite" />-->
      <!--                              </div>-->
      <!--                          </div>-->
      <!--                      </div>-->
						<!--</div>-->
						<!--<div class="col-lg-3">-->
						<!--<div class="form-group">-->
      <!--                          <label for="name" class="cols-sm-2 control-label">Street</label>-->
      <!--                          <div class="cols-sm-10">-->
      <!--                              <div class="input-group">-->
      <!--                                  <span class="input-group-addon"><i class="fa fa-building fa" aria-hidden="true"></i></span>-->
      <!--                                  <input type="text" class="form-control" name="street" @if(count($address)>0) value ="{{$address[0]->street}}" @endif  placeholder="Street" required/>-->
      <!--                              </div>-->
      <!--                          </div>-->
      <!--                      </div>-->
      <!--                      </div>-->
						
						<!--<div class="col-lg-3">-->
						<!--<div class="form-group">-->
      <!--                          <label for="name" class="cols-sm-2 control-label">Block</label>-->
      <!--                          <div class="cols-sm-10">-->
      <!--                              <div class="input-group">-->
      <!--                                  <span class="input-group-addon"><i class="fa fa-building fa" aria-hidden="true"></i></span>-->
      <!--                                  <input type="text" name ="block" @if(count($address)>0) value ="{{$address[0]->block}}" @endif class="form-control"placeholder="Block"/>-->
      <!--                              </div>-->
      <!--                          </div>-->
      <!--                      </div>-->
						<!--</div>-->
						<!--<div class="col-lg-3">-->
						<!--<div class="form-group">-->
      <!--                          <label for="name" class="cols-sm-2 control-label">Sector / Phase</label>-->
      <!--                          <div class="cols-sm-10">-->
      <!--                              <div class="input-group">-->
      <!--                                  <span class="input-group-addon"><i class="fa fa-building fa" aria-hidden="true"></i></span>-->
      <!--                                  <input type="text" class="form-control" @if(count($address)>0) value ="{{$address[0]->phase}}" @endif name ="phase" placeholder="Sector / Phase"/>-->
      <!--                              </div>-->
      <!--                          </div>-->
      <!--                      </div>-->
      <!--                      </div>-->
						<!--<div class="col-lg-3">-->
      <!--                      <div class="form-group">-->
      <!--                          <label for="name" class="cols-sm-2 control-label">Area</label>-->
      <!--                          <div class="cols-sm-10">-->
      <!--                              <div class="input-group">-->
      <!--                                  <span class="input-group-addon"><i class="fa fa-building fa" aria-hidden="true"></i></span>-->
      <!--                                  <input type="text" class="form-control" @if(count($address)>0) value ="{{$address[0]->area}}" @endif name ="area" placeholder="Area" required/>-->
      <!--                              </div>-->
      <!--                          </div>-->
      <!--                      </div>-->
      <!--                      </div>-->
						<!--<div class="col-lg-6">-->
      <!--                      <div class="form-group">-->
      <!--                          <label for="name" class="cols-sm-2 control-label">City</label>-->
      <!--                          <div class="cols-sm-10">-->
      <!--                              <div class="input-group">-->
      <!--                                  <span class="input-group-addon"><i class="fa fa-building fa" aria-hidden="true"></i></span>-->
      <!--                                  <input type="text" class="form-control" name ="city" placeholder="City" @if(count($address)>0) value ="{{$address[0]->city}}" @endif required/>-->
      <!--                              </div>-->
      <!--                          </div>-->
      <!--                      </div>-->
						<!--</div>-->
						<div class="col-lg-12">
						
				
						<div class="form-group ">

                           <button target="_blank" name="submit" type="submit" class="btn btn-primary btn-lg btn-block login-button">Save</button>
						</div>
						</div>
						</div>
					</form>
					@endif
				</div>
			</div>
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