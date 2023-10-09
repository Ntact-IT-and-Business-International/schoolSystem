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

Route::group(['prefix' => 'termduration', 'middleware' => ['auth']], function () { 
    Route::get('/', 'TermDurationController@index');
    Route::get('/term-duration','TermDurationController@getDuration')->name('Terms Duration');
    Route::get('/edit-term-duration/{term_duration_id}','TermDurationController@editTermDuration')->name('editTermDuration');
});
