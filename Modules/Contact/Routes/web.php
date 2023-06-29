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

Route::group(['prefix' => 'contact', 'middleware' => ['auth']], function () {
    Route::get('/messages', 'ContactController@index')->name('Messages');
    Route::get('/parents-messages', 'ContactController@parentMessages')->name('Parent Messages');
    Route::get('/reply-complain/{complain_id}', 'ContactController@replyComplain')->name('Complains');
});
