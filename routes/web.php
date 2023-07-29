<?php

use App\Models\CustomerProspect;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\CustomerClosingController;
use App\Http\Controllers\CustomerProspectController;

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
Route::resource('/sales', SalesController::class);
Route::resource('/customer_prospect', CustomerProspectController::class);
Route::resource('/customer_closing', CustomerClosingController::class);