<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\PaytmController;
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

Route::get('/', [AdminController::class, 'index']);

Auth::routes();

Route::get('/home', [AdminController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/raise-fund', [AdminController::class, 'raiseFund'])->name('raiseFund');
    Route::post('/raise-fund', [AdminController::class, 'raiseFund'])->name('raiseFundRequest');
});

Route::post('paytm-payment',[PaytmController::class, 'paytmPayment'])->name('paytm.payment');
Route::post('paytm-callback',[PaytmController::class, 'paytmCallback'])->name('paytm.callback');
Route::get('paytm-purchase',[PaytmController::class, 'paytmPurchase'])->name('paytm.purchase');
