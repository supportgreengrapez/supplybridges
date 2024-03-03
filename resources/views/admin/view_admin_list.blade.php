@extends('admin.layout.appadmin')
@section('content')
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Dashboard
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- Main row -->
          <div class="row">
            <!-- Left col -->
            <div class="col-md-12">
              <!-- TABLE: LATEST ORDERS -->
              <div class="box box-warning table-responsive">
                <div class="box-header with-border">
                  <h3 class="box-title">Admins</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table no-margin">
                      <thead>
                        <tr>
                          <th>Name</th>
                          <th>Permisions</th>
                          <th>More Options</th>
                        </tr>
                      </thead>


                      <tbody>

                          @if($result>0)
                          @foreach($result as $results)
                          <tr>
                         
                            <td>{{$results->fname}} {{$results->lname}}</td>
                            <td>
                          @if($results->enquiry_management==1)
                          <span class="label label-warning">Enquiry</span>
                            @endif
                          @if($results->admin_management==1)
                            <span class="label label-success">Admin</span>
                            @endif
                            @if($results->livechat_management==1)
                          <span class="label label-primary">Live Chat</span>
                          @endif
                          @if($results->pk_id!=1)
                        </td>
                          <td><a href="{{URL('/')}}/admin/home/view/admin/{{$results->pk_id}}">View</a></td>
                        </tr>
                        @endif
                          @endforeach
                          @endif
                      

                        
                      </tbody>
                    </table><!-- /.table-responsive -->
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

      @endsection