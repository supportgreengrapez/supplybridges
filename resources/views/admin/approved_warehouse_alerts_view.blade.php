@extends('admin.layout.appadmin')
@section('content')
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Approved PO(s)
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
            
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                        <tr>
                            
                          <th>Product Name</th>
                            <th>Product Description</th>
                     <th>SKU</th>
                  <th>Quantity on Hand</th>
                          <th>Quantity to be Purchased</th>
                        
                             <th>Approved Quantity</th>
                                <th>Purchase Rate</th>
              
                               <th>Amount</th>
                            <th>Supplier</th>
                            <th>Payment Terms</th>
                       
     
                          <th>Created at</th>
                        </tr>
                      </thead>
                      <tbody>
                 
          
          
      
                      @if($result>0)
                                @foreach($result as $results)

                         @php
                         $value = $results->sku;
                           $result1 = DB::select( DB::raw("SELECT * FROM product WHERE name = :value"), array(
   'value' => $value,
 ));
                           
                         @endphp
                        <tr>
                          <td>{{$results->sku}}</td>
                 
                  <td>{{$result1[0]->description}} des</td>
                    <td>{{$result1[0]->sku}} </td>
                     <td>{{$result1[0]->available_quantity}}</td>
                  
                          <td>{{$results->order_quantity}}</td>
                        
                                  <td>{{$results->approved_quantity}}</td>
                                         <td>{{$results->price}}</td>
                          <td>{{$results->price * $results->approved_quantity }}</td>
                                <td>{{$results->supplier}}</td>
                              <td>{{$results->terms}}</td>
                          <td>{{$results->created_at}}</td>
                   

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