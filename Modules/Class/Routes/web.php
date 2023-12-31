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

Route::group(['prefix' => 'class', 'middleware' => ['auth']], function () { 
    Route::get('/classes', 'ClassController@index')->name('Classes');
    Route::get('/edit-class/{class_id}', 'ClassController@edit')->name('editClass');
});
