@extends('admin.layout.appadmin')
@section('content')

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
           Products > Product List > View Product
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
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="row">
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                    <div itemscope="">
                                        <h2> <span itemprop="name">Product</span></h2>
                                        <p itemprop="email">SKU</p>
                                        <p itemprop="email">Name</p>
                                            <p itemprop="email">Title</p>
                            
                                        <p itemprop="email"> Available Quantity</p>
                                        <p itemprop="email"> Alert Quantity</p>
                        
                                        <p>Category</p>
                                        <p> Sub Category</p>
                                        <p>Brand Name</p>
                                        <p>Product Type</p>
                                        <p>Status</p>
                                        <p>Minimum Order</p>
                                          <p>Description</p>
                                
                                        
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-6 col-lg-6">
                                        @if(count($result)>0)
                                 
                                    <div itemscope="">
                                    	<h2> <span>Detail</span></h2>
                                        @if($result[0]->sku == "")
                                    	 <p>...</p>
                                    	@else
                                    	 <p>{{$result[0]->sku}}</p>
                                    	@endif
                                    	
                                       @if($result[0]->name == "")
                                    	 <p>...</p>
                                    	 @else
                                    	 <p>{{$result[0]->name}}</p>
                                    	@endif
                                        
                                              @if($result[0]->title == "")
                                    	 <p>...</p>
                                    	 @else
                                    	 <p>{{$result[0]->title}}</p>
                                    	@endif
                                        
                              
                                    	 @if($result[0]->available_quantity == "")
                                    	 <p>...</p>
                                    	 @else
                                        <p>{{$result[0]->available_quantity}}</p>
                                        @endif
                                         @if($result[0]->alert_quantity == "")
                                    	 <p>...</p>
                                    	 @else
                                        <p>{{$result[0]->alert_quantity}}</p>
                                        @endif
                        
                                           
                                           @if($result[0]->category == "")
                                    	 <p>...</p>
                                    	 @else
                                    	  <p>{{$result[0]->category}}</p>
                                    	@endif
                                    	
                                        @if($result[0]->sub_category == "")
                                    	 <p>...</p>
                                    	 @else
                                    	  <p>{{$result[0]->sub_category}}</p>
                                    	@endif
                                                    
                                         @if($result[0]->brand_name == "")
                                    	 <p>...</p>
                                    	 @else
                                    	  <p>{{$result[0]->brand_name}}</p>
                                    	@endif  
                                           
                                            @if($result[0]->product_type == "")
                                    	 <p>...</p>
                                    	 @else
                                    	  <p>{{$result[0]->product_type}}</p>
                                    	@endif 
                                        @if($result[0]->status == 1)
                                        
                                            <p>Active</p>
                                            @else
                                            <p>Inactive</p>
                                        @endif
                                        @if($result[0]->min == "")
                                    	 <p>...</p>
                                    	 @else
                                    	  <p >{{$result[0]->min}}</p>
                                    	@endif 
                                        @if($result[0]->description == "")
                                    	 <p>...</p>
                                    	 @else
                                    	  <p >{{$result[0]->description}}</p>
                                    	@endif 
                             
                                        
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        
        <div class="col-lg-6">
            <div itemscope="">
          <div class="col-lg-6">
                                    	      <div itemscope="">
                                    	          <h4 style="text-align:left;"> <span itemprop="name">Price</span></h4>
          
                  </div>
                                    	  </div>
                                    	  <div class="col-lg-6">
                                    	      
                                    	      <div itemscope="">
                                    	          <h4 style="text-align:left;"> <span itemprop="name">QTY</span></h4>
                                    	           </div>
                                    	  </div>
      @php
      $product_id = $result[0]->QB_id;
      $pricing_detail = DB::select("select * from pricing_detail where product_id = '$product_id' order by pk_id asc"); 
      @endphp
      
                                    	       @foreach($pricing_detail as $results)
                                    	  <div class="col-lg-6">
                                    	      <div itemscope="">
                                    	          <p>{{$results->price}}</p>  
                                    	          </div>
                                    	  </div>
                                    	  <div class="col-lg-6">
                                    	      
                                    	      <div itemscope="">
                                    	          <p>{{$results->quantity}}</p>
                                    	
                                    	        
                                    	          
                                    	          
                                    	          </div>
                                    	  </div>
                                    @endforeach
                                    	</div>
        </div>
        
        <div class="col-md-6">
             <div itemscope="">
                                        <h2> <span itemprop="name">Product Image</span></h2>
                                        </div>
            
        </div>

        
          <div class=" col-md-2">             
<img id="blah" src="{{URL('/')}}/storage/images/{{$result[0]->thumbnail}}" alt="your image"  style="    width: 135px;"/>
</div>
<div class=" col-md-2">
<img id="blah" src="{{URL('/')}}/storage/images/{{$result[0]->thumbnail2}}" alt="your image"  style="    width: 135px;"/>
</div>
<div class=" col-md-2">
<img id="blah" src="{{URL('/')}}/storage/images/{{$result[0]->thumbnail3}}" alt="your image"  style="    width: 135px;"/>
</div>
        


      
        @endif
   
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