@extends('rider.layout.apprider')
@section('content') 

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper"> 
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1> @if(count($result)>0)
      @foreach($result as $results) <span style="margin-top:5px;float:left"> Order ID {{$results->pk_id}} </span> &nbsp;  @if($results->status == 1) <span class="label label-primary"> In progress</span> @endif
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
            <div class="box-header with-border" style="    padding: 10px 0px;">
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
                                  <p><b>Shipping Address</b></p>
                                </div>
                              </div>
                              @if(count($result)>0)
                              @foreach($result as $results)
                              <div class="col-sm-4 col-md-4 col-lg-4">
                                <div itemscope="">
                                  <p>{{$results->fname}} {{$results->lname}}</p>
                                  <p>{{$results->phone}}</p>
                                  <p>{{$results->address}}</p>
                                </div>
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
                                  <p>PKR {{ $results->amount}}</p>
                                </div>
                              </div>
                              @endforeach
                              @endif </div>
                          </div>
                        </div>
                      </div>
                    </div>
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
                          
                 <td>    <label><input type="checkbox" name="checkbox[]" value="{{$count}}" checked></label></td>
                          
                           @php
           $id = $results->product_id;
            $product = DB::select("select* from product where pk_id = '$id'");
           @endphp
                        <td>{{$results->product_name}}</td>
                        
                        <td>{{$product[0]->description}}</td>
                          <td>{{$product[0]->sku}}</td>
                        <td>{{$results->price}}</td>
                                                             <td>{{$product[0]->available_quantity}}</td>
                                                             
                        <td>{{$results->quantity}}</td>
          
                   @if(!empty($results->deliver_quantity))
                      <td>{{$results->deliver_quantity}}</td>
                      @else
                        <td><input  type="number" name="quantity" value="{{$results->quantity}}"></td>
                        @endif
                               <td>{{$results->quantity - $results->deliver_quantity}}</td>
                   @if($results->deliver_quantity < $results->quantity and !empty($results->deliver_quantity) )
                   
                     <td><span  class="label label-primary">Partialy delivered</span></td>
                   @else
                   @if($product[0]->available_quantity > $results->quantity)
                         <td><span  class="label label-primary">Ready to be Shipped</span></td>
                
                           @else
                             <td><span  class="label label-success">Pending Purchase</span></td>
               
                           @endif
                           @endif
                           
                           
                      </tr>
                                @php
                        $count++;
                        @endphp
                        
                      @endforeach
                      @endif
                        </tbody>
                      
                    </table>
                
                
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-header --> 
            
            <!-- /.box-footer --> 
            <!-- /.box-footer add button next/previus
                
                
                
                
                 --> 
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