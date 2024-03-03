@extends('admin.layout.appadmin')
@section('content')
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Add Brand
      </h1>
              </section>
              <!-- Main content -->
    <section class="content">
      <!-- Info boxes -->

      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <div class="col-md-12">
          <!-- TABLE: LATEST ORDERS -->
          <div class="box box-info">
            <div class="box-header with-border">
            
             
             
             <div class="row">
             <div class="productbox">
    <div class=" col-md-5">
        <div class="form-login">
            <form method="post" action = "{{url('/')}}/admin/home/add/brand" class="login-form" enctype="multipart/form-data" required="required"/>
              {{ csrf_field() }}
              @if($errors->any())
              <div class="alert alert-danger">
  <strong>Danger!</strong> {{$errors->first()}}
</div>
@endif
        <label for="text">Brand Name</label>
        <input type="text" name ="brandname"  class="form-control input-sm chat-input" placeholder="Brand Name" required="required" />
<br>    
<label for="text">Image</label>
<input type="file" name="file" onchange="readURL(this);" />    
        <span class="group-btn">     
            <button class="btn btn-default btn-md" name="submit" type="submit">
              Create
             </button>
        </span>
      </form>
        </div>
    
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