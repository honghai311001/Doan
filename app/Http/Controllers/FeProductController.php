<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


class FeProductController extends Controller
{
    public function show($id)
    {
        $items = DB::table('db_product')->where('id', $id)->get();
         return view('fontend/Product-info',compact('items'));
        
    }
}
