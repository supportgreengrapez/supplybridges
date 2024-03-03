@extends('admin.layout.appadmin')
@section('content')
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Add New Product
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
                    <form method="post" action = "{{url('/')}}/admin/home/add/product" class="login-form" enctype="multipart/form-data">
                      {{ csrf_field() }}
                       @if($errors->any())
              <div class="alert alert-danger">
  <strong>Danger!</strong> {{$errors->first()}}
</div>
@endif
                 <div class="productbox">
            <div class=" col-md-6">
            <div class="form-login">
    
            <label for="text">SKU</label>
            <input type="text" id="product type" name="sku" class="form-control input-sm chat-input" placeholder="SKU" />
            
              <label for="text">Title</label>
            <input type="text" id=" Title" name="title" class="form-control input-sm chat-input" placeholder="Title" required  style="text-transform: none;"/>
           
            
            <label for="text">Name</label>
            <input type="text" id=" Name" name="name" class="form-control input-sm chat-input" placeholder="Name"  />
           
           
        <div class="input_field_wrap">

    <div class="col-lg-6 lpadding"><label for="text">QTY</label><input type="number" step="any" name="mytextt[]" class="form-control"placeholder="QTY"  value="1" min="1" max="1" required></div><div class="col-lg-6"><label for="text">Price</label><input type="number" name="mytextt[]" step="any" class="form-control" placeholder="Price" required min="1" ></div><br>
    <br>
      <button class="add_fields_button btn btn-default btn-md">Add More Fields</button>  
</div>

            
            
       

                   <label for="text">Category</label>
                
         			<select class="form-control" name="mainCategory" id="mainCategory"  >
         				        <option value="" disable="true" selected="true" >---Select Category---</option>
                    @if($result2>0)
                    @foreach($result2 as $results)
                            <option value="{{urlencode($results->main_category)}}">{{$results->main_category}}</option>
                            @endforeach
                            @endif
                        </select>
                        
        
              <label for="text">Sub Category</label>
      
           <select class="form-control" name="SubCategory" id="SubCategory">
                      <option value="" disable="true" selected="true" >---Select Sub Category---</option>
             
                   </select>
                   
    
      
              
  						           <label for="text">Product Type</label>
                      
                   <select class="form-control" name="ProductType"  id="ProductType">
                    <option value="" disable="true" selected="true" >---Select Product Type---</option>
                    
                              </select>
                                                 
            
                              <label for="text">Brand Name</label>
                      
                              <select class="form-control" name="brandName">
                                      <option value=""> </option>
                                 @if($result1>0)
                                 @foreach($result1 as $results)
                                 
                                         <option value="{{$results->brand_name}}">{{$results->brand_name}}</option>
                                         @endforeach
                         @endif
                                     </select>
                                     
                                     
      <label for="comment">Description</label>
      <textarea name="description" rows="15" class="form-control"></textarea>
    
            </div>
        
        </div>
        <div class=" col-md-6">
            <div class="form-login">
            <label for="text">Available Quantity</label>
            <input type="text" id="Price" name="available" class="form-control input-sm chat-input" placeholder="Available Quantity"  />
            
            <label for="text">Alert quantity</label>
            <input type="text" id="Price" name="alert" class="form-control input-sm chat-input" placeholder="Alert Quantity" />
            
            <label for="text">Minimum Order</label>
            <input type="text" name="min" class="form-control input-sm chat-input" placeholder="Minimum Order"  />
               
          <!--                            <label for="text">Image</label>-->
          <!--<input type="file" name="file" onchange="readURL(this);"  />-->
          <!--<input type="file" name="images2" onchange="readURL(this);"  />-->
          <!--<input type="file" name="images3" onchange="readURL(this);"   />-->
          
          
          <label for="text">Product Image</label>
                                      
                                      <div class="form-group">
<input type='file' name="file" class="form-control" onchange="readURL(this);"/>
<img id="blah" src="{{url('/')}}/images/demo.png" alt="your image"style="width:350px; height:300px;" />
</div>

<div class="form-group">
<input type='file' name="images2" class="form-control" onchange="preview_image(this);"/>
<img id="blah2" src="{{url('/')}}/images/demo.png" alt="your image" style="width:350px; height:300px;"/>
</div>
<div class="form-group">
<input type='file' name="images3" class="form-control" onchange="preview_img(this);"/>
<img id="blah3" src="{{url('/')}}/images/demo.png" alt="your image" style="width:350px; height:300px;"/>
</div>
     
            <div class="col-md-8 col-sm-8 col-xs-12">
             <form>
    
  </form>
            </div>
            <br>
            
            <span class="group-btn">     
                <button class="btn btn-default btn-md" name="submit" type="submit">
                    Add
                   </button>
            </span>
            </div>
        
        </div>
    </div>
    </form>
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