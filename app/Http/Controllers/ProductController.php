<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\File; 
use Illuminate\Support\Str;
use Carbon\Carbon;
use Session;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $items = DB::table('db_product')->select('*')->get();
        
        $items = DB::table('db_product')->orderBy('id','DESC')->paginate(6); 
        return view('backend/Product/index',compact('items',));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $category = DB::table('db_category')->select('*')->get();
        $producer =DB::table('db_producer')->select('*')->get();
        return view('backend/Product/create',compact('category','producer'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
    
           ]);
           $imageName = $request->file('image')->getClientOriginalName();
           $request->file('image')->move(public_path('images/products'),$imageName);
       $product = new Product;
       $product->avatar = $imageName;
       $product->name = $request->name;
       $product->producer = $request->producer;
       $product->catid = $request->catid;
       $product->alias = $request->name;
       $product->number_buy = 0;
       $product->img = $imageName;
       $product->detail = $request->detail;
       $product->sortDesc = $request->sortDesc;
       $product->number = $request->number;
       $product->sale = $request->sale_of;
       $product->price = $request->price_root;
       $product->price_sale = $request->price_buy;
       $product->created =  Carbon::now();
       $product->created_by = 1;
       $product->modified =  Carbon::now();
       $product->modified_by = 1;
       $product->trash = 1;
       $product->status = $request->status;
       $product->save();
       return Redirect()->action([ProductController::class,'index']);
    }
    public function checked($id)
    {
       
        $data = Product::find($id);
        if($data->status == 1)
        {
            $data->status = 0;
        }
        else{
            $data->status = 1;
        }
        $data->save();
        return redirect()->action([ProductController::class,'index']);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $request->session()->get('key');
       $items =DB::table('db_product')->select('*')->get();
       return view('fontend/Product-info',compact('items'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = DB::table('db_category')->select('*')->get();
        $producer =DB::table('db_producer')->select('*')->get();
        $items = Product::find($id);
       return view('backend/Product/edit',compact('items','category','producer'));
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
        $product = Product::find($id);
        $product->name = $request->name;
       $product->producer = $request->producer;
       $product->catid = $request->catid;
       $product->alias = $request->name;
       $product->number_buy = 0;
     
       $product->detail = $request->detail;
       $product->sortDesc = $request->sortDesc;
       $product->number = $request->number;
       $product->sale = $request->sale_of;
       $product->price = $request->price_root;
       $product->price_sale = $request->price_buy;
       $product->created =  Carbon::now();
       $product->created_by = 1;
       $product->modified =  Carbon::now();
       $product->modified_by = 1;
       $product->trash = 1;
       $product->status = $request->status;
       $product->save();
       return Redirect()->action([ProductController::class,'index']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $img =Product::find($id);
        $image_path = public_path('images/products/').$img->img;
        $row = DB::table('db_orderdetail')->where('productid','=',$id)->count();
        if($row > 0){
            
         return redirect()->action([ProductController::class,'index'])->with('error',"Đã có khách đặt hàng, không thể xóa sản phẩm");
        }
        if(file_exists($image_path))
        {
            file::delete($image_path);
        }
        $data = Product::find($id);
        $data->delete();
        return   redirect()->action([ProductController::class,'index'])->with('success','Dữ liệu xóa thành công.');
        
        
      
    }

}
