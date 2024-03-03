
              @extends('client.layout.appclient')
@section('content')
              <body>
                  <div class="container">
                  <div class="row">
                      <div class="col-lg-8 col-md-12 col-sm-12 col-lg-offset-2">
                        	 
                          <div class="panel panel-default">
                              
                              <div class="panel-heading">
                                  <h3 class="panel-title">
                                     1: YOUR EMAIL &nbsp;&nbsp;&nbsp;&nbsp; {{Session::get('username')}}                </h3>
                              </div>
  
                             
                              <div class="panel-heading">
                                  <h3 class="panel-title">
                                     2: YOUR ADDRESS          </h3>
                              </div>
                       
                              <div class="row">
                                    @if(count($result1)>0)
                                    @foreach($result1 as $results)
                        <div class="col-md-6 col-sm-12 col-xs-12">
                          <div class="x_panel">
                            <div class="x_content">
                              <div class="member-left-side">
                                <div class="member-email clearfix"> <b>Name</b> <span> {{$results->fname}} {{$results->lname}}  </span> </div>
                             
                             
                                <div class="member-email clearfix"> <b>Building No</b> <span>{{$results->building_no}}</span> </div>
                                <div class="member-email clearfix"> <b>Building Name</b> <span>{{$results->building_name}}</span> </div>
                                <div class="member-email clearfix"> <b>Floor / Suite</b> <span>{{$results->floor}}</span> </div>
                                <div class="member-email clearfix"> <b>Street</b> <span>{{$results->street}}</span> </div>
                                <div class="member-email clearfix"> <b>Block</b> <span>{{$results->block}}</span> </div>
                                <div class="member-email clearfix"> <b>Sector / Phase</b> <span>{{$results->phase}}</span> </div>
                                <div class="member-email clearfix"> <b>Area</b> <span>{{$results->area}}</span> </div>
                                <div class="member-email clearfix"> <b>City</b> <span>{{$results->city}}</span> </div>
                                <div class="member-email clearfix"> <b>Phone No</b> <span>{{$results->phone}}</span> </div>
                            
                                <div class="member-email clearfix">
                              <div class="col-lg-12">
                              <a href="{{url('/')}}/cart/checkout/address/view/order/{{$results->pk_id}}" class="btn btn-default btn-block">Use This Address</a>
                              </div>
                              </div>
                              </div>
                              
                            </div>
                          </div>
                        </div>

                        @endforeach
                        @endif
                      

                        <div class="col-lg-12">
                              <a href="{{url('/')}}/cart/checkout/add/new/address" class="btn btn-default pull-right" style="margin-bottom:10px;">Add New Address</a>
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
