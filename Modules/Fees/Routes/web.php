<?php

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

Route::group(['prefix' => 'fees', 'middleware' => ['auth']], function () { 
    Route::get('/school-fees', 'FeesController@index')->name('School Fees');
    Route::get('/fees-structure', 'FeesController@feeStructure')->name('Fees Structure');
    Route::get('/generate-receipt/{receipt_id}', 'FeesController@generateReceipt')->name('Payment Receipt');
    Route::get('/print-receipt-now/{receipt_id}', 'FeesController@printReceipt');
    Route::get('/clear-payments/{payment_id}', 'FeesController@clearPayment')->name('Clear Payments');
});
