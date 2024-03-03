@extends('client.layout.appclient')
@section('content')
<!----//End-bottom-header----> 
<form method="post" action = "{{url('/')}}/cart/guest/checkout/address/view/order/complete/order" class="login100-form validate-form p-l-55 p-r-55 p-t-178">
    {{ csrf_field() }}
<!-- /NAVIGATION --> 

<!-- BREADCRUMB -->
<div id="breadcrumb">
        <div class="container">
          <ul class="breadcrumb">
            <li><a href="index.html">Home</a></li>
            <li class="active">Payment</li>
          </ul>
        </div>
      </div>
      <div class="section"> 
            <!-- container -->
    <div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-12 col-sm-12 col-lg-offset-2">
            <div class="panel panel-default pnel">
                

                <div class="panel-heading" style="border-bottom:none;">
                    <h3 class="panel-title" >
                       1: YOUR EMAIL &nbsp;&nbsp;&nbsp;&nbsp; {{session()->get('email')}}                   </h3>
                </div>
                
                <div class="panel-heading" style="border-bottom:none;">
                    <h3 class="panel-title">
                       2: YOUR ADDRESS :  &nbsp;&nbsp;&nbsp;&nbsp; {{session()->get('fname')}} {{session()->get('lname')}} : {{session()->get('phone')}} :
                       {{session()->get('address')}} , {{session()->get('city')}} </h3>
                </div>
                
      				
                <div class="panel-heading" style="border-bottom:none;">
                    <h3 class="panel-title">
                        3:ORDER SUMMERY                    </h3>
                </div>
                
                <div class="panel-heading" style="border-bottom:none;">
                    <h3 class="panel-title">
                       4: PAYMENT                    </h3>
                </div>
                <div class="payment">
        <div class="col-lg-12 col-md-5 col-sm-8  bhoechie-tab-container">
            <div class="col-lg-3 col-md-3 col-sm-3  bhoechie-tab-menu">
              <div class="list-group" style="margin-bottom:0px;">
         
                <a href="#" class="list-group-item text-center active">
                  <h4 class="far fa-money-bill-alt active"></h4><br>Cash on delivery
                </a>
             
                
              </div>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 bhoechie-tab">
                <!-- flight section -->
                <div class="bhoechie-tab-content active">
                    <p class="textwrite">Pay in cash to the courier at the time of the delivery</p>
                    
                    <button type="submit" name = "submit" class="btn btn-default">confirm order</button>
                </div>
                <!-- train section -->
                
    
                <!-- hotel search -->
                
            </div>
            
            </div>
            </div>
            </div>
            <br/>
        </div>
    </div>
</div>
      </div>
</form>
   
  

		@endsection
