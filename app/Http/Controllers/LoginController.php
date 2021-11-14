<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Session;

class LoginController extends Controller
{
    public function index(){
        return view('fontend/Login');
    }
    public function KTlogin(Request $request)
    {
        $user = DB::table('db_customer')->where('username', '=', $request->userName)->where('password', '=', md5($request->password))->first();
        if($user!=null){    
                   Session::put('nguoi-dung', $user);
                 return redirect()->action([IndexController::class,'index']);   
        }
        else{
            return redirect()->action([LoginController::class,'index'])->with('error',"Sai tài khoản mật khẩu");
        }        
        
     }
     
     public function Logout(Request $request)
    {
        if(session::has('nguoi-dung'))
        {
            session::forget('nguoi-dung');
            session::forget('Cart');
            return redirect()->action([IndexController::class,'index']);
        }
    }
    public function AdminIndex()
    {
        return view('backend/component/LoginAdmin');
    }
    public function AdminDB()
    {

        $product = DB::table('db_product')->get()->count();
        $category = DB::table('db_category')->get()->count();
        $order = DB::table('db_order')->get()->count(); 
        $items = DB::table('db_order')->where('status',2)->select('money')->get();
        $sumMoney  = 0;
       
        foreach ($items as $item) {
            $sumMoney +=  $item->money;
        }
       
        return view('backend/dashboard',compact('product','category','order','sumMoney'));
    }
    public function AdminLogin(Request $request)
    {
        $user = DB::table('db_user')->where('username', '=', $request->userName)->where('password', '=', md5($request->password))->first();
        if($user!=null){        
            $request = Session::put('admin',$user);
                return redirect()->action([LoginController::class,'AdminDB']) ;
                // return view('backend/dashboard');       
        }
        else{
            return redirect()->action([LoginController::class,'AdminIndex'])->with('error',"Sai tài khoản mật khẩu");
        }        
    }
    public function LogoutAdmin(Request $request)
    {
        if(session::has('admin'))
        {
            session::forget('admin');         
            return redirect()->action([LoginController::class,'AdminIndex']);
        }
    }

   
   
}
