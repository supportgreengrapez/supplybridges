<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Session;

use Illuminate\Http\Request;

class riderController extends Controller
{
    public  function rider_login_view() {
      
      
        
        return view('rider.login');
    
  
}

public function index(Request $request)
{
   
    $this->validate($request,['username' => 'required','password'=> 'required']);
    $password= md5($request->input('password'));
     $username= $request->input('username');
     $result = DB::select("select* from rider_details where username = '$username' and password='$password'");
    
     if(count($result)>0){
        $request->session()->put('username',$username);
           session()->put('fname',$result[0]->fname);
             session()->put('lname',$result[0]->lname);
            
        $request->session()->put('type','rider');
        $result = DB::select("select * from order_table where rider = '$username' and (status = '0' or status = '1' ) ");

        return view('rider.home',compact('result'));
    }
    else
    {
        return Redirect::back()->withErrors('Username or Password is incorrect');
    }
}


public function active_order_detail_view($id) {

    if(!(session()->has('type') && session()->get('type')=='rider'))
    {
        return redirect('/rider');
    }


    $result = DB::select("select* from order_table where pk_id = '$id'");
    $result3 = DB::select("select* from rider_details");

    $o_id = $result[0]->user_id;
    if(empty($o_id))
    {
    $result1 = DB::select("select * from detail_table where order_id = '$id'"); 
  
       
       
    return view('rider.active_order_detail_view',compact('result','result1','result3'));
  
    

    }
else
{
$result = DB::select("select order_table.pk_id,address_table.fname,address_table.lname,order_table.amount,address_table.address,order_table.status,address_table.phone from order_table,address_table where order_table.shipment_address_id=address_table.pk_id and order_table.pk_id = '$id'");
$result1 = DB::select("select * from detail_table where order_id = '$id'"); 
    return view('rider.active_order_detail_view',compact('result','result1','result3')); 
}
   }

   public function active_order_view() {

    if(!(session()->has('type') && session()->get('type')=='rider'))
    {
        return redirect('/rider');
    }


 //$result = DB::select("select order_table.pk_id,order_table.fname,order_table.lname,address_table.fname,address_table.lname,order_table.amount,order_table.placed_at from order_table,address_table where order_table.shipment_address_id=address_table.pk_id or order_table.status = '0'");


 $username = session()->get('username');

 $result = DB::select("select * from order_table where rider = '$username' and (status = '0' or status = '1' ) ");


 return view('rider.active_order_view',compact('result'));

}


   public function rider_cash() {

    if(!(session()->has('type') && session()->get('type')=='rider'))
    {
        return redirect('/rider');
    }
 //$result = DB::select("select order_table.pk_id,order_table.fname,order_table.lname,address_table.fname,address_table.lname,order_table.amount,order_table.placed_at from order_table,address_table where order_table.shipment_address_id=address_table.pk_id or order_table.status = '0'");


 $username = session()->get('username');

 $result = DB::select("select * from order_table where rider = '$username' and (status = '0' or status = '4') and payment_received IS NULL ");


 return view('rider.cash_view',compact('result'));

}



   public function rider_cash_list_view() {

    if(!(session()->has('type') && session()->get('type')=='rider'))
    {
        return redirect('/rider');
    }
 //$result = DB::select("select order_table.pk_id,order_table.fname,order_table.lname,address_table.fname,address_table.lname,order_table.amount,order_table.placed_at from order_table,address_table where order_table.shipment_address_id=address_table.pk_id or order_table.status = '0'");
 $username = session()->get('username');

 $result = DB::select("select * from order_table where rider = '$username' and (status = '0' or status = '4') and payment_received IS NOT NULL ");


 return view('rider.payment_received_list_view',compact('result'));

}

public function update_order_status(Request $request)
{

 if(!(session()->has('type') && session()->get('type')=='rider'))
 {
     return redirect('/rider');
 }
 $id = $request->input('id');
   DB::table('order_table')->where('pk_id', $request->input('id'))->update(['status' =>$request->input('status')]);
  
     
    
         
     return URL('/')."/rider/home/view/active/orders";
}

   public function rider_home() {
    if(!(session()->has('type') && session()->get('type')=='rider'))
    {
        return redirect('/rider');
    }

    $username = session()->get('username');

    $result = DB::select("select * from order_table where rider = '$username' and (status = '0' or status = '1' ) ");


    return view('rider.home',compact('result'));
   
}

public function complete_order_list_view() {
    if(!(session()->has('type') && session()->get('type')=='rider'))
    {
        return redirect('/rider');
    }
    $username = session()->get('username');
    $result = DB::select("select* from order_table where rider = '$username' and status = '4'");
    return view('rider.complete_order_list_view',compact('result')); 
   }


   public function complete_order_detail_view($id) {

    if(!(session()->has('type') && session()->get('type')=='rider'))
    {
        return redirect('/rider');
    }
    $result = DB::select("select* from order_table where pk_id = '$id'");

    $o_id = $result[0]->user_id;
    if(empty($o_id))
    {
    $result1 = DB::select("select * from detail_table where order_id = '$id'"); 
  
       
       
    return view('rider.complete_order_detail_view',compact('result','result1'));
  
    

    }
else
{
$result = DB::select("select order_table.pk_id,address_table.fname,address_table.lname,order_table.amount,address_table.address,order_table.status,address_table.phone from order_table,address_table where order_table.shipment_address_id=address_table.pk_id and order_table.pk_id = '$id'");
$result1 = DB::select("select * from detail_table where order_id = '$id'"); 
    return view('rider.complete_order_detail_view',compact('result','result1')); 
}
   }


   public function cancel_order_detail_view($id) {

    if(!(session()->has('type') && session()->get('type')=='rider'))
    {
        return redirect('/rider');
    }
    $result = DB::select("select* from order_table where pk_id = '$id'");

    $o_id = $result[0]->user_id;
    if(empty($o_id))
    {
    $result1 = DB::select("select * from detail_table where order_id = '$id'"); 
  
       
       
    return view('rider.cancel_order_detail_view',compact('result','result1'));
  
    

    }
else
{
$result = DB::select("select order_table.pk_id,address_table.fname,address_table.lname,order_table.amount,address_table.address,order_table.status,address_table.phone from order_table,address_table where order_table.shipment_address_id=address_table.pk_id and order_table.pk_id = '$id'");
$result1 = DB::select("select * from detail_table where order_id = '$id'"); 
    return view('rider.cancel_order_detail_view',compact('result','result1')); 
}
   }

   public function return_order_detail_view($id) {
    if(!(session()->has('type') && session()->get('type')=='rider'))
    {
        return redirect('/rider');
    }

    $result = DB::select("select* from order_table where pk_id = '$id'");

    $o_id = $result[0]->user_id;
    if(empty($o_id))
    {
    $result1 = DB::select("select * from detail_table where order_id = '$id'"); 
  
       
       
    return view('rider.return_order_detail_view',compact('result','result1'));
  
    

    }
else
{
$result = DB::select("select order_table.pk_id,address_table.fname,address_table.lname,order_table.amount,address_table.address,order_table.status,address_table.phone from order_table,address_table where order_table.shipment_address_id=address_table.pk_id and order_table.pk_id = '$id'");
$result1 = DB::select("select * from detail_table where order_id = '$id'"); 
    return view('rider.return_order_detail_view',compact('result','result1')); 
}
   }

   public function cancel_order_list_view() {

    if(!(session()->has('type') && session()->get('type')=='rider'))
    {
        return redirect('/rider');
    }
    $username = session()->get('username');
    $result = DB::select("select* from order_table where rider = '$username' and status = '2'");
    return view('rider.canceled_order_list_view',compact('result')); 
   }

   public function return_order_list_view() {


    if(!(session()->has('type') && session()->get('type')=='rider'))
    {
        return redirect('/rider');
    }

    $username = session()->get('username');
    $result = DB::select("select* from order_table where rider = '$username' and status = '3' ");
    return view('rider.return_order_list_view',compact('result')); 
   }
   
   
     public function cash_received(Request $request) {

      if(!(session()->has('type') && session()->get('type')=='rider'))
    {
        return redirect('/rider');
    }
            
               $username = session()->get('username');
            $order_id = $request->input('order_id');
    
            $payment = $request->input('payment_received');
          
   
          
        $chk = $request->input('checkbox');
 
        
            foreach($chk as $chks)
            {
        
            $users = DB::table('order_table')->where([['pk_id',$order_id[$chks]],['rider',$username]])->update(['payment_received' => $payment[$chks]]);
           
                             
            }
        
        
            return redirect()->back();
          
                    
                 }


}
