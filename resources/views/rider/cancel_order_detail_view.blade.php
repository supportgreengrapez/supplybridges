@extends('rider.layout.apprider')
@section('content')

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Cancel Order
          </h1>
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
                <div class="box-header with-border">
                
                 
                 
                 <div class="row">
                 <div class="productbox">
        <div class=" col-md-6">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="row">
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                    <div itemscope="">
                                        <h2> <span itemprop="name">Order</span></h2>
                                        <p itemprop="email">Order ID</p>
                                        <p itemprop="email"> Customer Name</p>
                                        <p itemprop="email"> Price</p>
                                        <p>Payment Method</p>
                                        <p>Shipment Address</p>
                                        <p>Status</p>
                                        <p>Phone NO</p>
                                        
                                    </div>
                                </div>
                                @if($result>0)
                                @foreach($result as $results)
                                <div class="col-sm-6 col-md-6 col-lg-6">
                                    <div itemscope="">
                                    	<h2> <span>Detail</span></h2>
                                    <p>{{$results->pk_id}}</p>
                                        <p>{{$results->fname}} {{$results->lname}}</p>
                                        <p>PKR {{number_format($results->amount)}}</p>
                                        <p>Cash on Delivery</p>
                                        <p>{{$results->address}}</p>

                                        <p>Cancel</p>
                                        
                               			<p>{{$results->phone}}</p>
                                        
                                    </div>
                                </div>
                                
                                @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <table id="example1" class="table no-margin">
                <thead>
                  <tr>
                    <th>SKU</th>
                    <th>Product Name</th>
                    <th>price</th>
                    <th> Size</th>
                    <th>Quantity</th>
                    
                  </tr>
                </thead>
                <tbody>
             
                        @if(count($result1)>0)
                        @foreach($result1 as $results)
                        <tr>
                          <td>{{$results->sku}}</td>
                       
                          <td>{{$results->product_name}}</td>

                          <td>{{number_format($results->price)}}</td>
                          <td>{{$results->size}}</td>
                          <td>{{$results->quantity}}</td>
                      
                        </tr>
                        @endforeach
                        @endif
           
        
                </tbody>
              </table>
       
    </div>
    </div>
                 
                 
                 
                 
                 
                 
                </div><!-- /.box-header -->
                
                <!-- /.box-footer -->
                <!-- /.box-footer add button next/previus
                
                
                
                
                 -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->

        <!-- Main content -->
      </div><!-- /.content-wrapper -->

     @endsection