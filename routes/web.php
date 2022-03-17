<?php

use App\Http\Controllers\BillController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\PurchaseController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth'])->name('dashboard');

Route::controller(PurchaseController::class)->group(function(){
    Route::post('purchase', 'store')->name('purchase.store');
    Route::get('purchase/', 'index')->name('purchase.index');
});

Route::controller(BillController::class)->group(function(){
    Route::post('bill/', 'store')->name('bill.store');
    Route::get('bill/', 'index')->name('bill.index');
    Route::get('bill/{bill}', 'show')->name('bill.show');
});
require __DIR__.'/auth.php';
