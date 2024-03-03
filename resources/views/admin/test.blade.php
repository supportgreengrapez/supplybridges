@extends('client.layout.app')
@section('content')

	<section id="description">
      <div class="container">
			
<h1 style="text-align:center; color:#ed6c71 !important;">Product Details</h1>
			
				@if($errors->any())
			<div class"alert alert-danger">{{$errors->first()}}</div>
			@endif
			@if(count($result)>0)
				@foreach($result as $results)
			<form method="post" action = "{{url('/')}}/product/add/cart/{{$results->pk_id}}">
				{{ csrf_field() }}
	    <div class="row">
			<div class="col-md-7 ">
			<div class="preview col" style="text-align:  center;">
   

    <div class="app-figure" id="zoom-fig">
        <a id="Zoom-1" class="MagicZoom" title="Show your product in stunning detail with Magic Zoom Plus."
            href="{{URL('/')}}/storage/images/{{$result[0]->thumbnail}}?scale.height=400"
        >
            <img src="{{URL('/')}}/storage/images/{{$result[0]->thumbnail}}?scale.height=400" alt=""/>
        </a>
        <div class="selectors">
           <a
                data-zoom-id="Zoom-1"
                href="{{URL('/')}}/storage/images/{{$result[0]->thumbnail}}"
                data-image="{{URL('/')}}/storage/images/{{$result[0]->thumbnail}}?scale.height=400">
                <img srcset="{{URL('/')}}/storage/images/{{$result[0]->thumbnail}}" src="{{URL('/')}}/storage/images/{{$result[0]->thumbnail}}" style="height:83px;"/>
            </a>
           <a
                data-zoom-id="Zoom-1"
                href="{{URL('/')}}/storage/images/{{$result[0]->thumbnail2}}"
                data-image="{{URL('/')}}/storage/images/{{$result[0]->thumbnail2}}?scale.height=400"
            >
                <img srcset="{{URL('/')}}/storage/images/{{$result[0]->thumbnail2}}" src="{{URL('/')}}/storage/images/{{$result[0]->thumbnail2}}" style="height:83px;"/>
            </a>
           <a
                data-zoom-id="Zoom-1"
                href="{{URL('/')}}/storage/images/{{$result[0]->thumbnail3}}"
                data-image="{{URL('/')}}/storage/images/{{$result[0]->thumbnail3}}?scale.height=400"
            >
                <img srcset="{{URL('/')}}/storage/images/{{$result[0]->thumbnail3}}" src="{{URL('/')}}/storage/images/{{$result[0]->thumbnail3}}" style="height:83px;"/>
            </a>
      
     
       
         
       
        </div>
    </div>

    
</div>
			</div>
						
          <div class="col-md-5">
				@if(count($result)>0)
				@foreach($result as $results)
        <h3 style="color:#ed6c71;"> <span class="in_sport">{{$results->category}}</span></h3>
				<div class="col-lg-12">
				<table class="table">
				
				
              <tbody>
            <tr>
                  <td><span>Product Type</span></td>
                  <td>{{$results->product_type}}</td>
                </tr>
            <tr>
                  <td><span>Product Name</span></td>
                  <td>{{$results->name}}</td>
                </tr>
            <tr>
                  <td><span>Product Code</span></td>
                  <td>{{$results->sku}}</td>
                </tr>
		  </tbody>
		 
			</table>
				</div>
			@endforeach
			@endif

	

			<div class="col-lg-12">
        <div class="product-color menu-size menu-item bgsize"> 
        <div class="header-item" >Color</div>
              <div class="color-choose">
            <div>
				@if(count($result1)>0)
				@foreach($result1 as $results)
				<a href="{{URL('/')}}/products/details/{{$results->pk_id}}/{{$results->sku}}">
			<input id="black" type="button" name="color">
			<label><span  style="background-color:{{$results->color}} "></span></label></a>
			@endforeach
	@endif
				</div>
			</div>	
         
			</div>
			</div>
<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="menu-size menu-item bgsize">
					<div class="header-item" >Size</div>
					<ul class="color-row1">
							@if(count($array)>0)
							@foreach($array as $arrays)
								<input type="radio" name="size" value="{{$arrays}}" > {{$arrays}}<br>
							  
								@endforeach
					@endif
					</ul>
			</div>

</div>
					<div class="col-md-12 col-sm-12 col-xs-12">
            <div class="menu-size menu-item bgsize">
						

			
@if(count($d)>0)
		

					<h3><span>Retail Price</span></h3>
					
<h4>PKR {{$d[0]->price}}</h4>
					<label class="label label-success"> Off {{$d[0]->percentage}}% </label>
	
				<h3>PKR {{$discount_price}}</h3>
	
	@else
	@if(count($result)>0)
	@foreach($result as $results)

			
<h3><span>Retail Price</span></h3>
			<h3 class="price">PKR {{$results->price}}</h3>
@endforeach
@endif
@endif
			
<div class="col-lg-6">
			<button class="btn btn-cart" name="submit" type="submit">
			
	ADD TO CART
			 </button>
			</div>
			<div class="col-lg-6">
			
		
			</div>
			
		</div>

</div>
	 </form>
	 @endforeach
	 @endif
	 
	  </div>
	  </div>
	  <div class="row">
		<div class="col-lg-12 col-12-md col-12-sm">
			<div class="menu-item">
				<h2 style="color:#ed6c71;">About this Product</h2>
				<p>{{$results->description}}</p>
			</div>
			
		</div>

	</div>
		@if(count($result)>0)
		@foreach($result as $results)
		<form method="post" action = "{{url('/')}}/product/add/wishlist/{{$results->pk_id}}">
			{{ csrf_field() }}
				<button class="btn btn-cart" name="submit" type="submit"><span class="glyphicon glyphicon-heart"></span> Add to Wishlist</button>
		</form>
		@endforeach
		@endif
	</div>
    </section>
@endsection
