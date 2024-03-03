<?php

namespace App\Http\Controllers;
use QuickBooksOnline\API\Core\ServiceContext;
use QuickBooksOnline\API\DataService\DataService;
use QuickBooksOnline\API\PlatformService\PlatformService;
use QuickBooksOnline\API\Core\Http\Serialization\XmlObjectSerializer;
use QuickBooksOnline\API\Facades\Invoice;
use QuickBooksOnline\API\Data\IPPLine;

use QuickBooksOnline\API\Core\OAuth\OAuth2\OAuth2LoginHelper;
use QuickBooksOnline\API\Facades\Customer;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Mail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Cart;
use Session;

class clientController extends Controller
{
   
   
   public function verify_code($username,$code)
        {
                date_default_timezone_set("Asia/Karachi");
        $date = date('Y-m-d');
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $products = $cart->items;
        
            $result = DB::select("select* from reset_password where username= '$username' and verification_code= '$code' and TIMESTAMPDIFF(MINUTE,reset_password.created_at,NOW()) <=30 ");
             $main_category = DB::select("select * from main_category");
            
            if(count($result)>0)
            {
                return view('client.change_password',compact('username','main_category','products'));
            }
            else
            return "The Verification code is expired";
        }
        
           public function reset_password_view() {
                   date_default_timezone_set("Asia/Karachi");
        $date = date('Y-m-d');
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $products = $cart->items;
        
                $main_category = DB::select("select * from main_category");
                 return view('client.password_reset',compact('products','main_category'));
             
             }
             
                    public function reset_password(Request $request) {


                $username = $request->input('username');
                $result = DB::select("select* from client_details where username = '$username'");
                 
                if(count($result)>0)
                {
                    $vcode = uniqid();
                    DB::insert("insert into reset_password (username,verification_code) values('$username','$vcode') ");
                    $customer_name= $result[0]->{'fname'};
                    $data = array(
                        'customer_name' =>$customer_name,
                        'customer_username'=> $username,
                        'customer_verification_code'=> $vcode,
                        
                        
                    );
                    Mail::send('email_reset_password', $data, function ($message) use($username) {
                        
                                $message->from('support@supplybridges.com','SUPPLY BRIDGES' );
                               
                                $message->to($username)->subject('Password Reset Confirmation Link');
                        
                            });
                    return redirect()->back()->with('message', 'A Password reset link sent to your email');
                } 
                else
                {
                    return Redirect::back()->withErrors('Username not found');
                }

                

                    
                 
                 }
                 
                      public function password_change(Request $request,$username)
        {
                date_default_timezone_set("Asia/Karachi");
        $date = date('Y-m-d');
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $products = $cart->items;
        
          $main_category = DB::select("select * from main_category");
          
            $password = md5($request->input('password'));
            DB::update("update client_details set password ='$password' where username='$username'");
            return redirect('/login',compact('products','main_category'))->with('message', 'Your Password has been changed Successfully');
        }




    public function searchByCategory($main='',$sub='',$type='')
    {  
        
    
        date_default_timezone_set("Asia/Karachi");
        $date = date('Y-m-d');
        $result = [];
        $d = [];
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $products = $cart->items;
        $main_cate =  [];
        $sub_category  =  [];
        $product_type  =  [];
           $main_category = DB::select("select * from main_category");
        if(empty($main) && empty($sub) && empty($type))
        {
             $main_cate = DB::select("select * from main_category");
             
            $d = DB::select("select product.pk_id,product.thumbnail,product.name, product.product_type,product.price,product.description,product.sku, discount_table.sku,discount_table.start_date,discount_table.end_date,discount_table.percentage from product,discount_table where product.sku = discount_table.sku and (discount_table.start_date < '$date' or discount_table.start_date = '$date') and (discount_table.end_date > '$date' or discount_table.end_date = '$date') and product.status = '1'");
            
               $result1 = DB::select("select product.pk_id,product.thumbnail,product.name, product.product_type,product.price,product.description,product.sku, discount_table.sku,discount_table.start_date,discount_table.end_date,discount_table.percentage from product,discount_table where product.sku = discount_table.sku and '$date' > discount_table.end_date and product.status = '1'");  
          
            $result = DB::select("SELECT * FROM product WHERE NOT EXISTS (SELECT * FROM discount_table WHERE product.sku = discount_table.sku) and  product.status = '1'");
            
     
        
          
            
        }
        else if(empty($sub) && empty($type))
        {  
           
                  $sub_category = DB::select("select * from sub_category where category = '$main'");
          
          
           
            $d = DB::select("select product.pk_id,product.thumbnail,product.name, product.product_type,product.price,product.description,product.sku, discount_table.sku,discount_table.start_date,discount_table.end_date,discount_table.percentage from product,discount_table where product.sku = discount_table.sku and product.category = '$main' and (discount_table.start_date < '$date' or discount_table.start_date = '$date') and (discount_table.end_date > '$date' or discount_table.end_date = '$date') and product.status = '1'");
            
            
                 $result1 = DB::select("select product.pk_id,product.thumbnail,product.name, product.product_type,product.price,product.description,product.sku, discount_table.sku,discount_table.start_date,discount_table.end_date,discount_table.percentage from product,discount_table where product.sku = discount_table.sku and '$date' > discount_table.end_date and product.status = '1' and product.category = '$main'");
        
         
           $result = DB::select("SELECT * FROM product WHERE NOT EXISTS (SELECT * FROM discount_table WHERE product.sku = discount_table.sku) and  product.status = '1' and product.category = '$main'");
            
    
     
        } 
        else if(empty($type))
        {
            
                    $product_type = DB::select("select * from product_type where main_category = '$main' and sub_category = '$sub'");
        
            $d = DB::select("select product.pk_id,product.thumbnail,product.name, product.product_type,product.price,product.description,product.sku, discount_table.sku,discount_table.start_date,discount_table.end_date,discount_table.percentage from product,discount_table where product.sku = discount_table.sku and product.category = '$main' and product.sub_category='$sub' and (discount_table.start_date < '$date' or discount_table.start_date = '$date') and (discount_table.end_date > '$date' or discount_table.end_date = '$date') and product.status = '1'");
        
            
            $result = DB::select("SELECT * FROM product WHERE NOT EXISTS (SELECT * FROM discount_table WHERE product.sku = discount_table.sku) and  product.status = '1'  and product.category = '$main'   and product.sub_category='$sub'");
            
            
                 $result1 = DB::select("select product.pk_id,product.thumbnail,product.name, product.product_type,product.price,product.description,product.sku, discount_table.sku,discount_table.start_date,discount_table.end_date,discount_table.percentage from product,discount_table where product.sku = discount_table.sku and '$date' > discount_table.end_date and product.status = '1' and product.category = '$main'   and product.sub_category='$sub'");
            
          
        } 

        else
        {

               $main_cate = DB::select("select * from product_type where main_category = '$main' and sub_category = '$sub' and product_type = '$type'");

            $d = DB::select("select product.pk_id,product.thumbnail,product.name, product.product_type,product.price,product.description,product.sku, discount_table.sku,discount_table.start_date,discount_table.end_date,discount_table.percentage from product,discount_table where product.sku = discount_table.sku and product.category = '$main' and product.sub_category='$sub'  and product.product_type='$type' and (discount_table.start_date < '$date' or discount_table.start_date = '$date') and (discount_table.end_date > '$date' or discount_table.end_date = '$date') and product.status = '1'");
        
            $result = DB::select("SELECT * FROM product WHERE NOT EXISTS (SELECT * FROM discount_table WHERE product.sku = discount_table.sku) and  product.status = '1'  and product.category = '$main'   and product.sub_category='$sub'  and product.product_type='$type'");
            
            
                 $result1 = DB::select("select product.pk_id,product.thumbnail,product.name, product.product_type,product.price,product.description,product.sku, discount_table.sku,discount_table.start_date,discount_table.end_date,discount_table.percentage from product,discount_table where product.sku = discount_table.sku and '$date' > discount_table.end_date and product.status = '1' and product.category = '$main'   and product.sub_category='$sub'  and product.product_type='$type'");
            
        
                }
        return view('client.product_view',compact('result','result1','d','products','main','sub','type','main_category','sub_category','product_type','main_cate'));
    }
    public function home_view() {

        date_default_timezone_set("Asia/Karachi");
        $date = date('Y-m-d');
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $products = $cart->items;
            

        $result = [];$result1 = [];$result2 = [];$result3 = [];$result4 = [];
        
          $d4 = DB::select("select * from product,discount_table where product.category = 'Cleaning Supplies' and product.sku = discount_table.sku and (discount_table.start_date < '$date' or discount_table.start_date = '$date') and (discount_table.end_date > '$date' or discount_table.end_date = '$date') and product.status = '1'");
    $d3 = DB::select("select * from product,discount_table where product.category = 'Cleaning Supplies' and product.sku = discount_table.sku and (discount_table.start_date < '$date' or discount_table.start_date = '$date') and (discount_table.end_date > '$date' or discount_table.end_date = '$date') and product.status = '1'");
 
 // $result = DB::select("SELECT * FROM product WHERE NOT EXISTS (SELECT * FROM discount_table WHERE product.sku = discount_table.sku  and  ('$date' < discount_table.start_date or '$date' > discount_table.end_date))and product.category = 'Cleaning Supplies' and product.status = '1'");
  
     
 
 $result = DB::select("SELECT * FROM product where category = 'packing supplies' and status = '1' LIMIT 0, 4 ");
  
   $result1 = DB::select("SELECT * FROM product where category = 'hygiene supplies' and status = '1' LIMIT 0, 4 ");
  
    $result2 = DB::select("SELECT * FROM product where category = 'disposable tableware'  and status = '1' LIMIT 0, 4 ");
     $result3 = DB::select("SELECT * FROM product where category = 'janitorial supplies'  and status = '1' LIMIT 0, 4 ");
  $result4 = DB::select("SELECT * FROM product where category = 'stationery'  and status = '1' LIMIT 0, 4 ");

 
            $main_category = DB::select("select * from main_category");
       
            return view('client.client_home',compact('result','result1','result2','result3','result4','d','d1','d2','d3','d4','discount_price','discount_price1','discount_price2','discount_price3','discount_price4','products','main_category'));
        

    
    }
    
    public function edit_profile_view() {
          $oldCart = Session::get('cart');
    $cart = new Cart($oldCart);
    $products = $cart->items;
      $username = session()->get('username');
     
      $main_category = DB::select("select * from main_category");
      
         $user = DB::select("select * from client_details where username = '$username'");
         $user_id = $user[0]->pk_id;
       
          $address = DB::select("select * from address_table where user_id = '$user_id'");
      
          
             $business_account = DB::select("select * from business_account where user_id = '$user_id'");
    
       
        return view('client.edit-profile',compact('products','main_category','user','address','business_account'));
    
    }
    
   
    public function create_client_view() {
          $oldCart = Session::get('cart');
    $cart = new Cart($oldCart);
    $products = $cart->items;
    
      $main_category = DB::select("select * from main_category");
       
        return view('client.signup',compact('products','main_category'));
    
    }


   
    public function guest_order_tracking_view() {
          $oldCart = Session::get('cart');
    $cart = new Cart($oldCart);
    $products = $cart->items;
       
       
         $main_category = DB::select("select * from main_category");
        return view('client.guest_order_tracking_view',compact('products','main_category'));
    
    }
    
        public function order_tracking_view() {
          $oldCart = Session::get('cart');
    $cart = new Cart($oldCart);
    $products = $cart->items;
      $username = Session::get('username');
  
        $ordertracking = DB::select("select* from client_details where username = '$username' ");
        $user = $ordertracking[0]->pk_id;
    
        $orderdetail = DB::select("select* from order_table where user_id = '$user' ");
    
         $main_category = DB::select("select * from main_category");
        return view('client.order_id',compact('products','orderdetail','main_category'));
    
    }
    
           public function order_tracking_detail_view($id) {
            $oldCart = Session::get('cart');
    $cart = new Cart($oldCart);
    $products = $cart->items;
         $username = Session::get('username');
         
           $main_category = DB::select("select * from main_category");
           
            $user = DB::select("select* from client_details where username = '$username' ");
                $user = $user[0]->pk_id;
            
          $ordertracking = DB::select("select* from order_table where pk_id ='$id' and user_id = '$user'");
         
             $address = $ordertracking[0]->shipment_address_id;
              $ad = DB::select("select* from address_table where pk_id = '$address' ");
           
       
          
          $orderdetail = DB::select("select* from detail_table where  order_id ='$id'");
          
          if(count($ordertracking)>0)
              
        return view('client.view_order_tracking',compact('products','ordertracking','orderdetail','ad','main_category'));
        else
          return Redirect::back()->withErrors('No Order Exist');
    
    }
    
    
        public function order_tracking(Request $request) {
            
       
          $oldCart = Session::get('cart');
    $cart = new Cart($oldCart);
    $products = $cart->items;
       $orderid = $request->input('orderid');
         $username = Session::get('username');
         
           $main_category = DB::select("select * from main_category");
           
            $user = DB::select("select* from client_details where username = '$username' ");
                $user = $user[0]->pk_id;
            
          $ordertracking = DB::select("select* from order_table where pk_id ='$orderid' and user_id = '$user'");
             $address = $ordertracking[0]->shipment_address_id;
              $ad = DB::select("select* from address_table where pk_id = '$address' ");
           
       
          
          $orderdetail = DB::select("select* from detail_table where  order_id ='$orderid'");
          
          if(count($ordertracking)>0)
              
        return view('client.view_order_tracking',compact('products','ordertracking','orderdetail','ad','main_category'));
        else
          return Redirect::back()->withErrors('No Order Exist');
        
    
    }
    
        public function guest_order_tracking(Request $request) {
            
       
          $oldCart = Session::get('cart');
    $cart = new Cart($oldCart);
    $products = $cart->items;
      $email = $request->input('email');
       $orderid = $request->input('orderid');
       
         $main_category = DB::select("select * from main_category");
         
          $ordertracking = DB::select("select* from order_table where username = '$email' and pk_id ='$orderid'");
          
          $orderdetail = DB::select("select* from detail_table where  order_id ='$orderid'");
          
          if(count($ordertracking)>0)
              
        return view('client.order_detail_view',compact('products','ordertracking','orderdetail','main_category'));
        else
          return Redirect::back()->withErrors('No Order Exist');
        
    
    }
    
    
    
    public function create_client(Request $request)
    {
        
   
        if ($request->input('password') == $request->input('confirm'))
        {
            
           $business_status = 0;
            $username =$request->input('email');
          
    
            $result = DB::select("select* from client_details where username = '$username' ");
  
               if(count($result)>0)
               {
                return Redirect::back()->withErrors('Username already Exist');
               }
               else
               {
                   $DisplayName = '';
                   
                   if(!empty($request->input('business_name')))
                   {
                       $DisplayName = $request->input('business_name');
                   }
                   elseif(!empty($request->input('company_name')))
                   {
                       $DisplayName = $request->input('company_name');
                   }
                  else
                  {
                      $DisplayName = $request->input('fname');
                  }
                      
       //   DB::insert("insert into client_details (QB_id,fname,lname, username, password,promostatus ) values (?,?,?,?,?,?)",array($resultingCustomerObj->Id,$request->input('fname'),$request->input('lname'),$request->input('email'),md5($request->input('password')),$promo));
                         
         $refresh = DB::select("select* from refresh_token where pk_id = '1'");
  
    
$dataService = DataService::Configure(array(
        'auth_mode' => 'oauth2',
        'ClientID' => "Q09W3sGjTV2ATPHeBGLJ3LAXP5CININS5yi4JuEx1zFnOrW5er",
        'ClientSecret' => "xetiEvB5XsW52SlMw0IyILykFdHjLcrTIKQDTejr",
     //  'accessTokenKey' =>  "eyJlbmMiOiJBMTI4Q0JDLUhTMjU2IiwiYWxnIjoiZGlyIn0..gTRT28jsygMtOsbv3wJorg.THlQ5bTG5_rgy4jGipaw_OxGiAeddMtx29KGlwjFXVHWThBOyDt8pBVknNe1sNwT61P2-jf0UcGCrX91O3MB3X-UbDwLDrmqgy4OO8xAyUBbcADKwWzy5ylehrcr2rAEG75nIejikHCgn29vvCUFMv7GsoRW0Pp6XXBnbLSUqaUlUYd6Cx3lzQD5EDDDUaAS7vplLgmYy--1l8V3tGZx8BrbUIkF39qIcRVlST5-3D52FGr219vLeMS9Nu5-wPGcWk06C9K1ccSFZuFwp12_kdsOe5PxHGMzro7VcxfuTjz1g72r6EtNAxj3zemqtHePGSC0F-K47Ab0u8AUCPb4prmwsYnGSNL3_AeeiNfUI4yZxEXbVff__5ocL_8Z79w4Lmwk3olVaOSNd3Bwm9vdGlxs3FdglGliqPKusUSFx7iJWtQWiR3FwgbCsKOr49A8woVUuRtuUfzaV69vDEKUyDIXGf-7mFi4iI4RZ66IfwUOmtzkj7bfXZ8M90s_AhTjzRDEwdCNVF2y4gEAoj87amAu0ZBOUJS_feOGMWgY1w8DyD0Z1TZ37UXxpXbDIo2rxfTZ9k46IF2T52Oo8alB84HgXq9clCS5Tg5vjmx5BObPrfESh4x-Oas4mIulIuDZ4KclykaUjmt8eQDliMulXLGKgOP7XsbdyCPN3aeKPsGSXJ4_0rnZhTK3H8A9X5a_xLZu81SKBxUkboiJxW3JTNEYfGvVZEFleoBEq17Ihuo.IIF70ymcvGZaB7Y1b9hQ4w",
        'refreshTokenKey' => $refresh[0]->refresh_token,
        'RedirectURI' => "https://developer.intuit.com/v2/OAuth2Playground/RedirectUrl",
        'scope' => "com.intuit.quickbooks.accounting",
        'QBORealmID' => "193514739439574",
        'baseUrl' => "Production"
  ));
      $dataService->setLogLocation("/Users/hlu2/Desktop/newFolderForLog");
      
      $oauth2LoginHelper = new OAuth2LoginHelper("Q09W3sGjTV2ATPHeBGLJ3LAXP5CININS5yi4JuEx1zFnOrW5er","xetiEvB5XsW52SlMw0IyILykFdHjLcrTIKQDTejr");
$accessTokenObj = $oauth2LoginHelper->
                    refreshAccessTokenWithRefreshToken($refresh[0]->refresh_token);
$accessTokenValue = $accessTokenObj->getAccessToken();
$refreshTokenValue = $accessTokenObj->getRefreshToken();
 
 DB::update("update refresh_token set refresh_token='$refreshTokenValue' where pk_id = '1'");
  
$dataService = DataService::Configure(array(
        'auth_mode' => 'oauth2',
     'ClientID' => "Q09W3sGjTV2ATPHeBGLJ3LAXP5CININS5yi4JuEx1zFnOrW5er",
        'ClientSecret' => "xetiEvB5XsW52SlMw0IyILykFdHjLcrTIKQDTejr",
       'accessTokenKey' => $accessTokenValue,
       'refreshTokenKey' => $refreshTokenValue,
        'RedirectURI' => "https://developer.intuit.com/v2/OAuth2Playground/RedirectUrl",
        'scope' => "com.intuit.quickbooks.accounting",
        'QBORealmID' => "193514739439574",
        'baseUrl' => "Production"
  ));
      $dataService->setLogLocation("/Users/hlu2/Desktop/newFolderForLog");
      $OAuth2LoginHelper = $dataService->getOAuth2LoginHelper();
      $accessToken = $OAuth2LoginHelper->refreshToken();
      $error = $OAuth2LoginHelper->getLastError();
      if ($error != null) {
          echo "The Status code is: " . $error->getHttpStatusCode() . "\n";
          echo "The Helper message is: " . $error->getOAuthHelperError() . "\n";
          echo "The Response message is: " . $error->getResponseBody() . "\n";
          return;
      }
      $dataService->updateOAuth2Token($accessToken);
      $dateTime = new \DateTime('NOW');
                    
                    
                        $customerObj = Customer::create([
                         
                        
                            "GivenName"=> uniqid() .' '.$request->input('fname'),
                            "FamilyName"=>  $request->input('lname'),
                                "Mobile"=>  $request->input('phone'),
                                    "Organization"=>  $request->input('business_name'),
                                         "CompanyName"=>  $request->input('company_name'),
                          "DisplayName"=>  $DisplayName,
                            "PrimaryEmailAddr"=>  [
                                "Address" => $request->input('email')
                            ]
                           ]);
                          $resultingCustomerObj = $dataService->Add($customerObj);
                     
                         $promo = 0;
                         
                          $error = $dataService->getLastError();
                          if ($error) {
                              echo "The Status code is: " . $error->getHttpStatusCode() . "\n";
                              echo "The Helper message is: " . $error->getOAuthHelperError() . "\n";
                              echo "The Response message is: " . $error->getResponseBody() . "\n";
                          } else {
                          
                            //  var_dump($resultingCustomerObj);
                              $business_status = $request->input('tab');
                         
                                      DB::insert("insert into client_details (QB_id,fname,lname, username, password,promostatus,business_status ) values (?,?,?,?,?,?,?)",array($resultingCustomerObj->Id,$request->input('fname'),$request->input('lname'),$request->input('email'),md5($request->input('password')),$promo, $business_status));
                          $user = DB::select("select* from client_details where username = '$username' ");
        $user_id = $user[0]->pk_id;
            DB::insert("insert into address_table (user_id,fname,lname,building_no,building_name,floor,street,block,phase,area, city, phone) values (?,?,?,?,?,?,?,?,?,?,?,?)",array($user_id,$request->input('fname'),$request->input('lname'),$request->input('building_no'),$request->input('building_name'),$request->input('floor'),$request->input('street'),$request->input('block'),$request->input('phase'),$request->input('area'),$request->input('city'),$request->input('phone')));
   

  if($business_status == 1)
                          {
                                DB::insert("insert into business_account (user_id,business_name,company_name,entity_type,job_title,NTN,STN) values (?,?,?,?,?,?,?)",array($user_id,$request->input('business_name'),$request->input('company_name'),$request->input('entity_type'),$request->input('job_title'),$request->input('NTN'),$request->input('STN')));
   
                          }
                          }
                           return redirect('/login');
                }
                
                               
    
       
    }
    else{
       return Redirect::back()->withErrors('Password does not match');
       }


}



 public function edit_profile(Request $request)
    {
        
  
         
           $business_status = 0;
            $username = $request->input('email');
          
            $result = DB::select("select* from client_details where username = '$username' ");
            
             $QB_id = $result[0]->QB_id;
             
    
       
  $DisplayName = '';
                  if(!empty($request->input('business_name')))
                   {
                       $DisplayName = $request->input('business_name');
                   }
                   elseif(!empty($request->input('company_name')))
                   {
                       $DisplayName = $request->input('company_name');
                   }
                  else
                  {
                      $DisplayName = $request->input('fname');
                  }
                  
                  
                    $business_status = $request->input('tab');
                              
                      
                         $user = DB::select("select* from client_details where username = '$username' ");
        $user_id = $user[0]->pk_id;
        $bus_status =  $user[0]->business_status;
         //   DB::insert("insert into address_table (user_id,fname,lname,building_no,building_name,floor,street,block,phase,area, city, phone) values (?,?,?,?,?,?,?,?,?,?,?,?)",array($user_id,$request->input('fname'),$request->input('lname'),$request->input('building_no'),$request->input('building_name'),$request->input('floor'),$request->input('street'),$request->input('block'),$request->input('phase'),$request->input('area'),$request->input('city'),$request->input('phone')));
  

         if($business_status == 1)
                           {
                               
                                  if($bus_status == 0)
     {
            DB::table('client_details')->where('username', $username)->update(['fname' =>$request->input('fname'),'lname' =>$request->input('lname'),'business_status' =>$business_status]);
    
       
                  DB::insert("insert into business_account (user_id,business_name,company_name,entity_type,job_title,NTN,STN) values (?,?,?,?,?,?,?)",array($user_id,$request->input('business_name'),$request->input('company_name'),$request->input('entity_type'),$request->input('job_title'),$request->input('NTN'),$request->input('STN')));
   // DB::table('client_details')->where('pk_id', $user_id)->update(['business_status' => $business_status]);
            $request->session()->put('name',$request->input('fname').' '.$request->input('lname'));
        $request->session()->put('fname',$request->input('fname'));
        $request->session()->put('lname',$request->input('lname'));
                         
     }
     else
     {
            DB::table('client_details')->where('username', $username)->update(['fname' =>$request->input('fname'),'lname' =>$request->input('lname'),'business_status' =>$business_status]);
      DB::table('business_account')->where('user_id', $user_id)->update(['business_name' =>$request->input('business_name'),'company_name' =>$request->input('company_name'),'entity_type' =>$request->input('entity_type'),'job_title' =>$request->input('job_title'),'NTN' =>$request->input('NTN'),'STN' =>$request->input('STN')]);
            $request->session()->put('name',$request->input('fname').' '.$request->input('lname'));
        $request->session()->put('fname',$request->input('fname'));
        $request->session()->put('lname',$request->input('lname'));
     }
                          }
                          else
                          {
                               DB::delete("delete from business_account where user_id = '$user_id'");
                          }
                    
                          
                          
                    return redirect('/');
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                      
       $refresh = DB::select("select* from refresh_token where pk_id = '1'");
  
    
$dataService = DataService::Configure(array(
        'auth_mode' => 'oauth2',
        'ClientID' => "Q09W3sGjTV2ATPHeBGLJ3LAXP5CININS5yi4JuEx1zFnOrW5er",
        'ClientSecret' => "xetiEvB5XsW52SlMw0IyILykFdHjLcrTIKQDTejr",
     //  'accessTokenKey' =>  "eyJlbmMiOiJBMTI4Q0JDLUhTMjU2IiwiYWxnIjoiZGlyIn0..gTRT28jsygMtOsbv3wJorg.THlQ5bTG5_rgy4jGipaw_OxGiAeddMtx29KGlwjFXVHWThBOyDt8pBVknNe1sNwT61P2-jf0UcGCrX91O3MB3X-UbDwLDrmqgy4OO8xAyUBbcADKwWzy5ylehrcr2rAEG75nIejikHCgn29vvCUFMv7GsoRW0Pp6XXBnbLSUqaUlUYd6Cx3lzQD5EDDDUaAS7vplLgmYy--1l8V3tGZx8BrbUIkF39qIcRVlST5-3D52FGr219vLeMS9Nu5-wPGcWk06C9K1ccSFZuFwp12_kdsOe5PxHGMzro7VcxfuTjz1g72r6EtNAxj3zemqtHePGSC0F-K47Ab0u8AUCPb4prmwsYnGSNL3_AeeiNfUI4yZxEXbVff__5ocL_8Z79w4Lmwk3olVaOSNd3Bwm9vdGlxs3FdglGliqPKusUSFx7iJWtQWiR3FwgbCsKOr49A8woVUuRtuUfzaV69vDEKUyDIXGf-7mFi4iI4RZ66IfwUOmtzkj7bfXZ8M90s_AhTjzRDEwdCNVF2y4gEAoj87amAu0ZBOUJS_feOGMWgY1w8DyD0Z1TZ37UXxpXbDIo2rxfTZ9k46IF2T52Oo8alB84HgXq9clCS5Tg5vjmx5BObPrfESh4x-Oas4mIulIuDZ4KclykaUjmt8eQDliMulXLGKgOP7XsbdyCPN3aeKPsGSXJ4_0rnZhTK3H8A9X5a_xLZu81SKBxUkboiJxW3JTNEYfGvVZEFleoBEq17Ihuo.IIF70ymcvGZaB7Y1b9hQ4w",
        'refreshTokenKey' => $refresh[0]->refresh_token,
        'RedirectURI' => "https://developer.intuit.com/v2/OAuth2Playground/RedirectUrl",
        'scope' => "com.intuit.quickbooks.accounting",
        'QBORealmID' => "193514739439574",
        'baseUrl' => "Production"
  ));
      $dataService->setLogLocation("/Users/hlu2/Desktop/newFolderForLog");
      
      $oauth2LoginHelper = new OAuth2LoginHelper("Q09W3sGjTV2ATPHeBGLJ3LAXP5CININS5yi4JuEx1zFnOrW5er","xetiEvB5XsW52SlMw0IyILykFdHjLcrTIKQDTejr");
$accessTokenObj = $oauth2LoginHelper->
                    refreshAccessTokenWithRefreshToken($refresh[0]->refresh_token);
$accessTokenValue = $accessTokenObj->getAccessToken();
$refreshTokenValue = $accessTokenObj->getRefreshToken();
 
 DB::update("update refresh_token set refresh_token='$refreshTokenValue' where pk_id = '1'");
  
$dataService = DataService::Configure(array(
        'auth_mode' => 'oauth2',
     'ClientID' => "Q09W3sGjTV2ATPHeBGLJ3LAXP5CININS5yi4JuEx1zFnOrW5er",
        'ClientSecret' => "xetiEvB5XsW52SlMw0IyILykFdHjLcrTIKQDTejr",
       'accessTokenKey' => $accessTokenValue,
       'refreshTokenKey' => $refreshTokenValue,
        'RedirectURI' => "https://developer.intuit.com/v2/OAuth2Playground/RedirectUrl",
        'scope' => "com.intuit.quickbooks.accounting",
        'QBORealmID' => "193514739439574",
        'baseUrl' => "Production"
  ));
      $dataService->setLogLocation("/Users/hlu2/Desktop/newFolderForLog");
      $OAuth2LoginHelper = $dataService->getOAuth2LoginHelper();
      $accessToken = $OAuth2LoginHelper->refreshToken();
      $error = $OAuth2LoginHelper->getLastError();
      if ($error != null) {
          echo "The Status code is: " . $error->getHttpStatusCode() . "\n";
          echo "The Helper message is: " . $error->getOAuthHelperError() . "\n";
          echo "The Response message is: " . $error->getResponseBody() . "\n";
          return;
      }
      $dataService->updateOAuth2Token($accessToken);
      $dateTime = new \DateTime('NOW');
                    
                
                           $Customer = $dataService->FindbyId('Customer', $QB_id);
   $customerObj = Customer::update($Customer , [
                        
                            "GivenName"=> uniqid() .' '.$request->input('fname'),
                            "FamilyName"=>  $request->input('lname'),
                                "Mobile"=>  $request->input('phone'),
                                    "Organization"=>  $request->input('business_name'),
                                         "CompanyName"=>  $request->input('company_name'),
                          "DisplayName"=>  $DisplayName,
                            "PrimaryEmailAddr"=>  [
                                "Address" => $request->input('email')
                            ]
                           ]);
                          $resultingCustomerObj = $dataService->Add($customerObj);
                     
                         $promo = 0;
                         
                          $error = $dataService->getLastError();
                          if ($error) {
                              echo "The Status code is: " . $error->getHttpStatusCode() . "\n";
                              echo "The Helper message is: " . $error->getOAuthHelperError() . "\n";
                              echo "The Response message is: " . $error->getResponseBody() . "\n";
                          } else {
                          
                            //  var_dump($resultingCustomerObj);
                              $business_status = $request->input('tab');
                              
                           DB::table('client_details')->where('username', $username)->update(['fname' =>$request->input('fname'),'lname' =>$request->input('lname'),'business_status' =>$business_status]);
    
                         $user = DB::select("select* from client_details where username = '$username' ");
        $user_id = $user[0]->pk_id;
        $bus_status =  $user[0]->business_status;
         //   DB::insert("insert into address_table (user_id,fname,lname,building_no,building_name,floor,street,block,phase,area, city, phone) values (?,?,?,?,?,?,?,?,?,?,?,?)",array($user_id,$request->input('fname'),$request->input('lname'),$request->input('building_no'),$request->input('building_name'),$request->input('floor'),$request->input('street'),$request->input('block'),$request->input('phase'),$request->input('area'),$request->input('city'),$request->input('phone')));
  

         if($business_status == 1)
                           {
                               
                                  if($bus_status == 0)
     {
         
                  DB::insert("insert into business_account (user_id,business_name,company_name,entity_type,job_title,NTN,STN) values (?,?,?,?,?,?,?)",array($user_id,$request->input('business_name'),$request->input('company_name'),$request->input('entity_type'),$request->input('job_title'),$request->input('NTN'),$request->input('STN')));
    DB::table('client_details')->where('pk_id', $user_id)->update(['business_status' => $business_status]);
            $request->session()->put('name',$request->input('fname').' '.$request->input('lname'));
        $request->session()->put('fname',$request->input('fname'));
        $request->session()->put('lname',$request->input('lname'));
                         
     }
     else
     {
       DB::table('business_account')->where('user_id', $user_id)->update(['business_name' =>$request->input('business_name'),'company_name' =>$request->input('company_name'),'entity_type' =>$request->input('entity_type'),'job_title' =>$request->input('job_title'),'NTN' =>$request->input('NTN'),'STN' =>$request->input('STN')]);
            $request->session()->put('name',$request->input('fname').' '.$request->input('lname'));
        $request->session()->put('fname',$request->input('fname'));
        $request->session()->put('lname',$request->input('lname'));
     }
                          }
                          else{
                               DB::table('client_details')->where('pk_id', $user_id)->update(['business_status' => $business_status]);
                          }
                          }
                           return redirect('/');
                
                               


}

public function client_login_view() {

    $oldCart = Session::get('cart');
    $cart = new Cart($oldCart);
    $products = $cart->items;
         $main_category = DB::select("select * from main_category");
    return view('client.client_login_view',compact('products','main_category'));

}

public function client_login(Request $request)
{

  $main_category = DB::select("select * from main_category");
    $this->validate($request,['username' => 'required','password'=> 'required']);
    $username =$request->input('username');
    $password = md5($request->input('password'));
    $result = DB::select("select* from client_details where username = '$username' and password='$password' ");
    $oldCart = Session::get('cart');
    $cart = new Cart($oldCart);
    $products = $cart->items;
    if(count($result)>0)
    {    
        $request->session()->put('pk_id',$result[0]->{'pk_id'});
        $request->session()->put('username',$username);
        $request->session()->put('type','client');
        $request->session()->put('name',$result[0]->{'fname'}.' '.$result[0]->{'lname'});
        $request->session()->put('fname',$result[0]->{'fname'});
        $request->session()->put('lname',$result[0]->{'lname'});

        return Redirect::to('/')->with('products');;
    }
    else {
        return view('client.client_login_view',compact('products','main_category'))->withErrors('username or password incorrect');
    }


   
}

public function men_collection_view() {
       
    return view('client.men_collection_view');

}

public function checkout_view() {

    $oldCart = Session::get('cart');
    $cart = new Cart($oldCart);
    $products = $cart->items;

  $main_category = DB::select("select * from main_category");
  
    if(!(session()->has('type') && session()->get('type')=='client'))
    {
        return redirect('/login');
    }

    if(session::has('pk_id'))
    {

     $pk_id = session()->get('pk_id');
    // return $pk_id;
        $result1 = DB::select("select* from address_table where user_id = '$pk_id'");
        if(count($result1)>0)
        {
        ;
            return view('client.client_address_view',compact('result1','products','main_category'));
        }
        else{

            return view('client.address_view',compact('products','main_category'));

        }
    }
    
    else

    return view('client.login_view',compact('products','main_category'));

}

public function address_view() {

    if(!(session()->has('type') && session()->get('type')=='client'))
    {
        return redirect('/login');
    }

  $main_category = DB::select("select * from main_category");
    return view('client.client_address_view',compact('main_category'));

}


public function shop_view(Request $request) {

    date_default_timezone_set("Asia/Karachi");
    $date = date('Y-m-d');
    $result = [];
    $d = [];
     $array = [];

   $main = '';
   $sub = '';
   $type = '';
   
     $main_category = DB::select("select * from main_category");
   
    $oldCart = Session::get('cart');
    $cart = new Cart($oldCart);
    $products = $cart->items;
    
        if($request->input('filter') == 'Low To High')
    {
  $filter =  $request->input('filter');
   $result = DB::select("SELECT * FROM product WHERE NOT EXISTS (SELECT * FROM discount_table WHERE product.sku = discount_table.sku) and  product.status = '1' order by product.price asc");
   
 $p = DB::select("SELECT distinct(detail_table.sku) FROM product,detail_table where detail_table.sku=product.sku and product.status='1' order by detail_table.pk_id desc ");
     $total = 0;
         if(count($p)>0) 
         {
            
                   foreach($p as $bests)
                   
                   {
                         if($total<3)
                    {
                           $sku = $bests->sku;
                      $best = DB::select("SELECT * FROM product where sku = '$sku' and status='1' ");
                     if(count($best)>0)
                     {
                          array_push($array, $best);
                           $total++;
                     }
       
                       
                   }
                   else {
                       break;
                   }
                   
                  
             }

             
         }
         return view('client.product_view',compact('result','result1','d','array','main','sub','type','main_category'),['products'=>$cart->items,'totalPrice'=>$cart->totalPrice]);
  
 
     
    }
    elseif($request->input('filter') == 'High To Low')
    {
        
        $filter =  $request->input('filter');
   $result = DB::select("SELECT * FROM product WHERE NOT EXISTS (SELECT * FROM discount_table WHERE product.sku = discount_table.sku) and  product.status = '1' order by product.price desc");
   
 $p = DB::select("SELECT distinct(detail_table.sku) FROM product,detail_table where detail_table.sku=product.sku and product.status='1' order by detail_table.pk_id desc ");
     $total = 0;
         if(count($p)>0) 
         {
            
                   foreach($p as $bests)
                   
                   {
                         if($total<3)
                    {
                           $sku = $bests->sku;
                      $best = DB::select("SELECT * FROM product where sku = '$sku' and status='1' ");
                     if(count($best)>0)
                     {
                          array_push($array, $best);
                           $total++;
                     }
       
                       
                   }
                   else {
                       break;
                   }
                   
                  
             }

             
         }
              
        
return view('client.product_view',compact('result','result1','d','array','main','sub','type','main_category'),['products'=>$cart->items,'totalPrice'=>$cart->totalPrice]);
    }
    else
    {
    
    $d = DB::select("select product.pk_id,product.thumbnail,product.thumbnail2,product.thumbnail3,product.name,product.size, product.product_type,product.price,product.description,product.sku, discount_table.sku,discount_table.start_date,discount_table.end_date,discount_table.percentage from product,discount_table where discount_table.sku = product.sku and (discount_table.start_date < '$date' or discount_table.start_date = '$date') and (discount_table.end_date > '$date' or discount_table.end_date = '$date') and product.status = '1'");
      
     $result1 = DB::select("select * from product,discount_table where product.sku = discount_table.sku and '$date' > discount_table.end_date and product.status = '1'");
 
   
     
    $result = DB::select("SELECT * FROM product WHERE NOT EXISTS (SELECT * FROM discount_table WHERE product.sku = discount_table.sku) and  product.status = '1'");

          
           $p = DB::select("SELECT distinct(detail_table.sku) FROM product,detail_table where detail_table.sku=product.sku and product.status='1' order by detail_table.pk_id desc ");
     $total = 0;
         if(count($p)>0) 
         {
            
                   foreach($p as $bests)
                   
                   {
                         if($total<3)
                    {
                           $sku = $bests->sku;
                      $best = DB::select("SELECT * FROM product where sku = '$sku' and status='1' ");
                     if(count($best)>0)
                     {
                          array_push($array, $best);
                           $total++;
                     }
       
                       
                   }
                   else {
                       break;
                   }
                   
                  
             }

             
         }
              
        
return view('client.product_view',compact('result','result1','d','array','main','sub','type','main_category'),['products'=>$cart->items,'totalPrice'=>$cart->totalPrice]);
  
    }
   

  //  $d = DB::select("select  product.pk_id,product.thumbnail,product.name, product.product_type,product.price,product.description,product.sku, discount_table.sku,discount_table.start_date,discount_table.end_date,discount_table.percentage from product,discount_table where product.sku = discount_table.sku and (discount_table.start_date < '$date' or discount_table.start_date = '$date') and (discount_table.end_date > '$date' or discount_table.end_date = '$date') and product.status = '1' LIMIT 10");
    
   //    $result1 = DB::select("select product.pk_id,product.thumbnail,product.name, product.product_type,product.price,product.description,product.sku, discount_table.sku,discount_table.start_date,discount_table.end_date,discount_table.percentage from product,discount_table where product.sku = discount_table.sku and '$date' > discount_table.end_date and product.status = '1'  LIMIT 10");
 
   
     
 //   $result = DB::select("SELECT * FROM product WHERE NOT EXISTS (SELECT * FROM discount_table WHERE product.sku = discount_table.sku) and  product.status = '1'  LIMIT 10");

         
              
        
//return view('client.product_view',compact('result','result1','d','products','main','sub','type','main_category'));
  
 

}

public function add_address_view() {

    $oldCart = Session::get('cart');
    $cart = new Cart($oldCart);
    $products = $cart->items;

  $main_category = DB::select("select * from main_category");
  
    if(!(session()->has('type') && session()->get('type')=='client'))
    {
        return redirect('/login');
    }

   return session()->get('id');
            $result1 = DB::select("select* from address_table where user_id = '$id'");
            return view('client.client_address_view',compact('result','result1','main_category'));

    return view('client.address_view',compact('main_category'));

}
public function add_new_address_view() {

    $oldCart = Session::get('cart');
    $cart = new Cart($oldCart);
    $products = $cart->items;
      $main_category = DB::select("select * from main_category");
      
    if(!(session()->has('type') && session()->get('type')=='client'))
    {
        return redirect('/login');
    }

    return view('client.add_address_view',compact('products','main_category'));



}

public function search_wishlist() {

    $oldCart = Session::get('cart');
    $cart = new Cart($oldCart);
    $products = $cart->items;
    
      $main_category = DB::select("select * from main_category");
    return view('client.search_wishlist_view',compact('products','main_category'));



}
public function add_new_address(Request $request) {

    $oldCart = Session::get('cart');
    $cart = new Cart($oldCart);
    $products = $cart->items;
      $main_category = DB::select("select * from main_category");

    if(!(session()->has('type') && session()->get('type')=='client'))
    {
        return redirect('/login');
    }
    $user_id = session()->get('pk_id');
  
             
   //  DB::insert("insert into address_table (user_id,fname,lname,address, city, phone, region ) values (?,?,?,?,?,?,?)",array($user_id,$request->input('fname'),$request->input('lname'),$request->input('address'),$request->input('city'),$request->input('phone'),$request->input('region')));
     DB::insert("insert into address_table (user_id,fname,lname,building_no,building_name,floor,street,block,phase,area, city, phone) values (?,?,?,?,?,?,?,?,?,?,?,?)",array($user_id,$request->input('fname'),$request->input('lname'),$request->input('building_no'),$request->input('building_name'),$request->input('floor'),$request->input('street'),$request->input('block'),$request->input('phase'),$request->input('area'),$request->input('city'),$request->input('phone')));
   
    // $result = DB::select("select* from client_details where pk_id = '$user_id'");
    $result1 = DB::select("select* from address_table where user_id = '$user_id'");
    return redirect('/cart/checkout')->with('result1','products','main_category');
   
   //  return view('client.client_address_view',compact('result1'));
  
 
 }

public function add_address(Request $request) {
   

    if(!(session()->has('type') && session()->get('type')=='client'))
    {
        return redirect('/login');
    }
    
      $main_category = DB::select("select * from main_category");
      
   $id = session()->get('pk_id');
 
            
  DB::insert("insert into address_table (user_id,fname,lname,building_no,building_name,floor,street,block,phase,area, city, phone) values (?,?,?,?,?,?,?,?,?,?,?,?)",array($id,$request->input('fname'),$request->input('lname'),$request->input('building_no'),$request->input('building_name'),$request->input('floor'),$request->input('street'),$request->input('block'),$request->input('phase'),$request->input('area'),$request->input('city'),$request->input('phone')));
   
    $result1 = DB::select("select* from address_table where user_id = '$id'");

    $oldCart = Session::get('cart');
    $cart = new Cart($oldCart);
    
    return view('client.order_view',compact('result1','main_category'),['products'=>$cart->items,'totalPrice'=>$cart->totalPrice]);


 

}



public function women_handbags_view() {


  $main_category = DB::select("select * from main_category");
    $result = DB::select("select* from product where category = 'handbags' and status = '1'");
  
    if(count($result)>0)
    {
        return view('client.women_handbags_view',compact('result','main_category'));
    }
       

}


public function about_us() {
    $oldCart = Session::get('cart');
    $cart = new Cart($oldCart);
    $products = $cart->items;
   
     $main_category = DB::select("select * from main_category");
        return view('client.about_us',compact('products','main_category'));


}

public function contact_us() {

    $oldCart = Session::get('cart');
    $cart = new Cart($oldCart);
    $products = $cart->items;
    
      $main_category = DB::select("select * from main_category");
    return view('client.contact_us',compact('products','main_category'));


}

public function warranty_and_repairs() {
    $oldCart = Session::get('cart');
    $cart = new Cart($oldCart);
    $products = $cart->items;
   
     $main_category = DB::select("select * from main_category");
    return view('client.warranty_and_repairs',compact('products','main_category'));


}

public function accounts() {

    $oldCart = Session::get('cart');
    $cart = new Cart($oldCart);
    $products = $cart->items;
      $main_category = DB::select("select * from main_category");
    return view('client.accounts',compact('products','main_category'));


}

public function faq() {

    $oldCart = Session::get('cart');
    $cart = new Cart($oldCart);
    $products = $cart->items;
    
      $main_category = DB::select("select * from main_category");
    return view('client.faq',compact('products','main_category'));


}

public function returns() {
    $oldCart = Session::get('cart');
    $cart = new Cart($oldCart);
    $products = $cart->items;
     $main_category = DB::select("select * from main_category");
    return view('client.returns_and_refunds',compact('products','main_category'));


}

public function privacy_policy() {

    $oldCart = Session::get('cart');
    $cart = new Cart($oldCart);
    $products = $cart->items;
      $main_category = DB::select("select * from main_category");
    return view('client.privacy_policy',compact('products','main_category'));


}



public function terms() {

    $oldCart = Session::get('cart');
    $cart = new Cart($oldCart);
    $products = $cart->items;
      $main_category = DB::select("select * from main_category");
    return view('client.terms_and_conditions',compact('products','main_category'));


}

public function search_wishlist_by_username(Request $request) {
    $oldCart = Session::get('cart');
    $cart = new Cart($oldCart);
    $products = $cart->items;

    $username =$request->input('username');
   
  $main_category = DB::select("select * from main_category");
    $result = DB::select("select* from wishlist,product where wishlist.user_id = '$username' and wishlist.product_id=product.pk_id and product.status='1'");

  
    if(count($result)>0)
    {
        return view('client.wishlist_product_view',compact('result','products','main_category'));
    }
    else{
        return redirect::back()->withError('no result found');
      
    }

}

public function search_wishlist_by_name(Request $request) {
    $oldCart = Session::get('cart');
    $cart = new Cart($oldCart);
    $products = $cart->items;

    $fname =$request->input('fname');
    $lname =$request->input('lname');
    $city =$request->input('city');
     $main_category = DB::select("select * from main_category");

    $result = DB::select("select* from wishlist,product,address_table where wishlist.product_id=product.pk_id and address_table.fname = '$fname' and address_table.lname = '$lname' and address_table.city = '$city' and product.status='1' ");

  
    if(count($result)>0)
    {
        return view('client.wishlist_product_view',compact('result','products','main_category'));
    }

    else{
         return Redirect::back()->withErrors('no result found');
    }
       

}

public function view_wishlist(Request $request) {

    $oldCart = Session::get('cart');
    $cart = new Cart($oldCart);
    $products = $cart->items;

    $main_category = DB::select("select * from main_category");
   $username = session()->get('username');

   $result = DB::select("select* from wishlist,product where wishlist.user_id = '$username' and wishlist.product_id=product.pk_id and product.status='1'");

  
    if(count($result)>0)
    {
        return view('client.wishlist_product_view',compact('result','products','main_category'));
    }
    else{
       return Redirect::back()->withErrors('no result found');
    }
       

}

public function product_detail_view($pk_id,$sku) {
   // return $pk_id;

  $main_category = DB::select("select * from main_category");
    $oldCart = Session::get('cart');
    $cart = new Cart($oldCart);
    $products = $cart->items;

    
    date_default_timezone_set("Asia/Karachi");
    $date = date('Y-m-d');
    $result = DB::select("select* from product where pk_id = '$pk_id'");
     
    
  //  return $result;
    $result1 = DB::select("select* from product where sku = '$sku'");
    $d = DB::select("select product.pk_id,product.thumbnail,product.name, product.product_type,product.price,product.description,product.sku, discount_table.sku,discount_table.start_date,discount_table.end_date,discount_table.percentage from product,discount_table where product.sku = discount_table.sku and product.pk_id = '$pk_id' and (discount_table.start_date < '$date' or discount_table.start_date = '$date') and (discount_table.end_date > '$date' or discount_table.end_date = '$date') and product.status = '1'");
        
    if(count($d)>0){
    
    
    $discount =($d[0]->price*$d[0]->percentage)/100;
    
    $discount_price = $d[0]->price - $discount;
    
    }
  /* $str = $result[0]->size;
    $tok = strtok($str, ",");
  

    $skillset =$tok;
   $array = array_wrap($skillset); 
   
    while ($tok !== false) {
        $tok = strtok(",");
      
       if(is_string($tok))
       $skillset= $tok;
     //  $array = array_prepend($array, $skillset);
     array_push($array, $skillset);
        
    }
    array_pop($array); */
    if(count($result)>0)
    {
        return view('client.product_detail_view',compact('result','result1','discount_price','discount','d','products','main_category'));
    }

}
public function removeCart($id,$size,$qty)
{    
    
      $main_category = DB::select("select * from main_category");
    $oldCart = Session::has('cart') ? Session::get('cart') : null;
    $cart = new Cart($oldCart);
   // return $qty;
    $cart->remove($id.$size,$qty);
    session()->put('cart',$cart);
    return redirect()->back();
}
public function addToCart(Request $request,$pk_id) {
    
    
      $main_category = DB::select("select * from main_category");
    //return session()->flush();
    date_default_timezone_set("Asia/Karachi");
    $date = date('Y-m-d');

 $s = 0;

    $q = $request->input('quantity');
   // $prices = 0;
       $pr = DB::select("select* from product where  pk_id = '$pk_id'");
       $pr_id = $pr[0]->QB_id;
       
      $pricing = DB::select("select* from pricing_detail where  product_id = '$pr_id' and quantity <= '$q'  ");
      
  //$countPrice = count($pricing);
if(count($pricing)>0)
{
              $prices = $pricing[0]->price;
}
       else
       {
           $prices = 0;
       }

    
    $result = DB::select("select* from product where pk_id = '$pk_id'");
    $oldCart = Session::has('cart') ? Session::get('cart') : null;
    $cart = new Cart($oldCart);
    $d = DB::select("select product.pk_id,product.thumbnail,product.name,product.category, product.product_type,product.price,product.description,product.sku, discount_table.sku,discount_table.start_date,discount_table.end_date,discount_table.percentage from product,discount_table where product.sku = discount_table.sku and product.pk_id = '$pk_id' and (discount_table.start_date < '$date' or discount_table.start_date = '$date') and (discount_table.end_date > '$date' or discount_table.end_date = '$date') and product.status = '1'");
        
    if(count($d)>0)
    {
        if(session::has('promoPrice'))
        {
        session()->forget('promoPrice');
        }
        $cart->discount($d[0],$d[0]->pk_id,$s,$q,$prices);
    }
        
 
    
   else
   {
    if(session::has('promoPrice'))
    {
    session()->forget('promoPrice');
    }
    
    $cart->add($result[0],$result[0]->pk_id,$s,$q,$prices);
   }
  
   // $cart->discount($result[0],$result[0]->pk_id);
    session()->put('cart',$cart);
   //dd(Session::get('cart'));
    return Redirect()->back();
    
  

}

public function addToCart1(Request $request,$pk_id) {
    //return session()->flush();
    date_default_timezone_set("Asia/Karachi");
    $date = date('Y-m-d');

  $main_category = DB::select("select * from main_category");

    $s = 0;

    $q = $request->input('quantity');
   // $prices = 0;
       $pr = DB::select("select* from product where  pk_id = '$pk_id'");
       $pr_id = $pr[0]->QB_id;
       
      $pricing = DB::select("select* from pricing_detail where  product_id = '$pr_id' and quantity <= '$q'  ");
       $prices = $pricing[0]->price;
       
  
    
    $result = DB::select("select* from product where pk_id = '$pk_id'");
    $oldCart = Session::has('cart') ? Session::get('cart') : null;
    $cart = new Cart($oldCart);
    $d = DB::select("select product.pk_id,product.thumbnail,product.name,product.category, product.product_type,product.price,product.description,product.sku, discount_table.sku,discount_table.start_date,discount_table.end_date,discount_table.percentage from product,discount_table where product.sku = discount_table.sku and product.pk_id = '$pk_id' and (discount_table.start_date < '$date' or discount_table.start_date = '$date') and (discount_table.end_date > '$date' or discount_table.end_date = '$date') and product.status = '1'");
        
    if(count($d)>0)
    {
        if(session::has('promoPrice'))
        {
        session()->forget('promoPrice');
        }
        $cart->discount($d[0],$d[0]->pk_id,$s,$q,$prices);
    }
        
 
    
   else
   {
    if(session::has('promoPrice'))
    {
    session()->forget('promoPrice');
    }
    
    $cart->add($result[0],$result[0]->pk_id,$s,$q,$prices);
   }
  
   // $cart->discount($result[0],$result[0]->pk_id);
    session()->put('cart',$cart);
   //dd(Session::get('cart'));
     //  return view('client.product_view',compact('result','d','products','result1','result2'));
    return $this->shop_view();

}
public function getCart()
{

      //return session()->flush();
    if(!Session::has('cart'))
    {
        return view('client.cart_view',['products'=> null]);
    }
 
   $main_category = DB::select("select * from main_category");
    $oldCart = Session::get('cart');
    $cart = new Cart($oldCart);
   
    return view('client.cart_view',compact('main_category'),['products'=>$cart->items,'totalPrice'=>$cart->totalPrice]);
}

public function order_view($id)

{
    
    if(!(session()->has('type') && session()->get('type')=='client'))
{
    return redirect('/login');
}

  $main_category = DB::select("select * from main_category");
    if(!Session::has('cart'))
    {
        return view('client.order_view',compact('main_category'),['products'=> null]);
    }
    
    $user_id = session()->get('pk_id');
   // $result1 = DB::select("select client_details.username,client_details.fname,client_details.lname,address_table.phone,address_table.pk_id,address_table.city,address_table.address from client_details,address_table where client_details.pk_id = '$id'and address_table.user_id = '$id'");

            
    $result = DB::select("select* from client_details where pk_id = '$user_id'");
    $result1 = DB::select("select* from address_table where user_id = '$user_id' and pk_id = '$id'");
    $oldCart = Session::get('cart');
    $cart = new Cart($oldCart);
    
    return view('client.order_view',compact('result','result1','main_category'),['products'=>$cart->items,'totalPrice'=>$cart->totalPrice]);
}

public function login(Request $request)
{
      $main_category = DB::select("select * from main_category");
    $this->validate($request,['email' => 'required','password'=> 'required']);
    $username =$request->input('email');
    $password = md5($request->input('password'));
  //  $result = DB::select("select* from client_details where username = '$username' and password='$password' ");
    $result = DB::select("select* from client_details where username = '$username'");
   
    if(count($result)>0)
           {
               
            $pass = $result[0]->password;
            if($pass == $password)

            {
                $request->session()->put('pk_id',$result[0]->{'pk_id'});
                $request->session()->put('username',$username);
                $request->session()->put('type','client');
                $request->session()->put('name',$result[0]->{'fname'}.' '.$result[0]->{'lname'});
                $request->session()->put('fname',$result[0]->{'fname'});
                $request->session()->put('lname',$result[0]->{'lname'});
            $id = $result[0]->pk_id;
            session()->put('id',$id);
            
            $result1 = DB::select("select client_details.username,client_details.fname,client_details.lname,address_table.phone,address_table.pk_id,address_table.city,address_table.address from client_details,address_table where client_details.pk_id = '$id'and address_table.user_id = '$id'");
            $result2 = DB::select("select* from address_table where user_id = '$id'");
            if(count($result2)>0)
            { 

                return view('client.client_address_view',compact('result','result1','main_category'));
            }
            else
            { 
                return view('client.address_view',compact('result','main_category'));
            }
            }
           else
           {
            return view('client.client_checkout_view',compact('main_category'))->withErrors('username or password incorrect');
             
           }
           }
           else
           {

              return redirect('/signup',compact('main_category'));
           }
          
          
 
}
public function address(Request $request)

{
    if(!(session()->has('type') && session()->get('type')=='client'))
{
    return redirect('/login');
}

  $main_category = DB::select("select * from main_category");
  
    if(session()->has('id'))
{
    $username = session()->get('username');
    
    $result = DB::select("select* from client_details where username = '$username' ");
    if(count($result)>0)
    {
        $id = $result[0]->pk_id;
        $result = DB::select("select* from address_table where user_id = '$id' ");
        if(count($result)>0)
        {
            $fname =$request->input('fname');
            $lname =$request->input('lname');
            $phone =$request->input('phone');
            $city =$request->input('city');
            $region =$request->input('region');
            $address =$request->input('address');
            DB::update("update address_table set fname = '$fname', lname='$lname',phone='$phone',city = '$city', address= '$address', region='$region' where user_id='$id'");
            return redirect('/cart/checkout/address/view/order',compact('main_category'));
        }
    else{
   DB::insert("insert into address_table (user_id,fname,lname,building_no,building_name,floor,street,block,phase,area, city, phone) values (?,?,?,?,?,?,?,?,?,?,?,?)",array($id,$request->input('fname'),$request->input('lname'),$request->input('building_no'),$request->input('building_name'),$request->input('floor'),$request->input('street'),$request->input('block'),$request->input('phase'),$request->input('area'),$request->input('city'),$request->input('phone')));
   
  return redirect('/cart/checkout/address/view/order',compact('main_category'));
    }
}
else{
    return redirect('/cart/checkout',compact('main_category'));

}

                           

   
}

}

public function confirm_order(Request $request)
{
    if(!(session()->has('type') && session()->get('type')=='client'))
    {
        return redirect('/login');
    }
    
      $main_category = DB::select("select * from main_category");
    date_default_timezone_set("Asia/Karachi");
    $date = date('Y-m-d');
    $oldCart = Session::get('cart');
    $cart = new Cart($oldCart);
    $username = session()->get('username');

     $pos = 0;


    $pk_id = session()->get('pk_id');
    $user_id = session()->get('user_id');
    
    $result3 = DB::select("select* from client_details where pk_id = '$pk_id' ");
    
$fullName = ($result3[0]->fname . ' ' . $result3[0]->lname);

    $result1 = DB::select("select* from address_table where user_id = '$pk_id' and pk_id = '$user_id' ");
    $status = 1;
    $QB_id = 0; 
    $products = $cart->items;
    if(session::has('promoPrice'))
    {
        $cart->totalPrice = session()->get('promoPrice');
        DB::insert("insert into order_table (QB_id,user_id,amount,pending_amount, shipment_address_id,fname,lname,status ) values (?,?,?,?,?,?,?,?)",array($QB_id,$result3[0]->pk_id,$cart->totalPrice,$cart->totalPrice,$result1[0]->pk_id,$result1[0]->fname,$result1[0]->lname,$status));
   
    }
      
    else {
        DB::insert("insert into order_table (QB_id,user_id,amount, pending_amount, shipment_address_id,fname,lname,status ) values (?,?,?,?,?,?,?,?)",array($QB_id,$result3[0]->pk_id,$cart->totalPrice,$cart->totalPrice,$result1[0]->pk_id,$result1[0]->fname,$result1[0]->lname,$status));
    }
    
     $result = DB::select("select* from order_table where user_id = '$pk_id' ORDER BY pk_id DESC");
    
    foreach($products as $product)
    {
        
        if($product['save']>0)
        DB::insert("insert into detail_table (product_id,order_id, sku, product_name, quantity,price,size,pos ) values (?,?,?,?,?,?,?,?)",array($product['item']->pk_id,$result[0]->pk_id,$product['item']->sku,$product['item']->name,$product['qty'],$product['price'],$product['size'],$pos));
 
  else
    DB::insert("insert into detail_table (product_id,order_id, sku, product_name, quantity,price,size,pos ) values (?,?,?,?,?,?,?,?)",array($product['item']->pk_id,$result[0]->pk_id,$product['item']->sku,$product['item']->name,$product['qty'],$product['product_price'],$product['size'],$pos));
 
 
     $id = $product['item']->pk_id;
    $resulting = DB::select("select available_quantity from product where pk_id = '$id' ");
  
    $q = $resulting[0]->available_quantity - $product['qty'];
     DB::table('product')->where('pk_id', $id)->update(['available_quantity' =>$q]);


}


    
  

//          $refresh = DB::select("select* from refresh_token where pk_id = '1'");
  
  
// $dataService = DataService::Configure(array(
//         'auth_mode' => 'oauth2',
//         'ClientID' => "Q09W3sGjTV2ATPHeBGLJ3LAXP5CININS5yi4JuEx1zFnOrW5er",
//         'ClientSecret' => "xetiEvB5XsW52SlMw0IyILykFdHjLcrTIKQDTejr",
//      //  'accessTokenKey' =>  "eyJlbmMiOiJBMTI4Q0JDLUhTMjU2IiwiYWxnIjoiZGlyIn0..gTRT28jsygMtOsbv3wJorg.THlQ5bTG5_rgy4jGipaw_OxGiAeddMtx29KGlwjFXVHWThBOyDt8pBVknNe1sNwT61P2-jf0UcGCrX91O3MB3X-UbDwLDrmqgy4OO8xAyUBbcADKwWzy5ylehrcr2rAEG75nIejikHCgn29vvCUFMv7GsoRW0Pp6XXBnbLSUqaUlUYd6Cx3lzQD5EDDDUaAS7vplLgmYy--1l8V3tGZx8BrbUIkF39qIcRVlST5-3D52FGr219vLeMS9Nu5-wPGcWk06C9K1ccSFZuFwp12_kdsOe5PxHGMzro7VcxfuTjz1g72r6EtNAxj3zemqtHePGSC0F-K47Ab0u8AUCPb4prmwsYnGSNL3_AeeiNfUI4yZxEXbVff__5ocL_8Z79w4Lmwk3olVaOSNd3Bwm9vdGlxs3FdglGliqPKusUSFx7iJWtQWiR3FwgbCsKOr49A8woVUuRtuUfzaV69vDEKUyDIXGf-7mFi4iI4RZ66IfwUOmtzkj7bfXZ8M90s_AhTjzRDEwdCNVF2y4gEAoj87amAu0ZBOUJS_feOGMWgY1w8DyD0Z1TZ37UXxpXbDIo2rxfTZ9k46IF2T52Oo8alB84HgXq9clCS5Tg5vjmx5BObPrfESh4x-Oas4mIulIuDZ4KclykaUjmt8eQDliMulXLGKgOP7XsbdyCPN3aeKPsGSXJ4_0rnZhTK3H8A9X5a_xLZu81SKBxUkboiJxW3JTNEYfGvVZEFleoBEq17Ihuo.IIF70ymcvGZaB7Y1b9hQ4w",
//         'refreshTokenKey' => $refresh[0]->refresh_token,
//         'RedirectURI' => "https://developer.intuit.com/v2/OAuth2Playground/RedirectUrl",
//         'scope' => "com.intuit.quickbooks.accounting",
//         'QBORealmID' => "193514739439574",
//         'baseUrl' => "Production"
//   ));
//       $dataService->setLogLocation("/Users/hlu2/Desktop/newFolderForLog");
      
//       $oauth2LoginHelper = new OAuth2LoginHelper("Q09W3sGjTV2ATPHeBGLJ3LAXP5CININS5yi4JuEx1zFnOrW5er","xetiEvB5XsW52SlMw0IyILykFdHjLcrTIKQDTejr");
// $accessTokenObj = $oauth2LoginHelper->
//                     refreshAccessTokenWithRefreshToken($refresh[0]->refresh_token);
// $accessTokenValue = $accessTokenObj->getAccessToken();
// $refreshTokenValue = $accessTokenObj->getRefreshToken();
 
//  DB::update("update refresh_token set refresh_token='$refreshTokenValue' where pk_id = '1'");
  
// $dataService = DataService::Configure(array(
//         'auth_mode' => 'oauth2',
//          'ClientID' => "Q09W3sGjTV2ATPHeBGLJ3LAXP5CININS5yi4JuEx1zFnOrW5er",
//         'ClientSecret' => "xetiEvB5XsW52SlMw0IyILykFdHjLcrTIKQDTejr",
//       'accessTokenKey' => $accessTokenValue,
//       'refreshTokenKey' => $refreshTokenValue,
//         'RedirectURI' => "https://developer.intuit.com/v2/OAuth2Playground/RedirectUrl",
//     'scope' => "com.intuit.quickbooks.accounting",
//         'QBORealmID' => "193514739439574",
//         'baseUrl' => "Production"
//   ));
//       $dataService->setLogLocation("/Users/hlu2/Desktop/newFolderForLog");
//       $OAuth2LoginHelper = $dataService->getOAuth2LoginHelper();
//       $accessToken = $OAuth2LoginHelper->refreshToken();
//       $error = $OAuth2LoginHelper->getLastError();
//       if ($error != null) {
//           echo "The Status code is: " . $error->getHttpStatusCode() . "\n";
//           echo "The Helper message is: " . $error->getOAuthHelperError() . "\n";
//           echo "The Response message is: " . $error->getResponseBody() . "\n";
//           return;
//       }
//       $dataService->updateOAuth2Token($accessToken);
//       $dateTime = new \DateTime('NOW');
//  $arr= array();

//     foreach($products as $product)
//     {
//          $arr1 = [ "Description" => $product['item']->description,
//           "Amount" => $product['product_price'] * $product['qty'],
//  "DetailType" => "SalesItemLineDetail","SalesItemLineDetail" =>array( "UnitPrice"=> $product['product_price'],
//             "Qty"=>$product['qty'],"ItemRef"=>array("value" => $product['item']->QB_id,
//  "name" => $product['item']->name))];
 

 
//   array_push($arr,$arr1);
//     }

//     $invoiceToCreate = Invoice::create([

  
 
//       "DocNumber" => $result[0]->pk_id,
  
//       "Line" => $arr
      
//   ,  "CustomerRef" => [
//           "value" => $result3[0]->QB_id,
//           "name" => $fullName,
//       ],
//         "BillEmail" => [
//           "Address" => $result3[0]->username
//     ],
//       "BillAddr" => [
//           "Line1" => $result1[0]->phone,
//             "Line2" => $result1[0]->address,
//               "City" => $result1[0]->city
//     ]
  
    
   
    
//     ]);

//           $resultObj = $dataService->Add($invoiceToCreate);
         
   
//     $error = $dataService->getLastError();
//     if ($error) {
//         echo "The Status code is: " . $error->getHttpStatusCode() . "\n";
//         echo "The Helper message is: " . $error->getOAuthHelperError() . "\n";
//         echo "The Response message is: " . $error->getResponseBody() . "\n";
//     }else {
        
//         $id = $resultObj->Id;
//         $order = $result[0]->pk_id;
        
//         DB::update("update order_table set QB_id ='$id' where pk_id = '$order'");
 
// }


$data = array(
    'customer_fname' => session()->get('fname'),
    'customer_lname' => session()->get('lname'),
    'customer_email'=> session()->get('username'),
    'customer_address'=> session()->get('address'),
    'customer_city'=> session()->get('city'),
    'customer_phone'=> session()->get('phone'),
    'customer_region'=> session()->get('region'),
    'order_id'=> $result[0]->{'pk_id'},
    'date'=> date('Y-m-d'),
 
    'total_price'=> $cart->totalPrice,
   
    
);
$o_id = $result[0]->{'pk_id'};
    Mail::send('email_order_confirm', $data, function ($message) use ($o_id) {

        $message->from('support@supplybridges.com','SUPPLY BRIDGES' );
        $username = session()->get('username');
        $message->to($username)->subject('Order ID# '.$o_id.' Received');

    });


session()->forget('promoPrice');
session()->forget('cart');

return view('client.thanks_view',compact('result','main_category'));
  //  return redirect('/login');
     
   // return view('client.order_view',['products'=>$cart->items,'totalPrice'=>$cart->totalPrice]);
}

public function order_payment_view($id)

{
      $main_category = DB::select("select * from main_category");
    $oldCart = Session::get('cart');
    $cart = new Cart($oldCart);
    $products = $cart->items;

    if(!(session()->has('type') && session()->get('type')=='client'))
    {
        return redirect('/login');
    }
   // return $id;
    session()->put('user_id',$id);

    $result = DB::select("select* from address_table where pk_id = '$id'");
    
    return view('client.payment_view',compact('result','products','main_category'));
}

public function add_promo_code(Request $request)

{
  $main_category = DB::select("select * from main_category");
    date_default_timezone_set("Asia/Karachi");
    $date = date('Y-m-d');
    $oldCart = Session::get('cart');
    $cart = new Cart($oldCart);
    $username = session()->get('username');

    $promo = $request->input('promo');
    $promoCode = DB::select("select* from promo_code where promo_code = '$promo' and (start_date < '$date' or start_date = '$date') and (end_date > '$date' or end_date = '$date') and min_total <= '$cart->totalPrice' and max_total >= '$cart->totalPrice' and status = '1'");
   if(count($promoCode)>0)
   {

    if($promoCode[0]->discount_type == 'fixed' && $promoCode[0]->discount_for == 'all customers' )
    {
        $user = DB::select("select* from client_details where username = '$username' and promostatus = '0'");
        if(count($user)>0){
          //  $cart->addPromo($cart->totalPrice,$promoCode[0]->discount_amount);
            $cart->totalPrice = $cart->totalPrice - $promoCode[0]->discount_amount;
            DB::update("update client_details set promostatus = '1' where username='$username'");
            session()->put('promoPrice', $cart->totalPrice);
           return redirect()->back();
        }
        else{
            return Redirect::back()->withErrors('promocode cannot be used more than one time');
        }
    }
    if($promoCode[0]->discount_type == 'fixed' && $promoCode[0]->discount_for == 'existing customers' )
    {
        $user = DB::select("select client_details.username, client_details.pk_id, order_table.user_id from client_details, order_table where client_details.username = '$username' and client_details.promostatus = '0' and client_details.pk_id = order_table.user_id");
        if(count($user)>0){
            
       
            $cart->totalPrice = $cart->totalPrice - $promoCode[0]->discount_amount;
            DB::update("update client_details set promostatus = '1' where username='$username'");
            session()->put('promoPrice', $cart->totalPrice);
            return redirect()->back();
        }
        else{
             return Redirect::back()->withErrors('promocode cannot be used more than one time');
         
        }
    }
    if($promoCode[0]->discount_type == 'fixed' && $promoCode[0]->discount_for == 'new customers' )
    {
        $user = DB::select("select client_details.username, client_details.pk_id, order_table.user_id from client_details, order_table where client_details.username = '$username' and client_details.promostatus = '0' and client_details.pk_id != order_table.user_id");
        if(count($user)>0){
            
       
            $cart->totalPrice = $cart->totalPrice - $promoCode[0]->discount_amount;
            DB::update("update client_details set promostatus = '1' where username='$username'");
            session()->put('promoPrice', $cart->totalPrice);
            return redirect()->back();
        }
        else{
            return Redirect::back()->withErrors('promocode cannot be used more than one time');
        }
    }
    if($promoCode[0]->discount_type == 'percentage' && $promoCode[0]->discount_for == 'all customers' )
    {
        $user = DB::select("select* from client_details where username = '$username' and promostatus = '0'");
        if(count($user)>0){
            $cart->totalPrice = $cart->totalPrice - (($cart->totalPrice*$promoCode[0]->discount_amount)/100);
            DB::update("update client_details set promostatus = '1' where username='$username'");
            session()->put('promoPrice', $cart->totalPrice);
            return redirect()->back();
        }
        else{
                 return Redirect::back()->withErrors('promocode cannot be used more than one time');
      
        }
    }
    if($promoCode[0]->discount_type == 'percentage' && $promoCode[0]->discount_for == 'existing customers' )
    {
        $user = DB::select("select client_details.username, client_details.pk_id, order_table.user_id from client_details, order_table where client_details.username = '$username' and client_details.promostatus = '0' and client_details.pk_id = order_table.user_id");
      
        if(count($user)>0){
            
          //  $cart->addPromo($cart->totalPrice,$promoCode[0]->discount_amount);
          // return $cart->totalPrice;
            $cart->totalPrice = $cart->totalPrice - (($cart->totalPrice*$promoCode[0]->discount_amount)/100);
            DB::update("update client_details set promostatus = '1' where username='$username'");
            session()->put('promoPrice', $cart->totalPrice);
            return redirect()->back();
        }
        else{
           return Redirect::back()->withErrors('promocode cannot be used more than one time');
        }
    }
    
    if($promoCode[0]->discount_type == 'percentage' && $promoCode[0]->discount_for == 'new customers' )
    {
        $user = DB::select("select client_details.username, client_details.pk_id, order_table.user_id from client_details, order_table where client_details.username = '$username' and client_details.promostatus = '0' and client_details.pk_id != order_table.user_id");
        if(count($user)>0){
            
            $cart->totalPrice = $cart->totalPrice - (($cart->totalPrice*$promoCode[0]->discount_amount)/100);
            DB::update("update client_details set promostatus = '1' where username='$username'");
            session()->put('promoPrice', $cart->totalPrice);
            return redirect()->back();
        }
        else{
               return Redirect::back()->withErrors('promocode cannot be used more than one time');
        }
    }
    
}
else{
  return Redirect::back()->withErrors('invalid promocode');

}


}

public function add_wishlist($id)

{
     $main_category = DB::select("select * from main_category");
    $username =session()->get('username');

    if(!(session()->has('type') && session()->get('type')=='client'))
    {
        return Redirect::back()->withErrors('Login to add to wishlist');
    }
    else{
        DB::insert("insert into wishlist (user_id,product_id) values (?,?)",array($username,$id));

    }
   
  

   
    
    return redirect()->back();
}


public function guest_checkout_view()
{
     $main_category = DB::select("select * from main_category");
    $oldCart = Session::get('cart');
    $cart = new Cart($oldCart);
    $products = $cart->items;
    return view('client.guest_checkout_view',compact('products','main_category'));
}





public function guest_checkout(Request $request)
{
    $main_category = DB::select("select * from main_category");

            $fname =$request->input('fname');
            $lname =$request->input('lname');
            $email =$request->input('email');
            $phone =$request->input('phone');
            $city =$request->input('city');
            $region =$request->input('region');
            $address =$request->input('address');
            $account =$request->input('account');
       
                
            if( !empty($request->input('password')))
            {
           
                if($request->input('password') == $request->input('confirm')  )
                {
                    
                    $result = DB::select("select* from client_details where username = '$email'");

                    if(count($result)>0)
                    {
                       return Redirect::back()->withErrors('This email is already registered');
                    }
                    else{
                        $password =$request->input('password');
                        $confirm =$request->input('confirm');
                        session()->put('password',$password);
                    session()->put('confirm',$confirm);
                    }
             
                }
                else{
                    return Redirect::back()->withErrors('Password does not match');
                }
        
            }
            session()->put('fname',$fname);
            session()->put('lname',$lname);
            session()->put('email',$email);
            session()->put('phone',$phone);
            session()->put('city',$city);
            session()->put('region',$region);
            session()->put('address',$address);
            session()->put('account',$account);
            $oldCart = Session::get('cart');
            $cart = new Cart($oldCart);
            
            return view('client.guest_order_view',compact('main_category'),['products'=>$cart->items,'totalPrice'=>$cart->totalPrice]);
 }


    public function guest_payment_view()
    {
         $main_category = DB::select("select * from main_category");
        $oldCart = Session::get('cart');
    $cart = new Cart($oldCart);
    $products = $cart->items;
        return view('client.guest_payment_view',compact('products','main_category'));
    }                  
 
    public function payment_policy()
    {
          $main_category = DB::select("select * from main_category");
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $products = $cart->items;
     
        return view('client.payment_policy',compact('products','main_category'));
    } 

public function client_logout()
{
    session()->flush();
        return redirect('/');
}




public function search(Request $request) {
    $oldCart = Session::get('cart');
    $cart = new Cart($oldCart);
    $products = $cart->items;
  $main_category = DB::select("select * from main_category");
    date_default_timezone_set("Asia/Karachi");
    $date = date('Y-m-d');
  $main_cate =  [];
   $sub_category =  [];
    $product_type =  [];
    $word = $request->input('search');
   $main = '';
   $sub = '';
   $type = '';
    if(empty($word))
    {
        
        
                $d = DB::select("select product.pk_id,product.thumbnail,product.name, product.product_type,product.price,product.description,product.sku, discount_table.sku,discount_table.start_date,discount_table.end_date,discount_table.percentage from product,discount_table where product.sku = discount_table.sku and (discount_table.start_date < '$date' or discount_table.start_date = '$date') and (discount_table.end_date > '$date' or discount_table.end_date = '$date') and product.status = '1'  LIMIT 10");
            
            
                 $result1 = DB::select("select product.pk_id,product.thumbnail,product.name, product.product_type,product.price,product.description,product.sku, discount_table.sku,discount_table.start_date,discount_table.end_date,discount_table.percentage from product,discount_table where product.sku = discount_table.sku and '$date' > discount_table.end_date and product.status = '1'  LIMIT 10");
        
         
           $result = DB::select("SELECT * FROM product WHERE NOT EXISTS (SELECT * FROM discount_table WHERE product.sku = discount_table.sku) and  product.status = '1'  LIMIT 10 ");
            
        

       
    }
    else
    {
        
                $d = DB::select("select product.pk_id,product.thumbnail,product.name, product.product_type,product.price,product.description,product.sku, discount_table.sku,discount_table.start_date,discount_table.end_date,discount_table.percentage from product,discount_table where product.sku = discount_table.sku and (discount_table.start_date < '$date' or discount_table.start_date = '$date') and (discount_table.end_date > '$date' or discount_table.end_date = '$date') and product.status = '1'  and (product.title LIKE '%$word%' )");
            
            
                 $result1 = DB::select("select product.pk_id,product.thumbnail,product.name, product.product_type,product.price,product.description,product.sku, discount_table.sku,discount_table.start_date,discount_table.end_date,discount_table.percentage from product,discount_table where product.sku = discount_table.sku and '$date' > discount_table.end_date and product.status = '1'  and (product.title LIKE '%$word%' )");
        
         
           $result = DB::select("SELECT * FROM product WHERE NOT EXISTS (SELECT * FROM discount_table WHERE product.sku = discount_table.sku) and  product.status = '1'  and (product.title LIKE '%$word%' ) ");
            
            
     
               

       // $result = DB::select("select* from product where status = '0' and ( name LIKE '%$word%' ) ");
    }
    return view('client.product_view',compact('result','d','products','result1','main','sub','type','main_category','main_cate','sub_category','product_type'));
}

  

// public function guest_confirm_order(Request $request)
// {

//     date_default_timezone_set("Asia/Karachi");
//     $date = date('Y-m-d');
//     $oldCart = Session::get('cart');
//     $cart = new Cart($oldCart);


   
//     $main_category = DB::select("select * from main_category");

//             $fname =session()->get('fname');
//             $lname =session()->get('lname');
//             $email =session()->get('email');
//             $phone =session()->get('phone');
//             $city =session()->get('city');
//             $region =session()->get('region');
//             $address =session()->get('address');
            
                  
//                   if(!empty($request->input('business_name')))
//                   {
//                       $DisplayName = $request->input('business_name');
//                   }
//                   elseif(!empty($request->input('company_name')))
//                   {
//                       $DisplayName = $request->input('company_name');
//                   }
//                   else
//                   {
//                       $DisplayName = $request->input('fname');
//                   }
                    

//             $status = 1;
//             $pos = 0;

//             $products = $cart->items;

//             if(session::has('password'))
//             {
                
//                  $refresh = DB::select("select* from refresh_token where pk_id = '1'");
  
    
// $dataService = DataService::Configure(array(
//         'auth_mode' => 'oauth2',
//         'ClientID' => "Q09W3sGjTV2ATPHeBGLJ3LAXP5CININS5yi4JuEx1zFnOrW5er",
//         'ClientSecret' => "xetiEvB5XsW52SlMw0IyILykFdHjLcrTIKQDTejr",
//      //  'accessTokenKey' =>  "eyJlbmMiOiJBMTI4Q0JDLUhTMjU2IiwiYWxnIjoiZGlyIn0..gTRT28jsygMtOsbv3wJorg.THlQ5bTG5_rgy4jGipaw_OxGiAeddMtx29KGlwjFXVHWThBOyDt8pBVknNe1sNwT61P2-jf0UcGCrX91O3MB3X-UbDwLDrmqgy4OO8xAyUBbcADKwWzy5ylehrcr2rAEG75nIejikHCgn29vvCUFMv7GsoRW0Pp6XXBnbLSUqaUlUYd6Cx3lzQD5EDDDUaAS7vplLgmYy--1l8V3tGZx8BrbUIkF39qIcRVlST5-3D52FGr219vLeMS9Nu5-wPGcWk06C9K1ccSFZuFwp12_kdsOe5PxHGMzro7VcxfuTjz1g72r6EtNAxj3zemqtHePGSC0F-K47Ab0u8AUCPb4prmwsYnGSNL3_AeeiNfUI4yZxEXbVff__5ocL_8Z79w4Lmwk3olVaOSNd3Bwm9vdGlxs3FdglGliqPKusUSFx7iJWtQWiR3FwgbCsKOr49A8woVUuRtuUfzaV69vDEKUyDIXGf-7mFi4iI4RZ66IfwUOmtzkj7bfXZ8M90s_AhTjzRDEwdCNVF2y4gEAoj87amAu0ZBOUJS_feOGMWgY1w8DyD0Z1TZ37UXxpXbDIo2rxfTZ9k46IF2T52Oo8alB84HgXq9clCS5Tg5vjmx5BObPrfESh4x-Oas4mIulIuDZ4KclykaUjmt8eQDliMulXLGKgOP7XsbdyCPN3aeKPsGSXJ4_0rnZhTK3H8A9X5a_xLZu81SKBxUkboiJxW3JTNEYfGvVZEFleoBEq17Ihuo.IIF70ymcvGZaB7Y1b9hQ4w",
//         'refreshTokenKey' => $refresh[0]->refresh_token,
//         'RedirectURI' => "https://developer.intuit.com/v2/OAuth2Playground/RedirectUrl",
//         'scope' => "com.intuit.quickbooks.accounting",
//         'QBORealmID' => "193514739439574",
//         'baseUrl' => "Production"
//   ));
//       $dataService->setLogLocation("/Users/hlu2/Desktop/newFolderForLog");
      
//       $oauth2LoginHelper = new OAuth2LoginHelper("Q09W3sGjTV2ATPHeBGLJ3LAXP5CININS5yi4JuEx1zFnOrW5er","xetiEvB5XsW52SlMw0IyILykFdHjLcrTIKQDTejr");
// $accessTokenObj = $oauth2LoginHelper->
//                     refreshAccessTokenWithRefreshToken($refresh[0]->refresh_token);
// $accessTokenValue = $accessTokenObj->getAccessToken();
// $refreshTokenValue = $accessTokenObj->getRefreshToken();
 
//  DB::update("update refresh_token set refresh_token='$refreshTokenValue' where pk_id = '1'");
  
// $dataService = DataService::Configure(array(
//         'auth_mode' => 'oauth2',
//      'ClientID' => "Q09W3sGjTV2ATPHeBGLJ3LAXP5CININS5yi4JuEx1zFnOrW5er",
//         'ClientSecret' => "xetiEvB5XsW52SlMw0IyILykFdHjLcrTIKQDTejr",
//       'accessTokenKey' => $accessTokenValue,
//       'refreshTokenKey' => $refreshTokenValue,
//         'RedirectURI' => "https://developer.intuit.com/v2/OAuth2Playground/RedirectUrl",
//         'scope' => "com.intuit.quickbooks.accounting",
//         'QBORealmID' => "193514739439574",
//         'baseUrl' => "Production"
//   ));
//       $dataService->setLogLocation("/Users/hlu2/Desktop/newFolderForLog");
//       $OAuth2LoginHelper = $dataService->getOAuth2LoginHelper();
//       $accessToken = $OAuth2LoginHelper->refreshToken();
//       $error = $OAuth2LoginHelper->getLastError();
//       if ($error != null) {
//           echo "The Status code is: " . $error->getHttpStatusCode() . "\n";
//           echo "The Helper message is: " . $error->getOAuthHelperError() . "\n";
//           echo "The Response message is: " . $error->getResponseBody() . "\n";
//           return;
//       }
//       $dataService->updateOAuth2Token($accessToken);
//       $dateTime = new \DateTime('NOW');
                    
                    
//                         $customerObj = Customer::create([
                         
                        
//                             "GivenName"=> uniqid() .' '.$request->input('fname'),
//                             "FamilyName"=>  $request->input('lname'),
//                                 "Mobile"=>  $request->input('phone'),
//                                     "Organization"=>  $request->input('business_name'),
//                                          "CompanyName"=>  $request->input('company_name'),
//                           "DisplayName"=>  $DisplayName,
//                             "PrimaryEmailAddr"=>  [
//                                 "Address" => $request->input('email')
//                             ]
//                           ]);
//                           $resultingCustomerObj = $dataService->Add($customerObj);
                     
//                          $promo = 0;
                         
//                           $error = $dataService->getLastError();
//                           if ($error) {
//                               echo "The Status code is: " . $error->getHttpStatusCode() . "\n";
//                               echo "The Helper message is: " . $error->getOAuthHelperError() . "\n";
//                               echo "The Response message is: " . $error->getResponseBody() . "\n";
//                           } else {
                          
//                 $promostatus = 0;
//                 $password =session()->get('password');
                              
//                          $business_status = $request->input('tab');
//                 DB::insert("insert into client_details (QB_id,fname,lname,username, password, promostatus,business_status) values (?,?,?,?,?,?,?)",array($status,$fname,$lname,$email,md5($password),$promostatus,$business_status));

//                 $result1 = DB::select("select* from client_details where username = '$email' ");
             
//               DB::insert("insert into address_table (user_id,fname,lname,building_no,building_name,floor,street,block,phase,area, city, phone) values (?,?,?,?,?,?,?,?,?,?,?,?)",array($result1[0]->pk_id,$request->input('fname'),$request->input('lname'),$request->input('building_no'),$request->input('building_name'),$request->input('floor'),$request->input('street'),$request->input('block'),$request->input('phase'),$request->input('area'),$request->input('city'),$request->input('phone')));
   
   
//   if($business_status == 1)
//                           {
//                                 DB::insert("insert into business_account (user_id,business_name,company_name,entity_type,job_title,NTN,STN) values (?,?,?,?,?,?,?)",array($user_id,$request->input('business_name'),$request->input('company_name'),$request->input('entity_type'),$request->input('job_title'),$request->input('NTN'),$request->input('STN')));
   
//                           }
   
   
   
//               $id = $result1[0]->pk_id;
               
//                 $result2 = DB::select("select* from address_table where user_id = '$id' ");
             
//                 DB::insert("insert into order_table (user_id,shipment_address_id,fname,lname,amount,pending_amount,status ) values (?,?,?,?,?,?,?)",array($result1[0]->pk_id,$result2[0]->pk_id,$fname,$lname,$cart->totalPrice,$cart->totalPrice,$status));
//  $result = DB::select("select* from order_table where user_id = '$id' ORDER BY pk_id DESC");
//         foreach($products as $product)
//             {
//                 if($product['save']>0)
//                 DB::insert("insert into detail_table (product_id,order_id, sku, product_name, quantity,price,size,pos ) values (?,?,?,?,?,?,?,?)",array($product['item']->pk_id,$result[0]->pk_id,$product['item']->sku,$product['item']->name,$product['qty'],$product['price'],$product['size'],$pos));
         
//           else
//             DB::insert("insert into detail_table (product_id,order_id, sku, product_name, quantity,price,size,pos ) values (?,?,?,?,?,?,?,?)",array($product['item']->pk_id,$result[0]->pk_id,$product['item']->sku,$product['item']->name,$product['qty'],$product['item']->price,$product['size'],$pos));
         
//                  $id = $product['item']->pk_id;
//     $resulting = DB::select("select available_quantity from product where pk_id = '$id' ");
//     $q = $resulting[0]->available_quantity - $product['qty'];
//      DB::table('product')->where('pk_id', $id)->update(['available_quantity' =>$q]);

    
//         }
   
   
            
                
//                           }          
                
//             }
//             else{
//                 DB::insert("insert into order_table (fname,lname,username, address, city, phone, region ,amount, pending_amount, status ) values (?,?,?,?,?,?,?,?,?,?)",array($fname,$lname,$email,$address,$city,$phone,$region,$cart->totalPrice,$cart->totalPrice,$status));
//   $result = DB::select("select* from order_table where username = '$email' ORDER BY pk_id DESC");
//         foreach($products as $product)
//             {
//                 if($product['save']>0)
                
//                 DB::insert("insert into detail_table (product_id,order_id, sku, product_name, quantity,price,size,pos ) values (?,?,?,?,?,?,?,?)",array($product['item']->pk_id,$result[0]->pk_id,$product['item']->sku,$product['item']->name,$product['qty'],$product['price'],$product['size'],$pos));
                
//           else
          
//             DB::insert("insert into detail_table (product_id,order_id, sku, product_name, quantity,price,size,pos ) values (?,?,?,?,?,?,?,?)",array($product['item']->pk_id,$result[0]->pk_id,$product['item']->sku,$product['item']->name,$product['qty'],$product['item']->price,$product['size'],$pos));
         
         
//                  $id = $product['item']->pk_id;
//     $resulting = DB::select("select available_quantity from product where pk_id = '$id' ");
//     $q = $resulting[0]->available_quantity - $product['qty'];
//      DB::table('product')->where('pk_id', $id)->update(['available_quantity' =>$q]);

    
          
            
//         }

         
 

// }


//          $refresh = DB::select("select* from refresh_token where pk_id = '1'");
  
  
// $dataService = DataService::Configure(array(
//         'auth_mode' => 'oauth2',
//          'ClientID' => "Q09W3sGjTV2ATPHeBGLJ3LAXP5CININS5yi4JuEx1zFnOrW5er",
//         'ClientSecret' => "xetiEvB5XsW52SlMw0IyILykFdHjLcrTIKQDTejr",
//      //  'accessTokenKey' =>  "eyJlbmMiOiJBMTI4Q0JDLUhTMjU2IiwiYWxnIjoiZGlyIn0..gTRT28jsygMtOsbv3wJorg.THlQ5bTG5_rgy4jGipaw_OxGiAeddMtx29KGlwjFXVHWThBOyDt8pBVknNe1sNwT61P2-jf0UcGCrX91O3MB3X-UbDwLDrmqgy4OO8xAyUBbcADKwWzy5ylehrcr2rAEG75nIejikHCgn29vvCUFMv7GsoRW0Pp6XXBnbLSUqaUlUYd6Cx3lzQD5EDDDUaAS7vplLgmYy--1l8V3tGZx8BrbUIkF39qIcRVlST5-3D52FGr219vLeMS9Nu5-wPGcWk06C9K1ccSFZuFwp12_kdsOe5PxHGMzro7VcxfuTjz1g72r6EtNAxj3zemqtHePGSC0F-K47Ab0u8AUCPb4prmwsYnGSNL3_AeeiNfUI4yZxEXbVff__5ocL_8Z79w4Lmwk3olVaOSNd3Bwm9vdGlxs3FdglGliqPKusUSFx7iJWtQWiR3FwgbCsKOr49A8woVUuRtuUfzaV69vDEKUyDIXGf-7mFi4iI4RZ66IfwUOmtzkj7bfXZ8M90s_AhTjzRDEwdCNVF2y4gEAoj87amAu0ZBOUJS_feOGMWgY1w8DyD0Z1TZ37UXxpXbDIo2rxfTZ9k46IF2T52Oo8alB84HgXq9clCS5Tg5vjmx5BObPrfESh4x-Oas4mIulIuDZ4KclykaUjmt8eQDliMulXLGKgOP7XsbdyCPN3aeKPsGSXJ4_0rnZhTK3H8A9X5a_xLZu81SKBxUkboiJxW3JTNEYfGvVZEFleoBEq17Ihuo.IIF70ymcvGZaB7Y1b9hQ4w",
//         'refreshTokenKey' => $refresh[0]->refresh_token,
//         'RedirectURI' => "https://developer.intuit.com/v2/OAuth2Playground/RedirectUrl",
//         'scope' => "com.intuit.quickbooks.accounting",
//         'QBORealmID' => "193514739439574",
//         'baseUrl' => "Production"
//   ));
//       $dataService->setLogLocation("/Users/hlu2/Desktop/newFolderForLog");
      
//       $oauth2LoginHelper = new OAuth2LoginHelper("Q09W3sGjTV2ATPHeBGLJ3LAXP5CININS5yi4JuEx1zFnOrW5er","xetiEvB5XsW52SlMw0IyILykFdHjLcrTIKQDTejr");
// $accessTokenObj = $oauth2LoginHelper->
//                     refreshAccessTokenWithRefreshToken($refresh[0]->refresh_token);
// $accessTokenValue = $accessTokenObj->getAccessToken();
// $refreshTokenValue = $accessTokenObj->getRefreshToken();

//   DB::update("update refresh_token set refresh_token='$refreshTokenValue' where pk_id = '1'");
  
// $dataService = DataService::Configure(array(
//         'auth_mode' => 'oauth2',
//     'ClientID' => "Q09W3sGjTV2ATPHeBGLJ3LAXP5CININS5yi4JuEx1zFnOrW5er",
//         'ClientSecret' => "xetiEvB5XsW52SlMw0IyILykFdHjLcrTIKQDTejr",
//       'accessTokenKey' => $accessTokenValue,
//       'refreshTokenKey' => $refreshTokenValue,
//         'RedirectURI' => "https://developer.intuit.com/v2/OAuth2Playground/RedirectUrl",
//         'scope' => "com.intuit.quickbooks.accounting",
//         'QBORealmID' => "193514739439574",
//         'baseUrl' => "Production"
//   ));
//       $dataService->setLogLocation("/Users/hlu2/Desktop/newFolderForLog");
//       $OAuth2LoginHelper = $dataService->getOAuth2LoginHelper();
//       $accessToken = $OAuth2LoginHelper->refreshToken();
//       $error = $OAuth2LoginHelper->getLastError();
//       if ($error != null) {
//           echo "The Status code is: " . $error->getHttpStatusCode() . "\n";
//           echo "The Helper message is: " . $error->getOAuthHelperError() . "\n";
//           echo "The Response message is: " . $error->getResponseBody() . "\n";
//           return;
//       }
//       $dataService->updateOAuth2Token($accessToken);
//       $dateTime = new \DateTime('NOW');
                    
                    
//                         $customerObj = Customer::create([
                         
                        
//                             "GivenName"=>  uniqid() .' '. $fname,
//                             "FamilyName"=>  $lname,
                       
//                             "PrimaryEmailAddr"=>  [
//                                 "Address" => $email
//                             ]
//                           ]);
//                           $resultingCustomerObj = $dataService->Add($customerObj);
                     
//                          $promo = 0;
                         
//                           $error = $dataService->getLastError();
//                           if ($error) {
//                               echo "The Status code is: " . $error->getHttpStatusCode() . "\n";
//                               echo "The Helper message is: " . $error->getOAuthHelperError() . "\n";
//                               echo "The Response message is: " . $error->getResponseBody() . "\n";
//                           } else {
                           
//           $customer_id = $resultingCustomerObj->Id;
           
//               $entities = $dataService->Query("SELECT * FROM Customer where Id = '$customer_id'");
           
//           $fullName = ($entities[0]->GivenName . ' ' . $entities[0]->FamilyName);           
//                       $arr= array();

//     foreach($products as $product)
//     {
//          $arr1 = [ "Description" => $product['item']->description,
//           "Amount" => $product['product_price'] * $product['qty'],
//  "DetailType" => "SalesItemLineDetail","SalesItemLineDetail" =>array( "UnitPrice"=> $product['product_price'],
//             "Qty"=>$product['qty'],"ItemRef"=>array("value" => $product['item']->QB_id,
//  "name" => $product['item']->name))];
 

 
//   array_push($arr,$arr1);
//     }

//     $invoiceToCreate = Invoice::create([

  
 
//       "DocNumber" => $result[0]->pk_id,
  
//       "Line" => $arr
      
//   ,  "CustomerRef" => [
//           "value" => $resultingCustomerObj->Id,
//           "name" => $fullName,
//       ],
//         "BillEmail" => [
//           "Address" => $email
//     ],
//       "BillAddr" => [
//           "Line1" => $phone,
//             "Line2" => $address,
//               "City" => $city
//     ]
  
    
   
    
//     ]);

//           $resultObj = $dataService->Add($invoiceToCreate);
         
   
//     $error = $dataService->getLastError();
//     if ($error) {
//         echo "The Status code is: " . $error->getHttpStatusCode() . "\n";
//         echo "The Helper message is: " . $error->getOAuthHelperError() . "\n";
//         echo "The Response message is: " . $error->getResponseBody() . "\n";
//     }else {
        
//         $id = $resultObj->Id;
//         $order = $result[0]->pk_id;
        
//         DB::update("update order_table set QB_id ='$id' where pk_id = '$order'");
 
// }
                      
                      
//                           }
                          
                          
                 
//              $data = array(
//     'customer_fname' => session()->get('fname'),
//     'customer_lname' => session()->get('lname'),
//     'customer_email'=> session()->get('username'),
//     'customer_address'=> session()->get('address'),
//     'customer_city'=> session()->get('city'),
//     'customer_phone'=> session()->get('phone'),
//     'customer_region'=> session()->get('region'),
     
//     'order_id'=> $result[0]->{'pk_id'},
//     'date'=> date('Y-m-d'),
 
//     'total_price'=> $cart->totalPrice,
    
    
   
    
// );
// $o_id = $result[0]->{'pk_id'};
//     Mail::send('email_order_confirm', $data, function ($message) use ($o_id) {

//         $message->from('support@supplybridges.com','SUPPLY BRIDGES' );
//         $id = session()->get('email');
//         $message->to($id)->subject('Order ID# '.$o_id.' Received');

//     });                
                          
                        
                
             


//       session()->flush();
// return view('client.thanks_view',compact('result','main_category'));
//     }
}
