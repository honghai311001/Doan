<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\File; 
use Illuminate\Support\Str;

class IndexController extends Controller
{
 
   public function index()  
   {
      $category = DB::table('db_category')->where('status',1)->select('*')->get();
      $items = Product::where('status', '=', 1)->orderBy('id','DESC')->paginate(6);     
   return view('/fontend/index',compact('items','category'));
  
   }

  
}
