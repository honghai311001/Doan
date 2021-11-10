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
        $items = DB::table('db_product')->where('catid',$id)->get();
        return view('fontend/modules/category/category',compact('items'));
    }
}
