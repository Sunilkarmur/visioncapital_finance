<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApprovedController;
use App\Http\Controllers\TrackApplicationController;

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

Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::get('application', [App\Http\Controllers\FinanceFormController::class, 'index'])->name('finance.index');
    Route::get('application-list', [App\Http\Controllers\FinanceFormController::class, 'show'])->name('finance.list');
    Route::post('update-finance-type', [App\Http\Controllers\HomeController::class, 'updateFinanceType'])->name('update.finance.type');
    Route::get('finance-form', [App\Http\Controllers\FinanceFormController::class, 'create'])->name('finance.form');
    Route::post('finance-form/{step}', [App\Http\Controllers\FinanceFormController::class, 'store'])->name('finance.form.step');
    Route::delete('finance-form/{finandce_form}', [App\Http\Controllers\FinanceFormController::class, 'destroy'])->name('finance.form.destroy');
    Route::get('finance-form/{finandce_form}/edit', [App\Http\Controllers\FinanceFormController::class, 'edit'])->name('finance.form.edit');
    Route::get('finance-form/{finandce_form}/office-use', [App\Http\Controllers\FinanceFormController::class, 'officialUse'])->name('finance.form.offician.use');
    Route::post('finance-form/{finandce_form}/{step}', [App\Http\Controllers\FinanceFormController::class, 'update'])->name('finance.form.update');
    Route::get('application_view/{id}', [App\Http\Controllers\FinanceFormController::class, 'viewApplicationDetails'])->name('finance.application_view');

    // Approved application list
    Route::get('view_approved_application/{id}', [ApprovedController::class, 'viewApprovedApplication'])->name('finance.view_approved_application');
    Route::post('application_process/{id}', [ApprovedController::class, 'storeApprovedApplication'])->name('finance.store_application_process');
    Route::get('approved-application-list', [ApprovedController::class, 'approvedApplicationList'])->name('finance.approved_application');

    // Track Applicaton
    Route::get('tract-application',[TrackApplicationController::class,'index'])->name('tract.application.index');
    Route::post('track-approved-application/{application_number}',[TrackApplicationController::class,'trackApproveApplication'])->name('track-approved-application');
});
