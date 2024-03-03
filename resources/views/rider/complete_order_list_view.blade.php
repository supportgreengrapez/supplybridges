@extends('rider.layout.apprider')
@section('content')

     <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
       		Completed Orders
          </h1>
                  </section>

        <!-- Main content -->
        <section class="content">
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
                <div class="box-body">
                    <table id="example1" class="table no-margin">
                      <thead>
                        <tr>
                          <th>O_ID</th>
                          <th>Customer Name</th>
                          <th>price</th>
                          <th> Date</th>
                          <th>Status</th>
                          <th> Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                            @if($result>0)
                            @foreach($result as $results)
                        <tr>
                          <td>{{$results->pk_id}}</td>
                          <td>{{$results->fname}} {{$results->lname}}</td>
                          <td><div class="sparkbar" data-color="#f56954" data-height="20">PKR {{number_format($results->amount)}}</div></td>
                          
                           <td>{{$results->placed_at}}</td>
                           <td><span class="label label-success">Completed</span></td>
                          <td><a href="{{url('/')}}/rider/home/view/complete/order/view/specific/order/{{$results->pk_id}}">View</a></td>
                        </tr>
                 
                 
                        @endforeach
                        @endif
                   
                      </tbody>
                    </table><!-- /.table-responsive -->
                </div><!-- /.box-body -->
               
                </div><!-- /.box-header -->
                <!-- /.box-footer -->
                <!-- /.box-footer add button next/previus
                
                
                
                
                 -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

     @endsection