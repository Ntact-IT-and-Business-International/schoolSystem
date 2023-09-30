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

Route::group(['prefix' => 'accountsettings', 'middleware' => ['auth']], function () { 
    Route::get('/registered-users', 'AccountSettingsController@users')->name('All Users'); 
    Route::get('/user-category', 'AccountSettingsController@category')->name('Category');
    Route::get('/change-user-password', 'AccountSettingsController@changePassword')->name('Change Password');
    Route::get('/edit-user/{user_id}', 'AccountSettingsController@editUsers')->name('editUser');
});
