<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Cart 
{
    public $products = null;
    public $totalPrice = 0;
    public $totalQuanty = 0;

    public function __construct($cart)
    {
        if($cart)
        {
            $this->products = $cart->products;
            $this->totalPrice= $cart->totalPrice;
            $this->totalQuanty = $cart->totalQuanty;
        }

    }



    public function AddCart($product,$id)
    {
        $newProduct = ['quanty' => 0,'price' => $product->price,'productInfo'=>$product];
        
        if ($this->products) {
           if (array_key_exists($id,$this->products)) {
               $newProduct = $this->products[$id];
            }
            }
            $newProduct['quanty']++;
            $newProduct['price'] = $newProduct['quanty']* $product->price_sale;
            $this->products[$id] = $newProduct;
            $this->totalPrice += $product->price_sale;
            $this->totalQuanty++;
        
    }
    public function DeleteCart($id)
    {
        $this->totalQuanty-=$this->products[$id]['quanty'];
        $this->totalPrice -=$this->products[$id]['price'];
        unset($this->products[$id]);
    }
    public function UpdateCart($id,$sl)
    {
        $this->totalQuanty -= $this->products[$id]['quanty'];
        $this->totalPrice -=$this->products[$id]['price'];
        $this->products[$id]['quanty'] = $sl; 
        $this->products[$id]['price'] = $sl*$this->products[$id]['productInfo']->price_sale;
        $this->totalQuanty += $this->products[$id]['quanty'];
        $this->totalPrice +=$this->products[$id]['price'];
    }
}
?>