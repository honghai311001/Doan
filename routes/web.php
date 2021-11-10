<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Trang chủ
Route::get('/',[IndexController::class,'index']); 
//Login
Route::get('/login',[LoginController::class,'index'])->name('Login.index');
Route::post('/KTlogin',[LoginController::class,'KTlogin']);
Route::get('/log-out',[LoginController::class,'Logout']);
Route::get('/log-out-admin',[LoginController::class,'LogoutAdmin']);
//Đăng kí
Route::get('/sign-up',[RegisteredUserController::class,'index'])->name('Signup.index');
Route::post('/Register',[RegisteredUserController::class,'Register']);





Route::get('/productInfo', function () {
    return view('fontend/Product-info');
});


Route::get('/san-pham/{name}',[FeProductController::class,'show']);

// backend
Route::get('/admin',[LoginController::class,'AdminIndex'])->name('admin.index');
Route::post('/AdminLogin',[LoginController::class,'AdminLogin'])->name('admin.login');
Route::get('/DashBoard',[LoginController::class,'AdminDB']);
Route::get('adlogin', function () {
    return view('backend/Login/login');
})->name('auth.login');




Route::get('admin/Lproduct',[ListProductController::class,'index'])->name('lproduct.index');
Route::get('admin/Lproduct/create',[ListProductController::class,'create'])->name('lproduct.create');


Route::get('admin/producer', [ProducerController::class,'index'])->name('producer.index');
Route::get('admin/producer/create', [ProducerController::class,'create'])->name('producer.create');
Route::post('admin/producer/store', [ProducerController::class,'store']);
Route::get('admin/producer/edit/{id}', [ProducerController::class,'edit']);
Route::post('admin/producer/update/{id}', [ProducerController::class,'update']);
Route::get('/admin/producer/delete/{id}',[ProducerController::class,'destroy']);

Route::get('admin/product', [ProductController::class,'index'])->name('product.index');
Route::get('admin/product/create', [ProductController::class,'create'])->name('product.create');
Route::get('admin/product/edit/{id}', [ProductController::class,'edit']);
Route::patch('admin/product/update/{id}', [ProductController::class,'update']);
Route::post('/admin/product/store',[ProductController::class,'store']);
Route::get('/admin/product/delete/{id}',[ProductController::class,'destroy']);


Route::get('admin/customer',[CustomerController::class,'index'])->name('customer.index');
Route::get('admin/contact', [ContactController::class,'index'])->name('contact.index');
Route::get('admin/discount', [DiscountController::class,'index'])->name('discount.index');
Route::get('admin/discount/create', [DiscountController::class,'create'])->name('discount.create');
Route::get('/admin/discount/edit/{id}', [DiscountController::class,'edit']);
Route::post('/admin/discount/store',[DiscountController::class,'store']);
Route::post('/admin/discount/update/{id}',[DiscountController::class,'update']);
Route::get('/admin/discount/delete/{id}', [DiscountController::class,'destroy']);


//Giỏ hàng
Route::get('/cart',[CartController::class,'index']);
Route::get('/addCart/{id}', [CartController::class,'AddCart']);
Route::get('/delete/{id}', [CartController::class,'DeleteCart']);
Route::get('/update/{id}/{sl}', [CartController::class,'UpdateCart']);
Route::get('/Checkout',[OrderController::class,'index']);
Route::post('/order',[OrderController::class,'saveOrder']);
Route::get('/listOrder',[OrderController::class,'AdminOrder']);
Route::get('/listOrder/thanhtoan/{id}',[OrderController::class,'SubmitOrder']);
Route::get('/trackOrder',[OrderController::class,'TrackOrder']);
Route::get('/trackOrder/Info/{id}',[OrderController::class,'TrackOrderInfo']);


// Danh mục//
Route::get('/category/{orders}',[CategoryController::class,'indexCategory']);
