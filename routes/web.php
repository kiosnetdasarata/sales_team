<?php

use App\Models\CustomerProspect;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\CustomerClosingController;
use App\Http\Controllers\CustomerProspectController;
use App\Models\CustomerClosing;

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
    return redirect()->route('login');
});
Route::group(['middleware' => 'auth'], function () {
    Route::resource('/sales', SalesController::class);
    Route::group(['middleware' => 'can:isSales'], function () {
Route::resource('/customer_prospect', CustomerProspectController::class);
Route::resource('/customer_closing', CustomerClosingController::class);
Route::get('/customer_closing',[CustomerClosingController::class,'index'])->name('customer_closing');
Route::post('api/fetch-regencies', [CustomerClosingController::class, 'fetchregencies']);
Route::post('api/fetch-district', [CustomerClosingController::class, 'fetchdistrict']);
Route::post('api/fetch-village', [CustomerClosingController::class, 'fetchvillage']);
Route::get('/edit/{id}',[CustomerClosingController::class,'edit']);
Route::put('/edit/{id}',[CustomerClosingController::class,'update'])->name('update_customer_closing');
    });
});