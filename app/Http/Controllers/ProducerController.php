<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Producer;
use Carbon\Carbon;
use Session;
class ProducerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = DB::table('db_producer')->select('*')->get();

       return view('backend/Producer/index',compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend/Producer/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $producer = new Producer;
      $producer->name = $request->name;
      $producer->code = $request->code;
      $producer->keyword = $request->keyword;
      $producer->created_at = Carbon::now();
      $producer->created_by = 1;
      $producer->modified = Carbon::now();
      $producer->modified_by = 1;
      $producer->status = $request->status;
      $producer->trash = 1;
      $producer->save();
      return Redirect()->action([ProducerController::class,'index']);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $items = Producer::find($id);
        return view('backend/Producer/edit',compact('items'));
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
        $producer = Producer::find($id);
        $producer->name = $request->name;
        $producer->code = $request->code;
        $producer->keyword = $request->keyword;
        $producer->created_at = Carbon::now();
        $producer->created_by = 1;
        $producer->modified = Carbon::now();
        $producer->modified_by = 1;
        $producer->status = $request->status;
        $producer->trash = 1;
        $producer->save();
      return Redirect()->action([ProducerController::class,'index'])->with('success','Sửa sản phẩm thành công.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $producer = Producer::find($id);
        $producer->delete();
        return   redirect()->action([ProducerController::class,'index'])->with('success','Dữ liệu xóa thành công.');
    }
}
