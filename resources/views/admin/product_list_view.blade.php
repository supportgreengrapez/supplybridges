@extends('admin.layout.appadmin')
@section('content') 
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper"> 
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1> Product > Products List</h1>
  </section>
  
  <!-- Main content -->
  <section class="content"> 
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
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>SKU</th>
                    <th>Rate</th>
                    <th>Category</th>
                    <th> Sub Category</th>
                    <th>Is Active?</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                
                @if($result>0)
                @foreach($result as $results)
                <tr>
                  <td>{{$results->name}}</td>
                  <td>{{$results->sku}}</td>
                  <td>PKR {{$results->price}} </td>
                  <td>{{$results->category}}</td>
                  <td>{{$results->sub_category}}</td>
                  <td><div class="switch">
                      <input @if($results->
                      status==1) checked @endif  onchange="updateStatus(this.id)" id="cmn-toggle-{{$results->pk_id}}" class="cmn-toggle cmn-toggle-round-flat" type="checkbox">
                      <label for="cmn-toggle-{{$results->pk_id}}"></label>
                    </div></td>
                  <td><a href="{{url('/')}}/admin/home/edit/product/{{$results->pk_id}}">Edit</a><a href="{{url('/')}}/admin/home/view/product/{{$results->pk_id}}" style="margin-left:10px;">View</a><a href="{{url('/')}}/admin/home/delete/product/{{$results->pk_id}}" style="margin-left:10px;">Delete</a></td>
                </tr>
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
  </section>
  <!-- /.content --> 
  
</div>
<!-- /.content-wrapper --> 
<script>
    function updateStatus(id)
    {
      CheckBox = id;
      id = id.split("-");
      id = id[2];
      cstatus = document.getElementById(CheckBox).checked;
      status= 0;
    
    if(cstatus)
      {
        status = 1;
      }
      else
      status=0;
      
      var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
               alert("status updated");
            }
        };
        xmlhttp.open("GET", "{{URL('/')}}/admin/home/view/product/status/update/"+id+"/"+status, true);
        xmlhttp.send();
    
    }
    </script>
@endsection 
