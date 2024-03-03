
@extends('client.layout.appclient')
@section('content')
<!----//End-bottom-header----> 
<!----start-image-slider---->
<div class="jumbotron">
<div class="heading">
  <h1>Thank You!</h1>
    @if(count($result)>0)
  <p class="lead"><strong>{{$result[0]->pk_id}}</strong> is your tracking ID.</p>
  @endif
  <hr>
  <p>
    Having trouble? <a href="{{url('/')}}/contact/us">Contact us</a>
  </p>
  <p class="lead">
  <a class="btn btn-default" href="{{url('/')}}/" role="button">Continue to homepage</a>
  </p>
  </div>

</div>

<!--- //End-content----> 

@endsection