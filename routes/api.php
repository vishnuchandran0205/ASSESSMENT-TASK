<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\CategoryController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/get_category', [CategoryController::class, 'get_category']);

Route::get('/get_category/{category_id}', [CategoryController::class, 'by_category_id']);

// 1. http://127.0.0.1:8000/api/get_category
// 2. http://127.0.0.1:8000/api/get_category/2