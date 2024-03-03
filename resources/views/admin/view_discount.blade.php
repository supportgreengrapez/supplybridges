

@extends('admin.layout.appadmin')
@section('content')
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            View Discount 
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
                          <th>SKU</th>
                          <th>Start Date</th>
                          <th>End Date</th>
                      
                          <th>Discount Percentage </th>
                          <th>More Options </th>
                          
                        </tr>
                      </thead>
                      <tbody>
                          @if(count($result)>0)
                          @foreach($result as $results)
                        <tr>
                          <td>{{$results->sku}}</td>
                          <td>{{$results->start_date}}</td>
                          <td>{{$results->end_date}}</td>
                   
                            <td>{{$results->percentage}}%</td>
                          <td><a href="{{url('/')}}/admin/home/edit/discount/{{$results->pk_id}}">Edit</a>/<a href="{{url('/')}}/admin/home/delete/discount/{{$results->pk_id}}">Delete</a></td>

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