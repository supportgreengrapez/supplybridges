@extends('client.layout.appclient')
@section('content')
	<!-- /NAVIGATION -->

	<!-- BREADCRUMB -->
	<div id="breadcrumb">
		<div class="container-fluid">
			<ul class="breadcrumb">
			    	<li><a href="{{url('/')}}/"></a>Home</li>
			    	
			    	@if(count($result)>0)
			<li @if(empty($result[0]->sub_category))style="color:#F09819;"@endif>{{$result[0]->category}}</li>
			  @if(!empty($result[0]->sub_category))
				<li @if(empty($result[0]->product_type))style="color:#F09819;" @endif>{{$result[0]->sub_category}}</li>
			@endif
			  @if(!empty($result[0]->product_type))
				<li style="color:#F09819;">{{$result[0]->product_type}}</li>
				@endif
				@endif
			</ul>
		</div>
	</div>
	<!-- /BREADCRUMB -->

	<!-- section -->
	
	<div class="section">
		<!-- container -->
		<div class="container-fluid">
			<!-- row -->
			<div class="row">
				<!--  Product Details -->
								@if($errors->any())
<div class="alert alert-danger">
  <strong>Danger!</strong> {{$errors->first()}}
</div>
@endif
				@if(count($result)>0)
		
				<form method="post" action = "{{url('/')}}/product/add/cart/{{$result[0]->pk_id}}" class="login100-form validate-form p-l-55 p-r-55 p-t-178">
					{{ csrf_field() }}
				<div class="product product-details clearfix">
					<div class="col-md-6">
						<div id="product-main-view">
							<div class="product-view">
								<img src="{{URL('/')}}/storage/images/{{$result[0]->thumbnail}}" alt="">
							</div>
							<div class="product-view">
								<img src="{{URL('/')}}/storage/images/{{$result[0]->thumbnail2}}" alt="">
							</div>
							<div class="product-view">
								<img src="{{URL('/')}}/storage/images/{{$result[0]->thumbnail3}}" alt="">
							</div>
						
						</div>
						<div id="product-view">
							<div class="product-view">
								<img src="{{URL('/')}}/storage/images/{{$result[0]->thumbnail}}" alt="">
							</div>
							<div class="product-view">
								<img src="{{URL('/')}}/storage/images/{{$result[0]->thumbnail2}}" alt="">
							</div>
							<div class="product-view">
								<img src="{{URL('/')}}/storage/images/{{$result[0]->thumbnail3}}" alt="">
							</div>
						
						</div>
					</div>
					<div class="col-md-6">
						<div class="product-body">
								<div class="col-lg-12"><h3 class="product-name">{{$result[0]->title}}</h3></div>
						<div class="col-lg-12">
   <span class="label label-success">In Stock</span>
</div>
							
							<div class="col-lg-12">@if(count($d)>0)
							<h3 class="product-price" style="margin-bottom:25px; margin-top:25px;">PKR {{$discount_price}} / {{$result[0]->sku}} <div class="product-old-price">PKR {{$d[0]->price}} / {{$result[0]->sku}}</div></h3>
							@else
	@if(count($result)>0)
	@php
	$product_id = $result[0]->QB_id;
	    $product_id = DB::select("select * from pricing_detail where product_id = '$product_id' and quantity = 1"); 
	@endphp
	@if(count($product_id)>0)
	<h3 class="product-price"  style="margin-bottom:25px; margin-top:25px;">PKR {{$product_id[0]->price}} / {{$result[0]->sku}} </h3>
	@endif
	@endif
@endif

 @php
      $product_id = $result[0]->QB_id;
      $pricing_detail = DB::select("select * from pricing_detail where product_id = '$product_id' order by pk_id asc"); 
      @endphp
      
                                    	       @foreach($pricing_detail as $results)
                                    	       @if($results->price > 0 )
                                    	       @if($results->quantity > 1 )
                                    	       
                                    	          <h3 class="product-price" style="margin-bottom:25px; margin-top:25px;">PKR {{$results->price}} / {{$results->quantity}} {{$result[0]->sku}}</h3>
                                  @endif
                                   @endif
                                    @endforeach
                                    
                                    
    <div class="borders"></div>
</div>

							
							
						<div class="col-lg-12">
						    <label for="text">QTY</label>
						</div>
					
					<div class="col-lg-4">
					    <div class="input-group">
  <input type="button" value="-" class="button-minus" data-field="quantity">
  <input type="number" step="1" value="{{$result[0]->min}}" name="quantity" class="quantity-field" min="{{$result[0]->min}}" required>
  <input type="button" value="+" class="button-plus" data-field="quantity">
</div>
				
			</div>
			<div class="col-lg-8">    
							<h4 style="margin-top:4px; font-weight:500;"><strong class="label label-info">Minimum Order</strong><span > {{$result[0]->min}}</span></h4>
							</div>
				
						@php
						 $str = $result[0]->description;
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
				</form>
		
				@endif
				<!-- /Product Details -->
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /section -->

	<!-- section -->

	<!-- /section -->
	
	<script>

	</script>
@endsection