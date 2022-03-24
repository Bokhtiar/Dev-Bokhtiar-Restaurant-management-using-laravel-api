<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CartController;
use App\Http\Controllers\Api\EventController;
use App\Http\Controllers\Api\BookingController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\ProductController;
use Facade\FlareClient\Api;
use Illuminate\Support\Facades\Auth;

Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);

Route::middleware('auth:api')->group(function(){
Route::post('user', [AuthController::class, 'user_info']);
});


//evnet
Route::get('/event/list', [EventController::class, 'index']);
Route::post('/event/store', [EventController::class, 'store']);
//booking
Route::post('/booking/store', [BookingController::class, 'store']);
//category
Route::get('/category/list', [CategoryController::class, 'index']);
//product
Route::get('/product/list', [ProductController::class, 'index']);
Route::get('/category/product/{id?}', [ProductController::class, 'category_product']);
//card
Route::post('/cart/store', [CartController::class, 'store']);
Route::get('/cart/list/{id?}', [CartController::class, 'list']);
Route::get('/cart/delete/{id?}', [CartController::class, 'destroy']);
