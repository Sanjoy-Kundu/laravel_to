<?php

use App\Http\Controllers\FrontendController;
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

Route::get('/', [FrontendController::class, 'welcome']);
Route::get('product', [FrontendController::class, 'product']);
Route::post('product/insert', [FrontendController::class, 'insert']);
Route::get('product/delete/{product_id}', [FrontendController::class, 'delete']);
Route::get('product/alldelete', [FrontendController::class, 'alldelete']);
Route::get('product/restore', [FrontendController::class, 'restore']);



