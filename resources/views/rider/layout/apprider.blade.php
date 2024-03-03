<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="shortcut icon" href="{{url('/')}}/images/favicon.png"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
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

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn"t work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="skin-yellow sidebar-mini">
    <div class="wrapper">

      <header class="main-header">

        <!-- Logo -->
        <a href="{{URL('/')}}/rider/home"" class="logo" >
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>S</b>B</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"> <img src="{{url('/')}}/images/footerlogo.png" alt="Logo"/></span>
        </a>

        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
             
                  <span class="hidden-xs">{{session()->get('fname')}} {{session()->get('lname')}}  </span>
                </a>
                <ul class="dropdown-menu">
            
               
                  <li class="user-footer">
                    <div class="pull-left">
                    <a href="{{url('/')}}/logout" class="btn btn-default btn-flat">Sign out</a>
                    </div>
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
            <li class=" treeview">
              <a href="{{URL('/')}}/rider/home">
                <i class="fa fa-dashboard"></i> <span>Home</span>
                
              </a>
            </li>
    
            <li class="treeview">
              <a href="">
                <i class="ion ion-bag"></i> <span>Order Management</span>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{URL('/')}}/rider/home/view/active/orders"><i class="fa fa-circle-o"></i>Active Order</a></li>
                <li><a href="{{URL('/')}}/rider/home/view/complete/orders"><i class="fa fa-circle-o"></i>Completed Order</a></li>
                <li><a href="{{URL('/')}}/rider/home/view/return/orders"><i class="fa fa-circle-o"></i>Return Order</a></li>
                <li><a href="{{URL('/')}}/rider/home/view/cancel/orders"><i class="fa fa-circle-o"></i>Cancel Order</a></li>
              </ul>
            </li>
            
                  <li class="treeview">
              <a href="">
                <i class="ion ion-bag"></i> <span>Payment Management</span>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{URL('/')}}/rider/home/cash"><i class="fa fa-circle-o"></i>Payments</a></li>
                <li><a href="{{URL('/')}}/rider/home/view/cash"><i class="fa fa-circle-o"></i>Payment Received</a></li>
          
              </ul>
            </li>
      
      


        </section>
        <!-- /.sidebar -->
      </aside>

      @yield('content')

      <footer class="main-footer">
        <strong>Copyright &copy; 2017-2018 <a href="#">Supply Bridges</a>.</strong> All rights reserved.
        <li>Powered By:<a href="http://greengrapez.com/"><img src="{{url('/')}}/images/GG.png" alt="gg" style="width:50px;"></a></li>
      </footer>
      <!-- Add the sidebar"s background. This div must be placed
           immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>

    </div><!-- ./wrapper -->

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
      $("#b1").click(function(){
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        var status = $('#status').val();
        $.ajax({
          /* the route pointing to the post function */
          url: "{{URL('/')}}/rider/home/order/update/status",
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
        $("#example1").dataTable();
        $("#example2").dataTable({
          "bPaginate": true,
          "bLengthChange": false,
          "bFilter": false,
          "bSort": true,
          "bInfo": true,
          "bAutoWidth": false
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
</script>

  </body>
</html>