@extends('admin.layout.appadmin')
@section('content')
     <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
              <h1>
                Edit Main Category
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
                    <div class="box-header with-border">
                              <div class="row">
                     <div class="productbox">
            <div class=" col-md-6">
                <div class="form-login">
                        @if($result>0)
                        @foreach($result as $results)
                        <form method="post" action = "{{url('/')}}/admin/home/edit/main/category/{{$results->SKU}}" class="login-form">
                            {{ csrf_field() }}
                             @if($errors->any())
              <div class="alert alert-danger">
  <strong>Danger!</strong> {{$errors->first()}}
</div>
@endif
                <label for="text"> Edit Main Category</label>
                <input type="text" id="product type" name="mainCategory" class="form-control input-sm chat-input" value="{{$results->main_category}}" placeholder=" Add Main Category" required="required" />
                <br>
                <span class="group-btn"> 
                        <button class="btn btn-default btn-md" name="submit" type="submit">
                                save <i class="fa fa-sign-in"></i>
                               </button>    
                </span>
            </form>
            @endforeach
            @endif
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
          </div><!-- /.content-wrapper -->
          @endsection