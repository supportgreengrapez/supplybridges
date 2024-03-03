@extends('admin.layout.appadmin')
@section('content') 

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper"> 
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1><span style="margin-top:5px;float:left"> Client Profile </span></h1>
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
            <div class="box-header with-border" style="    padding: 10px 0px;">
              <div class="row">
                <div class="productbox">
                  <div class=" col-md-6">
                    <div class="panel panel-default">
                      <div class="panel-body">
                          <div class="col-lg-6">
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
                              <div class="col-lg-6">
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
                                  @endif
                                </div>
                                </div>
                              @endforeach
                              @endif
                              </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
  </section>
  <!-- /.content --> 
  
  
    <section class="content-header">
    <h1><span style="margin-top:5px;float:left"> Business Account  </span></h1>
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
            <div class="box-header with-border" style="    padding: 10px 0px;">
              <div class="row">
                <div class="productbox">
                  <div class=" col-md-6">
                    <div class="panel panel-default">
                      <div class="panel-body">
                          <div class="col-lg-6">
                                <div itemscope="">
                                    <p><b>Business Name</b></p>
                                  <p><b>Company Name</b></p>
                                  <p><b>Entity Type</b></p>
                                  <p><b>Job Title</b></p>
                                  <p><b>NTN</b></p>
                                  <p><b>STN</b></p>
                                </div>
                                </div>
                              @if(count($business)>0)
                              @foreach($business as $results)
                              <div class="col-lg-6">
                                <div itemscope="">
                                  
                                  
                                   @if($results->business_name == "")
          <p>----</p>
          @else
          <p>{{$results->business_name}}</p>
          @endif
                                  
                                  @if($results->company_name == "")
          <p>----</p>
          @else
                                  <p>{{$results->company_name}}</p>
                                   @endif
                                   
                                   @if($results->entity_type == "")
          <p>----</p>
          @else
                                  <p>{{$results->entity_type}}</p>
                                  @endif
                                   
                                   @if($results->job_title == "")
          <p>----</p>
          @else
                                  <p>{{$results->job_title}}</p>
                                  @endif
                                   
                                   @if($results->NTN == "")
          <p>----</p>
          @else
                                  <p>{{$results->NTN}}</p>
                                  @endif
                                   
                                   @if($results->STN == "")
          <p>----</p>
          @else
                                  <p>{{$results->STN}}</p>
                                  @endif
                                 
                                </div>
                                </div>
                              @endforeach
                              @endif
                              </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
  </section>
  <!-- Main content --> 
</div>
<!-- /.content-wrapper --> 

@endsection