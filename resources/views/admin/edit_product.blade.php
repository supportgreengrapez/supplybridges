@extends('admin.layout.appadmin')
@section('content')
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Edit Product
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
                        @if($result>0)
                       
                    <form method="post" action = "{{url('/')}}/admin/home/edit/product/{{$result[0]->pk_id}}" class="login-form" enctype="multipart/form-data">
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
            <input type="text" id="product type" name="sku" value="{{$result[0]->sku}}" class="form-control input-sm chat-input" placeholder="SKU" required="required"  />
            
                 <label for="text">Title</label>
            <input type="text" id=" Title" name="title"  value="{{$result[0]->title}}" class="form-control input-sm chat-input" placeholder="Title" required />
           
            
            <label for="text">Name</label>
            <input type="text" id=" Name" name="name" value="{{$result[0]->name}}" class="form-control input-sm chat-input" placeholder="Name" required="required" />
           
           @php
           $id = $result[0]->QB_id;
            $price = DB::select("select* from pricing_detail where product_id = '$id' order by pk_id asc");
           @endphp
            <div class="input_field_wrap">
<div class="col-lg-6 lpadding">
    
    <label for="text">QTY</label>
</div>
<div class="col-lg-6">
    <label for="text">Price</label>
</div>
   @foreach($price as $prices)
    <div class="col-lg-6 lpadding">
     
        <input type="number" value="{{$prices->quantity}}" name="mytextt[]"  step="any" class="form-control"placeholder="QTY" required>
     
        </div>
        <div class="col-lg-6">
     
        <input type="number" value="{{$prices->price}}" name="mytextt[]" step="any" class="form-control" placeholder="Price" required>
   
        </div>
        
        <a href="#" class="remove_field">Remove</a>
        
        <br>
             @endforeach
        <button class="add_fields_button btn btn-default btn-md">Add More Fields</button>
</div>

 

                   <label for="text">Category</label>
                
         					<select class="form-control" name="mainCategory" id="mainCategory" >
                    @if($result1>0)
                    @foreach($result1 as $results)
                          <option value="{{urlencode($results->main_category)}}"  @if($result[0]->category==$results->main_category) selected @endif >{{$results->main_category}}</option>
                            @endforeach
                            @endif
                        </select>
                        
        
              <label for="text">Sub Category</label>
    
             <select class="form-control" name="SubCategory" id="SubCategory" >
            @if(count($result2)>0)
                    @foreach($result2 as $results)
                  
                                 <option value="{{$results->sub_category}}" @if($result[0]->sub_category == $results->sub_category) selected @endif >{{$results->sub_category}}</option>
                        @endforeach
                            @endif 
                   </select>
                   
    
      
              
  						           <label for="text">Product Type</label>
                      
                       <select class="form-control" name="ProductType" id="ProductType">
                   @if(count($result3)>0)
                    @foreach($result3 as $results)
                                  <option value="{{$results->product_type}}" @if($result[0]->product_type == $results->product_type) selected @endif  >{{$results->product_type}}</option>
                                   @endforeach
                            @endif 
                              </select>
                                                 
            
                              <label for="text">Brand Name</label>
                      
                              <select class="form-control" name="brandName">
                                 
                                         <option value=""> </option>
                                 @if($result4>0)
                                 @foreach($result4 as $results)
                                 
                                         <option value="{{$results->brand_name}}" @if($result[0]->brand_name == $results->brand_name) selected @endif >{{$results->brand_name}}</option>
                                         @endforeach
                         @endif
                                     </select>
                                     <label for="comment">Description</label>
      <textarea name="description" rows="15" class="form-control"> {{$result[0]->description}}</textarea>
      
            </div>
        
        </div>
        <div class=" col-md-6">
            <div class="form-login">
            
           <div class="switch">
           <label for="text">Inactive?</label>
                            <input id="cmn-toggle-4" name="status"  @if($result[0]->status == 1) checked @endif   class="cmn-toggle cmn-toggle-round-flat" type="checkbox">
                            <label for="cmn-toggle-4"></label>
                            </div>
            <br>

            <label for="text">Available Quantity</label>
            <input type="text" id="Price" value="{{$result[0]->available_quantity}}" name="available" class="form-control input-sm chat-input" placeholder="Available Quantity" required="required"  />
            
            <label for="text">Alert quantity</label>
            <input type="text" id="Price" name="alert" value="{{$result[0]->alert_quantity}}" class="form-control input-sm chat-input" placeholder="Alert Quantity" required="required"  />
            
            
               <label for="text">Minimum Order</label>
            <input type="text" value="{{$result[0]->min}}" name="min" class="form-control input-sm chat-input" placeholder="Minimum Order"  />
            
                                      <label for="text">Product Image</label>
                                      
          <!--                            <div id="text">-->
          <!--<div class="form-group">-->
          <!--  <input type="file" class="form-control" id="images" name="file" onchange="preview_images();"  value="{{url('/')}}/storage/images/{{$result[0]->thumbnail}}" style="border:none !important">-->
          <!--  <br>-->
          <!--  <div class="row" id="image_preview">-->
          <!--      <div class='col-md-3'><img class='img-responsive' src="{{url('/')}}/storage/images/{{$result[0]->thumbnail}}"></div>-->
          <!--  </div>-->
          <!--  <br>-->
          <!--</div>-->
          <!--</div>-->
          
          <!-- <div id="text">-->
          <!--<div class="form-group">-->
          <!--  <input type="file" class="form-control" id="images" name="images2" onchange="preview_images2();"  value="{{url('/')}}/storage/images/{{$result[0]->thumbnail2}}"  style="border:none !important">-->
          <!--  <br>-->
          <!--  <div class="row" id="image_preview2">-->
          <!--      <div class='col-md-3'><img class='img-responsive' src="{{url('/')}}/storage/images/{{$result[0]->thumbnail2}}"></div>-->
          <!--  </div>-->
          <!--  <br>-->
          <!--</div>-->
          <!--</div>-->
          
          <!-- <div id="text">-->
          <!--<div class="form-group">-->
          <!--  <input type="file" class="form-control" id="images" name="images3" onchange="preview_images3();"  value="{{url('/')}}/storage/images/{{$result[0]->thumbnail3}}"  style="border:none !important">-->
          <!--  <br>-->
          <!--  <div class="row" id="image_preview3">-->
          <!--      <div class='col-md-3'><img class='img-responsive' src="{{url('/')}}/storage/images/{{$result[0]->thumbnail3}}"></div>-->
          <!--  </div>-->
          <!--  <br>-->
          <!--</div>-->
          <!--</div>-->
     
     
     <div class="form-group">
<input type='file' name="file" class="form-control" value="{{url('/')}}/storage/images/{{$result[0]->thumbnail}}" onchange="readURL(this);"/>
<img id="blah" src="{{url('/')}}/storage/images/{{$result[0]->thumbnail}}" alt="your image"style="width:350px; height:300px;" />
</div>

<div class="form-group">
<input type='file' name="images2" class="form-control" value="{{url('/')}}/storage/images/{{$result[0]->thumbnail2}}" onchange="preview_image(this);"/>
<img id="blah2" src="{{url('/')}}/storage/images/{{$result[0]->thumbnail2}}" alt="your image" style="width:350px; height:300px;"/>
</div>
<div class="form-group">
<input type='file' name="images3" class="form-control" value="{{url('/')}}/storage/images/{{$result[0]->thumbnail3}}" onchange="preview_img(this);"/>
<img id="blah3" src="{{url('/')}}/storage/images/{{$result[0]->thumbnail3}}" alt="your image" style="width:350px; height:300px;"/>
</div>
     
            <div class="col-md-8 col-sm-8 col-xs-12">
             <form>
    <div class="form-group">
      
    </div>
  </form>
            </div>
            <br>
            
            <span class="group-btn">     
                <button class="btn btn-default btn-md" name="submit" type="submit">
                    save
                   </button>
            </span>
            </div>
        
        </div>
    </div>
    </form>
    
    @endif
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