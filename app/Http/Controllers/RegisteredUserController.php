<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Users;
use App\Models\Customer;
use Carbon\Carbon;

class RegisteredUserController extends Controller
{
    
    public function index()
    {
        return view('fontend/Signup');     
    }
    public function Register(Request $req)
    {
        $user = DB::table('db_customer')->where('username', '=', $req->userName)->select('*')->get();
        $email = DB::table('db_customer')->where('email', '=', $req->Email)->select('*')->get();
       
        if(count($user)>0)
        { 
            return redirect()->action([RegisteredUserController::class,'index'])->with('error',"Tên đăng nhập đã sử dụng");     
        }
        if(count($email)>0)
        { 
            return redirect()->action([RegisteredUserController::class,'index'])->with('error',"Email đã tồn tại");     
        }
        if ($req->password != $req->rePassword) {
            return redirect()->action([RegisteredUserController::class,'index'])->with('error',"Nhập lại mật khẩu không đúng");
        }
        $data = new Customer;
        $data->fullname = $req->fullName;
        $data->username = $req->userName;
        $data->email = $req->Email;
        $data->address = $req->address;
        $data->phone = $req->phone; 
        $data->password = md5($req->password);
        $data->created = Carbon::now();
        $data->trash  = 1;
        $data->status = 1;
        $data->role = 2;
        $data->save();
        return redirect()->action([LoginController::class,'index']);
    }
}
