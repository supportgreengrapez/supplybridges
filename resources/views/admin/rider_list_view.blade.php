@extends('admin.layout.appadmin')
@section('content')
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
           Riders > View Riders
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
                <!-- /.box-header -->
                <div class="box-body">
          
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <th>Rider_ID</th>
                          <th> Name</th>
                          <th>Email</th>
                          <th>Phone No</th>
                          <th>Address</th>
                          <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                            @if(count($result)>0)
                            @foreach($result as $results)
                        <tr>
                          <td>{{$results->pk_id}}</td>
                          <td>{{$results->fname}} {{$results->lname}}</td>
                          <td>{{$results->username}}</td>
						  <td>{{$results->phone}}</td>
                        <td>{{$results->address}}</td>
						  <td><a href="#">View</a></td>
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
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
		
     @endsection