@extends('rider.layout.apprider')

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
          Payments
          </h1>
                  </section>

        <!-- Main content -->
        <section class="content">
               <form method="post" action = "{{url('/')}}/rider/home/cash/received" class="login-form" enctype="multipart/form-data">
                      {{ csrf_field() }}
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
                          <th>Amount</th>
                          <th> Date</th>
                          <th>Payment Received</th>
                          <th> Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                                  @php

                        $count=0;
          
                        
          
                        @endphp
          
                        @if(count($result)>0)
                        @foreach($result as $results)
                        <tr>
                          <td>{{$results->pk_id}}</td>
                                   <input name="order_id[]" value="{{$results->pk_id}}" type="hidden">
                       
                          <td>{{$results->fname}} {{$results->lname}}</td>
                 
                          <td><div class="sparkbar" data-color="#00a65a" data-height="20">PKR {{number_format($results->amount)}}</div></td>
                          <td>{{$results->placed_at}}</td>
                   
                        <td> <input type="text" id="Quantity" name="payment_received[]" class="form-control input-sm chat-input" placeholder="0"   /> </td>

         
                   
                               <td>

            
						  <div class="checkbox">

              
              <label>{{$count}}<input type="checkbox" name="checkbox[]" value="{{$count}}"></label>
            
							</div>
						  </td>
                          
                        </tr>
                               @php
                        $count++;
                        @endphp
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
      		  <button type="submit" class="btn btn-default pull-right">Submit</button>
          </form>
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

     @endsection