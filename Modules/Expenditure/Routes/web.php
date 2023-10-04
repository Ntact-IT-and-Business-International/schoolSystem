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
    Route::get('/edit-salary/{salary_id}', 'ExpenditureController@editSalary')->name('Salary');
    Route::get('/edit-item/{scholastic_id}', 'ExpenditureController@editItem')->name('EditItem');
    Route::get('/edit-requested-item/{request_id}', 'ExpenditureController@editRequestedItem')->name('EditItemRequested');
    Route::get('/reject-requested-item/{request_id}', 'ExpenditureController@rejectRequestedItem')->name('RejectRequestedItem');
    Route::get('/edit-expenditure/{expenditure_id}', 'ExpenditureController@editExpenditure')->name('EditExpenditure');
});
