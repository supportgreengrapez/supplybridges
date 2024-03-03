<?php

namespace App\Http\Controllers;


use QuickBooksOnline\API\Core\ServiceContext;
use QuickBooksOnline\API\DataService\DataService;
use QuickBooksOnline\API\PlatformService\PlatformService;
use QuickBooksOnline\API\Core\Http\Serialization\XmlObjectSerializer;
use QuickBooksOnline\API\Facades\Invoice;
use Mail;
use Response;
use QuickBooksOnline\API\Facades\Vendor;
use QuickBooksOnline\API\Core\OAuth\OAuth2\OAuth2LoginHelper;
use QuickBooksOnline\API\Facades\Customer;


use QuickBooksOnline\API\Facades\Item;


use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;

class adminController extends Controller
{
    
            public function load_po(Request $request)
    {
        $value = $request->Input('po_id');
      
  
    $sku = DB::select( DB::raw("SELECT * FROM product WHERE name = :value"), array(
   'value' => $value,
 ));
  return $sku;
        
        return Response::json($sku);
            
            

    }
    
        public function sub(Request $request)
    {
        $value = $request->Input('cat_id');
      
  
    $subcategories = DB::select( DB::raw("SELECT * FROM sub_category WHERE category = :value"), array(
   'value' => $value,
 ));
  return $subcategories;
        
        return Response::json($subcategories);
            
            

    }
    
    
     public function type(Request $request)
    {
        $type_id = $request->Input('type_id');
    
       
         $sub_id = DB::select("select* from sub_category where SKU = '$type_id' ");
          $cat =  $sub_id[0]->category;
         $sub_cat =  $sub_id[0]->sub_category;
  
       $product_type = DB::select( DB::raw("SELECT * FROM product_type WHERE main_category = :value1 and sub_category = :value"), array(
   'value' => $sub_cat,
    'value1' => $cat,
 ));
 
      //  $sub_id = DB::select("select* from product_type where sub_category = '$sub_id' and username='admin' ");
   return $product_type;
      
   return Response::json($product_type);
            
      

    }
    
      public function test(Request $request)
{
    
    
    
    return "true";
    $requestBody = $request->all();

     //get file
     $upload=$request->file('file');
     $filePath=$upload->getRealPath();
     //open and read
     $file=fopen($filePath, 'r');
     $header= fgetcsv($file);
     // dd($header);
     $escapedHeader=[];
     //validate
     foreach ($header as $key => $value) {
         $lheader=strtolower($value);
         $escapedItem=preg_replace('/[^a-z]/', '', $lheader);
         array_push($escapedHeader, $escapedItem);

     }
     //looping through othe columns
     while($columns=fgetcsv($file))
     {
         if($columns[0]=="")
         {
             continue;
         }
         //trim data
     /*    foreach ($columns as $key => &$value) {
            $value = strtok($value, ",");
          //   $value=preg_replace('/\D/','',$value);
          //   return $value;
         }*/
        $data= array_combine($escapedHeader, $columns);

        // setting type
    /*    foreach ($data as $key => &$value) {
         $value=($key=="SKU")?(integer)$value: (float)$value;
        }*/
        // Table update

       $SKU=$data['sku'];

        $Name=$data['name'];
$Price=$data['price'];
 
        $Description=$data['description'];

   
   
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
      $Item = Item::create([
        "Name" => $Name,
        "Sku" => $SKU,
            "Description" => $Description,
            "Active" => true,
            "FullyQualifiedName" => " ",
            "Taxable" => true,
            "UnitPrice" => $Price,
            "Type" => "Inventory",
            "IncomeAccountRef"=> [
                "value"=> 79,
                "name" => "Landscaping Services:Job Materials:Fountains and Garden Lighting"
              ],
        
            "ExpenseAccountRef"=> [
              "value"=> 80,
              "name"=> "Cost of Goods Sold"
            ],
            "AssetAccountRef"=> [
                "value"=> 81,
                "name"=> "Inventory Asset"
              ],
            "TrackQtyOnHand" => true,
            "QtyOnHand"=> 10,
            "ReorderPoint" => 5,
            "InvStartDate"=> $dateTime
      ]);
      $resultingObj = $dataService->Add($Item);
      $error = $dataService->getLastError();
      if ($error) {
          echo "The Status code is: " . $error->getHttpStatusCode() . "\n";
          echo "The Helper message is: " . $error->getOAuthHelperError() . "\n";
          echo "The Response message is: " . $error->getResponseBody() . "\n";
      }
      else {
     
        
         DB::insert("insert into product (QB_id,sku,name,price,description) values (?,?,?,?,?)",array($resultingObj->Id,$SKU,$Name,$Price,$Description));
     
   

      }
      
 
    }
    
    
    return "added successfully";

}


  public function get_product(Request $request)
   {

    if(!(session()->has('type') && session()->get('type')=='admin'))
    {
        return redirect('/admin');
    }
 
         $product = DB::select("select* from product");
            

        return Response::json($product);
            
          
          
          
   }

   public function update_order_status(Request $request)
   {

    if(!(session()->has('type') && session()->get('type')=='admin'))
    {
        return redirect('/admin');
    }
    $id = $request->input('id');
      DB::table('order_table')->where('pk_id', $request->input('id'))->update(['status' =>$request->input('status')]);
     
     
        
            
        return URL('/')."/admin/home/view/active/orders";
   }

   public function deliver_order($id,Request $request)
   {

    if(!(session()->has('type') && session()->get('type')=='admin'))
    {
        return redirect('/admin');
    }
    
    
    
      $chk = $request->input('checkbox');
     
          $product_id = $request->input('product_id');
          $deliver_quantity = $request->input('quantity');
         // return $deliver_quantity;
        
             $available_quantity = $request->input('available_quantity');
         DB::table('order_table')->where('pk_id', $id)->update(['rider' =>$request->input('rider')]);

     
            foreach($chk as $chks)
            {
                
               // return $deliver_quantity[$chks];
            //    $deliver_quantities = $deliver_quantity[$chks];
             //   return $deliver_quantities;
                
                  DB::update("update detail_table set deliver_quantity ='$deliver_quantity[$chks]' where order_id='$id' and product_id = '$product_id[$chks]'");
           
               //   DB::table('detail_table')->where(['order_id',$id],['product_id',$product_id[$chks]])->update(['deliver_quantity' => $deliver_quantity[$chks]]);
                 //   DB::table('detail_table')->where('order_id', $id)->update(['deliver_quantity' =>$deliver_quantity[$chks]]);
$QOH = $available_quantity[$chks] - $deliver_quantity[$chks];
                
              DB::table('product')->where('pk_id', $product_id[$chks])->update(['available_quantity' =>$QOH]);

                
            }

   
      return redirect('/admin/home/view/active/orders');
   }
   
    public function assign_rider($id,Request $request)
   {

    if(!(session()->has('type') && session()->get('type')=='admin'))
    {
        return redirect('/admin');
    }
  //  $id = $request->input('rider');
      DB::table('order_table')->where('pk_id', $id)->update(['rider' =>$request->input('rider')]);

      return redirect('/admin/home/view/active/orders');
   }

   public function create_pos_alerts(Request $request) {

    if(!(session()->has('type') && session()->get('type')=='admin'))
    {
        return redirect('/admin');
    }
    $order_id = $request->input('order_id');
  
    $name = $request->input('name');
 
    $size = 0;
  
  
    $qp = $request->input('quantity');
 
    
    $pp = $request->input('purchase_price');
     $supplier = $request->input('supplier');
      $terms = $request->input('terms');
    
    $pos = 0;

  DB::insert("insert into accountant_orders (sku,order_id,purchase_quantity,purchase_price ,pos,supplier,terms) values (?,?,?,?,?,?,?)",array($name,$order_id,$qp,$pp,$pos,$supplier,$terms));
                

 $users = DB::table('detail_table')->where([['product_name',$name],['order_id',$order_id],['pos',$pos]])->update(['approved_quantity' => $qp]);

  $users = DB::table('detail_table')->where([['product_name',$name],['order_id',$order_id],['pos',$pos]])->update(['pos' => '1']);

 // $users = DB::table('detail_table')->where([['product_name',$name],['pk_id',$pk_id]])->update(['approved_quantity' => '$qp']);

    return redirect()->back();
  
            
         }
         
         
         
            public function create_pos_alerts_random(Request $request) {

    if(!(session()->has('type') && session()->get('type')=='admin'))
    {
        return redirect('/admin');
    }
    

  //  $order_id = $request->input('order_id');
  
    $name = $request->input('name');
 
    $size = 0;
  
  
    $qp = $request->input('purchase_quantity');
 
    
    $pp = $request->input('rate');
     $supplier = $request->input('supplier');
      $terms = $request->input('terms');
    
    $pos = 0;

  DB::insert("insert into accountant_orders (sku,purchase_quantity,purchase_price ,pos,supplier,terms) values (?,?,?,?,?,?)",array($name,$qp,$pp,$pos,$supplier,$terms));
                

 //$users = DB::table('detail_table')->where([['product_name',$name],['order_id',$order_id],['pos',$pos]])->update(['approved_quantity' => $qp]);

  $users = DB::table('detail_table')->where([['product_name',$name],['pos',$pos]])->update(['pos' => '1']);

 // $users = DB::table('detail_table')->where([['product_name',$name],['pk_id',$pk_id]])->update(['approved_quantity' => '$qp']);

    return redirect()->back();
  
            
         }
         
            public function delete_pos_alerts(Request $request,$order_id,$name) {

    if(!(session()->has('type') && session()->get('type')=='admin'))
    {
        return redirect('/admin');
    }


$pos = 1;
  $users = DB::table('detail_table')->where([['product_name',$name],['order_id',$order_id],['pos',$pos]])->update(['pos' => '2']);

    return redirect()->back();
  
            
         }


         public function create_pos(Request $request) {

            if(!(session()->has('type') && session()->get('type')=='admin'))
            {
                return redirect('/admin');
            }
            $sku = $request->input('sku');
            $name = $request->input('name');
           $size = 0;
            $price = $request->input('price');
            $oq = $request->input('order_quantity');
            $aq = $request->input('available_quantity');
            $q = $request->input('quantity');
          
    $pp = $request->input('purchase_price');
          
        $chk = $request->input('checkbox');
        $pos = 0;
        
            foreach($chk as $chks)
            {
        
            
                DB::insert("insert into purchase_orders (sku,product_name, size, price,order_quantity,available_quantity,quantity,purchase_price,pos) values (?,?,?,?,?,?,?,?,?)",array($sku[$chks],$name[$chks],$size[$chks],$price[$chks],$oq[$chks],$aq[$chks],$q[$chks],$pp[$chks],$pos));
                        
            }
        
            foreach($chk as $chks)
            {
        
            $users = DB::table('detail_table')->where([['sku',$sku[$chks]],['pos',$pos]])->update(['pos' => '1']);
           
                             
            }
        
        
            return redirect()->back();
          
                    
                 }



         public function create_purchase_order(Request $request) {

            if(!(session()->has('type') && session()->get('type')=='admin'))
            {
                return redirect('/admin');
            }
            $sku = $request->input('sku');
            $wordCount = count($sku);
           
$pos = 0;
            $name = $request->input('name');
            $size = $request->input('size');
            $price = $request->input('price');
            $q = $request->input('quantity');
            $oq = 0;$aq=0;
        $i = 0;
            for($i = 0;  $i < $wordCount ; $i++)
            {
        
                DB::insert("insert into purchase_orders (sku,product_name, size, price,order_quantity,available_quantity,quantity,pos ) values (?,?,?,?,?,?,?,?)",array($sku[$i],$name[$i],$size[$i],$price[$i],$oq,$aq,$q[$i],$pos));
               
            }
        
           
        
            return redirect()->back();
          
                    
                 }
                 
                   public function warehouse_approvals(Request $request) {

                    if(!(session()->has('type') && session()->get('type')=='admin'))
                    {
                        return redirect('/admin');
                    }
            
              
                       $order_id = $request->input('order_id');
                  
                       
                    $sku = $request->input('name');
                       $pk_id = $request->input('pk_id');
                    
                 
                   $quantity_received = $request->input('quantity_receved');
                
           
            
                  
                $chk = $request->input('checkbox');
           
                
                    foreach($chk as $chks)
                    {
                        
                      
                       DB::update("update approved_warehouse_orders set quantity_received = '$quantity_received[$chks]' where  pk_id = '$pk_id[$chks]'  ");
                       
                 $product = DB::select("select* from product where name = '$sku[$chks]' ");
               
                 if(count($product)>0)
                 {
                     foreach($product as $products)
                     {
                         if($products->available_quantity > 0)
                         
                         {
                             $available_quantity = $products->available_quantity + $quantity_received[$chks];
                             
                                $QB_id = $products->QB_id;
                            
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
 
   $dataService->setLogLocation("/Users/hlu2/Desktop/newFolderForLog");
   $dataService->throwExceptionOnError(true);
  
   $item = $dataService->FindbyId('item', $QB_id);

   $theResourceObj = Item::update($item , [
   
         

         "TrackQtyOnHand" => true,
         "QtyOnHand"=> $available_quantity,
         "InvStartDate"=> $dateTime
]);

   $resultingObj = $dataService->Add($theResourceObj);
   $error = $dataService->getLastError();
   if ($error) {
       echo "The Status code is: " . $error->getHttpStatusCode() . "\n";
       echo "The Helper message is: " . $error->getOAuthHelperError() . "\n";
       echo "The Response message is: " . $error->getResponseBody() . "\n";
   }
   else {
     DB::update("update product set available_quantity = '$available_quantity' where name = '$sku[$chks]' ");
                             
   }
                              
                              
                
                         }
                         
                         else
                         {
                             
                                                           $refresh = DB::select("select* from refresh_token where pk_id = '1'");
  
    $QB_id = $products->QB_id;
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
 
   $dataService->setLogLocation("/Users/hlu2/Desktop/newFolderForLog");
   $dataService->throwExceptionOnError(true);
   $result = DB::select("select* from product where pk_id = '$pk_id'");
   $QB_id = $result[0]->QB_id;
   $item = $dataService->FindbyId('item', $QB_id);

   $theResourceObj = Item::update($item , [
   
         

         "TrackQtyOnHand" => true,
         "QtyOnHand"=> $quantity_received[$chks],
         "InvStartDate"=> $dateTime
]);

   $resultingObj = $dataService->Add($theResourceObj);
   $error = $dataService->getLastError();
   if ($error) {
       echo "The Status code is: " . $error->getHttpStatusCode() . "\n";
       echo "The Helper message is: " . $error->getOAuthHelperError() . "\n";
       echo "The Response message is: " . $error->getResponseBody() . "\n";
   }
   else {
        DB::update("update product set available_quantity = '$quantity_received[$chks]' where name = '$sku[$chks]' ");
                             
   }
                        
                
                         }
                         
                     }
                     
                 }
                   
              
                                     
                    }
                  
           
                    
     
                    
                
                
                    return redirect()->back();
                  
                            
                         }

 

                 public function accountant_approved_alerts(Request $request) {

                    if(!(session()->has('type') && session()->get('type')=='admin'))
                    {
                        return redirect('/admin');
                    }
            
                    
                  $reason = $request->input('reason');
                     
                  if(empty($reason))
                  {
                       $order_id = $request->input('order_id');
                        $supplier = $request->input('supplier');
                         $terms = $request->input('terms');
                       
                    $sku = $request->input('product_name');
                 
                   $purchase_q = $request->input('purchase_q');
                
           
                    $oq = $request->input('approved_quantity');
               
                    $pp = $request->input('price');
                 //   return $pp;
                   $pk_id = $request->input('pk_id');
                $chk = $request->input('checkbox');
           
                $pos = 0;
                
                    foreach($chk as $chks)
                    {
                
                    
                        DB::insert("insert into approved_warehouse_orders (sku,order_id,order_quantity,price,approved_quantity,supplier,terms ) values (?,?,?,?,?,?,?)",array($sku[$chks],$order_id[$chks],$purchase_q[$chks],$pp[$chks],$oq[$chks],$supplier[$chks],$terms[$chks]));
              
                        
                    }
                
                    foreach($chk as $chks)
                    {
                        
                         
    
                        
                       DB::update("update accountant_orders set pos = '1' where pos = '$pos' and sku = '$sku[$chks]' and pk_id = '$pk_id[$chks]'  ");
                
                 //   $users = DB::table('accountant_orders')->where([['sku',$sku[$chks]],['pos',$pos],['size',$size]])->update(['pos' => '1']);
            
                                     
                    }
                  }
                  else {
                      
                       $order_id = $request->input('order_id');
                       
                    $sku = $request->input('product_name');
                 
                   $purchase_q = $request->input('purchase_q');
                
           
                    $oq = $request->input('approved_quantity');
               
                    $pp = $request->input('price');
                 //   return $pp;
                  
                $chk = $request->input('checkbox');
           
                $pos = 1;
                

                
                    foreach($chk as $chks)
                    {
                        
                         
    
                          DB::update("update detail_table set reason = '$reason' where pos = '$pos' and product_name = '$sku[$chks]' and order_id = '$order_id[$chks]' ");
                 
                       DB::update("update detail_table set pos = '3' where pos = '$pos' and product_name = '$sku[$chks]' and order_id = '$order_id[$chks]' ");
                       
                            DB::update("update accountant_orders set reason = '$reason' where pos = '0' and sku = '$sku[$chks]' and order_id = '$order_id[$chks]' ");
                
                        DB::update("update accountant_orders set pos = '2' where pos = '0' and sku = '$sku[$chks]' and order_id = '$order_id[$chks]' ");
                
              
                                     
                    }
                  }
                     
             
                
                    return redirect()->back();
                  
                            
                         }

 


         public  function pos_list_view() {
            if(!(session()->has('type') && session()->get('type')=='admin'))
            {
                return redirect('/admin');
            }
           
                $result = DB::select("select* from purchase_orders");
             
                return view('admin.pos_list_view',compact('result'));
        
           
        
        }

   public  function admin_list_view() {
    if(!(session()->has('type') && session()->get('type')=='admin'))
    {
        return redirect('/admin');
    }
    if(session()->has('username'))
    {
        $result = DB::select("select* from admin_details");
     
        return view('admin.view_admin_list',compact('result'));

     
    }
    else
    {
        return redirect('/admin');
    }
   

}

public function admin_specific_view($id)
{
    if(!(session()->has('type') && session()->get('type')=='admin'))
    {
        return redirect('/admin');
    }
    $result = DB::select("select* from admin_details where pk_id = '$id'");
    return view('admin.view_admin_profile',compact('result'));
}


public function rider_list_view()
{
    if(!(session()->has('type') && session()->get('type')=='admin'))
    {
        return redirect('/admin');
    }
    $result = DB::select("select* from rider_details");
    return view('admin.rider_list_view',compact('result'));
}

public function edit_admin_view($id) {
    if(!(session()->has('type') && session()->get('type')=='admin'))
    {
        return redirect('/admin');
    }
    if(session()->has('username'))
    {
        $result = DB::select("select*  from admin_details where pk_id = '$id'");
        return view('admin.edit_admin_profile',compact('result'));
    }
    else
    {
        return redirect('/admin');
    }

    
}

   
public function create_admin_view() {
    if(!(session()->has('type') && session()->get('type')=='admin'))
    {
        return redirect('/admin');
    }
    if(session()->has('username'))
    {
        return view('admin.create_admin');
    }
    else
    {
        return redirect('/admin');
    }

    
}

public function edit_admin($id, Request $request) {
    if(!(session()->has('type') && session()->get('type')=='admin'))
    {
        return redirect('/admin');
    }
    if(session()->has('username'))
    {
        $admin_management = 0;
        $enquiry_management = 0;
        $livechat_management = 0;
        if($request->input('admin_management'))
        {
            $admin_management = 1;
        }
        if($request->input('enquiry_management'))
        {
            $enquiry_management = 1;
        }
        if($request->input('livechat_management'))
        {
            $livechat_management = 1;
        }
        if($admin_management == 0 && $enquiry_management==0 && $livechat_management==0)
        {
            return "atleast you neeed to select one permission";
        }
}
if (is_null($request->input('password')) && is_null($request->input('confirm'))){
DB::table('admin_details')->where('pk_id', $id)->update(['fname' =>$request->input('fname'),'lname' =>$request->input('lname'),'admin_management' =>$admin_management,'enquiry_management' =>$enquiry_management,'livechat_management' =>$livechat_management]);
          
return redirect('/admin/home/view/admin');
}
    elseif ($request->input('password') == $request->input('confirm'))
    {
                   
        DB::table('admin_details')->where('pk_id', $id)->update(['fname' =>$request->input('fname'),'lname' =>$request->input('lname'),'password' =>md5($request->input('password')),'admin_management' =>$admin_management,'enquiry_management' =>$enquiry_management,'livechat_management' =>$livechat_management]);
          
        return redirect('/admin/home/view/admin');
             }
else{
    return Redirect::back()->withErrors('Password does not match');
   }


}


public function create_admin(Request $request)
{
    if(!(session()->has('type') && session()->get('type')=='admin'))
    {
        return redirect('/admin');
    }

    $admin_management = 0;
    $enquiry_management = 0;
    $livechat_management = 0;
    if($request->input('admin_management'))
    {
        $admin_management = 1;
    }
    if($request->input('enquiry_management'))
    {
        $enquiry_management = 1;
    }
    if($request->input('livechat_management'))
    {
        $livechat_management = 1;
    }

    if($admin_management == 0 && $enquiry_management==0 && $livechat_management==0)
    {
        return "atleast you neeed to select one permission";
    }

    if ($request->input('password') == $request->input('confirm'))
    {
        $username =$request->input('email');

        $result = DB::select("select* from admin_details where username = '$username' ");

           if(count($result)>0)
           {
               
            return Redirect::back()->withErrors('Username already Exist');
           }
           else
           {
                  
                       DB::insert("insert into admin_details (fname,lname, username, password, admin_management,enquiry_management, livechat_management ) values (?,?,?,?,?,?,?)",array($request->input('fname'),$request->input('lname'),$request->input('email'),md5($request->input('password')),$admin_management,$enquiry_management,$livechat_management));

                        return redirect('/admin/home/view/admin');
             }
                           

   
}
else{
    return Redirect::back()->withErrors('Password does not match');
   }


}
public function logout()
{
    session()->flush();
    return redirect('/admin');
}


    public  function admin_login_view() {
      
      
        
            return view('admin.login');
        
      
    }

    public  function create_rider_view() {
      
      
        
        return view('admin.create_rider_view');
    
  
}

public function create_rider(Request $request)
    {
    
        if ($request->input('password') == $request->input('confirm'))
        {
            $username =$request->input('email');
    
            $result = DB::select("select* from rider_details where username = '$username' ");
  
               if(count($result)>0)
               {
                return Redirect::back()->withErrors('Username already Exist');
               }
               else
               {
                      
                           DB::insert("insert into rider_details (fname,lname, username, password, phone, address) values (?,?,?,?,?,?)",array($request->input('fname'),$request->input('lname'),$request->input('email'),md5($request->input('password')),$request->input('phone'),$request->input('address')));

                           return redirect('/admin/home/view/riders');
                }
                               
    
       
    }
    else{
       return Redirect::back()->withErrors('Password does not match');
       }


}
    public function index(Request $request)
    {
       
        $this->validate($request,['username' => 'required','password'=> 'required']);
        $password= md5($request->input('password'));
         $username= $request->input('username');
         $result = DB::select("select* from admin_details where username = '$username' and password='$password'");
        if(count($result)>0){
            $request->session()->put('username',$username);
            $request->session()->put('type','admin');
            $result = DB::select("select * from order_table where status = '0' or status = '1' ");
         $result1 = DB::select("select* from client_details");
   $c = count($result1);
   $result2 = DB::select("select* from order_table ");
     $o = count($result2);
     $result3 = DB::select("select* from order_table where status = '4' ");
       $com = count($result3);
       $result4 = DB::select("select* from product ");
         $p = count($result4);

            return view('admin.home',compact('result','c','o','com','p'));
        }
        else
        {
            return Redirect::back()->withErrors('Username or Password is incorrect');
        }
    }
    public function delete_product($id) {

    if(!(session()->has('type') && session()->get('type')=='admin'))
    {
        return redirect('/admin');
    }
        
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
$result = DB::select("select* from product where pk_id = '$id'");
$QB_id = $result[0]->QB_id;
$item = $dataService->FindbyId('item', $QB_id);

$theResourceObj = Item::update($item , [
    "Active" => false
]);

$resultingObj = $dataService->Add($theResourceObj);
$error = $dataService->getLastError();
if ($error) {
    echo "The Status code is: " . $error->getHttpStatusCode() . "\n";
    echo "The Helper message is: " . $error->getOAuthHelperError() . "\n";
    echo "The Response message is: " . $error->getResponseBody() . "\n";
}
else {
    
    
      DB::delete("delete from pricing_detail where product_id = '$QB_id'");
    
  
    DB::delete("delete from product where pk_id = '$id'");
 
  
}

   
    
  
    return redirect()->back(); 
   }
   
   public function delete_brand($id) {

    if(!(session()->has('type') && session()->get('type')=='admin'))
    {
        return redirect('/admin');
    }

    DB::delete("delete from brand where SKU = '$id'");
    
  
    return redirect()->back(); 
   }
   
   public function product_detail_view($pk_id) {
    if(!(session()->has('type') && session()->get('type')=='admin'))
    {
        return redirect('/admin');
    }
    $result = DB::select("select* from product where pk_id='$pk_id'");
 
    return view('admin.view_product',compact('result'));

}
   
   public function delete_main_category($id) {

    if(!(session()->has('type') && session()->get('type')=='admin'))
    {
        return redirect('/admin');
    }

    DB::delete("delete from main_category where SKU = '$id'");
    
  
    return redirect()->back(); 
   }
   
   public function delete_sub_category($id) {

    if(!(session()->has('type') && session()->get('type')=='admin'))
    {
        return redirect('/admin');
    }

    DB::delete("delete from sub_category  where SKU = '$id'");
    
  
    return redirect()->back(); 
   }
   
     public function delete_product_type($id) {

    if(!(session()->has('type') && session()->get('type')=='admin'))
    {
        return redirect('/admin');
    }

    DB::delete("delete from product_type  where pk_id = '$id'");
    
     $result = DB::select("select* from product_type");
     
        return view('admin.product_type_list_view',compact('result'));
  
   }
   
       public function delete_promo_code($id) {

    if(!(session()->has('type') && session()->get('type')=='admin'))
    {
        return redirect('/admin');
    }

    DB::delete("delete from promo_code  where pk_id = '$id'");
    
  
    return redirect()->back(); 
   }
   
       public function delete_discount($id) {

    if(!(session()->has('type') && session()->get('type')=='admin'))
    {
        return redirect('/admin');
    }

    DB::delete("delete from discount_table  where pk_id = '$id'");
    
  
    return redirect()->back(); 
   }
    public function admin_home() {
        if(!(session()->has('type') && session()->get('type')=='admin'))
        {
            return redirect('/admin');
        }

        $result = DB::select("select* from order_table where status = '0' or status = '1' ");

          $result1 = DB::select("select* from client_details");
   $c = count($result1);
   $result2 = DB::select("select* from order_table ");
     $o = count($result2);
     $result3 = DB::select("select* from order_table where status = '4' ");
       $com = count($result3);
       $result4 = DB::select("select* from product ");
         $p = count($result4);

            return view('admin.home',compact('result','c','o','com','p'));
       
    }

    public function reporting_by_product_list_view() {
        if(!(session()->has('type') && session()->get('type')=='admin'))
        {
            return redirect('/admin');
        }

        $result = DB::select("select* from product");


        return view('admin.product_reporting_view',compact('result'));
       
    }

    public function reporting_by_product($sku) {

        if(!(session()->has('type') && session()->get('type')=='admin'))
        {
            return redirect('/admin');
        }
        $total = 0 ;
        $result = DB::select("select* from detail_table where product_id = '$sku'");
      
        if(count($result)>0)
        {
        foreach($result as $totals)
        {
     $total = $total + ($totals->quantity * $totals->price );
        }
        }
        return view('admin.product_reporting_detail_view',compact('result','total'));
    }


    public function customer_reporting_list_view() {

        if(!(session()->has('type') && session()->get('type')=='admin'))
        {
            return redirect('/admin');
        }
        $result = DB::select("select* from client_details");
     

        return view('admin.customer_reporting_list_view',compact('result'));
       
    }

    public function customer_reporting($id) {

        if(!(session()->has('type') && session()->get('type')=='admin'))
        {
            return redirect('/admin');
        }

       $sum = 0;
        $result = DB::select("select * from order_table, client_details where order_table.user_id = '$id' and client_details.pk_id= '$id' and status = '4'");
        if(count($result)>0)
        foreach($result as $results)
        {
$sum = $sum + $results->amount;
        }
        return view('admin.customer_reporting_detail_view',compact('result','sum'));
  
    }

    public function customer_specific_reporting($id) {

        if(!(session()->has('type') && session()->get('type')=='admin'))
        {
            return redirect('/admin');
        }
        $result = DB::select("select* from detail_table where order_id = '$id'");
        return view('admin.customer_specific_reporting',compact('result'));
  
    }

    public function add_discount_list_view() {
        if(!(session()->has('type') && session()->get('type')=='admin'))
        {
            return redirect('/admin');
        }
       
        $result = DB::select("select* from products");
        return view('admin.add_discount_list_view',compact('result'));
  
    }


    public function add_brand_view() {

        if(!(session()->has('type') && session()->get('type')=='admin'))
        {
            return redirect('/admin');
        }
      
        return view('admin.add_brand_view'); 
          
       }

       public function add_brand(Request $request) {

        if(!(session()->has('type') && session()->get('type')=='admin'))
        {
            return redirect('/admin');
        }
                
                         $cat = $request->input('brandname');
        $result = DB::select("select* from brand where brand_name = '$cat' ");
        if(count($result)>0)
        {
             return Redirect::back()->withErrors('Brand already Exist');
            
        }
        else
        
  {

  $thumbnail = "";
        if ($request->hasFile('file')) {
            $image = $request->file('file');
            $uniqueFileName = uniqid() . $image->getClientOriginalName() . '.' . $image->getClientOriginalExtension();
            $input['imagename'] = time().'.'.strtolower($image->getClientOriginalExtension());
            $destinationPath =public_path('/storage/images');
            $image->storeAs('public/images',$uniqueFileName);
            $thumbnail=$uniqueFileName;
        }

        DB::insert("insert into brand (brand_name,thumbnail) values (?,?)",array($request->input('brandname'),$thumbnail));
        return redirect('/admin/home/view/brand');     
       }
       }

       public function add_discount(Request $request) {

        if(!(session()->has('type') && session()->get('type')=='admin'))
        {
            return redirect('/admin');
        }
               $sku = $request->input('sku');
              DB::insert("insert into discount_table (sku,start_date,end_date,percentage) values (?,?,?,?)",array($sku,$request->input('start_date'),$request->input('end_date'),$request->input('percentage')));
              return redirect('/admin/home/view/discount');     
             }

             public function view_discount() {

                if(!(session()->has('type') && session()->get('type')=='admin'))
                {
                    return redirect('/admin');
                }

                $result = DB::select("select* from discount_table");
             
                return view('admin.view_discount',compact('result'));
      
}

          
public function add_discount_view() {

    if(!(session()->has('type') && session()->get('type')=='admin'))
    {
        return redirect('/admin');
    }
    $result = DB::select("select* from product");
    return view('admin.add_discount_view',compact('result'));

}

          
public function add_promo_view() {

  
    if(!(session()->has('type') && session()->get('type')=='admin'))
    {
        return redirect('/admin');
    }
    return view('admin.add_promo_code');

}

       public function brand_list_view() {

        if(!(session()->has('type') && session()->get('type')=='admin'))
        {
            return redirect('/admin');
        }

                $result = DB::select("select* from brand");
             
                return view('admin.view_brand_list',compact('result'));
      
}

public function edit_brand_view($sku) {

    if(!(session()->has('type') && session()->get('type')=='admin'))
    {
        return redirect('/admin');
    }

    $result = DB::select("select* from brand where SKU = '$sku'");
 
    return view('admin.edit_brand',compact('result'));

}

public function edit_discount_view($pk_id) {

    if(!(session()->has('type') && session()->get('type')=='admin'))
    {
        return redirect('/admin');
    }

    $result = DB::select("select* from discount_table where pk_id = '$pk_id'");
 
    return view('admin.edit_discount_view',compact('result'));

}

public function edit_promo_view($pk_id) {
    
    if(!(session()->has('type') && session()->get('type')=='admin'))
    {
        return redirect('/admin');
    }
    $result = DB::select("select* from promo_code where pk_id = '$pk_id'");
 
    return view('admin.edit_promo_view',compact('result'));

}

public function edit_discount(Request $request, $pk_id) {
 
    if(!(session()->has('type') && session()->get('type')=='admin'))
    {
        return redirect('/admin');
    }

    DB::table('discount_table')->where('pk_id', $pk_id)->update(['sku' =>$request->input('sku'),'start_date' => $request->input('start_date'),'end_date' => $request->input('end_date'),'percentage' => $request->input('percentage')]);
    return redirect('/admin/home/view/discount');

}
public function edit_promo(Request $request, $pk_id) {
    if(!(session()->has('type') && session()->get('type')=='admin'))
    {
        return redirect('/admin');
    }

    $status = 0;
    if($request->input('status'))
    {
        $status = 1;
    }

    if($request->input('radio') == '1')
    {
        $discount_type = 'fixed';
    }
    if($request->input('radio') == '2')
    {
        $discount_type = 'percentage';
    }



    if($request->input('optradio') == '3')
    {
        $discount_for = 'all customers';
    }
    if($request->input('optradio') == '4')
    {
        $discount_for = 'existing customers';
    }
    if($request->input('optradio') == '5')
    {
        $discount_for = 'new customers';
    }
    DB::table('promo_code')->where('pk_id', $pk_id)->update(['promo_code' =>$request->input('promo'),'discount_type' => $discount_type,'start_date' => $request->input('start_date'),'end_date' => $request->input('end_date'),'min_total' => $request->input('min'),'max_total' => $request->input('max'),'discount_for' => $discount_for,'discount_amount' => $request->input('discount'),'status' => $status]);
    return redirect('/admin/home/view/promo');

}

public function edit_brand(Request $request, $sku) {

    if(!(session()->has('type') && session()->get('type')=='admin'))
    {
        return redirect('/admin');
    }
            
                         $cat = $request->input('brandname');
        $result = DB::select("select* from brand where brand_name = '$cat' ");
        if(count($result)>0)
        {
             return Redirect::back()->withErrors('Brand already Exist');
            
        }
        else
        
  {

    $thumbnail = "";
    if ($request->hasFile('file')) {
        $image = $request->file('file');
        $uniqueFileName = uniqid() . $image->getClientOriginalName() . '.' . $image->getClientOriginalExtension();
        $input['imagename'] = time().'.'.strtolower($image->getClientOriginalExtension());
        $destinationPath =public_path('/storage/images');
       $image->storeAs('public/images',$uniqueFileName);
        $thumbnail=$uniqueFileName;
    }

    $brand_name =$request->input('brandname');

    DB::table('brand')->where('SKU', $sku)->update(['brand_name' =>$brand_name,'thumbnail' => $thumbnail]);
    return redirect('/admin/home/view/brand');

}
}
public function add_main_category_view() {

    if(!(session()->has('type') && session()->get('type')=='admin'))
    {
        return redirect('/admin');
    }
      
    return view('admin.add_main_category_view'); 
      
   }

   public function add_main_category(Request $request) {

    if(!(session()->has('type') && session()->get('type')=='admin'))
    {
        return redirect('/admin');
    }
        $cat = $request->input('mainCategory');
        $result = DB::select("select* from main_category where main_category = '$cat' ");
        if(count($result)>0)
        {
             return Redirect::back()->withErrors('Category already Exist');
            
        }
        else
        
  {
  
          DB::insert("insert into main_category (main_category) values (?)",array($request->input('mainCategory')));
          return redirect('/admin/home/view/main/category');   
         }
   }

         public function add_promo(Request $request) {

            if(!(session()->has('type') && session()->get('type')=='admin'))
            {
                return redirect('/admin');
            }
            $status = 1;
            if($request->input('status'))
            {
                $status = 0;
            }

            if($request->input('radio') == '1')
            {
                $discount_type = 'fixed';
            }
            if($request->input('radio') == '2')
            {
                $discount_type = 'percentage';
            }
      


            if($request->input('optradio') == '3')
            {
                $discount_for = 'all customers';
            }
            if($request->input('optradio') == '4')
            {
                $discount_for = 'existing customers';
            }
            if($request->input('optradio') == '5')
            {
                $discount_for = 'new customers';
            }
           

            
            
            DB::insert("insert into promo_code (promo_code,discount_type,discount_amount,start_date,end_date,min_total,max_total,discount_for,status) values (?,?,?,?,?,?,?,?,?)",array($request->input('promo'),$discount_type,$request->input('discount'),$request->input('start_date'),$request->input('end_date'),$request->input('min'),$request->input('max'),$discount_for,$status));
            DB::update("update client_details set promostatus = '0'");
            return redirect('/admin/home/view/promo');   
           }

         public function add_sub_category_view() {

            if(!(session()->has('type') && session()->get('type')=='admin'))
            {
                return redirect('/admin');
            }

            $result = DB::select("select* from main_category");
            return view('admin.add_sub_category_view',compact('result'));        
           }
        
           public function add_sub_category(Request $request) {

            if(!(session()->has('type') && session()->get('type')=='admin'))
            {
                return redirect('/admin');
            }
                      $category = $request->input('mainCategory');
           
               $cat = $request->input('subCategory');
        $result = DB::select("select* from sub_category where sub_category = '$cat' ");
        if(count($result)>0)
        {
             return Redirect::back()->withErrors('Subcategory already Exist');
            
        }
        else
        
  {
      

           $category = $request->input('mainCategory');
          
                  DB::insert("insert into sub_category (category,sub_category) values (?,?)",array($category,$request->input('subCategory')));
                  return redirect('/admin/home/view/sub/category'); 
                 }
           }

                 public function main_category_list_view() {

                    if(!(session()->has('type') && session()->get('type')=='admin'))
                    {
                        return redirect('/admin');
                    }

                    $result = DB::select("select* from main_category");
                 
                    return view('admin.view_main_category_list',compact('result'));
          
    }
    public function sub_category_list_view() {

        if(!(session()->has('type') && session()->get('type')=='admin'))
        {
            return redirect('/admin');
        }

        $result = DB::select("select* from sub_category");
     
        return view('admin.view_sub_category_list',compact('result'));

}

public function view_promo_list() {
    if(!(session()->has('type') && session()->get('type')=='admin'))
    {
        return redirect('/admin');
    }
    $result = DB::select("select* from promo_code");
 
    return view('admin.view_promo_list',compact('result'));

}

public function edit_main_category_view($sku) {

    if(!(session()->has('type') && session()->get('type')=='admin'))
    {
        return redirect('/admin');
    }

    $result = DB::select("select* from main_category where SKU = '$sku'");
 
    return view('admin.edit_main_category',compact('result'));

}

public function edit_main_category(Request $request, $sku) {

    if(!(session()->has('type') && session()->get('type')=='admin'))
    {
        return redirect('/admin');
    }
        $cat = $request->input('mainCategory');
        $result = DB::select("select* from main_category where main_category = '$cat' ");
        
        if(count($result)>0)
        {
             return Redirect::back()->withErrors('Category already Exist');
            
        }
        else
        
  {

    $main_category =$request->input('mainCategory');
     $result1 = DB::select("select* from main_category where SKU = '$sku' ");
       if(count($result1)>0)
        {
           $main =  $result1[0]->main_category;
      DB::table('main_category')->where('SKU', $sku)->update(['main_category' =>$main_category]);
       DB::table('sub_category')->where('category', $main)->update(['category' =>$main_category]);
               DB::table('product_type')->where('main_category', $main)->update(['main_category' =>$main_category]);
                DB::table('product')->where('category', $main)->update(['category' =>$main_category]);
        }

   // DB::table('main_category')->where('SKU', $sku)->update(['main_category' =>$main_category]);
    return redirect('/admin/home/view/main/category');

}
}

public function edit_sub_category_view($sku) {

    if(!(session()->has('type') && session()->get('type')=='admin'))
    {
        return redirect('/admin');
    }

    $result = DB::select("select* from main_category");

    $result1 = DB::select("select* from sub_category where SKU = '$sku'");
 
    return view('admin.edit_sub_category',compact('result','result1'));

}

public function edit_sub_category(Request $request, $sku) {

    if(!(session()->has('type') && session()->get('type')=='admin'))
    {
        return redirect('/admin');
    }
            
           
               $cat = $request->input('subCategory');
        $result = DB::select("select* from sub_category where sub_category = '$cat' ");
        if(count($result)>0)
        {
             return Redirect::back()->withErrors('Subcategory already Exist');
            
        }
        else
        
  {
      

    $main_category =$request->input('mainCategory');
    $sub_category =$request->input('subCategory');

   $result1 = DB::select("select* from sub_category where SKU = '$sku' ");
       if(count($result1)>0)
        {
           $main =  $result1[0]->category;
           $sub =  $result1[0]->sub_category;
       DB::table('sub_category')->where('SKU', $sku)->update(['category' =>$main_category,'sub_category' =>$sub_category]);
       DB::update("update product_type set main_category='$main_category', sub_category='$sub_category' where main_category = '$main' and sub_category='$sub'");
        DB::update("update product set category='$main_category', sub_category='$sub_category' where category = '$main' and sub_category='$sub'");
        }
        
   // DB::table('sub_category')->where('SKU', $sku)->update(['category' =>$main_category,'sub_category' =>$sub_category]);
    return redirect('/admin/home/view/sub/category');

}
}

public function add_product_view() {

    if(!(session()->has('type') && session()->get('type')=='admin'))
    {
        return redirect('/admin');
    }

    $result = DB::select("select* from product_type");
    $result1 = DB::select("select* from brand");
    $result2 = DB::select("select* from main_category");
    $result3 = DB::select("select* from sub_category");
  
    return view('admin.add_product_view',compact('result','result1','result2','result3')); 
   }

   public function add_product(Request $request) {
       try{

    if(!(session()->has('type') && session()->get('type')=='admin'))
    {
        return redirect('/admin');
    }
    
       $main_category = urldecode($request->input('mainCategory'));
     
          $sub_category = '';
        $product_type ='';
     if(!empty($main_category))
     {
    $a =  $request->input('SubCategory');
     $sub_category = DB::select("select* from sub_category where SKU = '$a' ");
       if(!empty($sub_category))
       {
    $sub_category = $sub_category[0]->sub_category;
       }
     $product_type = $request->input('ProductType');
    
     }
 
  //  $final_size="";
  //  $size = $request->input('size');
    
 //  $min  = $request->input('min');
 //    $max = $request->input('max');
  /*  foreach($size as $sizes)
    {
        $final_size = $final_size . $sizes. ',';
    }
    
    $final_size = rtrim($final_size,',');*/
    
       $q = $request->input('mytextt');
    $thumbnail = "";
    if ($request->hasFile('file')) {
        $image = $request->file('file');
        $uniqueFileName = uniqid() . $image->getClientOriginalName() . '.' . $image->getClientOriginalExtension();
        $input['imagename'] = time().'.'.strtolower($image->getClientOriginalExtension());
        $destinationPath =public_path('/storage/images');
       $image->storeAs('public/images',$uniqueFileName);
        $thumbnail=$uniqueFileName;
    }
    $thumbnail2 = "";
    if ($request->hasFile('images2')) {
        $image = $request->file('images2');
        $uniqueFileName = uniqid() . $image->getClientOriginalName() . '.' . $image->getClientOriginalExtension();
        $input['imagename'] = time().'.'.strtolower($image->getClientOriginalExtension());
        $destinationPath =public_path('/storage/images');
      $image->storeAs('public/images',$uniqueFileName);
        $thumbnail2=$uniqueFileName;
    }

    $thumbnail3 = "";
    if ($request->hasFile('images3')) {
        $image = $request->file('images3');
        $uniqueFileName = uniqid() . $image->getClientOriginalName() . '.' . $image->getClientOriginalExtension();
        $input['imagename'] = time().'.'.strtolower($image->getClientOriginalExtension());
        $destinationPath =public_path('/storage/images');
    $image->storeAs('public/images',$uniqueFileName);
        $thumbnail3=$uniqueFileName;
    }
    $status = 1;
    
 
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
     $dataService->disableLog();
      
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
  
      $dataService->disableLog();
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
    
      $Item = Item::create([
        "Name" => $request->input('name'),
        "Sku" => $request->input('sku'),
            "Active" => true,
            "FullyQualifiedName" => $request->input('name'),
              "Description" => $request->input('title'),
            "Taxable" => true,
            "Type" => "Inventory",
            "IncomeAccountRef"=> [
                "value"=> 1,
                "name" => "Sales"
              ],
        
            "ExpenseAccountRef"=> [
              "value"=> 83,
              "name"=> "Cost of Goods Sold"
            ],
            "AssetAccountRef"=> [
                "value"=> 84,
                "name"=> "Inventory Asset"
              ],
            "TrackQtyOnHand" => true,
            "QtyOnHand"=> $request->input('available'),
            "InvStartDate"=> $dateTime
      ]);
     
      $resultingObj = $dataService->Add($Item);
      $error = $dataService->getLastError();
      

      if ($error) {
          
          echo "The Status code is: " . $error->getHttpStatusCode() . "\n";
          echo "The Helper message is: " . $error->getOAuthHelperError() . "\n";
          echo "The Response message is: " . $error->getResponseBody() . "\n";
      }
      else {
     
   
       DB::insert("insert into product (QB_id,SKU,title,name,price,category,sub_category,brand_name,product_type,available_quantity,alert_quantity,thumbnail,thumbnail2,thumbnail3,description,status,min) values (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)",array($resultingObj->Id,$request->input('sku'),$request->input('title'),$request->input('name'),$q[1],$main_category,$sub_category,$request->input('brandName'),$product_type,$request->input('available'),$request->input('alert'),$thumbnail,$thumbnail2,$thumbnail3,$request->input('description'),$status,$request->input('min')));
 
     
    for($i=0; $i < count($q); $i++ )
    {
 
        DB::insert("insert into pricing_detail (product_id,quantity,price) values (?,?,?)",array($resultingObj->Id,$q[$i],$q[++$i]));

    }
      }
      
   
    return redirect('/admin/home/view/product');
       }
       catch(\Exception $e)
        {
            return response($e->getMessage().' '.$e->getLine().'   '.            $e->getFile());
        }
   }

   public function edit_product_view($pk_id) {

    if(!(session()->has('type') && session()->get('type')=='admin'))
    {
        return redirect('/admin');
    }

    $result = DB::select("select* from product where pk_id = '$pk_id'");
    $result1 = DB::select("select* from main_category");
    $main = $result[0]->category;
      $sub = $result[0]->sub_category;
   
    $result2 = DB::select("select* from sub_category where category = '$main'");

    $result3 = DB::select("select* from product_type  where main_category = '$main' and sub_category = '$sub' ");
    $result4 = DB::select("select* from brand");
 
    return view('admin.edit_product',compact('result','result1','result2','result3','result4'));

}
   public function updateProductStatus($pk_id,$status)
   {
    if(!(session()->has('type') && session()->get('type')=='admin'))
    {
        return redirect('/admin');
    }
DB::update("update product set status='$status' where pk_id = '$pk_id'");
   


      
   }

   public function updatePromoStatus($pk_id,$status)
   {

    if(!(session()->has('type') && session()->get('type')=='admin'))
    {
        return redirect('/admin');
    }
    
       DB::update("update promo_code set status='$status' where pk_id = '$pk_id'");

       return $status;
   }
   public function add_product_type_view() {

    if(!(session()->has('type') && session()->get('type')=='admin'))
    {
        return redirect('/admin');
    }

    $result = DB::select("select* from main_category");
        $result1 = DB::select("select* from sub_category");
        return view('admin.add_product_type_view',compact('result','result1')); 
       }
    
          public function add_product_type(Request $request) {
         if(!(session()->has('type') && session()->get('type')=='admin'))
    {
        return redirect('/admin');
    }
    $cat = $request->input('productType');
      $cat1 = urldecode($request->input('mainCategory'));
  
       $cat2 = $request->input('subCategory');
    
 
         $result = DB::select( DB::raw("SELECT * FROM product_type WHERE product_type = :value and main_category= :value2 and sub_category= :value3 "), array(
   'value' => $cat,
   'value2' => $cat1,
   'value3' => $cat2,
 ));
 
        if(count($result)>0)
        {
             return Redirect::back()->withErrors('Product Type already Exist');
            
        }
        else
        
  {
            
        DB::insert("insert into product_type (product_type,main_category,sub_category) values (?,?,?)",array($request->input('productType'),$cat1,$request->input('subCategory')));
          $result = DB::select("select* from product_type");
     
        return view('admin.product_type_list_view',compact('result'));
       }
       }
       public function product_type_list_view() {

        if(!(session()->has('type') && session()->get('type')=='admin'))
        {
            return redirect('/admin');
        }

        $result = DB::select("select* from product_type");
     
        return view('admin.product_type_list_view',compact('result'));

}

public function edit_product_type_view($pk_id) {

    if(!(session()->has('type') && session()->get('type')=='admin'))
    {
        return redirect('/admin');
    }
    $result = DB::select("select* from product_type where pk_id = '$pk_id'");
 
    return view('admin.edit_product_type_view',compact('result'));

}

 
public function approved_accountant_alerts_list_view() {

    if(!(session()->has('type') && session()->get('type')=='admin'))
    {
        return redirect('/admin');
    }

    $result = DB::select("select* from approved_warehouse_orders where quantity_received IS NULL");
 
    return view('admin.approved_purchaseapp_alerts_view',compact('result'));

}

public function approved_orders_alerts_list_view() {

    if(!(session()->has('type') && session()->get('type')=='admin'))
    {
        return redirect('/admin');
    }

    $result = DB::select("select* from approved_warehouse_orders");
 
    return view('admin.approved_orders_alerts_list_view',compact('result'));

}


public function orders_stocks_list_view() {

    if(!(session()->has('type') && session()->get('type')=='admin'))
    {
        return redirect('/admin');
    }

    $result = DB::select("select* from approved_warehouse_orders");
 
    return view('admin.orders_stocks_list_view',compact('result'));

}

public function approved_warehouse_alerts_list_view() {

    if(!(session()->has('type') && session()->get('type')=='admin'))
    {
        return redirect('/admin');
    }
    
    
    
  //  $result = DB::select("select* from approved_warehouse_orders,product where  product.name = approved_warehouse_orders.sku");
 
 
    $result = DB::select("select* from approved_warehouse_orders");
 
    return view('admin.approved_warehouse_alerts_view',compact('result'));

}

public function warehouse_alerts_list_view() {

    if(!(session()->has('type') && session()->get('type')=='admin'))
    {
        return redirect('/admin');
    }
    
    
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
      
      $entities = $dataService->Query("SELECT * FROM Vendor");
  
       $product = DB::select("select* from product");
 
    $result = DB::select("select* from detail_table,product,order_table where product.status = '1' and (product.available_quantity < product.alert_quantity or product.available_quantity = product.alert_quantity )  and product.pk_id = detail_table.product_id and order_table.pk_id = detail_table.order_id and order_table.status = '1' and (detail_table.pos = '0' or detail_table.pos = '1') order by detail_table.pk_id desc");

    return view('admin.warehouse_alerts_view',compact('result','product','entities'));

}

public function create_purchase_order_view() {

    if(!(session()->has('type') && session()->get('type')=='admin'))
    {
        return redirect('/admin');
    }
    
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
      
      $entities = $dataService->Query("SELECT * FROM Vendor");
    
      $result = DB::select("select* from product");

    
     return view('admin.create_purchase_order',compact('result','entities'));

}

public function pos_alerts_list_view() {

    if(!(session()->has('type') && session()->get('type')=='admin'))
    {
        return redirect('/admin');
    }
    $result = DB::select("select* from purchase_orders where pos = '0'");
 
    return view('admin.purchase_alerts_list_view',compact('result'));

}

public function accountant_alerts_list_view() {

    if(!(session()->has('type') && session()->get('type')=='admin'))
    {
        return redirect('/admin');
    }
   // $result = DB::select("select* from accountant_orders,product where accountant_orders.pos = '0' and accountant_orders.sku = product.name and accountant_orders.order_id = detail_table.order_id");
    
// $result = DB::select("select* from accountant_orders,detail_table,product where accountant_orders.pos = '0' and accountant_orders.order_id = detail_table.order_id and accountant_orders.sku = product.name");
 $result = DB::select("select* from accountant_orders where pos = '0'");
    return view('admin.accountant_alerts_list_view',compact('result'));

}

public function decline_accountant_alerts_list_view() {

    if(!(session()->has('type') && session()->get('type')=='admin'))
    {
        return redirect('/admin');
    }
   // $result = DB::select("select* from accountant_orders,product where accountant_orders.pos = '0' and accountant_orders.sku = product.name and accountant_orders.order_id = detail_table.order_id");
    
// $result = DB::select("select* from accountant_orders,detail_table,product where accountant_orders.pos = '2' and accountant_orders.sku = product.name and accountant_orders.order_id = detail_table.order_id and accountant_orders.sku = product.name");
$result = DB::select("select* from accountant_orders where pos = '2'");
return view('admin.decline_accountant',compact('result'));

}

public function accountant_waiting_alerts_list_view() {

    if(!(session()->has('type') && session()->get('type')=='admin'))
    {
        return redirect('/admin');
    }
  
   // $result = DB::select("select* from accountant_orders,product where accountant_orders.pos = '0' and accountant_orders.sku = product.name and accountant_orders.order_id = detail_table.order_id");
    
 $result = DB::select("select* from accountant_orders where pos = '0'");

  
    return view('admin.accountant_waiting_alerts_list_view',compact('result'));

}

public function edit_product($pk_id, Request $request) {

    if(!(session()->has('type') && session()->get('type')=='admin'))
    {
        return redirect('/admin');
    }
    
    
  
    
     $result = DB::select("select * from product where pk_id = '$pk_id'"); 
    
      $status = 0;
    if($request->input('status'))
    {
        $status = 1;
    }
    
    
    
          $main_category = urldecode($request->input('mainCategory'));
     
        
      
    $a =  $request->input('SubCategory');
        $sub_category = DB::select( DB::raw("SELECT * FROM sub_category WHERE sub_category = :value"), array(
   'value' => $a,
 )); 
 
 
    if(count($sub_category)>0)
    {
         $a = $sub_category[0]->sub_category;
        
    }
    else
    {
    
      $sub_category = DB::select( DB::raw("SELECT * FROM sub_category WHERE SKU = :value"), array(
   'value' => $a,
 ));
 
  if(count($sub_category)>0)

    {
    $a = $sub_category[0]->sub_category;
    }
    else{
        $a = "";
    }
    }
    
    
    
      $product_type = $request->input('ProductType');
     $min = $request->input('min');
     /*  $final_size="";
    $size = $request->input('size');
        $min = $request->input('min');
            $max = $request->input('max');*/
   
  
   
  /*  foreach($size as $sizes)
    {
        $final_size = $final_size . $sizes. ',';
    }
    
    $final_size = rtrim($final_size,',');*/
    
     $thumbnail = $result[0]->thumbnail;
    if ($request->hasFile('file')) {
        $image = $request->file('file');
        $uniqueFileName = uniqid() . $image->getClientOriginalName() . '.' . $image->getClientOriginalExtension();
        $input['imagename'] = time().'.'.strtolower($image->getClientOriginalExtension());
        $destinationPath =public_path('/storage/images');
       $image->storeAs('public/images',$uniqueFileName);
        $thumbnail=$uniqueFileName;
    }
    $thumbnail2 =  $result[0]->thumbnail2;
    if ($request->hasFile('images2')) {
        $image = $request->file('images2');
        $uniqueFileName = uniqid() . $image->getClientOriginalName() . '.' . $image->getClientOriginalExtension();
        $input['imagename'] = time().'.'.strtolower($image->getClientOriginalExtension());
        $destinationPath =public_path('/storage/images');
      $image->storeAs('public/images',$uniqueFileName);
        $thumbnail2=$uniqueFileName;
    }

    $thumbnail3 =  $result[0]->thumbnail3;
    if ($request->hasFile('images3')) {
        $image = $request->file('images3');
        $uniqueFileName = uniqid() . $image->getClientOriginalName() . '.' . $image->getClientOriginalExtension();
        $input['imagename'] = time().'.'.strtolower($image->getClientOriginalExtension());
        $destinationPath =public_path('/storage/images');
    $image->storeAs('public/images',$uniqueFileName);
        $thumbnail3=$uniqueFileName;
    }
    
    
      $QB_id = DB::select("select * from product where pk_id = '$pk_id'"); 
      $QB = $QB_id[0]->QB_id;
    
    if($request->input('mytextt'))
    {
         $q = $request->input('mytextt');
           DB::delete("delete from pricing_detail where product_id = '$QB'");
    
      for($i=0; $i < count($q); $i++ )
    {
            DB::insert("insert into pricing_detail (product_id,quantity,price) values (?,?,?)",array($QB,$q[$i],$q[++$i]));

    }
    
       DB::table('product')->where('pk_id', $pk_id)->update(['price' =>$q[1]]);
  
    
    }  
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
 
   $dataService->setLogLocation("/Users/hlu2/Desktop/newFolderForLog");
   $dataService->throwExceptionOnError(true);
   $result = DB::select("select* from product where pk_id = '$pk_id'");
   $QB_id = $result[0]->QB_id;
   $item = $dataService->FindbyId('item', $QB_id);

   $theResourceObj = Item::update($item , [
    "Name" => $request->input('name'),
     "Sku" => $request->input('sku'),
         "Active" => true,
         "FullyQualifiedName" => $request->input('name'),
         
              "Description" => $request->input('title'),
         "Taxable" => true,
         "Type" => "Inventory",
         "IncomeAccountRef"=> [
             "value"=> 1,
             "name" => "Sale"
           ],
     
         "ExpenseAccountRef"=> [
           "value"=> 83,
           "name"=> "Cost of Goods Sold"
         ],
         "AssetAccountRef"=> [
             "value"=> 84,
             "name"=> "Inventory Asset"
           ],
         "TrackQtyOnHand" => true,
         "QtyOnHand"=> $request->input('available'),
         "InvStartDate"=> $dateTime
]);

   $resultingObj = $dataService->Add($theResourceObj);
   $error = $dataService->getLastError();
   if ($error) {
       echo "The Status code is: " . $error->getHttpStatusCode() . "\n";
       echo "The Helper message is: " . $error->getOAuthHelperError() . "\n";
       echo "The Response message is: " . $error->getResponseBody() . "\n";
   }
   else {
    DB::table('product')->where('pk_id', $pk_id)->update(['sku' =>$request->input('sku'),'title' =>$request->input('title'),'name' =>$request->input('name'),'category' =>$main_category,'sub_category' =>$a,'brand_name' =>$request->input('brandName'),'product_type' =>$product_type,'available_quantity' =>$request->input('available'),'alert_quantity' =>$request->input('alert'),'thumbnail' =>$thumbnail,'thumbnail2' =>$thumbnail2,'thumbnail3' =>$thumbnail3,'status' =>$status,'min' =>$min,'description'=>$request->input('description')]);
  
   }
   
   
   
   return redirect('/admin/home/view/product');

}
public function edit_product_type(Request $request, $pk_id) {
  if(!(session()->has('type') && session()->get('type')=='admin'))
    {
        return redirect('/admin');
    }
    
   $cat = $request->input('productType');
      $cat1 = urldecode($request->input('mainCategory'));
  
       $cat2 = $request->input('subCategory');
    
 
         $result = DB::select( DB::raw("SELECT * FROM product_type WHERE product_type = :value and main_category= :value2 and sub_category= :value3 "), array(
   'value' => $cat,
   'value2' => $cat1,
   'value3' => $cat2,
 ));
        if(count($result)>0)
        {
             return Redirect::back()->withErrors('Product Type already Exist');
            
        }
        else
        
  {
      
      $cat = $request->input('productType');
      $cat1 = urldecode($request->input('mainCategory'));
  
       $cat2 = $request->input('subCategory');

   $result1 = DB::select("select* from product_type where pk_id = '$pk_id' ");
       if(count($result1)>0)
        {
           $main =  $result1[0]->main_category;
           $sub =  $result1[0]->sub_category;
           $type =  $result1[0]->product_type;
       DB::table('product_type')->where('pk_id', $pk_id)->update(['product_type' =>$cat,'main_category' =>$cat1,'sub_category' =>$cat2]);
        DB::update("update product set category='$cat1', sub_category='$cat2', product_type='$cat' where category = '$main' and sub_category='$sub' and product_type='$type'");
        }

    //DB::table('product_type')->where('pk_id', $pk_id)->update(['product_type' =>$cat,'main_category' =>$cat1,'sub_category' =>$cat2]);
      $result = DB::select("select* from product_type");
     
        return view('admin.product_type_list_view',compact('result'));

}
}

public function product_list_view() {

    if(!(session()->has('type') && session()->get('type')=='admin'))
    {
        return redirect('/admin');
    }

    $result = DB::select("select* from product");
    return view('admin.product_list_view',compact('result')); 
   }



public function active_order_view() {

    if(!(session()->has('type') && session()->get('type')=='admin'))
    {
        return redirect('/admin');
    }


 //$result = DB::select("select order_table.pk_id,order_table.fname,order_table.lname,address_table.fname,address_table.lname,order_table.amount,order_table.placed_at from order_table,address_table where order_table.shipment_address_id=address_table.pk_id or order_table.status = '0'");

                
 $result = DB::select("select* from order_table where status = '0' or status = '1' ");


 return view('admin.active_order_view',compact('result'));

}




public function active_order_detail_view($id) {

    if(!(session()->has('type') && session()->get('type')=='admin'))
    {
        return redirect('/admin');
    }

    $result = DB::select("select* from order_table where pk_id = '$id'");
    $address = $result[0]->shipment_address_id;
    if(!empty($address))
    {
      $addresses = DB::select("select* from address_table where pk_id = '$address'");
    }
    else
    {
          $addresses = DB::select("select* from order_table where pk_id = '$id'");
   
    }
    $result3 = DB::select("select* from rider_details");

    $o_id = $result[0]->user_id;
    if(empty($o_id))
    {
    $result1 = DB::select("select * from detail_table where order_id = '$id'"); 
  
       
       
    return view('admin.active_order_detail_view',compact('result','result1','result3','addresses'));
  
    

    }
else
{
$result = DB::select("select order_table.pk_id,address_table.fname,address_table.lname,order_table.amount,address_table.address,order_table.status,address_table.phone from order_table,address_table where order_table.shipment_address_id=address_table.pk_id and order_table.pk_id = '$id'");
$result1 = DB::select("select * from detail_table where order_id = '$id'"); 
    return view('admin.active_order_detail_view',compact('result','result1','result3','addresses')); 
}
   }


   public function complete_order_list_view() {
    if(!(session()->has('type') && session()->get('type')=='admin'))
    {
        return redirect('/admin');
    }
   
    $result = DB::select("select* from order_table where status = '4'");
    return view('admin.complete_order_list_view',compact('result')); 
   }
   
      public function partialy_complete_order_list_view() {
    if(!(session()->has('type') && session()->get('type')=='admin'))
    {
        return redirect('/admin');
    }
   
    $result = DB::select("select* from order_table where status = '5'");
    return view('admin.partialy_complete_order_list_view',compact('result')); 
   }


   public function reporting_by_sale_list_view() {

    if(!(session()->has('type') && session()->get('type')=='admin'))
    {
        return redirect('/admin');
    }
$total = 0;
   
    $result = DB::select("select* from order_table where status = '4'");

    foreach( $result as  $results)
    {
        $total = $total + $results->amount;
    }
    return view('admin.reporting_by_sale_list_view',compact('result','total')); 
   }


   public function cancel_order_list_view() {

    if(!(session()->has('type') && session()->get('type')=='admin'))
    {
        return redirect('/admin');
    }

   
    $result = DB::select("select* from order_table where status = '2'");
    return view('admin.canceled_order_list_view',compact('result')); 
   }
   

   public function return_order_list_view() {


    if(!(session()->has('type') && session()->get('type')=='admin'))
    {
        return redirect('/admin');
    }

   
    $result = DB::select("select* from order_table where status = '3'");
    return view('admin.return_order_list_view',compact('result')); 
   }


public function complete_order_detail_view($id) {

    if(!(session()->has('type') && session()->get('type')=='admin'))
    {
        return redirect('/admin');
    }
   
    $result = DB::select("select* from order_table where pk_id = '$id'");
    $address = $result[0]->shipment_address_id;
    if(!empty($address))
    {
      $addresses = DB::select("select* from address_table where pk_id = '$address'");
    }
    else
    {
          $addresses = DB::select("select* from order_table where pk_id = '$id'");
   
    }
  

    $o_id = $result[0]->user_id;
    if(empty($o_id))
    {
    $result1 = DB::select("select * from detail_table where order_id = '$id'"); 
  
       
       
    return view('admin.complete_order_detail_view',compact('result','result1','addresses'));
  
    

    }
else
{
$result = DB::select("select order_table.pk_id,address_table.fname,address_table.lname,order_table.amount,address_table.address,order_table.status,address_table.phone from order_table,address_table where order_table.shipment_address_id=address_table.pk_id and order_table.pk_id = '$id'");
$result1 = DB::select("select * from detail_table where order_id = '$id'"); 
    return view('admin.complete_order_detail_view',compact('result','result1')); 
}
   }


public function partialy_complete_order_detail_view($id) {

    if(!(session()->has('type') && session()->get('type')=='admin'))
    {
        return redirect('/admin');
    }
    $result = DB::select("select* from order_table where pk_id = '$id'");

    $o_id = $result[0]->user_id;
    if(empty($o_id))
    {
    $result1 = DB::select("select * from detail_table where order_id = '$id'"); 
  
       
       
    return view('admin.partialy_complete_order_detail_view',compact('result','result1'));
  
    

    }
else
{
$result = DB::select("select order_table.pk_id,address_table.fname,address_table.lname,order_table.amount,address_table.address,order_table.status,address_table.phone from order_table,address_table where order_table.shipment_address_id=address_table.pk_id and order_table.pk_id = '$id'");
$result1 = DB::select("select * from detail_table where order_id = '$id'"); 
    return view('admin.partialy_complete_order_detail_view',compact('result','result1')); 
}
   }

   public function reporting_by_sale($id) {

    if(!(session()->has('type') && session()->get('type')=='admin'))
    {
        return redirect('/admin');
    }

    $result = DB::select("select* from order_table where pk_id = '$id'");

    $o_id = $result[0]->user_id;
    if(empty($o_id))
    {
    $result1 = DB::select("select * from detail_table where order_id = '$id'"); 
  
   
       
    return view('admin.sale_reporting_detail_view',compact('result','result1'));
  
    

    }
else
{
$result = DB::select("select order_table.pk_id,address_table.fname,address_table.lname,order_table.amount,address_table.address,order_table.status,address_table.phone from order_table,address_table where order_table.shipment_address_id=address_table.pk_id and order_table.pk_id = '$id'");
$result1 = DB::select("select * from detail_table where order_id = '$id'"); 


    return view('admin.sale_reporting_detail_view',compact('result','result1')); 
}
   }

   public function accountant_payment_received_view() {


    if(!(session()->has('type') && session()->get('type')=='admin'))
    {
        return redirect('/admin');
    }



 $result = DB::select("select * from order_table where status = '0' or status = '4' and payment_received IS NULL ");

 return view('admin.cash_received_form_riders_view',compact('result'));

}

   public function payment_received_view() {


    if(!(session()->has('type') && session()->get('type')=='admin'))
    {
        return redirect('/admin');
    }

 $result = DB::select("select * from order_table where status = '0' or status = '4' and payment_received IS NOT NULL");

 return view('admin.payment_received_view',compact('result'));

}

  public function payment_received_by_rider(Request $request) {

   if(!(session()->has('type') && session()->get('type')=='admin'))
    {
        return redirect('/admin');
    }
            
             
            $order_id = $request->input('order_id');
 
            $payment = $request->input('payment_received');
          
   
          
        $chk = $request->input('checkbox');
 
        
            foreach($chk as $chks)
            {
        
            $users = DB::table('order_table')->where([['pk_id',$order_id[$chks]]])->update(['payment_received' => $payment[$chks]]);
           
                             
            }
        
        
            return redirect()->back();
          
                    
                 }

   public function cancel_order_detail_view($id) {

    if(!(session()->has('type') && session()->get('type')=='admin'))
    {
        return redirect('/admin');
    }
    $result = DB::select("select* from order_table where pk_id = '$id'");

    $o_id = $result[0]->user_id;
    if(empty($o_id))
    {
    $result1 = DB::select("select * from detail_table where order_id = '$id'"); 
  
       
       
    return view('admin.cancel_order_detail_view',compact('result','result1'));
  
    

    }
else
{
$result = DB::select("select order_table.pk_id,address_table.fname,address_table.lname,order_table.amount,address_table.address,order_table.status,address_table.phone from order_table,address_table where order_table.shipment_address_id=address_table.pk_id and order_table.pk_id = '$id'");
$result1 = DB::select("select * from detail_table where order_id = '$id'"); 
    return view('admin.cancel_order_detail_view',compact('result','result1')); 
}
   }

   public function return_order_detail_view($id) {
    if(!(session()->has('type') && session()->get('type')=='admin'))
    {
        return redirect('/admin');
    }

    $result = DB::select("select* from order_table where pk_id = '$id'");

    $o_id = $result[0]->user_id;
    if(empty($o_id))
    {
    $result1 = DB::select("select * from detail_table where order_id = '$id'"); 
  
       
       
    return view('admin.return_order_detail_view',compact('result','result1'));
  
    

    }
else
{
$result = DB::select("select order_table.pk_id,address_table.fname,address_table.lname,order_table.amount,address_table.address,order_table.status,address_table.phone from order_table,address_table where order_table.shipment_address_id=address_table.pk_id and order_table.pk_id = '$id'");
$result1 = DB::select("select * from detail_table where order_id = '$id'"); 
    return view('admin.return_order_detail_view',compact('result','result1')); 
}
   }
   
      public function order_payments_list_view() {

    if(!(session()->has('type') && session()->get('type')=='admin'))
    {
        return redirect('/admin');
    }

  $result = DB::select("select* from order_table where status = '4'");
   
  return view('admin.order_payments_list_view',compact('result')); 
   }
   
   
    public function create_payment(Request $request) {

    if(!(session()->has('type') && session()->get('type')=='admin'))
    {
        return redirect('/admin');
    }

 $pk_id = $request->input('pk_id');
 
     $pending_amount = $request->input('pending_amount');
 
    $amount = $request->input('amount');
    $pp = $request->input('partial_payments');

  
$chk = $request->input('checkbox');


 if($request->input('checkbox'))
 {
    foreach($chk as $chks)
    {
        

       
    $payment1 = $pending_amount[$chks] - $pp[$chks];
    
        DB::table('order_table')->where('pk_id', $pk_id[$chks])->update(['pending_amount' =>$payment1]);
   
       
     }
 }
 else{
     
     return Redirect::back()->withErrors('atleast you neeed to select one check');
 }
    return redirect()->back();
            
         }
         
         
         
               public function client_profile_view($id) {

    if(!(session()->has('type') && session()->get('type')=='admin'))
    {
        return redirect('/admin');
    }
  $addresses = DB::select("select* from address_table where user_id = '$id'");
    $business = DB::select("select* from business_account where user_id = '$id'");
   
  return view('admin.client_profile_view',compact('addresses', 'business')); 
   }
   
    public function client_profile_view_list() {

    if(!(session()->has('type') && session()->get('type')=='admin'))
    {
        return redirect('/admin');
    }

  $result = DB::select("select* from client_details ");
   
  return view('admin.client_profile_list',compact('result')); 
   }
         
}
