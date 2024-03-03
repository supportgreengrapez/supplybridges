
@extends('client.layout.appclient')
@section('content')
<body>
    <div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-12 col-sm-12 col-lg-offset-2">
               
            <div class="panel panel-default">
                
                <div class="panel-heading">
                    <h3 class="panel-title">
                       1: YOUR EMAIL &nbsp;&nbsp;&nbsp;&nbsp; {{session::get('username')}}              </h3>
                </div>
               
            
               @if(count($result1)>0)
         
                <div class="panel-heading">
                    <h3 class="panel-title">
                       2: YOUR ADDRESS   &nbsp;&nbsp;&nbsp;&nbsp; {{$result1[0]->fname}} {{$result1[0]->lname}} : {{$result1[0]->phone}} :
                       {{$result1[0]->address}} , {{$result1[0]->city}}       </h3>
                </div>


           
                @endif
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
                <td>{{number_format($product['product_price'])}} 
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
                    @if(count($result1)>0)
                
                    <div class="col-lg-6">
                            <a href="{{url('/')}}/cart/checkout/address/view/order/complete/order/{{$result1[0]->pk_id}}" class="btn btn-default pull-right">complete checkout</a>
                       
                    </div>
    
                    @endif
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
</body>

    
@endsection