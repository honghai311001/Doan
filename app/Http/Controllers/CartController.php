<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Session;
use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
 public function index(){
     return view('fontend/cart');
 }
 public function AddCart(Request $req, $id)
 {
     # code...
     $product = DB::table('db_product')->where('id',$id)->first();
    if ($product != null) {
        # code...
        $oldCart = Session('Cart') ? Session('Cart'):null;
        $newCart = new Cart($oldCart);
        $newCart->AddCart($product,$id);
        $req->session()->put('Cart',$newCart);
        
    }
   
 } 
 
 public function DeleteCart(Request $req, $id)
 {
    $oldCart = Session('Cart') ? Session('Cart'):null;
    $newCart = new Cart($oldCart);
    $newCart->DeleteCart($id);
    if(count($newCart->products)>0){
        $req->Session()->put('Cart',$newCart);
    }
    else{
        $req->Session()->forget('Cart',$newCart);
    }
  return view('fontend/SessionCart');
 } 
 
 public function UpdateCart(Request $req, $id, $sl)
 {
    $oldCart = Session('Cart') ? Session('Cart'):null;
    $newCart = new Cart($oldCart);
    $newCart->UpdateCart($id,$sl);
    $req->Session()->put('Cart',$newCart);
  return view('fontend/SessionCart');    
}
}
