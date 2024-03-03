

@extends('admin.layout.appadmin')
@section('content')

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Add Discount
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
            <form method="post" action = "{{url('/')}}/admin/home/add/discount" class="login-form">
              {{ csrf_field() }}
              @if($errors->any())
              <div class="alert alert-danger">
  <strong>Danger!</strong> {{$errors->first()}}
</div>
@endif
            <div class="form-login">
            <label for="text">SKU</label>
            <select class="form-control" id="product type" name="sku" required="required" >
                  @if(count($result)>0)
                        @foreach($result as $results )
                            <option value="{{$results->sku}}">{{$results->sku}}</option>
                               @endforeach
                        @endif
                        </select>
 
            <label for="text">Start Date</label>
            <input type="date" id="Price" name="start_date"  class="form-control input-sm chat-input" placeholder="Start Date" required="required" />
            
                    <label for="text">End Date</label>
            <input type="date" id="Category" name="end_date"  class="form-control input-sm chat-input" placeholder="End Date" required="required"  />
            
                       <label for="text">Discount in percentage %</label>
            <input type="text" id="Discount in Percentage" name="percentage" class="form-control input-sm chat-input" placeholder="Discount in percentage" required="required"  />
   
            
            <br>
            <span class="group-btn">     
                <button type="submit" class="btn btn-default btn-md">Add Discount</button>
            </span>
            </div>
        </form>
        
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