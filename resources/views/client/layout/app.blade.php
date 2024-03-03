<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="shortcut icon" href="{{url('/')}}/image/favicon.png"/>
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

<title>Supply Bridges</title>

<!-- Google font -->
<link href="https://fonts.googleapis.com/css?family=Hind:400,700" rel="stylesheet">

<!-- Bootstrap -->
<link type="text/css" rel="stylesheet" href="{{url('/')}}/css1/bootstrap.min.css" />

<!-- Slick -->
<link type="text/css" rel="stylesheet" href="{{url('/')}}/css1/slick.css" />
<link type="text/css" rel="stylesheet" href="{{url('/')}}/css1/slick-theme.css" />

<!-- nouislider -->
<link type="text/css" rel="stylesheet" href="{{url('/')}}/css1/nouislider.min.css" />

<!-- Font Awesome Icon -->
<link rel="stylesheet" href="{{url('/')}}/css1/font-awesome.min.css">

<!-- Custom stlylesheet -->
<link type="text/css" rel="stylesheet" href="{{url('/')}}/css1/style.css" />
</head>

<body>
<!-- HEADER -->
<header> 
  <!-- header -->
  <div id="header">
    <div class="container">
      <div class="row">
        <div class="col-lg-4">
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
          <div class="header-logo"> <a class="logo" href="{{url('/')}}/"> <img src="{{url('/')}}/./img/logo.png" alt=""> </a> </div>
          <!-- /Logo --> 
        </div>
        <div class="col-lg-4">
          <div class="pull-right">
            <ul class="header-btns">
              <!-- Cart -->
              <li class="header-cart dropdown default-dropdown"> <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                <div class="header-btns-icon"> <i class="fa fa-shopping-cart"></i> <span class="qty"> {{Session::has('cart') ? Session::get('cart')->totalQty : ''}} </span> </div>
                <strong class="text-uppercase">My Cart:</strong> <br>
                <span>35.20$</span> </a>
                <div class="custom-menu">
                  <div id="shopping-cart">
                    <div class="shopping-cart-list">
                      <div class="product product-widget">
                        <div class="product-thumb"> <img src="{{url('/')}}/./img/thumb-product01.jpg" alt=""> </div>
                        <div class="product-body">
                          <h3 class="product-price">$32.50 <span class="qty">x3</span></h3>
                          <h2 class="product-name"><a href="#">Product Name Goes Here</a></h2>
                        </div>
                        <button class="cancel-btn"><i class="fa fa-trash"></i></button>
                      </div>
                      <div class="product product-widget">
                        <div class="product-thumb"> <img src="{{url('/')}}/./img/thumb-product01.jpg" alt=""> </div>
                        <div class="product-body">
                          <h3 class="product-price">$32.50 <span class="qty">x3</span></h3>
                          <h2 class="product-name"><a href="#">Product Name Goes Here</a></h2>
                        </div>
                        <button class="cancel-btn"><i class="fa fa-trash"></i></button>
                      </div>
                    </div>
                    <div class="shopping-cart-btns">
                      <a href="{{url('/')}}/cart"><button class="main-btn">View Cart</button></a>
                      <a href="checkout.html"><button class="primary-btn">Checkout <i class="fa fa-arrow-circle-right"></i></button></a>
                    </div>
                  </div>
                </div>
              </li>
              <!-- /Cart --> 
              
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
<div id="navigation"> 
  <!-- container -->
  <div class="container">
  <div class="bgheader">
    <div id="responsive-nav"> 
      <!-- category nav -->
      <div class="category-nav"> <span class="category-header"><i class="fa fa-list"></i>Categories</span>
        <ul class="category-list">
        <li class="dropdown side-dropdown"> <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true" href="{{URL('/')}}/product/shoes">shoes<i class="fa fa-star"></i></a> </li>
          <li class="dropdown side-dropdown"><a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true" href="#">Desk Supplies<i class="fa fa-caret-right"></i></a></li>
          <li class="dropdown side-dropdown"><a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true" href="#">Papper Products <i class="fa fa-caret-right"></i></a> </li>
          <li class="dropdown side-dropdown"><a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true" href="#">Fillingg Supplies<i class="fa fa-caret-right"></i></a></li>
          <li class="dropdown side-dropdown"><a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true" href="#">Stationary Supplies<i class="fa fa-caret-right"></i></a></li>
          <li class="dropdown side-dropdown"> <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true" href="#">Mailling Supplies<i class="fa fa-caret-right"></i></a> </li>
          <li class="dropdown side-dropdown"><a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true" href="#">Time Tracking Supplies<i class="fa fa-caret-right"></i></a></li>
          <li class="dropdown side-dropdown"><a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true" href="#">Binding Supplies<i class="fa fa-caret-right"></i></a></li>
          <li class="dropdown side-dropdown"><a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true" href="#">Supplies for Hanging<i class="fa fa-caret-right"></i></a></li>
          <li class="dropdown side-dropdown"><a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true" href="#">Accessories<i class="fa fa-caret-right"></i></a></li>
          <li class="dropdown side-dropdown"><a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true" href="#">Indentification Supplies<i class="fa fa-caret-right"></i></a></li>
          <li class="dropdown side-dropdown"><a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true" href="#">Boxes Supplies<i class="fa fa-caret-right"></i></a></li>
          <li class="dropdown side-dropdown"><a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true" href="#">Other<i class="fa fa-caret-right"></i></a></li>
        </ul>
      </div>
      <!-- Search -->
      <div class="header-search">
        <form>
          <input class="input search-input" type="text" placeholder="Enter your keyword">
          <button class="search-btn"><i class="fa fa-search" style="color:white;"></i></button>
        </form>
      </div>
      <!-- /Search -->
      
      <ul class="nav navbar-nav loginform navbar-right">
      <li><a href="{{url('/')}}/shop">Shop</a></li>
      @if(Session::has('username'))   
      <li><a href="{{URL('/')}}/">{{session::get('name')}}</a></li>                       
      <li><a href="{{URL('/')}}/logout">logout</a></li>
      <li><a href="{{URL('/')}}/search/wishlist">  wishlist</a></li>
      <li><a href="{{URL('/')}}/view/wishlist">  view my wishlist</a></li>
      @else
      <li><a href="{{URL('/')}}/login">Log in</a></li>  
      <li><a href="{{URL('/')}}/signup">Join</a></li>
      <li><a href="{{URL('/')}}/search/wishlist">wishlist</a></li>
      @endif
      </ul>
    </div>
    </div>
  </div>
  <!-- /container --> 
</div>

@yield('content')


<footer id="footer" class="section section-grey"> 
  <!-- container -->
  <div class="container"> 
    <!-- row -->
    <div class="row"> 
      <!-- footer widget -->
      <div class="col-md-3 col-sm-6 col-xs-6">
        <div class="footer"> 
          <!-- footer logo -->
          <div class="footer-logo"> <a class="logo" href="{{url('/')}}/home"> <img src="{{url('/')}}/./img/logo.png" alt=""> </a> </div>
          <!-- /footer logo -->
          
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna</p>
          
          <!-- footer social -->
          <ul class="footer-social">
            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
            <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
          </ul>
          <!-- /footer social --> 
        </div>
      </div>
      <!-- /footer widget --> 
      
      <!-- footer widget -->
      <div class="col-md-3 col-sm-6 col-xs-6">
        <div class="footer">
          <h3 class="footer-header">Company</h3>
          <ul class="list-links foter-links">
            <li><a href="{{url('/')}}/aboutus">About</a></li>
            <li><a href="{{url('/')}}/terms/and/conditions">Term & Condition</a></li>
            <li><a href="{{url('/')}}/contact/us">Contact</a></li>
            <li><a href="{{url('/')}}/faq">FAQ</a></li>
            <li><a href="#">Help Center</a></li>
          </ul>
        </div>
      </div>
      <!-- /footer widget -->
      
      <div class="clearfix visible-sm visible-xs"></div>
      
      <!-- footer widget -->
      <div class="col-md-3 col-sm-6 col-xs-6">
        <div class="footer">
          <h3 class="footer-header">Customer Service</h3>
          <ul class="list-links foter-links">
            <li><a href="signup.html">My Account</a></li>
            <li><a href="#">My Order</a></li>
            <li><a href="{{url('/')}}/search/wishlist">WishList</a></li>
            <li><a href="#">My Persnal Info</a></li>
            <li><a href="#">My Address</a></li>
          </ul>
        </div>
      </div>
      <!-- /footer widget --> 
      
      <!-- footer subscribe -->
      <div class="col-md-3 col-sm-6 col-xs-6">
        <div class="footer">
          <h3 class="footer-header">Our Office</h3>
          <ul class="list-links foter-links">
            <li><i class="fas fa-map-marker-alt"></i> : 72K Commercial Area Phase-1 DHA Lahore </li>
            <li><i class="fa fa-phone"></i> : <a class="mobilesOnly" href="tel:+923008481078">+923008481078</a></li>
            <li><i class="fa fa-envelope"></i> : support@supplybridges.com</li>
            <li><i class="fa fa-globe"></i> <a href="#"> : www.supplybridges.com</a></li>
          </ul>
        </div>
      </div>
      <!-- /footer subscribe --> 
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
</body>

</html>

