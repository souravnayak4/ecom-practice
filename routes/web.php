<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SubadminController;
use App\Http\Controllers\FileUpload;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminproductController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\GoogleController;



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

Auth::routes();
  

// Users Routes

Route::middleware(['auth', 'user-access:user'])->group(function () {
  
    Route::get('/dashboard', [HomeController::class, 'index'])->name('user.dashboard');
});

// Manager Routes

Route::middleware(['auth', 'user-access:manager'])->group(function () {
  
   /*  Route::get('/manager/dashboard', [HomeController::class, 'managerDashboard'])->name('manager.dashboard'); */
   Route::get('/super-admin/dashboard', [HomeController::class, 'superAdminDashboard'])->name('super.admin.dashboard');
});  

// Super Admin Routes

Route::middleware(['auth', 'user-access:super-admin'])->group(function () {
  
    Route::get('/super-admin/dashboard', [HomeController::class, 'superAdminDashboard'])->name('super.admin.dashboard');
    /* Route::get('/super-admin/dashboard/changepassword', [HomeController::class, 'changepassword']); */
});

Route::get('/logout', [HomeController::class, 'logout'])->name('logout');
// admin dashboard


//Route::get('/dashboard', [AdminController::class, 'dashboard']);
Route::get('/orders', [AdminController::class, 'orders']);
Route::get('/category', [AdminController::class, 'category']);

Route::get('/add-category', [AdminController::class, 'add_category']);
Route::post('/save-category', [AdminController::class, 'save_category']);
Route::get('/delete-category/{id}', [AdminController::class, 'delete_category']);



Route::get('/subcategory', [AdminController::class, 'subcategory']);
Route::get('/add-subcategory', [AdminController::class, 'add_subcategory']);
Route::post('/save-subcategory', [AdminController::class, 'save_subcategory']);
Route::get('/delete-subcategory/{id}', [AdminController::class, 'delete_subcategory']);


Route::get('/products-details', [AdminController::class, 'all_products_details']);









Route::get('/adminlogin', [AdminController::class, 'adminlogin'])->name('admin.login');





Route::get('/home', [HomeController::class, 'index'])->name('home');


Route::get('/image-upload', [FileUpload::class, 'createForm']);
Route::post('/image-upload', [FileUpload::class, 'fileUpload'])->name('imageUpload');
 


Route::post('insertData',[AdminController::class,'insert']);


//products

Route::resource('products', ProductController::class);
Route::get('excel-products', [ProductController::class, 'exportproducts']);
Route::get('import-excel-products', [ProductController::class, 'importsproducts']);
Route::post('import-products', [ProductController::class, 'productsexcel'])->name('import-products');

Route::resource('subadmins', SubadminController::class);
Route::get('login', [SubadminController::class, 'subadminindex'])->name('login');
Route::post('postlogin', [SubadminController::class, 'login'])->name('postlogin');




Route::get('/add-admin-product', [AdminproductController::class, 'insert'])->name('product.insert');
Route::post('/add-admin-product', [AdminproductController::class, 'store']);


//frontend start//
Route::prefix('google')->name('google.')->group( function(){
    Route::get('login', [GoogleController::class, 'loginWithGoogle'])->name('login');
    Route::any('callback', [GoogleController::class, 'callbackFromGoogle'])->name('callback');
});
Route::get('/new-user-login', [AuthController::class, 'index'])->name('login');
Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post'); 
Route::get('/new-user-registration', [AuthController::class, 'registration'])->name('register');
Route::post('/store-post-registration', [AuthController::class, 'postRegistration'])->name('register.post');
Route::get('/my-account', [FrontendController::class, 'myaccount']); 
Route::get('/frontend.dashboard', [AuthController::class, 'home']); 
Route::get('logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/index', [FrontendController::class, 'index']);
Route::get('/shop', [FrontendController::class, 'shop']);
Route::get('/about', [FrontendController::class, 'about']);
Route::get('/wishlist', [FrontendController::class, 'wishlist']);
Route::get('/cart', [FrontendController::class, 'cart']);
Route::get('/checkout', [FrontendController::class, 'checkout']);
