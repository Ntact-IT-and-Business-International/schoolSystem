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

Route::group(['prefix' => 'expenditure', 'middleware' => ['auth']], function () { 
    Route::get('/expenditure', 'ExpenditureController@index')->name('Expenditures');
    Route::get('/salaries', 'ExpenditureController@salaries')->name('Salaries'); 
    Route::get('/items', 'ExpenditureController@items')->name('Items');
    Route::get('/my-item-requests', 'ExpenditureController@itemsRequest')->name('Items Requested');
    Route::get('/requested-items-in-your-office', 'ExpenditureController@specificitemsRequest')->name('Office Items Requested');
});
