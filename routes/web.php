<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SubadminController;
use App\Http\Controllers\FileUpload;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\FrontendController;




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

//product and category section
//Route::get('/dashboard', [AdminController::class, 'dashboard']);
Route::get('/orders', [AdminController::class, 'orders']);

Route::get('/subcategory', [AdminController::class, 'subcategory']);
Route::get('/subcategory-trash', [AdminController::class, 'trash']);
Route::get('/add-subcategory', [AdminController::class, 'add_subcategory']);
Route::post('/save-subcategory', [AdminController::class, 'save_subcategory']);
Route::get('/delete-subcategory/{id}', [AdminController::class, 'delete_subcategory']);
Route::get('/products-details', [AdminController::class, 'all_products_details']);
Route::get('/update-product-subcategory/{id}', [AdminController::class, 'editProductssubcategory'])->name('products.update-subcategory');
Route::post('/update-product-subcategory', [AdminController::class, 'updateProductssubcategory']);








Route::get('/adminlogin', [AdminController::class, 'adminlogin'])->name('admin.login');
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/image-upload', [FileUpload::class, 'createForm']);
Route::post('/image-upload', [FileUpload::class, 'fileUpload'])->name('imageUpload');
Route::post('insertData',[AdminController::class,'insert']);


////product and category section
Route::get('/all-category', [ProductController::class, 'category']);
Route::get('/category-trash', [ProductController::class, 'trash']);
 Route::get('/trash-products-category/{id}', [ProductController::class, 'trash_category']);
 Route::get('/add-products-category', [ProductController::class, 'addProductscategory']);
Route::post('/save-products-category', [ProductController::class, 'saveProductsCategory']);
Route::get('/delete-products-category/{id}', [ProductController::class, 'delete_category']);
Route::get('/update-product-category/{id}', [ProductController::class, 'editProductscategory'])->name('products.update-category');
Route::post('/update-product-category', [ProductController::class, 'updateProductscategory']);

Route::resource('products', ProductController::class);
Route::get('excel-products', [ProductController::class, 'exportproducts']);
Route::get('import-excel-products', [ProductController::class, 'importsproducts']);
Route::post('import-products', [ProductController::class, 'productsexcel'])->name('import-products');
//product and category section
Route::resource('subadmins', SubadminController::class);
Route::get('login', [SubadminController::class, 'subadminindex'])->name('login');
Route::post('postlogin', [SubadminController::class, 'login'])->name('postlogin');
//frontend start////user login system
Route::get('/new-user-login', [AuthController::class, 'index'])->name('login');
Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post');
Route::get('/new-user-registration', [AuthController::class, 'registration'])->name('register');
Route::post('/store-post-registration', [AuthController::class, 'postRegistration'])->name('register.post');
/* Route::group(['middleware' => ["auth:customer", "verified"]], function () { */    
Route::get('/my-account', [FrontendController::class, 'myaccount']);
Route::get('/update-my-account', [FrontendController::class, 'updatemyaccount']);
Route::put('/update-my-account/{id}', [AuthController::class, 'myaccountupdate']);   
Route::get('signout', [AuthController::class, 'signOut'])->name('signout');
/* }); *//*
 Route::get('/frontend.dashboard', [AuthController::class, 'home']);  */
 Route::get('/index', [FrontendController::class, 'index']);
 Route::get('/about', [FrontendController::class, 'about']);
 Route::get('/search', [FrontendController::class, 'searchdata']);
 Route::get('/shop', [FrontendController::class, 'shop']);
 Route::get('/product-details/{id}', [FrontendController::class, 'product_details']);
 Route::get('/wishlist', [FrontendController::class, 'wishlist']);
 Route::post('/add_cart/{id}', [FrontendController::class, 'add_cart']);
 Route::get('/show_cart', [FrontendController::class, 'show_cart']);
 Route::get('/remove_cart/{id}', [FrontendController::class, 'remove_cart']);
 Route::get('/cash_order', [FrontendController::class, 'cash_order']);
 