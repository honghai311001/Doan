<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;
use App\Models\Cart;
class CategoryController extends Controller
{
    public function indexCategory($id)
    {
        $category = DB::table('db_category')->where('status',1)->select('*')->get();
        $categorydetail = DB::table('db_category')->where('id',$id)->select('*')->first();
        $items = DB::table('db_product')->where('catid',$id)->where('status',1)->orderBy('id','DESC')->get();
        return view('fontend/modules/category/category',compact('items','category','categorydetail'));
    }
}
