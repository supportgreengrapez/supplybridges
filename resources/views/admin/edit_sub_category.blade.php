@extends('admin.layout.appadmin')
@section('content')
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Edit Sub categoery
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
        <div class=" col-md-6">
            <div class="form-login">
                @if($result1>0)
                @foreach($result1 as $results)
                    <form method="post" action = "{{url('/')}}/admin/home/edit/sub/category/{{$results->SKU}}" class="login-form">
                        {{ csrf_field() }}
                         @if($errors->any())
              <div class="alert alert-danger">
  <strong>Danger!</strong> {{$errors->first()}}
</div>
@endif
            <label for="text">Main Categoery Name</label>
            <select class="form-control" name="mainCategory">
                @if($result>0)
                @foreach($result as $results)
                       <option value="{{$results->main_category}}">{{$results->main_category}}</option>
                       @endforeach
       @endif
                   </select> <br>
            <label for="text">Sub Categoery Name</label>
            @if($result1>0)
            @foreach($result1 as $results)
            <input type="text" id="Main category Name" name="subCategory" class="form-control input-sm chat-input"  value="{{$results->sub_category}}" placeholder="Sub Categoery Name" required="required" />
            @endforeach
            @endif
            <span class="group-btn">     
                    <button class="btn btn-default btn-md" name="submit" type="submit">
                            save <i class="fa fa-sign-in"></i>
                           </button> 
            </span>
        </form>
        @endforeach
        @endif <br>
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
