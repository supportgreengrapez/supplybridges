@extends('admin.layout.appadmin')
@section('content')

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            View promo code
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
                <div class="box-body ">
                    <table id="example1" class="table no-margin">
                      <thead>
                        <tr>
                          <th>P-Code</th>
                          <th>Discount Type</th>
                          <th>Discount Amount</th>
                          <th>Start Date</th>
                          <th>End Date</th>
                          <th>Min Subtotal</th>
                          <th>Max Subtotal</th>
                          <th> Is Active?</th>
                          <th> Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                          @if(count($result)>0)
                          @foreach($result as $results)
                        <tr>
                          <td>{{$results->promo_code}}</td>
                          
                        
                          <td>{{$results->discount_type}}</td>
                      
                         
                        
                          
                              @if($results->discount_type=='percentage')
                          <td>{{$results->discount_amount}} %</td>
                              @endif 
                              
                                 @if($results->discount_type=='fixed')
                          <td>PKR {{$results->discount_amount}}</td>
                              @endif 
                          <td>{{$results->start_date}}</td>
                           <td>{{$results->end_date}}</td>
                           <td>PKR {{$results->min_total}}</td>
                           <td>PKR {{$results->max_total}}</td>
                           <td><div class="switch">
                                <input @if($results->status==1) checked @endif  onchange="updateStatus(this.id)" id="cmn-toggle-{{$results->pk_id}}" class="cmn-toggle cmn-toggle-round-flat" type="checkbox">
                                <label for="cmn-toggle-{{$results->pk_id}}"></label>
                                </div>
                          </td>
                          <td><a href="{{url('/')}}/admin/home/edit/promo/{{$results->pk_id}}">Edit</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="{{url('/')}}/admin/home/delete/promo/{{$results->pk_id}}">Delete</a></td>

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
                xmlhttp.open("GET", "{{URL('/')}}/admin/home/view/promo/status/update/"+id+"/"+status, true);
                xmlhttp.send();
            
            }

        </script>