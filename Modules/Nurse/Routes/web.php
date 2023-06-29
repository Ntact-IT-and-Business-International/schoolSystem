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

Route::group(['prefix' => 'nurse', 'middleware' => ['auth']], function () { 
    Route::get('/request-for-sickbay-items', 'NurseController@nurseRequests')->name('Nurses Requests');
    Route::get('/records', 'NurseController@nurseRecords')->name('Nurse Records');
});
