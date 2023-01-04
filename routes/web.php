<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SubadminController;
use App\Http\Controllers\FileUpload;
use App\Http\Controllers\ProductController;

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
  
    Route::get('/manager/dashboard', [HomeController::class, 'managerDashboard'])->name('manager.dashboard');
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
/* Route::get('add', [AdminController::class, 'addcategory']);
Route::post('add', [AdminController::class, 'addData']); */
Route::get('/add-category', [AdminController::class, 'add_category']);
Route::post('/save-category', [AdminController::class, 'save_category']);
Route::get('/delete-category/{id}', [AdminController::class, 'delete_category']);



Route::get('/subcategory', [AdminController::class, 'subcategory']);
Route::get('/add-subcategory', [AdminController::class, 'add_subcategory']);
Route::post('/save-subcategory', [AdminController::class, 'save_subcategory']);
/* Route::get('/subcategory/addsubcategory', [AdminController::class, 'addsubcategory']);
Route::post('/subcategory/addsubcategory', [AdminController::class, 'save_subcategory']); */
/* Route::get('/products', [AdminController::class, 'all_products']);
Route::get('/add-products', [AdminController::class, 'add_products']);
Route::post('/add-products', [AdminController::class, 'add_products']);
Route::post('/add-products', [AdminController::class, 'save_products']); */

Route::get('/products-details', [AdminController::class, 'all_products_details']);





Route::get('/tracking', [AdminController::class, 'tracking']);
Route::get('/subadmin', [AdminController::class, 'subadmin']);



Route::get('/adminlogin', [AdminController::class, 'adminlogin'])->name('admin.login');



// subadmin dashboard
Route::get('/subdashboard', [SubadminController::class, 'dashboard']);
Route::get('/subadminlogin', [SubadminController::class, 'subadminlogin']);
Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');


Route::get('/image-upload', [FileUpload::class, 'createForm']);
Route::post('/image-upload', [FileUpload::class, 'fileUpload'])->name('imageUpload');
 


Route::post('insertData',[AdminController::class,'insert']);




Route::resource('products', ProductController::class);