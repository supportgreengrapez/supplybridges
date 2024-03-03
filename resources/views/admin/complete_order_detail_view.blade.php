@extends('admin.layout.appadmin')
@section('content') 

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper"> 
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1> @if($result>0)
      @foreach($result as $results) <span style="margin-top:5px;float:left"> Order ID {{$results->pk_id}} </span> &nbsp; <span class="label label-danger"> Completed</span> @endforeach
      @endif </h1>
  </section>
  <!-- Main content -->
  <section class="content"> 
    <!-- Info boxes --> 
    
    <!-- Main row -->
    <div class="row"> 
      <!-- Left col -->
      <div class="col-md-12"> 
        <!-- TABLE: LATEST ORDERS -->
        <div class="box box-info">
          <div class="box-header with-border">
            <div class="row">
              <div class="productbox">
                <div class=" col-md-12">
                  <div class="panel panel-default">
                    <div class="panel-body">
                      <div class="row">
                        <div class="col-lg-12">
                          <div class="row">
                            <div class="col-sm-2 col-md-2 col-lg-2">
                            <div itemscope="">
                              <p itemprop="email"><b> Customer Name</b></p>
                              <p><b>Contact #</b></p>
                              <p><b>Building No</b></p>
                              <p><b>Building Name</b></p>
                              <p><b>Floor</b></p>
                              <p><b>Street</b></p>
                              <p><b>Block</b></p>
                              <p><b>Phase</b></p>
                              <p><b>Area</b></p>
                              <p><b>City</b></p>
                            </div>
                          </div>
                            @if(count($addresses)>0)
                          @foreach($addresses as $results)
                            <div class="col-sm-4 col-md-4 col-lg-4">
                            <div itemscope="">
                              <p>{{$results->fname}} {{$results->lname}}</p>
                              @if($results->phone == "")
                              <p>----</p>
                              @else
                              <p>{{$results->phone}}</p>
                              @endif
                              
                              @if($results->building_no == "")
                              <p>----</p>
                              @else
                              <p>{{$results->building_no}}</p>
                              @endif
                              
                              @if($results->building_name == "")
                              <p>----</p>
                              @else
                              <p>{{$results->building_name}}</p>
                              @endif
                              
                              @if($results->floor == "")
                              <p>----</p>
                              @else
                              <p>{{$results->floor}}</p>
                              @endif
                              
                              @if($results->street == "")
                              <p>----</p>
                              @else
                              <p>{{$results->street}}</p>
                              @endif
                              
                              @if($results->block == "")
                              <p>----</p>
                              @else
                              <p>{{$results->block}}</p>
                              @endif
                              @if($results->phase == "")
                              <p>----</p>
                              @else
                              <p>{{$results->phase}}</p>
                              @endif
                              
                              @if($results->area == "")
                              <p>----</p>
                              @else
                              <p>{{$results->area}}</p>
                              @endif
                              
                              @if($results->city == "")
                              <p>----</p>
                              @else
                              <p>{{$results->city}}</p>
                              @endif </div>
                          </div>
                            @endforeach
                            @endif
                            <div class="col-sm-2 col-md-2 col-lg-2">
                              <div itemscope="">
                                <p itemprop="email"> <b>Cash to be Collected</b></p>
                              </div>
                            </div>
                            @if($result>0)
                            @foreach($result as $results)
                            <div class="col-sm-4 col-md-4 col-lg-4">
                              <div itemscope="">
                                <p>PKR {{number_format($results->amount)}}</p>
                              </div>
                            </div>
                            @endforeach
                            @endif </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class=" col-md-12">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Product Name</th>
                        <th>SKU</th>
                        <th>Quantity</th>
                        <th>Rate</th>
                      </tr>
                    </thead>
                    <tbody>
                    
                    @if(count($result1)>0)
                    @foreach($result1 as $results)
                    <tr>
                      <td>{{$results->product_name}}</td>
                      <td>{{$results->sku}}</td>
                      <td>{{$results->quantity}}</td>
                      <td>{{number_format($results->price)}}</td>
                    </tr>
                    @endforeach
                    @endif
                      </tbody>
                    
                  </table>
                </div>
              </div>
            </div>
          </div>
          <!-- /.box-header --> 
          
          <!-- /.box-footer --> 
          <!-- /.box-footer add button next/previus
                
                
                
                
                 --> 
        </div>
        <!-- /.box --> 
      </div>
      <!-- /.col --> 
    </div>
    <!-- /.row --> 
  </section>
  <!-- /.content --> 
  
  <!-- Main content --> 
</div>
<!-- /.content-wrapper --> 

@endsection