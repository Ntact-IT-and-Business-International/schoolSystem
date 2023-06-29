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

Route::group(['prefix' => 'carteen', 'middleware' => ['auth']], function () { 
    Route::get('/deposit-money', 'CarteenController@cashDeposits')->name('Cash Deposits');
    Route::get('/daily-spendings', 'CarteenController@carten')->name('Students Daily Spendings');
});
