<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Http\Request;



Route::get('/call', function () {
    $clearcache = Artisan::call('composer update');
    echo "cleared<br>";
});


Route::get('/test',function()
{
    
      $max = DB::select("select * from main_category,sub_category where main_category.main_category != sub_category.category");
      return $max;
    
       $max = DB::select("select MAX(price) from pricing_detail where product_id = '1211'");
 //   $max =  implode(" ",$max);
       return $max;
 if(count($result)>0)
   
    foreach($result as $results)
    {
        $id = $results->pk_id;
        $description = $results->description;
        DB::update( DB::raw("update product set title ='$description'  WHERE pk_id = :value "), array(
   'value' => $id,
 ));
           
    }
    return "true";
    return view('welcome');
});

Route::get('/admin/home/get/product','adminController@get_product');

Route::post('/test','adminController@test');

Route::get('/token','quickbooks@token');
Route::get('/refresh','quickbooks@refresh');

Route::get('/supplier/test','quickbooks@view_supplier');

Route::get('/create_invoice','quickbooks@create_invoice');
Route::get('/create_item','quickbooks@create_item');
Route::get('/update_item','quickbooks@update_item');


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/ajax-create-po','adminController@load_po');

Route::get('/ajax-subcat','adminController@sub');

Route::get('/ajax-product-type','adminController@type');


Route::get('/admin','adminController@admin_login_view');
Route::post('/admin/home','adminController@index');

Route::get('/admin/home/view/admin','adminController@admin_list_view');
Route::get('/admin/home/view/admin/{id}','adminController@admin_specific_view');
Route::get('/admin/home/view/admin/edit/admin/{id}','adminController@edit_admin_view');
Route::post('/admin/home/view/admin/edit/admin/{id}','adminController@edit_admin');
Route::post('admin/home/create/admin','adminController@create_admin');
Route::get('/admin/home/create/admin','adminController@create_admin_view');



Route::get('/admin/home/view/warehouse/alerts','adminController@warehouse_alerts_list_view');

Route::post('admin/home/create/pos','adminController@create_pos');
//Route::get('/admin/home/view/pos','adminController@pos_list_view');

Route::get('/admin/home/create/rider','adminController@create_rider_view');
Route::post('/admin/home/create/rider','adminController@create_rider');
Route::get('/admin/home/view/riders','adminController@rider_list_view');

Route::get('/admin/home/view/pos/alerts','adminController@pos_alerts_list_view');
Route::post('admin/home/create/pos/alerts','adminController@create_pos_alerts');
Route::post('admin/home/delete/pos/alerts/{order_id}/{name}','adminController@delete_pos_alerts');
Route::get('admin/home/create/purchase/order','adminController@create_purchase_order_view');
Route::post('admin/home/create/purchase/order','adminController@create_purchase_order');
Route::get('/admin/home/view/accountant/waiting/alerts','adminController@accountant_waiting_alerts_list_view');

Route::post('admin/home/create/pos/alerts/random','adminController@create_pos_alerts_random');

Route::get('/admin/home/view/accountant/alerts','adminController@accountant_alerts_list_view');
Route::get('/admin/home/view/decline/accountant/alerts','adminController@decline_accountant_alerts_list_view');
Route::post('/admin/home/create/accountant/pos','adminController@accountant_approved_alerts');
Route::get('/admin/home/view/approved/accountant/alerts','adminController@approved_accountant_alerts_list_view');
Route::get('/admin/home/view/approved/warehouse/alerts','adminController@approved_warehouse_alerts_list_view');
Route::post('/admin/home/create/warehouse/approvals','adminController@warehouse_approvals');

Route::get('/admin/home/view/accountant/payment/received','adminController@accountant_payment_received_view');
Route::post('/admin/home/view/accountant/payment/received','adminController@payment_received_by_rider');
Route::get('/admin/home/view/accountant/payment/received/view','adminController@payment_received_view');

Route::get('/admin/home/view/approved/orders/alerts','adminController@approved_orders_alerts_list_view');
Route::get('/admin/home/view/approved/orders/stocks','adminController@orders_stocks_list_view');

Route::get('/admin/home','adminController@admin_home');
Route::get('/admin/home/add/brand','adminController@add_brand_view');
Route::post('/admin/home/add/brand','adminController@add_brand');

Route::get('/admin/home/view/brand','adminController@brand_list_view');
Route::get('/admin/home/edit/brand/{sku}','adminController@edit_brand_view');
Route::post('/admin/home/edit/brand/{sku}','adminController@edit_brand');
Route::get('/admin/home/delete/brand/{sku}','adminController@delete_brand');

Route::get('/admin/home/add/main/category','adminController@add_main_category_view');
Route::post('/admin/home/add/main/category','adminController@add_main_category');

Route::get('/admin/home/add/sub/category','adminController@add_sub_category_view');
Route::post('/admin/home/add/sub/category','adminController@add_sub_category');

Route::get('/admin/home/view/main/category','adminController@main_category_list_view');
Route::get('/admin/home/view/sub/category','adminController@sub_category_list_view');

Route::get('/admin/home/edit/main/category/{sku}','adminController@edit_main_category_view');
Route::post('/admin/home/edit/main/category/{sku}','adminController@edit_main_category');
Route::get('/admin/home/delete/main/category/{id}','adminController@delete_main_category');

Route::get('/admin/home/edit/sub/category/{sku}','adminController@edit_sub_category_view');
Route::post('/admin/home/edit/sub/category/{sku}','adminController@edit_sub_category');
Route::get('/admin/home/delete/sub/category/{id}','adminController@delete_sub_category');

Route::get('/admin/home/add/product','adminController@add_product_view');
Route::post('/admin/home/add/product','adminController@add_product');

Route::get('/admin/home/edit/product/{id}','adminController@edit_product_view');
Route::post('/admin/home/edit/product/{id}','adminController@edit_product');
Route::get('/admin/home/delete/product/{id}','adminController@delete_product');
Route::get('/admin/home/view/product/{id}','adminController@product_detail_view');

Route::get('/admin/home/add/product/type','adminController@add_product_type_view');
Route::post('/admin/home/add/product/type','adminController@add_product_type');

Route::get('/admin/home/view/products/type','adminController@product_type_list_view');
Route::get('/admin/home/edit/product/type/{pk_id}','adminController@edit_product_type_view');
Route::post('/admin/home/edit/product/type/{pk_id}','adminController@edit_product_type');
Route::get('/admin/home/delete/product/type/{id}','adminController@delete_product_type');

Route::get('/admin/home/view/product','adminController@product_list_view');

Route::get('/admin/home/view/product/status/update/{pk_id}/{status}','adminController@updateProductStatus');
Route::get('/admin/home/view/promo/status/update/{pk_id}/{status}','adminController@updatePromoStatus');

Route::get('/admin/home/view/active/orders','adminController@active_order_view');
Route::get('/admin/home/view/active/order/view/specific/order/{id}','adminController@active_order_detail_view');
Route::post('/admin/home/order/update/status','adminController@update_order_status');
Route::post('/admin/home/assign/rider/{id}','adminController@assign_rider');
Route::post('/admin/home/deliver/order/{id}','adminController@deliver_order');

Route::get('/admin/home/view/complete/orders','adminController@complete_order_list_view');
Route::get('/admin/home/view/complete/order/view/specific/order/{id}','adminController@complete_order_detail_view');

Route::get('/admin/home/view/partialy/complete/orders','adminController@partialy_complete_order_list_view');
Route::get('/admin/home/view/partialy/complete/order/view/specific/order/{id}','adminController@partialy_complete_order_detail_view');

Route::get('/admin/client/view/detail/{id}','adminController@client_profile_view');
Route::get('/admin/client/view/list','adminController@client_profile_view_list');


Route::get('/admin/home/view/cancel/orders','adminController@cancel_order_list_view');
Route::get('/admin/home/view/cancel/order/view/specific/order/{id}','adminController@cancel_order_detail_view');


Route::get('/admin/home/view/return/orders','adminController@return_order_list_view');
Route::get('/admin/home/view/return/order/view/specific/order/{id}','adminController@return_order_detail_view');

Route::get('/admin/home/view/reporting/by/products','adminController@reporting_by_product_list_view');
Route::get('/admin/home/view/detail/reporting/by/products/{id}','adminController@reporting_by_product');

Route::get('/admin/home/view/reporting/by/customer','adminController@customer_reporting_list_view');
Route::get('/admin/home/view/detail/reporting/by/customer/{id}','adminController@customer_reporting');
//Route::get('/admin/home/view/detail/reporting/by/specific/customer/{id}','adminController@customer_specific_reporting');


Route::get('/admin/home/view/reporting/by/sale','adminController@reporting_by_sale_list_view');
Route::get('/admin/home/view/detail/reporting/by/sale/{id}','adminController@reporting_by_sale');

Route::get('/admin/home/add/discount','adminController@add_discount_view');
Route::post('/admin/home/add/discount','adminController@add_discount');
Route::get('/admin/home/view/discount','adminController@view_discount');

Route::get('/admin/home/edit/discount/{id}','adminController@edit_discount_view');
Route::post('/admin/home/edit/discount/{id}','adminController@edit_discount');
Route::get('/admin/home/delete/discount/{id}','adminController@delete_discount');

Route::get('/admin/home/add/promo','adminController@add_promo_view');
Route::post('/admin/home/add/promo','adminController@add_promo');
Route::get('/admin/home/view/promo','adminController@view_promo_list');

Route::get('/admin/home/edit/promo/{id}','adminController@edit_promo_view');
Route::post('/admin/home/edit/promo/{id}','adminController@edit_promo');
Route::get('/admin/home/delete/promo/{id}','adminController@delete_promo_code');

Route::get('/admin/view/order/payments','adminController@order_payments_list_view');
Route::post('/admin/view/order/payment','adminController@create_payment');


Route::get('product/{main?}/{sub?}/{type?}','clientController@searchByCategory');

Route::get('/','clientController@home_view');
Route::get('/shop','clientController@shop_view');

Route::get('/signup','clientController@create_client_view');
Route::post('/signup','clientController@create_client');

Route::get('/edit_profile','clientController@edit_profile_view');
Route::post('/edit/profile/{id}','clientController@edit_profile');

Route::post('/search','clientController@search');

Route::get('/search/wishlist','clientController@search_wishlist');
Route::post('/search/wishlist/by/name','clientController@search_wishlist_by_name');
Route::post('/search/wishlist/by/username','clientController@search_wishlist_by_username');
Route::get('/view/wishlist','clientController@view_wishlist');


Route::post('/product/add/wishlist/{id}','clientController@add_wishlist');


Route::get('/login','clientController@client_login_view');
Route::post('/login','clientController@client_login');

Route::get('/logout','clientController@client_logout');
Route::get('order/tracking/view','clientController@order_tracking_view');
Route::get('/order/tracking/detail/{id}','clientController@order_tracking_detail_view');
Route::get('guest/order/tracking/view','clientController@guest_order_tracking_view');

Route::post('order/tracking','clientController@order_tracking');
Route::post('guest/order/tracking','clientController@guest_order_tracking');



Route::get('/aboutus','clientController@about_us');
Route::get('/accounts','clientController@accounts');
Route::get('/faq','clientController@faq');
Route::get('/returns/and/refunds','clientController@returns');
Route::get('/privacy/policy','clientController@privacy_policy');

Route::get('/warranty/and/repairs','clientController@warranty_and_repairs');
Route::get('/contact/us','clientController@contact_us');

Route::get('/terms/and/conditions','clientController@terms');

Route::get('/payment/policy','clientController@payment_policy');

Route::get('/men/collection','clientController@men_collection_view');

Route::get('/handbags','clientController@women_handbags_view');

Route::get('/products/details/{pk_id}/{sku}','clientController@product_detail_view');

Route::post('/product/add/cart/{pk_id}','clientController@addToCart');
Route::post('/product/add/to/cart/{pk_id}','clientController@addToCart1');

Route::get('/cart','clientController@getCart');

Route::get('/cart/guest/checkout','clientController@guest_checkout_view');
Route::post('/cart/guest/checkout','clientController@guest_checkout');



Route::get('/cart/checkout','clientController@checkout_view');
Route::post('/cart/checkout','clientController@login');

Route::get('/cart/checkout/address','clientController@address_view');
Route::post('/cart/checkout/address','clientController@address');

Route::get('/cart/checkout/add/address','clientController@add_address_view');
Route::post('/cart/checkout/add/address','clientController@add_address');

Route::get('/cart/checkout/add/new/address','clientController@add_new_address_view');
Route::post('/cart/checkout/add/new/address','clientController@add_new_address');

Route::get('/cart/checkout/address/view/order/{id}','clientController@order_view');
Route::get('/cart/checkout/address/view/order/complete/order/{id}','clientController@order_payment_view');
Route::post('/cart/checkout/address/view/order/complete/order','clientController@confirm_order');

Route::get('/cart/guest/checkout/address/view/order/complete/order','clientController@guest_payment_view');
Route::post('/cart/guest/checkout/address/view/order/complete/order','clientController@guest_confirm_order');

Route::post('/cart/checkout/address/view/order/complete/order/add/promo','clientController@add_promo_code');

Route::get('remove/item/cart/{id}/{size}/{qty}','clientController@removeCart');


Route::get('/rider','riderController@rider_login_view');
Route::post('/rider/login','riderController@index');
Route::get('/rider/home','riderController@rider_home');

Route::get('/rider/home/cash','riderController@rider_cash');
Route::post('/rider/home/cash/received','riderController@cash_received');
Route::get('/rider/home/view/cash','riderController@rider_cash_list_view');

Route::get('/rider/home/view/active/order/view/specific/order/{id}','riderController@active_order_detail_view');
Route::get('/rider/home/view/active/orders','riderController@active_order_view');
Route::post('/rider/home/order/update/status','riderController@update_order_status');

Route::get('/rider/home/view/complete/orders','riderController@complete_order_list_view');
Route::get('/rider/home/view/complete/order/view/specific/order/{id}','riderController@complete_order_detail_view');


Route::get('/rider/home/view/cancel/orders','riderController@cancel_order_list_view');
Route::get('/rider/home/view/cancel/order/view/specific/order/{id}','riderController@cancel_order_detail_view');


Route::get('/rider/home/view/return/orders','riderController@return_order_list_view');
Route::get('/rider/home/view/return/order/view/specific/order/{id}','riderController@return_order_detail_view');


Route::get('/testapi','clientController@testapi');
Route::get('/flush',function()
{

    session()->forget('cart');
});



Route::post('/testhook','quickbooks@testhook');


Route::get('/verify/{username}/{verfication_code}','clientController@verify_code');
Route::get('/password/reset','clientController@reset_password_view');

Route::post('/password/reset','clientController@reset_password');


Route::post('/password/change/{username}','clientController@password_change');





Route::get('/sendmail',function(Request $request)
{
Log::info("asd");

$id = 244;

$status = 4;

    if($request->input('status') == 4)
       {
        $result = DB::select("select* from detail_table where order_id = '$id' ");
        foreach($result as $results)
        {
            $sku = $results->sku;
            $result1 = DB::select("select available_quantity from product where sku = '$sku' ");
           $q = $result1[0]->available_quantity - $results->quantity;
            DB::table('product')->where('sku', $sku)->update(['available_quantity' =>$q]);
     
        }
             
       }




 $result = DB::select("select* from order_table where pk_id = '$id'");

          $email = $result[0]->{'user_id'};
       
         if($email == null)
         {
             $username = $result[0]->{'username'};
                  $fname = $result[0]->{'fname'};
                $lname = $result[0]->{'lname'};
         }
         else
         {
          
              $result1 = DB::select("select* from client_details where pk_id = '$email'");
              $username = $result1[0]->{'username'};
               $fname = $result1[0]->{'fname'};
                $lname = $result1[0]->{'lname'};
         }
         
         
             $data = array(
    'customer_fname' => $fname,
    'customer_lname' => $lname,
    'customer_email'=> $username,
    'status'=> $status,
 
    'order_id'=> $id,
    'date'=> date('Y-m-d'),
    
);

    Mail::send('email_status_update', $data, function ($message) use ($id,$username) {

        $message->from('support@supplybridges.com','SUPPLY BRIDGES' );
      
        $message->to($username)->subject('Order ID# '.$id.'Status Updated');

    });


return "asd";
});