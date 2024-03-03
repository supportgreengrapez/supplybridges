@extends('admin.layout.appadmin')
@section('content')
<style>
    .modal-dialog{
        width:70% !important;
    }
</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1> Procurement > Alerts </h1>
</section>

<!-- Main content -->

<section class="content"> 
  
  <!-- Info boxes -->
  <div class="row"> 
    
    <!-- fix for small devices only -->
    <div class="clearfix visible-sm-block"></div>
  </div>
  <!-- /.row --> 
  
  <!-- Main row -->
  <div class="row"> 
    <!-- Left col -->
    <div class="col-md-12">
    <!-- TABLE: LATEST ORDERS -->
    <div class="box box-info">
    <div class="box-header with-border table-responsive">
    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#ExampleModal">Create PO</button>
    <div class="modal fade" id="ExampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title"><b>Create PO</b></h4>
          </div>
          <div class="modal-body"> 
    
            <form method="post" action = "{{url('/')}}/admin/home/create/pos/alerts/random" class="login-form" enctype="multipart/form-data">
          {{ csrf_field() }}
              <div class="row">
                <div class="col-lg-12">
                  <div class="input_fieldss_wrap">
                    <div class="row">
                      <div class="col-lg-6">
                            
                        <div class="form-group">
                          <label>Supplier</label>
                          <select class="form-control" name="supplier">
                              @if(count($entities)>0)
                              @foreach($entities as $entity)
                             <option value="{{$entity->DisplayName}}">{{$entity->DisplayName}}</option>
                             @endforeach
                             @endif
                 
                          </select>
                        </div>
                      </div>
                      </div>
                       <div class="row">
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label>Terms</label>
                          <select class="form-control" name="terms">
                            <option value="Advance Payement">Advance Payment</option>
                            <option value="Due on Receipt">Due on Receipt</option>
                            <option value="Net 7">Net 7</option>
                            <option value="Net 10">Net 10</option>
                            <option value="Net 15">Net 15</option>
                            <option value="Net 30">Net 30</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
                        <div class="form-group">
                          <label>Product Name</label>
                          <select class="form-control" name="name" id="name">
                                    <option value="">Select Product</option>
                              @if(count($product)>0)
                              @foreach($product as $products)
                            <option value="{{$products->name}}">{{$products->name}}</option>
                            @endforeach
                            @endif
                        
                          </select>
                        </div>
                      </div>
                      <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
                        <div class="form-group">
                          <label>SKU</label>
                          <input type="text" class="form-control"  name="sku" id="sku" placeholder="SKU" pattern="[a-zA-Z0-9\s]+" maxlength="50" required>
                        </div>
                      </div>
                      <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
                        <div class="form-group">
                          <label>Qty in Hand</label>
                          <input type="number" class="form-control" name="quantity_in_hand" id="quantity"   placeholder="Quantity in Hand" required>
                        </div>
                      </div>
                      <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
                        <div class="form-group">
                          <label>Purchase Qty</label>
                          <input type="number" class="form-control" name="purchase_quantity" id="purchase_quantity" placeholder="Purchase Quantity" required>
                        </div>
                      </div>
                      <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
                        <div class="form-group">
                          <label>Rate</label>
                          <input type="number" class="form-control" name="rate" id="rate" placeholder="Rate" required>
                        </div>
                      </div>
                      <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
                        <div class="form-group">
                          <label>Amount</label>
                          <input type="number" class="form-control" name="amount" id ="amount" placeholder="Amount" disabled>
                        </div>
                      </div>
                      <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <div class="form-group">
                          <label>Product Description</label>
                          <textarea  class="form-control" rows="6" id="description" name="description" pattern="[a-zA-Z0-9\s]+" maxlength="5000" placeholder="Product Description" required></textarea>
                        </div>
                      </div>
                    </div>
                  </div>
                  <button type="button"  class="btn btn-default btn-md adds_fields_button"><i class="fa fa-plus"></i></button>
                  <button type="submit" class="btn btn-default btn-md">Submit</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
    <table id="example3" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>Id</th>
          <th>Customer</th>
          <th>Product Name</th>
          <th>Product Description</th>
          <th>SKU</th>
          <th>Rate</th>
          <th>Order Qty</th>
          <th>Qty on Hand</th>
          <th>Status</th>
       
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
      
      @if($result>0)
      @foreach($result as $results)
      <tr>
        <td>{{$results->order_id}}</td>
        <td>{{$results->fname}} {{$results->lname}}</td>
        <td>{{$results->name}}</td>
        <td>{{$results->description}}</td>
        <td>{{$results->sku}}</td>
        <td><div class="sparkbar" data-color="#00a65a" data-height="20">PKR {{number_format($results->price)}}</div></td>
        <td>{{$results->quantity}}</td>
        <td>{{$results->available_quantity}}</td>
        @if($results->pos == 0)
        <td>New</td>
        @endif
        @if($results->pos == 1)
        <td>Complete</td>
        @endif
        <!--<td>{{$results->approved_quantity}}</td>-->
        <!--           <td> <input type="text"   name="quantity[]" class="form-control input-sm chat-input" placeholder="0"   />--> 
        <!--</td>--> 
        
        <!--<td> <input type="text"   name="purchase_price[]" class="form-control input-sm chat-input" placeholder="0"   />--> 
        <!--</td>--> 
        <!--  <td> supplier </td>-->
        <td><!-- <div class="checkbox">--> 
          
          <!--       <label><input type="checkbox" name="checkbox[]" value=""></label>--> 
          
          <!--</div>--> 
          @if($results->pos == 0)
              <td> </td>
          <!--<button type="button" class="btn btn-default" data-toggle="modal" data-target="#basicExampleModal{{$results->order_id}}{{$results->name}}"> Create Po </button>-->
          @endif
          
          @if($results->pos == 1)
          <form method="post" action = "{{url('/')}}/admin/home/delete/pos/alerts/{{$results->order_id}}/{{$results->name}}" enctype="multipart/form-data">
            {{ csrf_field() }}
            <button type="submit" class="btn btn-default"> Delete </button>
          </form>
          @endif
          <form method="post" action = "{{url('/')}}/admin/home/create/pos/alerts" enctype="multipart/form-data">
          {{ csrf_field() }}
          <input name="order_id" value="{{$results->order_id}}" type="hidden">
          <input name="name" value="{{$results->name}}" type="hidden">
          <input name="description" value="{{$results->description}}" type="hidden">
          <input name="sku" value="{{$results->sku}}" type="hidden">
          <input name="order_quantity" value="{{$results->quantity}}" type="hidden">
          <input name="price" value="{{$results->price}}" type="hidden">
          <input name="available_quantity" value="{{$results->available_quantity}}" type="hidden">
          
          <!-- Modal -->
          
          <div class="modal fade" id="basicExampleModal{{$results->order_id}}{{$results->name}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
          <div class="modal-dialog">
          <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title"><b>Create PO</b></h4>
          </div>
          <div class="modal-body">
              <div class="row">
                  
                  <div class="col-lg-12">
                      
                      <div class="input_fieldss_wrap" style="margin-bottom:10px">
                          <div class="row">
            <div class="col-lg-6">
              <div class="form-group" style="display:inline;">
                  <label for="email">Qty to be Purchased</label>
                  <input type="text"   name="quantity" class="form-control" placeholder="Qty to be Purchased"   style="width:100%;"/>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group"  style="display:inline;">
                  <label >Purchase Rate</label>
                  <input type="text"name="purchase_price" class="form-control" placeholder="Purchase Rate"   style="width:100%;"/>
              </div>
            </div>
            </div>
            <div class="row">
            <div class="col-lg-6">
              <div class="form-group"  style="display:inline;">
                  <label >Supplier</label>
                  <select class="form-control" name="supplier" style="width:100%;">
                          
                            <option value="Fahad">Fahad</option>
                            <option value="Faizan">Faizan</option>
                            <option value="Danish">Danish</option>
                          </select>
            </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group"  style="display:inline;">
                  <label>Payment terms</label>
                  <select class="form-control" name="terms" style="width:100%;">
                            <option value="Advance Payement">Advance Payment</option>
                            <option value="Due on Receipt">Due on Receipt</option>
                            <option value="Net 7">Net 7</option>
                            <option value="Net 10">Net 10</option>
                            <option value="Net 15">Net 15</option>
                            <option value="Net 30">Net 30</option>
                          </select>
              </div>
            </div>
            </div>
                          
                      </div>
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
              </div>
        </div>
      
        </div>
      
        </div>
      
        </div>
      
        </form>
      
        </td>
      
        </tr>
      
      @endforeach
      @endif
        </tbody>
      
    </table>
    <!-- /.table-responsive --> 
  </div>
  <!-- /.box-body --> 
  <!-- /.box-footer -->
  </div>
  </div>
  <!-- /.box -->
  </div>
  <!-- /.col -->
  </div>
  <!-- /.row --> 
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper --> 



@endsection