@extends('client.layout.appclient')
@section('content')
<!----//End-bottom-header----> 

<!---//End-header----> 
<!----start-image-slider---->
<div class="container" style="margin-top: 20px;">
                 <div class="row">
                 <div class="heading">
                     <div class="col-lg-12 col-md-12 col-sm-12">
                         <h1>Find A Wish List</h1>
                         <p>To search for a friend's wish list, please fill in the information below.<br>
Only wish lists marked "public" will appear in search results.</p>
                     </div>                 
                 </div>
              </div>
              <div class="field">
                  <div class="col-lg-6 col-md-6 col-sm-12">
                  		<div class="Required">
                          <form method="post" action = "{{url('/')}}/search/wishlist/by/name" class="login100-form validate-form p-l-55 p-r-55 p-t-178">
                            {{ csrf_field() }}
                                  <div class="form-group">
                                    <label for="exampleInputTEXT">FIRST NAME*</label>
                                    <input type="text" class="form-control" id="exampleInputtext" name="fname" placeholder=                                      "">
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputTEXT1">LAST NAME*</label>
                                    <input type="text" class="form-control" name="lname" id="exampleInputtext1"                                       placeholder="">
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputTEXT2">CITY*</label>
                                    <input type="text" class="form-control" name="city" id="exampleInputtext2"                                       placeholder="">
                                  </div>
                             
                                  <button type="submit" class="btn btn-default">SEARCH</button>
                                </form>

                        </div>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-12">
                  		<div class="Required">
                          <form method="post" action = "{{url('/')}}/search/wishlist/by/username" class="login100-form validate-form p-l-55 p-r-55 p-t-178">
                            {{ csrf_field() }}
                                 <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="email" class="form-control"  name="username" id="exampleInputEmail1">
                              </div> 
                              
                               <button type="submit" class="btn btn-default">SEARCH</button> 
                           </form>
                        </div>
                  </div>
              </div>
			  </div>

<!--- //End-content----> 

@endsection