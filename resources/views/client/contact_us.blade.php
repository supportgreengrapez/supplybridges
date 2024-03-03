
@extends('client.layout.appclient')
@section('content')
<!--Section: Contact v.1-->
<section class="section pb-5">

  <!--Section heading-->

  <div class="row">

    <!--Grid column-->
    <div class="col-lg-5 mb-4">

      <!--Form with header-->
      <div class="main-login" style="padding: 40px 40px;">
				    <h2 style="text-align:center; margin-bottom:20px;">Contact Us</h2>
                <form method="post" action="" class="login100-form validate-form p-l-55 p-r-55 p-t-20">
					<div class="row">
						<div class="col-lg-12">
						<div class="form-group">
							<label for="name" class="cols-sm-2 control-label">First Name</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="fname" placeholder="First Name" pattern="[a-zA-Z0-9\s]+" maxlength="20" required="">
								</div>
							</div>
                        </div>
                        </div>
                        <div class="col-lg-12">
                        <div class="form-group">
                                <label for="name" class="cols-sm-2 control-label">Last Name</label>
                                <div class="cols-sm-10">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                                        <input type="text" class="form-control" name="lname" placeholder="Last Name" pattern="[a-zA-Z0-9\s]+" maxlength="20" required="">
                                    </div>
                                </div>
                            </div>
                        
                        </div>
                        <div class="col-lg-12">
						
						<div class="form-group">
							<label for="email" class="cols-sm-2 control-label">Email</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
									<input type="email" class="form-control" name="email" id="email" placeholder="Email" required="">
								</div>
							</div>
						</div>
</div>
<div class="col-lg-12">
						
						<div class="form-group">
							<label for="email" class="cols-sm-2 control-label">Subject</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<textarea class="form-control" name="" rows="7" cols="50" required=""></textarea
								</div>
							</div>
						</div>
</div>
				
						<div class="form-group ">

                           <button type="submit" class="btn btn-primary btn-lg btn-block login-button">Send</button>
						</div>
						</div>
						</div>
					</form>
				</div>
      <!--Form with header-->

    </div>
    <!--Grid column-->

    <!--Grid column-->
    <div class="col-lg-7">

      <!--Google map-->
      <div id="map-container-google-11" class="z-depth-1-half map-container-6" style="height: 400px">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3400.7910142698415!2d74.33722011448313!3d31.529899353827602!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x391904ed974008c1%3A0xde734f4167bc5e6f!2sIftikhar+Ahmad+Malik+Road%2C+Gulberg+2%2C+Lahore%2C+Punjab%2C+Pakistan!5e0!3m2!1sen!2s!4v1563432375659!5m2!1sen!2s" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
      </div>

      <br>
      <!--Buttons-->
      <div class="row text-center">
        <div class="col-md-4">
          <a class="btn-floating blue accent-1"><i class="fa fa-map-marker"></i></a>
          <p>93-A/2 Iftikhar Ahmad Malik Road
Sharif Colony, Gulberg II
Lahore, Punjab
Pakistan</p>
        </div>

        <div class="col-md-4">
          <a class="btn-floating blue accent-1"><i class="fa fa-phone"></i></a>
          <p>+92-332-BRIDGES (27 43 43 7)</p>
        </div>

        <div class="col-md-4">
          <a class="btn-floating blue accent-1"><i class="fa fa-envelope"></i></a>
          <p>cs@supplybridges.com</p>
        </div>
      </div>

    </div>
    <!--Grid column-->

  </div>

</section>
<!--Section: Contact v.1-->


@endsection