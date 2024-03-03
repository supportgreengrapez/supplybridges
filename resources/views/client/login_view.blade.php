
@extends('client.layout.app')
@section('content')
<body>

    <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12 col-sm-12 col-lg-offset-3">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">
                               1: YOUR EMAIL </h3>
                        </div>
                        @if($errors->any())
                        <div class"alert alert-danger">{{$errors->first()}}</div>
                        @endif
                        <div class="panel-body">
                                <form role="form" method="post" action = "{{url('/')}}/cart/checkout"id="payment-form">
                                    {{ csrf_field() }}
          <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" name="email" class="form-control" id="email" placeholder="Email"  required="required">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" name="password" class="form-control" id="password" placeholder="Password"  required="required">
          </div>
          <button type="submit" class="btn btn-default">Login</button>
          <div class="forget">
     
</div>
        </form>
                        </div>
                        <div class="panel-heading panelhead">
                            <h3 class="panel-title">
                                2:YOUR ADDRESS                   </h3>
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