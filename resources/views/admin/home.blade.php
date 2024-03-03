@extends('admin.layout.appadmin')
@section('content') 
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper"> 
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1> Dashboard </h1>
  </section>
  
  <!-- Main content -->
  <section class="content"> 
    <!-- Info boxes -->
    <div class="row">
      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box"> <span class="info-box-icon bg-red"><i class="ion ion-ios-people-outline"></i></span>
          <div class="info-box-content"> <span class="info-box-text">Member</span> <span class="info-box-number">{{$c}}</span> </div>
          <!-- /.info-box-content --> 
        </div>
        <!-- /.info-box --> 
      </div>
      <!-- /.col -->
      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box"> <span class="info-box-icon bg-aqua"><i class="ion ion-bag"></i></span>
          <div class="info-box-content"> <span class="info-box-text">Order</span> <span class="info-box-number">{{$o}}<small></small></span> </div>
          <!-- /.info-box-content --> 
        </div>
        <!-- /.info-box --> 
      </div>
      <!-- /.col --> 
      <!-- fix for small devices only -->
      <div class="clearfix visible-sm-block"></div>
      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box"> <span class="info-box-icon bg-green"><i class="ion ion-ios-cart-outline"></i></span>
          <div class="info-box-content"> <span class="info-box-text">Sales</span> <span class="info-box-number">{{$com}}</span> </div>
          <!-- /.info-box-content --> 
        </div>
        <!-- /.info-box --> 
      </div>
      <!-- /.col -->
      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box"> <span class="info-box-icon bg-yellow"><i class="ion ion-pie-graph"></i></span>
          <div class="info-box-content"> <span class="info-box-text">Product</span> <span class="info-box-number">{{$p}}</span> </div>
          <!-- /.info-box-content --> 
        </div>
        <!-- /.info-box --> 
      </div>
      <!-- /.col --> 
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
              <table id="example1" class="table no-margin">
                <thead>
                  <tr>
                    <th>O-ID</th>
                    <th>Customer Name</th>
                    <th>Rate</th>
                    <th> Date</th>
                    <th>Status</th>
                    <th>Rider</th>
                    <th> Actions</th>
                  </tr>
                </thead>
                <tbody>
                
                @if(count($result)>0)
                @foreach($result as $results)
                <tr>
                  <td>{{$results->pk_id}}</td>
                  <td>{{$results->fname}} {{$results->lname}}</td>
                  <td><div class="sparkbar" data-color="#00a65a" data-height="20">PKR {{number_format($results->amount)}}</div></td>
                  <td>{{$results->placed_at}}</td>
                  @if($results->status == 0)
                  <td><span class="label label-success">Shipped</span></td>
                  @endif
                  @if($results->status == 1)
                  <td><span class="label label-primary">In Progress</span></td>
                  @endif
                  <td>{{$results->rider}}</td>
                  <td><a href="{{url('/')}}/admin/home/view/active/order/view/specific/order/{{$results->pk_id}}">View</a></td>
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