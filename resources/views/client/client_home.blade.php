<!DOCTYPE html>
<html lang="en">
<head>
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<!-- Meta, title, CSS, favicons, etc. -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="Supply Bridges">
<meta name="keywords" content="HTML,CSS,XML,JavaScript">
<meta name="author" content="Supply Bridges">
<link rel="shortcut icon" href="{{url('/')}}/images/favicon.png"/>
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

<title>Supply Bridges</title>

<!-- Bootstrap -->
<link type="text/css" rel="stylesheet" href="{{url('/')}}/css1/bootstrap.min.css" />

<!-- Slick -->
<link type="text/css" rel="stylesheet" href="{{url('/')}}/css1/slick.css" />
<link type="text/css" rel="stylesheet" href="{{url('/')}}/css1/slick-theme.css" />

<!-- nouislider -->
<link type="text/css" rel="stylesheet" href="{{url('/')}}/css1/nouislider.min.css" />

<!-- fontasm stlylesheet -->
<link type="text/css" rel="stylesheet" href="{{url('/')}}/css1/font-awesome.min.css" />

<!-- Custom stlylesheet -->
<link type="text/css" rel="stylesheet" href="{{url('/')}}/css1/style.css" />
<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Dosis|Josefin+Sans|M+PLUS+1p|Poppins|Questrial|Quicksand|Raleway|Sawarabi+Gothic|Ubuntu" rel="stylesheet">
<style>
#uniqueId {
	text-transform: capitalize;
}
.modal-dialog {
	width: 62% !important;
}
.category-list{
    display:none;
    border-top: 3px solid #F09819;
}
.category-nav:hover .category-list {
    display: block;
}
</style>
</head>
<body>
<nav class="navbar navbar-default hidden-lg hidden-md "> 
  <!-- HEADER -->
  <header> 
    <!-- header -->
    <div id="header">
      <div class="container">
        <div class="row">
          <div class="col-lg-4 hidden-sm hidden-xs">
            <div class="pull-left"> 
              <!--contact info-->
              <div class="contact-no">
                <ul>
                  <li><a class="mobilesOnly" href="tel:+923244244934">
                    <div class="phon-no"> <i class="fa fa-phone"></i> +923244244934 </div>
                    </a></li>
                  <li>
                    <div class="email"> <i class="fa fa-envelope"></i> support@supplybridges.com </div>
                  </li>
                </ul>
              </div>
              <!--/contact info--> 
              
            </div>
          </div>
          <div class="col-lg-4"> 
            <!-- Logo -->
            <div class="header-logo" style="text-align: center;
    margin-bottom: 10px;"> <a class="logo" href="{{url('/')}}/"> <img src="{{url('/')}}/img/logo.png" alt=""> </a> </div>
            <!-- /Logo --> 
          </div>
          <div class="col-lg-4">
            <div class="pull-left">
              <ul class="header-btns">
                
                <!-- Mobile nav toggle-->
                <li class="nav-toggle">
                  <button class="nav-toggle-btn main-btn icon-btn"><i class="fa fa-bars"></i></button>
                </li>
                <!-- / Mobile nav toggle -->
              </ul>
            </div>
          </div>
        </div>
      </div>
      <!-- header --> 
    </div>
    <!-- container --> 
  </header>
  <!-- /HEADER --> 
  
  <!-- NAVIGATION -->
  <div id="navigation" > 
    <!-- container -->
    <div class="container-fluid">
      <div class="bgheader">
        <div id="responsive-nav"> 
          <!-- category nav -->
          <div class="category-nav show-on-click"style="    background: linear-gradient(90deg, rgba(35,47,62,1) 100%, rgba(219,209,209,1) 00%, rgba(35,47,62,1) 100%);
    border-bottom: 3px solid #F09819;" > <span class="category-header"><i class="fa fa-angle-down"></i>Products</span>
            <ul class="category-list"  id="div">
              <li class="dropdown side-dropdown"> <a class="dropdown-toggle" aria-expanded="true" href="{{URL('/')}}/product/Hygiene Supplies">Hygiene Supplies<i class="fa fa-angle-right"></i></a>
                <div class="custom-menu">
                  <div class="row">
                    <div class="col-md-12">
                      <ul class="list-links">
                        <li>
                          <h3 class="list-links-title">Categories</h3>
                        </li>
                        <li class="dropdown side-dropdown"><a class="dropdown-toggle" aria-expanded="true"  href="{{URL('/')}}/product/Hygiene Supplies/Tissues">Tissues</a>
                        
                        <div class="custom-menu">
                  <div class="row">
                    <div class="col-md-12">
                      <ul class="list-links">
       
                        <li>
                          <h3 class="list-links-title">Product Types</h3>
                        </li>     
                        <li><a href="">hjgj</a></li>

                        </ul>
                        </div>
                        </div>
                        </div>
                        
                        </li>
                      </ul>
                      <hr class="hidden-md hidden-lg">
                    </div>
                  </div>
                </div>
              </li>
              <!--<li class="dropdown side-dropdown"> <a class="dropdown-toggle" aria-expanded="true" href="{{URL('/')}}/product/Disposable Tableware">Disposable Tableware<i class="fa fa-angle-right"></i></a>-->
              <!--  <div class="custom-menu">-->
              <!--    <div class="row">-->
              <!--      <div class="col-md-12">-->
              <!--        <ul class="list-links">-->
              <!--          <li>-->
              <!--            <h3 class="list-links-title">Categories</h3>-->
              <!--          </li>-->
              <!--          <li><a href="{{URL('/')}}/product/Disposable Tableware/Plates">Plates</a></li>-->
              <!--          <li><a href="{{URL('/')}}/product/Disposable Tableware/Cups">Cups</a></li>-->
              <!--          <li><a href="{{URL('/')}}/product/Disposable Tableware/Packaging">Packaging</a></li>-->
              <!--          <li><a href="{{URL('/')}}/product/Disposable Tableware/Froks">Froks</a></li>-->
              <!--          <li><a href="{{URL('/')}}/product/Disposable Tableware/Spoons">Spoons</a></li>-->
              <!--          <li><a href="{{URL('/')}}/product/Disposable Tableware/Lids">Lids</a></li>-->
              <!--          <li><a href="{{URL('/')}}/product/Disposable Tableware/Styrofoam">Styrofoam</a></li>-->
              <!--          <li><a href="{{URL('/')}}/product/Disposable Tableware/Plastic Containers">Plastic Containers</a></li>-->
              <!--          <li><a href="{{URL('/')}}/product/Disposable Tableware/Napkins">Napkins</a></li>-->
              <!--          <li><a href="{{URL('/')}}/product/Disposable Tableware/Polythene Gloves">Polythene Gloves</a></li>-->
              <!--          <li><a href="{{URL('/')}}/product/Disposable Tableware/Surgical Gloves">Surgical Gloves</a></li>-->
              <!--          <li><a href="{{URL('/')}}/product/Disposable Tableware/Face Mask">Face Mask</a></li>-->
              <!--          <li><a href="{{URL('/')}}/product/Disposable Tableware/Aprons">Aprons</a></li>-->
              <!--        </ul>-->
              <!--        <hr class="hidden-md hidden-lg">-->
              <!--      </div>-->
              <!--    </div>-->
              <!--  </div>-->
              <!--</li>-->
              <!--<li class="dropdown side-dropdown"> <a class="dropdown-toggle" aria-expanded="true" href="{{URL('/')}}/product/Packing Supplies">Packing Supplies<i class="fa fa-angle-right"></i></a>-->
              <!--  <div class="custom-menu">-->
              <!--    <div class="row">-->
              <!--      <div class="col-md-12">-->
              <!--        <ul class="list-links">-->
              <!--          <li>-->
              <!--            <h3 class="list-links-title">Categories</h3>-->
              <!--          </li>-->
              <!--          <li><a href="{{URL('/')}}/product/Packing Supplies/Aluminium Containers">Aluminium Containers</a></li>-->
              <!--          <li><a href="{{URL('/')}}/product/Packing Supplies/Cling Films">Cling Films</a></li>-->
              <!--          <li><a href="{{URL('/')}}/product/Packing Supplies/Zip Lock Bags">Zip Lock Bags</a></li>-->
              <!--          <li><a href="{{URL('/')}}/product/Packing Supplies/Butter Paper">Butter Paper</a></li>-->
              <!--          <li><a href="{{URL('/')}}/product/Packing Supplies/Food Safety Liners">Food Safety Liners</a></li>-->
              <!--          <li><a href="{{URL('/')}}/product/Packing Supplies/Polythene Bags">Polythene Bags</a></li>-->
              <!--          <li><a href="{{URL('/')}}/product/Packing Supplies/Straws">Straws</a></li>-->
              <!--        </ul>-->
              <!--        <hr class="hidden-md hidden-lg">-->
              <!--      </div>-->
              <!--    </div>-->
              <!--  </div>-->
              <!--</li>-->
              <!--<li class="dropdown side-dropdown"> <a class="dropdown-toggle" aria-expanded="true" href="{{URL('/')}}/product/Cleaning Supplies">Cleaning Supplies <i class="fa fa-angle-right"></i> </a>-->
              <!--  <div class="custom-menu">-->
              <!--    <div class="row">-->
              <!--      <div class="col-md-12">-->
              <!--        <ul class="list-links">-->
              <!--          <li>-->
              <!--            <h3 class="list-links-title">Categories</h3>-->
              <!--          </li>-->
              <!--          <li><a href="{{URL('/')}}/product/Cleaning Supplies/Cleaning Agents">Cleaning Agents</a></li>-->
              <!--          <li><a href="{{URL('/')}}/product/Cleaning Supplies/Cleaning Tools">Cleaning Tools</a></li>-->
              <!--          <li><a href="{{URL('/')}}/product/Cleaning Supplies/Wipers">Wipers</a></li>-->
              <!--          <li><a href="{{URL('/')}}/product/Cleaning Supplies/Brooms">Brooms</a></li>-->
              <!--          <li><a href="{{URL('/')}}/product/Cleaning Supplies/Mops">Mops</a></li>-->
              <!--          <li><a href="{{URL('/')}}/product/Cleaning Supplies/Detergents">Detergents</a></li>-->
              <!--          <li><a href="{{URL('/')}}/product/Cleaning Supplies/Dusters">Dusters</a></li>-->
              <!--          <li><a href="{{URL('/')}}/product/Cleaning Supplies/Dust Collector">Dust Collector</a></li>-->
              <!--          <li><a href="{{URL('/')}}/product/Cleaning Supplies/Dust Bins">Dust Bins</a></li>-->
              <!--          <li><a href="{{URL('/')}}/product/Cleaning Supplies/Towel">Towel</a></li>-->
              <!--          <li><a href="{{URL('/')}}/product/Cleaning Supplies/Phenyle">Phenyle</a></li>-->
              <!--          <li><a href="{{URL('/')}}/product/Cleaning Supplies/Hand Sanitizers">Hand Sanitizers</a></li>-->
              <!--          <li><a href="{{URL('/')}}/product/Cleaning Supplies/Knives">Knives</a></li>-->
              <!--          <li><a href="{{URL('/')}}/product/Cleaning Supplies/Dispensers">Dispensers</a></li>-->
              <!--          <li><a href="{{URL('/')}}/product/Cleaning Supplies/Aerosols">Aerosols</a></li>-->
              <!--          <li><a href="{{URL('/')}}/product/Cleaning Supplies/Waste Management">Waste Management</a></li>-->
              <!--        </ul>-->
              <!--        <hr class="hidden-md hidden-lg">-->
              <!--      </div>-->
              <!--    </div>-->
              <!--  </div>-->
              <!--</li>-->
              <!--<li class="dropdown side-dropdown"> <a class="dropdown-toggle" aria-expanded="true" href="{{URL('/')}}/product/Grocery Supplies">Tea and Coffee<i class="fa fa-angle-right"></i></a>-->
              <!--  <div class="custom-menu">-->
              <!--    <div class="row">-->
              <!--      <div class="col-md-12">-->
              <!--        <ul class="list-links">-->
              <!--          <li>-->
              <!--            <h3 class="list-links-title">Categories</h3>-->
              <!--          </li>-->
              <!--          <li><a href="{{URL('/')}}/product/Grocery Supplies/Canned Food">Canned Food</a></li>-->
              <!--          <li><a href="{{URL('/')}}/product/Grocery Supplies/Sauces & Seasonings">Sauces & Seasonings</a></li>-->
              <!--          <li><a href="{{URL('/')}}/product/Grocery Supplies/Sauces">Sauces</a></li>-->
              <!--          <li><a href="{{URL('/')}}/product/Grocery Supplies/Tea & Coffee">Tea & Coffee</a></li>-->
              <!--          <li><a href="{{URL('/')}}/product/Grocery Supplies/Spices">Spices</a></li>-->
              <!--          <li><a href="{{URL('/')}}/product/Grocery Supplies/Pulses">Pulses</a></li>-->
              <!--          <li><a href="{{URL('/')}}/product/Grocery Supplies/Rice">Rice</a></li>-->
              <!--          <li><a href="{{URL('/')}}/product/Grocery Supplies/Oil">Oil</a></li>-->
              <!--          <li><a href="{{URL('/')}}/product/Grocery Supplies/Beverages">Beverages</a></li>-->
              <!--        </ul>-->
              <!--        <hr class="hidden-md hidden-lg">-->
              <!--      </div>-->
              <!--    </div>-->
              <!--  </div>-->
              <!--</li>-->
              <!--<li class="dropdown side-dropdown"> <a class="dropdown-toggle" href="{{URL('/')}}/product/Electrical Supplies">Kiri Cream Cheese</a></li>-->
              <!--<li class="dropdown side-dropdown"> <a class="dropdown-toggle" aria-expanded="true" href="{{URL('/')}}/product/Office and Stationery Supplies">Stationery<i class="fa fa-angle-right"></i></a>-->
              <!--  <div class="custom-menu">-->
              <!--    <div class="row">-->
              <!--      <div class="col-md-12">-->
              <!--        <ul class="list-links">-->
              <!--          <li>-->
              <!--            <h3 class="list-links-title">Categories</h3>-->
              <!--          </li>-->
              <!--          <li><a href="{{URL('/')}}/product/Office and Stationery Supplies/Paper Rim">Paper Rim</a></li>-->
              <!--          <li><a href="{{URL('/')}}/product/Office and Stationery Supplies/Markers">Markers</a></li>-->
              <!--          <li><a href="{{URL('/')}}/product/Office and Stationery Supplies/Rubber Bands">Rubber Bands</a></li>-->
              <!--          <li><a href="{{URL('/')}}/product/Office and Stationery Supplies/POS Rolls">POS Rolls</a></li>-->
              <!--          <li><a href="{{URL('/')}}/product/Office and Stationery Supplies/Calculators">Calculators</a></li>-->
              <!--          <li><a href="{{URL('/')}}/product/Office and Stationery Supplies/Highlighters">Highlighters</a></li>-->
              <!--          <li><a href="{{URL('/')}}/product/Office and Stationery Supplies/Tapes">Tapes</a></li>-->
              <!--          <li><a href="{{URL('/')}}/product/Office and Stationery Supplies/Files">Files</a></li>-->
              <!--          <li><a href="{{URL('/')}}/product/Office and Stationery Supplies/Ball Pens">Ball Pens</a></li>-->
              <!--        </ul>-->
              <!--        <hr class="hidden-md hidden-lg">-->
              <!--      </div>-->
              <!--    </div>-->
              <!--  </div>-->
              <!--</li>-->
              <!--<li class="dropdown side-dropdown"> <a class="dropdown-toggle" href="{{URL('/')}}/product/Electrical Supplies">Industrial Supplies</a></li>-->
              <hr>
              <!--<li class="dropdown side-dropdown"> <a class="dropdown-toggle" href="">Supply Bridges Rover</a></li>-->
              <li class="dropdown side-dropdown"> <a class="dropdown-toggle" href="">Deals Center</a></li>
              <li class="dropdown side-dropdown"> <a class="dropdown-toggle" href="">Large-Order Inquiries</a></li>
              <!--<li class="dropdown side-dropdown"> <a class="dropdown-toggle" href="">Apply for Credit Line</a></li>-->
            </ul>
          </div>
          <!-- Search -->
          <div class="header-search">
            <form  role="form" action="{{url('/')}}/search" method="post" id="payment-form">
              {{ csrf_field() }}
              <input class="input search-input" type="text" name="search"  placeholder="Search for your supplies here" required>
              <button class="search-btn"><i class="fa fa-search" style="color:white;"></i></button>
            </form>
          </div>
          <!-- /Search -->
          
          <ul class="nav navbar-nav loginform navbar-right header-btns">
            <!--<li><a href="{{url('/')}}/shop">Shop</a></li>--> 
            @if(Session::has('username'))
            <li><a href="{{url('/')}}/faq"><i class="fa fa-question-circle" style="font-size:18px;"></i> Help</a></li>
            <li class="header-cart dropdown default-dropdown"> <a class="dropdown-toggle" aria-expanded="true">
              <div class="header-btns-icon"> @if(Session::has('cart')) <i><img src="{{URL('/')}}/img/cart1.png" alt"icon" style="    margin-right: 2px; margin-top:-5px; width:26px"></i>@else<i><img src="{{URL('/')}}/img/cart1.png" alt"icon" style="    margin-right: 2px; margin-top:-5px; width:26px"></i>@endif <span class="qty"> {{Session::has('cart') ? Session::get('cart')->totalQty : '0'}} </span> </div>
              <strong>My Order</strong></a>
              <div class="custom-menu">
                <div id="shopping-cart"> @if(Session::has('cart'))
                  @foreach($products as $product)
                  <div class="shopping-cart-list">
                    <div class="product product-widget">
                      <div class="product-thumb"> <img src="{{URL('/')}}/storage/images/{{$product['item']->thumbnail}}" alt=""> </div>
                      <div class="product-body">
                        <h3 class="product-price">PKR {{$product['product_price']}} <span class="qty badge ">{{$product['qty']}}</span></h3>
                        <h2 class="product-name"> {{$product['item']->name}}</h2>
                      </div>
                     <a href="{{URL('/')}}/remove/item/cart/{{$product['item']->pk_id}}/{{$product['size']}}/{{$product['qty']}}">  <button class="cancel-btn"><i class="fa fa-trash"></i></button></a>
                    </div>
                  </div>
                  @endforeach
                  @endif
                  <div class="shopping-cart-btns"> <a class="main-btn" href="{{URL('/')}}/cart" style="color:#232f3e !important;">View Cart</a> @if(Session::has('username'))
                    <td><a href="{{url('/')}}/cart/checkout"  class="primary-btn add-to-cart"> Checkout <span class="glyphicon glyphicon-play"></span></a></td>
                    @else
                    <td><a href="{{url('/')}}/cart/guest/checkout"  class="primary-btn add-to-cart">Checkout <span class="glyphicon glyphicon-play"></span> </a></td>
                    @endif </div>
                </div>
              </div>
            </li>
            <li class="dropdown dropdown-btn"> <a class="dropdown-toggle">
              <div>{{session::get('name')}}<span class="caret"></span></div>
              </a >
              <ul class="dropdown-menu">
                  
                  <li><a href="#" style="color:#232f3e !important;">My Account</a></li>
                  <li><a href="{{URL('/')}}/guest/order/tracking/view" style="color:#232f3e !important;">Order Tracking</a></li>
                  <li><a href="#" style="color:#232f3e !important;">Order History</a></li>
                   <li><a href="{{URL('/')}}/edit_profile" style="color:#232f3e !important;">Edit Profile</a></li>
                <li><a href="{{URL('/')}}/logout" style="color:#232f3e !important;">Logout</a></li>
              </ul>
            </li>
            <!--<li class="dropdown dropdown-btn"> <a class="dropdown-toggle">-->
            <!--  <div id="uniqueId2">Wishlist<span class="caret"></span></div>-->
            <!--  </a >-->
            <!--  <ul class="dropdown-menu">-->
            <!--    <li><a href="{{URL('/')}}/search/wishlist" style="color:#232f3e !important;">Wishlist</a></li>-->
            <!--    <li><a href="{{URL('/')}}/view/wishlist" style="color:#232f3e !important;">View My Wishlist</a></li>-->
            <!--  </ul>-->
            <!--</li>-->
            @else 
            <!--<li><a href="guest/order/tracking/view"></i> Order Tracking</a></li>-->
            <li class="header-cart dropdown default-dropdown"> <a class="dropdown-toggle" aria-expanded="true">
              <div class="header-btns-icon"> @if(Session::has('cart')) <i><img src="{{URL('/')}}/img/cart1.png" alt"icon" style="    margin-right: 2px; margin-top:-5px;width:26px"></i>@else<i><img src="{{URL('/')}}/img/cart2.png" alt"icon" style="    margin-right: 2px;margin-top:-5px;width:26px"></i> @endif <span class="qty"> {{Session::has('cart') ? Session::get('cart')->totalQty : '0'}} </span> </div>
              <strong>My Order</strong> </a>
              <div class="custom-menu">
                <div id="shopping-cart"> @if(Session::has('cart'))
                  @foreach($products as $product)
                  <div class="shopping-cart-list">
                    <div class="product product-widget">
                      <div class="product-thumb"> <img src="{{URL('/')}}/storage/images/{{$product['item']->thumbnail}}" alt=""> </div>
                      <div class="product-body">
                        <h3 class="product-price">PKR {{$product['product_price']}} <span class="qty badge ">{{$product['qty']}}</span></h3>
                        <h2 class="product-name"> {{$product['item']->name}}</h2>
                      </div>
                   <a href="{{URL('/')}}/remove/item/cart/{{$product['item']->pk_id}}/{{$product['size']}}/{{$product['qty']}}">  <button class="cancel-btn"><i class="fa fa-trash"></i></button></a>
                    </div>
                  </div>
                  @endforeach
                  @endif
                  <div class="shopping-cart-btns"> <a class="main-btn" href="{{URL('/')}}/cart" style="color:#232f3e !important;">View Cart</a> @if(Session::has('username'))
                    <td><a href="{{url('/')}}/cart/checkout"  class="primary-btn add-to-cart"> Checkout <span class="glyphicon glyphicon-play"></span></a></td>
                    @else
                    <td><a href="{{url('/')}}/cart/guest/checkout"  class="primary-btn add-to-cart">Checkout <span class="glyphicon glyphicon-play"></span> </a></td>
                    @endif </div>
                </div>
              </div>
            </li>
            <li><a href="{{url('/')}}/faq"><i class="fa fa-question-circle" style="font-size:18px;"></i> Help</a></li>
            <!--<li><a href="guest/order/tracking/view"></i> Order Tracking</a></li>-->
            <li class="header-cart dropdown default-dropdown"><a class="dropdown-toggle" aria-expanded="true"><i><img src="{{URL('/')}}/img/qwe.png" alt"icon" style=" margin-top:-5px;width:26px"></i> Login / Signup</a>
              <div class="custom-menu">
                <div id="shopping-cart">
                  <form method="post" action = "{{url('/')}}/login" class="login100-form validate-form p-l-55 p-r-55 p-t-178">
                    {{ csrf_field() }}
                    @if($errors->any())
                    <div class="alert alert-danger">   <strong>Danger!</strong> {{$errors->first()}} </div>
                    @endif
                    <div class="form-group">
                      <label for="username" class="cols-sm-2 control-label">Username</label>
                      <div class="cols-sm-10">
                        <div class="input-group"> <span class="input-group-addon"><i><img src="{{URL('/')}}/img/ico_thumb.png" alt"icon" style=" margin-top:-5px;width:26px"></i></span>
                          <input type="email" class="form-control" name="username" id="username"  placeholder="Username"/>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="password" class="cols-sm-2 control-label">Password</label>
                      <div class="cols-sm-10">
                        <div class="input-group"> <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                          <input type="password" class="form-control" name="password" id="password"  placeholder="Password"/>
                        </div>
                      </div>
                    </div>
                    <div class="form-group ">
                      <button target="_blank" name="submit" type="submit" class="btn btn-primary btn-lg btn-block login-button">Login</button>
                    </div>
                    <div class="forget"> <a href="{{URL('/')}}/password/reset" class="forgot-password" style="color:#232f3e !important;    line-height: 2vw;"> Recover username / password </a> </div>
                    <div class="forget"> <a href="{{URL('/')}}/signup" class="forgot-password"style="color:#232f3e !important;    line-height: 2vw;"> Create account </a> </div>
                  </form>
                </div>
              </div>
            </li>
            @endif
          </ul>
        </div>
      </div>
    </div>
    <!-- /container --> 
  </div>
  <!-- /NAVIGATION --> 
</nav>
<nav class="navbar navbar-default navbar-fixed-top hidden-sm hidden-xs"> 
  <!-- HEADER -->
  <header> 
    <!-- header -->
    <div id="header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-4">
            <div class="pull-left"> </div>
          </div>
          <div class="col-lg-4"> 
            <!-- Logo -->
            <div class="header-logo"> <a class="logo" href="{{url('/')}}/"> <img src="{{url('/')}}/./img/logo.png" alt=""> </a> </div>
            <!-- /Logo --> 
          </div>
          <div class="col-lg-4">
            <div class="pull-right"> 
              <!--contact info-->
              <div class="contact-no">
                <ul>
                  <li style="margin-bottom:6px;"><a class="mobilesOnly" href="tel:+923322743437">
                    <div class="phon-no"> <i class="fa fa-phone"></i>&nbsp; <i><img src="{{url('/')}}/img/comments-regular.svg" alt"icon" style="width:20px;margin-top: -2px;"></i>&nbsp;&nbsp; <i class="fa fa-whatsapp"></i> &nbsp;+92-332-BRIDGES (27 43 43 7) </div>
                    </a></li>
                  <li><a href="https://mail.google.com/mail/u/0/">
                    <div class="email"><i><img src="{{url('/')}}/img/envelope-regular.svg" alt"icon" style="width:20px;"></i>&nbsp; cs@supplybridges.com </div>
                    </a></li>
                </ul>
              </div>
              <!--/contact info--> 
            </div>
          </div>
        </div>
      </div>
      <!-- header --> 
    </div>
    <!-- container --> 
  </header>
  
  <!-- /HEADER --> 
  
  <!-- NAVIGATION -->
  <div id="navigation"> 
    <!-- container -->
    <div class="container-fluid">
      <div class="bgheader">
        <div id="responsive-nav"> 
          <!-- category nav -->
          <div class="category-nav" > <span  class="category-header"><i class="fa fa-angle-down"></i>Products</span>
            <ul class="category-list">
                @php
                   $main_category = DB::select("select * from main_category");
                @endphp
                		@if(count($main_category)>0)
			@foreach($main_category as $results)
              <li class="dropdown side-dropdown"> <a class="dropdown-toggle" aria-expanded="true" href="{{URL('/')}}/product/{{$results->main_category}}">{{$results->main_category}}<i class="fa fa-angle-right"></i></a>
              @php
           $sub_category = $results->main_category;
               $sub = DB::select("select * from sub_category where category = '$sub_category'");
           @endphp
           @if(count($sub)>0)
           <div class="custom-menu">
                  <div class="row">
                    <div class="col-md-5">
                      <ul class="list-links">
                        <li>
                          <h3 class="list-links-title">Sub Categories</h3>
                        </li>
                      	@foreach($sub as $results)   
                        <li class="dropdown side-dropdown"> <a class="dropdown-toggle" aria-expanded="true" href="{{URL('/')}}/product/{{$results->category}}/{{$results->sub_category}}">{{$results->sub_category}}</a>
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
                @endif
              <!--<li class="dropdown side-dropdown"> <a class="dropdown-toggle" aria-expanded="true" href="{{URL('/')}}/product/Disposable Tableware">Disposable Tableware<i class="fa fa-angle-right"></i></a>-->
              <!--  <div class="custom-menu">-->
              <!--    <div class="row">-->
              <!--      <div class="col-md-4">-->
              <!--        <ul class="list-links">-->
              <!--          <li>-->
              <!--            <h3 class="list-links-title">Categories</h3>-->
              <!--          </li>-->
              <!--          <li><a href="{{URL('/')}}/product/Disposable Tableware/Plates">Plates</a></li>-->
              <!--          <li><a href="{{URL('/')}}/product/Disposable Tableware/Cups">Cups</a></li>-->
              <!--          <li><a href="{{URL('/')}}/product/Disposable Tableware/Packaging">Packaging</a></li>-->
              <!--          <li><a href="{{URL('/')}}/product/Disposable Tableware/Froks">Froks</a></li>-->
              <!--          <li><a href="{{URL('/')}}/product/Disposable Tableware/Spoons">Spoons</a></li>-->
              <!--          <li><a href="{{URL('/')}}/product/Disposable Tableware/Lids">Lids</a></li>-->
              <!--          <li><a href="{{URL('/')}}/product/Disposable Tableware/Styrofoam">Styrofoam</a></li>-->
              <!--          <li><a href="{{URL('/')}}/product/Disposable Tableware/Plastic Containers">Plastic Containers</a></li>-->
              <!--          <li><a href="{{URL('/')}}/product/Disposable Tableware/Napkins">Napkins</a></li>-->
              <!--          <li><a href="{{URL('/')}}/product/Disposable Tableware/Polythene Gloves">Polythene Gloves</a></li>-->
              <!--          <li><a href="{{URL('/')}}/product/Disposable Tableware/Surgical Gloves">Surgical Gloves</a></li>-->
              <!--          <li><a href="{{URL('/')}}/product/Disposable Tableware/Face Mask">Face Mask</a></li>-->
              <!--          <li><a href="{{URL('/')}}/product/Disposable Tableware/Aprons">Aprons</a></li>-->
              <!--        </ul>-->
              <!--        <hr class="hidden-md hidden-lg">-->
              <!--      </div>-->
              <!--    </div>-->
              <!--  </div>-->
              <!--</li>-->
              <!--<li class="dropdown side-dropdown"> <a class="dropdown-toggle" aria-expanded="true" href="{{URL('/')}}/product/Packing Supplies">Packing Supplies<i class="fa fa-angle-right"></i></a>-->
              <!--  <div class="custom-menu">-->
              <!--    <div class="row">-->
              <!--      <div class="col-md-4">-->
              <!--        <ul class="list-links">-->
              <!--          <li>-->
              <!--            <h3 class="list-links-title">Categories</h3>-->
              <!--          </li>-->
              <!--          <li><a href="{{URL('/')}}/product/Packing Supplies/Aluminium Containers">Aluminium Containers</a></li>-->
              <!--          <li><a href="{{URL('/')}}/product/Packing Supplies/Cling Films">Cling Films</a></li>-->
              <!--          <li><a href="{{URL('/')}}/product/Packing Supplies/Zip Lock Bags">Zip Lock Bags</a></li>-->
              <!--          <li><a href="{{URL('/')}}/product/Packing Supplies/Butter Paper">Butter Paper</a></li>-->
              <!--          <li><a href="{{URL('/')}}/product/Packing Supplies/Food Safety Liners">Food Safety Liners</a></li>-->
              <!--          <li><a href="{{URL('/')}}/product/Packing Supplies/Polythene Bags">Polythene Bags</a></li>-->
              <!--          <li><a href="{{URL('/')}}/product/Packing Supplies/Straws">Straws</a></li>-->
              <!--        </ul>-->
              <!--        <hr class="hidden-md hidden-lg">-->
              <!--      </div>-->
              <!--    </div>-->
              <!--  </div>-->
              <!--</li>-->
              <!--<li class="dropdown side-dropdown"> <a class="dropdown-toggle" aria-expanded="true" href="{{URL('/')}}/product/Cleaning Supplies">Cleaning Supplies <i class="fa fa-angle-right"></i> </a>-->
              <!--  <div class="custom-menu">-->
              <!--    <div class="row">-->
              <!--      <div class="col-md-4">-->
              <!--        <ul class="list-links">-->
              <!--          <li>-->
              <!--            <h3 class="list-links-title">Categories</h3>-->
              <!--          </li>-->
              <!--          <li><a href="{{URL('/')}}/product/Cleaning Supplies/Cleaning Agents">Cleaning Agents</a></li>-->
              <!--          <li><a href="{{URL('/')}}/product/Cleaning Supplies/Cleaning Tools">Cleaning Tools</a></li>-->
              <!--          <li><a href="{{URL('/')}}/product/Cleaning Supplies/Wipers">Wipers</a></li>-->
              <!--          <li><a href="{{URL('/')}}/product/Cleaning Supplies/Brooms">Brooms</a></li>-->
              <!--          <li><a href="{{URL('/')}}/product/Cleaning Supplies/Mops">Mops</a></li>-->
              <!--          <li><a href="{{URL('/')}}/product/Cleaning Supplies/Detergents">Detergents</a></li>-->
              <!--          <li><a href="{{URL('/')}}/product/Cleaning Supplies/Dusters">Dusters</a></li>-->
              <!--          <li><a href="{{URL('/')}}/product/Cleaning Supplies/Dust Collector">Dust Collector</a></li>-->
              <!--          <li><a href="{{URL('/')}}/product/Cleaning Supplies/Dust Bins">Dust Bins</a></li>-->
              <!--          <li><a href="{{URL('/')}}/product/Cleaning Supplies/Towel">Towel</a></li>-->
              <!--          <li><a href="{{URL('/')}}/product/Cleaning Supplies/Phenyle">Phenyle</a></li>-->
              <!--          <li><a href="{{URL('/')}}/product/Cleaning Supplies/Hand Sanitizers">Hand Sanitizers</a></li>-->
              <!--          <li><a href="{{URL('/')}}/product/Cleaning Supplies/Knives">Knives</a></li>-->
              <!--          <li><a href="{{URL('/')}}/product/Cleaning Supplies/Dispensers">Dispensers</a></li>-->
              <!--          <li><a href="{{URL('/')}}/product/Cleaning Supplies/Aerosols">Aerosols</a></li>-->
              <!--          <li><a href="{{URL('/')}}/product/Cleaning Supplies/Waste Management">Waste Management</a></li>-->
              <!--        </ul>-->
              <!--        <hr class="hidden-md hidden-lg">-->
              <!--      </div>-->
              <!--    </div>-->
              <!--  </div>-->
              <!--</li>-->
              <!--<li class="dropdown side-dropdown"> <a class="dropdown-toggle" aria-expanded="true" href="{{URL('/')}}/product/Grocery Supplies">Tea and Coffee<i class="fa fa-angle-right"></i></a>-->
              <!--  <div class="custom-menu">-->
              <!--    <div class="row">-->
              <!--      <div class="col-md-4">-->
              <!--        <ul class="list-links">-->
              <!--          <li>-->
              <!--            <h3 class="list-links-title">Categories</h3>-->
              <!--          </li>-->
              <!--          <li><a href="{{URL('/')}}/product/Grocery Supplies/Canned Food">Canned Food</a></li>-->
              <!--          <li><a href="{{URL('/')}}/product/Grocery Supplies/Sauces & Seasonings">Sauces & Seasonings</a></li>-->
              <!--          <li><a href="{{URL('/')}}/product/Grocery Supplies/Sauces">Sauces</a></li>-->
              <!--          <li><a href="{{URL('/')}}/product/Grocery Supplies/Tea & Coffee">Tea & Coffee</a></li>-->
              <!--          <li><a href="{{URL('/')}}/product/Grocery Supplies/Spices">Spices</a></li>-->
              <!--          <li><a href="{{URL('/')}}/product/Grocery Supplies/Pulses">Pulses</a></li>-->
              <!--          <li><a href="{{URL('/')}}/product/Grocery Supplies/Rice">Rice</a></li>-->
              <!--          <li><a href="{{URL('/')}}/product/Grocery Supplies/Oil">Oil</a></li>-->
              <!--          <li><a href="{{URL('/')}}/product/Grocery Supplies/Beverages">Beverages</a></li>-->
              <!--        </ul>-->
              <!--        <hr class="hidden-md hidden-lg">-->
              <!--      </div>-->
              <!--    </div>-->
              <!--  </div>-->
              <!--</li>-->
              <!--<li class="dropdown side-dropdown"> <a class="dropdown-toggle" href="{{URL('/')}}/product/Electrical Supplies">Kiri Cream Cheese</a></li>-->
              <!--<li class="dropdown side-dropdown"> <a class="dropdown-toggle" aria-expanded="true" href="{{URL('/')}}/product/Office and Stationery Supplies">Stationery<i class="fa fa-angle-right"></i></a>-->
              <!--  <div class="custom-menu">-->
              <!--    <div class="row">-->
              <!--      <div class="col-md-4">-->
              <!--        <ul class="list-links">-->
              <!--          <li>-->
              <!--            <h3 class="list-links-title">Categories</h3>-->
              <!--          </li>-->
              <!--          <li><a href="{{URL('/')}}/product/Office and Stationery Supplies/Paper Rim">Paper Rim</a></li>-->
              <!--          <li><a href="{{URL('/')}}/product/Office and Stationery Supplies/Markers">Markers</a></li>-->
              <!--          <li><a href="{{URL('/')}}/product/Office and Stationery Supplies/Rubber Bands">Rubber Bands</a></li>-->
              <!--          <li><a href="{{URL('/')}}/product/Office and Stationery Supplies/POS Rolls">POS Rolls</a></li>-->
              <!--          <li><a href="{{URL('/')}}/product/Office and Stationery Supplies/Calculators">Calculators</a></li>-->
              <!--          <li><a href="{{URL('/')}}/product/Office and Stationery Supplies/Highlighters">Highlighters</a></li>-->
              <!--          <li><a href="{{URL('/')}}/product/Office and Stationery Supplies/Tapes">Tapes</a></li>-->
              <!--          <li><a href="{{URL('/')}}/product/Office and Stationery Supplies/Files">Files</a></li>-->
              <!--          <li><a href="{{URL('/')}}/product/Office and Stationery Supplies/Ball Pens">Ball Pens</a></li>-->
              <!--        </ul>-->
              <!--        <hr class="hidden-md hidden-lg">-->
              <!--      </div>-->
              <!--    </div>-->
              <!--  </div>-->
              <!--</li>-->
              <!--<li class="dropdown side-dropdown"> <a class="dropdown-toggle" href="{{URL('/')}}/product/Electrical Supplies">Industrial Supplies</a></li>-->
              <hr>
              <!--<li class="dropdown side-dropdown"> <a class="dropdown-toggle" href="">Supply Bridges Rover</a></li>-->
              <li class="dropdown side-dropdown"> <a class="dropdown-toggle" href="">Deals Center</a></li>
              <li class="dropdown side-dropdown"> <a class="dropdown-toggle" href="">Large-Order Inquiries</a></li>
              <!--<li class="dropdown side-dropdown"> <a class="dropdown-toggle" href="">Apply for Credit Line</a></li>-->
            </ul>
          </div>
          <!-- Search -->
          <div class="header-search">
            <form  role="form" action="{{url('/')}}/search" method="post" id="payment-form">
              {{ csrf_field() }}
              <input class="input search-input" type="text" name="search"  placeholder="Search for your supplies here" required>
              <button class="search-btn"><i class="fa fa-search" style="color:white;"></i></button>
            </form>
          </div>
          <!-- /Search -->
          
          <ul class="nav navbar-nav loginform navbar-right header-btns">
            <!--<li><a href="{{url('/')}}/shop">Shop</a></li>--> 
            @if(Session::has('username'))
            <li><a href="{{url('/')}}/faq"><i class="fa fa-question-circle" style="font-size:18px;"></i> Help</a></li>
            <li class="header-cart dropdown default-dropdown"> <a class="dropdown-toggle" aria-expanded="true">
              <div class="header-btns-icon"> @if(Session::has('cart')) <i><img src="{{URL('/')}}/img/gngng.png" alt"icon" style="    margin-right: 2px; margin-top:-5px; width:26px"></i>@else<i><img src="{{URL('/')}}/img/gjngng.png" alt"icon" style="    margin-right: 2px;width:26px;margin-top:-5px;"></i>@endif <span class="qty"> {{Session::has('cart') ? Session::get('cart')->totalQty : '0'}} </span> </div>
              <strong>My Order</strong></a>
              <div class="custom-menu">
                <div id="shopping-cart"> @if(Session::has('cart'))
                  @foreach($products as $product)
                  <div class="shopping-cart-list">
                    <div class="product product-widget">
                      <div class="product-thumb"> <img src="{{URL('/')}}/storage/images/{{$product['item']->thumbnail}}" alt=""> </div>
                      <div class="product-body">
                        <h3 class="product-price">PKR {{$product['item']->price}} <span class="qty badge ">{{$product['qty']}}</span></h3>
                        <h2 class="product-name"> {{$product['item']->name}}</h2>
                      </div>
                       <a href="{{URL('/')}}/remove/item/cart/{{$product['item']->pk_id}}/{{$product['size']}}/{{$product['qty']}}">  <button class="cancel-btn"><i class="fa fa-trash"></i></button></a>
                    </div>
                  </div>
                  @endforeach
                  
                  @endif
                  <div class="shopping-cart-btns">@if(Session::has('cart')) @if(Session::get('cart')->totalQty > 0 ) <a class="main-btn" href="{{URL('/')}}/cart" style="color:#232f3e !important;">View Cart</a> @if(Session::has('username'))
                    <td><a href="{{url('/')}}/cart/checkout"  class="primary-btn add-to-cart"> Checkout <span class="glyphicon glyphicon-play"></span></a></td>
                    @else
                    <td><a href="{{url('/')}}/cart/guest/checkout"  class="primary-btn add-to-cart">Checkout <span class="glyphicon glyphicon-play"></span> </a></td>
                    @endif
                    @endif
                    @else
                    <td><p style="font-size:14px">Your cart is empty</p></td>
                    @endif </div>
                </div>
              </div>
            </li>
            <li class="dropdown dropdown-btn"> <a class="dropdown-toggle">
              <div>{{session::get('name')}}<span class="caret"></span></div>
              </a >
              <ul class="dropdown-menu">
                  <li><a href="#" style="color:#232f3e !important;">My Account</a></li>
                  <li><a href="{{URL('/')}}/guest/order/tracking/view" style="color:#232f3e !important;">Order Tracking</a></li>
                  <li><a href="#" style="color:#232f3e !important;">Order History</a></li>
                  <li><a href="{{URL('/')}}/edit_profile" style="color:#232f3e !important;">Edit Profile</a></li>
                <li><a href="{{URL('/')}}/logout" style="color:#232f3e !important;">Logout</a></li>
              </ul>
            </li>
            <!--<li class="dropdown dropdown-btn"> <a class="dropdown-toggle">-->
            <!--  <div id="uniqueId2">Wishlist<span class="caret"></span></div>-->
            <!--  </a >-->
            <!--  <ul class="dropdown-menu">-->
            <!--    <li><a href="{{URL('/')}}/search/wishlist" style="color:#232f3e !important;">Wishlist</a></li>-->
            <!--    <li><a href="{{URL('/')}}/view/wishlist" style="color:#232f3e !important;">View My Wishlist</a></li>-->
            <!--  </ul>-->
            <!--</li>-->
            @else 
            <!--<li><a href="guest/order/tracking/view"></i> Order Tracking</a></li>-->
            <li class="header-cart dropdown default-dropdown"> <a class="dropdown-toggle" aria-expanded="true">
              <div class="header-btns-icon"> @if(Session::has('cart')) <i><img src="{{URL('/')}}/img/gngng.png" alt"icon" style="    margin-right: 2px; margin-top:-5px;width:26px"></i>@else<i><img src="{{URL('/')}}/img/gjngng.png" alt"icon" style="    margin-right: 2px;margin-top:-5px;width:26px"></i> @endif <span class="qty"> {{Session::has('cart') ? Session::get('cart')->totalQty : '0'}} </span> </div>
              <strong>My Order</strong> </a>
              <div class="custom-menu">
                <div id="shopping-cart"> @if(Session::has('cart'))
                  @foreach($products as $product)
                  <div class="shopping-cart-list">
                    <div class="product product-widget">
                      <div class="product-thumb"> <img src="{{URL('/')}}/storage/images/{{$product['item']->thumbnail}}" alt=""> </div>
                      <div class="product-body">
                        <h3 class="product-price">PKR {{$product['item']->price}} <span class="qty badge ">{{$product['qty']}}</span></h3>
                        <h2 class="product-name"> {{$product['item']->name}}</h2>
                      </div>
                        <a href="{{URL('/')}}/remove/item/cart/{{$product['item']->pk_id}}/{{$product['size']}}/{{$product['qty']}}">  <button class="cancel-btn"><i class="fa fa-trash"></i></button></a>
                    </div>
                  </div>
                  @endforeach
                  @endif
                  <div class="shopping-cart-btns">@if(Session::has('cart')) @if(Session::get('cart')->totalQty > 0 ) <a class="main-btn" href="{{URL('/')}}/cart" style="color:#232f3e !important;">View Cart</a> @if(Session::has('username'))
                    <td><a href="{{url('/')}}/cart/checkout"  class="primary-btn add-to-cart"> Checkout <span class="glyphicon glyphicon-play"></span></a></td>
                    @else
                    <td><a href="{{url('/')}}/cart/guest/checkout"  class="primary-btn add-to-cart">Checkout <span class="glyphicon glyphicon-play"></span> </a></td>
                    @endif 
                    @endif
                    @else
                    <td><p style="font-size:14px">Your cart is empty</p></td>
                    @endif </div>
                </div>
              </div>
            </li>
            <li><a href="{{url('/')}}/faq"><i class="fa fa-question-circle" style="font-size:18px;"></i> Help</a></li>
            <li class="header-cart dropdown default-dropdown"><a class="dropdown-toggle" aria-expanded="true"><i><img src="{{URL('/')}}/img/qwe.png" alt"icon" style=" margin-top:-5px;width:26px"></i> Log In / Signup</a>
              <div class="custom-menu">
                <div id="shopping-cart">
                  <form method="post" action = "{{url('/')}}/login" class="login100-form validate-form p-l-55 p-r-55 p-t-178">
                    {{ csrf_field() }}
                    @if($errors->any())
                    <div class="alert alert-danger">   <strong>Danger!</strong> {{$errors->first()}} </div>
                    @endif
                    <div class="form-group">
                      <label for="username" class="cols-sm-2 control-label">Username</label>
                      <div class="cols-sm-10">
                        <div class="input-group"> <span class="input-group-addon"><i><img src="{{URL('/')}}/img/ico_thumb.png" alt"icon" style=" margin-top:-5px;width:26px"></i></span>
                          <input type="email" class="form-control" name="username" id="username"  placeholder="Username"/>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="password" class="cols-sm-2 control-label">Password</label>
                      <div class="cols-sm-10">
                        <div class="input-group"> <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                          <input type="password" class="form-control" name="password" id="password"  placeholder="Password"/>
                        </div>
                      </div>
                    </div>
                    <div class="form-group ">
                      <button target="_blank" name="submit" type="submit" class="btn btn-primary btn-lg btn-block login-button">Log In</button>
                    </div>
                    <div class="forget"> <a href="{{URL('/')}}/password/reset" class="forgot-password" style="color:#232f3e !important;    line-height: 2vw;"> Recover username / password </a> </div>
                    <div class="forget"> <a href="{{URL('/')}}/signup" class="forgot-password"style="color:#232f3e !important;    line-height: 2vw;"> Create account </a> </div>
                  </form>
                </div>
              </div>
            </li>
            @endif
          </ul>
        </div>
      </div>
    </div>
    <!-- /container --> 
  </div>
  
  <!-- /NAVIGATION --> 
</nav>
<!-- HOME -->
<div id="home"> 
  
  <!-- container -->
  <div class="container-fluid "> 
    <!-- home wrap -->
    <div class="home-wrap">
      <div class="row"> 
        <!--<div class="col-lg-3 hidden-sm hidden-xs">--> 
        <!--  <ul class="category-list1">--> 
        <!--    <li class="dropdown side-dropdown"> <a class="dropdown-toggle" aria-expanded="true" href="{{URL('/')}}/product/Hygiene Supplies">Hygiene Supplies<i class="fa fa-angle-right"></i></a>--> 
        <!--      <div class="custom-menu">--> 
        <!--        <div class="row">--> 
        <!--          <div class="col-md-4">--> 
        <!--            <ul class="list-links">--> 
        <!--              <li>--> 
        <!--                <h3 class="list-links-title">Categories</h3>--> 
        <!--              </li>--> 
        <!--              <li><a href="{{URL('/')}}/product/Hygiene Supplies/Tissues">Tissues</a></li>--> 
        <!--            </ul>--> 
        <!--            <hr class="hidden-md hidden-lg">--> 
        <!--          </div>--> 
        <!--        </div>--> 
        <!--      </div>--> 
        <!--    </li>--> 
        <!--    <li class="dropdown side-dropdown"> <a class="dropdown-toggle" aria-expanded="true" href="{{URL('/')}}/product/Disposable Tableware">Disposable Tableware<i class="fa fa-angle-right"></i></a>--> 
        <!--      <div class="custom-menu">--> 
        <!--        <div class="row">--> 
        <!--          <div class="col-md-4">--> 
        <!--            <ul class="list-links">--> 
        <!--              <li>--> 
        <!--                <h3 class="list-links-title">Categories</h3>--> 
        <!--              </li>--> 
        <!--              <li><a href="{{URL('/')}}/product/Disposable Tableware/Plates">Plates</a></li>--> 
        <!--              <li><a href="{{URL('/')}}/product/Disposable Tableware/Cups">Cups</a></li>--> 
        <!--              <li><a href="{{URL('/')}}/product/Disposable Tableware/Packaging">Packaging</a></li>--> 
        <!--              <li><a href="{{URL('/')}}/product/Disposable Tableware/Froks">Froks</a></li>--> 
        <!--              <li><a href="{{URL('/')}}/product/Disposable Tableware/Spoons">Spoons</a></li>--> 
        <!--              <li><a href="{{URL('/')}}/product/Disposable Tableware/Lids">Lids</a></li>--> 
        <!--              <li><a href="{{URL('/')}}/product/Disposable Tableware/Styrofoam">Styrofoam</a></li>--> 
        <!--              <li><a href="{{URL('/')}}/product/Disposable Tableware/Plastic Containers">Plastic Containers</a></li>--> 
        <!--              <li><a href="{{URL('/')}}/product/Disposable Tableware/Napkins">Napkins</a></li>--> 
        <!--              <li><a href="{{URL('/')}}/product/Disposable Tableware/Polythene Gloves">Polythene Gloves</a></li>--> 
        <!--              <li><a href="{{URL('/')}}/product/Disposable Tableware/Surgical Gloves">Surgical Gloves</a></li>--> 
        <!--              <li><a href="{{URL('/')}}/product/Disposable Tableware/Face Mask">Face Mask</a></li>--> 
        <!--              <li><a href="{{URL('/')}}/product/Disposable Tableware/Aprons">Aprons</a></li>--> 
        <!--            </ul>--> 
        <!--            <hr class="hidden-md hidden-lg">--> 
        <!--          </div>--> 
        <!--        </div>--> 
        <!--      </div>--> 
        <!--    </li>--> 
        <!--    <li class="dropdown side-dropdown"> <a class="dropdown-toggle" aria-expanded="true" href="{{URL('/')}}/product/Packing Supplies">Packing Supplies<i class="fa fa-angle-right"></i></a>--> 
        <!--      <div class="custom-menu">--> 
        <!--        <div class="row">--> 
        <!--          <div class="col-md-4">--> 
        <!--            <ul class="list-links">--> 
        <!--              <li>--> 
        <!--                <h3 class="list-links-title">Categories</h3>--> 
        <!--              </li>--> 
        <!--              <li><a href="{{URL('/')}}/product/Packing Supplies/Aluminium Containers">Aluminium Containers</a></li>--> 
        <!--              <li><a href="{{URL('/')}}/product/Packing Supplies/Cling Films">Cling Films</a></li>--> 
        <!--              <li><a href="{{URL('/')}}/product/Packing Supplies/Zip Lock Bags">Zip Lock Bags</a></li>--> 
        <!--              <li><a href="{{URL('/')}}/product/Packing Supplies/Butter Paper">Butter Paper</a></li>--> 
        <!--              <li><a href="{{URL('/')}}/product/Packing Supplies/Food Safety Liners">Food Safety Liners</a></li>--> 
        <!--              <li><a href="{{URL('/')}}/product/Packing Supplies/Polythene Bags">Polythene Bags</a></li>--> 
        <!--              <li><a href="{{URL('/')}}/product/Packing Supplies/Straws">Straws</a></li>--> 
        <!--            </ul>--> 
        <!--            <hr class="hidden-md hidden-lg">--> 
        <!--          </div>--> 
        <!--        </div>--> 
        <!--      </div>--> 
        <!--    </li>--> 
        <!--    <li class="dropdown side-dropdown"> <a class="dropdown-toggle" aria-expanded="true" href="{{URL('/')}}/product/Cleaning Supplies">Cleaning Supplies <i class="fa fa-angle-right"></i> </a>--> 
        <!--      <div class="custom-menu">--> 
        <!--        <div class="row">--> 
        <!--          <div class="col-md-4">--> 
        <!--            <ul class="list-links">--> 
        <!--              <li>--> 
        <!--                <h3 class="list-links-title">Categories</h3>--> 
        <!--              </li>--> 
        <!--              <li><a href="{{URL('/')}}/product/Cleaning Supplies/Cleaning Agents">Cleaning Agents</a></li>--> 
        <!--              <li><a href="{{URL('/')}}/product/Cleaning Supplies/Cleaning Tools">Cleaning Tools</a></li>--> 
        <!--              <li><a href="{{URL('/')}}/product/Cleaning Supplies/Wipers">Wipers</a></li>--> 
        <!--              <li><a href="{{URL('/')}}/product/Cleaning Supplies/Brooms">Brooms</a></li>--> 
        <!--              <li><a href="{{URL('/')}}/product/Cleaning Supplies/Mops">Mops</a></li>--> 
        <!--              <li><a href="{{URL('/')}}/product/Cleaning Supplies/Detergents">Detergents</a></li>--> 
        <!--              <li><a href="{{URL('/')}}/product/Cleaning Supplies/Dusters">Dusters</a></li>--> 
        <!--              <li><a href="{{URL('/')}}/product/Cleaning Supplies/Dust Collector">Dust Collector</a></li>--> 
        <!--              <li><a href="{{URL('/')}}/product/Cleaning Supplies/Dust Bins">Dust Bins</a></li>--> 
        <!--              <li><a href="{{URL('/')}}/product/Cleaning Supplies/Towel">Towel</a></li>--> 
        <!--              <li><a href="{{URL('/')}}/product/Cleaning Supplies/Phenyle">Phenyle</a></li>--> 
        <!--              <li><a href="{{URL('/')}}/product/Cleaning Supplies/Hand Sanitizers">Hand Sanitizers</a></li>--> 
        <!--              <li><a href="{{URL('/')}}/product/Cleaning Supplies/Knives">Knives</a></li>--> 
        <!--              <li><a href="{{URL('/')}}/product/Cleaning Supplies/Dispensers">Dispensers</a></li>--> 
        <!--              <li><a href="{{URL('/')}}/product/Cleaning Supplies/Aerosols">Aerosols</a></li>--> 
        <!--              <li><a href="{{URL('/')}}/product/Cleaning Supplies/Waste Management">Waste Management</a></li>--> 
        <!--            </ul>--> 
        <!--            <hr class="hidden-md hidden-lg">--> 
        <!--          </div>--> 
        <!--        </div>--> 
        <!--      </div>--> 
        <!--    </li>--> 
        <!--    <li class="dropdown side-dropdown"> <a class="dropdown-toggle" aria-expanded="true" href="{{URL('/')}}/product/Grocery Supplies">Groceries<i class="fa fa-angle-right"></i></a>--> 
        <!--      <div class="custom-menu">--> 
        <!--        <div class="row">--> 
        <!--          <div class="col-md-4">--> 
        <!--            <ul class="list-links">--> 
        <!--              <li>--> 
        <!--                <h3 class="list-links-title">Categories</h3>--> 
        <!--              </li>--> 
        <!--              <li><a href="{{URL('/')}}/product/Grocery Supplies/Canned Food">Canned Food</a></li>--> 
        <!--              <li><a href="{{URL('/')}}/product/Grocery Supplies/Sauces & Seasonings">Sauces & Seasonings</a></li>--> 
        <!--              <li><a href="{{URL('/')}}/product/Grocery Supplies/Sauces">Sauces</a></li>--> 
        <!--              <li><a href="{{URL('/')}}/product/Grocery Supplies/Tea & Coffee">Tea & Coffee</a></li>--> 
        <!--              <li><a href="{{URL('/')}}/product/Grocery Supplies/Spices">Spices</a></li>--> 
        <!--              <li><a href="{{URL('/')}}/product/Grocery Supplies/Pulses">Pulses</a></li>--> 
        <!--              <li><a href="{{URL('/')}}/product/Grocery Supplies/Rice">Rice</a></li>--> 
        <!--              <li><a href="{{URL('/')}}/product/Grocery Supplies/Oil">Oil</a></li>--> 
        <!--              <li><a href="{{URL('/')}}/product/Grocery Supplies/Beverages">Beverages</a></li>--> 
        <!--            </ul>--> 
        <!--            <hr class="hidden-md hidden-lg">--> 
        <!--          </div>--> 
        <!--        </div>--> 
        <!--      </div>--> 
        <!--    </li>--> 
        
        <!--    <li class="dropdown side-dropdown"> <a class="dropdown-toggle" aria-expanded="true" href="{{URL('/')}}/product/Office and Stationery Supplies">Stationery Supplies<i class="fa fa-angle-right"></i></a>--> 
        <!--      <div class="custom-menu">--> 
        <!--        <div class="row">--> 
        <!--          <div class="col-md-4">--> 
        <!--            <ul class="list-links">--> 
        <!--              <li>--> 
        <!--                <h3 class="list-links-title">Categories</h3>--> 
        <!--              </li>--> 
        <!--              <li><a href="{{URL('/')}}/product/Office and Stationery Supplies/Paper Rim">Paper Rim</a></li>--> 
        <!--              <li><a href="{{URL('/')}}/product/Office and Stationery Supplies/Markers">Markers</a></li>--> 
        <!--              <li><a href="{{URL('/')}}/product/Office and Stationery Supplies/Rubber Bands">Rubber Bands</a></li>--> 
        <!--              <li><a href="{{URL('/')}}/product/Office and Stationery Supplies/POS Rolls">POS Rolls</a></li>--> 
        <!--              <li><a href="{{URL('/')}}/product/Office and Stationery Supplies/Calculators">Calculators</a></li>--> 
        <!--              <li><a href="{{URL('/')}}/product/Office and Stationery Supplies/Highlighters">Highlighters</a></li>--> 
        <!--              <li><a href="{{URL('/')}}/product/Office and Stationery Supplies/Tapes">Tapes</a></li>--> 
        <!--              <li><a href="{{URL('/')}}/product/Office and Stationery Supplies/Files">Files</a></li>--> 
        <!--              <li><a href="{{URL('/')}}/product/Office and Stationery Supplies/Ball Pens">Ball Pens</a></li>--> 
        <!--            </ul>--> 
        <!--            <hr class="hidden-md hidden-lg">--> 
        <!--          </div>--> 
        <!--        </div>--> 
        <!--      </div>--> 
        <!--    </li>--> 
        <!--    <li class="dropdown side-dropdown"> <a class="dropdown-toggle" href="{{URL('/')}}/product/Electrical Supplies">Industrial Supplies</a></li>--> 
        <!--    <hr>--> 
        <!--    <li class="dropdown side-dropdown"> <a class="dropdown-toggle" href="">Supply Bridges Rover</a></li>--> 
        <!--    <li class="dropdown side-dropdown"> <a class="dropdown-toggle" href="">Deals Center</a></li>--> 
        <!--    <li class="dropdown side-dropdown"> <a class="dropdown-toggle" href="">Large-Order Inquiries</a></li>--> 
        <!--    <li class="dropdown side-dropdown"> <a class="dropdown-toggle" href="">Apply for Credit Line</a></li>--> 
        <!--  </ul>--> 
        <!--</div>--> 
        <!-- home slick -->
        <div>
          <div id="home-slick"> @if($errors->any())
            <div class="alert alert-danger">   <strong>Danger!</strong> {{$errors->first()}} </div>
            @endif 
            <!-- banner -->
            <div class="banner banner-1"> <img src="{{url('/')}}/img/Webbanner.jpg" alt=""> </div>
            <!-- /banner -->
            <div class="banner banner-1"> <img src="{{url('/')}}/img/Webbanner.jpg" alt=""> </div>
          </div>
        </div>
      </div>
    </div>
    <!-- /home slick --> 
  </div>
  <!-- /home wrap --> 
</div>
<!-- /container -->

<div class="grad">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="salog">
          <h3>FREE SHIPPING IN LAHORE - FOR ORDERS RS. 5,000 AND ABOVE</h3>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- /HOME -->
<div class="bg2">
  <div class="container-fluid">
    <div class="bgsection"> 
      <!--<div class="section2">--> 
      <!--  <div class="row">--> 
      <!--    <div class="col-md-6 col-sm-6">--> 
      <!--      <div class="single-promo promo1"> <i class="fa fa-refresh"></i>--> 
      <!--        <p>24/7 SUPPORT</p>--> 
      <!--      </div>--> 
      <!--    </div>--> 
      <!--    <div class="col-md-6 col-sm-6">--> 
      <!--      <div class="single-promo promo1"> <i class="fa fa-truck"></i>--> 
      <!--        <p>30-DAY RETURN</p>--> 
      <!--      </div>--> 
      <!--    </div>--> 
      <!--  </div>--> 
      <!--  <div class="row">--> 
      <!--    <div class="col-md-6 col-sm-6">--> 
      <!--      <div class="single-promo promo1"> <i class="fa fa-lock"></i>--> 
      <!--        <p>FREE SHIPPING</p>--> 
      <!--      </div>--> 
      <!--    </div>--> 
      <!--    <div class="col-md-6 col-sm-6">--> 
      <!--      <div class="single-promo promo1"> <i class="fa fa-gift"></i>--> 
      <!--        <p>SAFE SHOPPING</p>--> 
      <!--      </div>--> 
      <!--    </div>--> 
      <!--  </div>--> 
      <!--</div>-->
      <div class="section">
        <div class="row">
          <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="bannershowheading">
              <h3 style="color:#232f3e;">Packing Supplies</h3>
            </div>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="boxleft" id="packing">
              <h3></h3>
            </div>
          </div>
          <div class="col-lg-12 col-sm-hide col-md-hide">
            <div class="border"></div>
          </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                </div>
          <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
            <div class="productslider"> <img src="{{URL('/')}}/img/gofy.png" alt="logo"> </div>
          </div>
         <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
            <div class="productslider"> <img src="{{URL('/')}}/img/spel.png" alt="logo"> </div>
          </div>
          <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3"></div>
          <hr>
        </div>
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12"> @if(count($result)>0)
            @foreach($result as $results)
          
          
            <div class="col-lg-3 col-md-3 col-sm-12"> 
              <!-- Product Single -->
              <div class="product product-single">
                <div class="product-thumb">
                  <button class="main-btn quick-view"  data-toggle="modal" data-target="#myModal{{$results->pk_id}}"><i class="fa fa-search-plus"></i> Quick view</button>
                  <img src="{{URL('/')}}/storage/images/{{$results->thumbnail}}" alt=""> </div>
                <div class="product-body"> 
                  
                  <!--<h3 class="product-price"> PKR {{ $results->price - (($results->price*$results->pk_id)/100)}} <del class="product-old-price">PKR {{$results->price}}</del></h3><br>
                <label class="label label-success">Off {{$results->pk_id}}%</label>-->
                 <a href="{{URL('/')}}/products/details/{{$results->pk_id}}/{{$results->sku}}"> <h2 class="product-name" style="margin-top: 10px;">{{$results->title}}</h2></a>
                  
                  <!--<form method="post" action = "{{url('/')}}/product/add/wishlist/{{$results->pk_id}}" class="login100-form validate-form p-l-55 p-r-55 p-t-178">
			{{ csrf_field() }}
                <div class="product-btns">
                  <button class="main-btn icon-btn submit" name = "submit" type="submit"><i class="fa fa-heart"></i></button>
                <button type="button" class="primary-btn add-to-cart" data-toggle="modal" data-target="#myModal{{$results->pk_id}}"><i class="fa fa-shopping-cart"></i> Add to Cart</button>
               
                </div>
                </form>--> 
                </div>
              </div>
              
              <!-- Modal -->
              <div class="modal fade" id="myModal{{$results->pk_id}}" role="dialog">
                <div class="modal-dialog"> 
                  
                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">{{$results->category}}</h4>
                    </div>
                    <div class="modal-body"> 
                      <!-- row -->
                      
                      <form method="post" action = "{{url('/')}}/product/add/cart/{{$results->pk_id}}" class="login100-form validate-form p-l-55 p-r-55 p-t-178">
                        {{ csrf_field() }}
                        <div class="row">
                          <div class="col-lg-4">
                            <div class="product_img"> <img src="{{URL('/')}}/storage/images/{{$results->thumbnail}}" alt=""> </div>
                          </div>
                          <div class="col-lg-8">
                            <div class="product-body">
							
							<div class="col-lg-12"><a href="{{URL('/')}}/products/details/{{$results->pk_id}}/{{$results->sku}}"><h3 class="product-name">{{$results->title}}</h3></a></div>
							  @php
							    date_default_timezone_set("Asia/Karachi");
        $date = date('Y-m-d');
              $d = DB::select("select * from discount_table where sku  = '$results->sku' and (start_date < '$date' or start_date = '$date') and (end_date > '$date' or end_date = '$date') ");
 
            @endphp
							<div class="col-lg-12">@if(count($d)>0)
							<h3 class="product-price" style="margin-bottom:25px;">PKR {{number_format($discount_price)}} / {{$result[0]->sku}} <div class="product-old-price">PKR {{number_format($d[0]->price)}} / {{$result[0]->sku}}</div></h3>
							@else
	
	@php
	$product_id = $results->QB_id;
	    $product_id = DB::select("select * from pricing_detail where product_id = '$product_id' and quantity = 1"); 
	@endphp
	<h3 class="product-price"  style="margin-bottom:25px;">PKR {{number_format($product_id[0]->price)}} / {{$results->sku}} </h3>
@endif
   

@php
      $product_id = $results->QB_id;
      $pricing_detail = DB::select("select * from pricing_detail where product_id = '$product_id' order by pk_id asc"); 
      @endphp
      
                                    	       @foreach($pricing_detail as $detail)
                                    	          <h3 class="product-price" style="margin-bottom:25px;">PKR {{number_format($detail->price)}} / {{$detail->quantity}}</h3>
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
				
							<div class="col-lg-12"><h5 class="product-name">{{$results->description}}</h5></div>
<div class="col-lg-12">
							<div class="product-btns">
							
								<button type="submit" name"submit" class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Add to Cart</button>
                                				
								
							</div>
							</div>
						</div>
                          </div>
                        </div>
                      </form>
                      <!-- /Product Details --> 
                    </div>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
            @endif
            
       </div>
        </div>
        <div class="row">
          <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="bannershowheading">
              <h3 style="color:#232f3e;">Hygiene Supplies</h3>
            </div>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="boxleft" id="hygiene">
              <h3></h3>
            </div>
          </div>
          <div class="col-lg-12 col-sm-hide col-md-hide">
            <div class="border"></div>
          </div>
        </div>
        <div class="row">
         <div class="col-lg-12 col-md-12 col-sm-12"> @if(count($result1)>0)
            @foreach($result1 as $results)
          
          
           <div class="col-lg-3 col-md-3 col-sm-12"> 
              <!-- Product Single -->
              <div class="product product-single">
                <div class="product-thumb">
                  <button class="main-btn quick-view"  data-toggle="modal" data-target="#myModal{{$results->pk_id}}"><i class="fa fa-search-plus"></i> Quick view</button>
                  <img src="{{URL('/')}}/storage/images/{{$results->thumbnail}}" alt=""> </div>
                <div class="product-body"> 
                  
                  <!--<h3 class="product-price"> PKR {{ $results->price - (($results->price*$results->pk_id)/100)}} <del class="product-old-price">PKR {{$results->price}}</del></h3><br>
                <label class="label label-success">Off {{$results->pk_id}}%</label>-->
                 <a href="{{URL('/')}}/products/details/{{$results->pk_id}}/{{$results->sku}}"> <h2 class="product-name" style="margin-top: 10px;">{{$results->title}}</h2></a>
                  
                  <!--<form method="post" action = "{{url('/')}}/product/add/wishlist/{{$results->pk_id}}" class="login100-form validate-form p-l-55 p-r-55 p-t-178">
			{{ csrf_field() }}
                <div class="product-btns">
                  <button class="main-btn icon-btn submit" name = "submit" type="submit"><i class="fa fa-heart"></i></button>
                <button type="button" class="primary-btn add-to-cart" data-toggle="modal" data-target="#myModal{{$results->pk_id}}"><i class="fa fa-shopping-cart"></i> Add to Cart</button>
               
                </div>
                </form>--> 
                </div>
              </div>
              
              <!-- Modal -->
              <div class="modal fade" id="myModal{{$results->pk_id}}" role="dialog">
                <div class="modal-dialog"> 
                  
                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">{{$results->category}}</h4>
                    </div>
                    <div class="modal-body"> 
                      <!-- row -->
                      
                      <form method="post" action = "{{url('/')}}/product/add/cart/{{$results->pk_id}}" class="login100-form validate-form p-l-55 p-r-55 p-t-178">
                        {{ csrf_field() }}
                        <div class="row">
                          <div class="col-lg-4">
                            <div class="product_img"> <img src="{{URL('/')}}/storage/images/{{$results->thumbnail}}" alt=""> </div>
                          </div>
                          <div class="col-lg-8">
                            <div class="product-body">
							
							<div class="col-lg-12"><a href="{{URL('/')}}/products/details/{{$results->pk_id}}/{{$results->sku}}"><h3 class="product-name">{{$results->title}}</h3></a></div>
							  @php
							    date_default_timezone_set("Asia/Karachi");
        $date = date('Y-m-d');
              $d = DB::select("select * from discount_table where sku  = '$results->sku' and (start_date < '$date' or start_date = '$date') and (end_date > '$date' or end_date = '$date') ");
 
            @endphp
							<div class="col-lg-12">@if(count($d)>0)
							<h3 class="product-price" style="margin-bottom:25px;">PKR {{number_format($discount_price)}} / {{$result[0]->sku}} <div class="product-old-price">PKR {{number_format($d[0]->price)}} / {{$result[0]->sku}}</div></h3>
							@else
	
	@php
	$product_id = $results->QB_id;
	    $product_id = DB::select("select * from pricing_detail where product_id = '$product_id' and quantity = 1"); 
	@endphp
	<h3 class="product-price"  style="margin-bottom:25px;">PKR {{number_format($product_id[0]->price)}} / {{$results->sku}} </h3>
@endif
   

@php
      $product_id = $results->QB_id;
      $pricing_detail = DB::select("select * from pricing_detail where product_id = '$product_id' order by pk_id asc"); 
      @endphp
      
                                    	       @foreach($pricing_detail as $detail)
                                    	          <h3 class="product-price" style="margin-bottom:25px;">PKR {{number_format($detail->price)}} / {{$detail->quantity}}</h3>
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
				
							<div class="col-lg-12"><h5 class="product-name">{{$results->description}}</h5></div>
<div class="col-lg-12">
							<div class="product-btns">
							
								<button type="submit" name"submit" class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Add to Cart</button>
                                				
								
							</div>
							</div>
						</div>
                          </div>
                        </div>
                      </form>
                      <!-- /Product Details --> 
                    </div>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
            @endif
            
       </div>
        </div>
        <div class="row">
          <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="bannershowheading">
              <h3 style="color:#232f3e;">Disposable Tableware</h3>
            </div>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="boxleft" id="disposable">
              <h3></h3>
            </div>
          </div>
          <div class="col-lg-12 col-sm-hide col-md-hide">
            <div class="border"></div>
          </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3"></div>
          <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
            <div class="productslider"> <img src="{{URL('/')}}/img/lucky plastic.png" alt="logo"> </div>
          </div>
          <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
            <div class="productslider"> <img src="{{URL('/')}}/img/gofy.png" alt="logo"> </div>
          </div>
          <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3"></div>
          <hr>
        </div>
        <div class="row">
           <div class="col-lg-12 col-md-12 col-sm-12"> @if(count($result2)>0)
            @foreach($result2 as $results)
          
          
           <div class="col-lg-3 col-md-3 col-sm-12"> 
              <!-- Product Single -->
              <div class="product product-single">
                <div class="product-thumb">
                  <button class="main-btn quick-view"  data-toggle="modal" data-target="#myModal{{$results->pk_id}}"><i class="fa fa-search-plus"></i> Quick view</button>
                  <img src="{{URL('/')}}/storage/images/{{$results->thumbnail}}" alt=""> </div>
                <div class="product-body"> 
                  
                  <!--<h3 class="product-price"> PKR {{ $results->price - (($results->price*$results->pk_id)/100)}} <del class="product-old-price">PKR {{$results->price}}</del></h3><br>
                <label class="label label-success">Off {{$results->pk_id}}%</label>-->
                 <a href="{{URL('/')}}/products/details/{{$results->pk_id}}/{{$results->sku}}"> <h2 class="product-name" style="margin-top: 10px;">{{$results->title}}</h2></a>
                  
                  <!--<form method="post" action = "{{url('/')}}/product/add/wishlist/{{$results->pk_id}}" class="login100-form validate-form p-l-55 p-r-55 p-t-178">
			{{ csrf_field() }}
                <div class="product-btns">
                  <button class="main-btn icon-btn submit" name = "submit" type="submit"><i class="fa fa-heart"></i></button>
                <button type="button" class="primary-btn add-to-cart" data-toggle="modal" data-target="#myModal{{$results->pk_id}}"><i class="fa fa-shopping-cart"></i> Add to Cart</button>
               
                </div>
                </form>--> 
                </div>
              </div>
              
              <!-- Modal -->
              <div class="modal fade" id="myModal{{$results->pk_id}}" role="dialog">
                <div class="modal-dialog"> 
                  
                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">{{$results->category}}</h4>
                    </div>
                    <div class="modal-body"> 
                      <!-- row -->
                      
                      <form method="post" action = "{{url('/')}}/product/add/cart/{{$results->pk_id}}" class="login100-form validate-form p-l-55 p-r-55 p-t-178">
                        {{ csrf_field() }}
                        <div class="row">
                          <div class="col-lg-4">
                            <div class="product_img"> <img src="{{URL('/')}}/storage/images/{{$results->thumbnail}}" alt=""> </div>
                          </div>
                          <div class="col-lg-8">
                            <div class="product-body">
							
							<div class="col-lg-12"><a href="{{URL('/')}}/products/details/{{$results->pk_id}}/{{$results->sku}}"><h3 class="product-name">{{$results->title}}</h3></a></div>
							  @php
							    date_default_timezone_set("Asia/Karachi");
        $date = date('Y-m-d');
              $d = DB::select("select * from discount_table where sku  = '$results->sku' and (start_date < '$date' or start_date = '$date') and (end_date > '$date' or end_date = '$date') ");
 
            @endphp
							<div class="col-lg-12">@if(count($d)>0)
							<h3 class="product-price" style="margin-bottom:25px;">PKR {{number_format($discount_price)}} / {{$result[0]->sku}} <div class="product-old-price">PKR {{number_format($d[0]->price)}} / {{$result[0]->sku}}</div></h3>
							@else
	
	@php
	$product_id = $results->QB_id;
	    $product_id = DB::select("select * from pricing_detail where product_id = '$product_id' and quantity = 1"); 
	@endphp
	<h3 class="product-price"  style="margin-bottom:25px;">PKR {{number_format($product_id[0]->price)}} / {{$results->sku}} </h3>
@endif
   

@php
      $product_id = $results->QB_id;
      $pricing_detail = DB::select("select * from pricing_detail where product_id = '$product_id' order by pk_id asc"); 
      @endphp
      
                                    	       @foreach($pricing_detail as $detail)
                                    	          <h3 class="product-price" style="margin-bottom:25px;">PKR {{number_format($detail->price)}} / {{$detail->quantity}}</h3>
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
				
							<div class="col-lg-12"><h5 class="product-name">{{$results->description}}</h5></div>
<div class="col-lg-12">
							<div class="product-btns">
							
								<button type="submit" name"submit" class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Add to Cart</button>
                                				
								
							</div>
							</div>
						</div>
                          </div>
                        </div>
                      </form>
                      <!-- /Product Details --> 
                    </div>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
            @endif
            
       </div>
        </div>
        <div class="row">
          <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="bannershowheading">
              <h3 style="color:#232f3e;">Janitorial Supplies</h3>
            </div>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="boxleft" id="cleaning">
              <h3></h3>
            </div>
          </div>
          <div class="col-lg-12 col-sm-hide col-md-hide">
            <div class="border"></div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-2 col-md-2 col-sm-2  col-xs-2">
            <div class="productslider"> <img src="{{URL('/')}}/img/lemon max (2).png" alt="logo"> </div>
          </div>
          <div class="col-lg-2 col-md-2 col-sm-2  col-xs-2">
            <div class="productslider"> <img src="{{URL('/')}}/img/mortein.png" alt="logo"> </div>
          </div>
          <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
            <div class="productslider"> <img src="{{URL('/')}}/img/scoth-brite.png" alt="logo"> </div>
          </div>
          <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
            <div class="productslider"> <img src="{{URL('/')}}/img/surf Excel.png" alt="logo"> </div>
          </div>
          <div class="col-lg-2 col-md-2 col-sm-2  col-xs-2">
            <div class="productslider"> <img src="{{URL('/')}}/img/dettol.png" alt="logo"> </div>
          </div>
          <div class="col-lg-2 col-md-2 col-sm-2  col-xs-2">
            <div class="productslider"> <img src="{{URL('/')}}/img/kleanex.png" alt="logo"> </div>
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12"> @if(count($result3)>0)
            @foreach($result3 as $results)
           <div class="col-lg-3 col-md-3 col-sm-12"> 
              <!-- Product Single -->
              <div class="product product-single">
                <div class="product-thumb">
                  <button class="main-btn quick-view"  data-toggle="modal" data-target="#myModal{{$results->pk_id}}"><i class="fa fa-search-plus"></i> Quick view</button>
                  <img src="{{URL('/')}}/storage/images/{{$results->thumbnail}}" alt=""> </div>
                <div class="product-body"> 
                  
                  <!--<h3 class="product-price"> PKR {{ $results->price - (($results->price*$results->pk_id)/100)}} <del class="product-old-price">PKR {{$results->price}}</del></h3><br>
                <label class="label label-success">Off {{$results->pk_id}}%</label>-->
                 <a href="{{URL('/')}}/products/details/{{$results->pk_id}}/{{$results->sku}}"> <h2 class="product-name" style="margin-top: 10px;">{{$results->title}}</h2></a>
                  
                  <!--<form method="post" action = "{{url('/')}}/product/add/wishlist/{{$results->pk_id}}" class="login100-form validate-form p-l-55 p-r-55 p-t-178">
			{{ csrf_field() }}
                <div class="product-btns">
                  <button class="main-btn icon-btn submit" name = "submit" type="submit"><i class="fa fa-heart"></i></button>
                <button type="button" class="primary-btn add-to-cart" data-toggle="modal" data-target="#myModal{{$results->pk_id}}"><i class="fa fa-shopping-cart"></i> Add to Cart</button>
               
                </div>
                </form>--> 
                </div>
              </div>
              
              <!-- Modal -->
              <div class="modal fade" id="myModal{{$results->pk_id}}" role="dialog">
                <div class="modal-dialog"> 
                  
                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">{{$results->category}}</h4>
                    </div>
                    <div class="modal-body"> 
                      <!-- row -->
                      
                      <form method="post" action = "{{url('/')}}/product/add/cart/{{$results->pk_id}}" class="login100-form validate-form p-l-55 p-r-55 p-t-178">
                        {{ csrf_field() }}
                        <div class="row">
                          <div class="col-lg-4">
                            <div class="product_img"> <img src="{{URL('/')}}/storage/images/{{$results->thumbnail}}" alt=""> </div>
                          </div>
                          <div class="col-lg-8">
                            <div class="product-body">
							
							<div class="col-lg-12"><a href="{{URL('/')}}/products/details/{{$results->pk_id}}/{{$results->sku}}"><h3 class="product-name">{{$results->title}}</h3></a></div>
							  @php
							    date_default_timezone_set("Asia/Karachi");
        $date = date('Y-m-d');
              $d = DB::select("select * from discount_table where sku  = '$results->sku' and (start_date < '$date' or start_date = '$date') and (end_date > '$date' or end_date = '$date') ");
 
            @endphp
							<div class="col-lg-12">@if(count($d)>0)
							<h3 class="product-price" style="margin-bottom:25px;">PKR {{number_format($discount_price)}} / {{$result[0]->sku}} <div class="product-old-price">PKR {{number_format($d[0]->price)}} / {{$result[0]->sku}}</div></h3>
							@else
	
	@php
	$product_id = $results->QB_id;
	    $product_id = DB::select("select * from pricing_detail where product_id = '$product_id' and quantity = 1"); 
	@endphp
	<h3 class="product-price"  style="margin-bottom:25px;">PKR {{number_format($product_id[0]->price)}} / {{$results->sku}} </h3>
@endif
   

@php
      $product_id = $results->QB_id;
      $pricing_detail = DB::select("select * from pricing_detail where product_id = '$product_id' order by pk_id asc"); 
      @endphp
      
                                    	       @foreach($pricing_detail as $detail)
                                    	          <h3 class="product-price" style="margin-bottom:25px;">PKR {{number_format($detail->price)}} / {{$detail->quantity}}</h3>
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
				
							<div class="col-lg-12"><h5 class="product-name">{{$results->description}}</h5></div>
<div class="col-lg-12">
							<div class="product-btns">
							
								<button type="submit" name"submit" class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Add to Cart</button>
                                				
								
							</div>
							</div>
						</div>
                          </div>
                        </div>
                      </form>
                      <!-- /Product Details --> 
                    </div>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
            @endif
            
            
       </div>
        </div>
        <div class="row">
          <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="bannershowheading">
              <h3 style="color:#232f3e;">Stationery</h3>
            </div>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="boxleft" id="stationery">
              <h3></h3>
            </div>
          </div>
          <div class="col-lg-12 col-sm-hide col-md-hide">
            <div class="border"></div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12"> @if(count($result4)>0)
            @foreach($result4 as $results)
          <div class="col-lg-3 col-md-3 col-sm-12"> 
              <!-- Product Single -->
              <div class="product product-single">
                <div class="product-thumb">
                  <button class="main-btn quick-view"  data-toggle="modal" data-target="#myModal{{$results->pk_id}}"><i class="fa fa-search-plus"></i> Quick view</button>
                  <img src="{{URL('/')}}/storage/images/{{$results->thumbnail}}" alt=""> </div>
                <div class="product-body"> 
                  
                  <!--<h3 class="product-price"> PKR {{ $results->price - (($results->price*$results->pk_id)/100)}} <del class="product-old-price">PKR {{$results->price}}</del></h3><br>
                <label class="label label-success">Off {{$results->pk_id}}%</label>-->
                 <a href="{{URL('/')}}/products/details/{{$results->pk_id}}/{{$results->sku}}"> <h2 class="product-name" style="margin-top: 10px;">{{$results->title}}</h2></a>
                  
                  <!--<form method="post" action = "{{url('/')}}/product/add/wishlist/{{$results->pk_id}}" class="login100-form validate-form p-l-55 p-r-55 p-t-178">
			{{ csrf_field() }}
                <div class="product-btns">
                  <button class="main-btn icon-btn submit" name = "submit" type="submit"><i class="fa fa-heart"></i></button>
                <button type="button" class="primary-btn add-to-cart" data-toggle="modal" data-target="#myModal{{$results->pk_id}}"><i class="fa fa-shopping-cart"></i> Add to Cart</button>
               
                </div>
                </form>--> 
                </div>
              </div>
              
              <!-- Modal -->
              <div class="modal fade" id="myModal{{$results->pk_id}}" role="dialog">
                <div class="modal-dialog"> 
                  
                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">{{$results->category}}</h4>
                    </div>
                    <div class="modal-body"> 
                      <!-- row -->
                      
                      <form method="post" action = "{{url('/')}}/product/add/cart/{{$results->pk_id}}" class="login100-form validate-form p-l-55 p-r-55 p-t-178">
                        {{ csrf_field() }}
                        <div class="row">
                          <div class="col-lg-4">
                            <div class="product_img"> <img src="{{URL('/')}}/storage/images/{{$results->thumbnail}}" alt=""> </div>
                          </div>
                          <div class="col-lg-8">
                            <div class="product-body">
							
							<div class="col-lg-12"><a href="{{URL('/')}}/products/details/{{$results->pk_id}}/{{$results->sku}}"><h3 class="product-name">{{$results->title}}</h3></a></div>
							  @php
							    date_default_timezone_set("Asia/Karachi");
        $date = date('Y-m-d');
              $d = DB::select("select * from discount_table where sku  = '$results->sku' and (start_date < '$date' or start_date = '$date') and (end_date > '$date' or end_date = '$date') ");
 
            @endphp
							<div class="col-lg-12">@if(count($d)>0)
							<h3 class="product-price" style="margin-bottom:25px;">PKR {{number_format($discount_price)}} / {{$result[0]->sku}} <div class="product-old-price">PKR {{number_format($d[0]->price)}} / {{$result[0]->sku}}</div></h3>
							@else
	
	@php
	$product_id = $results->QB_id;
	    $product_id = DB::select("select * from pricing_detail where product_id = '$product_id' and quantity = 1"); 
	@endphp
	<h3 class="product-price"  style="margin-bottom:25px;">PKR {{number_format($product_id[0]->price)}} / {{$results->sku}} </h3>
@endif
   

@php
      $product_id = $results->QB_id;
      $pricing_detail = DB::select("select * from pricing_detail where product_id = '$product_id' order by pk_id asc"); 
      @endphp
      
                                    	       @foreach($pricing_detail as $detail)
                                    	          <h3 class="product-price" style="margin-bottom:25px;">PKR {{number_format($detail->price)}} / {{$detail->quantity}}</h3>
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
				
							<div class="col-lg-12"><h5 class="product-name">{{$results->description}}</h5></div>
<div class="col-lg-12">
							<div class="product-btns">
							
								<button type="submit" name"submit" class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Add to Cart</button>
                                				
								
							</div>
							</div>
						</div>
                          </div>
                        </div>
                      </form>
                      <!-- /Product Details --> 
                    </div>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
            @endif
            
            
        
        </div>
      </div>
    </div>
  </div>
</div>
<footer id="footer" class="section section-grey"> 
  <!-- container -->
  <div class="container"> 
    <!-- row -->
    <div class="row"> 
      
      <!-- footer widget -->
      <div class="col-md-2 col-sm-6 col-xs-6">
        <div class="footer">
          <h3 class="footer-header">Company</h3>
          <ul class="list-links foter-links">
            <li><a href="{{url('/')}}/aboutus">About Us</a></li>
            <li><a href="#">Our Team</a></li>
            <li><a href="{{url('/')}}/contact/us">Contact Us</a></li>
            <br>
            <li style="margin-top: 8px;">NTN: 7291645-7</li>
          </ul>
        </div>
      </div>
      <!-- /footer widget -->
      
      <div class="clearfix visible-sm visible-xs"></div>
      <div class="col-md-2 col-sm-6 col-xs-6">
        <div class="footer">
          <h3 class="footer-header">Customer Care</h3>
          <ul class="list-links foter-links">
            <li><a href="{{url('/')}}/faq">Help / FAQs</a></li>
            <li><a href="{{url('/')}}/terms/and/conditions">Terms and Conditions</a></li>
            <li><a href="#">Privacy Policy</a></li>
            <li><a href="#">Suggest a Product</a></li>
          </ul>
        </div>
      </div>
      <div class="col-md-2 col-sm-6 col-xs-6">
        <div class="footer">
          <h3 class="footer-header">Supplier Care</h3>
          <ul class="list-links foter-links">
            <li><a href="#">Become a Supplier</a></li>
            <li><a href="">Vendor-Dost Delivery</a></li>
          </ul>
        </div>
      </div>
      <div class="col-md-offset-2 col-sm-hidden col-xs-hidden"></div>
      <!-- footer subscribe -->
      <div class="col-md-3 col-sm-6 col-xs-6">
        <div class="footer">
          <h3 class="footer-header">Our Office</h3>
          <ul class="list-links foter-links">
            <li><i class="fa fa-map-marker"></i> : 93-A/2 Iftikhar Ahmad Malik Road<br>
            Sharif Colony, Gulberg II<br> Lahore, Punjab<br>
              Pakistan</li>
          </ul>
        </div>
      </div>
      <!-- /footer subscribe --> 
      <!-- footer widget -->
      <div class="col-md-2 col-sm-6 col-xs-6">
        <div class="footer">
          <h3 class="footer-header">Social Links</h3>
          
          <!-- footer social -->
          <ul class="footer-social">
            <li><a href="https://www.facebook.com/supplybridges/" target="_blank"><i class="fa fa-facebook"></i></a></li>
            <li><a href="https://www.linkedin.com/company/supply-bridges/" target="_blank"><i class="fa fa-linkedin"></i></a></li>
          </ul>
          <!-- /footer social --> 
        </div>
      </div>
      <!-- /footer widget --> 
    </div>
    <!-- /row -->
    <hr>
    <!-- row -->
    <div class="row">
      <div class="col-md-8 col-md-offset-2 text-center"> 
        <!-- footer copyright -->
        <div class="footer-copyright">
          <p>Copyright © 2017-2018 Supply Bridges. All rights reserved.</p>
          <p>Powered By<a href="http://greengrapez.com/"> <img src="{{url('/')}}/img/icon.png" style="width:50px;" alt="po"></a></p>
        </div>
        <!-- /footer copyright --> 
      </div>
    </div>
    <!-- /row --> 
  </div>
  <!-- /container --> 
</footer>


<!-- /FOOTER --> 

<!-- jQuery Plugins --> 
<script src="{{url('/')}}/js1/jquery.min.js"></script> 
<script src="{{url('/')}}/js1/bootstrap.min.js"></script> 
<script src="{{url('/')}}/js1/slick.min.js"></script> 
<script src="{{url('/')}}/js1/nouislider.min.js"></script> 
<script src="{{url('/')}}/js1/jquery.zoom.min.js"></script> 
<script src="{{url('/')}}/js1/main.js"></script> 
<script>
          function openNav() {
              document.getElementById("mySidenav").style.width = "250px";
          }
          
          function closeNav() {
              document.getElementById("mySidenav").style.width = "0";
          }
          </script> 
<script>
function test()
{
    
   if(document.getElementById("div").style.display == "none")
   {
       
       document.getElementById("div").style.display = "block";
      
   }
   else
   {
        
       document.getElementById("div").style.display = "none";
   }
   
}
function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
}
</script>

</body>
</html>
