@extends('client.layout.appclient')
@section('content')
	<!-- /NAVIGATION -->
<style>
.modal-dialog {
	width: 62% !important;
}
</style>
	<!-- BREADCRUMB -->
	<div id="breadcrumb">
      <div class="container-fluid">
        <ul class="breadcrumb">
          <li><a href="{{url('/')}}/">Home</a></li>
           @if(!empty($main))
              <li   @if(empty($sub))style="color:#F09819; "  @endif> <a href="{{URL('/')}}/product/{{$main}}">{{$main}}</a></li>
              @else
                 <li style="color:#F09819;">Search Results</li>
              @endif
              @if(!empty($sub))
               <li  @if(empty($type))style="color:#F09819;" @endif>  <a href="{{URL('/')}}/product/{{$main}}/{{$sub}}">{{$sub}}</a></li>
               @endif
                 @if(!empty($type))
                <li style="color:#F09819;"> <a href="{{URL('/')}}/product/{{$main}}/{{$sub}}/{{$type}}">{{$type}}</a></li>
                 @endif
        </ul>
      </div>
    </div>
    
      <!-- /HEADER -->
	<!-- /BREADCRUMB -->
		<!-- container -->
		<div class="container-fluid">
			<!-- row -->
			<div class="row">
				<!-- ASIDE -->
				<div  class=" col-lg-2 col-sm-12 col-xs-12 col-md-2">
					<!-- aside widget -->
					<div class="sidebar1-wrap">
                    <div class="sidebar1-box">
                        <h5>Related Categories</h5>
                    <div class="category-nav">
                    <ul class="category-list">
                        			@if(count($main_cate)>0)
			@foreach($main_cate as $results) 
                    <li class="dropdown side-dropdown"> <a class="dropdown-toggle" aria-expanded="true" href="{{URL('/')}}/product/{{$results->main_category}}"> {{$results->main_category}} <i class="fa fa-angle-right"></i> </a>
           @php
           $sub_category = $results->main_category;
               $sub = DB::select("select * from sub_category where category = '$sub_category'");
           @endphp
           @if(count($sub)>0)
       
                <div class="custom-menu">
                  <div class="row">
                    <div class="col-md-4">
                      <ul class="list-links">
                        <li>
                          <h3 class="list-links-title">Sub Categories</h3>
                        </li>
                            	@foreach($sub as $results) 
                        <li class="dropdown side-dropdown"><a class="dropdown-toggle" aria-expanded="true" href="{{URL('/')}}/product/{{$results->category}}/{{$results->sub_category}}">{{$results->sub_category}}</a>
                                             @php
           $category = $results->category;
             $sub_cat = $results->sub_category;
               $product_type = DB::select("select * from product_type where main_category = '$category' and sub_category = '$sub_cat'");
           @endphp
              @if(count($product_type)>0)
                        <div class="custom-menu">
                  <div class="row">
                    <div class="col-md-12">
                      <ul class="list-links">
       
                        <li>
                          <h3 class="list-links-title">Product Types</h3>
                        </li>
                    	@foreach($product_type as $results)     
                        <li><a href="{{URL('/')}}/product/{{$results->main_category}}/{{$results->sub_category}}/{{$results->product_type}}">{{$results->product_type}}</a></li>
                        @endforeach
                        </ul>
                        </div>
                        </div>
                        </div>
                        
                  @endif      
                        </li>
                        @endforeach
                     
                      </ul>
                      <hr class="hidden-md hidden-lg">
                    </div>
                  </div>
                </div>
                  
                @endif
              </li>
                         @endforeach
            
                @elseif(count($sub_category)>0)
			@foreach($sub_category as $results) 
             <li class="dropdown side-dropdown"><a class="dropdown-toggle" aria-expanded="true" href="{{URL('/')}}/product/{{$results->category}}/{{$results->sub_category}}">{{$results->sub_category}}</a>
      
                                         @php
           $category = $results->category;
             $sub_cat = $results->sub_category;
               $product_type = DB::select("select * from product_type where main_category = '$category' and sub_category = '$sub_cat'");
           @endphp
           @if(count($product_type)>0)
       
                <div class="custom-menu">
                  <div class="row">
                    <div class="col-md-4">
                      <ul class="list-links">
                        <li>
                          <h3 class="list-links-title">Product Type</h3>
                        </li>
                       	@foreach($product_type as $results)     
                        <li><a href="{{URL('/')}}/product/{{$results->main_category}}/{{$results->sub_category}}/{{$results->product_type}}">{{$results->product_type}}</a></li>
                        @endforeach
                     
                      </ul>
                      <hr class="hidden-md hidden-lg">
                    </div>
                  </div>
                </div>
                  
                @endif
              </li>
                         @endforeach
                         
                                     @elseif(count($product_type)>0)
			@foreach($product_type as $results) 
             <li class="dropdown side-dropdown"><a class="dropdown-toggle" aria-expanded="true" href="{{URL('/')}}/product/{{$results->main_category}}/{{$results->sub_category}}/{{$results->product_type}}">{{$results->product_type}}</a>
      
      
              </li>
                         @endforeach
                 
            
                @endif
                    </ul>
                    </div>
                    
	       <ul class="lists-links">
      


       
</ul>
	        
	        </div>
                </div>
				</div>
				<!-- /ASIDE -->

				<!-- MAIN -->
				<div class="col-md-10  col-sm-12 col-xs-12">

          <!-- STORE -->
         
         <div class="shop-sidebar">
          <div class="price-filter">
               <form  role="form" action="{{url('/')}}/shop" id="payment-form">
                                        {{ csrf_field() }}
            <div class="price-slider-amount" style="margin-top:20px;">
                <div class="row">
              <div class="col-lg-1 pull-right lpadding">
              <button type="submit" class="btn btn-primary btn-block login-button pull-right" style="margin-top:0px;">Sort</button>
              </div>
              <div class="col-lg-2 pull-right">
                <select name="filter" class="form-control">
                    <option>Low To High</option>
                    <option>High To Low</option>
                    <option>New Product</option>
                </select>
              </div>
              </div>
            </div>
            </form>
          </div>
        </div>
					<div id="store">
					          	@if($errors->any())
			<div class"alert alert-danger">{{$errors->first()}}</div>
			@endif
					<div class="row">
                  <div class="col-lg-6 col-md-6 col-sm-12">
          <div class="bannershowheading" style="padding-top:0px;height:0px;margin-top:10px;">
                @if(!empty($main))
     <h3 style="color:#232f3e;height:0px;">{{$main}}</h3>
     @else
       <h3 style="color:#232f3e;height:0px;">Search Results</h3>
     @endif
          </div>
        </div>
        <div class="col-lg-12 col-sm-hide col-md-hide"><div class="border"></div></div>
        
      </div>
						<!-- row -->
						<div class="row">
              <!-- Product Single -->
        

              @if(count($result)>0)
              @foreach($result as $results)
             
               
							<div class="col-md-3 col-sm-6 col-xs-12">
								<div class="product product-single">
									<div class="product-thumb">
										<button class="main-btn quick-view" data-toggle="modal" data-target="#myModal{{$results->pk_id}}"><i class="fa fa-search-plus"></i>Quick view</button>

										<img src="{{URL('/')}}/storage/images/{{$results->thumbnail}}" alt="">
									</div>
									<div class="product-body">
									    <a href="{{URL('/')}}/products/details/{{$results->pk_id}}/{{$results->sku}}"><h2 class="product-name">{{$results->title}}</h2></a>
										
									</div>
									<div class="product-body">
									    @php
      $product_id = $results->QB_id;
      $last = 0;
      $pricing_detail = DB::select("select * from pricing_detail where product_id = '$product_id'"); 
      if(count($pricing_detail)>0)
      {
         $last = $pricing_detail[0]->price;
          $first = $pricing_detail[0]->price;
      foreach($pricing_detail as $pricing_details)
      {
   
      if($pricing_details->price > $last )
      {
        $last = $pricing_details->price;
      }
      
        if($pricing_details->price < $first )
      {
        $first = $pricing_details->price;
      }
   
     }
     }
      @endphp
									    <h3 class="product-price" style="color:#F09819;">PKR {{number_format($first)}} - PKR {{number_format($last)}}</h3>
									</div>
								</div>
								
              </div>
          
              <div class="modal fade" id="myModal{{$results->pk_id}}" role="dialog">
              <div class="modal-dialog"> 
                
                <!-- Modal content-->
                     <form method="post" action = "{{url('/')}}/product/add/to/cart/{{$results->pk_id}}" >
                      {{ csrf_field() }} 
                      <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">{{$results->category}}</h4>
                  </div>
                  <div class="modal-body"> 
                    <!-- row -->
                    
           
                      <div class="row">
                        <div class="col-lg-5">
                          <div class="product_img"> <img src="{{URL('/')}}/storage/images/{{$results->thumbnail}}" alt=""> </div>
                        </div>
                        <div class="col-lg-7">
                          
                          <div class="product-body">
							
							<div class="col-lg-12"><a href="{{URL('/')}}/products/details/{{$results->pk_id}}/{{$results->sku}}"><h3 class="product-name">{{$results->title}}</h3></a></div>
							
							<div class="col-lg-12">@if(count($d)>0)
							<h3 class="product-price" style="margin-bottom:25px;">PKR {{number_format($discount_price)}} / {{$results->sku}} <div class="product-old-price">PKR {{number_format($d[0]->price)}} / {{$result[0]->sku}}</div></h3>
							@else
	
	@php
	$product_id = $results->QB_id;
	    $product_id = DB::select("select * from pricing_detail where product_id = '$product_id' and quantity = 1"); 
	@endphp
	<h3 class="product-price"  style="margin-bottom:25px;">@if(count($product_id)>0) PKR {{number_format($product_id[0]->price)}} / {{$results->sku}} @endif </h3>

@endif

@php
      $product_id = $results->QB_id;
      $pricing_detail = DB::select("select * from pricing_detail where product_id = '$product_id' order by pk_id asc"); 
      @endphp
      
                                    	       @foreach($pricing_detail as $resultss)
                                    	       @if($resultss->price > 0)
                                    	          @if($resultss->quantity > 1)
                                    	          <h3 class="product-price" style="margin-bottom:25px;">PKR {{number_format($resultss->price)}} / {{$resultss->quantity}} {{$results->sku}}</h3>
                                    	          @endif
                                    	               @endif
                                    @endforeach
</div>
<div class="col-lg-12">
   <span class="label label-success">In Stock</span>
    <div class="borders"></div>
</div>
							
							
						<div class="col-lg-12">
						    <label for="text">QTY</label>
						</div>
					
					<div class="col-lg-6">
					    <div class="input-group">
  <input type="button" value="-" class="button-minus" data-field="quantity">
  <input type="number" step="1" value="{{$results->min}}" name="quantity" class="quantity-field" min="{{$results->min}}" required>
  <input type="button" value="+" class="button-plus" data-field="quantity">
</div>
				
			</div>
			<div class="col-lg-6">    
							<h4 style="margin-top:4px; font-weight:500;"><strong class="label label-info">Minimum Order Quantity</strong><span > {{$results->min}}</span></h4>
							</div>
				
							@php
						 $str = $results->description;
    $tok = strtok($str, "\n");
  

    $skillset =$tok;
   $array = array_wrap($skillset); 
   
    while ($tok !== false) {
        $tok = strtok("\n");
      
       if(is_string($tok))
       $skillset= $tok;
     array_push($array, $skillset);
        
    }
    array_pop($array);
						@endphp
							
							
							<div class="col-lg-12">
							    <div class="descriptions">
							    	@foreach($array as $arrays)<h5 class="product-name">{{$arrays}}</h5>	@endforeach
							    	
							    	</div>
							    	</div>
<div class="col-lg-12">
							<div class="product-btns">
							
								<button type="submit" name"submit" class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Add to Cart</button>
                                				
								
							</div>
							</div>
						</div>
                        </div>
                      </div>
                 
                    <!-- /Product Details --> 
                  </div>
                </div> </form>
              </div>
            </div>
							<!-- /Product Single -->
              @endforeach
              @endif
				
	
					
					
					
					
			
						</div>
						<!-- /row -->
          </div>
        		<!-- /STORE -->
				</div>
				<!-- /MAIN -->
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->

@endsection