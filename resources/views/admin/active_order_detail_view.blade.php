@extends('admin.layout.appadmin')
@section('content') 

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1> @if(count($result)>0)
    @foreach($result as $results) <span style="margin-top:5px;float:left">Orders > Active Orders > Order Detail  Order ID {{$results->pk_id}} </span> &nbsp;  @if($results->status == 1) <span class="label label-primary"> In progress</span> @endif
    @if($results->status == 0) <span class="label label-success"> Shipped</span> @endif
    @endforeach
    @endif </h1>
</section>
<!-- Main content -->
<section class="content"> 
  <!-- Info boxes --> 
  
  <!-- Main row -->
  <div class="row"> 
    <!-- Left col -->
    <div class="col-md-12"> 
      <!-- TABLE: LATEST ORDERS -->
      <div class="box box-info">
        <div class="box-header with-border" style="padding: 10px 0px;">
          <div class="row">
            <div class="productbox">
              <div class=" col-md-12">
                <div class="panel panel-default">
                  <div class="panel-body">
                    <div class="row">
                      <div class="col-lg-12">
                        <div class="row">
                          <div class="col-sm-2 col-md-2 col-lg-2">
                            <div itemscope="">
                              <p itemprop="email"><b> Customer Name</b></p>
                              <p><b>Contact #</b></p>
                              <p><b>Building No</b></p>
                              <p><b>Building Name</b></p>
                              <p><b>Floor</b></p>
                              <p><b>Street</b></p>
                              <p><b>Block</b></p>
                              <p><b>Phase</b></p>
                              <p><b>Area</b></p>
                              <p><b>City</b></p>
                            </div>
                          </div>
                          @if(count($addresses)>0)
                          @foreach($addresses as $results)
                          <div class="col-sm-4 col-md-4 col-lg-4">
                            <div itemscope="">
                              <p>{{$results->fname}} {{$results->lname}}</p>
                              @if($results->phone == "")
                              <p>----</p>
                              @else
                              <p>{{$results->phone}}</p>
                              @endif
                              
                              @if($results->building_no == "")
                              <p>----</p>
                              @else
                              <p>{{$results->building_no}}</p>
                              @endif
                              
                              @if($results->building_name == "")
                              <p>----</p>
                              @else
                              <p>{{$results->building_name}}</p>
                              @endif
                              
                              @if($results->floor == "")
                              <p>----</p>
                              @else
                              <p>{{$results->floor}}</p>
                              @endif
                              
                              @if($results->street == "")
                              <p>----</p>
                              @else
                              <p>{{$results->street}}</p>
                              @endif
                              
                              @if($results->block == "")
                              <p>----</p>
                              @else
                              <p>{{$results->block}}</p>
                              @endif
                              @if($results->phase == "")
                              <p>----</p>
                              @else
                              <p>{{$results->phase}}</p>
                              @endif
                              
                              @if($results->area == "")
                              <p>----</p>
                              @else
                              <p>{{$results->area}}</p>
                              @endif
                              
                              @if($results->city == "")
                              <p>----</p>
                              @else
                              <p>{{$results->city}}</p>
                              @endif </div>
                          </div>
                          @endforeach
                          @endif
                          <div class="col-sm-2 col-md-2 col-lg-2">
                            <div itemscope="">
                              <p itemprop="email"> <b>Cash to be Collected</b></p>
                            </div>
                          </div>
                          @if(count($result)>0)
                          @foreach($result as $results)
                          <div class="col-sm-2 col-md-2 col-lg-2">
                            <div itemscope="">
                              <p>PKR {{ number_format($results->amount)}}</p>
                            </div>
                          </div>
                          @endforeach
                          @endif </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <form method="post" action = "{{url('/')}}/admin/home/deliver/order/{{$result[0]->pk_id}}" class="login-form">
                {{ csrf_field() }}
                <div class="col-lg-6" style="margin-bottom:20px">
                  <select class="form-control" name="rider" style="    border-radius: 20px !important;">
                    
                      
           @if($result3>0)
           @foreach($result3 as $results)
                   
                      
                    <option value="{{$results->username}}">{{$results->username}}</option>
                    
                      
                   @endforeach
                   @endif
               
                    
                  </select>
                </div>
                <div class="col-lg-12">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th></th>
                      <th>Product Name</th>
                      <th>Description</th>
                      <th>SKU</th>
                      <th>Rate</th>
                      <th>QoH</th>
                      <th>Order Quantity</th>
                      <th>Shipped Quantity</th>
                      <th>Quantity Remaining</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody>
                  
                  @php
                  
                  $count=0;
                  
                  @endphp       
                  @if(count($result1)>0)
                  @foreach($result1 as $results)
                  <tr>
                    <td><label><input type="checkbox" name="checkbox[]" value="{{$count}}" checked ></label></td>
                    @php
                    $id = $results->product_id;
                    $product = DB::select("select* from product where pk_id = '$id'");
                    @endphp
                    <input  type="number" hidden name="product_id[]" value="{{$results->product_id}}">
                    <td>{{$results->product_name}}</td>
                    <td>{{$product[0]->description}}</td>
                    <td>{{$product[0]->sku}}</td>
                    <td>{{number_format($results->price)}}</td>
                    <td>{{$product[0]->available_quantity}}</td>
                    <input  type="number" hidden name="available_quantity[]" value="{{$product[0]->available_quantity}}">
                    <td>{{$results->quantity}}</td>
                    @if(!empty($results->deliver_quantity))
                    <td>{{$results->deliver_quantity}}</td>
                    @else
                    <td><input  type="number" name="quantity[]" value="{{$results->quantity}}"></td>
                    @endif
                    <td>{{$results->quantity - $results->deliver_quantity}}</td>
                    @if($results->deliver_quantity < $results->quantity and !empty($results->deliver_quantity) )
                    <td><span  class="label label-warning">Partialy Shipped</span></td>
                    @else
                    @if($product[0]->available_quantity > $results->quantity)
                    @if(empty($results->deliver_quantity))
                    <td><span  class="label label-info">Ready to be Shipped</span></td>
                    @else
                    <td><span  class="label label-success">Shipped</span></td>
                    @endif
                    @else
                    <td><span  class="label label-danger">Pending Purchase</span></td>
                    @endif
                    @endif </tr>
                  @php
                  $count++;
                  @endphp
                  
                  @endforeach
                  @endif
                    </tbody>
                  
                </table>
                <button type="submit" class="btn btn-default btn-md ">Done</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- /.box --> 
  </div>
  <!-- /.col -->
  </div>
  <!-- /.row --> 
</section>
<!-- /.content --> 

<!-- Main content -->
</div>
<!-- /.content-wrapper --> 

@endsection