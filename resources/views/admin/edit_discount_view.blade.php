

@extends('admin.layout.appadmin')
@section('content')

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Edit Discount
          </h1>
                  </section>
                  <!-- Main content -->
        <section class="content">
          <!-- Info boxes -->

          <!-- Main row -->
          <div class="row">
            <!-- Left col -->
            <div class="col-md-6">
              <!-- TABLE: LATEST ORDERS -->
              <div class="box box-info">
                <div class="box-header with-border">
                
                 
                 
                 <div class="row">
                 <div class="productbox">
        <div class=" col-md-12">
                @if(count($result)>0)
                @foreach($result as $results)
            <form method="post" action = "{{url('/')}}/admin/home/edit/discount/{{$results->pk_id}}" class="login-form">
              {{ csrf_field() }}
               @if($errors->any())
              <div class="alert alert-danger">
  <strong>Danger!</strong> {{$errors->first()}}
</div>
@endif
            <div class="form-login">
            <label for="text">SKU</label>
            <input type="text" id="product type" name="sku" value= "{{$results->sku}}" class="form-control input-sm chat-input" placeholder="SKU" required="required"  />
            
 
            <label for="text">Start Date</label>
            <input type="date" id="Price" name="start_date" value= "{{$results->start_date}}" class="form-control input-sm chat-input" placeholder="Start Date" required="required"  />
            
                    <label for="text">End Date</label>
            <input type="date" id="Category" name="end_date" value= "{{$results->end_date}}" class="form-control input-sm chat-input" placeholder="End Date"  required="required" />
            
                       <label for="text">Discount in percentage</label>
            <input type="text" id="Discount in Percentage" name="percentage" value= "{{$results->percentage}}" class="form-control input-sm chat-input" placeholder="Discount in percentage" required="required" />
   
            
            <br>
            <span class="group-btn">     
                <button type="submit" class="btn btn-default btn-md">Edit Discount</button>
            </span>
            </div>
        </form>
        @endforeach
        @endif
        </div>
        
    </div>
    </div>
                 
                 
                 
                 
                 
                 
                </div><!-- /.box-header -->
                
                <!-- /.box-footer -->
                <!-- /.box-footer add button next/previus
                
                
                
                
                 -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->

        <!-- Main content -->
      </div><!-- /.content-wrapper -->
@endsection