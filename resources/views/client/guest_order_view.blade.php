
@extends('client.layout.appclient')
@section('content')
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
<body>
        <div class="section"> 
                <!-- container -->
    <div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-12 col-sm-12 col-lg-offset-2">
               
            <div class="panel panel-default">
                
                <div class="panel-heading">
                    <h3 class="panel-title">
                       1: YOUR EMAIL &nbsp;&nbsp;&nbsp;&nbsp; {{session()->get('email')}}          </h3>
                </div>
               
            
               
                <div class="panel-heading">
                    <h3 class="panel-title">
                       2: YOUR ADDRESS   &nbsp;&nbsp;&nbsp;&nbsp; {{session()->get('fname')}} {{session()->get('lname')}} : {{session()->get('phone')}} :
                       {{session()->get('address')}} , {{session()->get('city')}}  </h3>
                </div>


              <div class="panel-heading">
                    <h3 class="panel-title">
                        3:ORDER SUMMERY                    </h3>
                </div>
     
                    @if(Session::has('cart'))
                    <form>
                    
                  <div class="table-responsive">
                  <table class="table table-bordered">
                  <thead>
                <tr>
                <th></th>
                <th>Product Name</th>
                <th>Quantity</th>
                <th>Unit Price</th>
                <th>Item Total</th>
                </tr>
                </thead>
                @foreach($products as $product) 
                <tbody>
                <tr>
                <td style="width:15%;"><img src="{{URL('/')}}/storage/images/{{$product['item']->thumbnail}}" alt="pic" style="width:100%;"></td>
                <td>{{$product['item']->name}}</td>
                <td>{{$product['qty']}} </td>
                <td>{{$product['item']->price}}
                        @if($product['save']>0) saving -{{$product['save']}}@endif</td>
                <th>{{number_format($product['price'])}}</th>
                </tr>
                </tbody>
                @endforeach
                  </table>
                  
                </div>
                
                <div class="row">
                    <div class="col-lg-6">
                        <table class="table">
                              <tbody>
                            <tr>
                                  <td style="border-top: 0px;"><h2>Total</h2></td>
                            <td style="border-top: 0px;"><h2>PKR {{number_format($totalPrice)}}</h2></td>
                                </tr>
                            
                          </tbody>
                            </table>
                           
                    </div>

              
                    <div class="col-lg-6">
                            <a href="{{url('/')}}/cart/guest/checkout/address/view/order/complete/order" class="btn btn-default pull-right" style="background-color:#3b3383; color:white !important;">complete checkout</a>
                       
                    </div>
                  
                </div>
                </form>
                @endif
              
              
                <div class="panel-heading panelhead">
                    <h3 class="panel-title">
                       4: PAYMENT                    </h3>
                </div>
             
            </div>
         
            <br/>
        </div>
    </div>
  </div>
        </div>
</body>

    
@endsection