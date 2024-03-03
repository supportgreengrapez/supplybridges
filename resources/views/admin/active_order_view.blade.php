@extends('admin.layout.appadmin') 
<script>
  var OrgID=-1;
    function getId(id)
    {
  
      
      OrgID = id;
      return true;
    }
    function getreal()
    {
      alert(OrgID);
      
     
    }
    
    
  
  </script> 
@section('content') 
 
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper"> 
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>Orders >  Active Orders </h1>
  </section>
  
  <!-- Main content -->
  <section class="content"> 
    <!-- Info boxes -->
    <div class="row"> 
      <!-- fix for small devices only -->
      <div class="clearfix visible-sm-block"></div>
    </div>
    <!-- /.row --> 
    
    <!-- Main row -->
    <div class="row"> 
      <!-- Left col -->
      <div class="col-md-12"> 
        <!-- TABLE: LATEST ORDERS -->
        <div class="box box-info">
          <div class="box-header with-border table-responsive">
            <div class="box-body">
              <div id="myModal" class="modal fade" role="dialog">
                <div class="modal-dialog"> 
                  
                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Status Change</h4>
                    </div>
                    <div class="modal-body">
                      <div class="form-group">
                        <label>Update Status</label>
                        <select id="status" name="status" class="form-control">
                          <option>Select status</option>
                          <!--<option value="1">In Progress</option>-->
                          <!--<option value="0">Shipped</option>-->
                          <!--<option value="2">Canceled</option>-->
                          <!--<option value="3">Return</option>-->
                          <option value="4">Delivered</option>
                            <option value="5">Partially Delivered</option>
                        </select>
                      </div>
                      <button id="b1" type="button" class="btn btn-submmit">Submit</button>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                  </div>
                </div>
              </div>
              <table id="example1" class="table no-margin">
                <thead>
                  <tr>
                    <th>Order ID</th>
                    <th>Customer Name</th>
                    <th>Date and Time</th>
                    <th>Amount</th>
                    <th>Status</th>
                    <th>Rider</th>
                  </tr>
                </thead>
                <tbody>
                
                @if(count($result)>0)
                @foreach($result as $results)
                <tr>
                  <td><a href="{{url('/')}}/admin/home/view/active/order/view/specific/order/{{$results->pk_id}}">{{$results->pk_id}}</a></td>
                  <td>{{$results->fname}} {{$results->lname}}</td>
                  <td>{{$results->placed_at}}</td>
                  <td><div class="sparkbar" data-color="#00a65a" data-height="20">PKR {{number_format($results->amount)}}</div></td>
                  @php
                  $q = 0;
                 $id = $results->pk_id;
                    $product = DB::select("select* from detail_table where order_id = '$id' ");
                    if(count($product)>0)
                foreach($product as $products)
                {
              
                $product_id = $products->product_id;
                   $quant = DB::select("select* from product where pk_id = '$product_id' ");
                   if($quant[0]->available_quantity < $products->quantity)
                   {
                    $q = 1;
                    break;
                   }
                }
                
                  $main_status = DB::select("select* from detail_table where order_id = '$id' and deliver_quantity < quantity  ");
                      if(count($main_status)>0)
             {
                    $q = 2;
                
                }
                
                      $main_status = DB::select("select* from detail_table where order_id = '$id' and deliver_quantity = quantity  ");
                      if(count($main_status)>0)
             {
                    $q = 3;
                
                }
    
                
                  @endphp
                  @if($q == 0)
              
                     <td><span id="{{$results->pk_id}}" onclick="getId(this.id)" class="label label-info" data-toggle="modal" data-target="#myModal">Ready to be Shipped</span></td>
                 @endif
                    @if($q == 1)
              
                     <td><span id="{{$results->pk_id}}" onclick="getId(this.id)" class="label label-danger" data-toggle="modal" data-target="#myModal">Pending Purchase</span></td>
                 @endif
                 
                    @if($q == 2)
              
                     <td><span id="{{$results->pk_id}}" onclick="getId(this.id)" class="label label-warning" data-toggle="modal" data-target="#myModal">Partially Shipped</span></td>
                 @endif
                 
                      @if($q == 3)
              
                     <td><span id="{{$results->pk_id}}" onclick="getId(this.id)" class="label label-success" data-toggle="modal" data-target="#myModal">Shipped</span></td>
                 @endif
                 
            
                  <td>{{$results->rider}}</td>
                </tr>
                @endforeach
                @endif
                  </tbody>
                
              </table>
              <!-- /.table-responsive --> 
            </div>
            <!-- /.box-body --> 
            
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
</div>
<!-- /.content-wrapper --> 

@endsection