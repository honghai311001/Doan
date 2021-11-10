<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
class ListProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   
    public function index()
    {
        $items = DB::table('db_category')->orderBy('id','DESC')->paginate(6); 
        return view('backend/Lproduct/index',compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('backend/Lproduct/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cate = DB::table('db_category')->where('name',$request->cateName)->first();
        if($cate==null)
        {
            $data = new Category;
            $data->name = $request->cateName;
            $data->link = $request->cateName;
            $data->level = 1;
            $data->parentid = 0;
            $data->orders = 1;
            $data->created_at = Carbon::now();
            $data->created_by = 1;
            $data->updated_at = Carbon::now();
            $data->updated_by = 2;
            $data->trash = 1;
            $data->status = 1;
            $data->save();
            return redirect()->action([ListProductController::class,'index'])->with('success',"Danh mục đã thêm thành công");
        }
        else
        {
            return redirect()->action([ListProductController::class,'create'])->with('error',"Danh mục đã tồn tại");
        }
        
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
        //
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
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Category::find($id);
        $data->delete();
        return redirect()->action([ListProductController::class,'index'])->with('success',"Danh mục đã xóa");  
    }
}
