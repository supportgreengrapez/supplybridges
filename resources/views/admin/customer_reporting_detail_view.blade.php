@extends('admin.layout.appadmin')
@section('content')
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Reporting by Customers
      </h1>


              </section>

    <!-- Main content -->


    <h1>
        Total revenue {{$sum}}
      </h1>
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
                            <th>Order_id</th>
                      <th>Customer Name</th>
                      <th>User Name</th>
                      <th>Placed at</th>
                      <th>Status</th>
                      <th>Amount</th>
                    
                      <th> Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                        @if($result>0)
                        @foreach($result as $results )
                        <tr>   
                                <td>{{$results->pk_id}}</td>       
                          <td>{{$results->fname}} {{$results->lname}}</td>
                          <td>{{$results->username}}</td>
                          <td>{{$results->placed_at}}</td>

                          <td>Delivered</td>
                      

                          <td>PKR {{$results->amount}}</td>
                          <td><a href="{{URL('/')}}/admin/home/view/detail/reporting/by/specific/customer/{{$results->pk_id}}">View</a>
                            </td>
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