<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Discount;
use Carbon\Carbon;
class DiscountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = DB::table('db_discount')->orderBy('id','DESC')->paginate(6); 
        return view('backend/Discount/index',compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend/Discount/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $discount = new Discount;
      $discount->code = $request->code;
      $discount->discount = $request->discount;
      $discount->limit_number = $request->limit_number;
      $discount->payment_limit = $request->payment_limit;
      $discount->expiration_date = $request->expiration_date;
      $discount->description = $request->description;
      $discount->number_used = 0;
      $discount->created = Carbon::now();
      $discount->orders = 1;
      $discount->trash = 1;
      $discount->status = $request->status;
      $discount->save();
      return Redirect()->action([DiscountController::class,'index'])->with('success','Dữ liệu thêm thành công.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $items  = Discount::find($id);
        return view('backend/Discount/edit',compact('items'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $discount = Discount::find($id);
        $discount->code = $request->code;
        $discount->discount = $request->discount;
        $discount->limit_number = $request->limit_number;
        $discount->payment_limit = $request->payment_limit;
        $discount->expiration_date = $request->expiration_date;
        $discount->description = $request->description;
        $discount->number_used = 0;
        $discount->created = Carbon::now();
        $discount->orders = 1;
        $discount->trash = 1;
        $discount->status = $request->status;
        $discount->save();
        return Redirect()->action([DiscountController::class,'index'])->with('success','Dữ liệu sửa thành công.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Discount::find($id);
        $data->delete();
        return Redirect()->action([DiscountController::class,'index'])->with('success','Dữ liệu xóa thành công.');
    }
}
