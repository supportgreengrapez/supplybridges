@extends('admin.layout.appadmin')
@section('content')
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Procurement > Pos Awaiting Approvel
          </h1>
                  </section>

        <!-- Main content -->
        
        <section class="content">
        <form method="post" action = "{{url('/')}}/admin/home/create/accountant/pos" class="login-form" enctype="multipart/form-data">
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
                            <th>Product Description</th>
                     <th>SKU</th>
                  <th>Quantity on Hand</th>
                          <th>Quantity to be Purchased</th>
                          <th>Purchase Rate</th>
                          <th>Amount</th>
                            <th>Supplier</th>
                            <th>Payment Terms</th>
                          <th>Status</th>
     
                  
                        </tr>
                      </thead>
                      <tbody>
           
          
          
      
                      @if($result>0)
                                @foreach($result as $results)

            
                        <tr>
                                    @php
$name = $results->sku;
               
      $result2 = DB::select("select* from product where name = '$name' ");
                        @endphp
                                  <input name="order_id[]" value="{{$results->order_id}}" type="hidden">
                            <td>{{$result2[0]->name}}</td>
                               <input name="product_name[]" value="{{$result2[0]->name}}" type="hidden">
                            <td>{{$result2[0]->description}}</td>
                          <td>{{$result2[0]->sku}}</td>
                       
                    
                   
                       <td>{{$result2[0]->available_quantity}}</td>
                          <td>{{$results->purchase_quantity}}</td>
                            <input name="purchase_q[]" value="{{$results->purchase_quantity}}" type="hidden">
                          <td>{{number_format($results->purchase_price)}}</td>
                          <input name="price[]" value="{{$results->purchase_price}}" type="hidden">
                          <td>{{number_format($results->purchase_quantity * $results->purchase_price) }}</td>
                            <td>{{$results->supplier}}</td>
                            <td>{{$results->terms}}</td>
                       
                        <td>Waiting</td>

                        </tr>
                    
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
		
  </form>
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
		
    @endsection