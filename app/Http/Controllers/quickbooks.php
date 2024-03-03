<?php

namespace App\Http\Controllers;

use QuickBooksOnline\API\Core\ServiceContext;
use QuickBooksOnline\API\DataService\DataService;
use QuickBooksOnline\API\PlatformService\PlatformService;
use QuickBooksOnline\API\Core\Http\Serialization\XmlObjectSerializer;
use QuickBooksOnline\API\Facades\Invoice;
use Log;
use QuickBooksOnline\API\Facades\Item;

use QuickBooksOnline\API\Facades\Supplier;
use Illuminate\Http\Request;
use QuickBooksOnline\API\Core\OAuth\OAuth2\OAuth2LoginHelper;
use QuickBooksOnline\API\Facades\Customer;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use QuickBooksOnline\API\Utility\Configuration\ConfigurationManager; 


use QuickBooksOnline\API\Exception\SdkException;
use QuickBooksOnline\API\Core\CoreConstants;


class quickbooks extends Controller
{
    


public function testhook(Request $request)
{
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

     $requestBody = $request->all();

   
    $header = $request->header();
    
    


   
    Log::info("Request body");
    
        Log::info($requestBody);   
        
        
        Log::info("This is the variable value of request body: ");
        $array = $requestBody["eventNotifications"][0]["dataChangeEvent"]["entities"];
        
         
         
        
        foreach($array as $data)
        {
                    Log::info($data["name"]);
                    if(($data["name"]) == 'Item' && ($data["operation"]) == 'Create'  )
                    {
        $QB_id = $data["id"];
        
            $result = DB::select("select* from product where QB_id = '$QB_id' ");
               if(count($result)<= 0)
               {
          $entities = $dataService->Query("SELECT * FROM Item where Id = '$QB_id'");
            $rest = 0;
          $status = 1;
          $brand_name = "";
          $product_type ="";
          $thumbnail = "";
          $qty = 1;
   
      DB::insert("insert into product(QB_id,sku,name,title,available_quantity,status) values (?,?,?,?,?,?)"
      ,array($QB_id,$entities[0]->Sku,$entities[0]->Name,$entities[0]->Description,$entities[0]->QtyOnHand,$status));
                   
                   
                   DB::insert("insert into pricing_detail (product_id,quantity,price) values (?,?,?)",array($QB_id,$qty,$rest));
               }
                    }
                        if(($data["name"]) == 'Item' && ($data["operation"]) == 'Update'  )
                    {
        $QB_id = $data["id"];
          $entities = $dataService->Query("SELECT * FROM Item where Id = '$QB_id'");
          
          $rest = 0;
   $status = 1;
          $brand_name = "";
          $product_type ="";
          $thumbnail = "";
          $qty = 1;
          
    DB::table('product')->where('QB_id', $QB_id)->update(['sku' =>$entities[0]->Sku,'name' =>$entities[0]->Name,'title' =>$entities[0]->Description,'available_quantity'=>$entities[0]->QtyOnHand,'status' =>$status]);
               
                   DB::delete("delete from pricing_detail where product_id = '$QB_id'"); 
               
                    DB::insert("insert into pricing_detail (product_id,quantity,price) values (?,?,?)",array($QB_id,$qty,$rest));
             
               
                 }
        
        
                       if(($data["name"]) == 'Item' && ($data["operation"]) == 'Delete'  )
                    {
        $QB_id = $data["id"];
       
     DB::delete("delete from product where QB_id = '$QB_id'");
     
           DB::delete("delete from pricing_detail where product_id = '$QB_id'");               
                    }
                    
                    
                    
       //cutomer             
                    
                           if(($data["name"]) == 'Customer' && ($data["operation"]) == 'Delete'  )
                    {
        $QB_id = $data["id"];
      
      DB::delete("delete from client_details where QB_id = '$QB_id'");
                   }
                    
                            if(($data["name"]) == 'Customer' && ($data["operation"]) == 'Create'  )
                    {
        $QB_id = $data["id"];
          
               $result = DB::select("select* from client_details where QB_id = '$QB_id' ");
               if(count($result)<= 0)
               {
                  
                          $rest = 0;
                           $password = md5($rest);
    $entities = $dataService->Query("SELECT * FROM Customer where Id = '$QB_id'");
      DB::insert("insert into client_details (QB_id,fname,lname, username, password,promostatus ) values (?,?,?,?,?,?)",array($QB_id,$entities[0]->GivenName,$entities[0]->FamilyName,$entities[0]->PrimaryEmailAddr->Address,$password,$rest));
                         
             
                   
               }
                            }
                    
                            if(($data["name"]) == 'Customer' && ($data["operation"]) == 'Update'  )
                    {
        $QB_id = $data["id"];
          $entities = $dataService->Query("SELECT * FROM Customer where Id = '$QB_id'");
       

    DB::table('client_details')->where('QB_id', $QB_id)->update(['fname' =>$entities[0]->GivenName,'lname' =>$entities[0]->FamilyName, 'username' =>$entities[0]->PrimaryEmailAddr->Address ]);
      
      
                   }
                    
                    
                    //Invoice
              
                    
                               if(($data["name"]) == 'Invoice' && ($data["operation"]) == 'Create'  )
                    {
        $QB_id = $data["id"];
        
            $result1 = DB::select("select* from order_table where QB_id = '$QB_id' ");
               if(count($result1)<= 0)
               {
     
          $entities = $dataService->Query("SELECT * FROM Invoice where Id = '$QB_id'");
         
        $itemref =   $entities[0]->Line[0]->SalesItemLineDetail->ItemRef;
        $customer =  $entities[0]->CustomerRef;
        
            $entities2 = $dataService->Query("SELECT * FROM Customer where Id = '$customer'");
          
           $status = 1;
      
             $pos = 0;
             $size = "";
          
    $entities1 = $dataService->Query("SELECT * FROM Item where Id = '$itemref'");
       $addr = $entities[0]->BillAddr->Line2;
 
          
              DB::insert("insert into address_table (user_id,fname,lname,address, city, phone, region ) values (?,?,?,?,?,?,?)",
              array($entities[0]->CustomerRef,$entities2[0]->GivenName,$entities2[0]->FamilyName,$addr,$entities[0]->BillAddr->Line3,$entities[0]->BillAddr->Line1,$entities[0]->BillAddr->Line3));
   
   
                 $address = DB::select("select * from address_table where user_id = '$customer' and address = '$addr' ");
          
        DB::insert("insert into order_table (QB_id,user_id,amount, shipment_address_id,fname,lname,status ) values (?,?,?,?,?,?,?)",
      array($entities[0]->Id,$entities[0]->CustomerRef,$entities[0]->Balance,$address[0]->pk_id,$entities2[0]->GivenName,$entities2[0]->FamilyName,$status));
      
      
          $result = DB::select("select * from order_table where QB_id = '$QB_id'  ");
      
         DB::insert("insert into detail_table (product_id,order_id, sku, product_name, quantity,price,size,pos ) values (?,?,?,?,?,?,?,?)",
         array($entities[0]->Line[0]->SalesItemLineDetail->ItemRef,$result[0]->pk_id,$entities1[0]->Sku,$entities1[0]->Name,$entities[0]->Line[0]->SalesItemLineDetail->Qty,$entities[0]->Line[0]->SalesItemLineDetail->UnitPrice,$size,$pos));
 
          
           
               }     
                  
                    }
        }
        

}

    public function token()
    { 
        


    $dataService = DataService::Configure(array(
        'auth_mode' => 'oauth2',
        'ClientID' => "Q09W3sGjTV2ATPHeBGLJ3LAXP5CININS5yi4JuEx1zFnOrW5er",
        'ClientSecret' => "xetiEvB5XsW52SlMw0IyILykFdHjLcrTIKQDTejr",
        'RedirectURI' => "https://developer.intuit.com/v2/OAuth2Playground/RedirectUrl",
        'scope' => "com.intuit.quickbooks.accounting",
        'baseUrl' => "Production"
  ));

  $OAuth2LoginHelper = $dataService->getOAuth2LoginHelper();

 $authorizationCodeUrl = $OAuth2LoginHelper->getAuthorizationCodeURL();

 $oauth2LoginHelper = new OAuth2LoginHelper("Q09W3sGjTV2ATPHeBGLJ3LAXP5CININS5yi4JuEx1zFnOrW5er","xetiEvB5XsW52SlMw0IyILykFdHjLcrTIKQDTejr");



//return $authorizationCodeUrl;

$accessTokenObj = $OAuth2LoginHelper->exchangeAuthorizationCodeForToken("L011559149438612VZ5nUZlUTSmAnQumg5JkTO0NhzwuI7Z6KR", "193514739439574");



$accessTokenValue = $accessTokenObj->getAccessToken();
$refreshTokenValue = $accessTokenObj->getRefreshToken();



echo "This is Access Token <br><br><br>". $accessTokenValue . '<br><br><br><br>';


echo "This is Refresh Token <br><br><br>". $refreshTokenValue . '<br>';

}

public function view_supplier(Request $request)
{


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
      
      $entities = $dataService->Query("SELECT * FROM Supplier");
  
return $entities;
     //  $a =  $entities[0]->Id;
    
        
   foreach( $entities as  $entity)
   {
       if( $entity->UnitPrice == 0)
       {
            $entity->UnitPrice = 1;
       }
          $rest = 0;
          $status = 1;
          $color = "Silver";
          $size = "";
          $brand_name = "";
          $product_type ="";
          $thumbnail = "";
          $qty = 1;
          $min = 0;
          $max = 100;
   
      DB::insert("insert into product(QB_id,sku,name,min,max,price,color,category,sub_category,brand_name,product_type,available_quantity,alert_quantity,thumbnail,thumbnail2,thumbnail3,description,status,size) values (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)"
      ,array( $entity->Id,$entity->Sku,$entity->Name,$min,$max,$entity->UnitPrice,$color,$product_type,$product_type,$brand_name,$product_type,$entity->QtyOnHand,$entity->ReorderPoint,$entity->AttachableRef,$thumbnail,$thumbnail,$entity->Description,$status,$size));
            
   }
   return "true";
  
}

public function create_invoice()
{

    $dataService = DataService::Configure(array(
        'auth_mode' => 'oauth2',
        'ClientID' => "Q0eILqeIPs1yrW6PJBfwKDb8XVaRul79PNueDoFiVtq11D8C8C",
        'ClientSecret' => "mYCf1o9PjOU7pq1JjlrOsOE47CfIoFIjv2S0NedN",

        'accessTokenKey' =>  "eyJlbmMiOiJBMTI4Q0JDLUhTMjU2IiwiYWxnIjoiZGlyIn0..2FjlP5LfZTpmCT7yS9EdKA.EtxCC_QKZr6VgWaCygfvFM-fe7XRzFQ7d3wJnJemwT0IgDfhnnItJybANFLLPwuqhVnWagRhkX841lFV1BdVNlZc85CghRuw6zTEOH8t_ol1v3GU6HAPRlaOKxWsVr7AyCB6nb-YfTBHLemgOH5hK6OW_ECvBO1VGHzg-UKyv3uMBUm6DfPCzqwpJzBtXanpUXcI0f_nuJ34YSBNs950h-0jhIQwUn-a5tY56wzqpA5M8ajtqQPyFEhQw3lpNl4eGGm1OYuAL1eMcg7xyA5ZJQolLuZMwMmVbnZjpDClKMJvgy0RczB4R2R83l-nJRSE-b7XApUEBSqpU2zSRIpq8kCER33zskmzIL1vyNHWfjALS3BGXLIXtEvNcaJLkBiYn-oq0KOYSg4b_iSgp3_xzIW8aZbJYZKDo2UwvJWYFqPzLTvIznMc8c8s9hI2B5nJHzjkX0CH6ODWe3ZP6qBLD9CkmSf0dhm77iNqRZDj8iTmwvaT8q4lV8FWUiGIpXxQ6GuZsfI3wBDczcDTGonqSKaZ6SctfJECMUFcTtGLvCpKiVymlzGuSwTSLTR--eG3N9Sg9w14SYuhTycr_ijvOx9dflVJSUv6XH9HslHNy4y1fcVpksLOVrdnKWsUOs1Wjq24QsW7UTLl0i1PK0OaC_10upcM8GWiNXNzB1g-f_huAQcARO15QN4-6cbV_vBh5mfwjZncixpYx6GY9VWy6FmkfV1hZX1UdfS9ArTPrVM.YPfkZ9OIOuotz7MQvdIMig",
        'refreshTokenKey' => 'L011547807239YIuhRrA8bl9Vac6bpiFPJXrGvI9boRtkH0irH',
          'RedirectURI' => "https://developer.intuit.com/v2/OAuth2Playground/RedirectUrl",
          'scope' => "com.intuit.quickbooks.accounting",
          'QBORealmID' => "123146125195389",
          'baseUrl' => "Development"
 ));



//Add a new Invoice
$invoiceToCreate = Invoice::create([
  "DocNumber" => "101010",
  "Line" => [
    [
      "Description" => "Sewing Service for Alex",
      "Amount" => 150.00,
      "DetailType" => "SalesItemLineDetail",
      "SalesItemLineDetail" => [
        "ItemRef" => [
          "value" => 1,
          "name" => "Services"
        ]
      ]
    ]
  ],
  "CustomerRef" => [
      "value" => "1",
      "name" => "Alex"
  ]
]);

$resultObj = $dataService->Add($invoiceToCreate);
$error = $dataService->getLastError();
if ($error) {
    echo "The Status code is: " . $error->getHttpStatusCode() . "\n";
    echo "The Helper message is: " . $error->getOAuthHelperError() . "\n";
    echo "The Response message is: " . $error->getResponseBody() . "\n";
}else {
    echo "Created Id={$resultObj->Id}. Reconstructed response body:\n\n";
   // $xmlBody = XmlObjectSerializer::getPostXmlFromArbitraryEntity($resultingObj, $urlResource);
 //   echo $xmlBody . "\n";
 }
}


public function create_item()
{ 
    
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
      
     
         $entity = $dataService->Query("SELECT * FROM Item STARTPOSITION 1000 MAXRESULTS 1001");
     return $entity;
              if(count($entity)> 0)
               {
                   foreach($entity as $entities)
{
       $product = DB::select("select* from product where QB_id = '$entities->Id'");
    if(count($product)>0)
    {
        
    }
    else
    {
   
            $rest = 0;
          $status = 1;
          $brand_name = "";
          $product_type ="";
          $thumbnail = "";
          $qty = 1;
   
      DB::insert("insert into product(QB_id,sku,name,title,available_quantity,status) values (?,?,?,?,?,?)"
      ,array($entities->Id,$entities->Sku,$entities->Name,$entities->Description,$entities->QtyOnHand,$status));
                   
                   
                   DB::insert("insert into pricing_detail (product_id,quantity,price) values (?,?,?)",array($entities->Id,$qty,$rest));
    }
               }
               }
               
               return "true";
         
      
      
    /*  $Item = Item::create([
            "Name" => "refreshtest",
            "Description" => "This is the sales description.",
            "Active" => false,
            "FullyQualifiedName" => "Office Supplies",
            "Taxable" => true,
            "UnitPrice" => 25,
            "Type" => "Inventory",
            "IncomeAccountRef"=> [
              "value"=> 79,
              "name" => "Landscaping Services:Job Materials:Fountains and Garden Lighting"
            ],
            "PurchaseDesc"=> "This is the purchasing description.",
            "PurchaseCost"=> 35,
            "ExpenseAccountRef"=> [
              "value"=> 80,
              "name"=> "Cost of Goods Sold"
            ],
            "AssetAccountRef"=> [
              "value"=> 81,
              "name"=> "Inventory Asset"
            ],
            "TrackQtyOnHand" => true,
            "QtyOnHand"=> 100,
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
          echo "Created Id={$resultingObj->Id}. Reconstructed response body:\n\n";
          $xmlBody = XmlObjectSerializer::getPostXmlFromArbitraryEntity($resultingObj, $urlResource);
          echo $xmlBody . "\n";
      }*/
}

public function refresh(){
    
    
    
         $refresh = DB::select("select* from refresh_token where pk_id = '1'");
  
  
$dataService = DataService::Configure(array(
        'auth_mode' => 'oauth2',
        'ClientID' => "Q0eILqeIPs1yrW6PJBfwKDb8XVaRul79PNueDoFiVtq11D8C8C",
        'ClientSecret' => "mYCf1o9PjOU7pq1JjlrOsOE47CfIoFIjv2S0NedN",
     //  'accessTokenKey' =>  "eyJlbmMiOiJBMTI4Q0JDLUhTMjU2IiwiYWxnIjoiZGlyIn0..gTRT28jsygMtOsbv3wJorg.THlQ5bTG5_rgy4jGipaw_OxGiAeddMtx29KGlwjFXVHWThBOyDt8pBVknNe1sNwT61P2-jf0UcGCrX91O3MB3X-UbDwLDrmqgy4OO8xAyUBbcADKwWzy5ylehrcr2rAEG75nIejikHCgn29vvCUFMv7GsoRW0Pp6XXBnbLSUqaUlUYd6Cx3lzQD5EDDDUaAS7vplLgmYy--1l8V3tGZx8BrbUIkF39qIcRVlST5-3D52FGr219vLeMS9Nu5-wPGcWk06C9K1ccSFZuFwp12_kdsOe5PxHGMzro7VcxfuTjz1g72r6EtNAxj3zemqtHePGSC0F-K47Ab0u8AUCPb4prmwsYnGSNL3_AeeiNfUI4yZxEXbVff__5ocL_8Z79w4Lmwk3olVaOSNd3Bwm9vdGlxs3FdglGliqPKusUSFx7iJWtQWiR3FwgbCsKOr49A8woVUuRtuUfzaV69vDEKUyDIXGf-7mFi4iI4RZ66IfwUOmtzkj7bfXZ8M90s_AhTjzRDEwdCNVF2y4gEAoj87amAu0ZBOUJS_feOGMWgY1w8DyD0Z1TZ37UXxpXbDIo2rxfTZ9k46IF2T52Oo8alB84HgXq9clCS5Tg5vjmx5BObPrfESh4x-Oas4mIulIuDZ4KclykaUjmt8eQDliMulXLGKgOP7XsbdyCPN3aeKPsGSXJ4_0rnZhTK3H8A9X5a_xLZu81SKBxUkboiJxW3JTNEYfGvVZEFleoBEq17Ihuo.IIF70ymcvGZaB7Y1b9hQ4w",
        'refreshTokenKey' => $refresh[0]->refresh_token,
        'RedirectURI' => "https://developer.intuit.com/v2/OAuth2Playground/RedirectUrl",
        'scope' => "com.intuit.quickbooks.accounting",
        'QBORealmID' => "123146125195389",
        'baseUrl' => "Development"
  ));
      $dataService->setLogLocation("/Users/hlu2/Desktop/newFolderForLog");
      
      $oauth2LoginHelper = new OAuth2LoginHelper("Q0eILqeIPs1yrW6PJBfwKDb8XVaRul79PNueDoFiVtq11D8C8C","mYCf1o9PjOU7pq1JjlrOsOE47CfIoFIjv2S0NedN");
$accessTokenObj = $oauth2LoginHelper->
                    refreshAccessTokenWithRefreshToken($refresh[0]->refresh_token);
$accessTokenValue = $accessTokenObj->getAccessToken();
$refreshTokenValue = $accessTokenObj->getRefreshToken();


echo "Access Token is:";
print_r($accessTokenValue);
echo "RefreshToken Token is:";
print_r($refreshTokenValue);



}



public function update_item(){

    $dataService = DataService::Configure(array(
        'auth_mode' => 'oauth2',
        'ClientID' => "Q0eILqeIPs1yrW6PJBfwKDb8XVaRul79PNueDoFiVtq11D8C8C",
        'ClientSecret' => "mYCf1o9PjOU7pq1JjlrOsOE47CfIoFIjv2S0NedN",
        'accessTokenKey' =>  "eyJlbmMiOiJBMTI4Q0JDLUhTMjU2IiwiYWxnIjoiZGlyIn0..7Bw-sA5zcUYSgWcSVisdxQ.XDWcfxIXfojmgJtE0jGSXLwaGNH17SchavNKrvt78rumzsW4lbqSxhQCrGnX9GwB_d8L4k-THi--NTUiS0x_D5BHpQFEt4Z_22VEIDN9j6kg6uvWgxnDrxA2CP6k-TmQSVhYW527DtPfRfjHsZZ4DCYDyz3i6Fjq_lwxkKzZCiaamnqzSp8GMSRI8EFdk8vyVEpDQbYx6NuElXzWte2s6UfsXpYG7h73_D8wXgtDzYzoStgWVke8h-lSEFlFWdTJQAkdL4kRWMfkyju2T7r1NRbQnn5W-Bgge5kwfIk1e3J--MT0XvitIykLpx9-pCtH8H4IWIoUaGWrz9s7AlRtuw54Rs_pHq6es4f9QXDw5HcqzUtVOuPMED1eZxAThBKhg5qE9wlI3laQsNlC3QDRAOYgwbDBmV3rhvUhR9Ddi1KyLorq_BLVKFArV6ncbajDv3tRWc642oqIDkxth-8vkNdibyjZ2Y6F7OyhOvCJQmL3HCqCeXeeHT4I5T2814MVDqE3TIa9ffCj_lKLxmUDee8eRZGIE-Wa8nu01WVW2964825z5brJMqqXInhkF3C5URW5rSDhkD8ai7hr27pKtSfNb3Z5X71eao5mIV8Jr_fwQITRIDnGwbtDwq6EwcDzj80EULSzYCVOv9GhAwKNMrdCRaW7zh-JzafV5t48IUogC4xBAx4APGaJPo6TnWJ8hCmEf50tgLHtUhOMpsmIbZn-q-nOfW2vANMJE7gvaSw.l9emIEXO0RMFnVhtj_DcDQ",
        'refreshTokenKey' => 'Q011550747100ULeWN30k3otAm2u5eFC0QgwNMT1Q54TMj3pvZ',
        
        'RedirectURI' => "https://developer.intuit.com/v2/OAuth2Playground/RedirectUrl",
        'scope' => "com.intuit.quickbooks.accounting",
        'QBORealmID' => "123146125195389",
        'baseUrl' => "Development"
  ));
    $dataService->setLogLocation("/Users/hlu2/Desktop/newFolderForLog");
$dataService->throwExceptionOnError(true);

$item = $dataService->FindbyId('item', 45);
$theResourceObj = Item::update($item , [
    "Active" => true
]);
$resultingObj = $dataService->Add($theResourceObj);
$error = $dataService->getLastError();
if ($error) {
    echo "The Status code is: " . $error->getHttpStatusCode() . "\n";
    echo "The Helper message is: " . $error->getOAuthHelperError() . "\n";
    echo "The Response message is: " . $error->getResponseBody() . "\n";
}
else {
    echo "Created Id={$resultingObj->Id}. Reconstructed response body:\n\n";
    $xmlBody = XmlObjectSerializer::getPostXmlFromArbitraryEntity($resultingObj, $urlResource);
    echo $xmlBody . "\n";
}
}


}
