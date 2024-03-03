<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Email Template</title>

</head>

<body>
<div id="mailsub" class="notification" align="center">

<table width="100%" border="0" cellspacing="0" cellpadding="0" style="min-width: 320px;"><tr><td align="center" bgcolor="#eff3f8">


<!--[if gte mso 10]>
<table width="680" border="0" cellspacing="0" cellpadding="0">
<tr><td>
<![endif]-->

<table border="0" cellspacing="0" cellpadding="0" class="table_width_100" width="100%" style="max-width: 680px; min-width: 300px;">
    <tr><td>
	<!-- padding --><div style="height: 80px; line-height: 80px; font-size: 10px;"></div>
	</td></tr>
	<!--header -->
	<tr><td align="center" bgcolor="#ffffff">
		<!-- padding --><div style="height: 30px; line-height: 30px; font-size: 10px;"></div>
		<table width="90%" border="0" cellspacing="0" cellpadding="0">
			<tr><td align="left"><!-- 

				Item --><div class="mob_center_bl" style="float: left; display: inline-block; width: 115px;">
					<table class="mob_center" width="115" border="0" cellspacing="0" cellpadding="0" align="left" style="border-collapse: collapse;">
						<tr><td align="left" valign="middle">
							<!-- padding --><div style="height: 20px; line-height: 20px; font-size: 10px;"></div>
							<table width="115" border="0" cellspacing="0" cellpadding="0" >
								<tr><td align="left" valign="top" class="mob_center">
									<a href="#" target="_blank" style="color: #596167; font-family: Arial, Helvetica, sans-serif; font-size: 13px;">
									<font face="Arial, Helvetica, sans-seri; font-size: 13px;" size="3" color="#596167">
									<img src="{{URL('/')}}/images/logo.png" width="250" height="60" alt="Metronic" border="0" style="display: block;" /></font></a>
								</td></tr>
							</table>						
						</td></tr>
					</table></div><!-- Item END--><!--[if gte mso 10]>
					</td>
					<td align="right">
				<![endif]--><!-- 

				Item --><div class="mob_center_bl" style="float: right; display: inline-block; width: 88px;">
					<table width="88" border="0" cellspacing="0" cellpadding="0" align="right" style="border-collapse: collapse;">
						<tr><td align="right" valign="middle">
							<!-- padding --><div style="height: 20px; line-height: 20px; font-size: 10px;"></div>
							<table width="100%" border="0" cellspacing="0" cellpadding="0" >
								<tr><td align="right">
								</td></tr>
							</table>
						</td></tr>
					</table></div><!-- Item END--></td>
			</tr>
		</table>
		<!-- padding --><div style="height: 50px; line-height: 50px; font-size: 10px;"></div>
	</td></tr>
	<!--header END-->

	<!--content 1 -->
	<tr><td align="center" bgcolor="#fbfcfd">
		<table width="90%" border="0" cellspacing="0" cellpadding="0">
			<tr><td align="center">
				<!-- padding --><div style="height: 60px; line-height: 60px; font-size: 10px;"></div>
				<div style="line-height: 44px;">
					<font face="Arial, Helvetica, sans-serif" size="5" color="#57697e" style="font-size: 34px;">
					<span style="font-family: Arial, Helvetica, sans-serif; font-size: 34px; color: #57697e;">
						Order Confirm
					</span></font>
				</div>
				<!-- padding --><div style="height: 40px; line-height: 40px; font-size: 10px;"></div>
			</td></tr>
			<tr><td>
				<div style="line-height: 24px;">
					<font face="Arial, Helvetica, sans-serif" size="4" color="#57697e" style="font-size: 15px;">
                    <b>Dear {{$customer_fname}} {{$customer_lname}},</b><br>
					<span  style="font-family: Arial, Helvetica, sans-serif; font-size: 15px; color: #57697e;">
					Your order {{$order_id}} has been confirmed by Supply Bridges on {{$date}}. 
<br>
Here are the details of your Order:

					</span></font>
				</div>
				<!-- padding --><div style="height: 40px; line-height: 40px; font-size: 10px;"></div>
			</td></tr>
            <tr><td>
                                    <div style=" width:50%; height:auto; float:left font-family: Arial, Helvetica, sans-serif; font-size: 15px;">
                                        <h2> <span itemprop="name">Customer Name</span></h2>
										<p itemprop="email">Email</p>
										<p itemprop="email">Address</p>
                                        <p itemprop="email">City</p>
										<p itemprop="email">Phone no</p>
										<p itemprop="email">Region</p>
                            
                                   
									</div>
								</td>
								<td>
                                    <div style=" width:50%; height:auto; float:left font-family: Arial, Helvetica, sans-serif; font-size: 15px;">
                                    	<h2> <span>{{$customer_fname}} {{$customer_lname}}</span></h2>
										<p>{{$customer_email}}</p>
										<p>{{$customer_address}}</p>
                                        <p>{{$customer_city}}</p>
										<p>{{$customer_phone}}</p>
										<p>{{$customer_region}}</p>
                               
                                      
                                   
                                    </div>
            </td></tr>
            <div class="container" style="margin-top:25px;">
          @if(Session::has('cart'))
    <div class="row">
        <div class="col-sm-12 col-md-10 col-md-offset-1">
        <div class="table-responsive">
        	<table class="table table-bordered">
                <thead style="background-color:#f6f6f6;">
                
                    <tr>
             
                    	    <th>Product</th>
                    <th>Name</th>
                       <th>Size</th>
    <th>Quantity</th>
    <th>Unit Price</th>
    <th>Item Total</th>
 
                    </tr>
                </thead>
                @php
                  $cart = Session::get('cart');
   
     $products = $cart->items;
     @endphp
                  @foreach($products as $product) 
                <tbody>
                    <tr>
                 
                        <td class="col-sm-8 col-md-6">
                        <div class="media">
                         <img class="media-object" src="{{URL('/')}}/storage/images/{{$product['item']->thumbnail}}" style="width: 72px; height: 72px;">
                        </div></td>
                                 
                        <td class="col-sm-1 col-md-1 text-center"><strong>{{$product['item']->name}}</strong></td>
                        <td class="col-sm-1 col-md-1 text-center"><strong>{{$product['size']}}</strong></td>
                        <td class="col-sm-1 col-md-1 text-center"><strong>{{$product['qty']}}</strong></td>
                        <td class="col-sm-1 col-md-1 text-center"><strong>{{$product['item']->price}} 
        @if($product['save']>0) saving -{{$product['save']}}@endif</strong></td>
          <td class="col-sm-1 col-md-1 text-center"><strong>{{$product['price']}}</strong></td>

                    </tr>
           
                </tbody>
                   @endforeach
            </table>
        
        </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 col-md-4 col-lg-4 col-lg-offset-7">
            	<table class="table table-bordered">
         
                <tr>
                        <td><h5>Subtotal</h5></td>
                        <td class="text-right"><h5><strong>{{$total_price}}</strong></h5></td>
                    </tr>
                    <tr>
                        <td><h5>Total</h5></td>
                        <td class="text-right"><h5><strong>{{$total_price}}</strong></h5></td>
                    </tr>
                    <tr>
                    </tr>
            </table>
            
        </div>
    </div>
       @endif
    
</div>
			<tr><td >
				<br>In order to cancel your order click here (Hyperlink to cancellation page).
				<div style="line-height: 24px;">
						<font face="Arial, Helvetica, sans-seri; font-size: 13px;" size="3" color="#596167">
							<span  style="font-family: Arial, Helvetica, sans-serif; font-size: 15px; color: #57697e;">Zaheer Awan<br>
    Supply Bridges<br>
    +92-323-BRIDGES (27 43 43 7)<br>
    Street 38, Canal Park,<br>
    Lahore, Punjab<br>
    Pakistan
    
                        </span></font>
				</div>
				<!-- padding --><div style="height: 60px; line-height: 60px; font-size: 10px;"></div>
			</td></tr>
		</table>		
	</td></tr>
	<!--content 1 END-->
	<!--footer -->
	<tr><td class="iage_footer" align="center" bgcolor="#ffffff" style="padding-top:15px;">
		
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
			<tr><td align="center">
				<font face="Arial, Helvetica, sans-serif" size="3" color="#96a5b5" style="font-size: 13px;">
				<span style="font-family: Arial, Helvetica, sans-serif; font-size: 13px; color: #96a5b5;">
					2019 © SUPPLY BRIDGES. ALL Rights Reserved.
				</span></font>				
			</td></tr>			
		</table>
		
		<!-- padding --><div style="height: 30px; line-height: 30px; font-size: 10px;"></div>	
	</td></tr>
	<!--footer END-->
	<tr><td>
	<!-- padding --><div style="height: 80px; line-height: 80px; font-size: 10px;"></div>
	</td></tr>
</table>
<!--[if gte mso 10]>
</td></tr>
</table>
<![endif]-->
 
</td></tr>
</table>
			
</div> 

</body>
</html>
