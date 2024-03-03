@extends('admin.layout.appadmin')
@section('content') 
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1> Decline Procurement POs </h1>
</section>

<!-- Main content -->

<section class="content">
  <form method="post" action = "{{url('/')}}/admin/home/create/accountant/pos" class="login-form" enctype="multipart/form-data">
  {{ csrf_field() }} 
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
                  <th>Approved Quantity</th>
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
                <input name="order_id[]" value="{{$results->order_id}}" type="hidden">
                <td>{{$results->product_name}}</td>
                <input name="product_name[]" value="{{$results->product_name}}" type="hidden">
                <td>{{$results->description}}</td>
                <td>{{$results->sku}}</td>
                <td>{{$results->available_quantity}}</td>
                <td>{{$results->purchase_quantity}}</td>
                <input name="purchase_q[]" value="{{$results->purchase_quantity}}" type="hidden">
                <td>{{$results->purchase_price}}</td>
                <input name="price[]" value="{{$results->purchase_price}}" type="hidden">
                <td>{{$results->purchase_quantity * $results->purchase_price }}</td>
                <td>supplier</td>
                <td>Payment Terms</td>
                <td><input type="text" id="Quantity" name="approved_quantity[]" class="form-control input-sm chat-input" placeholder="0"   /></td>
                <td><div class="checkbox">
                    <label>{{$count}}
                      <input type="checkbox" name="checkbox[]" value="{{$count}}">
                    </label>
                  </div></td>
              </tr>
              @php
              $count++;
              @endphp
              @endforeach
              @endif
                </tbody>
              
            </table>
            <!-- /.table-responsive --> 
          </div>
          <!-- /.box-body --> 
          <!-- /.box-footer --> 
        </div>
      </div>
      <!-- /.box --> 
    </div>
    <!-- /.col --> 
  </div>
  <!-- /.row -->
  <button type="submit" class="btn btn-default pull-right">Create Pos</button>
  <button type="button" class="btn btn-default" data-toggle="modal" data-target="#basicExampleModal">Decline</button>
  <div class="modal fade" id="basicExampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"aria-hidden="true">
  <div class="modal-dialog" role="document">
  <div class="modal-content">
  <div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">Create Pos</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
  </div>
  <div class="modal-body">
  <!--<label><input type="checkbox" name="checkbox[]" value=""></label>-->
  <form>
    <div class="col-lg-12">
      <div class="form-group">
        <div class="col-lg-12">
          <label for="email">Reason</label>
        </div>
        <div class="col-lg-12">
          <textarea class="form-control" rows="12" name="reason"></textarea>
        </div>
      </div>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>
  </form>
  </div>
  </div>
  </div>
  </div>
  </form>
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper --> 

@endsection