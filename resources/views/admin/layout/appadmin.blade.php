<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="shortcut icon" href="{{url('/')}}/images/favicon.png"/>
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Supply Bridges</title>
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<!-- Bootstrap 3.3.4 -->
<link href="{{url('/')}}/css/bootstrap-colorpicker.min.css" rel="stylesheet"/>
<link href="{{url('/')}}/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<!-- Font Awesome Icons -->
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
<!-- Ionicons -->
<link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />
<!-- DATA TABLES -->
<link href="{{url('/')}}/css/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
<!-- jvectormap -->
<link href="{{url('/')}}/css/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
<!-- Theme style -->
<link href="{{url('/')}}/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
<!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
<link href="{{url('/')}}/css/_all-skins.min.css" rel="stylesheet" type="text/css" />
<style>

</style>
</head>
<body class="skin-yellow sidebar-mini">
<div class="wrapper">
<header class="main-header"> 
  
  <!-- Logo --> 
  <a href="{{URL('/')}}/admin/home" class="logo" > 
  <!-- mini logo for sidebar mini 50x50 pixels --> 
  <span class="logo-mini"><b>S</b>B</span> 
  <!-- logo for regular state and mobile devices --> 
  <span class="logo-lg"> <img src="{{url('/')}}/images/footerlogo.png" alt="Logo"/></span> </a> 
  
  <!-- Header Navbar: style can be found in header.less -->
  <nav class="navbar navbar-static-top" role="navigation"> 
    <!-- Sidebar toggle button--> 
    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button"> <span class="sr-only">Toggle navigation</span> </a> 
    <!-- Navbar Right Menu -->
    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
        <!-- Messages: style can be found in dropdown.less--> 
        <!-- User Account: style can be found in dropdown.less -->
        <li class="dropdown user user-menu"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <span class="hidden-xs"> Supply Bridges</span> </a>
          <ul class="dropdown-menu">
            <!-- User image -->
            
            <li class="user-footer">
              <div class="pull-right"> <a href="{{url('/')}}/logout" class="btn btn-default btn-flat">Sign out</a> </div>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </nav>
</header>
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
<!-- sidebar: style can be found in sidebar.less -->
<section class="sidebar">
<!-- Sidebar user panel --> 
<!-- sidebar menu: : style can be found in sidebar.less -->
<ul class="sidebar-menu">
    <li class="treeview"> <a href=""> <i class="fa fa-dashboard"></i> <span>Home</span> </a>
  <ul class="treeview-menu">
    <li><a href="{{URL('/')}}/admin/home"><i class="fa fa-circle-o"></i>Dashboard</a></li>
  </ul>
</li>
<li class="treeview"> <a href=""> <i class="ion ion-ios-cart-outline"></i> <span>Products</span> </a>
  <ul class="treeview-menu">
    <li><a href="{{URL('/')}}/admin/home/view/product"><i class="fa fa-circle-o"></i>View Product</a></li>
    <li><a href="{{URL('/')}}/admin/home/view/products/type"><i class="fa fa-circle-o"></i>View Product Type</a></li>
    <li><a href="{{URL('/')}}/admin/home/add/product"><i class="fa fa-circle-o"></i>Add Product</a></li>
    <li><a href="{{URL('/')}}/admin/home/add/product/type"><i class="fa fa-circle-o"></i>Add Product Type</a></li>
  </ul>
</li>
<li class="treeview"> <a href=""> <i class="fa fa-th"></i> <span>Categories</span> </a>
  <ul class="treeview-menu">
    <li><a href="{{URL('/')}}/admin/home/view/main/category"><i class="fa fa-circle-o"></i>View Category</a></li>
    <li><a href="{{URL('/')}}/admin/home/view/sub/category"><i class="fa fa-circle-o"></i>View Sub Category</a></li>
    <li><a href="{{URL('/')}}/admin/home/add/main/category"><i class="fa fa-circle-o"></i>Add Main Category</a></li>
    <li><a href="{{URL('/')}}/admin/home/add/sub/category"><i class="fa fa-circle-o"></i>Add Sub Category</a></li>
  </ul>
</li>
<li class="treeview"> <a href=""> <i class="fa fa-th"></i> <span>Brands</span> </a>
  <ul class="treeview-menu">
    <li><a href="{{URL('/')}}/admin/home/view/brand"><i class="fa fa-circle-o"></i>View Brand</a></li>
    <li><a href="{{URL('/')}}/admin/home/add/brand"><i class="fa fa-circle-o"></i>Add Brand</a></li>
  </ul>
</li>
<li class="treeview"> <a href=""> <i class="fa fa-th"></i> <span>Discount</span> </a>
  <ul class="treeview-menu">
    <li><a href="{{URL('/')}}/admin/home/view/discount"><i class="fa fa-circle-o"></i>View Discount</a></li>
    <li><a href="{{URL('/')}}/admin/home/add/discount"><i class="fa fa-circle-o"></i>Add Discount</a></li>
  </ul>
</li>
<li class="treeview"> <a href=""> <i class="fa fa-th"></i> <span>Promo Code</span> </a>
  <ul class="treeview-menu">
    <li><a href="{{URL('/')}}/admin/home/view/promo"><i class="fa fa-circle-o"></i>View Promo code</a></li>
    <li><a href="{{URL('/')}}/admin/home/add/promo"><i class="fa fa-circle-o"></i>Create Promo code</a></li>
  </ul>
</li>
<hr>
<li class="treeview"> <a href=""> <i class="ion ion-bag"></i> <span>Orders</span> </a>
  <ul class="treeview-menu">
    <li><a href="{{URL('/')}}/admin/home/view/active/orders"><i class="fa fa-circle-o"></i>Active Orders</a></li>
       <li><a href="{{URL('/')}}/admin/home/view/partialy/complete/orders"><i class="fa fa-circle-o"></i>Partially Delivered Orders</a></li>
    <li><a href="{{URL('/')}}/admin/home/view/complete/orders"><i class="fa fa-circle-o"></i>Delivered Orders</a></li>
    <li><a href="{{URL('/')}}/admin/home/view/return/orders"><i class="fa fa-circle-o"></i>Returned Orders</a></li>
    <li><a href="{{URL('/')}}/admin/home/view/cancel/orders"><i class="fa fa-circle-o"></i>Canceled Orders</a></li>
    <li><a href="{{url('/')}}/admin/home/view/approved/accountant/alerts"><i class="fa fa-circle-o"></i>View approved POs</a></li>
    <li><a href="{{url('/')}}/admin/home/view/approved/orders/stocks"><i class="fa fa-circle-o"></i>History of Stock Received</a></li>
  </ul>
</li>
<li class=" treeview"> <a href="{{URL('/')}}/admin/view/order/payments"> <i class="ion ion-bag"></i> <span>Order Payments</span> </a> </li>
<li class="treeview"> <a href=""> <i class="fa fa-th"></i> <span> Procurement</span> </a>
  <ul class="treeview-menu">
    <li><a href="{{url('/')}}/admin/home/view/warehouse/alerts"><i class="fa fa-circle-o"></i>Alerts</a></li>
        <li><a href="{{url('/')}}/admin/home/create/purchase/order"><i class="fa fa-circle-o"></i>Create POs</a></li>
           <li><a href="{{url('/')}}/admin/home/view/accountant/waiting/alerts"><i class="fa fa-circle-o"></i>POs Awaiting Approval</a></li>
    <li><a href="{{url('/')}}/admin/home/view/approved/warehouse/alerts"><i class="fa fa-circle-o"></i>View Approved POs</a></li>
    <!--<li><a href="{{url('/')}}/admin/home/view/pos"><i class="fa fa-circle-o"></i>POs</a></li>-->
 
    <li><a href="{{url('/')}}/admin/home/view/decline/accountant/alerts"><i class="fa fa-circle-o"></i> POs Declined</a></li>
    <li><a href="{{url('/')}}/admin/home/view/approved/orders/alerts"><i class="fa fa-circle-o"></i>History of Stock Received</a></li>

  </ul>
</li>
<li class="treeview"> <a href=""> <i class="fa fa-th"></i> <span> Accountant</span> </a>
  <ul class="treeview-menu">
    <li><a href="{{url('/')}}/admin/home/view/accountant/alerts"><i class="fa fa-circle-o"></i>Alerts</a></li>
    <li><a href="{{url('/')}}/admin/home/view/decline/accountant/alerts"><i class="fa fa-circle-o"></i>POs Declined </a></li>
    <li><a href="{{url('/')}}/admin/home/view/approved/warehouse/alerts"><i class="fa fa-circle-o"></i>View approved POs</a></li>
    <li><a href="{{url('/')}}/admin/home/view/approved/orders/alerts"><i class="fa fa-circle-o"></i>History of Stock Received</a></li>
    <li><a href="{{url('/')}}/admin/home/view/accountant/payment/received"><i class="fa fa-circle-o"></i>Cash to be Collected from Riders</a></li>
    <li><a href="{{url('/')}}/admin/home/view/accountant/payment/received/view"><i class="fa fa-circle-o"></i>Cash Received History</a></li>
  </ul>
</li>
<li class="treeview"> <a href=""> <i class="fa fa-th"></i> <span> Riders</span> </a>
  <ul class="treeview-menu">
    <li><a href="{{url('/')}}/admin/home/view/riders"><i class="fa fa-circle-o"></i>View Riders</a></li>
    <li><a href="{{url('/')}}/admin/home/create/rider"><i class="fa fa-circle-o"></i>Create Riders</a></li>
  </ul>
</li>
<li class="treeview"> <a href=""> <i class="fa fa-th"></i> <span>Reporting</span> </a>
  <ul class="treeview-menu">
    <li><a href="{{URL('/')}}/admin/home/view/reporting/by/sale"><i class="fa fa-circle-o"></i>By Sale</a></li>
    <li><a href="{{URL('/')}}/admin/home/view/reporting/by/products"><i class="fa fa-circle-o"></i>By Product</a></li>
    <li><a href="{{URL('/')}}/admin/home/view/reporting/by/customer"><i class="fa fa-circle-o"></i>By Customer</a></li>
  </ul>
</li>
<li class="treeview"> <a href=""> <i class="fa fa-th"></i> <span>Admin</span> </a>
  <ul class="treeview-menu">
    <li><a href="{{url('/')}}/admin/home/view/admin"><i class="fa fa-circle-o"></i> View Admin</a></li>
    <li><a href="{{url('/')}}/admin/home/create/admin"><i class="fa fa-circle-o"></i>Create Admin</a></li>
  </ul>
</li>

<li class="treeview"> <a href=""> <i class="fa fa-th"></i> <span>Users</span> </a>
  <ul class="treeview-menu">
    <li><a href="{{url('/')}}/admin/client/view/list"><i class="fa fa-circle-o"></i> View Users</a></li>
  </ul>
</li>
</ul>


</section>
<!-- /.sidebar -->
</aside>
@yield('content')
<footer class="main-footer"> <strong>Copyright &copy; 2017-2018 <a href="#">Supply Bridges</a>.</strong> All rights reserved.
  <li>Powered By:<a href="http://greengrapez.com/"><img src="{{url('/')}}/images/GG.png" alt="gg" style="width:50px;"></a></li>
</footer>
</div>
<!-- jQuery 2.1.4 --> 
<script src="{{url('/')}}/js/jQuery-2.1.4.min.js"></script> 
<!-- Bootstrap 3.3.2 JS --> 
<script src="{{url('/')}}/js/bootstrap.min.js" type="text/javascript"></script> 
<script src="{{url('/')}}/js/bootstrap-colorpicker.min.js"></script> 
<!-- DATA TABES SCRIPT --> 
<script src="{{url('/')}}/js/jquery.dataTables.min.js" type="text/javascript"></script> 
<script src="{{url('/')}}/js/dataTables.bootstrap.min.js" type="text/javascript"></script> 
<!-- SlimScroll --> 
<script src="{{url('/')}}/js/jquery.slimscroll.min.js" type="text/javascript"></script> 
<!-- FastClick --> 
<script src="{{url('/')}}/js/fastclick.min.js"></script> 
<!-- AdminLTE App --> 
<script src="{{url('/')}}/js/app.min.js" type="text/javascript"></script> 
<!-- AdminLTE for demo purposes --> 
<script src="{{url('/')}}/js/demo.js" type="text/javascript"></script> 
<!-- page script --> 
<script src="{{url('/')}}/js/Chart.min.js"></script> 
<script>
    
        var url = window.location;
// for sidebar menu but not for treeview submenu
$('ul.sidebar-menu a').filter(function() {
    return this.href == url;
}).parent().siblings().removeClass('active').end().addClass('active');
// for treeview which is like a submenu
$('ul.treeview-menu a').filter(function() {
    return this.href == url;
}).parentsUntil(".sidebar-menu > .treeview-menu").siblings().removeClass('active menu-open').end().addClass('active menu-open');
</script>
<script>
      $("#b1").click(function(){
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        var status = $('#status').val();
        $.ajax({
          /* the route pointing to the post function */
          url: "{{URL('/')}}/admin/home/order/update/status",
          type: 'POST',
          /* send the csrf-token and the input to the controller */
          data: {_token: CSRF_TOKEN, status:status,
          id: OrgID,
        },
          /* remind that 'data' is the response of the AjaxController */
          success: function (data) { 
            window.location.href = data;
          }
      }); 

    });
  </script> 
<script type="text/javascript">
      $(function () {
        $("#example1").dataTable({
    "aLengthMenu": [[25, 50, 75, -1], [25, 50, 75, "All"]],
    "order": [[ 0, "desc" ]],
    "pageLength": 50
    } );
        $("#example2").dataTable({
              "aLengthMenu": [[25, 50, 75, -1], [25, 50, 75, "All"]],
    "order": [[ 0, "desc" ]],
    "pageLength": 50
        });

$("#example9").dataTable({
              "aLengthMenu": [[25, 50, 75, -1], [25, 50, 75, "All"]],
    "order": [[ 6, "asc" ]],
    "pageLength": 50
        });
        
         $("#example3").dataTable({
    "aLengthMenu": [[25, 50, 75, -1], [25, 50, 75, "All"]],
    "order": [[ 4, "desc" ]],
    "pageLength": 50
        });
         $("#example4").dataTable({
          "order": [[ 10,"asc" ]]
        });
      });

      $(".my-colorpicker2").colorpicker();
    </script> 
<script>
    function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah')
                        .attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
        function preview_image(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah2')
                        .attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
        function preview_img(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah3')
                        .attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
</script> 
<script type="text/javascript">
    $("#mainCategory").on('change',function(e){

      console.log(e);
      
      var cat_id = e.target.value;
     
      $.get('{{URL('/')}}/ajax-subcat?cat_id='+ cat_id,function(data){
        console.log(data);
        $('#SubCategory').empty();
        $('#SubCategory').append('<option value="" disable="true" selected="true" >---Select Sub Category---</option>');
        
        $.each(data,function(create,subcatObj){
         
          $('#SubCategory').append('<option value ="'+subcatObj.SKU+'">'+subcatObj.sub_category+'</option>');
      });
   


      });


  });

    $("#SubCategory").on('change',function(e){

      console.log(e);
      
      var type_id = e.target.value;
    
      $.get('{{URL('/')}}/ajax-product-type?type_id='+ type_id,function(data){
        console.log(data);
      $('#ProductType').empty();
        $('#ProductType').append('<option value="" disable="true" selected="true" >---Add Product Type---</option>');
        $.each(data,function(create,typeObj){
         
          $('#ProductType').append('<option value ="'+typeObj.product_type+'">'+typeObj.product_type+'</option>');
      });
   


      });


  });
</script> 
<script type="text/javascript">
      $("#MainCategory").on('change',function(e){

        console.log(e);
        
        var cat_id =  e.target.value;
       
        $.get('{{URL('/')}}/ajax-subcat?cat_id='+ cat_id,function(data){
          console.log(data);
          $('#subCategory').empty();
          $('#subCategory').append('<option value="" disable="true" selected="true" >---Select Sub Category---</option>');
          
          $.each(data,function(create,subcatObj){
           
            $('#subCategory').append('<option value ="'+subcatObj.sub_category+'">'+subcatObj.sub_category+'</option>');
        });

        });

    });
    

  </script>
  
  <script type="text/javascript">
      $("#name").on('change',function(e){

        console.log(e);
        
        var po_id =  e.target.value;
       
        $.get('{{URL('/')}}/ajax-create-po?po_id='+ po_id,function(data){
       
          
            console.log(data);
        
          $.each(data,function(create,skuObj){
             
      
           
          $('#sku').val(skuObj.sku);
            $('#quantity').val(skuObj.available_quantity);
                     $("textarea#description").text(skuObj.title);
        });

        });

    });
    

  </script>


  <script type="text/javascript">
      $("#purchase_quantity").on('change',function(e){
          
          


var purchase_quantity = parseInt( document.getElementById("purchase_quantity").value )

 console.log(purchase_quantity);
 
   $("#rate").on('change',function(e){
          
          
var rate  = parseInt( document.getElementById("rate").value )


      console.log(rate);
      
         $('#amount').val(rate * purchase_quantity);
      
      
      
      
        });

        });
        
        
        
           $("#rate").on('change',function(e){
          
          


var rate = parseInt( document.getElementById("rate").value )

 console.log(rate);
 
   $("#purchase_quantity").on('change',function(e){
          
          
var purchase_quantity  = parseInt( document.getElementById("purchase_quantity").value )


      console.log(purchase_quantity);
      
         $('#amount').val(rate * purchase_quantity);
      
      
      
      
        });

        });

  
  
      

  </script>
<script>
    

$(document).ready(function() {
    var max_fields      = 10; //maximum input boxes allowed
    var wrappers         = $(".input_fieldss_wrap"); //Fields wrapper
    var add_buttonss      = $(".adds_fields_button"); //Add button ID

    var x = 1; //initlal text box count
    $(add_buttonss).click(function(e){ //on add input button click
        e.preventDefault();
        

         if(x < max_fields){ //max input box allowed
          
            $(wrappers).append('<div><div class="row"><div class="col-lg-2 col-md-2 col-sm-12 col-xs-12"><div class="form-group"><label>Product Name</label><select class="form-control cam_select" name="name[]" ></select></div></div><div class="col-lg-2 col-md-2 col-sm-12 col-xs-12"><div class="form-group"><label>SKU</label><input type="text" class="form-control cm_sku" name="sku[]" placeholder="SKU" pattern="[a-zA-Z0-9\s]+" maxlength="50" required></div></div><div class="col-lg-2 col-md-2 col-sm-12 col-xs-12"><div class="form-group"><label>Qty in Hand</label><input type="number" class="form-control" name="quantity[]" placeholder="Qty in Hand" required></div></div><div class="col-lg-2 col-md-2 col-sm-12 col-xs-12"><div class="form-group"><label>Purchase Qty</label><input type="number" class="form-control" name="price[]" placeholder="Purchase Qty" required></div></div><div class="col-lg-2 col-md-2 col-sm-12 col-xs-12"><div class="form-group"><label>Rate</label><input type="number" class="form-control" name="supplier[]" placeholder="Rate" required></div></div><div class="col-lg-2 col-md-2 col-sm-12 col-xs-12"><div class="form-group"><label>Amount</label><input type="number" class="form-control" name="terms[]" placeholder="Amount" required></div></div><div class="col-lg-4 col-md-4 col-sm-12 col-xs-12"><div class="form-group"><label>Product Description</label><textarea  class="form-control" rows="6" name="" pattern="[a-zA-Z0-9\s]+" maxlength="5000" placeholder="Product Description" required></textarea></div></div></div><a href="#" class="remove_field btn btn-default btn-md">Remove</a></div>'); //add input box
        
             
                   $(document).off('change').on('change', '.cam_select', function(e) {
       
        var po_id =  e.target.value;
        var elem = e.target;
        
        console.log(po_id);
       
        $.get('{{URL('/')}}/ajax-create-po?po_id='+ po_id,function(data){
            
            $.each(data,function(create,skuObj){
                //var tObj = document.getElementsByClassName('cm_sku');
                //var tObj = elem;
                console.log(x);
                elem.value= skuObj.sku;
            });
        });
      });
      
             
         }
        
    
    });
    

      
    
    $(wrappers).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); x--;
    })
    
});




</script>

</body>
</html>