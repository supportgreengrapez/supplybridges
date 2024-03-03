<?php

namespace App;
use Session;

class Cart
{
 
    public $items = null;
    public $totalQty = 0;
    public $totalPrice=0;
   
    public function __construct($oldCart)
    {
        if($oldCart)
        {
            
            $this->items = $oldCart->items;
            $this->totalQty = $oldCart->totalQty;
            $this->totalPrice = $oldCart->totalPrice;
            
        }
    }

 
   public function remove($id,$qty)
    {
        
      
        
       // $this->items[$id]['qty'];
         $this->totalQty -= 1;
        //   $this->totalPrice =  $this->totalPrice - ($this->items[$id]['price'] * $qty);
      
          //  $this->totalQty -= $this->items[$id]['qty'];
        $this->totalPrice -= $this->items[$id]['price'];
        unset($this->items[$id]);
        return true;
    }
    
   public function add($item,$id,$size,$q,$p)
    {
        
        $storedItem = ['qty'=>$q,'price'=>$p,'product_price'=>$p,'save'=>0,'item'=>$item,'size'=>$size];
        $id = $id.$size;
        if($this->items)
        {
           
            if(array_key_exists($id,$this->items))
            {
                     //   $this->totalQty -= $this->items[$id]['qty'];
                     $this->totalQty--;
        $this->totalPrice -= $this->items[$id]['price'];
        unset($this->items[$id]);
      //   $this->totalQty++;
                $storedItem['price'] = $p * $storedItem['qty'];
             //   $storedItem= $this->items[$id];
            }
        }
        
        
       
       // $storedItem['qty']++;
        $storedItem['price'] = $p * $storedItem['qty'];
        $this->items[$id] = $storedItem;
        $this->totalQty++;
        $this->totalPrice += $storedItem['price'];

      
       
    }

    public function discount($item,$id,$size)
    {
        $discount =($item->price*$item->percentage)/100;
    
        $discount_price = $item->price - $discount;
        $storedItem = ['qty'=>0,'price'=>$discount_price,'save'=>$discount,'item'=>$item,'size'=>$size];
        $id = $id.$size;
        if($this->items)
        {
           
            if(array_key_exists($id,$this->items))
            {
                
                $storedItem= $this->items[$id];
            }
        }
        
        
       
        $storedItem['qty']++;
        $storedItem['price'] = $discount_price * $storedItem['qty'];
        $this->items[$id] = $storedItem;
        $this->totalQty++;
        $this->totalPrice += $discount_price;

   
       
    }

 


}

