
@extends('client.layout.appclient')
@section('content')

<!-- /NAVIGATION --> 

<!-- BREADCRUMB -->
<div id="breadcrumb">
    <div class="container">
      <ul class="breadcrumb">
        <li><a href="index.html">Home</a></li>
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
  </div>
          <!-- /row -->
          <div class="wrappers" style="margin:0 auto; width:70%;">
          <div class="row">
             <form method="post" action = "{{url('/')}}/order/tracking" class="login100-form validate-form p-l-55 p-r-55 p-t-178">
                     {{ csrf_field() }}
    @if($errors->any())
<div class="alert alert-danger">
 <strong>Danger!</strong> {{$errors->first()}}
</div>
@endif
              <div class="col-lg-7 col-md-7 col-sm-12">
        <div class="boxcheck1">
                  <div class="form-group">
            <label for="text">Order ID</label>
            <input type="text" name ="orderid" class="form-control" pattern="[a-zA-Z0-9\s]+" maxlength="20" required  >
          </div>
                </div>
        <div class="newbox">
                  <div class="checkbox">
            <button type="submit" class="btn btn-default btn1">Search</button>
          </div>
                  <br>
                </div>
      </div>
            </form>
   
  </div>
  </div>
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
      
         @if(count($orderdetail)>0)
                    @foreach($orderdetail as $results)
                    
                               @php 
                $order_id =   $results->pk_id; 
                        
        $orderdetailed = DB::select("select* from detail_table where order_id = '$order_id' ");
                        
                       @endphp
                       
                       
      <div class="section"> 
  <!-- container -->
  <div class="container"> 
    <!-- row -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
         
          
          <div class="row">
              <div class="col-lg-6">
                  
                   <h3>
          View Order <a href="{{url('/')}}/order/tracking/detail/{{$results->pk_id}}">{{$results->pk_id}}</a>
          </h3>
              </div>
        <div class="col-lg-6">
            
            <table class="table">
                
                <tbody>
                 
                    <tr>
                        <td><h3>Amount</h3></td>
                        <td class="text-right"><h3><strong>PKR  {{$results->amount}} </strong></h3></td>
                    </tr>
                </tbody>
            </table>
        </div>
        
    </div>
                  </section>
            <div class="row">
        <div class="col-sm-12 col-md-10 col-md-offset-1">
            <table class="table">
                <thead>
                    <tr>
                            <th>Images</th>
                            <th>Product</th>
                            <th>Quantity</th>
                            <th>Size</th>
                        <th class="text-center">Unit Price</th>
                        <th class="text-center">Total</th>
                        <th></th>
                    </tr>
                </thead>
                
                <tbody>
                  
                     @if(count($orderdetailed)>0)
                    @foreach($orderdetailed as $results)  

                    <tr>
                        
                              @php 
                       
                          $id =  $results->product_id;
                         $thumbnail = DB::select("select* from product where  pk_id ='$id'");
                    
                       @endphp
        
                        <td style="width:20%;"><image src="{{URL('/')}}/storage/images/{{$thumbnail[0]->thumbnail}}" alt="img"></td> 
                        <td>{{$results->product_name}}</td>
                        <td>{{$results->quantity}}</td> 
                        <td>{{$results->size}}</td>
                        <td><strong>PKR {{$results->price}}</strong></td>
                        <td><strong>PKR {{$results->quantity * $results->price}} </strong></td>
                        
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>    
    
		<div class="content-wrapper">
              <!-- Content Header (Page header) -->
              <section class="content-header">
                <h3>
                </h3>
                        </section>
    
              
        <table class="nDividerContent" border="0" cellpadding="0" cellspacing="0" width="100%" style="border-top-width: 5px;border-top-style: solid;border-top-color: #3b3383;">
            <tbody>
              <tr>
                <td><span></span></td>
              </tr>
            </tbody>
          </table>
      
            
    
    <!-- Main content --> 
    <!-- /.content --> 
  </div>			
        <!-- Main content -->
        <!-- /.content -->
      </div>
      
    <!-- /row --> 
    	
    
    
  </div>
  <!-- /container --> 
</div>
 
   @endforeach
                    @endif

@endsection