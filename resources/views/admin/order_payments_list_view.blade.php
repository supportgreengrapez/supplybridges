@extends('admin.layout.appadmin')
@section('content') 

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper"> 
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1> Orders Payments </h1>
  </section>
  
  <!-- Main content -->
  <section class="content">
    <form method="post" action = "{{url('/')}}/admin/view/order/payment" class="login-form" enctype="multipart/form-data">
      {{ csrf_field() }}
      
      @if($errors->any())
      <div class="alert alert-danger"> <strong>Danger!</strong> {{$errors->first()}} </div>
      @endif 
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
                <table id="example5" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>Order ID</th>
                      <th>Customer Name</th>
                      <th> Date and Time</th>
                      <th>Amount</th>
                      <th>Pending Amount</th>
                      <th>Paid Amount</th>
                      <th>Partial Payment</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                  
                  @php
                  
                  $count=0;
                  
                  @endphp
                  @if($result>0)
                  @foreach($result as $results)
                  <tr>
                    <td><a href="{{url('/')}}/admin/home/view/complete/order/view/specific/order/{{$results->pk_id}}">{{$results->pk_id}}</a></td>
                    <input name="pk_id[]" value="{{$results->pk_id}}" type="hidden">
                    <td>{{$results->fname}} {{$results->lname}}</td>
                    <td>{{$results->placed_at}}</td>
                    <td><div class="sparkbar" data-color="#f56954" data-height="20">PKR {{number_format($results->amount)}}</div></td>
                    <input name="amount[]" value="{{$results->amount}}" type="hidden">
                    <td><div class="sparkbar" data-color="#f56954" data-height="20">PKR {{number_format($results->pending_amount)}}</div></td>
                    <input name="pending_amount[]" value="{{$results->pending_amount}}" type="hidden">
                    <td><div class="sparkbar" data-color="#f56954" data-height="20">PKR {{number_format($results->amount - $results->pending_amount)}}</div></td>
                    <td><input type="text" id="Quantity" name="partial_payments[]" class="form-control input-sm chat-input" placeholder="0"   /></td>
                    <td><div class="checkbox">
                        <label>
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
              
            </div>
          </div>
          <!-- /.box --> 
        </div>
        <!-- /.col --> 
      </div>
      <!-- /.row --> 
      
      <span class="group-btn">
      <button class="btn btn-default btn-md" name="submit" type="submit"> Add </button>
      </span>
    </form>
  </section>
  <!-- /.content --> 
</div>
<!-- /.content-wrapper --> 

@endsection