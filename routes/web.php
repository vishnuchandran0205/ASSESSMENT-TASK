<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\FrontEndController;

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


Route::get('/admin_panel', [LoginController::class, 'Login_page']);
Route::post('/login_check', [LoginController::class, 'login_check']);

Route::get('/admin_home', [AdminController::class, 'admin_home']);



Route::get('/add_category', [AdminController::class, 'add_categoryform']);
Route::post('/store_category_data', [AdminController::class, 'store_category_data']);

Route::get('/view_category', [AdminController::class, 'view_category']);

Route::get('/update_form{id}', [AdminController::class, 'update_form']);
Route::post('/update_category_data', [AdminController::class, 'update_category_data']);

Route::get('/delete_cat{id}', [AdminController::class, 'delete_cat']);


Route::get('/add_product', [AdminController::class, 'add_product']);
Route::post('/store_product_data', [AdminController::class, 'store_product_data']);

Route::get('/view_product', [AdminController::class, 'view_product']);

Route::get('/product_update{id}', [AdminController::class, 'product_update']);
Route::post('/product_update', [AdminController::class, 'product_update_new']);

Route::get('/delete_products{id}', [AdminController::class, 'delete_products']);



//front-end
Route::get('/', [FrontEndController::class, 'main_panel']);
Route::get('/view_product', [FrontEndController::class, 'view_product']);
Route::post('/add_cart', [FrontEndController::class, 'add_cart']);

Route::get('/send_msg', [FrontEndController::class, 'send_msg']);