@extends('admin.layout.appadmin')
@section('content')

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Procurement > Create Purchase Order
          </h1>
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
                   <form method="post" action = "{{url('/')}}/admin/home/create/pos/alerts/random" class="login-form" enctype="multipart/form-data">
          {{ csrf_field() }}
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
                 
                     <select class="form-control" name="name" id="name" >
                            <option value="">Select Product</option>
                            @if(count($result)>0)
                    @foreach($result as $results)
                            <option value="{{urlencode($results->name)}}">{{$results->name}}</option>
                               @endforeach
                       @endif
                               </select>
                 
                        </div>
                        </div>
                        
                        <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12"> 
                        <div class="form-group">
                        <label>SKU</label>
                        <input type="text" class="form-control" id="sku" name="sku" placeholder="SKU" pattern="[a-zA-Z0-9\s]+" maxlength="50" required>
                        </div>
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12"> 
                        <div class="form-group">
                        <label>Qty in Hand</label>
                        <input type="number" class="form-control" name="quantity_in_hand" id="quantity" placeholder="Qty in Hand" required>
                        </div>
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12"> 
                        <div class="form-group">
                        <label>Purchase Qty</label>
                        <input type="number" class="form-control" name="purchase_quantity" id="purchase_quantity" placeholder="Purchase Qty" required>
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
                        <input type="number" class="form-control" name="amount" id="amount" placeholder="Amount" disabled>
                        </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12"> 
                        <div class="form-group">
                        <label>Product Description</label>
                        <textarea  class="form-control" rows="6" name="description" id="description" pattern="[a-zA-Z0-9\s]+" maxlength="5000" placeholder="Product Description" required></textarea> 
                        </div>
                        </div>
                        
                        </div>
				</div>
             <button type="button" class="btn btn-default btn-md adds_fields_button"><i class="fa fa-plus"></i></button>
             <button type="submit" class="btn btn-default btn-md">Submit</button>
             </div>
             </form>
    </div>
    </div>
                 
                </div>
              </div><!-- /.box -->
              
        </section><!-- /.content -->
            </div><!-- /.col -->

     @endsection

