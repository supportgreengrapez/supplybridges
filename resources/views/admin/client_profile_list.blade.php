@extends('admin.layout.appadmin')
@section('content') 
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper"> 
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1> Client View </h1>
  </section>
  
  <!-- Main content -->
  <section class="content"> 
    
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
                    <th>ID</th>
                    <th>Customer Name</th>
                    <th> Email</th>
                    <th> Actions</th>
                  </tr>
                </thead>
                <tbody>
                
                @if(count($result)>0)
                @foreach($result as $results)
                <tr>
                  <td>{{$results->pk_id}}</td>
                  <td>{{$results->fname}} {{$results->lname}}</td>
                  <td>{{$results->username}}</td>
                  <td><a href="{{url('/')}}/admin/client/view/detail/{{$results->pk_id}}">View</a></td>
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