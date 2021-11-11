<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Session;
use App\Models\Product;
use App\Models\Order;
use App\Models\Orderdetail;
use Carbon\Carbon;
use Illuminate\Support\Str;

class OrderController extends Controller
{
    public function index()
    {
        $category = DB::table('db_category')->select('*')->get();
        return view('fontend/Checkout',compact('category'));
    }
    public function saveOrder(Request $request)
    {
        $user = $request->session()->get('nguoi-dung');
        $cart = $request->session()->get('Cart');

        $data = new Order;
        $data->orderCode = Str::random(8);
        $data->customerid = $user->id;
        $data->orderdate =  Carbon::now();
        $data->fullname = $user->fullname;
        $data->phone = $user->phone;
        $data->money = $cart->totalPrice;
        $data->price_ship = 0;
        $data->coupon = 0;
        $data->province = 79;
        $data->district = 761;
        $data->address = $request->address;
        $data->trash = 1;
        $data->status = 1;
        $data->save();
       

        $id = DB::table('db_order')->max('id');

        foreach ($cart->products as $item) {
            DB::table('db_orderdetail')->insert([
                'orderid' => $id,
                'productid' => $item['productInfo']->id,
                'count'=>$item['quanty'],
                'price'=>$item['productInfo']->price_sale,
                'trash'=>1,
                'status'=>1
            ]);
        }
        $request->Session()->forget('Cart');
        return Redirect()->action([OrderController::class,'TrackOrder']);
    }

    public function AdminOrder()
    {
        $items = DB::table('db_order')->orderBy('id','DESC')->paginate(6); 
        return view('backend/Order/index',compact('items'));
    }
    public function SubmitOrder($id)
    {
        $items = new Order;
        $items = DB::table('db_order')->where('orderCode',$id)->update(['status' => 2]);
        
       return redirect()->action([OrderController::class,'AdminOrder']);
    }
    public function TrackOrder(Request $req)
    {
        $user = $req->session()->get('nguoi-dung');
        // $items = DB::table('db_product')->orderBy('id','DESC')->paginate(6); 
        $items = DB::table('db_order')->where('customerid', $user->id )->orderBy('id','DESC')->get();
        $category = DB::table('db_category')->select('*')->get();
        
        return view('fontend/Order/trackOrder',compact('items','category'));
    }
    public function TrackOrderInfo($id)
    {
        // $user = $req->session()->get('nguoi-dung');
        // $items = DB::table('db_product')->orderBy('id','DESC')->paginate(6); 
        $category = DB::table('db_category')->select('*')->get();
        $items = DB::table('db_orderdetail')->where('orderid', $id )->orderBy('orderid','DESC')
        ->leftJoin('db_product', 'db_orderdetail.productid', '=', 'db_product.id')
        ->get();
        return view('fontend/Order/trackOrderInfo',compact('items','category'));
    }
}
