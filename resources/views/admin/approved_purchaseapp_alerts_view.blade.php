@extends('admin.layout.appadmin')
@section('content')
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
          Orders >  Approved PO(s)
          </h1>
                  </section>

        <!-- Main content -->
        
        <section class="content">
        <form method="post" action = "{{url('/')}}/admin/home/create/warehouse/approvals" class="login-form" enctype="multipart/form-data">
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
                <div class="box-header with-border table-responsive">
                <!-- /.box-header -->
                <div class="box-body">
            
                    <table id="example4" class="table table-bordered table-striped">
                      <thead>
                        <tr>
                         <th>Product Name</th>
                            <th>Description</th>
                          <th>SKU</th>
                             <th>Product Quantity</th>
                                <th>Supplier</th>
                                    <th>Created at</th>
                                        <th>Quantity to be Purchased</th>
                          <th>Quantity Approved</th>
                              <th>Quantity Remaining</th>
                                  <th>Quantity Received</th>
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
                                 @php
$name = $results->sku;
$id = $results->order_id;
                    $result1 = DB::select("select* from detail_table where pos = '1' and product_name = '$name' and order_id = '$id' ");
      $result2 = DB::select("select* from product where name = '$name' ");
                        @endphp
                        
                        
                            <input name="order_id[]" value="{{$results->order_id}}" type="hidden">
                               <input name="pk_id[]" value="{{$results->pk_id}}" type="hidden">
                     
                             <td>{{$results->sku}}</td>
                         
                    <input name="name[]" value="{{$results->sku}}" type="hidden">
                            <td>{{$result2[0]->description}}</td>
                        
                      
                              <td>{{$result2[0]->sku}}</td>
                 
                               <td>{{$result2[0]->available_quantity}}</td>
                      
			        <td>{{$results->supplier}}</td>
 
                    
                         <td>{{$results->created_at}}</td>
                 
        
               <td>{{$results->order_quantity}}</td>
           
                
                          <td>{{$results->approved_quantity}}</td>
                 
                    <td>{{$results->order_quantity - $results->approved_quantity}}</td> 
               
                    
                       <td> <input type="text" id="Quantity" name="quantity_receved[]" class="form-control input-sm chat-input" placeholder="0"   /> </td>
                             <td>

            
						  <div class="checkbox">

              
              <label><input type="checkbox" name="checkbox[]" value="{{$count}}"></label>
            
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
          </div><!-- /.row -->
          
          	  <button type="submit" class="btn btn-default pull-right">Save</button>
	
      </form>
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
		
    @endsection