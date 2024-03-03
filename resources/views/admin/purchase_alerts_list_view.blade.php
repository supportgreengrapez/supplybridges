@extends('admin.layout.appadmin')
@section('content')
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Alerts
          </h1>
                  </section>

        <!-- Main content -->
        
        <section class="content">
        <form method="post" action = "{{url('/')}}/admin/home/create/pos/alerts" class="login-form" enctype="multipart/form-data">
                      {{ csrf_field() }}
          <!-- Info boxes -->
          <div class="row">
          
			
            <!-- fix for small devices only -->
            <div class="clearfix visible-sm-block"></div>

           
          
          </div><!-- /.row -->

          <!-- Main row -->
          <div class="row">
            <!-- Left col -->
            <div class="col-md-12">
              <!-- TABLE: LATEST ORDERS -->
              <div class="box box-info">
                <div class="box-header with-border table-responsive" style="padding:10px 0px;">
                <!-- /.box-header -->
                <div class="box-body">
            
                    <table id="example2" class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <th>Product Name</th>
                          
                          <th>Product Description</th>
                          <th>SKU</th>
                   
                          <th>Rate</th>
                          <th>Quantity in Orders</th>
                          <th>Available Quantity</th>
                          <th>Quantity to be Purchased</th>
                          <th>Purchase Rate</th>
                          <th>Supplier</th>
                          <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        @php

                        $count=0;
          
                        
          
                        @endphp
          
          
      
                      @if($result>0)
                                @foreach($result as $results)

                          
                        <tr>
                            <td>{{$results->product_name}}</td>
                            <td>Description</td>
                          <td>{{$results->sku}}</td>
                          <input name="sku[]" value="{{$results->sku}}" type="hidden">
                          
                      
					
                          <td><div class="sparkbar" data-color="#00a65a" data-height="20">PKR {{$results->price}}</div></td>
                      
                          <td>{{$results->quantity}}</td>
                      
						  <td>{{$results->available_quantity}}</td>
          
                          <td> <input type="text" id="Quantity" name="quantity[]" class="form-control input-sm chat-input" placeholder="0"   />
            </td>

            <td> <input type="text" id="Quantity" name="purchase_price[]" class="form-control input-sm chat-input" placeholder="0"   />
            </td>
            <td> Supplier </td>
                          <td>

            
						  <div class="checkbox">

              
              <label>{{$count}}<input type="checkbox" name="checkbox[]" value="{{$count}}"></label>
            
							</div>
						  </td>

                        </tr>
                        @php
                        $count++;
                        @endphp
                        @endforeach
                                @endif
               
                
                 
                      </tbody>
                    </table><!-- /.table-responsive -->
                </div><!-- /.box-body -->
                <!-- /.box-footer -->
               </div>
              </div><!-- /.box -->
            </div><!-- /.col -->
            <div class="col-md-12">
            <button type="submit" class="btn btn-default pull-right" style="    background-color: #3b3383!important;
    color: #FFF!important;">Send PO(s) for Approval</button>
            </div>
          </div><!-- /.row -->
		  
      </form>
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
		
    @endsection