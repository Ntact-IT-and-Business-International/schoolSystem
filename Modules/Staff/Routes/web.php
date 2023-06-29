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

Route::group(['prefix' => 'staff', 'middleware' => ['auth']], function () { 
    Route::get('/teaching-staff', 'StaffController@index')->name('Teaching Staff');
    Route::get('/non-teaching-staff', 'StaffController@nonTeachingStaff')->name('Non Teaching Staff'); 
    Route::get('/request-for-permission', 'StaffController@requestedPermissions')->name('Requested Permissions');
    Route::get('/my-permission-requests', 'StaffController@myPermissionRequest')->name('My Requested Permission');
});
