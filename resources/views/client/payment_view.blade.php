@extends('client.layout.appclient')
@section('content')
<!----//End-bottom-header----> 


    <div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-12 ">
            <form method="post" action = "{{url('/')}}/cart/checkout/address/view/order/complete/order" class="login100-form validate-form p-l-55 p-r-55 p-t-178">
    {{ csrf_field() }}
            <div class="panel panel-default pnel">
                      @if($errors->any())
                        <div class"alert alert-danger">{{$errors->first()}}</div>
                        @endif

                <div class="panel-heading" style="border-bottom:none;">
                    <h3 class="panel-title" >
                       1: YOUR EMAIL &nbsp;&nbsp;&nbsp;&nbsp; {{session()->get('username')}}                   
                    </h3>
                </div>
@if(count($result)>0)
                @foreach($result as $results)
                
                <div class="panel-heading" style="border-bottom:none;">
                    <h3 class="panel-title">
                       2: YOUR ADDRESS :  &nbsp;&nbsp;&nbsp;&nbsp; {{$results->building_no}} : {{$results->building_name}} : {{$results->floor}} : {{$results->street}} : {{$results->block}} :
                       : {{$results->phase}} : {{$results->area}} : {{$results->city}} </h3>
                </div>

                @endforeach
                @endif
                
      				
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
              <div class="list-group">
         
                <a href="#" class="list-group-item text-center active">
                  <h4 class="fa fa-dollar-sign active"></h4><br>Cash on delivery
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
            </form>
            <br/>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12 ">
            <form method="post" action = "{{url('/')}}/cart/checkout/address/view/order/complete/order/add/promo" class="login100-form validate-form p-l-55 p-r-55 p-t-178">
    {{ csrf_field() }}
<div class="panel bgcard pnel">
        <div class="">
          <div class="panel-body"> 
            <table class="table table-striped" style="font-weight: bold;">
        
              <tr>
                <td style="width: 175px;"><label for="id_address_line_1">Promo Code:</label></td>
                <td><input class="form-control" id="id_address_line_1"
                                                   name="promo"  type="text"/></td>
              </tr>
            <tr>
                <td style="border:none;"><button type="submit" name = "submit" class="btn btn-default">Add Promo Code</button></td>    
            
            </tr>
              
     
            </table>
           
          </div>
        </div>
      </div>
    </form>
        </div>
    </div>
</div>



		@endsection
