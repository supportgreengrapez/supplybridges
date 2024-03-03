
@extends('client.layout.appclient')
@section('content')

			@if($errors->any())
<div class"alert alert-danger">{{$errors->first()}}</div>
@endif
<!-- /NAVIGATION --> 

<!-- BREADCRUMB -->


<div id="breadcrumb">
    <div class="container">
      <ul class="breadcrumb">
        <li><a href="/">Home</a></li>
        <li class="active">Order Tracking</li>
      </ul>
    </div>
     <div class="section"> 
        <!-- container -->
        <div class="container"> 
          <!-- row -->
          <div class="content-wrapper">
              <!-- Content Header (Page header) -->
              <section class="content-header">
                <h3>
                    Order Tracking
                </h3>
                        </section>
    <tbody class="nDividerBlockOuter">
              <tr>
        <td class="nDividerBlockInner" style="padding: 18px;"><table class="nDividerContent" border="0" cellpadding="0" cellspacing="0" width="100%" style="border-top-width: 5px;border-top-style: solid;border-top-color: #3b3383;">
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
    @if(count($ordertracking)>0)
    <div class="wrappers">
          <div id="login-form" class="form">
            <h3 class="text-center content-header pt-20 pb-20">Order Detail</h3>
            <div class="x_panel" style="border:0px">
                <div class="member-left-side">
                <div class="member-email clearfix" style="border-bottom:0px;"> <b>Order ID</b> <span>{{$ordertracking[0]->pk_id}}</span> </div>
                  <div class="member-email clearfix" style="border-bottom:0px;"> <b>Customer Name</b> <span>{{$ordertracking[0]->fname}} {{$ordertracking[0]->lname}}</span> </div>
                  <div class="member-email clearfix"> <b>Total Price</b> <span>PKR {{number_format($ordertracking[0]->amount)}}</span> </div>
  
                  <div class="member-email clearfix"> <b>Payment Method</b> <span>Cash On Delivery </span> </div>
                  @if($ordertracking[0]->status == 0)
                  <div class="member-email clearfix"> <b>Status</b> <span>Shipped</span> </div>
                  @elseif($ordertracking[0]->status == 1)
                     <div class="member-email clearfix"> <b>Status</b> <span>In progress</span> </div>
                       @elseif($ordertracking[0]->status == 2)
                              <div class="member-email clearfix"> <b>Status</b> <span>Return</span> </div>
                                 @elseif($ordertracking[0]->status == 3)
                              <div class="member-email clearfix"> <b>Status</b> <span>Cancel</span> </div>
                       @else
                    
                              <div class="member-email clearfix"> <b>Status</b> <span>Delivered</span> </div>
                              @endif
                  
                  <div class="member-email clearfix"> <b>Phone No</b> <span>{{$ordertracking[0]->phone}}</span> </div>
                  <div class="member-email clearfix"> <b>Shipment Address </b> <span>{{$ordertracking[0]->address}}</span> </div>
                </div>
            </div>
          </div>
          </div>
          @endif
  </div>
          <!-- /row -->
        </div>
      </div>
    
    <div class="section"> 
        <!-- container -->
        <div class="container"> 
          <!-- row -->
          <div class="content-wrapper">
              <!-- Content Header (Page header) -->
              <section class="content-header">
                <h3>
                </h3>
                        </section>
    <tbody class="nDividerBlockOuter">
              <tr>
        <td class="nDividerBlockInner" style="padding: 18px;"><table class="nDividerContent" border="0" cellpadding="0" cellspacing="0" width="100%" style="border-top-width: 5px;border-top-style: solid;border-top-color: #3b3383;">
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
        </div>
      </div>
    
      <div class="section"> 
  <!-- container -->
  <div class="container"> 
    <!-- row -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h3>
          View Order
          </h3>
                  </section>
            <div class="row">
        <div class="col-sm-12 col-md-10 col-md-offset-1">
            <table class="table">
                <thead>
                    <tr>
                            <th>Images</th>
                            <th>Product Name</th>
                            <th>Quantity</th>
                            <th>Size</th>
                        <th class="text-center">Unit Price</th>
                        <th class="text-center">Total</th>
                        <th></th>
                    </tr>
                </thead>
                
                <tbody>
                    @if(count($orderdetail)>0)
                    @foreach($orderdetail as $results)
                    <tr>
                       @php 
                         $thumbnail = DB::select("select* from product where  pk_id ='$results->product_id'");
                       @endphp
                        <td style="width:20%;"><image src="{{URL('/')}}/storage/images/{{$thumbnail[0]->thumbnail}}" alt="img"></td> 
                        <td>{{$results->product_name}}</td>
                        <td>{{$results->quantity}}</td> 
                        <td>{{$results->size}}</td>
                        <td><strong>PKR {{number_format($results->price)}}</strong></td>
                        <td><strong>PKR {{number_format($results->quantity * $results->price)}} </strong></td>
                        
                    </tr>
                       @endforeach
                    @endif
                    
                    
                
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


@endsection