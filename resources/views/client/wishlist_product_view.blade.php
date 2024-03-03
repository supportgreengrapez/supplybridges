@extends('client.layout.appclient')
@section('content')
	<!-- /NAVIGATION -->

	<!-- BREADCRUMB -->
	<div id="breadcrumb">
      <div class="container">
        <ul class="breadcrumb">
          <li><a href="{{url('/')}}/">Home</a></li>
          <li class="active">shop</li>
        </ul>
      </div>
    </div>
    
      <!-- /HEADER -->
	<!-- /BREADCRUMB -->

	<!-- section -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<!-- ASIDE -->
				<div id="aside" class="col-md-3">
					<!-- aside widget -->
					<div class="sidebar1-wrap">
                    <div class="sidebar1-box">
                    <h5><center>PRODUCT TYPES</center></h5>
	       <ul class="lists-links">
              <a href="{{URL('/')}}/product/Cleaning Supplies/Cleaning Agents"><li>Cleaning Agents</li></a>
              <a href="{{URL('/')}}/product/Cleaning Supplies/Cleaning Tools"><li>Cleaning Tools</li></a>
              <a href="{{URL('/')}}/product/Grocery/Canned Food"><li>Canned Food</li></a>
                  <a href="{{URL('/')}}/product/Grocery/Sauces & Seasonings"><li>Sauces & Seasonings</li></a>
            
                  <a href="{{URL('/')}}/product/Surgical Disposables/Consumables"><li>Consumables</li></a>
       
</ul>
	        
	        </div>
                </div>
                
					<!-- /aside widget -->

					<!-- aside widget -->
				
           			
					<!-- aside widget -->

					<!-- aside widget -->
			
					<!-- /aside widget -->

					<!-- aside widget -->
				
                  
					<!-- /aside widget -->
                  
					<!-- aside widget -->
					

                    
                    
					<!-- /aside widget -->
				</div>
				<!-- /ASIDE -->

				<!-- MAIN -->
				<div id="main" class="col-md-9">
					<!-- store top filter -->
					<div class="store-filter clearfix">
						
						<div class="pull-right">
							<div class="page-filter">
								<span class="text-uppercase">Show:</span>
								<select class="input">
										<option value="0">10</option>
										<option value="1">20</option>
										<option value="2">30</option>
									</select>
							</div>
							<ul class="store-pages">
								<li><span class="text-uppercase">Page:</span></li>
								<li class="active">1</li>
								<li><a href="#">2</a></li>
								<li><a href="#">3</a></li>
								<li><a href="#"><i class="fa fa-caret-right"></i></a></li>
							</ul>
						</div>
					</div>
					<!-- /store top filter -->

          <!-- STORE -->
         
					<div id="store">
					          	@if($errors->any())
			<div class"alert alert-danger">{{$errors->first()}}</div>
			@endif
						<!-- row -->
						<div class="row">
              <!-- Product Single -->
         

              @if(count($result)>0)
              @foreach($result as $results)
              <form method="post" action = "{{url('/')}}/product/add/cart/{{$results->pk_id}}" class="login100-form validate-form p-l-55 p-r-55 p-t-178">
                {{ csrf_field() }}
							<div class="col-md-4 col-sm-6 col-xs-6">
								<div class="product product-single">
									<div class="product-thumb">
										<button class="main-btn quick-view"><i class="fa fa-search-plus"></i><a href="{{URL('/')}}/products/details/{{$results->pk_id}}/{{$results->sku}}">Quick view</a></button>
										<img src="{{URL('/')}}/storage/images/{{$results->thumbnail}}" alt="">
									</div>
									<div class="product-body">
										<h3 class="product-price">PKR {{$results->price}}</h3>
									
										<h2 class="product-name">{{$results->name}}</h2>
						 </form>
										<form method="post" action = "{{url('/')}}/product/add/wishlist/{{$results->pk_id}}" class="login100-form validate-form p-l-55 p-r-55 p-t-178">
			{{ csrf_field() }}
                <div class="product-btns">
                  <button class="main-btn icon-btn" name = "submit" type="submit" class ="submit"><i class="fa fa-heart"></i></button>
                
               
                </div>
                </form>
									</div>
								</div>
              </div>
              </form>
							<!-- /Product Single -->
              @endforeach
              @endif
				
			
		   
					
					
					
			
						</div>
						<!-- /row -->
          </div>
        		<!-- /STORE -->

					<!-- store bottom filter -->
					<div class="store-filter clearfix">
						
						<div class="pull-right">
							<div class="page-filter">
								<span class="text-uppercase">Show:</span>
								<select class="input">
										<option value="0">10</option>
										<option value="1">20</option>
										<option value="2">30</option>
									</select>
							</div>
							<ul class="store-pages">
								<li><span class="text-uppercase">Page:</span></li>
								<li class="active">1</li>
								<li><a href="#">2</a></li>
								<li><a href="#">3</a></li>
								<li><a href="#"><i class="fa fa-caret-right"></i></a></li>
							</ul>
						</div>
					</div>
					<!-- /store bottom filter -->
				</div>
				<!-- /MAIN -->
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /section -->

@endsection