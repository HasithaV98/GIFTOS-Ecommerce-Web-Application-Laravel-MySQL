<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
Route::get('/',[HomeController::class,'index']);

Route::get('/redirect',[HomeController::class,'redirect'])->middleware('auth','verified');
Route::get('/login', function () {
    return view('auth.login');
})->name('login');
Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::get('addcategory',[AdminController::class,'addcategory']);
Route::post('addedcategory',[AdminController::class,'addedcategory']);
Route::get('/deletecategory/{id}',[AdminController::class,'deletecategory']);
Route::get('addproducts',[AdminController::class,'addproducts']);
Route::get('showproducts',[AdminController::class,'showproducts']);
Route::post('productadd',[AdminController::class,'productadd']);
Route::get('deleteproduct/{id}',[AdminController::class,'deleteproduct']);
Route::get('updateproduct/{id}',[AdminController::class,'updateproduct']);
Route::Post('updatedproduct/{id}',[AdminController::class,'updatedproduct']);
Route::get('productdetails/{id}',[HomeController::class,'productdetails']);
Route::post('addcart/{id}',[HomeController::class,'addcart']);
Route::get('showcart',[HomeController::class,'showcart']);
Route::get('removeitem/{id}',[HomeController::class,'removeitem']);
Route::get('paymentpage',[HomeController::class,'paymentpage']);
Route::get('cash_order',[HomeController::class,'cash_order']);
Route::get('stripe/{totalprice}',[HomeController::class,'stripe']);
Route::post('stripe/{totalprice}',[HomeController::class, 'stripePost'])->name('stripe.post');
Route::get('orders',[AdminController::class,'orders']);
Route::get('showorders',[AdminController::class,'showorders']);
Route::get('delivered/{id}',[AdminController::class,'delivered']);
Route::get('pdf_download/{id}',[AdminController::class,'pdf_download']);
Route::get('sendmail/{id}',[AdminController::class,'sendmail']);
Route::post('send_user_email/{id}',[AdminController::class,'send_user_email']);
Route::get('search',[AdminController::class,'searchdata']);
Route::get('show_order',[HomeController::class,'show_order']);
Route::get('cancel_order/{id}',[HomeController::class,'cancel_order']);
Route::post('send_feedback',[HomeController::class,'send_feedback']);
Route::get('show_feedback',[AdminController::class,'show_feedback']);
Route::get('sendresponse/{id}',[AdminController::class,'sendresponse']);
Route::post('send_response_email/{id}',[AdminController::class,'send_response_email']);
Route::get('searchproduct',[HomeController::class,'searchproduct']);
Route::get('all_products',[HomeController::class,'all_products']);
Route::get('whyus',[HomeController::class,'whyus']);
Route::get('testimonial',[HomeController::class,'testimonial']);
Route::get('contactus',[HomeController::class,'contactus']);
Route::get('product_search',[HomeController::class,'product_search']);







