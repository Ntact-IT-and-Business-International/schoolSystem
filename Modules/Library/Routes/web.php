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

Route::group(['prefix' => 'library', 'middleware' => ['auth']], function () { 
    Route::get('/library', 'LibraryController@index')->name('Library');
    Route::get('/edit-library/{library_id}', 'LibraryController@editLibrary')->name('EditLibrary');
});
