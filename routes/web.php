<?php

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
    return redirect()->route('login');
});

Auth::routes([
    'register' => false, // Registration Routes...
    'reset' => false, // Password Reset Routes...
    'verify' => false, // Email Verification Routes...
]);


Route::group(['middleware'=>'auth'],function (){
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::get('application',[App\Http\Controllers\FinanceFormController::class, 'index'])->name('finance.index');
    Route::get('application-list',[App\Http\Controllers\FinanceFormController::class, 'show'])->name('finance.list');
    Route::post('update-finance-type',[App\Http\Controllers\HomeController::class, 'updateFinanceType'])->name('update.finance.type');
    Route::get('finance-form',[App\Http\Controllers\FinanceFormController::class, 'create'])->name('finance.form');
    Route::post('finance-form/{step}',[App\Http\Controllers\FinanceFormController::class, 'store'])->name('finance.form.step');
});
