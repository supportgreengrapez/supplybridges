
@extends('client.layout.appclient')
@section('content')
<body>
    <div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-12 col-sm-12 col-lg-offset-2">
               
            <div class="panel panel-default">
                
                <div class="panel-heading">
                    <h3 class="panel-title">
                       1: YOUR EMAIL &nbsp;&nbsp;&nbsp;&nbsp; {{session::get('username')}}               </h3>
                </div>
               
               
                <div class="panel-heading">
                    <h3 class="panel-title">
                       2: YOUR ADDRESS          </h3>
                </div>
            
                    <div class="row">
                      <div class="col-md-12">
                        <div id="mainContentWrapper">
                          <div class="col-md-12">
                             <div class="shopping_cart">
                            <form  role="form" action="{{url('/')}}/cart/checkout/add/address" method="post" id="payment-form">
                              {{ csrf_field() }}
                  
                                <div class="panel">
                                  <div class="">
                                    <div class="panel-body"> 
                                      <table class="table" style="font-weight: bold;">
                                  
                                        <tr>
                                          <td style="width: 175px; border-top: 0px;"><label for="id_first_name">First name:</label></td>
                                          <td style="border-top: 0px;"><input class="form-control" id="id_first_name" name="fname" value= "{{session::get('fname')}}  "
                                                                             required="required" type="text" pattern="[a-zA-Z0-9\s]+" maxlength="20"/></td>
                                        </tr>
                                        <tr>
                                          <td style="width: 175px; border-top: 0px;"><label for="id_last_name">Last name:</label></td>
                                          <td style="border-top: 0px;"><input class="form-control" id="id_last_name" name="lname" value= "{{session::get('lname')}}  "
                                                                             required="required" type="text" pattern="[a-zA-Z0-9\s]+" maxlength="20"/></td>
                                        </tr>
                                        <tr>
                                          <td style="width: 175px; border-top: 0px;"><label for="id_address_line_1">Address:</label></td>
                                          <td style="border-top: 0px;"><input class="form-control" id="id_address_line_1"
                                                                             name="address" required="required" type="text" pattern="[a-zA-Z0-9\s]+" maxlength="25"/></td>
                                        </tr>
                                     
                                        <tr>
                                          <td style="width: 175px; border-top: 0px;"><label for="id_city">City:</label></td>
                                          <td style="border-top: 0px;"><input class="form-control" id="id_city" name="city"
                                                                             required="required" type="text" pattern="[a-zA-Z0-9\s]+" maxlength="10"/></td>
                                        </tr>
                               
                        
                                        <tr>
                                          <td style="width: 175px; border-top: 0px;"><label for="id_phone">Phone:</label></td>
                                          <td style="border-top: 0px;"><input class="form-control" id="id_phone" name="phone" type="tel"/></td>
                                        </tr>
                                        <tr>
                                            <td style="width: 175px; border-top: 0px;"><label for="id_phone">Region:</label></td>
                                            <td style="border-top: 0px;"><input class="form-control" id="id_phone" name="region" type="text"/></td>
                                          </tr>
                                          
                                      </table>
                                          <button name="submit" type="submit" class="btn login-button">Save Address</button>
                                    </div>
                                  </div>
                                </div>
                                
                               
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                <div class="panel-heading panelhead">
                    <h3 class="panel-title">
                        3:ORDER SUMMERY                    </h3>
                </div>
                <div class="panel-heading panelhead">
                    <h3 class="panel-title">
                       4: PAYMENT                    </h3>
                </div>
            
            </div>
         
            <br/>
        </div>
    </div>
  </div>
</body>
@endsection
