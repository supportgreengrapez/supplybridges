
@extends('client.layout.appclient')
@section('content')

@if(Session::has('cart'))
<div class="section"> 
  <!-- container -->
  <div class="container"> 
    <!-- row -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h3>
          Shopping Cart
          </h3>
                  </section>
            <div class="row">
        <div class="col-sm-12 col-md-12">
            <table class="table">
                <thead>
                    <tr>
                            <th>Product Name</th>
                            <th class="text-center">Quantity</th>
                            <th>SKU</th>
                     
                        <th class="text-center">Rate</th>
                        <th class="text-center">Item Total</th>
                        <th></th>
                    </tr>
                </thead>
                
                <tbody>
                        @foreach($products as $product)
                    <tr>
                        <td class="col-sm-8 col-md-6">
                        <div class="media">
                            <div class="thumbnail pull-left" style="margin-right:10px; padding-right:0px;"> <img class="media-object" src="{{URL('/')}}/storage/images/{{$product['item']->thumbnail}}" style="width: 72px; height: 72px;"> </div>
                            <div class="media-body" >
                                <h5 class="media-heading">{{$product['item']->name}}</h5>
                                <h5 class="media-heading">{{$product['item']->description}}</h5>
                            </div>
                        </div></td>
                        <td class="col-sm-1 col-md-1 text-center"><strong>{{$product['qty']}}</strong></td>
                        <td class="col-sm-1 col-md-1 text-center"><strong>{{$product['item']->sku}}</strong></td>
                        <td class="col-sm-1 col-md-1 text-center"><strong>PKR {{number_format($product['product_price'])}} 
                                @if($product['save']>0) saving -{{$product['save']}}@endif</strong></td>
                        <td class="col-sm-1 col-md-1 text-center"><strong>PKR {{number_format($product['price'])}}</strong></td>
                        <td class="col-sm-1 col-md-1">
                        <a href="{{URL('/')}}/remove/item/cart/{{$product['item']->pk_id}}/{{$product['size']}}/{{$product['qty']}}" type="button" class="btn btn-danger">
                            <span class="glyphicon glyphicon-remove"></span>Remove</a>
                        </td>
                    </tr>
                    @endforeach
   
                    <tr>
                        <td><h5>Subtotal</h5></td>
                        <td class="text-right"><h5><strong>PKR {{number_format($totalPrice)}}</strong></h5></td>
                    </tr>
                 
                    <tr>
                        <td><h3>Total</h3></td>
                        <td class="text-right"><h3><strong>PKR {{number_format($totalPrice)}}</strong></h3></td>
                    </tr>
                    <tr>
                        <td>
                        <a href="{{url('/')}}/shop" type="button" class="btn btn-default"><span class="glyphicon glyphicon-shopping-cart"></span> Continue Shopping
                        </a></td>
                        @if(Session::has('username'))
                        <td style="padding-right:0px; float:right;">
                       <a href="{{url('/')}}/cart/checkout" type="button" class="primary-btn add-to-cart"> Checkout
                    </a></td>
                        @else
                        <td style="padding-right:0px; float:right;">
                                <a href="{{url('/')}}/cart/guest/checkout" type="button" class="primary-btn add-to-cart"> Checkout
                                </a></td>
                                 @endif
                    </tr>
                </tbody>
            </table>
        </div>
    </div>           
					
        <!-- Main content -->
        <!-- /.content -->
      </div>
      
    <!-- /row --> 
    	
    
    
  </div>
  <!-- /container --> 
</div>
@endif
<!-- /BREADCRUMB --> 

<!-- section -->

<!-- /section --> 

<!-- FOOTER -->



@endsection