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
          <h1>
          Active Orders
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
                                        <option value="1">In Progress</option>
                                        <option value="0">Shipped</option>
                                        <option value="2">Canceled</option>
                                        <option value="3">Returned</option>
                                        <option value="4">Delivered</option>
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
                          <thP>PO-ID</th>
                          <th>Product Count</th>
                       
                          <th>Status</th>
                          <th> Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        @if(count($result)>0)
                        @foreach($result as $results)
                        <tr>
                          <td>{{$results->pk_id}}</td>
                 
                          <td><div class="sparkbar" data-color="#00a65a" data-height="20">PKR {{$results->amount}}</div></td>
                          <td>{{$results->placed_at}}</td>
                          @if($results->status == 0)
                          <td><span id="{{$results->pk_id}}" onclick="getId(this.id)" class="label label-primary" data-toggle="modal" data-target="#myModal">Shipped</span></td>
                          @else
                          <td><span id="{{$results->pk_id}}" onclick="getId(this.id)" class="label label-primary" data-toggle="modal" data-target="#myModal">In progress</span></td>
                        @endif
                          <td><a href="{{url('/')}}/admin/home/view/active/order/view/specific/order/{{$results->pk_id}}">View</a></td>
                          
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