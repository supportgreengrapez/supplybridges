@extends('admin.layout.appadmin')
@section('content')

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
               @if($result>0)
                                @foreach($result as $results)
            <span style="margin-top:5px;float:left"> Order ID {{$results->pk_id}} </span> &nbsp;  
           <span class="label label-danger"> Canceled</span>
                                       
            @endforeach
                                @endif
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
                                        <p itemprop="email"> <b>Customer Name</b></p>
                                        <p><b>Contact #</b></p>
                                        <p><b>Shipping Address</b></p>
                                        
                                        
                                    </div>
                                </div>
                                @if($result>0)
                                @foreach($result as $results)
                                <div class="col-sm-4 col-md-4 col-lg-4">
                                    <div itemscope="">
                                        <p>{{$results->fname}} {{$results->lname}}</p>
                                        <p>{{$results->address}}</p>
                                        
                               			<p>{{$results->phone}}</p>
                                        
                                    </div>
                                </div>
                                
                                @endforeach
                                @endif
                                
                                <div class="col-sm-2 col-md-2 col-lg-2">
                                    <div itemscope="">
                                        <p itemprop="email"> <b>Cash to be Collected</b></p>
                                    </div>
                                </div>
                                
                                @if($result>0)
                                @foreach($result as $results)
                                <div class="col-sm-4 col-md-4 col-lg-4">
                                    <div itemscope="">
                                        <p>PKR {{$results->amount}}</p>
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
 <div class=" col-md-12">
        <table id="example1" class="table no-margin">
                <thead>
                  <tr>
                    <th>Product Name</th>
                    <th>SKU</th>
                    <th>Quantity</th>
                    <th>Rate</th>
                    
                  </tr>
                </thead>
                <tbody>
             
                        @if(count($result1)>0)
                        @foreach($result1 as $results)
                        <tr>
                       
                          <td>{{$results->product_name}}</td>
                          <td>{{$results->sku}}</td>

                          <td>{{$results->quantity}}</td>
                          <td>{{$results->price}}</td>
                      
                        </tr>
                        @endforeach
                        @endif
           
        
                </tbody>
              </table>
       </div>
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